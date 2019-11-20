<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marcacao extends Model
{
    protected $fillable = [
        'id','atividade_id','segunda', 'terca','quarta','quinta','sexta','sabado','domingo'
    ];

    public function atividade()
    {
        return $this->belongsTo('App\Atividade');
    }
}
