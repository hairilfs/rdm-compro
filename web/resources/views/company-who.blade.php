@extends('layouts.app')

@section('title', 'Company Who')

@section('body_class', 'company who inversed')

@section('content')

<main>
    @include('partials.company-nav')
    <section id="company-intro" class="has-ver-padding">
        <div class="section--inner">
            <div class="intro-text">
                <div class="container">
                    <p class="small ls-med f-med">INTRODUCTION</p>
                    {!! getAbout('who-intro', 'introduction') !!}
                </div>
            </div>

            @if (getAbout('who-intro', 'youtube_url'))
            <div class="intro-image has-video">
                <div class="container">
                    <div class="video">
                        <div id="yt-player" class="vid-container embed-responsive embed-responsive-16by9">
                            <div id="player"></div>
                        </div>

                        <div id="thumb-container" class="thumb-container">
                            <img src="http://img.youtube.com/vi/{{ getYoutubeId(getAbout('who-intro', 'youtube_url')) }}/maxresdefault.jpg">
                            <a id="start-video" class="start-video" data-fancybox="video" href="https://youtu.be/{{ getYoutubeId(getAbout('who-intro', 'youtube_url')) }}">
                                <i class="icon-play"></i>
                            </a>
                        </div>
                    </div>         
                </div>
            </div>
            @endif
        </div>
    </section>

    <section id="company-scopes" class="has-ver-padding">
        <div class="section--inner">
            <div class="container">
                <h3 class="f-reg">
                    What we can do for you
                    <span class="opaque d-block">What we actually do</span>
                </h3>

                <div class="row">

                    @foreach ($scope as $element)
                    <div class="col-md-4 scopes-item">
                        <figure>
                            <a href="#" class="d-block">
                                <img class="w-fit" src="{{ $element->getImgUrl() }}">
                            </a>
                        </figure>
                        <figcaption>
                            <h5>{{ $element->title }}</h5>
                            <p>{{ $element->description }}</p>
                            <a href="{{ $element->link_url }}" class="link ls-med f-med"><i class="icon-right-open-big"></i>{{ $element->link_text }}</a>
                        </figcaption>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>

    <section id="testimony-slider" class="has-ver-padding">
        <div class="section--inner">
            <div class="container">
                <h3 class="f-reg">Our CEO says</h3>

                <div class="slider-holder">
                    <div id="sliderTesti" class="owl-carousel slider">

                        @foreach ($testimony as $element)
                        <div class="item">
                            <div class="profile-thumb">
                                <figure class="no-margin">
                                    <img class="w-fit" src="{{ $element->getImgUrl() }}" alt="">
                                    <span class="overlay med"></span>
                                </figure>
                                <figcaption>
                                    <h5 class="f-reg lh-med content-line_slide">“{{ $element->testimony }}”</h5>
                                </figcaption>
                            </div>
                            <div class="profile-info">
                                <p class="profile-name f-bold no-margin">{{ $element->name }}</p>
                                <p class="profile-position no-margin">{{ $element->position }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="company-partners" class="has-ver-padding">
        <div class="section--inner">
            <div class="container">
                <h3 class="f-reg">Partners</h3>

                <div class="clients-body has-ver-padding">
                    <div class="row flexed">

                        @foreach ($partner as $element)
                        <div class="item">
                            <figure class="no-margin text-center">
                                <img src="{{ $element->getImgUrl() }}">
                            </figure>
                        </div>
                        @endforeach
                        
                    </div>

                    <p class="btn-holder text-center">
                        <a href="#" class="btn pad-lg curved ls-med f-med">VIEW ALL PARTNERS</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="company-people" class="has-ver-padding">
        <div class="section--inner">
            <div class="container">
                <h3 class="f-reg">People &amp; Culture</h3>

                <div class="team-holder">
                    <div class="row">

                        @foreach ($people as $element)
                        <div class="col-md-4 profile-item">
                            <figure>
                                <img src="{{ $element->getImgUrl() }}" alt="">
                            </figure>
                            <figcaption>
                                <p class="profile-name f-bold no-margin">{{ $element->name }}</p>
                                <p class="profile-position no-margin">{{ $element->position }}</p>
                            </figcaption>
                        </div>
                        @endforeach
                        
                    </div>
                </div>

                <a href="#" class="job-cta link link-opaque ls-med f-med"><i class="icon-right-open-big"></i>WE ARE HIRING</a>
            </div>
        </div>
    </section>

    <section id="company-mood" class="left-diagonal">
        <div class="section--inner">
            <div class="mood-holder">
                <figure class="no-margin">
                    @php
                        $single_img = getAbout('who-image', 'who_single_img');
                    @endphp
                    <picture class="image-ad">
                        <source media="(max-width: 576px)" srcset="{{ 'thumb_'.$single_img }}">
                        <source media="(min-width: 577px)" srcset="{{ $single_img }}">
                        <img class="w-fit" src="{{ $single_img }}" alt="">
                    </picture>
                </figure>
            </div>
        </div>
    </section>

    <section id="company-location" class="has-ver-padding">
        <div class="section--inner">
            <div class="container">
                <h3 class="f-reg">
                    We’re everywhere
                    <span class="opaque d-block">Step into our office</span>
                </h3>

                <div class="row">
                    <div class="col-md-6 loc-indonesia">
                        <figure>
                            <a href="javascript:void(0)" class="d-block">
                                <img class="w-fit" src="{{ getAbout('who-address', 'who_address_indo_image') }}">
                            </a>
                        </figure>
                        <figcaption>
                            {!! getAbout('who-address', 'who_address_indo') !!}
                        </figcaption>
                    </div>
                    <div class="col-md-6 loc-australia">
                        <figure>
                            <a href="javascript:void(0)" class="d-block">
                                <img class="w-fit" src="{{ getAbout('who-address', 'who_address_aus_image') }}">
                            </a>
                        </figure>
                        <figcaption>
                            {!! getAbout('who-address', 'who_address_aus') !!}
                        </figcaption>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="company-talk" class="has-ver-padding">
        <div class="section--inner text-center has-ver-padding">
            <div class="container has-ver-padding">
                <div class="talk-holder has-ver-padding">
                    <h3 class="f-reg">Ready to have a chat?</h3>
                    <a href="#" class="link btn-trigger-talk link-white link-opaque small f-med ls-med"><i class="icon-right-open-big"></i>REACH OUT TO US</a>
                </div>
            </div>
        </div>
    </section>

    <section id="company-nav">
        <div class="section--inner">
            <div class="row row-no-margin">
                <div class="col-md-6">
                    <a href="{{ url('about') }}" class="d-block">
                        <figure class="no-margin">
                            <img src="{{ $single_img }}">
                            <span class="overlay black"></span>
                        </figure>

                        <div class="nav-text">
                            <p class="nav-index">01</p>
                            <p class="nav-title">Who</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ url('about/what') }}" class="d-block">
                        <figure class="no-margin">
                            <img src="{{ getAbout('what-hero', 'what_hero_img') }}">
                            <span class="overlay black"></span>
                        </figure>

                        <div class="nav-text">
                            <p class="nav-index">02</p>
                            <p class="nav-title">What</p>
                        </div>
                    </a>
                </div>

                <div class="col-md-6">
                    <a href="{{ url('about/how') }}" class="d-block">
                        <figure class="no-margin">
                            <img src="{{ getAbout('how-hero', 'how_hero_img') }}">
                            <span class="overlay black"></span>
                        </figure>

                        <div class="nav-text">
                            <p class="nav-index">03</p>
                            <p class="nav-title">How</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ url('about/why') }}" class="d-block">
                        <figure class="no-margin">
                            <img src="{{ getAbout('why-hero', 'why_hero_img') }}">
                            <span class="overlay black"></span>
                        </figure>

                        <div class="nav-text">
                            <p class="nav-index">04</p>
                            <p class="nav-title">Why</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

@include('partials.bottom-section')

@include('partials.footer')

@endsection

@push('scripts')

<script>
    $(document).ready(function(){
        rdm.company();
    });

    $(window).load(function(){
        
    });

    $(window).resize(function(){
        rdm.company();
    });
</script>
    
@endpush

