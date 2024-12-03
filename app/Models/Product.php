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

    public function imageUrl(): string
    {
        return asset('images/' . $this->image_path);
    }

    public function getBy($data, $categoryID) {
        return $this->whereHas('categories', fn($q) => $q->where('category_id', $categoryID))->paginate(6);
    }

    public function details()
    {
        return $this->hasMany(ProductDetails::class);
    }

}
