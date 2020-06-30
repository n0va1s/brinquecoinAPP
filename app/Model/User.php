<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Verify user's role to authorization
     *
     * @return boolean
     */
    public function isRole($role)
    {
        if ($this->role === $role) {
            return true;
        }
        return false;
    }

    public function boards()
    {
        return $this->hasMany(Board::class);
    }

    public function capsules()
    {
        return $this->hasMany(Capsule::class, 'user_id');
    }
}
