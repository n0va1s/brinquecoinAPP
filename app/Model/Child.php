<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $table = 'children';

    protected $fillable = [
        'name', 'age', 'gender'
    ];

    protected $guarded = [
        'id', 'board_id', 'created_at', 'update_at'
    ];

    public function board()
    {
        return $this->belongsTo(Board::class);
    }
}
