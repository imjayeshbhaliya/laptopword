@extends('frontview.frontmaster')
@section('frontcontent')
    <div class="main-container col2-left-layout ">
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li class="home"> <a href="{{ url('/') }}" title="Go to Home Page">Home</a>
                    </li>
                </ul>
            </div>
        </div>
        <!--- .breadcrumbs-->
        <div class="container">
            <div class="main">
                <div class="row filter">
                    <div class="col-left sidebar col-lg-3 col-md-3 col-sm-3 left-color color">
                        <div class="anav-container">
                        </div>
                        <div class="block block-layered-nav block-layered-nav--no-filters">
                            <div class="block-title"> <strong><span>Shop By</span></strong></div>
                            <div class="block-content toggle-content">
                                <p class="block-subtitle block-subtitle--filter">Filter</p>
                                <dl id="narrow-by-list">
                                    <dt class="even">By Price</dt>
                                    <dd class="even">
                                        <div class="slider-ui-wrap">
                                            <div id="price-range" class="slider-ui" slider-min="10000" slider-max="200000"
                                                slider-min-start="30000" slider-max-start="100000">
                                            </div>
                                        </div>

                                        <form action="#" class="price-range-form">
                                            <input type="integer" class="range_value range_value_min"
                                                target="#price-range" />
                                            <input type="integer" class="range_value range_value_max"
                                                target="#price-range" />

                                            <input type="button" class="btn-submit" onclick="rangefn()" value="OK" />
                                        </form>
                                    </dd>
                                    <dt class="even">By Category</dt>
                                    <dd class="even">
                                        <ol class="configurable-swatch-list color_list">
                                            @foreach ($category as $item)
                                                <li>
                                                    <label>
                                                        <input type="checkbox" value="{{ $item->id }}"
                                                            name="category_id" id="ddlCategory" class="cat_check">
                                                        <span class="count">{{ $item->name }}</span>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ol>
                                    </dd>
                                    <dt class="even">By Colors</dt>
                                    <dd class="even">
                                        <ol class="configurable-swatch-list color_list">
                                            @foreach ($colour as $color)
                                                <li>
                                                    <label>
                                                        <input type="checkbox" value="{{ $color->id }}"
                                                            name="color_check" id="" class="color_check">

                                                        <span class="count">{{ $color->name }}</span>
                                                    </label>
                                                </li>
                                            @endforeach
                                            <!-- <input type="button" class="btn-submit" onclick="rangefn()" value="OK" /> -->
                                        </ol>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <!--- .block-layered-nav-->
                    </div>
                    <!--- .sidebar-->
                    <div class="col-main col-lg-9 col-md-9 col-sm-9 col-xs-12 content-color color">
                        <div class="page-title category-title">
                            <h1>Laptop</h1>
                        </div>
                        <p class="category-image"><img src="" alt="Laptop" title="Laptop"></p>
                        <div class="category-products">
                            <div class="toolbar">
                                <div class="sorter">
                                    <p class="view-mode">
                                        <label>View as:</label>
                                        <a href="javascript:void(0)" title="Grid" id="grid" class="redirectjs grid viewas">
                                            <i class="icon-grid icons"></i>
                                        </a>
                                        <a href="javascript:void(0)" title="List" id="list" class="list viewas ">
                                            <i class="icon-list icons"></i>
                                        </a>
                                    </p>
                                    <div class="sort-by">
                                        <label>Sort By</label>
                                        <select class="name_price">
                                            <option value="name" selected> Name</option>
                                            <option value="price"> Price</option>
                                        </select>
                                        <select class="asc_desc">
                                            <option value="asc" selected> Ascending</option>
                                            <option value="desc"> Descending</option>
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>

                            <div id="content">
                                <title> Laptop | Grid</title>


                                <ul class="products-grid row products-grid--max-3-col last odd">
                                    @foreach ($products as $product)
                                        <li class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-mobile-12 item">
                                            <div class="category-products-grid">
                                                <div class="images-container">
                                                    <div class="product-hover">
                                                        <span class="sticker top-left"><span
                                                                class="labelnew">New</span></span>
                                                        <a href="{{ url('/products', $product->url) }}"
                                                            title="{{ $product->name }}" class="product-image">
                                                            <!-- ,$product->url -->
                                                            <img id="product-collection-image-8" class="img-responsive"
                                                                src="{{ url('uploads/products/' . $product->image) }}"
                                                                alt="" height="355" width="278">
                                                            <span class="product-img-back"> <img class="img-responsive"
                                                                    src="{{ url('uploads/products/' . $product->image) }}"
                                                                    alt="" height="355" width="278"> </span>
                                                        </a>
                                                    </div>
                                                    <div class="actions-no hover-box">
                                                        <div class="actions">
                                                            <button type="button" title="Add to Cart"
                                                                class="button btn-cart pull-left"><span><span>{{ $product->name }}</span></span></button>
                                                            {{-- <button type="button" title="Add to Cart" class="button btn-cart pull-left"><span><i class="icon-handbag icons"></i><span>Add to Cart</span></span></button> --}}

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-info products-textlink clearfix">
                                                    <h2 class="product-name"><a
                                                            href="{{ url('/products', $product->url) }}"
                                                            title="Configurable Product">{{ $product->name }}</a></h2>

                                                    <div class="price-box"> <span class="regular-price"> <span
                                                                class="price">₹{{ $product->price }}
                                                                <br>{{ $product->category->name }}({{ $product->colour->name }})</span>
                                                        </span></div>
                                                    {{-- <div class="categorycolour-box"> <span class="regular-categorycolour"> <span class="categorycolour">{{$product->category->name}},{{$product->colour->name}}</span> </span></div> --}}
                                                    <div class="ratings">
                                                        <div class="discription-box">
                                                            <p> {{ $product->discription }}</p>
                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                                <!--- .products-grid-->

                            </div>
                            <!--- .category-products-->
                        </div>
                        <!--- .col-main-->
                    </div>
                    <!--- .row-->
                </div>
                <!--- .main-->
            </div>
            <!--- .container-->



        </div>
    </div>
