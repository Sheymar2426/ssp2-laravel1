<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'subcategories';
    protected $primaryKey = 'SubcategoryId'; // ✅ FIXED (small c)

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'SubcategoryName', // ✅ FIXED
        'CategoryId'
    ];

    public $timestamps = true; // you DO have timestamps
}



