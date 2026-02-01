<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'OrderId';
    protected $fillable = ['CustomerId', 'TotalAmount', 'Status', 'OrderDate'];

    public function items()
    {
        // Specify foreign key and local key
        return $this->hasMany(OrderItem::class, 'OrderId', 'OrderId');
    }
}