<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Veiculo;

class VeiculoController extends Controller
{
    public function show($id) 
    {
        $veiculo = Veiculo::with('imagens')->findOrFail($id);
        return view('website.resource.veiculos.show', compact('veiculo'));
    }
}
