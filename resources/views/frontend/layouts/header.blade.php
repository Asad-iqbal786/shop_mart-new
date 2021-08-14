<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            <li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
                            <li><i class="ti-email"></i> support@shophub.com</li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-8 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            <li><i class="ti-location-pin"></i>Track Order</li>
                            @auth
                            @if (Auth::user()->role==('admin'))
                            <a href="{{ route('adminAdmin') }}">Dashboard Admin</a>
                            @elseif(Auth::user()->role==('seller'))
                            <a href="{{ route('userAdmin') }}">Dashboard Seller</a>
                            @elseif(Auth::user()->role==('user'))
                            <a href="{{ route('user.home') }}">Dashboard User</a>
                            {{-- null --}}
                            @endif
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                 <i class="ti-power-off"></i> {{ __('Logout') }}
                            </a>
                
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form></li>
                            @else
                            <li><i class="ti-power-off"></i><a href="{{route('login')}}">Login /</a> <a href="{{route('register')}}">Register</a></li>
                            @endauth
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img src="images/logo.png" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"><div class="slicknav_menu"><a href="#" aria-haspopup="true" role="button" tabindex="0" class="slicknav_btn slicknav_collapsed" style="outline: none;"><span class="slicknav_menutxt"></span><span class="slicknav_icon slicknav_no-text"><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span></span></a><ul class="slicknav_nav slicknav_hidden" aria-hidden="true" role="menu" style="display: none;">
                                                <li class="active"><a href="#" role="menuitem" tabindex="-1">Home</a></li>
                                                <li><a href="#" role="menuitem" tabindex="-1">Product</a></li>												
                                                <li><a href="#" role="menuitem" tabindex="-1">Service</a></li>
                                                <li class="slicknav_collapsed slicknav_parent"><a href="#" role="menuitem" aria-haspopup="true" tabindex="-1" class="slicknav_item slicknav_row" style="outline: none;"><a href="#" tabindex="-1">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                                                    <span class="slicknav_arrow">►</span></a><ul class="dropdown slicknav_hidden" role="menu" aria-hidden="true" style="display: none;">
                                                        <li><a href="shop-grid.html" role="menuitem" tabindex="-1">Shop Grid</a></li>
                                                        <li><a href="cart.html" role="menuitem" tabindex="-1">Cart</a></li>
                                                        <li><a href="checkout.html" role="menuitem" tabindex="-1">Checkout</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#" role="menuitem" tabindex="-1">Pages</a></li>									
                                                <li class="slicknav_collapsed slicknav_parent"><a href="#" role="menuitem" aria-haspopup="true" tabindex="-1" class="slicknav_item slicknav_row" style="outline: none;"><a href="#" tabindex="-1">Blog<i class="ti-angle-down"></i></a>
                                                    <span class="slicknav_arrow">►</span></a><ul class="dropdown slicknav_hidden" role="menu" aria-hidden="true" style="display: none;">
                                                        <li><a href="blog-single-sidebar.html" role="menuitem" tabindex="-1">Blog Single Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="contact.html" role="menuitem" tabindex="-1">Contact Us</a></li>
                                            </ul></div></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <select style="display: none;">
                                <option selected="selected">All Category</option>
                                <option>watch</option>
                                <option>mobile</option>
                                <option>kid’s item</option>
                            </select><div class="nice-select" tabindex="0"><span class="current">All Category</span><ul class="list"><li data-value="All Category" class="option selected">All Category</li><li data-value="watch" class="option">watch</li><li data-value="mobile" class="option">mobile</li><li data-value="kid’s item" class="option">kid’s item</li></ul></div>
                            <form>
                                <input name="search" placeholder="Search Products Here....." type="search">
                                <button class="btnn"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <!-- Search Form -->
                        <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar shopping">
                            <a href="{{route('cart-page')}}" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{ count((array) session('cart')) }}</span></a>
                            <!-- Shopping Item -->
                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span>{{ count((array) session('cart')) }}   Items</span>
                                    <a href="#">View Cart</a>
                                </div>
                                <ul class="shopping-list"> 

                                    {{-- @php
                                        $asad=DB::table('products')->where('status','active')->orderBy('id','DESC')->limit(3)->get();
                                    @endphp --}}

                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                    <li>
                                        <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                        {{-- @php
                                            $photo=explode(',',$item->photo);
                                        @endphp --}}
                                        <a class="cart-img" href="#"><img src="{{ $details['photo'] }}" alt="#"></a>
                                        {{-- <p>{{ $details['title'] }}</p> --}}
                                        <h4><a href="#">{{ $details['title'] }}</a></h4>

                                        <p class="quantity">1x - <span class="amount">${{ $details['price'] }}</span></p>
                                    </li>
                                    @endforeach
                                @endif



                                </ul>
                                <div class="bottom">
                                    <div class="total">
                                        <span>Total</span>
                                        <span class="total-amount">$134.00</span>
                                    </div>
                                    <a href="{{ route('cart-page')}}" class="btn animate">Checkout</a>
                                </div>
                            </div>
                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-9 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">	
                                    <div class="nav-inner">	
                                        <ul class="nav main-menu menu navbar-nav">
                                                <li class="active"><a href="{{route('index')}}">Home</a></li>
                                                <li><a href="{{route('product')}}">Product</a></li>												
                                                <li><a href="#">Service</a></li>
                                                <li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                                                    <ul class="dropdown">
                                                        <li><a href="shop-grid.html">Shop Grid</a></li>
                                                        <li><a href="cart.html">Cart</a></li>
                                                        <li><a href="checkout.html">Checkout</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Pages</a></li>									
                                                <li><a href="{{ route('about-us')}}">Blog<i class="ti-angle-down"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="{{ route('contact')}}">Contact Us</a></li>
                                            </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>