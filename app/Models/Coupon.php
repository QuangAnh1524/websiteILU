<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'value',
        'expiry_date',
    ];

    public function getExpiryDateAttribute($value){
        return Carbon::parse($this->attributes['expiry_date'])->format('Y-m-d');
    }

}
