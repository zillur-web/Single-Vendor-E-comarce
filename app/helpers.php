<?php
function carts(){
    return App\Models\Cart::where('cookie_id', Cookie::get('cookie_id'));
}
function parcentage($x , $y){
    return (($x * $y) / 100);
}
function sessionUser(){
    return Auth::user();
}
function Product($product_id){
    return App\Models\Product::findOrFail($product_id);
}
function Colors($color_id){
    return App\Models\Colors::find($color_id)->color_name;
}
function Sizes($size_id){
    return App\Models\Size::find($size_id)->size_name;
}
?>
