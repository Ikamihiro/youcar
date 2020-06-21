<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pagina;
use Faker\Generator as Faker;

$factory->define(Pagina::class, function (Faker $faker) {
    return [
        'titulo' => $faker->realText(20),
        'subtitulo' => $faker->realText(50),
        'conteudo' => $faker->paragraph,
        'slug' => function (array $pagina) {
            return Str::slug($pagina['titulo'], '-');
        }
    ];
});
