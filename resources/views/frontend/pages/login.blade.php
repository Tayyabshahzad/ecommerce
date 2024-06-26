@extends('frontend.layouts.master')

@section('title','E-Shop || Login Page')

@section('content')


<div class="site__body">
    <div class="block-space block-space--layout--after-header"></div>
    <div class="block">
        <div class="container container--max--lg">
            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="card flex-grow-1 mb-md-0 mr-0 mr-lg-3 ml-0 ml-lg-4">
                        <div class="card-body card-body--padding--2">
                            <h3 class="card-title">Login</h3>
                            <form class="form" method="post" action="{{route('login.submit')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="signin-email">Email address</label>
                                    <input id="signin-email" name="email" type="email" class="form-control" required placeholder="customer@example.com">
                                    @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="signin-password">Password</label>
                                    <input id="signin-password" type="password" class="form-control" required name="password" placeholder="Secret word">
                                    <small class="form-text text-muted">
                                        <a href="">Forgot password?</a>
                                    </small>
                                    @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <span class="input-check form-check-input">
                                            <span class="input-check__body">
                                                <input class="input-check__input" type="checkbox" id="signin-remember">
                                                <span class="input-check__box"></span>
                                                <span class="input-check__icon"><svg width="9px" height="7px">
                                                        <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"></path>
                                                    </svg>
                                                </span>
                                            </span>
                                        </span>
                                        <label class="form-check-label" for="signin-remember">Remember Me</label>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary mt-3">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex mt-4 mt-md-0">
                    <div class="card flex-grow-1 mb-0 ml-0 ml-lg-3 mr-0 mr-lg-4">
                        <div class="card-body card-body--padding--2">
                            <h3 class="card-title">Register</h3>
                            <form class="form" method="post" action="{{route('register.submit')}}">@csrf
                                <div class="form-group">
                                    <label for="signup-email">Name</label>
                                    <input id="signup-email" type="text"  name="name" required class="form-control" placeholder="Name">
                                    @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="signup-email">Email address</label>
                                    <input id="signup-email" type="email"  name="email" required class="form-control" placeholder="customer@example.com">
                                    @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="signup-password">Password</label>
                                    <input id="signup-password" name="password" type="password" required class="form-control" placeholder="Secret word">
                                    @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="signup-confirm">Repeat password</label>
                                    <input id="signup-confirm" name="password_confirmation" required  type="password" class="form-control" placeholder="Secret word">
                                    @error('password_confirmation')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary mt-3">Register</button>
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
    <!-- Breadcrumbs -->

@endsection
