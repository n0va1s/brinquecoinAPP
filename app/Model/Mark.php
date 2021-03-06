<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $table = 'marks';

    protected $fillable = [
        'monday', 'tuesday','wednesday','thursday',
        'friday','saturday','sunday', 'activity_id'
    ];

    protected $guarded = [
        'id', 'created_at', 'update_at'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
