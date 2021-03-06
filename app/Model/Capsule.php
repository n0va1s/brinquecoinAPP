<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Capsule extends Model
{
    use SoftDeletes;
    use Notifiable;

    protected $table = 'capsules';

    protected $fillable = [
        'from', 'to', 'email', 'remember_at', 'message', 'user_id', 'code'
    ];

    protected $guarded = [
        'id', 'created_at', 'update_at', 'delete_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
