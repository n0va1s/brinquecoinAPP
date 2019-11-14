<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quadro extends Model
{
  protected $fillable = [
      'id','titulo','descricao','valor','imagem','publicado'
  ];
}
