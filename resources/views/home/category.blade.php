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
                                                <a href="#" class="remove" aria-label="Remove this item"><i
                                                        class="fa fa-close" aria-hidden="true"></i></a>
                                                <a href="product.html" class="name">
                                                    <img src="assets/images/cart-item-img.jpg" alt="">Espresso
                                                    Premium
                                                </a><br>
                                                <span class="quantity">1 × <span
                                                        class="woocommerce-Price-amount amount"><span
                                                            class="woocommerce-Price-currencySymbol">$</span>46</span>
                                                </span>
                                            </li>
                                        </ul>
                                        <div class="sub-total"><strong>Subtotal:</strong> <span
                                                class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>46</span></div>
                                        <div class="total"><strong>Total:</strong> <span
                                                class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>46</span></div>
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
                                        @foreach ($cats_home as $item)
                                            <li class="cat-item">
                                                <a
                                                    href="{{ route('home.category', ['cat' => $item->id, 'slug' => $item->slug]) }}">{{ $item->name }}
                                                </a>
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
                                            <div class="result">Showing
                                                {{ $products->firstItem() }}–{{ $products->lastItem() }} of
                                                {{ $products->total() }} results
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-6">
                                            <select id="woo-sort" style="width: 100%"
                                                class="woo-sort select2-hidden-accessible" tabindex="-1"
                                                aria-hidden="true">
                                                <option value="asc">Tăng dần</option>
                                                <option value="desc">Giảm dần</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="" id="content-product">
                                {{-- @foreach ($products as $prod)
                                    <div class="col-md-6">
                                        <div class="product-item">
                                            <div class="img-wrap"><a
                                                    href="{{ route('home.product', ['product' => $prod->id, 'slug' => $prod->slug]) }}"><img
                                                        src="uploads/product/{{ $prod->image }}" style="width:250px"
                                                        alt=""></a></div>
                                            <a href="{{ route('home.product', ['product' => $prod->id, 'slug' => $prod->slug]) }}"
                                                class="name">{{ $prod->name }}</a>
                                            <div class="text">{{ $prod->description }}</div>
                                            <div class="price">{{ number_format($prod->price) }}đ</div>
                                            <a href="#" class="btn btn-default"><i class="fa fa-shopping-cart"
                                                    aria-hidden="true"></i>add to cart</a>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="paging-navigation">
                                            <hr>
                                            <div class="pagination">
                                                {{ $products->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                @include('home.ajax.sort-product', ['products' => $products])
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
        <input type="text" name="" id="slug" value="{{ $cat->slug }}">
    </section>
    @push('scripts')
        <script>
            $(document).ready(function() {
                // Sự kiện khi select thay đổi giá trị
                $('#woo-sort').on('change', function() {
                    var selectedValue = $('#woo-sort').val();
                    var catId = {{ $cat->id }}; // Sử dụng biến $cat thay vì $prod
                    var slug = $('#slug').val() ; // Sử dụng biến $cat thay vì $prod

                    // Gửi Ajax request để sắp xếp sản phẩm
                    $.ajax({
                        url: "{{ route('home.sortProducts', ['cat'=>$cat->id, 'slug' => $cat->slug]) }}", // Thay thế 'home.category.sort' bằng tên route của bạn
                        type: "POST",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            sort: selectedValue,
                            category_id: catId
                        },
                        success: function(data) {
                            // Hiển thị sản phẩm mới tải được
                            if (data.status == 200) {
                                $('#content-product').html(data.html);
                            }
                        },
                        error: function(error) {
                            console.error(
                                'Error occurred while sorting products. Check console for details.'
                            );
                        }
                    });
                });
            });
        </script>
    @endpush

    <!-- SUBSCRIBE FORM END -->
@stop()
