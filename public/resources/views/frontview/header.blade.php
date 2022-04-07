<div class="wrapper">
    <div class="page">
        <div class="header-container header-color color">
            <div class="header_full">
                <div class="header">
                    <div class="header-logo show-992">
                        <a href="index.html" class="logo"> <img class="img-responsive"
                                src="assets/images/logo.png" alt="" /></a>
                    </div>
                    <!--- .header-logo -->
                    <div class="header-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="header-config-bg">
                                    <div class="header-wrapper-bottom">
                                        <div class="custom-menu col-lg-12">
                                            <div class="header-logo hidden-992">
                                                <a href="index.html" class="logo">
                                                    <img class="img-responsive" src="assets/images/logo.png"
                                                        alt="" /></a>
                                            </div>
                                            <!--- .header-logo -->
                                            <div class="magicmenu clearfix">
                                                <ul class="nav-desktop sticker">
                                                    <li class="level0 logo display"><a class="level-top"
                                                            href="index.html"><img alt="logo"
                                                                src="assets/images/logo.png"></a></li>
                                                    <li class="level0 home">
                                                        <a class="level-top"
                                                            href="{{ route('frontview.home') }}"><span
                                                                class="icon-home fa fa-home"></span><span
                                                                class="icon-text">Home</span></a>

                                                    </li>
                                                    <li class='level0 home'>
                                                        <a class="level-top" href="{{ url('gridView') }}"><span
                                                                class="icon-text">LAPTOPS</span><span
                                                                class="boder-menu"></span></a>

                                                    </li>
                                                </ul>
                                            </div>
                                            <!--- .magicmenu -->

                                        </div>
                                        <!--- .custom-menu -->
                                    </div>
                                    <!--- .header-wrapper-bottom -->
                                </div>
                                <!--- .header-config-bg -->
                            </div>
                            <!--- .row -->
                        </div>
                        <!--- .container -->
                    </div>
                    <!--- .header-bottom -->
                    <div class="header-page clearfix">

                        <div class="header-setting">
                            <div class="settting-switcher">
                                <div class="dropdown-toggle">
                                    <div class="icon-setting"><i class="icon-settings icons"></i></div>
                                </div>
                                <div class="dropdown-switcher">
                                    <div class="top-links-alo">
                                        <div class="header-top-link">
                                            <ul class="links">
                                                <li><a href="#" title="My Account">My Account</a></li>

                                                
                                                <!-- <li ><a href="checkout-step1.html" title="Checkout" class="top-link-checkout">Checkout</a></li>
             <li class=" last" ><a href="{{ route('login') }}" title="Log In" >Log In</a></li>
             <li>
                 <a class="nav-link " href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
      <p>Logout</p>
      </a>
      </li> -->
                                                @guest
                                                    @if (Route::has('login'))
                                                        <li class="nav-item">
                                                            <a class="nav-link"
                                                                href="{{ route('login') }}">{{ __('Login') }}</a>
                                                        </li>
                                                    @endif

                                                    @if (Route::has('register'))
                                                        <li class="nav-item">
                                                            <a class="nav-link"
                                                                href="{{ route('register') }}">{{ __('Register') }}</a>
                                                        </li>
                                                    @endif
                                                @else
                                                    <li class="nav-item dropdown">
                                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" v-pre>
                                                            {{ Auth::user()->username }}
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-right"
                                                            aria-labelledby="navbarDropdown">
                                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                                {{ __('Logout') }}
                                                            </a>

                                                            <form id="logout-form" action="{{ route('logout') }}"
                                                                method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="dropdown-menu dropdown-menu-right"
                                                            aria-labelledby="navbarDropdown">
                                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                                {{ __('Logout') }}
                                                            </a>

                                                            <form id="logout-form" action="{{ route('logout') }}"
                                                                method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </li>
                                                @endguest

                                                <li class="nav-item has-treeview menu-open">
                                                    <a class="nav-link " href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                        <p>Logout</p>
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}"
                                                        method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>


                                            </ul>
                                        </div>
                                    </div>
                                    <!--- .top-links-alo -->
                                </div>
                                <!--- .dropdown-switcher -->
                            </div>
                            <!--- .settting-switcher -->
                        </div>
                        <!--- .header-setting -->
                        <div class="miniCartWrap">
                            <div class="mini-maincart">
                                <div class="cartSummary">
                                    <div class="crat-icon">
                                        <span class="icon-handbag icons"></span>
                                        <p class="mt-cart-title">My Cart</p>
                                    </div>
                                    <div class="cart-header">
                                        <span class="zero">0 </span>
                                        <p class="cart-tolatl">
                                            <span class="toltal">Total:</span>
                                            <span><span class="price">$0.00</span></span>
                                        </p>
                                    </div>
                                </div>
                                <!--- .cartSummary -->
                                <div class="mini-contentCart" style="display: none">
                                    <div class="block-content">
                                        <p class="block-subtitle">Recently added item(s)</p>
                                        <ol id="cart-sidebar" class="mini-products-list clearfix">

                                        </ol>
                                        {{-- <p class="subtotal"> <span class="label">Subtotal:</span> <span class="price">$687.00</span></p> --}}
                                        <div class="actions"> <a href="{{ url('/cart') }}" clas s="view-cart">
                                                View cart </a> <a href="checkout-step1.html">Checkout</a></div>
                                    </div>
                                </div>
                                <!--- .mini-contentCart -->
                            </div>
                            <!--- .mini-maincart -->
                        </div>
                        <!--- .miniCartWrap -->
                        <div class="header-setting hidden-sm hidden-xs">
                            <div class="settting-switcher">
                                <div class="dropdown-toggle">
                                    <div class="icon-setting">
                                    </div>
                                </div>
                            </div>
                            <!--- .settting-switcher -->
                        </div>
                        <!--- .header-setting -->
                    </div>
                    <!--- .header-page -->
                </div>
                <!--- .header -->
            </div>
            <!--- .header_full -->
        </div>
        <!--- .header-container -->
