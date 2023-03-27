<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory,SoftDeletes;

    function category(){
        return $this->belongsTo(Category::class);
    }
    function product(){
        return $this->hasMany(Product::class,'subcategory_id');
    }
}
