<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
    protected $primaryKey = 'PaymentId';
    public $timestamps = true;

    protected $fillable = [
        'Amount',
        'PaymentMethod'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'PaymentId', 'PaymentId');
    }
}
