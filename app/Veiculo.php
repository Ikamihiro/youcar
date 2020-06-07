<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $table = 'veiculos';
    protected $fillable = [
        'nome',
        'marca',
        'valor',
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
        return $this->hasMany('App\VeiculoImage');
    }
}
