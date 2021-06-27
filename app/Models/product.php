<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_id',
        'p_taste',
        'p_price_gram',
        'p_stock_gram',
        'p_status',

    ];

}
