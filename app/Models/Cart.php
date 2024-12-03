<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function cartProducts()
    {
        return $this->hasMany(CartProduct::class);
    }


    public function getBy($userID)
    {
        return Cart::whereUserId($userID)->first();
    }

    public function firtOrCreateBy($userID) {
        $cart = $this->getBy($userID);
        if (!$cart) {
            $cart = Cart::create(['user_id' => $userID]);
        }
        return $cart;
    }

}
