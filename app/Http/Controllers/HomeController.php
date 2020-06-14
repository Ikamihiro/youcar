<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Veiculo;
use App\Marca;

class HomeController extends Controller
{
    /**
     *  Show the Initial Page
     * 
     *  @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $veiculos = Veiculo::with('imagens')
            ->orderBy('created_at', 'desc')
            ->paginate(3);
        $modelos = Veiculo::all(['nome', 'anlar']);
        $marcas = Marca::all(['id', 'nome']);
        return view('website.index', compact('veiculos', 'modelos', 'marcas'))
            ->with('i', (request()->input('page', 1) - 1) * 3);
    }
}
