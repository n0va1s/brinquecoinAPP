<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'board_type_id', 'reward'
    ];

    protected $guarded = [
        'id', 'code', 'user_id', 'active', 'created_at', 'update_at'
    ];

    public function child()
    {
        return $this->hasOne(Child::class);
    }

    public function board_type()
    {
        return $this->hasOne('App\Model\Board_Type');
    }

    public function parent()
    {
        return $this->hasOne('App\User');
    }

    public function activities()
    {
        return $this->hasMany('App\Model\Activity');
    }
}
