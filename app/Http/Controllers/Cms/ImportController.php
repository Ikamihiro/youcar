<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Veiculo;
use App\Marca;

class ImportController extends Controller
{
    public function sincronizar(Request $request)
    {
        // URI de onde os dados vão ser importados
        $urlArquivo = 'http://aws.it-car.com.br/xml/exporta-itcar.asp?site=youcar.itcar.com.br';

        // Pega e decodifica o arquivo XML
        $xmldata = simplexml_load_file($urlArquivo);

        // Flag para saber se a sincronização ocorreu bem
        $deuCerto = false;

        // Para cada Veiculo que estiver no XML
        foreach($xmldata->Veiculo as $veiculo) {
            // Verifica se o Veiculo já existe no banco
            $oldVeiculo = Veiculo::firstWhere('codigo', $veiculo->Codigo);
            // Se não existir, insere o Veiculo no banco
            if(!$oldVeiculo) {
                $newVeiculo = new Veiculo();
                // Pega o Código
                if($veiculo->Codigo) {
                    $newVeiculo->codigo = strval($veiculo->Codigo);
                }
                // Pega a marca
                if($veiculo->Marca) {
                    // Verifica se a marca existe no banco
                    $marca = Marca::where('nome', $veiculo->Marca)->first();
                    if($marca) {
                        // Se existir, pega o seu ID
                        $newVeiculo->marca_id = intval($marca->id);
                    } else {
                        // Se não existir, insere ela e pega o seu ID
                        $newMarca = Marca::create($veiculo->Marca);
                        $newVeiculo->marca_id = intval($newMarca->id);
                    }
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
                // Feito isso, vamos salva
                if($newVeiculo->save()) {
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
}
