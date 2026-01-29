<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'subcategories';
    protected $primaryKey = 'SubCategoryId';
    public $timestamps = true;

    protected $fillable = [
        'SubCategoryName',
        'CategoryId'
    ];

    // Relationship: SubCategory belongs to Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryId', 'CategoryId');
    }

    // Relationship: SubCategory has many products
    public function products()
    {
        return $this->hasMany(Product::class, 'SubCategoryId', 'SubCategoryId');
    }
}
