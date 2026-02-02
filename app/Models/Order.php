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
        
        return $this->hasMany(OrderItem::class, 'OrderId', 'OrderId');
    }
}