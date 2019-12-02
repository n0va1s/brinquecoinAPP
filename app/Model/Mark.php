<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = [
        'moday', 'tuesday','wednesday','thursday','friday','saturday','sunday'
    ];

    protected $guarded = [
        'id', 'activity_id', 'created_at', 'update_at'
    ];

    public function activity()
    {
        return $this->belongsTo('App\Model\Activity');
    }
}
