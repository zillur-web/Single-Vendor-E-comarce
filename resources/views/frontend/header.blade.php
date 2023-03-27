<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tohoney - Home Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v4.0.0-beta.2 css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.min.css') }}">
    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/flaticon.css') }}">
    <!-- jquery-ui.css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery-ui.css') }}">
    <!-- metisMenu.min.css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/metisMenu.min.css') }}">
    <!-- swiper.min.css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/styles.css') }}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- modernizr css -->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--Start Preloader-->
    <div class="preloader-wrap">
        <div class="spinner"></div>
    </div>
    <!-- search-form here -->
    <div class="search-area flex-style">
        <span class="closebar">Close</span>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-12">
                    <div class="search-form">
                        <form action="#">
                            <input type="text" placeholder="Search Here...">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- search-form here -->
    <!-- header-area start -->
    <header class="header-area">
        <div class="header-bottom">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                        <div class="logo">
                            <a href="{{ route('landing') }}">
                                <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block">
                        <nav class="mainmenu">
                            <ul class="d-flex">
                                <li class="{{ Route::is('landing') ? 'active' : '' }}"><a href="{{ route('landing') }}">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li>
                                    <a href="javascript:void(0);">Shop <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="shop.html">Shop Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-6 col-lg-4 col-sm-6 col-6">
                        <ul class="search-cart-wrapper d-flex">
                            <li class="search-tigger"><a href="javascript:void(0);"><i class="flaticon-search"></i></a></li>
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-like"></i> <span>2</span></a>
                                <ul class="cart-wrap dropdown_style">
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img src="{{ asset('frontend/assets/images/cart/1.jpg') }}" alt="">
                                        </div>
                                        <div class="cart-content">
                                            <a href="cart.html">Pure Nature Product</a>
                                            <span>QTY : 1</span>
                                            <p>$35.00</p>
                                            <i class="fa fa-times"></i>
                                        </div>
                                    </li>
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img src="{{ asset('frontend/assets/images/cart/3.jpg') }}" alt="">
                                        </div>
                                        <div class="cart-content">
                                            <a href="cart.html">Pure Nature Product</a>
                                            <span>QTY : 1</span>
                                            <p>$35.00</p>
                                            <i class="fa fa-times"></i>
                                        </div>
                                    </li>
                                    <li>Subtotol: <span class="pull-right">$70.00</span></li>
                                    <li>
                                        <button>Check Out</button>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-shop"></i> <span>{{ carts()->count() }}</span></a>
                                @if (carts()->count() > 0)
                                    <ul class="cart-wrap dropdown_style">
                                        @php
                                            $subtotal = 0;
                                        @endphp
                                        @foreach (carts()->get() as $cart)
                                            <li class="cart-items">
                                                <div class="cart-img">
                                                    <img src="{{ asset('image/products/thumbnail').'/'.$cart->product->thumbnail }}" alt="{{ $cart->product->title }}" style="height: 70px;width: 70px;">
                                                </div>
                                                <div class="cart-content">
                                                    <a href="cart.html">{{ $cart->product->title }}</a>
                                                    <span>QTY : {{ $cart->quantity }}</span>
                                                    <p>
                                                        @if (App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->sale_price == NULL)
                                                            @php
                                                                $subtotal = $subtotal + App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->regular_price * $cart->quantity;
                                                                @endphp
                                                            ${{ App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->regular_price }}
                                                        @elseif (App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->sale_price == '0')
                                                            @php
                                                                $subtotal = $subtotal + App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->regular_price * $cart->quantity;
                                                                @endphp
                                                            ${{ App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->regular_price }}
                                                        @else
                                                            @php
                                                                $subtotal = $subtotal + App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->sale_price * $cart->quantity;
                                                                @endphp
                                                            ${{ App\Models\ProductAttribute::where(['product_id' => $cart->product_id, 'color_id' => $cart->color_id, 'size_id' => $cart->size_id])->first()->sale_price * $cart->quantity}}
                                                        @endif
                                                    </p>
                                                    <a href=""><i class="fa fa-times"></i></a>
                                                </div>
                                            </li>
                                        @endforeach
                                        <li>Subtotol: <span class="pull-right">{{ $subtotal }}</span></li>
                                        <li>
                                            <a href="{{ route('Cart') }}" class="btn btn-outline-dark" style="background-color:#fff; color: #ef4836;">Cart View</a>
                                        </li>
                                    </ul>
                                @endif
                            </li>
                            <li style="padding-left: 10px;">
                                <ul class="d-flex account_login-area">
                                    @auth
                                        <li class="py-0">
                                            <a href="javascript:void(0);" style="font-size: 15px;"><i class="fa fa-user"></i>Welcome, {{ explode(" ", sessionUser()->name)[0] }} <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown_style"  style="top: 56px;">
                                                @can('Customer')
                                                    <li style="margin: 0px; padding: 5px 0px;"><a href="#" style="font-size:15px;">Manage My Account</a></li>
                                                    <li style="margin: 0px; padding: 5px 0px;"><a href="{{ route('customer.orders') }}" style="font-size:15px;">My Orders</a></li>
                                                    <li style="margin: 0px; padding: 5px 0px;"><a href="#" style="font-size:15px;">My Wishlist</a></li>
                                                    <li style="margin: 0px; padding: 5px 0px;"><a href="#" style="font-size:15px;">My Reviews</a></li>
                                                    <li style="margin: 0px; padding: 5px 0px;"><a href="#" style="font-size:15px;">My Cancellations</a></li>
                                                @else
                                                    <li style="margin: 0px; padding: 5px 0px;"><a href="{{ route('dashboard') }}" style="font-size:15px;">Dashboard</a></li>
                                                @endcan

                                                <li style="margin: 0px; padding: 5px 0px;">
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <a style="font-size:15px;" href="" onclick="event.preventDefault(); this.closest('form').submit();"> <i class="fas fa-sign-out-alt"></i> {{ __('Log Out') }} </a>
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    @else
                                        <li class="py-0"><a href="{{ route('login') }}" style="font-size: 15px;"> Login/Register </a></li>
                                    @endauth
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                        <div class="responsive-menu-tigger">
                            <a href="javascript:void(0);">
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
            <div class="responsive-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-block d-lg-none">
                            <ul class="metismenu">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Shop </a>
                                    <ul aria-expanded="false">
                                        <li><a href="shop.html">Shop Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
        </div>
    </header>
    <!-- header-area end -->



@yield('content')
@extends('frontend.footer')
@section('footerSection')
@endsection
