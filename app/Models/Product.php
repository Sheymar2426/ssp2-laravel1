<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';         // your table name
    protected $primaryKey = 'ProductId';  // your PK
    public $timestamps = false;           // if your table doesn't have created_at/updated_at
    protected $fillable = [
        'Name', 'Price', 'Stock', 'Image', 'CategoryId', 'SubCategoryId'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryId', 'CategoryId');
    }

    public function subcategory()
    {
        return $this->belongsTo(\App\Models\SubCategory::class, 'SubCategoryId', 'SubCategoryId');
    }
}

