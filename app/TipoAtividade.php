<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAtividade extends Model
{
    protected $fillable = [
        'id', 'tipo_proposito_id', 'descricao'
    ];
}
