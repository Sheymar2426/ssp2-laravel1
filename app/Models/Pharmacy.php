<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $table = 'pharmacy';
    protected $primaryKey = 'ProductId';

    protected $fillable = [
        'Name',
        'Description',
        'Price',
        'Stock',
        'Image'
    ];
}
