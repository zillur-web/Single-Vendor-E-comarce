<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutForm;
use App\Models\BillingDetails;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\OderDetails;
use App\Models\OderSummery;
use App\Models\ProductAttribute;
use Doctrine\Inflector\Rules\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cookie;
use Khsing\World\World;
use Khsing\World\Models\Country;

class CheckoutController extends Controller
{
    public function __construct(){
        // is Login or Not
        $this->middleware('auth');
        // is customer or not
        $this->middleware('iscustomer');
    }
    public function checkout(){
        $coupon = Cookie::get('tohoney_coupon');

        Cookie::queue(Cookie::forget('deliveryCharge'));

        if(Cookie::get('cookie_id') == false){
            abort(404);
        }
        if((Cookie::get('subtotal') == false)){
            abort(404);
        }

        $parcentage = 'NULL';
        if($coupon == ""){
            $discount = 0;
        }
        else{
            $coupon_check = Coupon::where('coupon_code', $coupon);
            if($coupon_check->exists()){
                if(Carbon::today()->format('Y-m-d') <! $coupon_check->first()->coupon_validity){
                    return redirect('carts/#coupon-submit')->with('coupon_error','This coupon already expired');
                }
            }
            else{
                return redirect('carts/#coupon-submit')->with('coupon_error','This coupon dose not exists');
            }
        }

        $deliveryCharge = '10';

        Cookie::queue(Cookie::forget('deliveryCharge'));
        Cookie::queue('deliveryCharge', $deliveryCharge, 600);
        return view('frontend.pages.checkout',[
            'countries' => World::Countries(),
            'subtotal' => Cookie::get('subtotal'),
            'discount' => Cookie::get('discount'),
            'coupon' => Cookie::get('tohoney_coupon'),
            'discount_ammount' => Cookie::get('discount_ammount'),
            'deliveryCharge' => $deliveryCharge,
            'total' => Cookie::get('total')+$deliveryCharge,
        ]);

    }

    public function get_city_list(Request $request){
        $country = Country::getByCode($request->country_code);
        $options = "<option value>-- Select One --</option>";

        foreach($country->children() as $city){
            $options .= "<option value='".$city->name."'>".$city->name."</option>";
        }
        echo $options;
    }

    public function store(CheckoutForm $request){
        if(Cookie::get('cookie_id') == false){
            abort(404);
        }

        if($request->city == 'Dhaka'){
            $deliveryCharge = '10';
        }
        else{
            $deliveryCharge = '50';
        }


        $cookie_id = Cookie::get('cookie_id');
        $subtotal = Cookie::get('subtotal');
        $total = Cookie::get('total') + $deliveryCharge;
        $tohoney_coupon = Cookie::get('tohoney_coupon');
        $discount_ammount = Cookie::get('discount_ammount');



        $billingDetails = BillingDetails::create($request->except('_token', 'country')+ [
            'user_id' => sessionUser()->id,
            'country' => World::getByCode($request->country)->name,
        ]);

        $OderSummery = OderSummery::create([
            'billing_details_id' => $billingDetails->id,
            'coupon' => $tohoney_coupon,
            'total' => $total,
            'discount' => $discount_ammount,
            'subtotal' => $subtotal,
            'delivery_charge' => $deliveryCharge,
        ]);

        $carts = Cart::where('cookie_id', $cookie_id)->get();
        foreach ($carts as $value) {
            $product_attr = ProductAttribute::where(['product_id' => $value->product_id, 'color_id' => $value->color_id, 'size_id' => $value->size_id])->get();

            foreach ($product_attr as $attr){
                if(($attr->sale_price != NULL) || ($attr->sale_price != 0)){
                    $unit_price = $attr->sale_price;
                }
                else{
                    $unit_price = $attr->regular_price;
                }
            }

            $OderDetails = OderDetails::create([
                'billing_details_id' => $OderSummery->id,
                'product_id' => $value->product_id,
                'color_id' => $value->color_id,
                'size_id' => $value->size_id,
                'quantity' => $value->quantity,
                'price' => $unit_price,
            ]);

            ProductAttribute::where([
                'product_id' => $value->product_id,
                'color_id' => $value->color_id,
                'size_id' => $value->size_id,
            ])->decrement('quantity', $value->quantity);

            $value->forceDelete();
            Cookie::queue(Cookie::forget('cookie_id'));
        }

        if(Cookie::get('tohoney_coupon') == true){
            Coupon::where('coupon_code', Cookie::get('tohoney_coupon'))->decrement('limit', 1);
        }
        return redirect()->route('landing');
    }
}
