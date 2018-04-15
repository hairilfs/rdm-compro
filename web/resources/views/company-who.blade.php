@extends('layouts.app')

@section('title', 'Company Who')

@section('body_class', 'company who inversed')

@section('content')

<main>
    @include('partials/company-nav.html')
    <section id="company-intro" class="has-ver-padding">
        <div class="section--inner">
            <div class="intro-text">
                <div class="container">
                    <p class="small ls-med f-med">INTRODUCTION</p>
                    <h1 class="f-reg">
                        Our mission is simple
                        <span class="opaque d-block">Create a Unique and Premium Marketing Program to Drive your Sales.</span>
                    </h1>
                    <p>We pride ourselves on being different and with your success being a priority. The passionate team works collaboratively with you to stay ahead in any changing and challenging retail environment. We believe in keeping you informed and openly communicate with your shoppers and suppliers to ensure that each needs and demands are met.</p>
                </div>
            </div>

            <div class="intro-image has-video">
                <div class="container">
                    <div class="video">
                        <div id="yt-player" class="vid-container embed-responsive embed-responsive-16by9">
                            <div id="player"></div>
                        </div>

                        <div id="thumb-container" class="thumb-container">
                            <img src="http://img.youtube.com/vi/Oy9nUaoHoJw/maxresdefault.jpg">
                            <a id="start-video" class="start-video" data-fancybox="video" href="https://youtu.be/Oy9nUaoHoJw">
                                <i class="icon-play"></i>
                            </a>
                        </div>
                    </div>         
                </div>
            </div>
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
                    <div class="col-md-4 scopes-item">
                        <figure>
                            <a href="#" class="d-block">
                                <img class="w-fit" src="uploads/scopes-1.jpg">
                            </a>
                        </figure>
                        <figcaption>
                            <h5>What we do</h5>
                            <p>RDM creates brands, build products, and devise campaigns.</p>
                            <a href="#" class="link ls-med f-med"><i class="icon-right-open-big"></i>MORE ABOUT THE WHAT</a>
                        </figcaption>
                    </div>

                    <div class="col-md-4 scopes-item">
                        <figure>
                            <a href="#" class="d-block">
                                <img class="w-fit" src="uploads/scopes-2.jpg">
                            </a>
                        </figure>
                        <figcaption>
                            <h5>How we do it</h5>
                            <p>RDM creates brands, build products, and devise campaigns.</p>
                            <a href="#" class="link ls-med f-med"><i class="icon-right-open-big"></i>MORE ABOUT THE WHAT</a>
                        </figcaption>
                    </div>

                    <div class="col-md-4 scopes-item">
                        <figure>
                            <a href="#" class="d-block">
                                <img class="w-fit" src="uploads/scopes-3.jpg">
                            </a>
                        </figure>
                        <figcaption>
                            <h5>What we do</h5>
                            <p>RDM creates brands, build products, and devise campaigns.</p>
                            <a href="#" class="link ls-med f-med"><i class="icon-right-open-big"></i>MORE ABOUT THE WHAT</a>
                        </figcaption>
                    </div>
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
                        <div class="item">
                            <div class="profile-thumb">
                                <figure class="no-margin">
                                    <img class="w-fit" src="uploads/ceo-profile.jpg" alt="">
                                    <span class="overlay med"></span>
                                </figure>
                                <figcaption>
                                    <h5 class="f-reg lh-med content-line_slide">“Our strength and success record stems from a combination of international experience and a strong understanding of local practices from our Indonesian roots.”</h5>
                                </figcaption>
                            </div>
                            <div class="profile-info">
                                <p class="profile-name f-bold no-margin">Rene Ishak</p>
                                <p class="profile-position no-margin">CHIEF EXECUTIVE OFFICER, RDM</p>
                            </div>
                        </div>

                        <div class="item">
                            <div class="profile-thumb">
                                <figure class="no-margin">
                                    <img class="w-fit" src="uploads/ceo-profile.jpg" alt="">
                                    <span class="overlay med"></span>
                                </figure>
                                <figcaption>
                                    <h5 class="f-reg lh-med content-line_slide">“Our strength and success record stems from a combination of international experience and a strong understanding of local practices from our Indonesian roots.”</h5>
                                </figcaption>
                            </div>
                            <div class="profile-info">
                                <p class="profile-name f-bold no-margin">Rene Ishak</p>
                                <p class="profile-position no-margin">CHIEF EXECUTIVE OFFICER, RDM</p>
                            </div>
                        </div>
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
                        <div class="item">
                            <figure class="no-margin text-center">
                                <img src="uploads/home-partner-marvel.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin text-center">
                                <img src="uploads/home-partner-marvel.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin text-center">
                                <img src="uploads/home-partner-marvel.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin text-center">
                                <img src="uploads/home-partner-marvel.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin text-center">
                                <img src="uploads/home-partner-marvel.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin text-center">
                                <img src="uploads/home-partner-marvel.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin text-center">
                                <img src="uploads/home-partner-marvel.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin text-center">
                                <img src="uploads/home-partner-marvel.png">
                            </figure>
                        </div>
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
                        <div class="col-md-4 profile-item">
                            <figure>
                                <img src="uploads/ceo-profile.jpg" alt="">
                            </figure>
                            <figcaption>
                                <p class="profile-name f-bold no-margin">Luke Powell</p>
                                <p class="profile-position no-margin">Art Director</p>
                            </figcaption>
                        </div>

                        <div class="col-md-4 profile-item">
                            <figure>
                                <img src="uploads/ceo-profile.jpg" alt="">
                            </figure>
                            <figcaption>
                                <p class="profile-name f-bold no-margin">Luke Powell</p>
                                <p class="profile-position no-margin">Art Director</p>
                            </figcaption>
                        </div>

                        <div class="col-md-4 profile-item">
                            <figure>
                                <img src="uploads/ceo-profile.jpg" alt="">
                            </figure>
                            <figcaption>
                                <p class="profile-name f-bold no-margin">Luke Powell</p>
                                <p class="profile-position no-margin">Art Director</p>
                            </figcaption>
                        </div>
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
                    <picture class="image-ad">
                        <source media="(max-width: 576px)" srcset="uploads/_temp/img-dummy-1-mobile.jpg">
                        <source media="(min-width: 577px)" srcset="uploads/contact-mood.jpg">
                        <img class="w-fit" src="uploads/contact-mood.jpg" alt="">
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
                                <img class="w-fit" src="uploads/location-indo.jpg">
                            </a>
                        </figure>
                        <figcaption>
                            <h5 class="f-reg">Indonesia</h5>
                            <address>
                                Rukan Crown Blok H No.1<br/>
                                Green Lake City<br/>
                                Cipondoh - Tangerang,<br/>
                                Indonesia.
                            </address>
                        </figcaption>
                    </div>
                    <div class="col-md-6 loc-australia">
                        <figure>
                            <a href="javascript:void(0)" class="d-block">
                                <img class="w-fit" src="uploads/location-aus.jpg">
                            </a>
                        </figure>
                        <figcaption>
                            <h5 class="f-reg">Australia</h5>
                            <address>
                                Rukan Crown Blok H No.1<br/>
                                Green Lake City<br/>
                                Cipondoh - Tangerang,<br/>
                                Indonesia.
                            </address>
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
                    <a href="#" class="d-block">
                        <figure class="no-margin">
                            <img src="uploads/what-hero.jpg">
                            <span class="overlay black"></span>
                        </figure>

                        <div class="nav-text">
                            <p class="nav-index">01</p>
                            <p class="nav-title">Who</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#" class="d-block">
                        <figure class="no-margin">
                            <img src="uploads/what-hero.jpg">
                            <span class="overlay black"></span>
                        </figure>

                        <div class="nav-text">
                            <p class="nav-index">02</p>
                            <p class="nav-title">What</p>
                        </div>
                    </a>
                </div>

                <div class="col-md-6">
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
                <div class="col-md-6">
                    <a href="#" class="d-block">
                        <figure class="no-margin">
                            <img src="uploads/what-hero.jpg">
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

