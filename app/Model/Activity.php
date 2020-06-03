<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    protected $fillable = [
        'board_id', 'activity_type_id', 'value', 'code',
    ];

    protected $guarded = [
        'id', 'created_at', 'update_at',
    ];

    public function board()
    {
        return $this->belongsTo(Board::class, 'board_id');
    }

    public function mark()
    {
        return $this->hasOne(Mark::class);
    }

    public function type()
    {
        return $this->belongsTo(ActivityType::class, 'activity_type_id');
    }
}
