<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'AdminId';
    public $timestamps = false;

    protected $fillable = [
        'Name',
        'Email',
        'Password'
    ];

    protected $hidden = [
        'Password'
    ];
}
