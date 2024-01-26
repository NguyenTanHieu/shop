@extends('master.main')
@section('title', $cat->name)
@section('main')
<!-- PAGE HEAD -->
<section class="page-head">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li>{{ $cat->name }}</li>
                </ul>
                <h1>{{ $cat->name }}</h1>	
            </div>
        </div>
    </div>
</section>
<!-- PAGE HEAD END -->

<!-- SHOP -->
<div class="shop-wrap">
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <aside class="shop-sidebar">
                <div class="widget-area">
                    <ul>
                        <li class="widget-container woocommerce widget_shopping_cart">
                            <h3 class="widget-title">Shoping Cart</h3>
                            <div class="widget_shopping_cart_content">
                                <ul class="cart_list product_list_widget ">
                                    <li class="mini_cart_item">
                                        <a href="#" class="remove" aria-label="Remove this item"><i class="fa fa-close" aria-hidden="true"></i></a>
                                        <a href="product.html" class="name">
                                            <img src="assets/images/cart-item-img.jpg" alt="">Espresso Premium
                                        </a><br>
                                        <span class="quantity">1 × <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>46</span>
                                        </span>
                                    </li>
                                </ul>
                                <div class="sub-total"><strong>Subtotal:</strong> <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>46</span></div>
                                <div class="total"><strong>Total:</strong> <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>46</span></div>
                                <p class="buttons">
                                    <a href="cart.html" class="button">VIEV CART</a>
                                    <a href="checkout.html" class="button checkout">CHECKOUT</a> 
                                </p>
                            </div>
                            <div class="clearfix"></div>
                        </li>
                        <li class="widget-container woocommerce widget_product_categories">
                            <h3 class="widget-title">Categories</h3>
                            <ul class="product-categories">
                               @foreach ($cats_home as  $cat)
                               <li class="cat-item">
                                <a href="{{ route('home.category',$cat->id) }}">{{ $cat->name }}</a>
                               </li>
                               @endforeach
                            </ul>
                            <div class="clearfix"></div>
                        </li>
                        <li class="widget-container woocommerce widget_price_filter">
                            <h3 class="widget-title">Filter by Price</h3>
                            <form>
                                <div class="price_slider_wrapper">
                                    <div id="slider-range"></div>
                                    <div class="amount-wrap">
                                        <label>Price:</label>
                                          <span id="amount"></span>
                                      </div>
                                      <button class="filter-btn">FILTER</button>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                        </li>
                        <li class="widget-container">
                            <h3 class="widget-title">Tags</h3>
                            <div class="tag-cloud">
                                @foreach ($tags as $tag)
                                    <a href="{{ route('home.tag', $tag) }}">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                            
                            
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
        <div class="col-md-8">
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
                    @foreach ( $cat->products as $prod )
                    <div class="col-md-6">
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