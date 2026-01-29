<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'CustId';
    public $timestamps = true; // assumes you have created_at / updated_at

    protected $fillable = [
        'Name',
        'Email',
        'Password',
        'Phone',
        'last_login'
    ];

    protected $hidden = [
        'Password'
    ];

    // Hash password when setting
    public function setPasswordAttribute($value)
    {
        $this->attributes['Password'] = Hash::make($value);
    }

    // Relationship: Customer has many orders
    public function orders()
    {
        return $this->hasMany(Order::class, 'CustId', 'CustId');
    }

    // Dashboard stats helper
    public static function getStats()
    {
        return [
            'total_customers' => self::count(),
            'new_customers_this_month' => self::whereMonth('created_at', now()->month)
                                              ->whereYear('created_at', now()->year)
                                              ->count(),
            'active_customers' => self::where('last_login', '>=', now()->subDays(30))->count()
        ];
    }
}
