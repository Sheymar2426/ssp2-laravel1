<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens;

    protected $table = 'admin';
    protected $primaryKey = 'AdminId';
    public $timestamps = false;

    protected $fillable = [
        'Name',
        'Email',
        'Password'
    ];

    protected $hidden = [
        'Password',
        'remember_token',
    ];

    // If your passwords are hashed, tell Laravel which field to use
    protected $casts = [
        'Password' => 'hashed',
    ];
}
