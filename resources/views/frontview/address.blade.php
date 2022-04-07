@extends('frontview.frontmaster')
@section('title')
    <title>Laptop world | Address</title>
@endsection
@section('frontcontent') 
			
			<div class="main-container col1-layout content-color color">
				<div class="breadcrumbs">
					<div class="container">
						<ul>
							<li class="home"> <a href="#" title="Go to Home Page">Home</a></li>
							<li> <strong>Address</strong></li>
						</ul>
					</div>
				</div><!--- .breadcrumbs-->
				
				<div class="woocommerce">
					<div class="container">
						<div class="content-top">
							<h2>Address</h2>
							
						</div><!--- .content-top-->
						<div class="checkout-step-process">
							<ul>
								
								<li>
									<div class="step-process-item active"><i data-href="checkout-step2.html"  class="redirectjs  step-icon icon-pointer"></i><span class="text">Address</span></div>
								</li>
								
								
							</ul>
						</div><!--- .checkout-step-process --->
						<form name="checkout" method="post" class="checkout woocommerce-checkout form-in-checkout"   action="{{ url('/save_address') }}">
							{!! csrf_field() !!}
							<ul class="row">
								<li class="col-md-12  ">
									<div class="checkout-info-text">
										<h3>Billing Address</h3>

									</div>
									
									<div class="woocommerce-billing-fields">
										<ul class="row">
											@if (!$address->isEmpty())
                                            <div id="prev_address">
                                                <div class="col-md-12" style="padding-bottom: 25px;">
                                                    <ul class="list-inline">
                                                        <li class="row prev_address_list col-md-12">
                                                        	<!-- <strong>Billing address</strong> -->
                                                            @foreach ($address as $address)
                                                                <p class="col-md-3">
                                                                    <label><input type="radio" id="pre_billing_address_id"
                                                                            name="pre_address_id"
                                                                            class="pre_address_id" checked
                                                                            value="{{ $address->id }}"><strong>{{ $address->name }}</strong></label>
                                                                    <br>
                                                                    {{ $address->email }},<br>
                                                                    {{ $address->mobile_number }}<br>
                                                                    {{ $address->address }}<br>
                                                                    {{ $address->city }},{{ $address->state }},{{ $address->pincode }}<br>
                                                                </p>
                                                            @endforeach
                                                        </li>
                                                    </ul>
                                                    
                                                    {{-- <button type="button" id="add_new_address" class="btn-step d-btn-block continue text-right">Add New Address</button> --}}
                                                </div>
                                            </div>
                                        @endif
                                        <div class="checkout-info-text">
										<h3>Shipping  Address</h3>

									</div>
                                        @if (!$shippingaddress->isEmpty())
                                            <div id="prev_address">
                                                <div class="col-md-12" style="padding-bottom: 25px;">
                                                    <ul class="list-inline">
                                                        <li class="row prev_address_list">
                                                        	<!-- <strong>Shipping address</strong> <br> <br> -->
                                                            @foreach ($shippingaddress as $address)
                                                                <p class="col-md-3">
                                                                    <label><input type="radio" id="pre_billing_address_id"
                                                                            name="pre_address_id"
                                                                            class="pre_address_id" checked
                                                                            value="{{ $address->id }}"><strong>{{ $address->name }}</strong></label>
                                                                    <br>
                                                                    {{ $address->email }},<br>
                                                                    {{ $address->mobile_number }}<br>
                                                                    {{ $address->address }}<br>
                                                                    {{ $address->city }},{{ $address->state }},{{ $address->pincode }}<br>
                                                                </p>
                                                            @endforeach
                                                        </li>
                                                    </ul>
                                                    <span class="form-radio">
                                                        <input type="radio" name="pre_billing_address_id"
                                                            id="add_new_address_radio" value="">
                                                        <label for="add_new_address_radio">Add New Address</label>
                                                    </span>
                                                    {{-- <button type="button" id="add_new_address" class="btn-step d-btn-block continue text-right">Add New Address</button> --}}
                                                </div>
                                            </div>
                                        @endif
											<li class="col-md-6">
												<p class="form-row validate-required" id="billing_first_name_field">
													<label for="name" class="">Full Name <abbr class="required" title="required">*</abbr></label>
													<input type="text" class="input-text " name="name" id="name" placeholder="Enter your full name" value="">
												</p>
											</li>
											<!-- <li class="col-md-6">
												<p class="form-row validate-required" id="billing_last_name_field">
													<label for="billing_last_name" class="">Last Name <abbr class="required" title="required">*</abbr></label>
													<input type="text" class="input-text " name="billing_last_name" id="billing_last_name" placeholder="" value="">
												</p>
											</li> -->
											<li class="col-md-6">
												<p class="form-row validate-required validate-phone woocommerce-validated" id="billing_phone_field">
													<label for="mobile_number" class="">Phone number <abbr class="required" title="required">*</abbr></label>
													<input type="text" class="input-text " name="mobile_number" id="mobile_number" placeholder="" value="">
												</p>
											</li>
											<li class="col-md-12  col-left-12">
												<p class="form-row  validate-required validate-email" id="billing_email_field">
													<label for="email" class="">Email ID <abbr class="required" title="required">*</abbr></label>
													<input type="text" class="input-text " name="email" id="email" placeholder="Enter your email address" value="">
												</p>
											</li>
											<li class="col-md-6">
												<p class="form-row form-row-wide address-field validate-required" id="billing_city_field">
													<label for="city" class="">City <abbr class="required" title="required">*</abbr></label>
													<select class="custom-select" name="city" id="city">
														
														<option value="Ahmedavad">Ahmedavad</option>
														<option value="Bhavanagar">Bhavanagar</option>
														<option value="Surat">Surat</option>
														<option value="Vadodara">Vadodara</option>
														<option value="Rajkot">Rajkot</option>
														<option value="Junagadh">Junagadh</option>
														<option value="Amreli">Amreli</option>
														<option value="Gandhinagar">Gandhinagar</option>
														<option value="Bharuch">Bharuch</option> 
													</select>
												</p>
											</li>
											<li class="col-md-6">
												<p class="form-row address-field validate-state" id="billing_state_field">
													<label for="state" class="">State/Province</label>
													<select type="text" class="custom-select" name="state" id="state">
														<option value="Gujarat">Gujarat</option>
														
													</select>
												</p>
											</li>
											<li class="col-md-6">
												<p class="form-row address-field validate-postcode woocommerce-validated" id="billing_postcode_field">
													<label for="pincode" class="">Zip code <abbr class="required" title="required">*</abbr></label>
													<input type="text" class="input-text " name="pincode" id="pincode" value="">
												</p>
											</li>
											<li class="col-md-6">
												<p class="form-row address-field validate-state" id="billing_state_field" data-o_class="form-row form-row-first address-field">
													<label for="area_address" class="">Area address<abbr class="required" title="required">*</abbr></label>
													<input type="text" class="input-text " name="area_address" id="area_address" value="">
													
												</p>
											</li>
											
											<li class="col-md-12 col-left-12 form-radios">
												<span class="form-radio"><input type="radio" name="addressmethod"  value="rs1" id="rs1" checked><label for="rs1">Billing Address</label></span>
												<span class="form-radio"><input type="radio" name="addressmethod" value="rs2" id="rs2"><label for="rs2">Shipping address</label></span>
											</li>
										</ul>
									</div><!--- .woocommerce-billing-fields--->	
									
									<div class="checkout-col-footer">
										<input type="submit" value="Save" class="btn-step">
										  <a href="{{ url('/billing') }}" class="btn-step checkout">Checkout</a> 
										<!-- <a href="{{ url('/shipping') }}" value="Continue" class="btn-step continue">Cont --><!-- inue</a> --> 
										<div class="note">(<span>*</span>) Required fields</div>
									</div><!--- .checkout-col-footer--->	
								</li>
							</ul>
						</form><!--- form.checkout--->
						<div class="line-bottom"></div>
					</div><!--- .container--->
				</div><!--- .woocommerce--->
				
				
			</div><!--- .main-container -->

@endsection
			