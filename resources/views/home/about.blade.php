@extends('master.main')
@section('main')

	<!-- PAGE HEAD -->
    <section class="page-head">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li>About</li>
                    </ul>
                    <h1>About</h1>	
                </div>
            </div>
        </div>
    </section>
<!-- PAGE HEAD END -->

<!-- ABOUT PRODUCTS -->
<section class="about-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12"><h2>Our <span>Products</span></h2></div>
            <div class="col-md-4">
                <div class="item">
                    <div class="img-wrap"><img src="assets/images/icon1.png" width="170" alt=""></div>
                    <div class="name"><span>Natural</span> Coffee</div>
                    <p class="text">Sed sagittis sodales lobortis. Curabitur in eleifend<br> turpis, id vehicula odio. Donec pulvinar tellus<br> eget magna aliquet ultricies. </p>
                    <a href="#" class="btn btn-default">READ MORE</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item">
                    <div class="img-wrap"><img src="assets/images/icon2.png" width="170" alt=""></div>
                    <div class="name"><span>Chinese</span> Tea</div>
                    <p class="text">Sed sagittis sodales lobortis. Curabitur in eleifend<br> turpis, id vehicula odio. Donec pulvinar tellus<br> eget magna aliquet ultricies. </p>
                    <a href="#" class="btn btn-default">READ MORE</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item">
                    <div class="img-wrap"><img src="assets/images/icon3.png" width="170" alt=""></div>
                    <div class="name"><span>Sweet</span> Desserts</div>
                    <p class="text">Sed sagittis sodales lobortis. Curabitur in eleifend<br> turpis, id vehicula odio. Donec pulvinar tellus<br> eget magna aliquet ultricies. </p>
                    <a href="#" class="btn btn-default">READ MORE</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ABOUT PRODUCTS END -->

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
                    <p class="text">Sed sagittis sodales lobortis.<br> Curabitur in eleifend turpis, id vehicula odio. </p>
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
                    <p class="text">Sed sagittis sodales lobortis.<br> Curabitur in eleifend turpis, id vehicula odio. </p>
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

<!-- ABOUT MARKET -->
<section class="about-market">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>About <span>Market</span></h2>
                <p class="top-text">Sed sagittis sodales lobortis. Curabitur in eleifend turpis, id vehicula odio.<br> Donec pulvinar tellus eget magna aliquet ultricies. Praesent gravida hendrerit<br> ex, nec eleifend sem convallis vitae. </p>
            </div>
            <div class="col-md-4">
                <div class="item">
                    <div class="icon"><i class="fa fa-coffee" aria-hidden="true"></i></div>
                    <div class="text">
                        <div class="title">100% Natural Coffee</div>
                        <p>Curabitur in eleifend turpis, id vehicula odio. Donec pulvinar tellus eget magna aliquet ultricies. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item">
                    <div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
                    <div class="text">
                        <div class="title">Free Delivery</div>
                        <p>Donec pulvinar tellus eget magna aliquet ultricies. Praesent gravida hendrerit ex, nec eleifend sem convallis vitae. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item">
                    <div class="icon"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
                    <div class="text">
                        <div class="title">High Quality Product</div>
                        <p>Sed sagittis sodales lobortis. Curabitur in eleifend turpis, id vehicula odio. Donec pulvinar tellus eget magna aliquet ultricies. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ABOUT MARKET END -->

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