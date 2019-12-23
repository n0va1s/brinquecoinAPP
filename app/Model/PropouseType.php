<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PropouseType extends Model
{
    use SoftDeletes;
    
    protected $table = 'propouse_types';

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
