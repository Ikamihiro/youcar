<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Veiculo;
use App\Marca;
use App\CarouselImage;
use App\Pagina;

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

        return view('website.index', 
            compact('veiculos', 'modelos', 'marcas'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    public function search(Request $request)
    {
        $veiculos = Veiculo::with('imagens');

        if($request->has('marca')) {
            $veiculos = $veiculos->where('marca_id', $request->input('marca'));
        }

        if($request->has('modelo')) {
            $veiculos = $veiculos->where('modelo', $request->input('modelo'));
        }
        
        if($request->has('preco')) {
            if($request->input('preco') == '<50') {
                $veiculos = $veiculos->where('valor', '<', 50000);
            } else if($request->input('preco') == '50-100') {
                $veiculos = $veiculos
                    ->where('valor', '>=', 50000)
                    ->where('valor', '<=', 100000);
            } else {
                $veiculos = $veiculos->where('valor', '>', 100000);
            }
        }

        if($request->has('ano')) {
            $veiculos = $veiculos->where('ano', 'like', '%' . $request->input('ano') . '%');
        }

        $veiculos = $veiculos->paginate(6);

        $modelos = Veiculo::all(['modelo']);
        $marcas = Marca::all(['id', 'nome']);
        
        return view('website.resource.veiculos.search', 
            compact('veiculos', 'modelos', 'marcas'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    public function show($slug)
    {
        $pagina = Pagina::where('slug', $slug)->first();
        return view('website.resource.paginas.show', compact('pagina'));
    }
}
