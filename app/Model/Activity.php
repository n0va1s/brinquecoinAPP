<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    protected $fillable = [
        'board_id', 'activity_type_id', 'value', 'code'
    ];

    protected $guarded = [
        'id', 'created_at', 'update_at'
    ];

    public function board()
    {
        return $this->belongsTo('App\Model\Board');
    }

    public function activityType()
    {
        return $this->hasOne('App\Model\Activity_Type');
    }
}
