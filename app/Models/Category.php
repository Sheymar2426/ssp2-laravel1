<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'CategoryId';
    public $timestamps = true;

    protected $fillable = [
        'CategoryName'
    ];

    // Relationship: Category has many subcategories
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'CategoryId', 'CategoryId');
    }

    // Relationship: Category has many products
    public function products()
    {
        return $this->hasMany(Product::class, 'CategoryId', 'CategoryId');
    }
}

