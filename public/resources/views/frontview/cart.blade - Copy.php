@extends('frontview.frontmaster')
@section('title')
    <title>Laptop world | Cart</title>
@endsection
@section('frontcontent')

    
            
            
            <div class="main-container col1-layout content-color color">
                <div class="breadcrumbs">
                    <div class="container" >
                        <ul>
                            <li class="home"> <a href="{{ url('/') }}" title="Go to Home Page">Home</a></li>
                            <li> <strong>My Cart</strong></li>
                        </ul>
                    </div>
                </div><!--- .breadcrumbs-->
                
                <div class="container" id="content">
                    <div class="content-top no-border">
                        <h2>My Cart</h2>
                    </div>
                    @php
                        $total=0;
                    @endphp
                    
                    <div class="table-responsive-wrapper">
                        <table class="table-order table-wishlist">
                            <thead>
                                <tr>
                                    <td>Remove</td>
                                    <td>Product Detail & comments</td>
                                    <td>Add to cart</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartitems as $item)
                                <tr>
                                    <td><button type="button"  onclick="remove_cart({{ $item->product_id }})" class=" button-remove remove-cart-item"><i class="icon-close"></i></button></td>
                                    
                                    <td>
                                        <table class="table-order-product-item">
                                            <tr>
                                                <td>
                                                    
                                                        <div class="product-hover">
                                                            
                                                            
                                                                <img id="product-collection-image-8" class="img-responsive" src="{{ url('uploads/products/' . $item->products->image) }}" alt="" height="100" width="100">
                                                                <span class="product-img-back"> <img class="img-responsive" src="{{ url('uploads/products/' . $item->products->image) }}" alt="" height="100" width="100"> </span>
                                                           
                                                        </div>
                                                </td>
                                                <td><p>{{ $item->products->name }}</p></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="wish-list-control">
                                        ₹ {{ $item->products->price }}<br>
                                        <label for="qty">
                                            <input type="hidden" value="{{ $item->product_id }} " id="{{ $item->product_id }}" class="product_id">
                                            <input type="hidden" value="{{ $item->products->stock }} " class="orignol-stock">
                                                                
                                                                <div class="custom-qty qtyinput change_qty" > 
                                                                    <input type="text" name="qty" data-product_id="{{ $item->product_id }}"
                                                                        id="qty_data_{{ $item->product_id }}" maxlength="5" value="{{ $item->qty }}" title="Qty"
                                                                        class="input-text qty " />
                                                                    <button type="button" data-product_id="{{ $item->product_id }}" class="increase items"
                                                                        onclick="var result = document.getElementById('qty_data_{{ $item->product_id }}'); var qty = result.value; if( !isNaN( qty && qty < {{ $item->products->stock }} && qty < 5)) result.value++;return false;">
                                                                        <i class="fa fa-plus"></i> </button>
                                                                    <button type="button" class="reduced items" data-product_id="{{ $item->product_id }}"
                                                                        onclick="var result = document.getElementById('qty_data_{{ $item->product_id }}'); var qty = result.value; if( !isNaN( qty ) && qty > 1 ) result.value--;return false;">
                                                                        <i class="fa fa-minus">-</i> </button>
                                                                         <!-- && qty < {{ $item->products->stock }} && qty < 5 -->
                                                                </div>
                                                                </label>
                                                                        <!-- <td class="wish-list-control">
                                            <div class="price_{{ $item->product_id }}">
                                                <h2>₹{{$item->products->price*$item->qty}}</h2>

                                            </div>
                                            <input type="hidden" class="prod_id" value="{{ $item->product_id }}">
                                            <div class="number-input">
                                                <button type="button" class="minus" data-product_id="{{ $item->product_id }}" id="{{$item->product_id}}" >-</button>
                                                <input type="text" value="{{$item->qty}}" name="qty" class="qty" maxlength="5" data-product_id="{{ $item->product_id }}" readonly>
                                                <button type="button" class="plus" data-product_id="{{ $item->product_id }}">+</button>
                                                <input type="hidden" name="product_id" id="qty_data_{{ $item->product_id }}">
                                                <input type="hidden" name="product_price" id="$item->products->price">
                                            </div> -->

                                    </td>
                                </tr>
                                       
                                    </td>
                                </tr>
                                @php      
                                    $total+=$item->qty * $item->products->price; 
                                @endphp
                                @endforeach

                                <tr bgcolor="gray" lign="center">
                                    <td></td>
                                    <td >Total: ₹ {{ $total }}</td>
                                    
                                    <td  align="center" > <button class="btn">Checkout</button> </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div><!--- .table-responsive-wrapper-->
                </div><!--- .container-->
                
                
                
                
                
            </div><!--- .main-container -->
            <div class="footer-container footer-color color">
                  
                
@endsection
@push('front-script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
         
            // $(.remove-cart-item).click(function())
            function remove_cart(prod_id)
            {
                // var prod_id = document.getElementsByClassName("product_id")[0].value;
                // var prod_id = $(this).attr('id');
                // var prod_id = $(this).attr('data-product_id');
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
            // function update_cart()
            $('.change_qty').click()
             
            {
                // var prod_id = document.getElementsByClassName("product_id")[0].value;
                // var prod_qty = document.getElementsByClassName("qty")[0].value;
                var prod_id = $(this).attr('data-product_id');
                
                var prod_qty=$('#qty_data_${prod_id}').val();
                console.log('qty',prod_qty);

                console.log(prod_id);
                console.log(prod_qty);
                swal(prod_id);
                swal(prod_qty);

                 $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                
                
                $.ajax({
                    type: "POST",
                    url: '/updatecart',
                    data: {
                        'prod_id': prod_id,
                        'prod_qty': prod_qty,
                        
                    },

                    success: function(response) {
                        
                        swal("",response.status,"success");
                        // $("#content").html(response);
                        window.location.reload();

                    }
                });
            }
        

        
        
    </script>

@endpush
                
               