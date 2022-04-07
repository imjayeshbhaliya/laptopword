@extends('frontview.frontmaster')
@section('title')
    <title>Thank you for your order</title>
@endsection
@section('frontcontent')



<div class="main-container col1-layout content-color color">
	<div class="alo-block-slide">
					<div class="container-none flex-index">
						<div class="flexslider">
							<div id="slider-index" class="slides">
								<div class="item">
									<a  href="#"><img src="assets/images/slide.jpg" alt="magicslider" height="900px" width="1900px"></a>
									<div class="bx-caption start play">
										<div class="container">
                                            <div class="text-slide">
												<h3 class="caption1">Thank You</h3>
												<h3 class="caption2">For Your Order!!!</h3>
												
												<p class="icon-anchor icons caption6"><span class="hidden">hidden</span></p>
												<a href="{{ url('/') }}" class="btn-shop caption4">Go To Home Page</a>
											</div>
											
										</div>
									</div>
								</div>	
							</div><!--- #slider-indexs-->
						</div>
					</div>
				</div><!--- .alo-block-slide-->
@endsection

			