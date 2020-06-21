<?php

namespace App\Http\Controllers\Cms;

use Auth;
use Storage;
use App\CarouselImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CarouselStoreRequest;
use App\Http\Requests\CarouselUpdateRequest;

class CarouselController extends Controller
{
    public function index() 
    {
        $imagens = CarouselImage::all();
        return view(
            'cms.resource.carousel.index',
            compact('imagens')
        );
    }

    public function create() 
    {
        return view('cms.resource.carousel.create');
    }
    
    public function store(CarouselStoreRequest $request)
    {
        // Salvando a imagem
        $imagem = $request->file('imagem');
        if($imagem) {
            $pathImagem = $imagem->store('imagens/carousel', ['disk' => 'public']);

            // Adiciona campo no vetor referente a extension
            $request->merge([
                'path' => $pathImagem
            ]);
        }

        $carouselImagem = new CarouselImage($request->all());

        if($carouselImagem->save()) {
            // Sucesso! Redireciona p/ Index Carousel
            return redirect()->route('admin.carousel.index')
                ->with('success', 'Imagem do Carousel salvo com sucesso!');
        }

        // Fracasso! Redireciona de volta
        return redirect()->back()
            ->with('error', 'Algo de errado aconteceu!');
    }
    
    public function edit($id)
    {
        $imagem = CarouselImage::find($id);
        return view(
            'cms.resource.carousel.edit',
            compact('imagem')
        );
    }
    
    public function update(CarouselUpdateRequest $request, $id)
    {
        $imagem = CarouselImage::find($id);

        if($request->file('imagem')) {
            Storage::disk('public')->delete($imagem->path);

            // Salvando a nova imagem
            $imagemRequest = $request->file('imagem');
            $pathImagem = $imagemRequest->store('imagens/carousel', ['disk' => 'public']);
            
            // Adiciona ao campo 
            $request->merge([
                'path' => $pathImagem
            ]);
        }

        if($imagem->update($request->all())) {
            // Sucesso! Redireciona p/ Index Carousel
            return redirect()->route('admin.carousel.index')
                ->with('success', 'Imagem do Carousel salva com sucesso!');
        }

        // Fracasso! Redireciona de volta
        return redirect()->back()
            ->with('error', 'Algo de errado aconteceu!');
    }
    
    public function destroy($id)
    {
        $imagem = CarouselImage::find($id);
        
        if($imagem->delete()) {
            // Sucesso! Redireciona p/ Index Carousel
            return redirect()->route('admin.carousel.index')
                ->with('success', 'Imagem do Carousel excluída com sucesso!');
        }

        // Fracasso! Redireciona de volta
        return redirect()->back()
            ->with('error', 'Algo de errado aconteceu!');
    }
}
