@extends('frontview.frontmaster')
@section('title')
    <title>Laptop world | My Orders</title>
@endsection
@section('frontcontent')
    <div class="main-container col1-layout content-color color">
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li class="home"><a href="/" title="Go to Home Page">Home</a></li>
                    <li><strong>My Orders</strong></li>
                </ul>
            </div>
        </div>
        <!--- .breadcrumbs-->
        <div class="container">
            <div class="content-top no-border">
                <h2>My Orders</h2>
                @foreach ($Orders as $odr)
                    <div class="blog-mansory" style="position: relative  ">
                        <div class="blog-mansory-item" style="position:inherit !important;max-width: 100%">
                            <div class="blog-mansory-item-content " style="border: solid #171771; background-color:#bdd9f4;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-right" style="margin-bottom: 10px">
                                            Date & Time:{{ $odr->created_at }}
                                        </div>
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-4">
                                                <div class="card m-b-20">
                                                    <div class="card-header">
                                                        <h3>Billing Address</h3>
                                                    </div>
                                                    <div class="card-block">
                                                        {{-- <h4>{{ $odr->name }}</h4> --}}
                                                        <h6 class="card-subtitle text-muted">
                                                            {{ $odr->billing_address->name }}</h6>
                                                        <p class="card-text">
                                                            {{ $odr->billing_address->mobile_number }}<br>
                                                            {{ $odr->billing_address->address }} <br>
                                                            {{ $odr->billing_address->city }},{{ $odr->billing_address->state }}<br>
                                                            {{ $odr->billing_address->pincode }}<br>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card m-b-20">
                                                    <div class="card-header" style="font-weight: bold">
                                                        <h3>Shipping Address</h3>
                                                    </div>
                                                    <div class="card-block">
                                                        {{-- <h4>{{ $odr->name }}</h4> --}}
                                                        <h6 class="card-subtitle text-muted">
                                                            {{ $odr->shipping_address->name }}</h6>
                                                        <p class="card-text">
                                                            {{ $odr->shipping_address->mobile_number }}<br>
                                                            {{ $odr->shipping_address->address }} <br>
                                                            {{ $odr->shipping_address->city }},{{ $odr->shipping_address->state }} <br>
                                                            {{ $odr->shipping_address->pincode }}<br>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3>Payment Information</h3>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="font-weight-bold">
                                                            Method:
                                                            <span class="font-weight-normal">Cash On Delivey</span>
                                                        </div>
                                                        <div class="col-12"><br><br>
                                                            <button type="button" class="btn btn-light" 
                                                                style="float: right;"> <a href="{{ url('/myorder_details', [$odr->id]) }}">
                                                                <i class="fa fa-eye fa-lg"></i> &nbsp;View Product </a>
                                                            </button> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="width: 100%;border-bottom: solid #e1e1e3;margin-bottom: 10px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom text-right"
                                style="border: solid #171771; background-color:#88b9e7; color:rgb(11, 11, 150);">
                                <div class="col-50" style="width: 30%"><b>Order
                                        Status:&nbsp;{{ $odr->order_status }}</div>
                                <div class="col-50" style="width: 30%">Total
                                    Price:&nbsp;{{ $odr->total_price }} </b> </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!--- .container-->
    </div>
    <!--- .main-container -->
@endsection