@extends('layouts.app')

@section('title', 'Company Why')

@section('body_class', 'company why inversed')

@section('content')

<main>
    @include('partials.company-nav')
    <section id="company-intro" class="has-ver-padding">
        <div class="section--inner">
            <div class="intro-text">
                <div class="container">
                    <h1 class="f-reg">
                        {!! getAbout('why-intro', 'why_intro') !!}
                    </h1>
                </div>
            </div>

            <div class="intro-image image-offset">
                <figure class="no-margin">
                    <img class="w-fit" src="{{ getAbout('why-hero', 'why_hero_img') }}">
                </figure>
            </div>
        </div>
    </section>

    <section id="company-content">
        <div class="content-block has-ver-padding">
            <div class="container">
                <div class="content-body">
                    <div class="content-body--inner">
                        <h4 class="content-header f-reg">{{ getAbout('why-content', 'why_title1') }}</h4>
                        {!! getAbout('why-content', 'why_desc1') !!}                
                    </div>            
                </div>
            </div>
        </div>

        <div class="content-block has-ver-padding">
            <div class="container">
                <div class="content-body">
                    <div class="content-body--inner">
                        <h4 class="content-header f-reg">{{ getAbout('why-content', 'why_title2') }}</h4>                        
                        
                        <div class="infographic">
                            <div class="row flexed-desktop">
                                <div class="col-md-5">
                                    <figure class="text-center">
                                        <img class="img-fluid" src="{{ getAbout('why-content', 'why_img2') }}">
                                    </figure>
                                </div>
                                <div class="col-md-7">
                                    {!! getAbout('why-content', 'why_desc2') !!}
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
            </div>
        </div>

        <div class="content-block has-ver-padding">
            <div class="container">
                <div class="content-body">
                    <div class="content-body--inner">
                        <h4 class="content-header f-reg">{{ getAbout('why-content', 'why_title3') }}</h4>
                        
                        <div class="infographic">
                            <div class="row flexed-desktop">
                                <div class="col-md-5">
                                    <figure class="text-center">
                                        <img class="img-fluid" src="{{ getAbout('why-content', 'why_img3') }}">
                                    </figure>
                                </div>
                                <div class="col-md-7">
                                    {!! getAbout('why-content', 'why_desc3') !!}
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
            </div>
        </div>

        <div class="content-block has-ver-padding">
            <div class="container">
                <div class="content-body">
                    <div class="content-body--inner">
                        <h4 class="content-header f-reg">{{ getAbout('why-content', 'why_title4') }}</h4>

                        
                        <div class="infographic">
                            <div class="row flexed-desktop">
                                <div class="col-md-5">
                                    <figure class="text-center">
                                        <img class="img-fluid" src="{{ getAbout('why-content', 'why_img4') }}">
                                    </figure>
                                </div>
                                <div class="col-md-7">
                                    {!! getAbout('why-content', 'why_desc4') !!} 
                                </div>
                            </div>
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
                    <a href="#" class="d-block">
                        <figure class="no-margin">
                            <img src="uploads/what-hero.jpg">
                            <span class="overlay black"></span>
                        </figure>

                        <div class="nav-text">
                            <p class="nav-index">02</p>
                            <p class="nav-title">Who</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 next">
                    <a href="#" class="d-block">
                        <figure class="no-margin">
                            <img src="uploads/what-hero.jpg">
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
        rdm.company();
    });

    $(window).load(function(){
        
    });

    $(window).resize(function(){
        rdm.company();
    });
</script>
    
@endpush

