<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    protected $table = 'paginas';
    protected $fillable = [
        'titulo',
        'subtitulo',
        'conteudo',
        'slug'
    ];
}
