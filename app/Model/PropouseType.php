<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropouseType extends Model
{
    use SoftDeletes;

    protected $table = 'propouse_types';

    protected $fillable = [
        'propouse', 'name'
    ];

    protected $guarded = [
        'id', 'created_at', 'update_at', 'delete_at'
    ];

    public function activities()
    {
        return $this->hasMany(Activity::class, 'propouse_type_id');
    }
}
