@extends('frontview.frontmaster')
@section('title')
    <title>Laptop world | Billing Address</title>
@endsection
@section('frontcontent')
	<div class="wrapper">
		<div class="page">

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

						</div><!--- .content-top-->
						<div class="checkout-step-process">
							<ul>
								<li>
									<div class="step-process-item "><i data-href="checkout-step2.html"  class="redirectjs fa fa-check step-icon"></i><span class="text">Address</span></div>
								</li>
								<li>
									<div class="step-process-item active"><i class="step-icon-truck step-icon"></i><span class="text">Shipping</span></div>
								</li>
								<li>
									<div class="step-process-item"><i data-href="checkout-step4.html"  class="redirectjs  step-icon icon-wallet"></i><span class="text">Delivery & Payment</span></div>
								</li>
								<li>
									<div class="step-process-item"><i data-href="checkout-step5.html"  class="redirectjs  step-icon icon-notebook"></i><span class="text">Order Review</span></div>
								</li>

								<li>

								</li>
							</ul>
						</div><!--- .checkout-step-process --->
						<form  method="POST" class="checkout woocommerce-checkout form-in-checkout" action="/addshipping">
                            @csrf
							<ul class="row">
								<li class="col-md-12">
									<div class="checkout-info-text">
										<h3>Billing Address</h3>
                                   </div>
                                    @if (!$billing_address->isEmpty())
                                            <div id="prev_address">
                                                <div class="col-md-12" style="padding-bottom: 25px;">
                                                    <ul class="list-inline">
                                                        <li class="row prev_address_list">
                                                            @foreach ($billing_address as $address)
                                                                <p class="col-md-6">
                                                                    <label><input type="radio" id="pre_billing_address_id"
                                                                            name="addresses"
                                                                            class="pre_address_id" 
                                                                            value="{{ $address->id }}" checked><strong>{{ $address->name }}</strong></label>
                                                                    <br>
                                                                    {{ $address->email }},<br>
                                                                    {{ $address->mobile_number }}<br>
                                                                    {{ $address->address }}<br>
                                                                    {{ $address->city }},{{ $address->state }},{{ $address->pincode }}<br>
                                                                </p>
                                                            @endforeach
                                                        </li>
                                                    </ul>
                                                    <!-- <span class="form-radio">
                                                        <input type="radio" name="pre_address_id"
                                                            id="add_new_address_radio" class="pre_address_id" value="">
                                                        <label for="add_new_address_radio">Add New Address</label>
                                                    </span> -->
                                                    {{-- <button type="button" id="add_new_address" class="btn-step d-btn-block continue text-right">Add New Address</button> --}}
                                                </div>
                                            </div>
                                        @endif

                                   <span class="form-radio"><input type="radio" name="addresses" value="0" id="view"><label for="rs1">ADD New Address </label></span>
                                <div id="form" class="woocommerce-billing-fields">
										<ul class="row">
											<li class="col-md-6">
												<p class="form-row validate-required" id="billing_first_name_field">
													<label for="billing_first_name" class="">Name <abbr class="required" title="required">*</abbr></label>
													<input type="text" class="input-text " name="name" id="billing_first_name" placeholder="" value="">
												</p>
											</li>
											<li class="col-md-6  col-left-12">
												<p class="form-row  validate-required validate-email" id="billing_email_field">
													<label for="billing_email" class="">Email ID <abbr class="required" title="required">*</abbr></label>
													<input type="text" class="input-text " name="email" id="billing_email" placeholder="" value="">
												</p>
											</li>
											<li class="col-md-12  col-left-12">
												<p class="form-row  validate-required validate-email" id="#">
													<label for="Address" class="">Address <abbr class="required" title="required">*</abbr></label>
													<textarea name="address" cols="140" rows="4" id="address"></textarea>
												</p>
											</li>
                                            <li class="col-md-6">
												<p class="form-row validate-required" id="billing_first_name_field">
													<label for="billing_first_name" class="">State <abbr class="required" title="required">*</abbr></label>
													<input type="text" class="input-text " name="state" id="billing_first_name" placeholder="" value="">
												</p>
											</li>
											<li class="col-md-6">
												<p class="form-row validate-required" id="billing_first_name_field">
													<label for="billing_first_name" class="">City <abbr class="required" title="required">*</abbr></label>
													<input type="text" class="input-text " name="city" id="billing_first_name" placeholder="" value="">
												</p>
											</li>


											<li class="col-md-6">
												<p class="form-row address-field validate-postcode woocommerce-validated" id="billing_postcode_field">
													<label for="billing_postcode" class="">Pin code <abbr class="required" title="required">*</abbr></label>
													<input type="text" class="input-text " name="pincode" id="billing_pincode" value="">
												</p>
											</li>

											<li class="col-md-6">
												<p class="form-row validate-required validate-phone woocommerce-validated" id="billing_phone_field">
													<label for="billing_phone" class="">Phone number <abbr class="required" title="required">*</abbr></label>
													<input type="text" class="input-text " name="mobile_number" id="billing_phone" placeholder="" value="">
												</p>
											</li>
											<div class="note">(<span>*</span>) Required fields</div>
										</ul>
									</div><!--- .woocommerce-billing-fields--->
									<div>
									
								</div>

									<div class="checkout-col-footer" style="margin-left: 5%; margin-right: 10%;">
										<div class="note">"        " </div>
                                        <a href="{{ url('/billing') }}" value="Continue" class="btn-step continue left">Back</a></div>
                                        <input type="submit"  value="Continue" class="btn-step right">

									</div><!--- .checkout-col-footer--->
								</li>
							</ul>
						</form><!--- form.checkout--->
						<div class="line-bottom"></div>
					</div><!--- .container--->
				</div><!--- .woocommerce--->
			</div><!--- .main-container -->
		</div><!--- .page -->
	</div><!--- .wrapper -->
    @endsection
    @push('front-script')
<script>
jQuery(document).ready(function(){
     jQuery('#form').hide();
     jQuery('.address_click').click( function(){
        jQuery('#form').hide();


     });
     jQuery('#view').click(function(){

        jQuery('#form').show();
     });
});
</script>
@endpush
