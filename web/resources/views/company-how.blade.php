@extends('layouts.app')

@section('title', 'Company How')

@section('body_class', 'company how inversed')

@section('content')

<main>
    @include('partials.company-nav')
    <section id="company-intro" class="has-ver-padding">
    	<div class="section--inner">
    		<div class="intro-text">
    			<div class="container">
    				<h1 class="f-reg">
                        {!! getAbout('how-intro', 'how_intro') !!}
	    			</h1>
    			</div>
    		</div>

    		<div class="intro-image image-offset">
    			<figure class="no-margin">
    				<img class="w-fit" src="{{ getAbout('how-hero', 'how_hero_img') }}">
    			</figure>
    		</div>
    	</div>
    </section>

    <section id="company-content">
    	<div class="content-block has-ver-padding">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-6 content-head">
    					<h4 class="content-header f-reg">{{ getAbout('how-content', 'how_title1') }}</h4>
    				</div>

    				<div class="col-md-6 content-body">
                        <div class="content-body--inner">
                            {!! getAbout('how-content', 'how_desc1') !!}

                            @if (getAbout('how-content', 'how_youtube1'))
                            <div class="video">
                                <div id="yt-player" class="vid-container embed-responsive embed-responsive-16by9">
                                    <div id="player"></div>
                                </div>

                                <div id="thumb-container" class="thumb-container">
                                    @php
                                        $youtube_id = getYoutubeId(getAbout('how-content', 'how_youtube1'));
                                    @endphp
                                    <img src="http://img.youtube.com/vi/{{ $youtube_id }}/maxresdefault.jpg">
                                    <a id="start-video" class="start-video" data-fancybox="video" href="https://youtu.be/{{ $youtube_id }}">
                                        <i class="icon-play"></i>
                                    </a>
                                </div>
                            </div>

                            {!! getAbout('how-content', 'how_youtube1_desc') !!}
                            @endif
                        </div>            
                    </div>
    			</div>
    		</div>
    	</div>

        <div class="content-block has-ver-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 content-head">
                        <h4 class="content-header f-reg">{{ getAbout('how-content', 'how_title2') }}</h4>
                    </div>

                    <div class="col-md-6 content-body">
                        <div class="content-body--inner">
                            {!! getAbout('how-content', 'how_desc2') !!}
                        </div>            
                    </div>
                </div>
            </div>
        </div>

        <div class="content-block has-ver-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 content-head">
                        <h4 class="content-header f-reg">{{ getAbout('how-content', 'how_title3') }}</h4>
                    </div>

                    <div class="col-md-6 content-body">
                        <div class="content-body--inner">
                            {!! getAbout('how-content', 'how_desc3') !!}
                        </div>            
                    </div>
                </div>
            </div>
        </div>

        <div class="content-block has-ver-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 content-head">
                        <h4 class="content-header f-reg">{{ getAbout('how-content', 'how_title4') }}</h4>
                    </div>

                    <div class="col-md-6 content-body">
                        <div class="content-body--inner">
                            {!! getAbout('how-content', 'how_desc4') !!}
                        </div>            
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
                <div class="col-md-6 prev">
                    <a href="{{ url('about') }}" class="d-block">
                        <figure class="no-margin">
                            <img src="{{ getAbout('who-image', 'who_single_img') }}">
                            <span class="overlay black"></span>
                        </figure>

                        <div class="nav-text">
                            <p class="nav-index">02</p>
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

