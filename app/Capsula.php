<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capsula extends Model
{
    protected $fillable = [
        'id', 'user_id', 'codigo', 'nomeDe', 'nomePara', 'emailPara', 'avisadoEm', 'mensagem'
    ];
}
