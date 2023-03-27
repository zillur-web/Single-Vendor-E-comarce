<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    function cart(){
        return $this->hasMany(Cart::class, 'product_id');
    }

    function subcategory(){
        return $this->belongsTo(SubCategory::class, 'category_id');
    }
    function product_attribute(){
        return $this->hasMany(ProductAttribute::class, 'product_id');
    }
    function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    function gallery_image(){
        return $this->hasMany(ProductGallery::class, 'product_id');
    }

}
