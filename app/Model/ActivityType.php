<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityType extends Model
{
    use SoftDeletes;

    protected $table = 'activity_types';

    protected $fillable = [
        'propouse_type_id', 'name', 'user_id', 'code'
    ];

    protected $guarded = [
        'id', 'created_at', 'update_at', 'delete_at',
    ];

    public function activities()
    {
        return $this->hasMany(Activity::class, 'id');
    }

    public function propouse()
    {
        return $this->belongsTo(PropouseType::class, 'propouse_type_id');
    }
}
