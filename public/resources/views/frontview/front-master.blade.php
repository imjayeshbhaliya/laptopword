<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="template-default template-all">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Laptop World</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" type="text/css" href="assets/styles/styles.css" media="all" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
@include('frontview.header')
@include('frontview.slider')

<div id="content">
<ul class="products-grid row products-grid--max-3-col last odd">
    @foreach($products as $product)
    <li class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-mobile-12 item">
        <div class="category-products-grid">
            <div class="images-container">
                <div class="product-hover">
                    <span class="sticker top-left"><span class="labelnew">New</span></span>
                    <a href="{{url('/products',$product->url)}}" title="{{$product->name}}" class="product-image">
                        <img id="product-collection-image-8" class="img-responsive" src="{{url('uploads/products/'.$product->image)}}" alt="" height="355" width="278">
                        <span class="product-img-back"> <img class="img-responsive" src="{{url('uploads/products/'.$product->image)}}" alt="" height="355" width="278"> </span>
                    </a>
                </div>
                <div class="actions-no hover-box">
                    <div class="actions">
                        <button type="button" title="Add to Cart" class="button btn-cart pull-left"><span><i class="icon-handbag icons"></i><span>Add to cart</span></span></button>
                        {{-- <button type="button" title="Add to Cart" class="button btn-cart pull-left"><span><i class="icon-handbag icons"></i><span>Add to Cart</span></span></button> --}}
                        {{-- <ul class="add-to-links pull-left">
                            <li class="pull-left"><a href="" title="Add to Wishlist" class="link-wishlist"><i class="icon-heart icons"></i>Add to Wishlist</a></li>
                        </ul> --}}
                    </div>
                </div>
            </div>
            <div class="product-info products-textlink clearfix">
                <h2 class="product-name"><a href="#" title="Configurable Product">{{$product->name}}</a></h2>

                <div class="price-box"> <span class="regular-price"> <span class="price">₹{{$product->price}} <br>{{$product->category->name}}({{$product->colour->name}})</span> </span></div>
                {{-- <div class="categorycolour-box"> <span class="regular-categorycolour"> <span class="categorycolour">{{$product->category->name}},{{$product->colour->name}}</span> </span></div> --}}
                <div class="ratings">
                    <div class="discription-box">
                       <p> {{$product->discription}}</p>
                    </div>
                    <div class="rating-box">
                        <div class="rating" style="width:80%"></div>
                    </div>
                    <span class="amount"><a href="#">1 Review(s)</a></span>
                </div>
                {{-- <div class="discription-box">
                    <span class="discription">
                        <span class="discription">
                            {{$product->discription}}
                        </span>
                    </span>
                </div> --}}
            </div>
        </div>
    </li>
    @endforeach
</ul><!--- .products-grid-->

</div><!--- .category-products-->
</div><!--- .col-main-->
</div><!--- .row-->
</div><!--- .main-->
</div><!--- .container-->
</div>



@yield('frontcontent')
@include('frontview.footer')


<script type="text/javascript" src="assets/scripts/jquery.min.js"></script>
<script type="text/javascript" src="assets/scripts/jquery.noconflict.js"></script>
<script type="text/javascript" src="assets/scripts/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/scripts/jquery.bxslider.js"></script>
<script type="text/javascript" src="assets/scripts/jquery.ddslick.js"></script>
<script type="text/javascript" src="assets/scripts/jquery.easing.min.js"></script>
<script type="text/javascript" src="assets/scripts/jquery.meanmenu.hack.js"></script>
<script type="text/javascript" src="assets/scripts/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="assets/scripts/jquery.animateNumber.min.js"></script>
<script type="text/javascript" src="assets/scripts/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="assets/scripts/jquery.heapbox-0.9.4.min.js"></script>
<script type="text/javascript" src="assets/scripts/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="assets/scripts/packery-mode.pkgd.min.js"></script>
<script type="text/javascript" src="assets/scripts/video.js"></script>
<script type="text/javascript" src="assets/scripts/jquery-ui.js"></script>
<script type="text/javascript" src="assets/scripts/magiccart/magicproduct.js"></script>
<script type="text/javascript" src="assets/scripts/magiccart/magicaccordion.js"></script>
<script type="text/javascript" src="assets/scripts/magiccart/magicmenu.js"></script>
<script type="text/javascript" src="assets/scripts/script.js"></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@stack('front-script')
</body>
</html>
