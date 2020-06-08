<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Veiculo;
use App\VeiculoImagem;
use App\Marca;
use Auth;
use Storage;

class VeiculoController extends Controller
{
    // Retorna todos os veículos paginados
    public function index()
    {
        $veiculos = Veiculo::with('imagens')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('cms.resource.veiculos.index', compact('veiculos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // Retorna a Tela de Adicionar Veículo
    public function create()
    {
        $marcas = Marca::all(['id', 'nome']);
        $combustiveis = ['Flex', 'Álcool', 'Diesel', 'Gasolina'];
        $condicoes = ['Novo', 'Usado'];
        $transmissoes = ['Automática', 'Manual'];
        return view('cms.resource.veiculos.create', 
            compact('marcas', 'combustiveis', 'condicoes', 'transmissoes'));
    }

    // Salva no BD um Veículo, juntamente com suas imagens
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'marca_id' => 'required',
            'valor' => 'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/',
            'quilometragem' => 'required',
            'transmissao' => 'required',
            'condicao' => 'required',
            'combustivel' => 'required',
            'ano' => 'required',
            'cor' => 'required'
        ]);

        $veiculo = new Veiculo($request->all());

        $veiculo->save();
        return redirect()->route('admin.veiculos.index')
            ->with('success', 'Veículo salvo com sucesso!');
    }

    // Retorna os dados de um Veículo para edição
    public function edit($id)
    {
        $veiculo = Veiculo::find($id);
        $marcas = Marca::all(['id', 'nome']);
        $combustiveis = ['Flex', 'Álcool', 'Diesel', 'Gasolina'];
        $condicoes = ['Novo', 'Usado'];
        $transmissoes = ['Automática', 'Manual'];
        return view('cms.resource.veiculos.edit', 
            compact('veiculo', 'marcas', 'combustiveis', 'condicoes', 'transmissoes'));
    }

    // Atualiza os dados de um Veículo no BD
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'marca_id' => 'required',
            'valor' => 'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/',
            'quilometragem' => 'required',
            'transmissao' => 'required',
            'condicao' => 'required',
            'combustivel' => 'required',
            'ano' => 'required',
            'cor' => 'required'
        ]);

        $veiculo = Veiculo::find($id);
        $veiculo->update($request->all());

        return redirect()->route('admin.veiculos.index')
            ->with('success', 'Veículo salvo com sucesso!');
    }

    // Mostra os dados de um único Veículo
    public function show($id)
    {
        $veiculo = Veiculo::find($id);
        return view('cms.resource.veiculos.show', compact('veiculo'));
    }

    // Remove do BD um Veículo em específico
    public function destroy($id) 
    {
        $veiculo = Veiculo::find($id);
        $veiculo->delete();
        return redirect()->route('admin.veiculos.index')
            ->with('success', 'Veículo excluído com sucesso!');
    }
}
