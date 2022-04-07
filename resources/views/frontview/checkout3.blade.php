@extends('frontview.frontmaster')
@section('title')
    <title>Laptop world | Checkout</title>
@endsection
@section('frontcontent')
			
			<div class="main-container col1-layout content-color color">
				<div class="breadcrumbs">
					<div class="container">
						<ul>
							<li class="home"> <a href="#" title="Go to Home Page">Home</a></li>
							<li> <strong>Checkout</strong></li>
						</ul>
					</div>
				</div><!--- .breadcrumbs-->
				
				<div class="woocommerce">
					<div class="container">
						<div class="content-top">
							<h2>Checkout</h2>
							
						</div>
						<div class="checkout-step-process">
							<ul>
								
								<li>
									<div class="step-process-item"><i data-href="checkout-step2.html" class="redirectjs fa fa-check step-icon"></i><span class="text">Address</span></div>
								</li>
								<li>
									<div class="step-process-item"><i class="fa fa-check step-icon"></i><span class="text">Shipping</span></div>
								</li>
								<li>
									<div class="step-process-item active"><i data-href="checkout-step4.html" class="redirectjs step-icon icon-wallet"></i><span class="text">Delivery & Payment</span></div>
								</li>
								<li>
									<div class="step-process-item"><i data-href="checkout-step5.html" class="redirectjs fa step-icon icon-wallet"></i><span class="text">Order Review</span></div>
								</li>
								
								
							</ul>
						</div>
						
						<div class="checkout-info-text">
							<h3>Delivery</h3>
						</div>
						<div class="content-radio">
							<input type="radio" checked name="delivery-radio" id="delivery-radio-1">
							<label for="delivery-radio-1" class="label-radio">Standard Delivery</label>
							<p>The package will be delivery to your address.</p>
							
						</div>
						<div class="checkout-info-text">
							<h3>Payment Method</h3>
						</div>
						<div class="content-radio">
							<input type="radio" name="payment-radio" checked id="pr1">
							<label for="pr1" class="label-radio">Cash on delevery</label>
							<p>Pay for the package when you recieve it.</p>
						</div>
						
						<div class="checkout-col-footer">
							{{-- <input type="button" value="Back" class="btn-step">
							<input type="button" value="Continue" class="btn-step btn-highligh">
							<a href="#" value="Continue" class="btn-step continue">Continue</a>
							<a href="{{ url('/orderreview') }}" value="Continue" class="btn-step continue">Back</a> --}}
							
							<a href="{{ url('/shipping') }}" value="Continue" class="btn-step continue">Back</a>
							<a href="{{ url('/orderreview') }}" value="Continue" class="btn-step continue right">Continue</a>
											
						</div>
						<div class="line-bottom"></div>
					</div>
				</div><!--- .woocommerce-->
				
				
			</div><!--- .main-container -->

@endsection
			