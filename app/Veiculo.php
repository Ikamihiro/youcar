<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $table = 'veiculos';
    protected $fillable = [
        'nome',
        'valor',
        'marca_id',
        'quilometragem',
        'transmissao',
        'condicao',
        'combustivel',
        'ano',
        'cor',
        'detalhes'
    ];

    public function imagens()
    {
        return $this->hasMany('App\VeiculoImagem');
    }

    public function marca()
    {
        return $this->belongsTo('App\Marca');
    }
}
