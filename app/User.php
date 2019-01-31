<?php

namespace App;

use App\Traits\ImagesTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, ImagesTrait;
    
    const ROLES = [
        
        'admin',
        'seller',
        'user'
        
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected static function boot () {
    
        parent::boot();
        
        self::deleting(function($user) {

            $user->deleteAvatar($user->avatar);

        });
        
    }
}
