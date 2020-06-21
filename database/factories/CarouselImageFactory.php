<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CarouselImage;
use Illuminate\Http\UploadedFile;
use Faker\Generator as Faker;

$factory->define(CarouselImage::class, function (Faker $faker) {
    $width = 1200;
    $height = 600;
    // Uma imagem do Carousel
    $uploadedFile = UploadedFile::fake()->image('avatar.jpg', $width, $height)->size(600);

    // Salva a imagem no disco
    $pathImagem = $uploadedFile->store('imagens/carousel', ['disk' => 'public']);

    return [
        'titulo' => $faker->realText(20),
        'subtitulo' => $faker->realText(50),
        'path' => $pathImagem
    ];
});
