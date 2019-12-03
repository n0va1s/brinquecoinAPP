<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Board_Type extends Model
{
    protected $table = 'board_types';
    
    protected $fillable = [
        'type', 'name', 'image', 'user_id'
    ];

    protected $guarded = [
        'id', 'created_at', 'update_at'
    ];

    public function boards()
    {
        return $this->hasMany('App\Model\Boards');
    }
}
