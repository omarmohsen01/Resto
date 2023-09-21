<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel Stripe Checkout Example - Webappfix</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1 class="text-center mb-5 mt-5">Laravel Stripe Checkout Example - Webappfix</h1>

		@if(Session::has('success'))
			<div class="alert alert-success">
				{{ Session::get('success') }}
				@php
					Session::forget('success');
				@endphp
			</div>
		@endif

		<div class="row">
			<div class="col-md-4">
				<div class="card" style="width:18rem;">
					<img src="https://dummyimage.com/300x200/000/fff" class="card-img-top">
					<div class="card-body">
						<h5 class="card-title">Silver</h5>
						<p class="card-text">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation.
						</p>
						<a href="{{ route('stripe.checkout',['order'=>$order->id,'price' => 10,'product' => 'silver']) }}">Make Payment</a>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card" style="width:18rem;">
					<img src="https://dummyimage.com/300x200/000/fff" class="card-img-top">
					<div class="card-body">
						<h5 class="card-title">Gold</h5>
						<p class="card-text">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation.
						</p>
						<a href="{{ route('stripe.checkout',['order'=>$order->id,'price' => 100,'product' => 'gold']) }}">Make Payment</a>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card" style="width:18rem;">
					<img src="https://dummyimage.com/300x200/000/fff" class="card-img-top">
					<div class="card-body">
						<h5 class="card-title">Platinum</h5>
						<p class="card-text">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation.
						</p>
						<a href="{{ route('stripe.checkout',['order'=>$order->id,'price' => 1000,'product' => 'platinum']) }}">Make Payment</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>