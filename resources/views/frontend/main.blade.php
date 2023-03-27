@extends('frontend.header')
@section('content')

<!-- slider-area start -->
<div class="slider-area">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide overlay">
                <div class="single-slider slide-inner slide-inner1">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-lg-9 col-12">
                                <div class="slider-content">
                                    <div class="slider-shape">
                                        <h2 data-swiper-parallax="-500">Amazing Pure Nature Hohey</h2>
                                        <p data-swiper-parallax="-400">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                                        <a href="shop.html" data-swiper-parallax="-300">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide-inner slide-inner7">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-lg-9 col-12">
                                <div class="slider-content">
                                    <div class="slider-shape">
                                        <h2 data-swiper-parallax="-500">Amazing Pure Nature Coconut Oil</h2>
                                        <p data-swiper-parallax="-400">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                                        <a href="shop.html" data-swiper-parallax="-300">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide-inner slide-inner8">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-lg-9 col-12">
                                <div class="slider-content">
                                    <div class="slider-shape">
                                        <h2 data-swiper-parallax="-500">Amazing Pure Nut Oil</h2>
                                        <p data-swiper-parallax="-400">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                                        <a href="shop.html" data-swiper-parallax="-300">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<!-- slider-area end -->
<!-- featured-area start -->
<div class="featured-area featured-area2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="featured-active2 owl-carousel next-prev-style">
                    <div class="featured-wrap">
                        <div class="featured-img">
                            <img src="{{ asset('frontend/assets/images/featured/6.jpg') }}" alt="">
                            <div class="featured-content">
                                <a href="shop.html">Pure Honey</a>
                            </div>
                        </div>
                    </div>
                    <div class="featured-wrap">
                        <div class="featured-img">
                            <img src="{{ asset('frontend/assets/images/featured/7.jpg') }}" alt="">
                            <div class="featured-content">
                                <a href="shop.html">Mustard Oil</a>
                            </div>
                        </div>
                    </div>
                    <div class="featured-wrap">
                        <div class="featured-img">
                            <img src="{{ asset('frontend/assets/images/featured/8.jpg') }}" alt="">
                            <div class="featured-content">
                                <a href="shop.html">Olive Oil</a>
                            </div>
                        </div>
                    </div>
                    <div class="featured-wrap">
                        <div class="featured-img">
                            <img src="{{ asset('frontend/assets/images/featured/6.jpg') }}" alt="">
                            <div class="featured-content">
                                <a href="shop.html">Pure Honey</a>
                            </div>
                        </div>
                    </div>
                    <div class="featured-wrap">
                        <div class="featured-img">
                            <img src="{{ asset('frontend/assets/images/featured/8.jpg') }}" alt="">
                            <div class="featured-content">
                                <a href="shop.html">Olive Oil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- featured-area end -->
