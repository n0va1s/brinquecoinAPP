<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quadro extends Model
{
  protected $fillable = [
      'titulo','descricao','valor','imagem','publicado'
  ];
}
