<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crianca extends Model
{
    protected $fillable = [
        'id', 'quadro_id', 'nome', 'idade', 'genero'
    ];

    public function quadro()
    {
        return $this->belongsTo(Quadro::class);
    }
}
