<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'orderitems';
    public $timestamps = false;
    protected $primaryKey = 'id'; // adjust if your table has a primary key

    protected $fillable = [
        'OrderId',
        'ProductId',
        'Quantity',
        'Price'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'OrderId', 'OrderId');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductId', 'ProductId');
    }
}
