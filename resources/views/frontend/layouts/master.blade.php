<!DOCTYPE html>
<html lang="en" dir="ltr">
@php
    $settings=DB::table('settings')->get();
    $total_prod=0;

    $total_amount=0;
    if(session('wishlist')){
        foreach(session('wishlist') as $wishlist_items){
                $total_prod+=$wishlist_items['quantity'];
                $total_amount+=$wishlist_items['amount'];
        }
    }


@endphp
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">

    <link rel="icon" type="image/png" href="images/favicon.png">
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
    <!-- css -->
    <link rel="stylesheet" href="{{  asset('theme/vendor/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{  asset('theme/vendor/owl-carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{  asset('theme/vendor/photoswipe/photoswipe.css')}}">
    <link rel="stylesheet" href="{{  asset('theme/vendor/photoswipe/default-skin/default-skin.css')}}">
    <link rel="stylesheet" href="{{  asset('theme/vendor/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{  asset('theme/css/style.css')}}">
    <link rel="stylesheet" href="{{  asset('theme/css/style.header-spaceship-variant-one.css')}}" media="(min-width: 1200px)">
    <link rel="stylesheet" href="{{  asset('theme/css/style.mobile-header-variant-one.css')}}" media="(max-width: 1199px)">
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="{{  asset('theme/vendor/fontawesome/css/all.min.css')}}">

    <title> Panther Force || @yield('title') </title>
</head>

