@extends('frontend.layouts.master')

@section('title','E-SHOP || About Us')

@section('content')
    @php
        $settings=DB::table('settings')->get();
    @endphp
<div class="site__body">
    <div class="about">
        <div class="about__body">
            <div class="about__image">
                <div class="about__image-bg" style="background-image: url('@foreach($settings as $data) {{$data->photo}} @endforeach');"></div>
                <div class="decor about__image-decor decor--type--bottom">
                    <div class="decor__body">
                        <div class="decor__start"></div>
                        <div class="decor__end"></div>
                        <div class="decor__center"></div>
                    </div>
                </div>
            </div>
            <div class="about__card">
                <div class="about__card-title">About Us</div>
                <div class="about__card-text">
                    @foreach($settings as $data) {{$data->description}} @endforeach
                </div>

                <div class="about__card-signature">
                    <img src="@foreach($settings as $data) {{$data->logo}} @endforeach" width="160" height="55" alt="">
                </div>
            </div>
            <div class="about__indicators">
                <div class="about__indicators-body">

                    <div class="about__indicators-item">
                        <div class="about__indicators-item-value">  {{ number_format($productsCount) }}   </div>
                        <div class="about__indicators-item-title">Original Products</div>
                    </div>
                    <div class="about__indicators-item">
                        <div class="about__indicators-item-value">  {{ number_format($usersCount) }}  </div>
                        <div class="about__indicators-item-title">Satisfied customers</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--divider-xl"></div>
    <div class="block block-teammates">
        <div class="container container--max--xl">
            <div class="block-teammates__title">Professional Team</div>
            <div class="block-teammates__subtitle">Meet this is our professional team.</div>
            <div class="block-teammates__list">
                <div class="owl-carousel">
                    @foreach ($teams as  $team)
                        <div class="block-teammates__item teammate">
                            <div class="teammate__avatar">
                                <img src="{{ $team->photo }}" alt="">
                            </div>
                            <div class="teammate__info">
                                <div class="teammate__name">{{ $team->name }}</div>
                                <div class="teammate__position">{{ $team->role }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--divider-xl"></div>

    <div class="block-space block-space--layout--before-footer"></div>
</div>


@endsection
