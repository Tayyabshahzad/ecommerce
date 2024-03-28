@extends('frontend.layouts.master')
@section('title','Cart Page')
@section('content')


<div class="site__body">
    <div class="block-header block-header--has-breadcrumb block-header--has-title">
        <div class="container">
            <div class="block-header__body">
                <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb__list">
                        <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                        <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
                            <a href="index.html" class="breadcrumb__item-link">Home</a>
                        </li>
                        <li class="breadcrumb__item breadcrumb__item--parent">
                            <a href="" class="breadcrumb__item-link">Products</a>
                        </li>
                        <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                            <span class="breadcrumb__item-link">Cart</span>
                        </li>
                        <li class="breadcrumb__title-safe-area" role="presentation"></li>
                    </ol>
                </nav>
                <h1 class="block-header__title">Shopping Cart</h1>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="container">
            <div class="cart">
                <div class="cart__table cart-table">
                    <table class="cart-table__table">
                        <thead class="cart-table__head">
                            <tr class="cart-table__row">
                                <th class="cart-table__column cart-table__column--image">Image</th>
                                <th class="cart-table__column cart-table__column--product">Product</th>
                                <th class="cart-table__column cart-table__column--price">Price</th>
                                <th class="cart-table__column cart-table__column--quantity">Quantity</th>
                                <th class="cart-table__column cart-table__column--total">Total</th>
                                <th class="cart-table__column cart-table__column--remove"></th>
                            </tr>
                        </thead>
                        <form action="{{route('cart.update')}}" method="POST">
                            @csrf
								@if(Helper::getAllProductFromCart())
                                    @foreach(Helper::getAllProductFromCart() as $key=>$cart)
                                            @php
											$photo=explode(',',$cart->product['photo']);
											@endphp
                                        <tbody class="cart-table__body">
                                            <tr class="cart-table__row">
                                                <td class="cart-table__column cart-table__column--image">
                                                    <div class="image image--type--product">
                                                        <a href="product-full.html" class="image__body">
                                                            <img class="image__tag" src="{{$photo[0]}}" alt="">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="cart-table__column cart-table__column--product">
                                                    <a href="{{route('product-detail',$cart->product['slug'])}}" class="cart-table__product-name">{{$cart->product['title']}}</a>
                                                    <p class="cart-table__options">
                                                        {!!($cart['summary']) !!}
                                                    </p>
                                                </td>
                                                <td class="cart-table__column cart-table__column--price" data-title="Price">£{{number_format($cart['price'],2)}}</td>
                                                <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                                    <div class="cart-table__quantity input-number">
                                                        <input class="form-control input-number__input" name="quant[{{$key}}]" type="number" min="1" value="{{$cart->quantity}}">
                                                        <input type="hidden" name="qty_id[]" value="{{$cart->id}}">
                                                        <div class="input-number__add"></div>
                                                        <div class="input-number__sub"></div>
                                                    </div>
                                                </td>
                                                <td class="cart-table__column cart-table__column--total" data-title="Total">£{{ number_format ($cart['price'] * $cart->quantity,2) }}</td>
                                                <td class="cart-table__column cart-table__column--remove">
                                                    <a  href="{{route('cart-delete',$cart->id)}}" class="cart-table__remove btn btn-sm btn-icon btn-muted">
                                                        <svg width="12" height="12">
                                                            <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
                                                                c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
                                                            C11.2,9.8,11.2,10.4,10.8,10.8z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    @endforeach
                                @else


                                @endif
                                <tfoot class="cart-table__foot">
                                    <tr>
                                        <td colspan="6">

                                                <div class="cart-table__actions">

                                                    <div class="cart-table__update-button">
                                                        <button class="btn btn-sm btn-primary" >Update Cart</button>
                                                    </div>
                                                </div>

                                        </td>
                                    </tr>
                                </tfoot>
                        </form>
                    </table>
                </div>


                <div class="cart__totals">
                    <div class="card">
                        <div class="card-body card-body--padding--2">
                            <h3 class="card-title">Cart Total</h3>
                            <table class="cart__totals-table">
                                <thead>
                                    <tr>
                                        <th>Subtotal:</th>
                                        <td>£{{number_format(Helper::totalCartPrice(),2)}}</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(session()->has('coupon'))
                                        <tr>
                                            <th>You Saved:</th>
                                            <td>£{{number_format(Session::get('coupon')['value'],2)}} </td>
                                        </tr>
                                    @endif

                                    @php
											$total_amount=Helper::totalCartPrice();
											if(session()->has('coupon')){
												$total_amount=$total_amount-Session::get('coupon')['value'];
											}
									@endphp
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total:</th>
                                        <td>£{{number_format($total_amount,2)}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <form action="{{route('coupon-store')}}" method="POST">@csrf
                            <div class="cart-table__actions">
                                <div class="cart-table__coupon-form form-row">
                                    <div class="form-group mb-0 col flex-grow-1">
                                        <input type="text" name="code" class="form-control form-control-sm"  required  placeholder="Coupon Code">
                                    </div>
                                    <div class="form-group mb-0 col-auto">
                                        <button  class="btn btn-sm btn-primary">Apply Coupon</button>
                                    </div>
                                </div>
                            </div>
                            </form>


                            <div class="block-space block-space--layout--before-footer"></div>
                            <a class="btn btn-primary btn-xl btn-block" href="{{route('checkout')}}">
                                Proceed to checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>



@endsection
@push('styles')
	<style>
		li.shipping{
			display: inline-flex;
			width: 100%;
			font-size: 14px;
		}
		li.shipping .input-group-icon {
			width: 100%;
			margin-left: 10px;
		}
		.input-group-icon .icon {
			position: absolute;
			left: 20px;
			top: 0;
			line-height: 40px;
			z-index: 3;
		}
		.form-select {
			height: 30px;
			width: 100%;
		}
		.form-select .nice-select {
			border: none;
			border-radius: 0px;
			height: 40px;
			background: #f6f6f6 !important;
			padding-left: 45px;
			padding-right: 40px;
			width: 100%;
		}
		.list li{
			margin-bottom:0 !important;
		}
		.list li:hover{
			background:#F7941D !important;
			color:white !important;
		}
		.form-select .nice-select::after {
			top: 14px;
		}
	</style>
@endpush
@push('scripts')
	<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
	<script>
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
	</script>
	<script>
		$(document).ready(function(){
			$('.shipping select[name=shipping]').change(function(){
				let cost = parseFloat( $(this).find('option:selected').data('price') ) || 0;
				let subtotal = parseFloat( $('.order_subtotal').data('price') );
				let coupon = parseFloat( $('.coupon_price').data('price') ) || 0;
				// alert(coupon);
				$('#order_total_price span').text('$'+(subtotal + cost-coupon).toFixed(2));
			});

		});

	</script>

@endpush
