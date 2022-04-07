<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="template-default template-all">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	@yield('title')
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
   <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/styles/styles.css')}}" media="all" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
@include('frontview.header')




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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="{{ asset('assets/scripts/jquery-1.8.3.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/jquery.elevatezoom.js') }}"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@stack('front-script')
</body>
</html>
