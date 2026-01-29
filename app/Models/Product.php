<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'ProductId';
    public $timestamps = false;

    protected $fillable = [
        'Name',
        'CategoryId',
        'SubCategoryId',
        'Description',
        'Price',
        'Stock',
        'Image'
    ];

    // Relationship: Product belongs to Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryId', 'CategoryId');
    }

    // Relationship: Product belongs to SubCategory
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'SubCategoryId', 'SubCategoryId');
    }
}
