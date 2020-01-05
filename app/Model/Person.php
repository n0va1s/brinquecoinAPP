<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'people';
    protected $primaryKey = 'board_id';

    protected $fillable = [
        'name', 'age', 'gender'
    ];

    protected $guarded = [
        'created_at', 'update_at'
    ];

    public function board()
    {
        return $this->belongsTo(Board::class);
    }
}
