@extends('frontend.layouts.master')

@section('content')
@php
    $settings=DB::table('settings')->get();
    @endphp

<div class="site__body">
    <div class="block-map block">
        <div class="block-map__body">
            <iframe src='https://maps.google.com/maps?q=Holbrook-Palmer%20Park&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe>
        </div>
    </div>
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
                <h1 class="block-header__title">Contact Us</h1>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="container container--max--lg">
            <div class="card">
                <div class="card-body card-body--padding--2">
                    <div class="row">
                        <div class="col-12 col-lg-6 pb-4 pb-lg-0">
                            <div class="mr-1">
                                <h4 class="contact-us__header card-title">Our Address</h4>
                                <div class="contact-us__address">
                                    <p>
                                        @foreach($settings as $data) {{$data->address}} @endforeach<br>
                                        Email: @foreach($settings as $data) {{$data->email}} @endforeach<br>
                                        Phone Number: @foreach($settings as $data) {{$data->phone}} @endforeach
                                    </p>
                                    <p>
                                        <strong>Opening Hours</strong><br>
                                        Mon-Sat 10:00pm - 7:00pm
                                    </p>
                                    <p>
                                        <strong>-</strong><br>
                                        @foreach($settings as $data) {{$data->short_des}} @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="ml-1">
                                <h4 class="contact-us__header card-title">Get in Touch</h4>
                                <form class="form-contact form contact_form" method="post" action="{{route('contact.store')}}" id="contactForm" novalidate="novalidate">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="form-name">Your Name</label>
                                            <input name="name" required type="text" id="form-name" class="form-control" placeholder="Your Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="form-email">Email</label>
                                            <input name="email" required type="email" id="form-email" class="form-control" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="form-subject">Subject</label>
                                        <input name="subject" required type="text" id="form-subject" class="form-control" placeholder="Subject">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-subject">Phone</label>
                                        <input name="phone"  required type="number" id="form-subject" class="form-control" placeholder="Phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-message">Message</label>
                                        <textarea id="form-message" name="message" class="form-control" rows="4"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </form>
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
    <script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/js/contact.js') }}"></script>
@endsection