<body>
    <!-- site -->
    <div class="site">


        <header class="site__mobile-header">
            <div class="mobile-header">
                <div class="container">
                    <div class="mobile-header__body">
                        <button class="mobile-header__menu-button" type="button">
                            <svg width="18px" height="14px">
                                <path d="M-0,8L-0,6L18,6L18,8L-0,8ZM-0,-0L18,-0L18,2L-0,2L-0,-0ZM14,14L-0,14L-0,12L14,12L14,14Z"></path>
                            </svg>
                        </button>
                        <a class="mobile-header__logo"  href="{{ route('home') }}">
                            <img src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="" width="100">
                        </a>
                        <div class="mobile-header__search mobile-search">
                            <form class="mobile-search__body" method="post" action="{{route('product.search')}}" >
                                @csrf
                                <input class="mobile-search__input"  name="search" placeholder="Search Products Here....." type="search" id="search" autocomplete="off">

                                <button type="submit" class="mobile-search__button mobile-search__button--search">
                                    <svg width="20" height="20">
                                        <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
	                                                c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
	                                    c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z"></path>
                                    </svg>
                                </button>
                                <button type="button" class="mobile-search__button mobile-search__button--close">
                                    <svg width="20" height="20">
                                        <path d="M16.7,16.7L16.7,16.7c-0.4,0.4-1,0.4-1.4,0L10,11.4l-5.3,5.3c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L8.6,10L3.3,4.7
	                                    c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L10,8.6l5.3-5.3c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L11.4,10l5.3,5.3
	                                        C17.1,15.7,17.1,16.3,16.7,16.7z"></path>
                                    </svg>
                                </button>
                                <div class="mobile-search__field"></div>
                            </form>
                        </div>
                        <div class="mobile-header__indicators">
                            <div class="mobile-indicator mobile-indicator--search d-md-none">
                                <button type="button" class="mobile-indicator__button">
                                    <span class="mobile-indicator__icon"><svg width="20" height="20">
                                            <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
	                                    c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
	                                c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z"></path>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                            <div class="mobile-indicator d-none d-md-block">
                                <a href="account-login.html" class="mobile-indicator__button">
                                    <span class="mobile-indicator__icon"><svg width="20" height="20">
                                            <path d="M20,20h-2c0-4.4-3.6-8-8-8s-8,3.6-8,8H0c0-4.2,2.6-7.8,6.3-9.3C4.9,9.6,4,7.9,4,6c0-3.3,2.7-6,6-6s6,2.7,6,6
	                                        c0,1.9-0.9,3.6-2.3,4.7C17.4,12.2,20,15.8,20,20z M14,6c0-2.2-1.8-4-4-4S6,3.8,6,6s1.8,4,4,4S14,8.2,14,6z"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div class="mobile-indicator d-none d-md-block">
                                <a href="wishlist.html" class="mobile-indicator__button">
                                    <span class="mobile-indicator__icon">
                                        <svg width="20" height="20">
                                            <path d="M14,3c2.2,0,4,1.8,4,4c0,4-5.2,10-8,10S2,11,2,7c0-2.2,1.8-4,4-4c1,0,1.9,0.4,2.7,1L10,5.2L11.3,4C12.1,3.4,13,3,14,3 M14,1
	                                c-1.5,0-2.9,0.6-4,1.5C8.9,1.6,7.5,1,6,1C2.7,1,0,3.7,0,7c0,5,6,12,10,12s10-7,10-12C20,3.7,17.3,1,14,1L14,1z"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div class="mobile-indicator">
                                <a href="{{ route('cart') }}" class="mobile-indicator__button">
                                    <span class="mobile-indicator__icon">
                                        <svg width="20" height="20">
                                            <circle cx="7" cy="17" r="2"></circle>
                                            <circle cx="15" cy="17" r="2"></circle>
                                            <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	                                                V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	                                        C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"></path>
                                        </svg>
                                        <span class="mobile-indicator__counter">{{Helper::cartCount()}}</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- site__mobile-header / end -->
        <!-- site__header -->
        <header class="site__header">
            <div class="header">
                <div class="header__megamenu-area megamenu-area"></div>
                <div class="header__topbar-start-bg"></div>
                <div class="header__topbar-start">
                    <div class="topbar topbar--spaceship-start">
                        <div class="topbar__item-text d-none d-xxl-flex">Call Us: @foreach($settings as $data) {{$data->phone}} @endforeach</div>
                        <div class="topbar__item-text"><a class="topbar__link" href="{{route('about-us')}}">About Us</a></div>
                        <div class="topbar__item-text"><a class="topbar__link" href="{{route('contact')}}">Contacts</a></div>
                        <div class="topbar__item-text"><a class="topbar__link" href="{{route('order.track')}}">Track Order</a></div>
                    </div>
                </div>
                <div class="header__topbar-end-bg"></div>
                <div class="header__topbar-end">
                    <div class="topbar topbar--spaceship-end">
                        <div class="topbar__item-button">
                            <a href="" class="topbar__button">
                                <span class="topbar__button-label">Email:</span>
                                <span class="topbar__button-title">@foreach($settings as $data) {{$data->email}} @endforeach</span>
                            </a>

                        </div>



                    </div>
                </div>
                <div class="header__navbar">
                    <div class="header__navbar-menu">
                        <div class="main-menu">
                            <ul class="main-menu__list">
                                <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                                    <a href="{{route('home')}}" class="main-menu__link">
                                        Home

                                    </a>

                                </li>
                                <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
                                    <a href="#" class="main-menu__link">
                                        Shop
                                        <svg width="7px" height="5px">
                                            <path d="M0.280,0.282 C0.645,-0.084 1.238,-0.077 1.596,0.297 L3.504,2.310 L5.413,0.297 C5.770,-0.077 6.363,-0.084 6.728,0.282 C7.080,0.634 7.088,1.203 6.746,1.565 L3.504,5.007 L0.262,1.565 C-0.080,1.203 -0.072,0.634 0.280,0.282 Z" />
                                        </svg>
                                    </a>
                                    <div class="main-menu__submenu">
                                        <ul class="menu">
                                            <li class="menu__item menu__item--has-submenu">
                                                <a href="#" class="menu__link">
                                                    Category
                                                    <span class="menu__arrow">
                                                        <svg width="6px" height="9px">
                                                            <path d="M0.3,7.4l3-2.9l-3-2.9c-0.4-0.3-0.4-0.9,0-1.3l0,0c0.4-0.3,0.9-0.4,1.3,0L6,4.5L1.6,8.7c-0.4,0.4-0.9,0.4-1.3,0l0,0C-0.1,8.4-0.1,7.8,0.3,7.4z" />
                                                        </svg>
                                                    </span>
                                                </a>
                                                <div class="menu__submenu">
                                                    <ul class="menu">
                                                        @foreach(Helper::getAllCategory() as $cat)
                                                        <li class="menu__item">
                                                            <a href="{{route('product-cat',$cat->slug)}}" class="menu__link">
                                                                {{$cat->title}}
                                                            </a>
                                                        </li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </li>


                                            <li class="menu__item">
                                                <a href="{{ route('all.products') }}" class="menu__link">
                                                    All Products
                                                </a>
                                            </li>



                                        </ul>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header__logo">
                    <a href="{{ route('home') }}" class="logo">
                        <div class="logo__slogan">
                           Panther Force , Mobile Phones Accessories
                        </div>
                        <div class="logo__image">
                            <!-- logo -->
                             <img src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="" width="140">
                            <!-- logo / end -->
                        </div>
                    </a>
                </div>
                <div class="header__search">
                    <div class="search">
                        <form method="post"  action="{{route('product.search')}}" class="search__body">
                            @csrf
                            <div class="search__shadow"></div>
                            <input class="search__input"  name="search" placeholder="Search Products Here....." type="search" id="search" autocomplete="off">

                            <div class="search__box"></div>
                            <div class="search__decor">
                                <div class="search__decor-start"></div>
                                <div class="search__decor-end"></div>
                            </div>
                            <div class="search__dropdown search__dropdown--suggestions suggestions d-none" id="search__dropdown">
                                <div class="suggestions__group">
                                    <div class="suggestions__group-content" id="search-suggestions">
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="header__indicators">
                    <div class="indicator">

                    </div>
                    <div class="indicator indicator--trigger--click">
                        <a href="#" class="indicator__button">
                            <span class="indicator__icon">
                                <svg width="32" height="32">
                                    <path d="M16,18C9.4,18,4,23.4,4,30H2c0-6.2,4-11.5,9.6-13.3C9.4,15.3,8,12.8,8,10c0-4.4,3.6-8,8-8s8,3.6,8,8c0,2.8-1.5,5.3-3.6,6.7
	                                    C26,18.5,30,23.8,30,30h-2C28,23.4,22.6,18,16,18z M22,10c0-3.3-2.7-6-6-6s-6,2.7-6,6s2.7,6,6,6S22,13.3,22,10z" />
                                </svg>
                            </span>
                            <span class="indicator__title">Hello, Log In</span>
                            <span class="indicator__value">My Account</span>
                        </a>
                        <div class="indicator__content">
                            <div class="account-menu">
                                @if(!Auth::user())
                                <form class="account-menu__form" method="post" action="{{route('login.submit')}}">
                                    @csrf
                                    <div class="account-menu__form-title">
                                        Log In to Your Account
                                    </div>
                                    <div class="form-group">
                                        <label for="header-signin-email" class="sr-only">Email address</label>
                                        <input id="header-signin-email" name="email" required="required" value="{{old('email')}}"  type="email" class="form-control form-control-sm" placeholder="Email address">
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="header-signin-password" class="sr-only">Password</label>
                                        <div class="account-menu__form-forgot">
                                            <input id="header-signin-password" type="password" class="form-control form-control-sm" name="password" placeholder="Your Password" required="required" value="{{old('password')}}">
                                            @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group account-menu__form-button">
                                        <button type="submit" class="btn btn-primary btn-sm">Login</button>
                                    </div>
                                    <div class="account-menu__form-link">
                                        <a href="{{route('register.form')}}">Create An Account</a>
                                    </div>
                                </form>
                                @endif
                                <div class="account-menu__divider"></div>

                                @auth
                                    <a href="" class="account-menu__user">
                                        <div class="account-menu__user-avatar">
                                            <img src="{{Auth()->user()->photo}}" alt="">
                                        </div>
                                        <div class="account-menu__user-info">
                                            <div class="account-menu__user-name"> {{ Auth::user()->name }} </div>
                                            <div class="account-menu__user-email"> {{ Auth::user()->email }} </div>
                                        </div>
                                    </a>
                                    <div class="account-menu__divider"></div>
                                    <ul class="account-menu__links">
                                        <li>
                                            @if(Auth::user()->role=='admin')
                                                <a href="{{route('admin')}}">Dashboard</a>
                                            @else
                                            <a href="{{route('user')}}">Dashboard</a>
                                            @endif
                                        </li>
                                    </ul>
                                    <div class="account-menu__divider"></div>
                                    <ul class="account-menu__links">
                                        <li><a href="{{route('user.logout')}}">Logout</a></li>
                                    </ul>
                                @endauth
                            </div>
                        </div>
                    </div>
                    <div class="indicator indicator--trigger--click">
                        <a href="{{route('cart')}}" class="indicator__button">
                            <span class="indicator__icon">
                                <svg width="32" height="32">
                                    <circle cx="10.5" cy="27.5" r="2.5" />
                                    <circle cx="23.5" cy="27.5" r="2.5" />
                                    <path d="M26.4,21H11.2C10,21,9,20.2,8.8,19.1L5.4,4.8C5.3,4.3,4.9,4,4.4,4H1C0.4,4,0,3.6,0,3s0.4-1,1-1h3.4C5.8,2,7,3,7.3,4.3
	                                    l3.4,14.3c0.1,0.2,0.3,0.4,0.5,0.4h15.2c0.2,0,0.4-0.1,0.5-0.4l3.1-10c0.1-0.2,0-0.4-0.1-0.4C29.8,8.1,29.7,8,29.5,8H14
	                                        c-0.6,0-1-0.4-1-1s0.4-1,1-1h15.5c0.8,0,1.5,0.4,2,1c0.5,0.6,0.6,1.5,0.4,2.2l-3.1,10C28.5,20.3,27.5,21,26.4,21z" />
                                </svg>
                                <span class="indicator__counter">{{Helper::cartCount()}}</span>
                            </span>
                            <span class="indicator__title">Shopping Cart</span>
                            <span class="indicator__value">£{{number_format(Helper::totalCartPrice(),2)}}</span>
                        </a>
                        @auth
                        <div class="indicator__content">
                            <div class="dropcart">
                                <ul class="dropcart__list">

                                    @foreach(Helper::getAllProductFromCart() as $data)
                                    @php
                                        $photo=explode(',',$data->product['photo']);
                                    @endphp
                                    <li class="dropcart__item">
                                        <div class="dropcart__item-image image image--type--product">
                                            <a class="image__body" href="{{route('product-detail',$data->product['slug'])}}">
                                                <img class="image__tag" src="{{$photo[0]}}" alt="" style="width: 60%">
                                            </a>
                                        </div>
                                        <div class="dropcart__item-info">
                                            <div class="dropcart__item-name">
                                                <a href="{{route('product-detail',$data->product['slug'])}}">  {{  $data->product['title'] }} </a>
                                            </div>

                                            <div class="dropcart__item-meta">
                                                <div class="dropcart__item-quantity">{{$data->quantity}}</div>
                                                <div class="dropcart__item-price">£{{number_format($data->price,2)}}</div>
                                            </div>
                                        </div>
                                        <a  href="{{route('cart-delete',$data->id)}}" class="dropcart__item-remove"><svg width="10" height="10">
                                                <path d="M8.8,8.8L8.8,8.8c-0.4,0.4-1,0.4-1.4,0L5,6.4L2.6,8.8c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L3.6,5L1.2,2.6
	                                                c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L5,3.6l2.4-2.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L6.4,5l2.4,2.4
	                                            C9.2,7.8,9.2,8.4,8.8,8.8z" />
                                            </svg>
                                        </a>
                                    </li>
                                    @endforeach
                                    <li class="dropcart__divider" role="presentation"></li>


                                </ul>
                                <div class="dropcart__totals">
                                    <table>

                                        <tr>
                                            <th>Total</th>
                                            <td>£{{number_format(Helper::totalCartPrice(),2)}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="dropcart__actions">
                                    <a href="{{route('cart')}}" class="btn btn-secondary">View Cart</a>
                                    <a href="{{route('checkout')}}" class="btn btn-primary">Checkout</a>
                                </div>
                            </div>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </header>
        <!-- site__header / end -->
        <!-- site__body -->

        @section('content')
        @show



        <div class="mobile-menu">
            <div class="mobile-menu__backdrop"></div>
            <div class="mobile-menu__body">
                <button class="mobile-menu__close" type="button"><svg width="12" height="12">
                        <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
        c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
        C11.2,9.8,11.2,10.4,10.8,10.8z"></path>
                    </svg>
                </button>
                <div class="mobile-menu__panel">
                    <div class="mobile-menu__panel-header">
                        <div class="mobile-menu__panel-title">Menu</div>
                    </div>
                    <div class="mobile-menu__panel-body">
                        <div class="mobile-menu__divider"></div>
                        <div class="mobile-menu__indicators">
                            {{-- <a class="mobile-menu__indicator" href="wishlist.html">
                                <span class="mobile-menu__indicator-icon">
                                    <svg width="20" height="20">
                                        <path d="M14,3c2.2,0,4,1.8,4,4c0,4-5.2,10-8,10S2,11,2,7c0-2.2,1.8-4,4-4c1,0,1.9,0.4,2.7,1L10,5.2L11.3,4C12.1,3.4,13,3,14,3 M14,1
        c-1.5,0-2.9,0.6-4,1.5C8.9,1.6,7.5,1,6,1C2.7,1,0,3.7,0,7c0,5,6,12,10,12s10-7,10-12C20,3.7,17.3,1,14,1L14,1z"></path>
                                    </svg>
                                </span>
                                <span class="mobile-menu__indicator-title">Wishlist</span>
                            </a> --}}
                            <a class="mobile-menu__indicator" href="account-dashboard.html">
                                <span class="mobile-menu__indicator-icon">
                                    <svg width="20" height="20">
                                        <path d="M20,20h-2c0-4.4-3.6-8-8-8s-8,3.6-8,8H0c0-4.2,2.6-7.8,6.3-9.3C4.9,9.6,4,7.9,4,6c0-3.3,2.7-6,6-6s6,2.7,6,6
        c0,1.9-0.9,3.6-2.3,4.7C17.4,12.2,20,15.8,20,20z M14,6c0-2.2-1.8-4-4-4S6,3.8,6,6s1.8,4,4,4S14,8.2,14,6z"></path>
                                    </svg>
                                </span>
                                <span class="mobile-menu__indicator-title">Account</span>
                            </a>
                            <a class="mobile-menu__indicator" href="{{ route('cart') }}">
                                <span class="mobile-menu__indicator-icon">
                                    <svg width="20" height="20">
                                        <circle cx="7" cy="17" r="2"></circle>
                                        <circle cx="15" cy="17" r="2"></circle>
                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
        V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
        C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"></path>
                                    </svg>
                                    <span class="mobile-menu__indicator-counter">{{Helper::cartCount()}}</span>
                                </span>
                                <span class="mobile-menu__indicator-title">Cart</span>
                            </a>

                        </div>
                        <div class="mobile-menu__divider"></div>
                        <ul class="mobile-menu__links">
                            <li data-mobile-menu-item="">
                                <a href="{{ route('home') }}" class="" >
                                    Home
                                </a>

                            </li>
                            <li data-mobile-menu-item="">
                                <a href="shop-grid-4-columns-sidebar.html" class="" data-mobile-menu-trigger="">
                                    Shop
                                    <svg width="7" height="11">
                                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
                                    C-0.1,9.8-0.1,10.4,0.3,10.7z"></path>
                                    </svg>
                                </a>
                                <div class="mobile-menu__links-panel" data-mobile-menu-panel="">
                                    <div class="mobile-menu__panel mobile-menu__panel--hidden">
                                        <div class="mobile-menu__panel-header">
                                            <button class="mobile-menu__panel-back" type="button">
                                                <svg width="7" height="11">
                                                    <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"></path>
                                                </svg>
                                            </button>
                                            <div class="mobile-menu__panel-title">Shop</div>
                                        </div>
                                        <div class="mobile-menu__panel-body">
                                            <ul class="mobile-menu__links">
                                                <li data-mobile-menu-item="">
                                                    <a href="category.html" class="" data-mobile-menu-trigger="">
                                                        Category
                                                        <svg width="7" height="11">
                                                            <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
                                                        C-0.1,9.8-0.1,10.4,0.3,10.7z"></path>
                                                        </svg>
                                                    </a>
                                                    <div class="mobile-menu__links-panel" data-mobile-menu-panel="">
                                                        <div class="mobile-menu__panel mobile-menu__panel--hidden">
                                                            <div class="mobile-menu__panel-header">
                                                                <button class="mobile-menu__panel-back" type="button">
                                                                    <svg width="7" height="11">
                                                                        <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"></path>
                                                                    </svg>
                                                                </button>
                                                                <div class="mobile-menu__panel-title">Category</div>
                                                            </div>
                                                            <div class="mobile-menu__panel-body">
                                                                <ul class="mobile-menu__links">

                                                                    @foreach(Helper::getAllCategory() as $cat)
                                                                        <li data-mobile-menu-item="">
                                                                            <a href="{{route('product-cat',$cat->slug)}}" data-mobile-menu-trigger="">
                                                                                {{$cat->title}}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-mobile-menu-item="">
                                                    <a href="{{ route('all.products') }}" class="" data-mobile-menu-trigger="">
                                                       All Products
                                                    </a>
                                                </li>




                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>


                            <li data-mobile-menu-item="">
                                <a href="{{route('about-us')}}" class="" data-mobile-menu-trigger="">
                                    About Us
                                </a>
                            </li>
                            <li data-mobile-menu-item="">
                                <a href="{{ route('contact') }}" class="" data-mobile-menu-trigger="">
                                    Contact Us
                                </a>
                            </li>

                            <li data-mobile-menu-item="">
                                <a href="{{ route('order.track') }}" class="" data-mobile-menu-trigger="">
                                    Track Order
                                </a>
                            </li>



                            <li data-mobile-menu-item="">
                                <a href="#" class="" data-mobile-menu-trigger="">
                                    Account
                                    <svg width="7" height="11">
                                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
        C-0.1,9.8-0.1,10.4,0.3,10.7z"></path>
                                    </svg>
                                </a>
                                <div class="mobile-menu__links-panel" data-mobile-menu-panel="">
                                    <div class="mobile-menu__panel mobile-menu__panel--hidden">
                                        <div class="mobile-menu__panel-header">
                                            <button class="mobile-menu__panel-back" type="button">
                                                <svg width="7" height="11">
                                                    <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"></path>
                                                </svg>
                                            </button>
                                            <div class="mobile-menu__panel-title">Account</div>
                                        </div>
                                        <div class="mobile-menu__panel-body">
                                            <ul class="mobile-menu__links">
                                                <li data-mobile-menu-item="">
                                                    <a href="{{ route('login.form') }}" class="" data-mobile-menu-trigger="">
                                                        Login &amp; Register
                                                    </a>
                                                </li>
                                                @if(Auth::user())
                                                    <li data-mobile-menu-item="">
                                                        @if(Auth::user()->role=='admin')
                                                            <a href="{{route('admin')}}">Dashboard</a>
                                                        @else
                                                            <a href="{{route('user')}}">Dashboard</a>
                                                        @endif
                                                    </li>
                                                @endif

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                        <div class="mobile-menu__spring"></div>
                        <div class="mobile-menu__divider"></div>
                        <a class="mobile-menu__contacts" href="">
                            <div class="mobile-menu__contacts-subtitle">Free call 24/7</div>
                            <div class="mobile-menu__contacts-title">800 060-0730</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <footer class="site__footer">
            <div class="site-footer">
                <div class="decor site-footer__decor decor--type--bottom">
                    <div class="decor__body">
                        <div class="decor__start"></div>
                        <div class="decor__end"></div>
                        <div class="decor__center"></div>
                    </div>
                </div>
                <div class="site-footer__widgets">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-xl-4">
                                <div class="site-footer__widget footer-contacts">
                                    <h5 class="footer-contacts__title">Contact Us</h5>
                                    <div class="footer-contacts__text">
                                        @foreach($settings as $data) {{$data->short_des}} @endforeach
                                    </div>
                                    <address class="footer-contacts__contacts">
                                        <dl>
                                            <dt>Phone Number</dt>
                                            <dd>@foreach($settings as $data) {{$data->phone}} @endforeach</dd>
                                        </dl>
                                        <dl>
                                            <dt>Email Address</dt>
                                            <dd>@foreach($settings as $data) {{$data->email}} @endforeach</dd>
                                        </dl>
                                        <dl>
                                            <dt>Our Location</dt>
                                            <dd> @foreach($settings as $data) {{$data->address}} @endforeach</dd>
                                        </dl>
                                        <dl>
                                            <dt>Working Hours</dt>
                                            <dd>Mon-Sat 10:00pm - 7:00pm</dd>
                                        </dl>
                                    </address>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-xl-2">
                                <div class="site-footer__widget footer-links">
                                    <h5 class="footer-links__title">Information</h5>
                                    <ul class="footer-links__list">
                                        <li class="footer-links__item"><a href="{{route('about-us')}}" class="footer-links__link">About Us</a></li>
                                        <li class="footer-links__item"><a href="{{route('contact')}}" class="footer-links__link">Contact Us</a></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-xl-2">

                            </div>
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="site-footer__widget footer-newsletter">
                                    <h5 class="footer-newsletter__title">Newsletter</h5>
                                    <div class="footer-newsletter__text">
                                        Enter your email address below to subscribe to our newsletter and keep up to date with discounts and special offers.
                                    </div>
                                    <form action="" class="footer-newsletter__form">
                                        <label class="sr-only" for="footer-newsletter-address">Email Address</label>
                                        <input type="text" class="footer-newsletter__form-input" id="footer-newsletter-address" placeholder="Email Address...">
                                        <button class="footer-newsletter__form-button">Subscribe</button>
                                    </form>
                                    <div class="footer-newsletter__text footer-newsletter__text--social">
                                        Follow us on social networks
                                    </div>
                                    <div class="footer-newsletter__social-links social-links">
                                        <ul class="social-links__list">
                                            <li class="social-links__item social-links__item--facebook"><a href="https://themeforest.net/user/kos9" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                            <li class="social-links__item social-links__item--twitter"><a href="https://themeforest.net/user/kos9" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            <li class="social-links__item social-links__item--youtube"><a href="https://themeforest.net/user/kos9" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                            <li class="social-links__item social-links__item--instagram"><a href="https://themeforest.net/user/kos9" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                            <li class="social-links__item social-links__item--rss"><a href="https://themeforest.net/user/kos9" target="_blank"><i class="fas fa-rss"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="site-footer__bottom">
                    <div class="container">
                        <div class="site-footer__bottom-row">
                            <div class="site-footer__copyright">
                                <!-- copyright -->
                                Powered by HTML — Designed by <a href="" target="_blank">Kreations</a>
                                <!-- copyright / end -->
                            </div>
                            <div class="site-footer__payments">
                                <img src="{{asset('backend/img/payments.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- site__footer / end -->
    </div>
    <!-- site / end -->
    <!-- mobile-menu -->
    <!-- mobile-menu / end -->
    <!-- quickview-modal -->
    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>



    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>-->
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- photoswipe / end -->
    <!-- scripts -->
    <script src="{{  asset('theme/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{  asset('theme/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{  asset('theme/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{  asset('theme/vendor/nouislider/nouislider.min.js')}}"></script>
    <script src="{{  asset('theme/vendor/photoswipe/photoswipe.min.js')}}"></script>
    <script src="{{  asset('theme/vendor/photoswipe/photoswipe-ui-default.min.js')}}"></script>
    <script src="{{  asset('theme/vendor/select2/js/select2.min.js')}}"></script>
    <script src="{{  asset('theme/js/number.js')}}"></script>
    <script src="{{  asset('theme/js/main.js')}}"></script>
    <script>
        const searchInput = document.getElementById('search');
        const suggestionsContainer = document.getElementById('search-suggestions');
        const searchDropdown = document.getElementById('search__dropdown');
        searchInput.addEventListener('input', function() {
            const searchText = this.value.trim();
            if (searchText.length === 0) {
                suggestionsContainer.innerHTML = ''; // Clear suggestions if no text
                return;
            }

            // Make an AJAX request to fetch search suggestions
            fetch('{{ route('product.suggestions') }}?search=' + encodeURIComponent(searchText))
                .then(response => response.json())
                .then(data => {
                    // Render suggestions
                    searchDropdown.classList.remove('d-none');
                    if (data.length === 0) {
                        suggestionsContainer.innerHTML = '<a class="suggestions__item suggestions__category" href="">No products found</a>';
                    }else{
                        suggestionsContainer.innerHTML = '';
                        data.forEach(product => {
                            const suggestionItem = document.createElement('a');
                            suggestionItem.classList.add('suggestions__item', 'suggestions__category');
                            suggestionItem.href = '{{ route('product-detail', ':id') }}'.replace(':id', product.slug);
                            suggestionItem.textContent = product.title;
                            suggestionsContainer.appendChild(suggestionItem);
                        });
                    }

                })
                .catch(error => {
                    console.error('Error fetching suggestions:', error);
                });
        });
    </script>
    @section('scripts')
    @show

</body>

</html>
