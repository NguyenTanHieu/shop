@extends('master.main')
@section('title', $product->name)
@section('main')

    <!-- PAGE HEAD -->
    <section class="page-head">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home.index') }}">Home</a></li>
                        <li>{{ $product->name }}</li>
                    </ul>
                    <h1>{{ $product->name }}</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- PAGE HEAD END -->

    <!-- PRODUCT -->
    <section class="product-single">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="product-image"><img src="uploads/product/{{ $product->image }}" alt=""></div>
                </div>
                <div class="col-md-7">
                    <h3 class="name">{{ $product->name }}</h3>
                    <div class="top-price">
                        @if ($product->sale_price > 0)
                            <span><s>{{ number_format($product->price) }}đ</s></span>
                            <span>-</span>
                            <span class="price">{{ number_format($product->sale_price) }}đ</span>
                        @else
                            <span class="price">{{ number_format($product->price) }}đ</span>
                        @endif
                    </div>
                    <div class="description">{{ $product->description }}</div>
                    <div class="product-action">
                        <div class="quantity">
                            <input type="number" min="1" max="9" step="1" value="1">
                        </div>
                        <a href="#" class="btn btn-default"><i class="fa fa-shopping-cart" aria-hidden="true"></i>add
                            to cart</a>
                    </div>
                    <div class="product-info">
                        <div class="item">Category: 
                            <a href="{{ route('home.category',['cat'=> $product->category_id,'slug'=> $product->cat->slug]) }}">{{ $product->cat->name }}</a>
                        </div>
                        <div class="item">Product ID: <strong>{{ $product->id }}</strong></div>
                        <div class="item">Tags: 
                            @foreach ($tags as $tag )
                            <a href="{{ route('home.tag',$tag->id) }}">{{ $tag->name }}</a> </div> 
                            @endforeach
                           
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="woocommerce-tabs wc-tabs-wrapper">
                        <ul class="tabs wc-tabs">
                            <li class="description_tab active">
                                <a href="#tab-description">Description</a>
                            </li>
                            <li class="reviews_tab">
                                <a href="#tab-reviews">Reviews</a>
                            </li>
                        </ul>
                        <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab"
                            id="tab-description">
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h2 class="related-title">Related Products</h2>
                    <div class="row">
                       @foreach ($products as $pro)
                       <div class="col-md-3">
                        <div class="product-item">
                            <div class="img-wrap"><a href="#"><img  src="uploads/product/{{ $pro->image }}" alt="" style="width:200px"></a>
                            </div>
                            <a href="#" class="name">{{ $pro->name }}</a>
                            <div class="text">{{ $pro->description }}</div>
                            <div class="price">
                                @if(!isset($pro->sale_price))
                                <p>{{ number_format($pro->price) }}</p>
                                @else
                                <s>{{ number_format($pro->price) }}</s>- <p>{{ number_format($pro->sale_price) }}</p>
                                @endif
                              </div>
                            <a href="#" class="btn btn-default"><i class="fa fa-shopping-cart"
                                    aria-hidden="true"></i>add to cart</a>
                        </div>
                    </div>
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- PRODUCT END -->

    <!-- SUBSCRIBE FORM -->

    <section class="subscribe">
        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="top-title">Want to know about new types of coffee?</div>
                                <div class="bottom-title">Get our weekly email</div>
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <form class="subs-form">
                                    <input type="text" placeholder="Enter Your Email">
                                    <input type="submit" value="SUBMIT">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SUBSCRIBE FORM END -->

@stop()
