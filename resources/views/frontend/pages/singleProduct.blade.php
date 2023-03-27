@extends('frontend.header')

@section('content')

    <style>
        .item {
            border: 1px solid #ddd;
            padding: 4px;
            border-radius: 4px;
        }
        .owl-carousel .owl-item img{
            height: 519px !important;
        }
        .featured-product-content p {
            color: #025d9f;
        }


        @media only screen and (max-width: 576px) {
            .owl-carousel .owl-item img{
                height: 350px !important;
            }
        }
    </style>
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shop Page</h2>
                        <ul>
                            <li><a href="{{ route('landing') }}">Home</a></li>
                            <li><span>Shop</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- single-product-area start-->
    <div class="single-product-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-single-img">
                        <div class="product-active owl-carousel">
                            <div class="item">
                                <img src="{{ asset("image/products/thumbnail/$product->thumbnail") }}" alt="">
                            </div>
                            @php
                                $image_show = 'NO';
                            @endphp
                            @foreach ($product->gallery_image as $gallery)
                                @if ($gallery->image_name != NULL)
                                    @php
                                        $image_show = 'YES';
                                    @endphp
                                @endif
                            @endforeach
                            @if ($image_show == 'YES')
                                @foreach ($product->gallery_image as $gallery)
                                    <div class="item">
                                        <img src="{{ asset("image/products/gallery/$gallery->image_name") }}" alt="{{ $product->slug }}">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="product-thumbnil-active  owl-carousel">
                            @if ($image_show == 'YES')
                                <div class="item">
                                    <img style="height: 115px !important;" src="{{ asset("image/products/thumbnail/$product->thumbnail") }}" alt="{{ $product->slug }}">
                                </div>
                                @foreach ($product->gallery_image as $gallery)
                                    <div class="item">
                                        <img style="height: 115px !important;" src="{{ asset("image/products/gallery/$gallery->image_name") }}" alt="{{ $product->slug }}">
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-single-content">
                        <h3>{{ $product->title }}</h3>
                        <div class="rating-wrap fix">
                            @if (collect($product->product_attribute)->min('sale_price') == NULL)
                                <span class="pull-left PriceOfSize">${{ collect($product->product_attribute)->min('regular_price') }}</span>
                            @elseif(collect($product->product_attribute)->min('sale_price') == 0)
                                <span class="pull-left PriceOfSize">${{ collect($product->product_attribute)->min('regular_price') }}</span>
                            @elseif(collect($product->product_attribute)->min('regular_price') == collect($product->product_attribute)->min('sale_price'))
                                <span class="pull-left PriceOfSize">${{ collect($product->product_attribute)->min('regular_price') }}</span>
                            @else
                                <span class="pull-left PriceOfSize">${{ collect($product->product_attribute)->min('sale_price') }}</span>
                                <br>
                                <s> ${{ collect($product->product_attribute)->min('regular_price') }} </s> <span class="ml-2">  -{{ round((collect($product->product_attribute)->min('regular_price')-collect($product->product_attribute)->min('sale_price'))/collect($product->product_attribute)->min('regular_price')*100, 0)  }}%</span>
                            @endif


                            <ul class="rating pull-right">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li>(05 Customar Review)</li>
                            </ul>
                        </div>

                        <div style="margin-bottom: 12px;">
                            <?php
                                echo $product->summary;
                            ?>
                        </div>
                        @php
                            $totalQuantity = '0';
                            foreach($product->product_attribute as $val){
                                $totalQuantity = $totalQuantity + $val->quantity;
                            }
                        @endphp
                        <form action="{{ route('cartPost') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" id="set_color_id" name="color_id" value="">
                            <input type="hidden" id="set-size-id" name="size_id" value="">
                            <ul class="input-style">
                                <li class="quantity cart-plus-minus">
                                    <input name="quantity" id="quantity" type="text" value="1"/>
                                </li>
                                <li><button type="submit" id="add-card-id">Add To Cart</button></li>
                            </ul>
                        </form>


                        <p class="available text-info mb-2">Available : {{ $totalQuantity }}</p>
                        @php
                            $show = 'NO';
                        @endphp
                        @foreach ($colorGroup as $gcolor1)
                            @if ($gcolor1[0]->color_id != NULL)
                                @php
                                    $show = 'YES';
                                @endphp
                            @endif
                        @endforeach
                        @if ($show == 'YES')
                            <ul class="cetagory mb-1">
                                <li>Colors : </li>
                                @foreach ($colorGroup as $gcolor)
                                    <li>
                                        <input type="radio" class="color_id ml-2" name="SIZE_ID" data-proudct="{{ $product->id }}" id="cid{{ $gcolor[0]->id }}" value="{{ $gcolor[0]->colors->id }}">
                                        <label for="cid{{ $gcolor[0]->id }}">{{ $gcolor[0]->colors->color_name }} </label>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="sizeadd my-0 py-0"></div>

                        <ul class="cetagory">
                            <li>Categories :</li>
                            <li><a href="">{{ $product->category->category_name }}</a></li>
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
            <div class="row mt-60">
                <div class="col-12">
                    <div class="single-product-menu">
                        <ul class="nav">
                            <li><a class="active" data-toggle="tab" href="#description">Description</a> </li>
                            <li><a data-toggle="tab" href="#tag">Faq</a></li>
                            <li><a data-toggle="tab" href="#review">Review</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="description">
                            <div class="description-wrap">
                                {{-- <style>
                                    ul{
                                        list-style: disc;
                                    }
                                </style> --}}
                                <?php echo $product->description; ?>
                            </div>
                        </div>
                        <div class="tab-pane" id="tag">
                            <div class="faq-wrap" id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5><button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">General Inquiries ?</button> </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5><button class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">How To Use ?</button></h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5><button class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Shipping & Delivery ?</button></h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingfour">
                                        <h5><button class="collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">Additional Information ?</button></h5>
                                    </div>
                                    <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingfive">
                                        <h5><button class="collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">Return Policy ?</button></h5>
                                    </div>
                                    <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="review">
                            <div class="review-wrap">
                                <ul>
                                    <li class="review-items">
                                        <div class="review-img">
                                            <img src="assets/images/comment/1.png" alt="">
                                        </div>
                                        <div class="review-content">
                                            <h3><a href="#">GERALD BARNES</a></h3>
                                            <span>27 Jun, 2019 at 2:30pm</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                            <ul class="rating">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="review-items">
                                        <div class="review-img">
                                            <img src="assets/images/comment/2.png" alt="">
                                        </div>
                                        <div class="review-content">
                                            <h3><a href="#">Olive Oil</a></h3>
                                            <span>15 may, 2019 at 2:30pm</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                            <ul class="rating">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="review-items">
                                        <div class="review-img">
                                            <img src="assets/images/comment/3.png" alt="">
                                        </div>
                                        <div class="review-content">
                                            <h3><a href="#">Nature Honey</a></h3>
                                            <span>14 janu, 2019 at 2:30pm</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                            <ul class="rating">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="add-review">
                                <h4>Add A Review</h4>
                                <div class="ratting-wrap">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>task</th>
                                                <th>1 Star</th>
                                                <th>2 Star</th>
                                                <th>3 Star</th>
                                                <th>4 Star</th>
                                                <th>5 Star</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>How Many Stars?</td>
                                                <td>
                                                    <input type="radio" name="a" />
                                                </td>
                                                <td>
                                                    <input type="radio" name="a" />
                                                </td>
                                                <td>
                                                    <input type="radio" name="a" />
                                                </td>
                                                <td>
                                                    <input type="radio" name="a" />
                                                </td>
                                                <td>
                                                    <input type="radio" name="a" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <h4>Name:</h4>
                                        <input type="text" placeholder="Your name here..." />
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <h4>Email:</h4>
                                        <input type="email" placeholder="Your Email here..." />
                                    </div>
                                    <div class="col-12">
                                        <h4>Your Review:</h4>
                                        <textarea name="massage" id="massage" cols="30" rows="10" placeholder="Your review here..."></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn-style">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single-product-area end-->
    <!-- featured-product-area start -->
    <div class="featured-product-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-left">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="col-lg-3 col-sm-6 col-12 m-0 p-2 ">
                        <div class="featured-product-wrap product-wrap mb-1">
                            <div class="featured-product-img">
                                <img src="{{ asset("image/products/thumbnail/$relatedProduct->thumbnail") }}" alt="{{ $relatedProduct->slug }}">
                            </div>
                            <div class="featured-product-content">
                                <div class="row">
                                    <div class="col-7">
                                        <h3><a href="{{ route('productDetails',['id'=>$relatedProduct->id, 'slug' => $relatedProduct->slug]) }}">{{ $relatedProduct->title }}</a></h3>
                                        @if (collect($relatedProduct->product_attribute)->min('sale_price') == NULL)
                                            <p class="pull-left PriceOfSize">${{ collect($relatedProduct->product_attribute)->min('regular_price') }}</p>
                                        @elseif(collect($relatedProduct->product_attribute)->min('sale_price') == 0)
                                            <p class="pull-left PriceOfSize">${{ collect($relatedProduct->product_attribute)->min('regular_price') }}</p>
                                        @elseif(collect($relatedProduct->product_attribute)->min('regular_price') == collect($product->product_attribute)->min('sale_price'))
                                            <p class="pull-left PriceOfSize">${{ collect($relatedProduct->product_attribute)->min('regular_price') }}</p>
                                        @else
                                            <p class="pull-left PriceOfSize">${{ collect($relatedProduct->product_attribute)->min('sale_price') }}</p>
                                            <br>
                                            <s> ${{ collect($relatedProduct->product_attribute)->min('regular_price') }} </s> <span class="ml-2">  -{{ round((collect($product->product_attribute)->min('regular_price')-collect($product->product_attribute)->min('sale_price'))/collect($product->product_attribute)->min('regular_price')*100, 0)  }}%</span>
                                        @endif
                                    </div>
                                    <div class="col-5 text-right">
                                        <ul>
                                            <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                            <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- featured-product-area end -->
@endsection
@section('footer_js')
    <script>
        $('.color_id').change(function(){
            var colorId = $(this).val();
            $('#set_color_id').val(colorId);
            var producdId = $(this).attr('data-proudct');
            $.ajax({
                type: "GET",
                url: "{{ url('/get/color/size') }}/"+ producdId + '/' + colorId,
                success:function(res){
                    $('.sizeadd').html(res);
                    $('.sizeCheck').change(function(){
                        var price = $(this).attr('data-price');
                        var quantity = $(this).attr('data-quantity');

                        $('#set-size-id').val($(this).attr('data-size'));

                        $('.PriceOfSize').html('$'+price);
                        if(quantity != 0){
                            $('.available').html('Available : '+quantity);
                            $('#set-stock').val(quantity);
                            $('#add-card-id').removeAttr('disabled','disabled');
                            $('#add-card-id').removeAttr('style','background: #955151;');
                        }
                        else{
                            $('.available').html('Not Available');
                            $('#add-card-id').attr('disabled','disabled');
                            $('#add-card-id').attr('style','background: #955151;');
                        }
                    });
                }
            });
        });
    </script>
@endsection

