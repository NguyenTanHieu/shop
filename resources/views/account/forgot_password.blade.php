@extends('master.main')
@section('main')
<!-- PAGE HEAD -->
<section class="page-head">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="{{ route('home.index') }}">Home</a></li>
					<li>Forgot password</li>
				</ul>
				<h1>Forgot password</h1>
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
				<div class="contact-right">
					<h2>Forgot Password</h2>
					<form class="contact-form" action="" method="POST">
						@csrf
						<div class="row">

							<div class="col-md-12">
								<input name="email" class="contact-input" type="email" placeholder="Email *" required>
								@error('email')
								<small class="help-block">{{ $message }}</small>
								@enderror
							</div>
							<div class="col-md-12 text-center">
								<button>Send Email</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div class="contact-left">
					<h2>Contacts</h2>
					<div class="item">
						<div class="title"><i class="fa fa-location-arrow" aria-hidden="true"></i>ADDRESS</div>
						<p>19 Walcott street, 8373620 London, GreatBritain</p>
					</div>
					<div class="item">
						<div class="title"><i class="fa fa-phone" aria-hidden="true"></i>PHONE</div>
						<p>+80 (041) 2824 504 43</p>
					</div>
					<div class="item">
						<div class="title"><i class="fa fa-envelope-o" aria-hidden="true"></i>EMAIL</div>
						<p><a href="mailto:orders@mistercoffee.us">orders@mistercoffee.us</a></p>
					</div>
					<div class="item">
						<div class="title"><i class="fa fa-skype" aria-hidden="true"></i>SKYPE</div>
						<p><a href="callto:mrcoffee">mrcoffee</a></p>
					</div>
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