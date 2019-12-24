<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use SoftDeletes;

    protected $table = 'boards';

    protected $fillable = [
        'board_type_id', 'goal', 'user_id', 'code'
    ];

    protected $guarded = [
        'id', 'created_at', 'update_at'
    ];

    public function person()
    {
        return $this->hasOne('App\Model\Person');
    }

    public function board_type()
    {
        return $this->hasOne('App\Model\BoardType');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function activities()
    {
        return $this->hasMany('App\Model\Activity');
    }
}
