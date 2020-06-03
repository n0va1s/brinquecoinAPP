<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use SoftDeletes;

    protected $table = 'boards';
    
    protected $fillable = [
        'board_type_id', 'goal', 'user_id', 'code',
    ];

    protected $guarded = [
        'id', 'created_at', 'update_at', 'delete_at',
    ];

    public function type()
    {
        return $this->belongsTo(BoardType::class, 'board_type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function person()
    {
        return $this->hasOne(Person::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
