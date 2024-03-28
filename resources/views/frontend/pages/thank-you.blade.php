@extends('frontend.layouts.master')
@section('title','Thank You')
@section('content')

<div class="site__body">
<div class="block-space block-space--layout--spaceship-ledge-height"></div>
<div class="block order-success">
    <div class="container">
        <div class="order-success__body">
            <div class="order-success__header">
                <div class="order-success__icon">
                    <svg width="100" height="100">
                        <path d="M50,100C22.4,100,0,77.6,0,50S22.4,0,50,0s50,22.4,50,50S77.6,100,50,100z M50,2C23.5,2,2,23.5,2,50
s21.5,48,48,48s48-21.5,48-48S76.5,2,50,2z M44.2,71L22.3,49.1l1.4-1.4l21.2,21.2l34.4-34.4l1.4,1.4L45.6,71
C45.2,71.4,44.6,71.4,44.2,71z" />
                    </svg>
                </div>


                <h1 class="order-success__title">Thank you</h1>
                <div class="order-success__subtitle">Your order has been received</div>
                <div class="order-success__actions">
                    <a href="{{ route('home') }}" class="btn btn-sm btn-secondary">Go To Homepage</a>
                </div>
            </div>
            @if(session()->has('orderDetail'))
            @php
                $order = session('orderDetail');
            @endphp
            <div class="card order-success__meta">
                <ul class="order-success__meta-list">
                    <li class="order-success__meta-item">
                        <span class="order-success__meta-title">Order number:</span>
                        <span class="order-success__meta-value">#{{ $order->order_number }}</span>
                    </li>
                    <li class="order-success__meta-item">
                        <span class="order-success__meta-title">Created At:</span>
                        <span class="order-success__meta-value">{{ $order->created_at }}</span>
                    </li>
                    <li class="order-success__meta-item">
                        <span class="order-success__meta-title">Total:</span>
                        <span class="order-success__meta-value">£{{ $order->total_amount }}</span>
                    </li>
                    <li class="order-success__meta-item">
                        <span class="order-success__meta-title">Payment Method:</span>
                        <span class="order-success__meta-value">{{ ucfirst($order->payment_method) }}</span>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="order-list">
                    <table>
                        <thead class="order-list__header">
                            <tr>
                                <th class="order-list__column-label" colspan="2">Product</th>
                                <th class="order-list__column-quantity">Quantity</th>
                                <th class="order-list__column-total">Total</th>
                            </tr>
                        </thead>
                        <tbody class="order-list__products">
                            @foreach ($order->items as $item )
                            <tr>
                                <td class="order-list__column-image">
                                    <div class="image image--type--product">
                                        <a href="{{route('product-detail',$item->product->slug)}}" class="image__body">
                                            @php
                                                $photo=explode(',',$item->product->photo);
                                            @endphp

                                            <img class="image__tag" src="{{$photo[0]}}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td class="order-list__column-product">
                                    <a href="{{route('product-detail',$item->product->slug)}}"> {{  $item->product->title }} </a>

                                </td>
                                <td class="order-list__column-quantity" data-title="Quantity:">
                                    {{  $item->quantity }}
                                </td>
                                <td class="order-list__column-total">
                                    £{{  $item->price }}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        <tbody class="order-list__subtotals">
                            <tr>
                                <th class="order-list__column-label" colspan="3">Subtotal</th>
                                <td class="order-list__column-total">£{{  $order->sub_total  }}</td>
                            </tr>
                            <tr>
                                <th class="order-list__column-label" colspan="3">Shipping</th>
                                <td class="order-list__column-total">£{{  $order->shipping->price  }}</td>
                            </tr>
                            <tr>
                                <th class="order-list__column-label" colspan="3">Tax</th>
                                <td class="order-list__column-total">£0.00</td>
                            </tr>
                        </tbody>
                        <tfoot class="order-list__footer">
                            <tr>
                                <th class="order-list__column-label" colspan="3">Total</th>
                                <td class="order-list__column-total">£{{  $order->total_amount  }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="order-success__addresses">
                <div class="order-success__address card address-card">
                    <div class="address-card__badge tag-badge tag-badge--theme">
                        Shipping Address
                    </div>
                    <div class="address-card__body">
                        <div class="address-card__name">  {{ $order->first_name }} </div>
                        <div class="address-card__row">
                            {{ $order->address1 }}
                        </div>
                        <div class="address-card__row">
                            <div class="address-card__row-title">Phone Number</div>
                            <div class="address-card__row-content">  {{ $order->phone }}</div>
                        </div>
                        <div class="address-card__row">
                            <div class="address-card__row-title">Email Address</div>
                            <div class="address-card__row-content">   {{ $order->email }} </div>
                        </div>
                    </div>
                </div>

            </div>
            @endif
        </div>
    </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>
</div
@endsection
