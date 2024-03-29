@extends('frontend.layouts.master')

@section('title','PRODUCT PAGE')

@section('content')
@php

     $maxPrice=DB::table('products')->max('price');
@endphp

<div class="site__body">
    <div class="block-header block-header--has-breadcrumb block-header--has-title">
        <div class="container">
            <div class="block-header__body">
                <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb__list">
                        <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                        <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
                            <a href="{{route('home')}}" class="breadcrumb__item-link">Home</a>
                        </li>

                        <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                            <span class="breadcrumb__item-link">Products</span>
                        </li>
                        <li class="breadcrumb__title-safe-area" role="presentation"></li>
                    </ol>
                </nav>
                <h1 class="block-header__title"> @if(isset($cat_name)) {{ $cat_name->title }} @else Popular Products @endif</h1>
            </div>
        </div>
    </div>

    <div class="block-split block-split--has-sidebar">
        <div class="container">
            <div class="block-split__row row no-gutters">
                <div class="block-split__item block-split__item-sidebar col-auto">
                    <div class="sidebar sidebar--offcanvas--mobile">
                        <div class="sidebar__backdrop"></div>
                        <div class="sidebar__body">
                            <div class="sidebar__header">
                                <div class="sidebar__title">Filters</div>
                                <button class="sidebar__close" type="button"><svg width="12" height="12">
                                        <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
                                c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
                                C11.2,9.8,11.2,10.4,10.8,10.8z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="sidebar__content">
                                <form action="{{route('shop.filter')}}" method="POST">
                                <div class="widget widget-filters widget-filters--offcanvas--mobile" data-collapse data-collapse-opened-class="filter--opened">
                                        <div class="widget__header widget-filters__header">
                                            <h4>Filters</h4>
                                        </div>
                                        <div class="widget-filters__list">
                                            <div class="widget-filters__item">
                                                <div class="filter filter--opened" data-collapse-item>
                                                    <button type="button" class="filter__title" data-collapse-trigger>
                                                        Categories
                                                        <span class="filter__arrow"><svg width="12px" height="7px">
                                                                <path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" />
                                                            </svg></span>
                                                    </button>
                                                    <div class="filter__body" data-collapse-content>

                                                        <div class="filter__container">
                                                            <div class="filter-categories">
                                                                <ul class="filter-categories__list">
                                                                    @php
                                                                        $menu=App\Models\Category::getAllParentWithChild();
                                                                    @endphp
                                                                     @foreach($menu as $cat_info)
                                                                        <li class="filter-categories__item filter-categories__item--child">
                                                                            <a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a>

                                                                        </li>
                                                                    @endforeach

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="widget-filters__item">
                                                <div class="filter filter--opened active" data-collapse-item>
                                                    <button type="button" class="filter__title" data-collapse-trigger>
                                                        Price
                                                        <span class="filter__arrow"><svg width="12px" height="7px">
                                                                <path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" />
                                                            </svg></span>
                                                    </button>

                                                    <div class="filter__body active" data-collapse-content>
                                                        <div class="filter__container">
                                                            <div class="filter-price" data-min="0" data-max="{{ $maxPrice }}" data-from="{{ $maxPrice/3 }}" data-to="{{ $maxPrice/2 }}">
                                                                <div class="filter-price__slider"></div>
                                                                <div class="filter-price__title-button">
                                                                    <div class="filter-price__title">£<span class="filter-price__min-value"></span> – £<span class="filter-price__max-value"></span></div>

                                                                    <button type="button" class="btn btn-xs btn-secondary filter-price__button" onclick="applyFilter()">Filter</button>
                                                                    <a href="{{ route('home') }}" class="btn btn-xs btn-secondary filter-price__button" >Reset</a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>

                                </div>
                                </form>
                                <div class="card widget widget-products d-none d-lg-block">
                                    <div class="widget__header">
                                        <h4>Latest Products</h4>
                                    </div>
                                    <div class="widget-products__list">
                                        @foreach($recent_products as $product)
                                        <!-- Single Post -->
                                        @php
                                            $photo=explode(',',$product->photo);
                                        @endphp

                                        <div class="widget-products__item">
                                            <div class="widget-products__image image image--type--product">
                                                <a href="{{route('product-detail',$product->slug)}}" class="image__body">
                                                    <img class="image__tag" src="{{$photo[0]}}" alt="">
                                                </a>
                                            </div>
                                            <div class="widget-products__info">
                                                <div class="widget-products__name">
                                                    <a href="{{route('product-detail',$product->slug)}}"> {{$product->title}} </a>
                                                </div>
                                                <div class="widget-products__prices">
                                                    @php
                                                        $org=($product->price-($product->price*$product->discount)/100);
                                                    @endphp
                                                    <div class="widget-products__price widget-products__price--current">{{number_format($org,2)}}</div>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-split__item block-split__item-content col-auto">
                    <div class="block">
                        <div class="products-view">
                            <div class="products-view__options view-options view-options--offcanvas--mobile">
                                <div class="view-options__body">
                                    <button type="button" class="view-options__filters-button filters-button">
                                        <span class="filters-button__icon"><svg width="16" height="16">
                                                <path d="M7,14v-2h9v2H7z M14,7h2v2h-2V7z M12.5,6C12.8,6,13,6.2,13,6.5v3c0,0.3-0.2,0.5-0.5,0.5h-2
                                                    C10.2,10,10,9.8,10,9.5v-3C10,6.2,10.2,6,10.5,6H12.5z M7,2h9v2H7V2z M5.5,5h-2C3.2,5,3,4.8,3,4.5v-3C3,1.2,3.2,1,3.5,1h2
                                                    C5.8,1,6,1.2,6,1.5v3C6,4.8,5.8,5,5.5,5z M0,2h2v2H0V2z M9,9H0V7h9V9z M2,14H0v-2h2V14z M3.5,11h2C5.8,11,6,11.2,6,11.5v3
                                                C6,14.8,5.8,15,5.5,15h-2C3.2,15,3,14.8,3,14.5v-3C3,11.2,3.2,11,3.5,11z" />
                                            </svg>
                                        </span>
                                        <span class="filters-button__title">Filters</span>
                                        <span class="filters-button__counter">3</span>
                                    </button>
                                    <div class="view-options__layout layout-switcher">
                                        <div class="layout-switcher__list">
                                            <button type="button" class="layout-switcher__button layout-switcher__button--active" data-layout="grid" data-with-features="false">
                                                <svg width="16" height="16">
                                                    <path d="M15.2,16H9.8C9.4,16,9,15.6,9,15.2V9.8C9,9.4,9.4,9,9.8,9h5.4C15.6,9,16,9.4,16,9.8v5.4C16,15.6,15.6,16,15.2,16z M15.2,7
                                                                H9.8C9.4,7,9,6.6,9,6.2V0.8C9,0.4,9.4,0,9.8,0h5.4C15.6,0,16,0.4,16,0.8v5.4C16,6.6,15.6,7,15.2,7z M6.2,16H0.8
                                                            C0.4,16,0,15.6,0,15.2V9.8C0,9.4,0.4,9,0.8,9h5.4C6.6,9,7,9.4,7,9.8v5.4C7,15.6,6.6,16,6.2,16z M6.2,7H0.8C0.4,7,0,6.6,0,6.2V0.8
                                                    C0,0.4,0.4,0,0.8,0h5.4C6.6,0,7,0.4,7,0.8v5.4C7,6.6,6.6,7,6.2,7z" />
                                                </svg>
                                            </button>
                                            <button type="button" class="layout-switcher__button" data-layout="grid" data-with-features="true">
                                                <svg width="16" height="16">
                                                    <path d="M16,0.8v14.4c0,0.4-0.4,0.8-0.8,0.8H9.8C9.4,16,9,15.6,9,15.2V0.8C9,0.4,9.4,0,9.8,0l5.4,0C15.6,0,16,0.4,16,0.8z M7,0.8
                                                                v14.4C7,15.6,6.6,16,6.2,16H0.8C0.4,16,0,15.6,0,15.2L0,0.8C0,0.4,0.4,0,0.8,0l5.4,0C6.6,0,7,0.4,7,0.8z" />
                                                </svg>
                                            </button>
                                            <button type="button" class="layout-switcher__button" data-layout="list" data-with-features="false">
                                                <svg width="16" height="16">
                                                    <path d="M15.2,16H0.8C0.4,16,0,15.6,0,15.2V9.8C0,9.4,0.4,9,0.8,9h14.4C15.6,9,16,9.4,16,9.8v5.4C16,15.6,15.6,16,15.2,16z M15.2,7
                                                        H0.8C0.4,7,0,6.6,0,6.2V0.8C0,0.4,0.4,0,0.8,0h14.4C15.6,0,16,0.4,16,0.8v5.4C16,6.6,15.6,7,15.2,7z" />
                                                </svg>
                                            </button>
                                            <button type="button" class="layout-switcher__button" data-layout="table" data-with-features="false">
                                                <svg width="16" height="16">
                                                    <path d="M15.2,16H0.8C0.4,16,0,15.6,0,15.2v-2.4C0,12.4,0.4,12,0.8,12h14.4c0.4,0,0.8,0.4,0.8,0.8v2.4C16,15.6,15.6,16,15.2,16z
                                                    M15.2,10H0.8C0.4,10,0,9.6,0,9.2V6.8C0,6.4,0.4,6,0.8,6h14.4C15.6,6,16,6.4,16,6.8v2.4C16,9.6,15.6,10,15.2,10z M15.2,4H0.8
                                                        C0.4,4,0,3.6,0,3.2V0.8C0,0.4,0.4,0,0.8,0h14.4C15.6,0,16,0.4,16,0.8v2.4C16,3.6,15.6,4,15.2,4z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="view-options__spring"></div>

                                </div>

                            </div>
                            {{-- @if(count($products)>0)
                            @foreach($products as $product)
                            @endforeach
                            @endif --}}
                            <div class="products-view__list products-list products-list--grid--4" data-layout="grid" data-with-features="false">
                                <div class="products-list__head">
                                    <div class="products-list__column products-list__column--image">Image</div>
                                    <div class="products-list__column products-list__column--meta">In Stock</div>
                                    <div class="products-list__column products-list__column--product">Product</div>
                                    <div class="products-list__column products-list__column--rating">Rating</div>
                                    <div class="products-list__column products-list__column--price">Price</div>
                                </div>
                                <div class="products-list__content">
                                    @if(count($products)>0)
                                        @foreach($products as $product)
                                        @php
                                        $photo=explode(',',$product->photo);
                                        @endphp
                                        <div class="products-list__item">
                                            <div class="product-card">
                                                <div class="product-card__actions-list">
                                                    <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                                                        <svg width="16" height="16">
                                                            <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
                                                                M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />
                                                        </svg>
                                                    </button>



                                                    <a class="product-card__action product-card__action--wishlist" href="{{route('add-to-wishlist',$product->slug)}}"  aria-label="Add to wish list">
                                                        <svg width="16" height="16">
                                                            <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
                                                                l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />
                                                        </svg>
                                                    </a>

                                                </div>
                                                <div class="product-card__image">
                                                    <div class="image image--type--product">
                                                        <a href="{{route('product-detail',$product->slug)}}" class="image__body">
                                                            <img class="image__tag" src="{{$photo[0]}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        <div class="status-badge__body">
                                                            <div class="status-badge__icon"><svg width="13" height="13">
                                                                    <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />
                                                                </svg>
                                                            </div>
                                                            <div class="status-badge__text"> {{$product->title}} </div>
                                                            <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__info">
                                                    <div class="product-card__meta"><span class="product-card__meta-title">In stock:</span> {{$product->stock}} </div>
                                                    <div class="product-card__name">
                                                        <div>
                                                            <a href="{{route('product-detail',$product->slug)}}"> {{$product->title}} </a>
                                                            @if($product->discount)
                                                                <div class="product-card__badges">
                                                                    <div class="tag-badge tag-badge--new"> {{$product->discount}} % Off</div>
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating">
                                                        <div class="rating product-card__rating-stars">
                                                            @php
                                                                $rate=DB::table('product_reviews')->where('product_id',$product->id)->avg('rate');
                                                                $rate_count=DB::table('product_reviews')->where('product_id',$product->id)->count();
                                                            @endphp

                                                            <div class="rating__body">

                                                                @for($i=1; $i<=5; $i++)
                                                                    @if($rate>=$i)
                                                                        <div class="rating__star rating__star--active"></div>
                                                                    @else
                                                                        <div class="rating__star"></div>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                        </div>
                                                        <div class="product-card__rating-label">{{$rate_count}} review</div>

                                                    </div>
                                                    <div class="product-card__features">
                                                        {!! html_entity_decode($product->summary) !!}
                                                    </div>

                                                </div>
                                                <div class="product-card__footer">
                                                    @php
                                                        $after_discount=($product->price-($product->price*$product->discount)/100);
                                                    @endphp
                                                    <div class="product-card__prices">
                                                        <div class="product-card__price product-card__price--new">£{{number_format($after_discount,2)}}</div>
                                                        <div class="product-card__price product-card__price--old">£{{number_format($product->price,2)}}</div>
                                                    </div>
                                                    <form action="{{route('single-add-to-cart')}}" method="post">
                                                    <a href="{{route('add-to-cart',$product->slug)}}" class="product-card__addtocart-icon" type="submit" aria-label="Add to cart">
                                                        <svg width="20" height="20">
                                                            <circle cx="7" cy="17" r="2" />
                                                            <circle cx="15" cy="17" r="2" />
                                                            <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
                                            V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
                                                C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                                                        </svg>
                                                    </a>

                                                        @csrf
                                                        <input type="hidden" name="slug" value="{{$product->slug}}">
                                                        <input type="hidden" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
                                                        <button class="product-card__addtocart-full" type="submit">
                                                            Add to cart
                                                        </button>

                                                    </form>
                                                    <a  href="{{route('add-to-wishlist',$product->slug)}}" class="product-card__wishlist">
                                                        <svg width="16" height="16">
                                                            <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
                                            l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />
                                                        </svg>
                                                        <span>Add to wishlist</span>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function applyFilter() {
            var minPrice = document.querySelector('.filter-price__min-value').textContent;
            var maxPrice = document.querySelector('.filter-price__max-value').textContent;

            // Update URL with new price range
            var urlParams = new URLSearchParams(window.location.search);
            urlParams.set('price', minPrice + '-' + maxPrice);
            window.location.search = urlParams.toString();
            // Submit the form
            document.getElementById('filterForm').submit();
        }
    </script>


@endsection
