<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'start_time',
        'expired_time',
        'promotion_percent',
        'promotion_quantity',
        'active'
    ];
}
