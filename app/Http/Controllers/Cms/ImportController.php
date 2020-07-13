<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Storage;
use App\Veiculo;
use App\Marca;
use App\VeiculoImagem;
use App\Equipamento;

class ImportController extends Controller
{
    public function sincronizar(Request $request)
    {
        // URI de onde os dados vão ser importados
        $urlArquivo = 'http://aws.it-car.com.br/xml/exporta-itcar.asp?site=youcar.itcar.com.br';

        // Pega e decodifica o arquivo XML
        $xmldata = simplexml_load_file($urlArquivo);

        // Flag para saber se a sincronização deu certo
        // Por padrão, vai receber o valor TRUE
        $deuCerto = true;

        // Para cada Veiculo que estiver no XML
        foreach($xmldata->Veiculo as $veiculo) {
            // Verifica se o Veiculo já existe no banco
            $oldVeiculo = Veiculo::firstWhere('codigo', $veiculo->Codigo);
            // Se não existir, insere o Veiculo no banco
            if(!$oldVeiculo) {
                // Criando um objeto Veiculo
                $newVeiculo = new Veiculo();
                // Pegando os atributos
                $newVeiculo = $this->setAtributos($veiculo, $newVeiculo);

                // Feito isso, vamos salva
                if($newVeiculo->save()) {
                    $this->createGalleryImages($veiculo, $newVeiculo);
                    // Pega os Equipamentos
                    $this->setEquipamentos($veiculo, $newVeiculo);
                    $deuCerto = true;
                } else {
                    $deuCerto = false;
                }
            }
        }

        if($deuCerto) {
            // Sucesso! Redireciona p/ Index Veículos
            return redirect()->route('admin.veiculos.index')
                ->with('success', 'Veículo salvo com sucesso!');
        }

        // Fracasso! Redireciona de volta
        return redirect()->back()
            ->with('error', 'Algo de errado aconteceu!');
    }

    /*
     * Função Privada que atribui os valores ao respectivos atributos,
     * fazendo uma verificação e conversão necessária
     */
    private function setAtributos($veiculo, $newVeiculo) 
    {
        // Pega o Código
        if($veiculo->Codigo) {
            $newVeiculo->codigo = strval($veiculo->Codigo);
        }
        // Pega a marca
        if($veiculo->Marca) {
            // Verifica se a marca existe no banco
            $newVeiculo->marca_id = $this->setMarca($veiculo);
        }
        // Verifica se é usado ou novo
        if($veiculo->ZeroKm == 'N') {
            $newVeiculo->condicao = 'Usado';
        } else {
            $newVeiculo->condicao = 'Novo';
        }
        // Pega o modelo
        if($veiculo->ModeloVersao) {
            $newVeiculo->modelo = strval($veiculo->ModeloVersao);
        }
        // Pega o ano/modelo
        if($veiculo->AnoFabr && $veiculo->AnoModelo) {
            $newVeiculo->ano = strval($veiculo->AnoFabr . '/' . $veiculo->AnoModelo);
        }
        // Pega o combustível
        if($veiculo->Combustivel) {
            $newVeiculo->combustivel = strval($veiculo->Combustivel);
        }
        // Pega o cambio/trasmissao
        if($veiculo->Cambio) {
            $newVeiculo->transmissao = strval($veiculo->Cambio);
        }
        // Pega a cor
        if($veiculo->Cor) {
            $newVeiculo->cor = strval($veiculo->Cor);
        }
        // Pega a quilometragem
        if($veiculo->Km) {
            $newVeiculo->quilometragem = intval($veiculo->Km);
        }
        // Pega o preço/valor
        if($veiculo->Preco) {
            $newVeiculo->valor = floatval($veiculo->Preco);
        }
        // Pega os detalhes
        if($veiculo->Detalhes) {
            $newVeiculo->detalhes = strval($veiculo->Detalhes);
        }
        // Pegando a foto de capa
        $newVeiculo->imagem_capa = $this->setImagemCapa($veiculo);
        return $newVeiculo;
    }

    /*
     * Função Privada que atribui a marca do Veículo,
     * de acordo com os valores que já existe no banco de dados.
     * Se a marca não existir, essa por sua vez é inserida no banco 
     */
    private function setMarca($veiculo)
    {
        // Verifica se a marca existe no banco
        $marca = Marca::where('nome', $veiculo->Marca)->first();
        if($marca) {
            // Se existir, pega o seu ID
            return intval($marca->id);
        }
        // Se não existir, insere ela e pega o seu ID
        $newMarca = Marca::create(['nome' => strval($veiculo->Marca)]);
        return intval($newMarca->id);
    }

    public function setEquipamentos($veiculo, $newVeiculo)
    {
        if($veiculo->Equipamentos) {
            $equipamentosValues = strval($veiculo->Equipamentos);
            $equipamentos = explode(",", $equipamentosValues);
            foreach($equipamentos as $equipamentoNome) {
                $equipamento = Equipamento::where('nome', strval($equipamentoNome))->first();
                if($equipamento) {
                    $newVeiculo->equipamentos()->attach($equipamento);
                } else {
                    $newEquipamento = Equipamento::create(['nome' => strval($equipamentoNome)]);
                    $newVeiculo->equipamentos()-> attach($newEquipamento);
                }
            }
        }
    }

    /*
     * Função Privada que baixa e salva a Imagem de Capa
     * A primeira imagem trazida do XML será usada 
     */
    private function setImagemCapa($veiculo)
    {
        // Pegando a foto de capa
        if($veiculo->Fotos->FotoURL[0]) {
            // Pega a URL da foto
            $url = strval($veiculo->Fotos->FotoURL[0]);
            // Formata a URL, removendo o 'www.'
            $url = str_replace('www.', '', $url);
            // Baixa a imagem
            $contents = @file_get_contents($url);
            // Pega o nome da imagem
            $name = substr($url, strrpos($url, '/') + 1);
            // Cria o path completo
            $pathCapa = 'imagens/veiculos/capa' . time() . '/' . $name;
            // E salva no storage
            Storage::disk('public')->put($pathCapa, $contents);
            // Retorna o path completo
            return strval($pathCapa);
        }
    }

    /*
     * Função privada que cria uma galeria de VeiculoImagens
     * para o respectivo Veículo 
     */
    private function createGalleryImages($veiculo, $newVeiculo) {
        // Pegando as fotos
        foreach($veiculo->Fotos->FotoURL as $foto) {
            // Pega a URL da foto
            $url = strval($foto);
            // Formata a URL, removendo o 'www.'
            $url = str_replace('www.', '', $url);
            // Baixa a imagem
            $contents = @file_get_contents($url);
            // Pega o nome da imagem
            $name = substr($url, strrpos($url, '/') + 1);
            // Cria o path completo
            $pathCapa = $newVeiculo->id . '/' . time() . '/' . $name;
            // E salva no storage
            Storage::disk('public')->put($pathCapa, $contents);
            // Insere no banco o path completo e as respectivas informações
            VeiculoImagem::create([
                'path' => '/storage/' . $pathCapa,
                'legenda' => $newVeiculo->modelo,
                'veiculo_id' => $newVeiculo->id
            ]);
        }
    }
}
