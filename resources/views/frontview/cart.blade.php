@extends('frontview.frontmaster')
@section('title')
    <title>Laptop world | Cart</title>
@endsection
@section('frontcontent')


<div class="main-container col1-layout content-color color">
    <div class="breadcrumbs">
        <div class="container">
            <ul>
                <li class="home"> <a href="{{ url('/') }}" title="Go to Home Page">Home</a></li>
                <li class="category4"><a href="{{ route('gridView') }}"
                    title="Go to laptop Page">Laptop</a></li>
                <li> <strong>My Cart</strong></li>
            </ul>
        </div>
    </div><!--- .breadcrumbs-->
    <div class="container">
        <div class="content-top no-border">
            <h2>My Cart</h2>

        </div>
        <div class="table-responsive-wrapper product_list product_data">

                <table class="table-order table-wishlist">
                    <thead>
                    <tr>
                        <td>Remove</td>
                        <td>Product Detail</td>
                        <td>Items</td>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $total=0;
                        @endphp
                    @foreach($cartitems as $item)
                        <tr class="list_item">
                            <!-- <td><button type="button" class="button-remove " id="" onclick="removeitem(this)" data-product_id="{{ $item->product_id }}"><i class="icon-close"></i></button></td> -->

                            <td><button type="button"  onclick="remove_cart({{ $item->product_id }})" class=" button-remove remove-cart-item"><i class="icon-close"></i></button></td>
                            
                            <td>
                                <table class="table-order-product-item fixed-solution">
                                    <tr>
                                        <td>
                                                    
                                            <div class="product-hover">
                                                            
                                                            
                                                <img id="product-collection-image-8" class="img-responsive" src="{{ url('uploads/products/' . $item->products->image) }}" alt="" height="100" width="100">
                                                <span class="product-img-back"> <img class="img-responsive" src="{{ url('uploads/products/' . $item->products->image) }}" alt="" height="100" width="100"> </span>
                                                           
                                            </div>
                                        </td>
                                        <td>
                                            <p>
                                                <a href="{{ $item->products->name }}" title="{{ $item->products->name }}">{{ $item->products->name }}</a>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td class="wish-list-control">
                                <div class="price_{{ $item->product_id }}">
                                    <p>₹{{ $item->products->price*$item->qty}}</p>

                                </div>
                                <input type="hidden" class="prod_id" value="{{ $item->product_id }}">
                                <div class="number-input">
                                    <button type="button" class="minus" data-product_id="{{ $item->product_id }}" id="{{$item->product_id}}" >-</button>
                                    <input type="text" value="{{$item->qty}}" name="qty" class="qty" maxlength="2" data-product_id="{{ $item->product_id }}" readonly>
                                    <button type="button" class="plus" data-product_id="{{ $item->product_id }}">+</button>
                                    <input type="hidden" name="product_id" id="qty_data_{{ $item->product_id }}">
                                    <input type="hidden" name="product_price" id="{{ $item->products->price }}">
                                </div>

                            </td>
                        </tr>
                        @php
                            $total +=  $item->products->price  * $item->qty ;
                        @endphp
                    @endforeach
                    <tr bgcolor="#EBECEE" lign="center">
                            <td></td>
                            <td ><h3>Total:{{ $total }}</h3></td>
                                    
                            <td > <a href="{{ url('/billing') }}" class="btn-step checkout">Checkout</a> 
                                <!-- <button class="btn">Checkout</button>  -->
                            </td>
                    </tr>
                    <!-- <tr>
                        <td colspan="3" class="text-right">
                            <h1>Total Price:-{{ $total }}</h1>  <a href="#" class="btn-step checkout">Checkout</a>
                        </td>
                    </tr> -->
                    </tbody>
                </table>

        </div><!--- .table-responsive-wrapper-->
    </div><!--- .container-->
</div><!--- .main-container -->

@endsection


@push('front-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript" src="{{ asset('resources/assets/front/scripts/jquery-3.4.1.min.js') }} "></script>
<script type="text/javascript">

        
        function remove_cart(prod_id)
            {
                
                console.log(prod_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                
                
                $.ajax({
                    type: "POST",
                    url: '/removecart',
                    data: {
                        'prod_id': prod_id,
                        
                    },

                    success: function(response) {

                        swal("",response.status,"success");
                        // $("#content").html(response);
                        window.location.reload();


                    }
                });
            }

        
        $('.plus,.minus,.qty').click(function (e) {
            e.preventDefault();

            var prod_id = $(this).attr('data-product_id');
            console.log('prod_id',prod_id);
            var prod_qty=$(`#qty_data_${prod_id}`).val();
            console.log('prod_qty',prod_qty);

            data={
                'prod_id':prod_id,
                'prod_qty':prod_qty,
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/updatecart",
                data: data,
                success: function (response) {
                    swal(response.status);




                    // let price_qty = parseInt(response.cart.qty);
                    // let price_int = parseInt(response.product_price);
                    // // console.log(typeof price_qty);
                    // let price = price_int * price_qty;
                    // console.log(price);
                    // $(`.product_data .list_item .wish-list-control .price_${prod_id} h2`).html('');
                    // $(`.product_data .list_item .wish-list-control .price_${prod_id} h2`).html(`₹${price}`);
                    // qty++;
                    // $(this).before('#qty').val(qty);
                    window.location.reload();
                }
            });
        });
        

    </script>
@endpush
