<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoQuadro extends Model
{
    protected $fillable = [
        'id', 'tipo', 'descricao', 'imagem'
    ];

    public function quadros()
    {
        return $this->hasMany('App\Quadro');
    }
}