@endsection
@push('front-script')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#grid").click(function() {
                $.ajax({
                    type: "GET",
                    url: "{{ url('/grid') }}",

                    dataType: "html",
                    success: function(data) {
                        $("#content").html(data);
                    }

                });
            })
            $("#list").click(function() {
                $.ajax({
                    type: "GET",
                    url: "{{ url('/list') }}",

                    dataType: "html",
                    success: function(data) {
                        $("#content").html(data);
                    }

                });
            })

        });
    </script>
    <script>
        function rangefn() {

            var min_price = document.getElementsByClassName("range_value_min")[0].value;
            var max_price = document.getElementsByClassName("range_value_max")[0].value;
            var tmp_category = "";
            var tmp_colour = "";
            min_price = min_price.replace("₹", "");
            max_price = max_price.replace("₹", "");
            $("input:checkbox[name=category_id]:checked").each(function() {
                // tmp_category = tmp_category + $(this).val() +"|";
                tmp_category = tmp_category + $(this).val() + "|";
            });
            tmp_category = tmp_category.slice(0);
            // console.log('tmp_category');
            $("input:checkbox[name=color_check]:checked").each(function() {
                tmp_colour = tmp_colour + $(this).val() + "|";
            });
            tmp_colour = tmp_colour.slice(0);
            
            
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            $.ajax({
                type: "GET",
                dataType: "html",
                url: '/front/getrangeajax',
                data: {
                    'min_price': min_price,
                    'max_price': max_price,
                    'tmp_category': tmp_category,
                    'tmp_colour': tmp_colour,
                },
                success: function(data) {
                    console.log(data);
                    document.getElementById("content").innerHTML = data;
                }
            });

        }
    </script>
@endpush
































           