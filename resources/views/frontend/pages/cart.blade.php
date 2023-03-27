@extends('frontend.header')
@section('content')

<!-- .breadcumb-area start -->
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Shopping Cart</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><span>Shopping Cart</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<!-- cart-area start -->
<div class="cart-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table-responsive cart-wrap" style="display: table;">
                    <thead>
                        <tr>
                            <th class="images">Image</th>
                            <th class="product">Product</th>
                            <th class="ptice">Price</th>
                            <th class="quantity">Quantity</th>
                            <th class="total">Total</th>
                            <th class="remove">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $subtotal = 0;
                        @endphp
                        @forelse ($carts as $cart)
                            <tr>
                                <td class="images"><img src="{{ asset('image/products/thumbnail').'/'.$cart->product->thumbnail }}" alt="{{ $cart->product->slug }}"></td>
                                <td class="product">
                                    <a href="{{ route('productDetails',['id'=> $cart->product->id, 'slug' => $cart->product->slug]) }}">
                                        {{ $cart->product->title }}
                                        <br>
                                        <span class="my-0 py-0" style="font-size: 12px;">
                                            @if ($cart->color_id != NULL)
                                                {{ $cart->color->color_name }} Color
                                            @endif
                                            @if ($cart->size_id != NULL)
                                                & {{ $cart->size->size_name }} Size
                                            @endif
                                        </span>
                                    </a>
                                </td>

                                <td class="ptice">
                                    @if (App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->sale_price == NULL)
                                        ${{ App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->regular_price }}
                                    @elseif (App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->sale_price == '0')
                                        ${{ App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->regular_price }}
                                    @else
                                        <s>${{ App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->regular_price }}</s> <br>
                                        ${{ App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->sale_price }}
                                    @endif
                                </td>
                                <td class="quantity">
                                    <p>{{ $cart->quantity }}</p>
                                </td>
                                <td class="total">
                                    @if (App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->sale_price == NULL)
                                        @php
                                            $subtotal = $subtotal + App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->regular_price * $cart->quantity;
                                        @endphp
                                        ${{ App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->regular_price * $cart->quantity }}
                                    @elseif (App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->sale_price == '0')
                                        @php
                                            $subtotal = $subtotal + App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->regular_price * $cart->quantity;
                                        @endphp
                                        ${{ App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->regular_price * $cart->quantity }}
                                    @else
                                        @php
                                            $subtotal = $subtotal + App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->sale_price * $cart->quantity;
                                        @endphp
                                        ${{ App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->sale_price * $cart->quantity }}
                                    @endif
                                </td>
                                <td class="remove"><i class="fa fa-times"></i></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="50">No product to show</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="row mt-60" id="coupon-submit">
                    <div class="col-xl-4 col-lg-5 col-md-6 ">
                        <div class="cartcupon-wrap">
                            <ul class="d-flex">
                                <li><a href="{{ route('landing') }}">Continue Shopping</a></li>
                            </ul>
                            <h3>Coupon Code</h3>
                            <p>Enter Your Coupon Code if You Have One</p>
                            <div class="cupon-wrap" >
                                <input type="text" name="coupon" id="coupon-code" placeholder="Cupon Code" value="{{ $coupon }}" @if ($coupon != '') readonly @endif>
                                <button id="coupon-applied-btn" @if ($coupon != '') disabled style="background:#333;" @endif>Apply Cupon</button>
                            </div>
                            @if (session('coupon_error'))
                                <span class="text-danger">{{ session('coupon_error') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                        <div class="cart-total text-right">
                            <h3>Cart Totals</h3>
                            <ul>
                                <li><span class="pull-left">Subtotal </span>${{ $subtotal }}</li>
                                @php
                                    Cookie::queue('subtotal', $subtotal, 600);
                                    $dis = 0;
                                    $discount_ammount = 0;
                                @endphp
                                @if ($discount != 0)
                                    <li>
                                        <span class="pull-left">Discount @if ($parcentage == 'true') ({{ $discount }}%) @endif </span>
                                        @if ($parcentage == 'true')
                                            @php
                                                $dis = $discount.'%';
                                                $discount_ammount = parcentage($subtotal , $discount);
                                                $subtotal = $subtotal - $discount_ammount;
                                            @endphp
                                        @endif
                                        @if ($parcentage == NULL)
                                            @php
                                                $dis = $discount;
                                                $discount_ammount = $discount;
                                                $subtotal = $subtotal - $discount_ammount;
                                            @endphp
                                        @endif
                                        {{ '-$'.$discount_ammount }}
                                    </li>
                                @endif
                                @php
                                    Cookie::queue('discount', $dis, 600);
                                    Cookie::queue('discount_ammount', $discount_ammount, 600);
                                @endphp
                                @php
                                    $total = $subtotal;
                                    Cookie::queue('total', $total, 600);
                                @endphp
                                <li><span class="pull-left"> Total </span> ${{ $total }}</li>
                            </ul>


                            <a id="checkout-btn" href="{{ route('checkout') }}">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart-area end -->

@endsection

@section('footer_js')
<script>
    $(document).ready(function(){
        $('#coupon-applied-btn').click(function(){
            var coupon = $("#coupon-code").val();
            var redirect_link = "{{ route('Cart') }}/"+coupon;
            window.location.href = redirect_link;
        });
        $('#checkout-btn').click(function(){
            $('#checkout-form').submit();
        });
    });
</script>
@endsection
