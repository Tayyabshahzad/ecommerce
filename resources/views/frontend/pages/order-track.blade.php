@extends('frontend.layouts.master')

@section('title','E-SHOP || Order Track Page')

@section('content')
    <!-- Breadcrumbs -->




<div class="site__body">

    <div class="block-header block-header--has-breadcrumb">
        <div class="container">
            <div class="block-header__body">
                <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb__list">
                        <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                        <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
                            <a href="{{ route('home') }}" class="breadcrumb__item-link">Home</a>
                        </li>

                        <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                            <span class="breadcrumb__item-link">Track Order</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="block-space block-space--layout--after-header"></div>
    <div class="block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card ml-md-3 mr-md-3">
                        <div class="card-body card-body--padding--2">
                            <h1 class="card-title card-title--lg">Track Order</h1>

                            @if(session('success'))
                                <div class="alert alert-success mb-3">{{session('success')}}</div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger mb-3">{{session('error')}}</div>

                            @endif
                            <p class="mb-4">
                                To track your order please enter your Order ID in the box below and press the "Track" button. This was given
                to you on your receipt and in the confirmation email you should have received
                            </p>
                            <form  action="{{route('product.track.order')}}" method="post">@csrf
                                <div class="form-group">
                                    <label for="track-order-id">Order ID</label>
                                    <input id="track-order-id" type="text" class="form-control" placeholder="Order Number" name="order_number" required>
                                </div>
                                <div class="form-group">
                                    <label for="track-email">Email address</label>
                                    <input id="track-email" type="email" class="form-control" placeholder="Email address">
                                </div>
                                <div class="form-group pt-4 mb-1">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Track</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>


@endsection
