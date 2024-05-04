<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'customer_id',
        'product_id',
        'comment',
        'status',
        'created_at'
    ];

    public function customerName()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function productName()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
