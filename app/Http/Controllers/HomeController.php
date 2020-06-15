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
            ->paginate(6);
        $modelos = Veiculo::all(['modelo', 'ano']);
        $marcas = Marca::all(['id', 'nome']);
        return view('website.index', compact('veiculos', 'modelos', 'marcas'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }
}
