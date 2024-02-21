@extends('master.main')
@section('main')
<!-- PAGE HEAD -->
<section class="page-head">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ route('home.index') }}">Home</a></li>
					<li>Detail order</li>
				</ul>
				<h1>Detail order</h1>
			</div>
		</div>
	</div>
</section>
<!-- PAGE HEAD END -->

<!-- CONTACTS -->
<div class="contact-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Thông tin khách hàng</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <td>Họ tên</td>
                            <td>{{ $auth->name }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $auth->phone }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $auth->address }}</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="col-md-6">
                <h3>Thông tin giao hàng</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <td>Họ tên</td>
                            <td>{{ $auth->name }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $auth->phone }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $auth->address }}</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
       <h3>Thông tin sản phẩm </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Image</th>
                    <th>Product name</th>
                    <th>Product quantity</th>
                    <th>Product Price</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->details as $item)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td><img src="uploads/product/{{ $item->product->image }}" alt="" width="40" height="40"></td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price) }}</td>
                        <td>{{ number_format($item->price * $item->quantity) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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