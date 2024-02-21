@extends('master.main')
@section('main')
<!-- PAGE HEAD -->
<section class="page-head">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ route('home.index') }}">Home</a></li>
					<li>History</li>
				</ul>
				<h1>History</h1>
			</div>
		</div>
	</div>
</section>
<!-- PAGE HEAD END -->

<!-- CONTACTS -->
<div class="contact-wrap">
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Total Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($auth->orders as $item)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $item->created_at->format('d/m/Y') }} </td>
                        <td>
                            @if ($item->status == 0)
                                <span>Chưa xác nhận</span>
                            @elseif ($item->status == 1)
                                <span>Đã xác nhận</span>
                            @elseif ($item->status == 2)
                                <span>Đã thanh toán</span>
                            @else
                                <span>Đã hủy</span>
                            @endif
                        </td>
                        <td>{{ number_format($item->totalPrice) }}</td>
                        <td>
                            <a href="{{ route('order.detail',$item->id) }}" class="btn btn-sm btn-primary">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <div class="text-center">
            <a href="{{ route('home.index') }}" class="btn btn-primary">Continue Shopping</a>
            @if ($carts->count())
                <a href="{{ route('cart.clear') }}" class="btn btn-primary"><i class="fa fa-trash"></i>Clear
                    shopping</a>
                <a href="{{ route('order.checkout') }}" class="btn btn-primary">Place Order</a>
            @endif
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