<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'customer_id',
        'product_id',
        'qty',
        'price'
    ];

    public function prod()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
