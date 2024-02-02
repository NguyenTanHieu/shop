@extends('master.main')
@section('main')
    <!-- MAIN SLIDER -->
    <section id="demo-1" class="main-slider" style="background: url('assets/images/{{ $topBanner->image }}');">
        <div class="main-slider-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-title"><span>Worldwide</span> network</div>
                        <div class="big-title">Coffee market</div>
                        <p>Sed sagittis sodales lobortis. Curabitur in eleifend turpis, id vehicula odio. Donec pulvinar
                            tellus eget<br> magna aliquet ultricies. Praesent gravida hendrerit ex, nec eleifend sem
                            convallis vitae. </p>
                        <a href="#" class="btn btn-default">READ MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN SLIDER END -->

    <!-- MAIN TOP PRODUCT -->
    <section class="top-prod-wrap">
        <div class="top-prod-types">
            <div class="container">
                <div class="row no-gutter">
                    <div class="col-md-4">
                        <div class="item first">
                            <img src="assets/images/main_icon1.png" width="150" height="150" alt="">
                            <div class="name dark"><span>Natural</span> Coffee</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item second">
                            <img src="assets/images/main_icon2.png" width="150" height="150" alt="">
                            <div class="name"><span>Chinese</span> Tea</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item third">
                            <img src="assets/images/main_icon3.png" width="150" height="150" alt="">
                            <div class="name"><span>Sweet</span> Desserts</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MAIN TOP PRODUCT END -->

    <!-- MAIN ABOUT -->
    <section class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-text">
                        <h2>About <span>Market</span></h2>
                        <p>Sed sagittis sodales lobortis. Curabitur in eleifend turpis, id vehicula odio. Donec pulvinar
                            tellus eget magna aliquet ultricies. Praesent gravida hendrerit ex, nec eleifend sem convallis
                            vitae. </p>
                        <ul class="about-slogan">
                            <li>
                                <div class="icon"><i class="fa fa-coffee" aria-hidden="true"></i></div>
                                <div class="text">
                                    <div class="title">100% Natural Coffee</div>
                                    <p>Curabitur in eleifend turpis, id vehicula odio. Donec pulvinar tellus eget magna
                                        aliquet ultricies. </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
                                <div class="text">
                                    <div class="title">Free Delivery</div>
                                    <p>Donec pulvinar tellus eget magna aliquet ultricies. Praesent gravida hendrerit ex,
                                        nec eleifend sem convallis vitae. </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
                                <div class="text">
                                    <div class="title">High Quality Product</div>
                                    <p>Sed sagittis sodales lobortis. Curabitur in eleifend turpis, id vehicula odio. Donec
                                        pulvinar tellus eget magna aliquet ultricies. </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-img"><img src="assets/images/about-img.jpg" alt=""></div>
                </div>
            </div>
        </div>
    </section>
    <!-- MAIN ABOUT END -->

    <!-- MAIN REASONS -->
    <section class="reasons parallax" style="background-image: url(assets/images/parallax.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><span>Why people</span> choose mr.Coffee</h2>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <div class="count">46</div>
                        <div class="title">Coffee Markets</div>
                        <p class="text">Sed sagittis sodales lobortis.<br> Curabitur in eleifend turpis, id vehicula odio.
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <div class="count">19</div>
                        <div class="title">Varieties of coffee</div>
                        <p class="text">Sagittis sodales lobortis. Curabitur in eleifend turpis, id vehicula odio. </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <div class="count">22</div>
                        <div class="title">Varieties of tea</div>
                        <p class="text">Sed sagittis sodales lobortis.<br> Curabitur in eleifend turpis, id vehicula odio.
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <div class="count">83</div>
                        <div class="title">Types of sweets</div>
                        <p class="text">Sagittis sodales lobortis. Curabitur in eleifend turpis, id vehicula odio. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MAIN REASONS END -->

    <!-- MAIN SHOP -->
    <section class="popular-item">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Popular items</h2>
                </div>
                <div class="col-md-12">
                    <div class="row owl-carousel shop-slider">
                        @foreach ($products as $pr)
                            <div class="item">
                                <div class="img-wrap"><a href="#"><img style="width:200px" src="uploads/product/{{ $pr->image }}"
                                            alt=""></a></div>
                                <a href="{{ route('home.product',['product'=>$pr->id,'slug'=>$pr->slug] )}}" class="name">{{ $pr->name }}</a>
                                <div class="text">{{ $pr->description }}</div>
                                <div class="price" >
                                    @if(!isset($pr->sale_price))
                                 <p>{{ number_format($pr->price) }}đ</p>
                                    @else
                                    <s>{{ number_format($pr->price) }}đ</s> - <p>{{ number_format($pr->sale_price) }}đ</p>
                                    @endif
                    
                                   @if (auth('cus')->check())
                                   <div class="favorite-action">
                                    @if ($pr->favorited)
                                        <a title="Bỏ thích"
                                            onclick="return confirm('bạn có muốn bỏ yêu thích không?')"
                                            href="{{ route('home.favorite', $pr->id) }}"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                    @else
                                        <a title="Yêu thích" href="{{ route('home.favorite', $pr->id) }}"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                    @endif
                                </div>
                                   @endif
                                 </div>
                                <a href="#" class="btn btn-default"><i class="fa fa-shopping-cart"
                                        aria-hidden="true"></i>add to cart</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MAIN SHOP END -->

    <!-- WHERE TO BUY -->
    <section class="where-buy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Where to buy</h2>
                </div>
                <div class="col-md-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#usa" aria-controls="usa" role="tab"
                                data-toggle="tab">USA</a></li>
                        <li role="presentation"><a href="#germany" aria-controls="germany" role="tab"
                                data-toggle="tab">Germany</a></li>
                        <li role="presentation"><a href="#france" aria-controls="france" role="tab"
                                data-toggle="tab">France</a></li>
                        <li role="presentation"><a href="#italy" aria-controls="italy" role="tab"
                                data-toggle="tab">Italy</a></li>
                        <li role="presentation"><a href="#portugal" aria-controls="portugal" role="tab"
                                data-toggle="tab">Portugal</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- TabPanel -->
                        <div role="tabpanel" class="tab-pane fade in active" id="usa">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>481 Goodisson str. 60544 New York City - MisterCoffee</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>3 Big Avenue 1422 Seattle</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>481 Goodisson str. 17790-60544 Washington</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>3 Big Avenue 1422 Seattle</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>481 Goodisson str. 60544 New York City - MisterCoffee</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>481 Goodisson str. 17790-60544 Washington</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- TabPanel -->
                        <div role="tabpanel" class="tab-pane fade" id="germany">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>481 Goodisson str. 60544 New York City - MisterCoffee</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>3 Big Avenue 1422 Seattle</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>481 Goodisson str. 17790-60544 Washington</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>481 Goodisson str. 60544 New York City - MisterCoffee</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>3 Big Avenue 1422 Seattle</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>481 Goodisson str. 17790-60544 Washington</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- TabPanel -->
                        <div role="tabpanel" class="tab-pane fade" id="france">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>3 Big Avenue 1422 Seattle</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>481 Goodisson str. 60544 New York City - MisterCoffee</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>481 Goodisson str. 17790-60544 Washington</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>481 Goodisson str. 60544 New York City - MisterCoffee</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>3 Big Avenue 1422 Seattle</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>481 Goodisson str. 17790-60544 Washington</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- TabPanel -->
                        <div role="tabpanel" class="tab-pane fade" id="italy">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>481 Goodisson str. 60544 New York City - MisterCoffee</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>3 Big Avenue 1422 Seattle</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>481 Goodisson str. 17790-60544 Washington</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>481 Goodisson str. 60544 New York City - MisterCoffee</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>3 Big Avenue 1422 Seattle</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>481 Goodisson str. 17790-60544 Washington</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- TabPanel -->
                        <div role="tabpanel" class="tab-pane fade" id="portugal">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>481 Goodisson str. 60544 New York City - MisterCoffee</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>3 Big Avenue 1422 Seattle</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>481 Goodisson str. 17790-60544 Washington</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>481 Goodisson str. 60544 New York City - MisterCoffee</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>3 Big Avenue 1422 Seattle</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="buy-item">
                                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                        <div class="info">
                                            <address>481 Goodisson str. 17790-60544 Washington</address>
                                            <div class="phone"><i class="fa fa-phone" aria-hidden="true"></i>+80 (041)
                                                2824 504 43</div>
                                            <a href="mailto:orders@mistercoffee.us" class="mail"><i
                                                    class="fa fa-envelope-o"
                                                    aria-hidden="true"></i>orders@mistercoffee.us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- WHERE TO BUY END -->

    <!-- MAIN REVIEWS -->
    <section class="main-reviews">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><span>What our</span> clients say</h2>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel review-slider owl-theme">
                        <div class="item">
                            <div class="review-item">
                                <p class="text">Sed sagittis sodales lobortis. Curabitur in eleifend turpis, id vehicula
                                    odio. Donec pulvinar tellus eget<br> magna aliquet ultricies. Praesent gravida hendrerit
                                    ex, nec eleifend sem convallis vitae. Sed sagittis<br> sodales lobortis. Curabitur in
                                    eleifend turpis, id vehicula odio. </p>
                                <div class="img-wrap"><img src="assets/images/review-ava.jpg" alt=""></div>
                                <div class="name">Leona Richards</div>
                                <div class="date">1 year ago</div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="review-item">
                                <p class="text">Sed sagittis sodales lobortis. Curabitur in eleifend turpis, id vehicula
                                    odio. Donec pulvinar tellus eget<br> magna aliquet ultricies. Praesent gravida hendrerit
                                    ex, nec eleifend sem convallis vitae. Sed sagittis<br> sodales lobortis. Curabitur in
                                    eleifend turpis, id vehicula odio. </p>
                                <div class="img-wrap"><img src="assets/images/review-ava.jpg" alt=""></div>
                                <div class="name">Leona Richards</div>
                                <div class="date">1 year ago</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MAIN REVIEWS END -->

    <!-- MAIN BLOG -->
    <section class="main-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Read our news</h2>
                </div>
                
               @foreach ($posts as $post)
               <div class="col-md-3">
                <div class="main-blog-item">
                    <div class="img-wrap"><a href="#"><img class="img-responsive" src="uploads/post/{{ $post->image }}"
                                alt=""></a></div>
                    <div class="info">
                        <a href="#" class="name">{{ $post->name }}</a>
                        <p class="text">{{ $post->description }} </p>
                    </div>
                    <div class="item-info">
                        <div class="left">
                            <div class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>January 2, 2017</div>
                        </div>
                        <div class="right">
                            <div class="like"><i class="fa fa-heart" aria-hidden="true"></i>12</div>
                            <div class="comm"><i class="fa fa-commenting" aria-hidden="true"></i>3</div>
                        </div>
                    </div>
                </div>
            </div>
               @endforeach
                <div class="col-md-12 text-center"><a href="#" class="btn btn-default all-blog">all news</a></div>
            </div>
        </div>
    </section>
    <!-- MAIN BLOG END -->

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
