<?php

namespace App\Http\Controllers;

use App\Models\BillingDetails;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\OderSummery;
use App\Models\OderDetails;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class FronendController extends Controller
{
    function landing(){
        return view('frontend.main', [
            'LatestsProduct' => Product::latest()->limit(24)->get(),
        ]);
    }
    function productDetails($id, $slug){
        $product = Product::where(['id'=>$id,'slug' =>$slug])->first();
        $attr = ProductAttribute::where('product_id', $product->id)->get();
        $colorGroup = collect($attr)->groupBy('color_id');

        $relatedProducts = Product::where('category_id', '=', $product->category_id)->where('category_id', '!=', $product->id)->inRandomOrder()->limit(8)->get();

        return view('frontend.pages.singleProduct',[
            'product' => $product,
            'colorGroup' => $colorGroup,
            'relatedProducts' => $relatedProducts,
        ]);
    }
    function GetColorSize($productId, $colorId){
        $output = '';

        $sizes = ProductAttribute::with(['product','colors','size'])->where(['product_id' => $productId,'color_id' => $colorId])->get();
        if($sizes == true){
            $output = $output.'<ul class="cetagory mb-1"><li>Sizes : </li><li> ';
            foreach($sizes as $key => $value){
                if($value->sale_price == NULL){
                    $price = $value->regular_price;
                }
                elseif($value->sale_price == 0){
                    $price = $value->regular_price;
                }
                else{
                    $price = $value->sale_price;
                }
                $output = $output.'<input type="radio" class="sizeCheck ml-3" name="COLOR_ID" data-size="'.$value->size_id.'" data-quantity="'.$value->quantity.'" data-price="'.$price.'" id="sizeId" value="'.$value->size_id.'"> <label for="size">'.$value->size->size_name.'</label>';
            }
            $output = $output.'</li></ul>';
        }

        // return response()->json($sizes);

        echo $output;
    }

    public function CoustomerOrders(){
        return view('frontend.pages.orders',[
            'orders' => BillingDetails::where('user_id', Auth::id())->get(),
        ]);
    }

    public function CoustomerOrdersInvoiceDownload($id) {
        $BillingDetails = BillingDetails::find($id);
        $summery = OderSummery::where('billing_details_id', $id)->first();
        $OderDetails = OderDetails::where('billing_details_id',$id)->get();


        $pdf = Pdf::loadView('invoice.customer.order-invoice', [
            'data' => $BillingDetails,
            'details_table' => $OderDetails,
            'summery' => $summery,
        ]);
        return $pdf->download('customer-invoice-id-'.$id.'.pdf');
        // return view('invoice.customer.order-invoice',[
        //     'data' => $BillingDetails,
        //     'details_table' => $OderDetails,
        //     'summery' => $summery,
        // ]);
    }


}
