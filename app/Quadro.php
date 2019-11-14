<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quadro extends Model
{
  protected $fillable = [
      'id','tipo_quadro_id','sexo','crianca','idade','recompensa'
  ];
}
