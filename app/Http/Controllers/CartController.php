<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use App\Models\Cart;
use App\Models\Coupon;
use Carbon\Carbon;

class CartController extends Controller
{

    function Cart($coupon = ""){
        $parcentage = 'NULL';
        if($coupon == ""){
            $discount = 0;
            Cookie::queue(Cookie::forget('tohoney_coupon'));
        }
        else{
            $coupon_check = Coupon::where('coupon_code', $coupon);
            if($coupon_check->exists()){
                if(Carbon::today()->format('Y-m-d') < $coupon_check->first()->coupon_validity){
                    $discount = $coupon_check->first()->coupon_ammount;
                    $parcentage = $coupon_check->first()->coupon_percentage;
                    Cookie::queue('tohoney_coupon', $coupon, 600);
                }
                else{
                    Cookie::queue(Cookie::forget('tohoney_coupon'));
                    return redirect('carts/#coupon-submit')->with('coupon_error','This coupon already expired');
                }
            }
            else{
                Cookie::queue(Cookie::forget('tohoney_coupon'));
                return redirect('carts/#coupon-submit')->with('coupon_error','This coupon dose not exists');
            }
        }

        Cookie::queue(Cookie::forget('total'));
        Cookie::queue(Cookie::forget('discount'));
        Cookie::queue(Cookie::forget('discount_ammount'));
        Cookie::queue(Cookie::forget('deliveryCharge'));
        Cookie::queue(Cookie::forget('subtotal'));

        return view('frontend.pages.cart',[
            'carts' => Cart::where('cookie_id', Cookie::get('cookie_id'))->get(),
            'discount' => $discount,
            'parcentage' => $parcentage,
            'coupon' => $coupon,
        ]);
    }

    function cartPost(Request $request){
        if($request->hasCookie('cookie_id')){
            $cookie_id =  $request->cookie('cookie_id');
        }
        else{
            $cookie_id = time().Str::random(10);
            Cookie::queue('cookie_id', $cookie_id, 1440);
        }
        if(Cart::where(['cookie_id' => $cookie_id, 'product_id' => $request->product_id])->exists()){
            if(Cart::where(['cookie_id' => $cookie_id, 'product_id' => $request->product_id, 'color_id' => $request->color_id, 'size_id' => $request->size_id])->exists()){
                Cart::where(['cookie_id' => $cookie_id, 'product_id' => $request->product_id, 'color_id' => $request->color_id, 'size_id' => $request->size_id])->increment('quantity', $request->quantity);
            }
            else{
                $cart = new Cart;
                $cart->cookie_id = $cookie_id;
                $cart->product_id = $request->product_id;
                $cart->color_id = $request->color_id;
                $cart->size_id = $request->size_id;
                $cart->quantity = $request->quantity;
                $cart->save();
            }
        }

        else{
            $cart = new Cart;
            $cart->cookie_id = $cookie_id;
            $cart->product_id = $request->product_id;
            $cart->color_id = $request->color_id;
            $cart->size_id = $request->size_id;
            $cart->quantity = $request->quantity;
            $cart->save();
        }

        return back();
    }
}