<!-- start count-down-section -->
{{-- <div class="count-down-area count-down-area-sub">
    <section class="count-down-section section-padding parallax" data-speed="7">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <h2 class="big">Deal Of the Day <span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</span></h2>
                </div>
                <div class="col-12 col-lg-12 text-center">
                    <div class="count-down-clock text-center">
                        <div id="clock">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
</div> --}}
<!-- end count-down-section -->
<!-- product-area start -->
{{-- <div class="product-area product-area-2">
    <div class="fluid-container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Best Seller</h2>
                    <img src="{{ asset('frontend/assets/images/section-title.png') }}" alt="">
                </div>
            </div>
        </div>
        <ul class="row mx-0">
            <li class="col-xl-2 col-lg-3 col-sm-4 col-6 px-0">
                <div class="product-wrap mx-1" style="border: 1px solid #ddd; padding: 12px 12px; border-radius: 4px;">
                    <div class="product-img">
                        <img src="{{ asset('frontend/assets/images/product/1.jpg') }}" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Nature Honey</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-2 col-lg-3 col-sm-4 col-6 px-0">
                <div class="product-wrap mx-1" style="border: 1px solid #ddd; padding: 12px 12px; border-radius: 4px;">
                    <div class="product-img">
                        <img src="{{ asset('frontend/assets/images/product/2.jpg') }}" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Olive Oil</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-2 col-lg-3 col-sm-4 col-6 px-0">
                <div class="product-wrap mx-1" style="border: 1px solid #ddd; padding: 12px 12px; border-radius: 4px;">
                    <div class="product-img">
                        <img src="{{ asset('frontend/assets/images/product/3.jpg') }}" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Olive Oil</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-2 col-lg-3 col-sm-4 col-6 px-0">
                <div class="product-wrap mx-1" style="border: 1px solid #ddd; padding: 12px 12px; border-radius: 4px;">
                    <div class="product-img">
                        <img src="{{ asset('frontend/assets/images/product/4.jpg') }}" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Coconut Oil</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-2 col-lg-3 col-sm-4 col-6 px-0">
                <div class="product-wrap mx-1" style="border: 1px solid #ddd; padding: 12px 12px; border-radius: 4px;">
                    <div class="product-img">
                        <img src="{{ asset('frontend/assets/images/product/1.jpg') }}" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Nature Honey</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-2 col-lg-3 col-sm-4 col-6 px-0">
                <div class="product-wrap mx-1" style="border: 1px solid #ddd; padding: 12px 12px; border-radius: 4px;">
                    <div class="product-img">
                        <img src="{{ asset('frontend/assets/images/product/2.jpg') }}" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Olive Oil</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-2 col-lg-3 col-sm-4 col-6 px-0">
                <div class="product-wrap mx-1" style="border: 1px solid #ddd; padding: 12px 12px; border-radius: 4px;">
                    <div class="product-img">
                        <img src="{{ asset('frontend/assets/images/product/3.jpg') }}" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Olive Oil</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-2 col-lg-3 col-sm-4 col-6 px-0">
                <div class="product-wrap mx-1" style="border: 1px solid #ddd; padding: 12px 12px; border-radius: 4px;">
                    <div class="product-img">
                        <img src="{{ asset('frontend/assets/images/product/4.jpg') }}" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Coconut Oil</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-2 col-lg-3 col-sm-4 col-6 px-0">
                <div class="product-wrap mx-1" style="border: 1px solid #ddd; padding: 12px 12px; border-radius: 4px;">
                    <div class="product-img">
                        <img src="{{ asset('frontend/assets/images/product/1.jpg') }}" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Nature Honey</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-2 col-lg-3 col-sm-4 col-6 px-0">
                <div class="product-wrap mx-1" style="border: 1px solid #ddd; padding: 12px 12px; border-radius: 4px;">
                    <div class="product-img">
                        <img src="{{ asset('frontend/assets/images/product/2.jpg') }}" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Olive Oil</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-2 col-lg-3 col-sm-4 col-6 px-0">
                <div class="product-wrap mx-1" style="border: 1px solid #ddd; padding: 12px 12px; border-radius: 4px;">
                    <div class="product-img">
                        <img src="{{ asset('frontend/assets/images/product/3.jpg') }}" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Olive Oil</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="col-xl-2 col-lg-3 col-sm-4 col-6 px-0">
                <div class="product-wrap mx-1" style="border: 1px solid #ddd; padding: 12px 12px; border-radius: 4px;">
                    <div class="product-img">
                        <img src="{{ asset('frontend/assets/images/product/4.jpg') }}" alt="">
                        <div class="product-icon flex-style">
                            <ul>
                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">Coconut Oil</a></h3>
                        <p class="pull-left">$125

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div> --}}
<!-- product-area end -->
<!-- product-area start -->
<div class="product-area">
    <div class="fluid-container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Our Latest Product</h2>
                    <img src="{{ asset('frontend/assets/images/section-title.png') }}" alt="">
                </div>
            </div>
        </div>
        <ul class="row mx-0">

            @foreach ($LatestsProduct as $product)
                <li class="col-xl-2 col-lg-3 col-sm-4 col-6 px-0">
                    <div class="product-wrap mx-1">
                        <div class="product-img">
                            <span>Sale</span>
                            <img src="{{ asset('image/products/thumbnail/'.$product->thumbnail) }}" alt="{{ $product->title }}">
                            <div class="product-icon flex-style">
                                <ul>
                                    <li><a  href="{{ route('productDetails', ['id'=> $product->id, 'slug'=> $product->slug]) }}"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                    {{-- <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{ route('productDetails', ['id'=> $product->id, 'slug'=> $product->slug]) }}">{{ $product->title }}</a></h3>

                            @if (collect($product->product_attribute)->min('sale_price') == NULL)
                                <p class="pull-left">
                                    ${{ collect($product->product_attribute)->min('regular_price') }}
                                </p>
                            @elseif(collect($product->product_attribute)->min('sale_price') == 0)
                                <p class="pull-left">
                                   ${{ collect($product->product_attribute)->min('regular_price') }}
                                </p>
                            @elseif(collect($product->product_attribute)->min('regular_price') == collect($product->product_attribute)->min('sale_price'))
                                <p class="pull-left">
                                   ${{ collect($product->product_attribute)->min('regular_price') }}
                                </p>
                            @else
                                <p class="pull-left">
                                    ${{ collect($product->product_attribute)->min('sale_price') }}
                                </p>
                                <br>
                                <s> ${{ collect($product->product_attribute)->min('regular_price') }} </s> <span class="ml-2">  -{{ round((collect($product->product_attribute)->min('regular_price')-collect($product->product_attribute)->min('sale_price'))/collect($product->product_attribute)->min('regular_price')*100, 0)  }}%</span>
                            @endif
                            <ul class="pull-right d-flex">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-half-o"></i></li>
                            </ul>
                        </div>
                    </div>
                </li>
                {{-- <!-- Modal area start -->
                <div class="modal fade" id="exampleModalCenter{{ $product->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-body d-flex">
                                <div class="product-single-img w-50">
                                    <img src="{{ asset('image/products/thumbnail/'.$product->thumbnail) }}" alt="{{ $product->title }}">
                                </div>
                                <div class="product-single-content w-50">
                                    <h3>{{ $product->title }}</h3>
                                    <div class="rating-wrap fix">
                                        <span class="pull-left">$219.56</span>
                                        <ul class="rating pull-right">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li>(05 Customar Review)</li>
                                        </ul>
                                    </div>
                                    <p>{{ $product->summary }}</p>
                                    <ul class="input-style">
                                        <li class="quantity cart-plus-minus">
                                            <input type="text" value="1" />
                                        </li>
                                        <li><a href="cart.html">Add to Cart</a></li>
                                    </ul>
                                    <ul class="cetagory">
                                        <li>Categories:</li>
                                        <li><a href="#">Honey,</a></li>
                                        <li><a href="#">Olive Oil</a></li>
                                    </ul>
                                    <ul class="socil-icon">
                                        <li>Share :</li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal area start --> --}}
            @endforeach
            <li class="col-12 text-center">
                <a class="loadmore-btn" href="javascript:void(0);">Load More</a>
            </li>
        </ul>
    </div>
</div>
<!-- product-area end -->


@endsection
