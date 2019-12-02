<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Board_Type extends Model
{
    protected $fillable = [
        'type', 'name', 'image'
    ];

    protected $guarded = [
        'id', 'created_at', 'update_at'
    ];

    public function boards()
    {
        return $this->hasMany('App\Model\Boards');
    }
}
