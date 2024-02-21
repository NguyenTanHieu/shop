@extends('master.main')
@section('main')
<!-- PAGE HEAD -->
<section class="page-head">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ route('home.index') }}">Home</a></li>
					<li>Shopping cart</li>
				</ul>
				<h1>Shopping cart</h1>
			</div>
		</div>
	</div>
</section>
<!-- PAGE HEAD END -->

<!-- CONTACTS -->
<div class="contact-wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>image</th>
                            <th>name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $item)
                            <tr>
                                <td scope="row">{{ $loop->index + 1 }}</td>
                                <td>
                                    <img src="uploads/product/{{ $item->prod->image }}" width="40" alt="">
                                </td>
                                <td>{{ $item->prod->name }}</td>
                                <td>{{ $item->price }}</td>
                                <th>
                                    <form action="{{ route('cart.update',$item->product_id) }}" method="get">
                                        <input type="number" value="{{ $item->quantity }}" name="quantity"
                                            style="width:60px;text-align:center">
                                        <button><i class="fa fa-save">Update</i></button>
                                    </form>
                                </th>
                                <td>
                                    <a title="Xóa sản phẩm khỏi giỏ hàng"
                                        onclick="return confirm('bạn có xóa sản phẩm khỏi giỏ hàng không?')"
                                        href="{{ route('cart.delete', $item->product_id) }}"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    <a href="{{ route('home.index') }}" class="btn btn-primary">Continue Shopping</a>
                    @if($carts->count())
                    <a href="{{ route('cart.clear') }}" class="btn btn-primary"><i class="fa fa-trash"></i>Clear shopping</a>
                    <a href="{{ route('order.checkout') }}" class="btn btn-primary">Place Order</a>
                    @endif
                </div>
			</div>
		</div>
	</div>
</div>
<!-- CONTACTS END -->

<!-- MAP -->


<!-- MAP END -->

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