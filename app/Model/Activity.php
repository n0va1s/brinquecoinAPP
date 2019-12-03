<?php

namespace App\Model;

use Illuminate\Datbase\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;
    
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
