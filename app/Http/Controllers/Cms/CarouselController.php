<?php

namespace App\Http\Controllers\Cms;

use App\CarouselImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index() {
        $imagens = CarouselImage::all();
        return view(
            'cms.resource.carousel.index',
            compact('imagens')
        );
    }

    public function create() {}
    
    public function store() {}
    
    public function edit() {}
    
    public function update() {}
    
    public function destroy() {}
}
