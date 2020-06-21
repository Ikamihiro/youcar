<?php

namespace App\Http\Controllers\Cms;

use App\Pagina;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\PaginaStoreRequest;
use App\Http\Requests\PaginaUpdateRequest;

class PaginaController extends Controller
{
    public function index()
    {
        $paginas = Pagina::all();

        return view(
            'cms.resource.paginas.index',
            compact('paginas')
        );
    }

    public function create()
    {
        return view('cms.resource.paginas.create');
    }

    public function store(PaginaStoreRequest $request)
    {
        $slug = Str::slug($request->titulo, '-');

        $request->merge([ 'slug' => $slug ]);

        $pagina = new Pagina($request->all());

        if($pagina->save()) {
            // Sucesso! Redireciona p/ Index Veículos
            return redirect()->route('admin.paginas.index')
                ->with('success', 'Página salva com sucesso!');
        }

        // Fracasso! Redireciona de volta
        return redirect()->back()
            ->with('error', 'Algo de errado aconteceu!');
    }
    
    public function edit($id)
    {
        $pagina = Pagina::find($id);

        return view(
            'cms.resource.paginas.edit',
            compact('pagina')
        );
    }

    public function update(PaginaUpdateRequest $request, $id)
    {
        $pagina = Pagina::find($id);

        $slug = Str::slug($request->titulo, '-');
        $request->merge([ 'slug' => $slug ]);

        if($pagina->update($request->all())) {
            // Sucesso! Redireciona p/ Index Veículos
            return redirect()->route('admin.paginas.index')
                ->with('success', 'Página salva com sucesso!');
        }

        // Fracasso! Redireciona de volta
        return redirect()->back()
            ->with('error', 'Algo de errado aconteceu!');
    }
    
    public function destroy($id)
    {
        $pagina = Pagina::find($id);

        if($pagina->delete()) {
            // Sucesso! Redireciona p/ Index Veículos
            return redirect()->route('admin.paginas.index')
                ->with('success', 'Página excluída com sucesso!');
        }

        // Fracasso! Redireciona de volta
        return redirect()->back()
            ->with('error', 'Algo de errado aconteceu!');
    }
}
