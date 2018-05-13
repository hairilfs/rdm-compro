@extends('layouts.app')

@section('title', 'Company What')

@section('body_class', 'company what inversed')

@section('content')

<main>
    @include('partials.company-nav')
    <section id="company-intro" class="has-ver-padding">
        <div class="section--inner">
            <div class="intro-text">
                <div class="container">
                    <h1 class="f-reg">
                        {!! getAbout('what-intro', 'what_intro') !!}
                    </h1>
                </div>
            </div>

            <div class="intro-image image-offset">
                <figure class="no-margin">
                    <img class="w-fit" src="{{ getAbout('what-hero', 'what_hero_img') }}">
                </figure>
            </div>
        </div>
    </section>

    <section id="company-content">
        @php
            $title1 = getAbout('what-content', 'what_title1');
            $desc1 = getAbout('what-content', 'what_desc1');
        @endphp
        @if ($title1 && $desc1)            
        <div class="content-block has-ver-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 content-head">
                        <h4 class="content-header f-reg">{{ $title1 }}</h4>
                    </div>

                    <div class="col-md-6 content-body">
                        <div class="content-body--inner">
                            {!! $desc1 !!}
                        </div>            
                    </div>
                </div>
            </div>
        </div>
        @endif

        @php
            $title2 = getAbout('what-content', 'what_title2');
            $desc2 = getAbout('what-content', 'what_desc2');
        @endphp
        @if ($title2 && $desc2)
        <div class="content-block has-ver-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 content-head">
                        <h4 class="content-header f-reg">{{ $title2 }}</h4>
                    </div>

                    <div class="col-md-6 content-body">
                        <div class="content-body--inner">
                            {!! $desc2 !!}
                        </div>            
                    </div>
                </div>
            </div>
        </div>
        @endif

        @php
            $title3 = getAbout('what-content', 'what_title3');
            $desc3 = getAbout('what-content', 'what_desc3');
        @endphp
        @if ($title3 && $desc3)
        <div class="content-block has-ver-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 content-head">
                        <h4 class="content-header f-reg">{{ $title3 }}</h4>
                    </div>

                    <div class="col-md-6 content-body">
                        <div class="content-body--inner">
                            {!! $desc3 !!}

                            <figure>
                                <img class="w-fit" src="{{ getAbout('what-content', 'what_img3') }}">
                            </figure>
                        </div>            
                    </div>
                </div>
            </div>
        </div>
        @endif

        @php
            $title4 = getAbout('what-content', 'what_title4');
            $desc4 = getAbout('what-content', 'what_desc4');
        @endphp
        @if ($title4 && $desc4)
        <div class="content-block has-ver-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 content-head">
                        <h4 class="content-header f-reg">{{ $title4 }}</h4>
                    </div>

                    <div class="col-md-6 content-body">
                        <div class="content-body--inner">
                            {!! $desc4 !!}
                        </div>            
                    </div>
                </div>
            </div>
        </div>
        @endif

        @php
            $title5 = getAbout('what-content', 'what_title5');
            $desc5 = getAbout('what-content', 'what_desc5');
        @endphp
        @if ($title5 && $desc5)
        <div class="content-block has-ver-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 content-head">
                        <h4 class="content-header f-reg">{{ $title5 }}</h4>
                    </div>

                    <div class="col-md-6 content-body">
                        <div class="content-body--inner">
                            {!! $desc5 !!}
                        </div>            
                    </div>
                </div>
            </div>
        </div>
        @endif
    </section>

    <section id="company-talk" class="has-ver-padding">
        <div class="section--inner text-center has-ver-padding">
            <div class="container has-ver-padding">
                <div class="talk-holder has-ver-padding">
                    <h3 class="f-reg">Ready to have a chat?</h3>
                    <a href="#" class="link btn-trigger-talk link-opaque small f-med ls-med"><i class="icon-right-open-big"></i>REACH OUT TO US</a>
                </div>
            </div>
        </div>
    </section>

    <section id="company-nav">
        <div class="section--inner">
            <div class="row row-no-margin">
                <div class="col-md-6 prev">
                    <a href="{{ url('about') }}" class="d-block">
                        <figure class="no-margin">
                            <img src="{{ getAbout('who-hero', 'who_hero_img') }}">
                            <span class="overlay black"></span>
                        </figure>

                        <div class="nav-text">
                            <p class="nav-index">01</p>
                            <p class="nav-title">Who</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 next">
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
        
    });

    $(window).load(function(){
        
    });

    $(window).resize(function(){
        
    });
</script>
    
@endpush

