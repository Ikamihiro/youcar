<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VeiculoStoreRequest;
use App\Http\Requests\VeiculoUpdateRequest;
use App\Veiculo;
use App\VeiculoImagem;
use App\Marca;
use App\Equipamento;
use Auth;
use Storage;

class VeiculoController extends Controller
{
    // Retorna todos os veículos paginados
    public function index()
    {
        $veiculos = Veiculo::with('imagens')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('cms.resource.veiculos.index', compact('veiculos'))
            ->with('i', (request()->input('page', 1) - 1) * 15);
    }

    // Retorna a Tela de Adicionar Veículo
    public function create()
    {
        $marcas = Marca::all(['id', 'nome']);
        $equipamentos = Equipamento::all(['id', 'nome']);
        $combustiveis = ['Flex', 'Álcool', 'Diesel', 'Gasolina'];
        $condicoes = ['Novo', 'Usado'];
        $transmissoes = ['Automática', 'Manual'];
        return view('cms.resource.veiculos.create', 
            compact('marcas', 'combustiveis', 'condicoes', 'transmissoes', 'equipamentos'));
    }

    // Salva no BD um Veículo, juntamente com suas imagens
    public function store(VeiculoStoreRequest $request)
    {
        // Pegando as imagens da Galeria
        $images = $request->images;

        // Salvando a imagem de capa
        $capa = $request->file('imagemCapa');
        if ($capa) {
            $pathCapa = $capa->store('imagens/veiculos/capa' . time(), ['disk' => 'public']);
            //$pathCapa = str_replace('//', '/', $pathCapa);
            // Adiciona ao campo 
            $request->merge([
                'imagem_capa' => $pathCapa
            ]);
        }
        
        $veiculo = new Veiculo($request->all());

        if($veiculo->save()) {
            $equipamentos = Equipamento::find($request->equipamentos);
            $veiculo->equipamentos()->attach($equipamentos);

            foreach($images as $image) {
                $imagePath = Storage::disk('public')->put($veiculo->id .'/' . time() . '/', $image);
                //$imagePath = str_replace('//', '/', $imagePath);
                VeiculoImagem::create([
                    'path' => '/storage/' . $imagePath,
                    'legenda' => $veiculo->modelo,
                    'veiculo_id' => $veiculo->id
                ]);
            }
            
            // Sucesso! Redireciona p/ Index Veículos
            return redirect()->route('admin.veiculos.index')
                ->with('success', 'Veículo salvo com sucesso!');
        }

        // Fracasso! Redireciona de volta
        return redirect()->back()
            ->with('error', 'Algo de errado aconteceu!');
    }

    // Retorna os dados de um Veículo para edição
    public function edit($id)
    {
        $veiculo = Veiculo::with('imagens')->findOrFail($id);
        $marcas = Marca::all(['id', 'nome']);
        $equipamentos = Equipamento::all(['id', 'nome']);
        $combustiveis = ['Flex', 'Álcool', 'Diesel', 'Gasolina'];
        $condicoes = ['Novo', 'Usado'];
        $transmissoes = ['Automática', 'Manual'];
        return view('cms.resource.veiculos.edit', 
            compact('veiculo', 'marcas', 'combustiveis', 'condicoes', 'transmissoes', 'equipamentos'));
    }

    // Atualiza os dados de um Veículo no BD
    public function update(VeiculoUpdateRequest $request, $id)
    {
        $veiculo = Veiculo::with('imagens')->findOrFail($id);
        // Pega as novas imagens para serem inseridas
        $images = $request->images;

        // Se o usuário quiser mudar a Foto Principal
        if($request->file('imagemCapa')) {
            Storage::disk('public')->delete($veiculo->imagem_capa);

            // Salvando a nova imagem de capa
            $capa = $request->file('imagemCapa');
            $pathCapa = $capa->store('imagens/veiculos/capa' . time(), ['disk' => 'public']);
            
            // Adiciona ao campo 
            $request->merge([
                'imagem_capa' => $pathCapa
            ]);
        }

        if($veiculo->update($request->all())) {
            // Primeiro, remove todos os equipamentos
            $veiculo->equipamentos()->detach();
            // E então adiciona os novos
            $equipamentos = Equipamento::find($request->equipamentos);
            $veiculo->equipamentos()->attach($equipamentos);

            // Excluir as imagens selecionadas
            $imagensDeleteIds = $request->input('deleteImages');
            if($imagensDeleteIds) {
                $imagensDelete = VeiculoImagem::find($imagensDeleteIds);
                
                // Pega todos os paths
                $paths = [];
                foreach ($imagensDelete as $imagem) {
                    array_push($paths, $imagem->path);
                }

                // Deleta as imagens selecionadas
                if(VeiculoImagem::destroy($imagensDeleteIds)) {
                    Storage::disk('public')->delete($paths);
                }
            }

            // Verifica se tem novas imagens para inserir
            if($images) {
                foreach($images as $image) {
                    $imagePath = Storage::disk('public')->put($veiculo->id .'/' . time() . '/', $image);
                    VeiculoImagem::create([
                        'path' => '/storage/' . $imagePath,
                        'legenda' => $veiculo->modelo,
                        'veiculo_id' => $veiculo->id
                    ]);
                }
            }

            // Sucesso! Redireciona p/ Index Veículos
            return redirect()->route('admin.veiculos.index')
                ->with('success', 'Veículo salvo com sucesso!');
        }

        // Fracasso! Redireciona de volta
        return redirect()->back()
            ->with('error', 'Algo de errado aconteceu!');
    }

    // Mostra os dados de um único Veículo
    public function show($id)
    {
        $veiculo = Veiculo::with('imagens')->findOrFail($id);
        return view('cms.resource.veiculos.show', compact('veiculo'));
    }

    // Remove do BD um Veículo em específico
    public function destroy($id) 
    {
        $veiculo = Veiculo::with('imagens')->findOrFail($id);
        $veiculo->delete();
        return redirect()->route('admin.veiculos.index')
            ->with('success', 'Veículo excluído com sucesso!');
    }
}
