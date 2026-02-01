<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'orderitems';
    protected $primaryKey = 'OrderItemId';
    protected $fillable = ['OrderId','ProductId','Quantity','Price'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'OrderId', 'OrderId');
    }
}