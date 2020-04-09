<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BanglaFood extends Model
{
    protected $fillable = ['category', 'product_name', 'total_item', 'product_price', 'item_details', 'product_status', 'product_image'];
}
