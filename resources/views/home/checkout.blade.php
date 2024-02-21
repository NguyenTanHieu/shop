@extends('master.main')
@section('main')
<!-- PAGE HEAD -->
<section class="page-head">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ route('home.index') }}">Home</a></li>
					<li>Check out</li>
				</ul>
				<h1>Check out</h1>
			</div>
		</div>
	</div>
</section>
<!-- PAGE HEAD END -->

<!-- CONTACTS -->
<div class="contact-wrap">
	<div class="container">
        <div class="row">
            <div class="col-md-4">
                <form action="" method="POST">
                    @csrf
                    <div class="contact-form-wrap">
                        <div class="form-grp">
                            <label for="">Name</label>
                            <input name="name" value="{{ $auth->name }}" type="text" placeholder="Your Name *" required>
                            @error('name')
                            <small class="help-block">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-grp">
                            <label for="">Email</label>
                            <input name="email" value={{ $auth->email }} type="email" placeholder="Your Email *" required>
                            @error('email')
                            <small class="help-block">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-grp">
                            <label for="">Phone</label>
                            <input name="phone" value="{{ $auth->phone }}" type="text" placeholder="Your Phone *" required>
                            @error('phone')
                            <small class="help-block">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-grp">
                            <label for="">Address</label>
                            <input name="address" value={{ $auth->address }} type="text" placeholder="Your Address *" required>
                            @error('address')
                            <small class="help-block">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit">Place order</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>image</th>
                            <th>name</th>
                            <th>Price</th>
                            <th>Quantity</th>
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
                                <td>{{ $item->quantity }}</td>
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