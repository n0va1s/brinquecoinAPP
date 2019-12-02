<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Propouse_Type extends Model
{
    protected $fillable = [
        'propouse', 'name'
    ];

    protected $guarded = [
        'id', 'created_at', 'update_at'
    ];

    public function activities()
    {
        return $this->hasMany('App\Model\Activity');
    }
}
