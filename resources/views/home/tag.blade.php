@extends('master.main')
@section('title', $tag->name)
@section('main')
<!-- PAGE HEAD -->
<section class="page-head">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li>{{ $tag->name }}</li>
                </ul>
                <h1>{{ $tag->name }}</h1>	
            </div>
        </div>
    </div>
</section>
<!-- PAGE HEAD END -->

<!-- SHOP -->
<div class="shop-wrap">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="product-list">
                <div class="row">
                    <div class="col-md-12">
                        <div class="woocommerce-toolbar">
                            <div class="row">
                                <div class="col-md-8 col-sm-6">
                                    <div class="result">Showing 1–10 of 12 results</div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <select style="width: 100%" class="woo-sort select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                        <option value="">Sort by newness</option>
                                        <option value="">Sort by score</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ( $tag->products as $prod )
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="img-wrap"><a href="product.html"><img src="assets/images/prod-img.jpg" alt=""></a></div>
                            <a href="{{ route('home.product', $prod->id) }}" class="name">{{ $prod->name }}</a>
                            <div class="text">{{$prod->description }}</div>
                            <div class="price">{{ number_format($prod->price) }}đ</div>
                            <a href="#" class="btn btn-default"><i class="fa fa-shopping-cart" aria-hidden="true"></i>add to cart</a>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-12">
                        <div class="paging-navigation">
                            <hr>
                            <div class="pagination">
                                <a href="#" class="prev disabled"><i class="fa fa-chevron-left" aria-hidden="true"></i> Prev</a>
                                <a href="#" class="page-numbers current">1</a>
                                <a href="#" class="page-numbers">2</a>
                                <a href="#" class="page-numbers">3</a>
                                <a href="#" class="page-numbers">4</a>
                                <a href="#" class="next">Next <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- SHOP END -->

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