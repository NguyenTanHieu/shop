@extends('master.main')
@section('main')
<!-- PAGE HEAD -->
<section class="page-head">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ route('home.index') }}">Home</a></li>
					<li>Favorite</li>
				</ul>
				<h1>Favorite</h1>
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
                            <th>Product name</th>
                            <th>Product price</th>
                            <th>Product image</th>
                            <th>Favorite date</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($favorites as $item)
                            <tr>
                                <td scope="row">{{ $loop->index + 1 }}</td>
                                <td>{{ $item->prod->name }}</td>
                                <td>{{ $item->prod->price }}/{{ $item->prod->sale_price }}</td>
                                <td>
                                    <img src="uploads/product/{{ $item->prod->image }}" width="40" alt="">
                                </td>
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a title="Bỏ thích" onclick="return confirm('bạn có muốn bỏ yêu thích không?')"
                                        href="{{ route('home.favorite', $item->product_id) }}"><i
                                            class="fa fa-heart"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

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