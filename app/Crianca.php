<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crianca extends Model
{
    protected $fillable = [
        'quadro_id', 'sexo', 'crianca', 'idade'
    ];

    public function quadro()
    {
        return $this->belongsTo('App\Quadro');
    }
}
