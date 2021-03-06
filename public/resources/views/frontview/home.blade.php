@extends('frontview.frontmaster')

@section('frontcontent')

<title> Laptop | Home</title>

<div class="main-container col1-layout content-color color">
	<div class="alo-block-slide">
					<div class="container-none flex-index">
						<div class="flexslider">
							<div id="slider-index" class="slides">
								<div class="item">
									<a  href="#"><img src="assets/images/slide2.jpg" alt="magicslider"></a>
									<div class="bx-caption start play">
										<div class="container">
											<div class="text-slide">
												<h3 class="caption1">Sale</h3>
												<h3 class="caption2">Extra<strong>30%</strong>off</h3>
												<h2 class="caption3">When you buy from 2 or more...</h2>
												<p class="icon-anchor icons caption6"><span class="hidden">hidden</span></p>
												<a href="{{ url('gridView') }}" class="btn-shop caption4">Shop Now</a>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<a  href="#"><img src="assets/images/slide3.jpg" alt="magicslider"></a>
									<div class="bx-caption ">
										<div class="container">
											<div class="text-slide text-slide2">
												<h3 class="caption1">Devloper’s</h3>
												<h3 class="caption2">looks</h3>
												<h2 class="caption3">Summer</h2>
												<h2 class="caption5">2022</h2>
												<h3 class="caption4"><a href="{{ url('gridView') }}" class="btn-shop">Shop Now</a></h3>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<a  href="#"> <img src="assets/images/slide.jpg" alt="magicslider"> </a>
									<div class="bx-caption ">
										<div class="container">
											<div class="text-slide text-slide3">
												<h3 class="caption1">Mid-Season</h3>
												<h3 class="caption2">Must have for Student 2022</h3>
												<h3 class="caption4"><a href="{{ url('gridView') }}" class="btn-shop">Shop Now</a></h3>
											</div>
										</div>
									</div>
								</div>
							</div><!--- #slider-indexs-->
						</div>
					</div>
				</div><!--- .alo-block-slide-->
@endsection
