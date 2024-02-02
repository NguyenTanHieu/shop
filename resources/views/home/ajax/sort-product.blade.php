@foreach ($products as $prod)
    <div class="col-md-6">
        <div class="product-item">
            <div class="img-wrap"><a
                    href="{{ route('home.product', ['product' => $prod->id, 'slug' => $prod->slug]) }}"><img
                        src="uploads/product/{{ $prod->image }}" style="width:250px" alt=""></a></div>
            <a href="{{ route('home.product', ['product' => $prod->id, 'slug' => $prod->slug]) }}"
                class="name">{{ $prod->name }}</a>
            <div class="text">{{ $prod->description }}</div>
            <div class="price">{{ number_format($prod->price) }}đ</div>
            <a href="#" class="btn btn-default"><i class="fa fa-shopping-cart" aria-hidden="true"></i>add to
                cart</a>
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
</div>