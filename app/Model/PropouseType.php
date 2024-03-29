<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropouseType extends Model
{
    use SoftDeletes;

    protected $table = 'propouse_types';

    protected $fillable = [
        'propouse', 'name', 'code'
    ];

    protected $guarded = [
        'id', 'created_at', 'update_at', 'delete_at'
    ];

    public function types()
    {
        return $this->hasMany(ActivityType::class, 'id');
    }
}
