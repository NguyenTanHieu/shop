<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from just-theme.com/mrcoffee/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2024 07:29:36 GMT -->
<head>
	<base href="/">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="icon" type="image/png" href="{{ asset('assets/images/TH-LOGO.png') }}">
<title>@yield('title')</title>

<!-- FONTS -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700|Raleway:300,400,700,800" rel="stylesheet">

<!-- CSS FILES -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/zoomslider.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />


</head>
<body>
	<!-- TOP BAR -->
	<div class="top-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-5">
					<ul class="top-bar-contacts">
						<li><i class="fa fa-phone" aria-hidden="true"></i>+80 (041) 2824 504 43</li>
						<li class="mail"><i class="fa fa-envelope-o" aria-hidden="true"></i>orders@mistercoffee.us</li>
						<li class="skype"><i class="fa fa-skype" aria-hidden="true"></i>mrcoffee</li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-4 ">
					<ul class="top-bar-contacts">
						@if(auth('cus')->check())
						<li><a href="{{ route('account.profile') }}"style="color:black">Hi {{ auth('cus')->user()->name }}</a></li>
						<li> <a href="{{ route('account.change_password') }}" style="color:black">Change password</a></li>
						{{-- <li><a href="{{ route('account.register') }}" style="color:black">My order</a></li> --}}
						<li><a href="{{ route('account.logout') }}" style="color:black">Logout</a></li>
						@else
						<li><a href="{{ route('account.login') }}"style="color:black">Login</a></li>
						<li><a href="{{ route('account.register') }}"style="color:black">Register</a></li>
						@endif
					</ul>
			    </div>
				<div class="col-md-2 col-sm-3 top-social-wrap">
					<ul class="top-social">
						<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- TOP BAR END -->
	<!-- HEADER -->
	<div class="header-wrap">
		<header class="top-nav inner-page" data-spy="affix" data-offset-top="34">
			<div class="container">
				<div class="row position-relative">
					<div class="col-lg-2 col-md-2">
						<a href="{{ route('home.index') }}" class="small-logo alt"><img src="assets/images/TH-LOGO-SMALL.png" alt=""></a>	
					</div>
					<div class="col-lg-10 col-md-10">
						<nav class="navbar collapse navbar-collapse" id="coffee-menu">
							<div class="col-lg-10 col-md-10">
								<ul class="main-menu nav">
									<li><a href="{{ route('home.index') }}">Home</a></li>
									<li class="">
										<a href="{{ route('home.about') }}">About</a>
									</li>
									<li class="parent">
										<a href="shop.html">products</a>
										<ul class="sub-menu">
											<li><a href="product.html">Single item</a></li>
											<li><a href="cart.html">Cart</a></li>
											<li><a href="checkout.html">Checkout</a></li>
										</ul>
									</li>
									<li class="parent"><a href="where.html">Category</a>
										<ul class="sub-menu">
											@foreach($cats_home as $cath)
											<li><a href="{{ route('home.category',$cath->id) }}">{{ $cath->name }}</a></li>
											@endforeach
										</ul>
									</li>
									<li><a href="testimonials.html">Testimonials</a></li>
									<li class="parent">
										<a href="blog-list.html">blog</a>
										<ul class="sub-menu">
											@foreach($cats_home_post as $cathp)
											<li><a href="{{ route('home.category_post',$cathp->id) }}">{{ $cathp->name }}</a></li>
											@endforeach
										</ul>
									</li>
									<li><a href="contacts.html">Contacts</a></li>
								</ul>
							</div>
							<div class="col-lg-2 col-md-12">
								<div class="top-right">
									<a href="cart.html" class="cart">
										<span class="name">Cart</span>
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										<span class="count">0</span>
									</a>
									<div class="top-search">
										<input type="text" placeholder="Search">
										<a href="#" class="fa fa-search search" aria-hidden="true"></a>
									</div>
								</div>
							</div>
						</nav>
					</div>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#coffee-menu" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
		     	 	</button>
				</div>
			</div>
		</header>
	</div>
	@yield('main')
	<!-- FOOTER -->
	<footer class="footer">
		<div class="top-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-sm-6">
						<a href="#" class="footer-logo"><img src="assets/images/footer-logo.png" alt=""></a>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="footer-about">
							<div class="title">About Mr.Coffee</div>
							<p>Sed sagittis sodales lobortis. Curabitur in eleifend<br> turpis, id vehicula odio. Donec pulvinar tellus<br> eget magna aliquet ultricies. </p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<ul class="footer-contacts">
							<li><i class="fa fa-phone" aria-hidden="true"></i>+80 (041) 2824 504 43</li>
							<li><i class="fa fa-envelope-o" aria-hidden="true"></i>orders@mistercoffee.us</li>
							<li><i class="fa fa-skype" aria-hidden="true"></i>mrcoffee</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="footer-social">
							<div class="title">Follow Us</div>
							<ul class="social">
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							</ul>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="copyrights"><a href="#">Just-themes</a> 2017 &copy; All Rights reserved <a href="#">Terms of Use</a></div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- FOOTER END -->

<!-- JAVASCRIPT FILES -->





<script type="text/javascript" src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTRSHf8sjMCfK9PHPJxjJkwrCIo5asIzE"></script>
<script type="text/javascript" src="{{ asset('assets/js/map-style.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/modernizr-2.6.2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.zoomslider.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.parallax-1.1.3.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/waypoint.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/custom-number.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.select2.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.swipebox.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" ></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@yield('js')
@if(Session::has('ok'))
<script>
	
	document.addEventListener('DOMContentLoaded', function() {
		swal({
			title: "Thông báo",
			text: "{{ Session::get('ok') }}",
			icon: "success",
			position: 'top',
			timer: 10000, // 10 seconds
			});
	});
</script>
@endif
@if(Session::has('no'))
<script>
	document.addEventListener('DOMContentLoaded', function() {
		swal({
			title: "Thông báo",
			text: "{{ Session::get('no') }}",
			icon: "warning",
			timer: 10000, // 10 seconds
		});
		// Swal({
		//     title: 'Thông báo',
		//     text: "{{ Session::get('no') }}",
		//     icon: 'warning',
		//     position: 'top',
		//     timer: 10000, // 10 seconds
		// });
	});
</script>
@endif
@stack('scripts')
</body>


<!-- Mirrored from just-theme.com/mrcoffee/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2024 07:29:55 GMT -->
</html>