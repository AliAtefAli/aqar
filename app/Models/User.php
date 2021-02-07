<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'phone', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['phone_verified_at' => 'datetime'];

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Favorite::class);
    }

}
