<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atividade extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'id','quadro_id', 'tipo_atividade_id', 'valor', 'codigo'
    ];

    public function quadro()
    {
        return $this->belongsTo('App\Quadro');
    }

    public function tipoAtividade()
    {
        return $this->hasOne('App\TipoAtividade');
    }
}
