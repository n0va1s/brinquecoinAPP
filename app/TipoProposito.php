<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProposito extends Model
{
    protected $fillable = [
        'seq_tipo_proposito','ind_proposito','des_tipo_proposito'
    ];
}
