@extends('frontend.header')
@section('content')
<style>
    .select2-container--default .select2-selection--single{
        width: 100%;
        height: 40px;
        border: 1px solid #d7d7d7;
        border-radius: 2px;
        margin-bottom: 25px;
        padding-left: 0px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 40px;
        padding-left: 12px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow b{
        margin-top: 6px;
    }
    .select2-container--open .select2-dropdown--below {
        top: -25px;
        border-color: #ddd;
    }
    .form-style input, .form-style select, .form-style textarea {
        margin-bottom: 0px;
    }
    .is-invalid {
        border-color: #f92e2e !important;
    }
</style>
   <!-- .breadcumb-area start -->
   <div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Checkout</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><span>Checkout</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<!-- checkout-area start -->
<div class="checkout-area ptb-100">
    <div class="container">
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-form form-style">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <p>Name <span class="text-danger">*</span></p>
                                <input type="text" name="name" placeholder="Enter Your Name" value="@if (old('name') == NULL) {{ sessionUser()->name }} @else {{ old('name') }}  @endif" class="@error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-12 mt-3">
                                <p>Email Address <span class="text-danger">*</span></p>
                                <input type="email" name="email" placeholder="example@mail.com" value="@if (old('email') == NULL) {{ sessionUser()->email }} @else {{ old('email') }}  @endif" class="@error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-12 mt-3">
                                <p>Phone No. <span class="text-danger" >*</span></p>
                                <input type="text" name="phone" placeholder="+(code) 45454****" class="@error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12 mt-3">
                                <p>Your Address <span class="text-danger" >*</span></p>
                                <input type="text" name="address" placeholder="Enter Your Full Address" class="@error('address') is-invalid @enderror" value="{{ old('address') }}">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-4 col-12 mt-3">
                                <p>Country <span class="text-danger">*</span></p>
                                <select name="country" id="country-list" class="@error('country') is-invalid @enderror" value="{{ old('country') }}">
                                    <option value>-- Select Country --</option>
                                    @foreach ($countries as $country)
                                        @if ($country->code == 'bd')
                                            <option value="{{ $country->code }}">{{ $country->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-4 col-12 mt-3">
                                <p>Town/City <span class="text-danger">*</span></p>
                                <select name="city" id="city-list-select" class="@error('city') is-invalid @enderror" value="{{ old('city') }}">
                                    <option value>-- Select City --</option>
                                </select>
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-4 col-12 mt-3">
                                <p>Postcode/ZIP <span class="text-danger">*</span></p>
                                <input type="number" name="post_code" placeholder="Enter Post Code / ZIP" class="@error('post_code') is-invalid @enderror" value="{{ old('post_code') }}">
                                @error('post_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12 mt-2">
                                <p>Order Notes </p>
                                <textarea name="note" placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="order-area">
                        <h3>Your Order</h3>
                        <ul class="total-cost">
                            <li>Subtotal <span class="pull-right"><strong>${{ $subtotal }}</strong></span></li>
                            @if ($discount != 0)
                                <li>Discount ({{ $discount }}) <span class="pull-right">${{ $discount_ammount }}</span> <br> <p class="text-info">( Coupon: {{ $coupon }} )</p></li>
                            @endif
                            <li>Delivery Charge <span id='deliveryChargeText'> (Inside Dhaka)</span> <span class="pull-right" id="deliveryCharge">${{ $deliveryCharge }}</span></li>
                            <li>Total<span class="pull-right">${{ $total }}</span></li>
                        </ul>
                        @error('payment_method')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <ul class="payment-method">
                            <li>
                                <input id="paypal" name="payment_method" type="radio" value="paypal">
                                <label for="paypal">Paypal</label>
                            </li>
                            <li>
                                <input id="delivery" name="payment_method" type="radio" value="cash">
                                <label for="delivery">Cash on Delivery</label>
                            </li>
                        </ul>
                        <button>Place Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- checkout-area end -->
@endsection

@section('footer_js')
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('#country-list').select2();
        $('#country-list').change(function(){
            var country_code = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('get_city_list') }}",
                data: {country_code : country_code},
                success: function(res){
                    $('#city-list-select').empty();
                    $('#city-list-select').html(res);
                }
            });
        });
        $('#city-list-select').select2();
        $('#city-list-select').change(function(){
            if($(this).val() == 'Dhaka'){
                $('#deliveryCharge').text('$10');
                $('#deliveryChargeText').text('( Inside ' + $(this).val() + ' )');
            }
            else{
                $('#deliveryCharge').text('$50');
                $('#deliveryChargeText').text('( Inside ' + $(this).val() + ' )');
            }
        });
    });
</script>
@endsection
