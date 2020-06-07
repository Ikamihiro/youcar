<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VeiculoImagem extends Model
{
    protected $table = 'veiculo_imagens';
    protected $fillable = [
        'path', 'legenda'
    ];

    public function veiculo() 
    {
        return $this->belongsTo('App\Veiculo');
    }
}
