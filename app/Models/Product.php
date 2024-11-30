<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'sale',
        'price',
        'image_path'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_product', 'product_id',
            'category_id');
    }
}
