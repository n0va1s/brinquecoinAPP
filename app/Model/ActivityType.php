<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityType extends Model
{
    use SoftDeletes;

    protected $table = 'activity_types';

    protected $fillable = [
        'propouse_type_id', 'name', 'user_id'
    ];

    protected $guarded = [
        'id', 'created_at', 'update_at', 'delete_at'
    ];

    public function activities()
    {
        return $this->hasMany('App\Model\Activity');
    }

    public function propouse()
    {
        return $this->hasOne('App\Model\Propouse_Type');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($activity_type) {
            if ($activity_type->forceDeleting) {
                $activity_type->activities()->withTrashed()->forceDelete();
            } else {
                $activity_type->activities()->delete();
            }
        });
    }
}
