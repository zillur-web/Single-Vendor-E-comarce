<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Colors extends Model
{
    use HasFactory,SoftDeletes;
    function product(){
        return $this->hasMany(Product::class, 'color_id');
    }
    function cart(){
        return $this->hasMany(Cart::class, 'color_id');
    }
}
