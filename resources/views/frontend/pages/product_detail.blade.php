@extends('frontend.layouts.master')

@section('meta')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">
	<meta name="description" content="{{$product_detail->summary}}">
	<meta property="og:url" content="{{route('product-detail',$product_detail->slug)}}">
	<meta property="og:type" content="article">
	<meta property="og:title" content="{{$product_detail->title}}">
	<meta property="og:image" content="{{$product_detail->photo}}">
	<meta property="og:description" content="{{$product_detail->description}}">
@endsection
@section('title','E-SHOP || PRODUCT DETAIL')
@section('content')
<div class="site__body">
    <div class="block-header block-header--has-breadcrumb">
        <div class="container">
            <div class="block-header__body">
                <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb__list">
                        <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                        <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
                            <a href="index.html" class="breadcrumb__item-link">Home</a>
                        </li>
                        <li class="breadcrumb__item breadcrumb__item--parent">
                            <a href="" class="breadcrumb__item-link">Breadcrumb</a>
                        </li>
                        <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                            <span class="breadcrumb__item-link">Product Detail</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="block-split">
        <div class="container">
            <div class="block-split__row row no-gutters">
                <div class="block-split__item block-split__item-content col-auto">
                    <div class="product product--layout--full">
                        <div class="product__body">
                            <div class="product__card product__card--one"></div>
                            <div class="product__card product__card--two"></div>
                            <div class="product-gallery product-gallery--layout--product-full product__gallery" data-layout="product-full">
                                <div class="product-gallery__featured">
                                    <button type="button" class="product-gallery__zoom">
                                        <svg width="24" height="24">
                                            <path d="M15,18c-2,0-3.8-0.6-5.2-1.7c-1,1.3-2.1,2.8-3.5,4.6c-2.2,2.8-3.4,1.9-3.4,1.9s-0.6-0.3-1.1-0.7
                                                c-0.4-0.4-0.7-1-0.7-1s-0.9-1.2,1.9-3.3c1.8-1.4,3.3-2.5,4.6-3.5C6.6,12.8,6,11,6,9c0-5,4-9,9-9s9,4,9,9S20,18,15,18z M15,2
                                                c-3.9,0-7,3.1-7,7s3.1,7,7,7s7-3.1,7-7S18.9,2,15,2z M16,13h-2v-3h-3V8h3V5h2v3h3v2h-3V13z" />
                                        </svg>
                                    </button>

                                    @php
                                        $photo=explode(',',$product_detail->photo);
                                    @endphp

                                    <div class="owl-carousel">

                                        @foreach($photo as $data)
                                            <a class="image image--type--product" href="{{$data}}" target="_blank"      data-width="700" data-height="700">
                                                <div class="image__body">
                                                    <img class="image__tag" src="{{$data}}" alt="">
                                                </div>
                                            </a>
                                         @endforeach

                                    </div>
                                </div>
                                <div class="product-gallery__thumbnails">
                                    <div class="owl-carousel">
                                        @php
                                            $photo=explode(',',$product_detail->photo);
                                        @endphp
                                        @foreach($photo as $data)
                                            <div class="product-gallery__thumbnails-item image image--type--product">
                                                <div class="image__body">
                                                    <img class="image__tag" src="{{$data}}" alt="">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="product__header">
                                <h1 class="product__title"> {{$product_detail->title}} </h1>
                                <div class="product__subtitle">
                                    <div class="product__rating">
                                        @php
                                            $rate=ceil($product_detail->getReview->avg('rate'))
                                        @endphp
                                        <div class="product__rating-stars">
                                            <div class="rating">
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
                                        </div>
                                        <div class="product__rating-label"><a href=""> {{$product_detail['getReview']->count()}} reviews</a></div>
                                    </div>
                                    <div class="status-badge status-badge--style--success product__fit status-badge--has-icon status-badge--has-text">

                                    </div>
                                </div>
                            </div>
                            <div class="product__main">

                                <div class="product__features">
                                    <p>
                                        {!!($product_detail->summary)!!}
                                    </p>
                                </div>
                            </div>
                            <div class="product__info">
                                <div class="product__info-card">
                                    <div class="product__info-body">
                                        <div class="product__badge tag-badge tag-badge--sale">  {{$product_detail->discount}} % Off</div>
                                        <div class="product__prices-stock">
                                            @php
                                                $after_discount=($product_detail->price-(($product_detail->price*$product_detail->discount)/100));
                                            @endphp
                                            <div class="product__prices">
                                                <div class="product__price product__price--current">£{{number_format($after_discount,2)}} </div>
                                                <div class="product-card__price product-card__price--old"> <s>£{{number_format($product_detail->price,2)}}</s>  </div>
                                            </div>

                                            <div class="status-badge status-badge--style--success product__stock status-badge--has-text">
                                                <div class="status-badge__body">
                                                    <div class="status-badge__text"> @if($product_detail->stock>0) In Stock @else Out Stock @endif </div>
                                                    <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="In&#x20;Stock"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product__meta">
                                            <table>
                                                <tr>
                                                    <th>SKU</th>
                                                    <td>PF124</td>
                                                </tr>
                                                <tr>
                                                    <th>Categories</th>
                                                    <td><a href="">{{$product_detail->cat_info['title']}}
                                                    </a></td>
                                                </tr>
                                                <tr>
                                                    <th>Country</th>
                                                    <td>UK</td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                    <div class="product-form product__form">
                                        <div class="product-form__body">


                                        </div>
                                    </div>
                                    <form action="{{route('single-add-to-cart')}}" method="POST">@csrf
                                    <div class="product__actions">

                                        <div class="product__actions-item product__actions-item--quantity">
                                            <div class="input-number">
                                                <input class="input-number__input form-control form-control-lg" name="quant[1]" type="number" min="1" value="1">
                                                <input type="hidden" name="slug" value="{{$product_detail->slug}}">
                                                <div class="input-number__add"></div>
                                                <div class="input-number__sub"></div>
                                            </div>
                                        </div>
                                        <div class="product__actions-item product__actions-item--addtocart">
                                            <button class="btn btn-primary btn-lg btn-block"  >Add to cart</button>
                                        </div>

                                        <div class="product__actions-divider"></div>
                                        <a href="{{route('add-to-wishlist',$product_detail->slug)}}" class="product__actions-item product__actions-item--wishlist" type="button">
                                            <svg width="16" height="16">
                                                <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />
                                            </svg>
                                            <span>Add to wishlist</span>
                                        </a>

                                    </div>
                                    </form>

                                </div>
                                <div class="product__shop-features shop-features">

                                </div>
                            </div>
                            <div class="product__tabs product-tabs product-tabs--layout--full">
                                <ul class="product-tabs__list">
                                    <li class="product-tabs__item product-tabs__item--active"><a href="#product-tab-description">Description</a></li>


                                </ul>
                                <div class="product-tabs__content">
                                    <div class="product-tabs__pane product-tabs__pane--active" id="product-tab-description">
                                        <div class="typography">
                                            <p>
                                                {!! ($product_detail->description) !!}
                                            </p>

                                        </div>
                                    </div>

                                    <div class="product-tabs__pane" id="product-tab-reviews">
                                        <div class="reviews-view">

                                            <form class="reviews-view__form">
                                                <h3 class="reviews-view__header">Write A Review</h3>
                                                <div class="row">
                                                    <div class="col-xxl-8 col-xl-10 col-lg-9 col-12">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label for="review-stars">Review Stars</label>
                                                                <select id="review-stars" class="form-control">
                                                                    <option>5 Stars Rating</option>
                                                                    <option>4 Stars Rating</option>
                                                                    <option>3 Stars Rating</option>
                                                                    <option>2 Stars Rating</option>
                                                                    <option>1 Stars Rating</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="review-author">Your Name</label>
                                                                <input type="text" class="form-control" id="review-author" placeholder="Your Name">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="review-email">Email Address</label>
                                                                <input type="text" class="form-control" id="review-email" placeholder="Email Address">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="review-text">Your Review</label>
                                                            <textarea class="form-control" id="review-text" rows="6"></textarea>
                                                        </div>
                                                        <div class="form-group mb-0 mt-4">
                                                            <button type="submit" class="btn btn-primary">Post Your Review</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-space block-space--layout--divider-nl"></div>
                    <div class="block block-products-carousel" data-layout="grid-5">
                        <div class="container">
                            <div class="section-header">
                                <div class="section-header__body">
                                    <h2 class="section-header__title">Related Products</h2>
                                    <div class="section-header__spring"></div>
                                    <div class="section-header__arrows">
                                        <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
                                            <button class="arrow__button" type="button"><svg width="7" height="11">
                                                    <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
                                            <button class="arrow__button" type="button"><svg width="7" height="11">
                                                    <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
                                                C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="section-header__divider"></div>
                                </div>
                            </div>
                            <div class="block-products-carousel__carousel">
                                <div class="block-products-carousel__carousel-loader"></div>
                                <div class="owl-carousel">
                                    @foreach($product_detail->rel_prods as $data)
                                        @if($data->id !==$product_detail->id)
                                            <div class="block-products-carousel__column">
                                                <div class="block-products-carousel__cell">
                                                    <div class="product-card product-card--layout--grid">
                                                        <div class="product-card__actions-list">

                                                            <a href="{{route('add-to-wishlist',$data->slug)}}" class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list">
                                                                <svg width="16" height="16">
                                                                    <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
                                                                    l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />
                                                                </svg>
                                                            </a>

                                                        </div>
                                                        <div class="product-card__image">
                                                            <div class="image image--type--product">
                                                                <a href="{{route('product-detail',$data->slug)}}" class="image__body">
                                                                    @php
												                        $photo=explode(',',$data->photo);
											                        @endphp
                                                                    <img class="image__tag" src="{{$photo[0]}}" alt="{{$photo[0]}}" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                                <div class="status-badge__body">
                                                                    <div class="status-badge__icon"><svg width="13" height="13">
                                                                            <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />
                                                                        </svg>
                                                                    </div>
                                                                    <div class="status-badge__text"></div>
                                                                    <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__info">
                                                            <div class="product-card__meta"><span class="product-card__meta-title"></div>
                                                            <div class="product-card__name">
                                                                <div>
                                                                    <div class="product-card__badges">
                                                                        <div class="tag-badge tag-badge--sale">{{$data->discount}} % Off</div>
                                                                    </div>
                                                                    <a href="{{route('product-detail',$data->slug)}}"> {{$data->title}} </a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="product-card__footer">
                                                            <div class="product-card__prices">
                                                                @php
                                                                    $after_discount=($data->price-(($data->discount*$data->price)/100));
                                                                @endphp

                                                                <div class="product-card__price product-card__price--current">£{{number_format($after_discount,2)}} </div>
                                                                <div class="product-card__price product-card__price--old">£{{number_format($data->price,2)}} </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endsection
