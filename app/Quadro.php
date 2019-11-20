<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quadro extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'tipo_quadro_id', 'user_id', 'recompensa'
    ];

    public function crianca()
    {
        return $this->hasOne('App\Crianca');
    }

    public function tipoQuadro()
    {
        return $this->hasOne('App\TipoQuadro');
    }

    public function responsavel()
    {
        return $this->hasOne('App\User');
    }

    public function atividades()
    {
        return $this->hasMany('App\Atividade');
    }
}
