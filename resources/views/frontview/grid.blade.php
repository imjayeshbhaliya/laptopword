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
        </ul><!--- .products-grid-->

	</div><!--- .category-products-->
</div><!--- .col-main-->
</div><!--- .row-->
</div><!--- .main-->
</div><!--- .container-->


