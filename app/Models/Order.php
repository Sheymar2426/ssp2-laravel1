<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'OrderId';
    public $timestamps = true;

    protected $fillable = [
        'CustId',
        'TotalAmount',
        'Status',
        'PaymentId'
    ];

    // Relationship: Order belongs to Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CustId', 'CustId');
    }

    // Relationship: Order has many items
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'OrderId', 'OrderId');
    }

    // Relationship: Order has one payment
    public function payment()
    {
        return $this->hasOne(Payment::class, 'PaymentId', 'PaymentId');
    }
}
