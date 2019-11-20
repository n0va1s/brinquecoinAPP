<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProposito extends Model
{
    protected $fillable = [
        'id', 'proposito', 'descricao'
    ];

    public function atividades()
    {
        return $this->hasMany('App\Atividade');
    }
}
