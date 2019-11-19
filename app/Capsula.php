<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Capsula extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'user_id', 'codigo', 'nomeDe', 'nomePara', 'emailPara', 'avisadoEm', 'mensagem'
    ];
}
