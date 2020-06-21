<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CarouselImage;
use Illuminate\Http\UploadedFile;
use Faker\Generator as Faker;

$factory->define(CarouselImage::class, function (Faker $faker) {
    // Uma imagem do Carousel
    $uploadedFile = UploadedFile::fake()->image('avatar.jpg', rand(400, 800), rand(400, 800))->size(rand(400, 800));

    // Salva a imagem no disco
    $pathImagem = $uploadedFile->store('imagens/carousel', ['disk' => 'public']);

    return [
        'titulo' => $faker->realText(20),
        'subtitulo' => $faker->realText(50),
        'path' => $pathImagem
    ];
});
