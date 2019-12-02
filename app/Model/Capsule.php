<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Capsule extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'from', 'to', 'email', 'remember_at', 'message'
    ];

    protected $guarded = [
        'id', 'user_id', 'code', 'created_at', 'update_at'
    ];
}
