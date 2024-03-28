@extends('frontend.layouts.master')

@section('title','Checkout page')

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
                            <a href="" class="breadcrumb__item-link">Breadcrumb</a>
                        </li>
                        <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                            <span class="breadcrumb__item-link">Current Page</span>
                        </li>
                        <li class="breadcrumb__title-safe-area" role="presentation"></li>
                    </ol>
                </nav>
                <h1 class="block-header__title">Checkout</h1>
            </div>
        </div>
    </div>
    <div class="checkout block">
        <form class="form" method="POST" action="{{route('cart.order')}}">
            @csrf
        <div class="container container--max--xl">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="alert alert-lg alert-primary">Please register in order to checkout more quickly<a href="{{ route('login.form') }}">Click here to login</a></div>
                </div>
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="card mb-lg-0">
                        <div class="card-body card-body--padding--2">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="checkout-first-name">First Name</label>
                                    <input type="text" class="form-control" id="checkout-first-name" name="first_name"  required placeholder="First Name">
                                    @error('first_name')
                                                <span class='text-danger'>{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="checkout-last-name">Last Name</label>
                                    <input type="text" class="form-control" id="checkout-last-name" name="last_name" required  placeholder="Last Name">
                                    @error('last_name')
                                                <span class='text-danger'>{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="checkout-company-name">Email </label>
                                <input type="email" class="form-control" id="checkout-company-name" name="email" required placeholder="Email Address">
                                @error('email')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="checkout-street-address">Phone Number</label>
                                <input type="number" class="form-control" id="checkout-street-address" name="phone" required placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <label for="checkout-country">Country</label>
                                <select id="checkout-country" name="country" class="form-control form-control-select2">
                                    <option>Select a country...</option>
                                    <option>United States</option>
                                    <option>Russia</option>
                                    <option>Italy</option>
                                    <option>France</option>
                                    <option>Ukraine</option>
                                    <option>Germany</option>
                                    <option>Australia</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="checkout-address">Address Line 1<span class="text-muted"></span></label>
                                <input type="text" class="form-control" id="checkout-address" name="address1" placeholder="Address Line 1" >
                            </div>
                            <div class="form-group">
                                <label for="checkout-city">Address Line 2</label>
                                <input type="text" class="form-control" id="checkout-city" name="address2" placeholder="Address Line 2">
                            </div>
                            <div class="form-group">
                                <label for="checkout-state">Postal Code</label>
                                <input type="text" class="form-control" id="checkout-state" name="post_code" placeholder="Postal Code">
                            </div>


                        </div>
                        <div class="card-divider"></div>

                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
                    <div class="card mb-0">
                        <div class="card-body card-body--padding--2">
                            <h3 class="card-title">Your Order</h3>
                            <table class="checkout__totals">

                                <tbody class="checkout__totals-subtotals">
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>£{{number_format(Helper::totalCartPrice(),2)}}</td>
                                    </tr>
                                    <tr>
                                        <th> Shipping Cost</th>
                                        <td>
                                        @if(count(Helper::shipping())>0 && Helper::cartCount()>0)
                                                <select name="shipping" class="nice-select form-control form-control-select2">
                                                    <option value="">Select your address</option>
                                                    @foreach(Helper::shipping() as $shipping)
                                                    <option value="{{$shipping->id}}" class="shippingOption" data-price="{{$shipping->price}}">{{$shipping->type}}: ${{$shipping->price}}</option>
                                                    @endforeach
                                                </select>
                                        @else
                                                <span>Free</span>
                                        @endif
                                        </td>
                                    </tr>

                                    @if(session('coupon'))
                                        <th>You Save</th>
                                        <th>£{{number_format(session('coupon')['value'],2)}}</th>
                                    @endif


                                </tbody>
                                <tfoot class="checkout__totals-footer">

                                    @php
                                    $total_amount=Helper::totalCartPrice();
                                    if(session('coupon')){
                                        $total_amount=$total_amount-session('coupon')['value'];
                                    }
                                    @endphp

                                    <tr>
                                        <th>Total</th>
                                        <td>£{{number_format($total_amount,2)}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="checkout__payment-methods payment-methods">
                                <ul class="payment-methods__list">
                                    <li class="payment-methods__item">
                                        <label class="payment-methods__item-header">
                                            <span class="payment-methods__item-radio input-radio">
                                                <span class="input-radio__body">
                                                    <input class="input-radio__input" name="payment_method"  value="cod" type="radio">
                                                    <span class="input-radio__circle"></span>
                                                </span>
                                            </span>
                                            <span class="payment-methods__item-title">Cash on delivery</span>
                                        </label>
                                        <div class="payment-methods__item-container">
                                            <div class="payment-methods__item-details text-muted">
                                                Pay with cash upon delivery.
                                            </div>
                                        </div>
                                    </li>
                                    <li class="payment-methods__item">
                                        <label class="payment-methods__item-header">
                                            <span class="payment-methods__item-radio input-radio">
                                                <span class="input-radio__body">
                                                    <input class="input-radio__input" name="payment_method" value="stripe" type="radio">
                                                    <span class="input-radio__circle"></span>
                                                </span>
                                            </span>
                                            <span class="payment-methods__item-title">Stripe</span>
                                        </label>
                                        <div class="payment-methods__item-container">
                                            <div class="payment-methods__item-details text-muted">
                                                Pay via Stripe; you can pay with your credit card.
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="checkout__agree form-group">
                                <div class="form-check">
                                    <span class="input-check form-check-input">
                                        <span class="input-check__body">
                                            <input class="input-check__input" type="checkbox" id="checkout-terms">
                                            <span class="input-check__box"></span>
                                            <span class="input-check__icon"><svg width="9px" height="7px">
                                                    <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                </svg>
                                            </span>
                                        </span>
                                    </span>
                                    <label class="form-check-label" for="checkout-terms">
                                        I have read and agree to the website <a target="_blank" href="terms.html">terms and conditions</a>
                                    </label>
                                </div>
                            </div>

                            <img src="{{('backend/img/payment-method.png')}}" alt="#">
                            <div class="block-space block-space--layout--before-footer"></div>

                            <button type="submit" class="btn btn-primary btn-xl btn-block">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>

@endsection
@push('scripts')
	<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
	<script>
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
	</script>
	<script>
		function showMe(box){
			var checkbox=document.getElementById('shipping').style.display;
			// alert(checkbox);
			var vis= 'none';
			if(checkbox=="none"){
				vis='block';
			}
			if(checkbox=="block"){
				vis="none";
			}
			document.getElementById(box).style.display=vis;
		}
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
