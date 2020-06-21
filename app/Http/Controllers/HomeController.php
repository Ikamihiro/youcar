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
        
        $imagens = CarouselImage::all();

        return view('website.index', 
            compact('veiculos', 'modelos', 'marcas', 'imagens'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    public function show($slug)
    {
        $pagina = Pagina::where('slug', $slug)->first();
        return view('website.resource.paginas.show', compact('pagina'));
    }
}
