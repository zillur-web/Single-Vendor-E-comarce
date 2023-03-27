<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
    function color(){
        return $this->belongsTo(Colors::class, 'color_id');
    }
    function size(){
        return $this->belongsTo(Size::class, 'size_id');
    }
}
