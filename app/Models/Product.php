<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 
        'item_type',
        'product_name', 
        'product_price', 
        'product_type', 
        'total_items',
        'item_details',
        'product_image',
        'product_status'
    ];
}
