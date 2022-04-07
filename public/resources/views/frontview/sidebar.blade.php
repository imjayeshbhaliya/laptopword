<div class="main-container col2-left-layout ">
    <div class="breadcrumbs">
        <div class="container">
            <ul>
                <li class="home"> <a href="#" title="Go to Home Page">Home</a></li>
                <li class="category4"> <strong>Chocolate</strong></li>
            </ul>
        </div>
    </div>
    <!--- .breadcrumbs-->
    <div class="container">
        <div class="main">
            <div class="row">
                <div class="col-left sidebar col-lg-3 col-md-3 col-sm-3 left-color color">
                    <div class="anav-container">
                    </div>
                    <!--- .anav-container-->
                    <div class="block block-layered-nav block-layered-nav--no-filters">
                        <div class="block-title"> <strong><span>Shop By</span></strong></div>
                        <div class="block-content toggle-content">
                            <p class="block-subtitle block-subtitle--filter">Filter</p>
                            <dl id="narrow-by-list">
                                <dt class="even">By Price</dt>
                                <dd class="even">
                                    <div class="slider-ui-wrap">
                                        <div id="price-range" class="slider-ui" slider-min="1" slider-max="5"
                                            slider-min-start="5" slider-max-start="200">
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
                                                    <span class="count">{{ $item->category_name }}</span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ol>
                                </dd>
                                <dt class="even">By Colors</dt>
                                <dd class="even">
                                    <ol class="configurable-swatch-list color_list">
                                        @foreach ($colors as $color)
                                            <li>
                                                <label>
                                                    <input type="checkbox" value="{{ $color->id }}"
                                                        name="color_check" id="" class="color_check">

                                                    <span class="count">{{ $color->color_name }}</span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ol>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <!--- .block-layered-nav-->

                </div>

                <div class="col-main col-lg-9 col-md-9 col-sm-9 col-xs-12 content-color color">
                    <div class="page-title category-title">
                        <h1>Chocolate</h1>
                    </div>
                    <p class="category-image"><img src="assets/images/categories_grid_1.jpg" alt="Men" title="Men"></p>
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
                                    <select>
                                        <option value="position" selected="selected"> Position</option>
                                        <option value="name"> Name</option>
                                        <option value="price"> Price</option>
                                    </select>
                                    <a href="#" title="Set Descending Direction"><img
                                            src="assets/images/i_asc_arrow.gif" alt="Set Descending Direction"
                                            class="v-middle"></a>
                                </div>
                                <div class="limiter">
                                    <label>Show</label>
                                    <select>
                                        <option value="9" selected="selected"> 9</option>
                                        <option value="12"> 12</option>
                                        <option value="15"> 15</option>
                                    </select>
                                </div>
                                <div class="pager">
                                    <div class="pages">
                                        <strong>Page:</strong>
                                        <ol>
                                            <li class="current">1</li>
                                            <li><a href="#">2</a></li>
                                            <li class="bor-none"> <a class="next i-next" href="#" title="Next">
                                                    <i class="fa fa-angle-right">&nbsp;</i> </a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--- .toolbar-->
                        <div id="content">@include('frontend.list')</div>
                        @push('front-script')
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $("#grid").click(function() {
                                        $.ajax({
                                            type: "GET",
                                            url: "{{ url('/products') }}",
                                            // data: {
                                            //     "data":data,
                                            // },
                                            dataType: "html",
                                            success: function(data) {
                                                $("#content").html(data);
                                            }

                                        });
                                    })
                                    $("#list").click(function() {
                                        $.ajax({
                                            type: "GET",
                                            url: "{{ url('/view_list') }}",
                                            // data: {
                                            //     "data":data,
                                            // },
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
                                    var tmp_cat = "";
                                    var tmp_clr = "";
                                    min_price = min_price.replace("₹", "");
                                    max_price = max_price.replace("₹", "");
                                    $("input:checkbox[name=category_id]:checked").each(function() {
                                        tmp_cat = tmp_cat + $(this).val() + "|";
                                    });
                                    // tmp_cat  = tmp_cat.slice(0, -1);
                                    tmp_cat = tmp_cat.slice(0);
                                    $("input:checkbox[name=color_check]:checked").each(function() {
                                        tmp_clr = tmp_clr + $(this).val() + "|";
                                    });
                                    tmp_clr = tmp_clr.slice(0);
                                    alert(tmp_cat);
                                    alert(max_price);
                                    $.ajax({
                                        type: "GET",
                                        //dataType: "json",
                                        url: '/front/getrangeajax',
                                        data: {
                                            'min_price': min_price,
                                            'max_price': max_price,
                                            'tmp_cat': tmp_cat,
                                            'tmp_clr': tmp_clr,
                                        },
                                        success: function(data) {
                                            console.log(data);
                                            document.getElementById("content").innerHTML = data;
                                        }
                                    });

                                }
                            </script>
                        @endpush
