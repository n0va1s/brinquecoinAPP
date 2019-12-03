<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'people';

    protected $fillable = [
        'board_id', 'name', 'age', 'gender'
    ];

    protected $guarded = [
        'id', 'created_at', 'update_at'
    ];

    public function board()
    {
        return $this->belongsTo('App\Model\Board');
    }
}
