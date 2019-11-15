<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capsula extends Model
{
    protected $fillable = [
        'id', 'user_id', 'nomeDe', 'nomePara', 'emailPara', 'avisadoEm', 'mensagem'
    ];
}
