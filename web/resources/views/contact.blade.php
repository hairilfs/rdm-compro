@extends('layouts.app')

@section('title', 'Contact')

@section('head')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoURhBKO3chPE1tfCt1_jjJwVKSFQEcvs"></script>
@endsection

@section('body_class', 'contact inversed')

@section('content')

<main>
    <section id="contact-hero" class="">
        <div class="section--inner">
            <figure class="no-margin fullheight-js">
                <picture class="image-ad fheight">
                    <source media="(max-width: 576px)" srcset="{{ $slider->getImgUrl('mobile') }}">
                    <source media="(min-width: 577px)" srcset="{{ $slider->getImgUrl() }}">
                    <img src="{{ $slider->getImgUrl() }}" alt="">
                </picture>
                <span class="overlay black"></span>
            </figure>

            <div class="hero-heading text-center">
                <h1 class="f-reg">Say Hello!</h1>
            </div>
        </div>
    </section>

    <section id="contact-body" class="right-diagonal">
        <div class="section--inner">
            <div class="contact-top has-ver-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-left">
                            <h4 class="f-reg lh-med ls-med">
                                Contact Us
                                <span class="d-block opaque">today to explore solution for your next marketing campaign</span>
                            </h4>
                        </div>
                        <div class="col-md-5 push-md-2 col-right">
                            <div class="contact-reach">
                                <h5 class="f-reg">New Business</h5>
                                <p class="f-med">
                                    PRESS
                                    <br/>
                                    <a href="#" class="link link-white link-opaque">press@onerdm.com</a>
                                    <br/>
                                    <a href="#" class="link link-white link-opaque">onerdm.com/press</a>
                                </p>
                            </div>

                            <div class="contact-reach">
                                <h5 class="f-reg">General</h5>
                                <p class="f-med">
                                    TEAMS
                                    <br/>
                                    <a href="#" class="link link-white link-opaque">onerdm.com</a>
                                    <br/>
                                    <a href="#" class="link link-white link-opaque">simon@onerdm.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-bottom">
                <div class="mood-holder">
                    <figure class="no-margin">
                        <picture class="image-ad">
                            <source media="(max-width: 576px)" srcset="uploads/_temp/img-dummy-1-mobile.jpg">
                            <source media="(min-width: 577px)" srcset="uploads/contact-mood.jpg">
                            <img class="w-fit" src="uploads/contact-mood.jpg" alt="">
                        </picture>
                        <span class="overlay black"></span>
                    </figure>
                    <div class="mood-text text-center">
                        <h2 class="f-reg">Imagine the unimaginable with RDM</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact-location">
        <div class="section--inner">
            <div class="location-top has-ver-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-left">
                            <h4 class="f-reg lh-med ls-med">
                                Locations
                            </h4>
                        </div>
                        <div class="col-md-5 push-md-2 col-right">
                            <div class="loc indonesia">
                                <h5 class="f-reg">Indonesia</h5>
                                <address>
                                    <strong class="d-block">RDM HEADQUARTER</strong>
                                    Rukan Crown Blok H No.1<br/>
                                    Green Lake City<br/>
                                    Cipondoh - Tangerang,<br/>
                                    Indonesia.
                                </address>
                            </div>

                            <div class="loc australia">
                                <h5 class="f-reg">Australia</h5>
                                <address>
                                    <strong class="d-block">RDM AUSTRALIA</strong>
                                    <a href="#" class="link link-white link-opaque">discover@onerdm.com</a><br/>
                                    <a href="#" class="link link-white link-opaque">+628172350394</a>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="location-bottom">
                <div id="map" class="fullheight-js"></div>
            </div>
        </div>
    </section>

    <section id="contact-talk" class="has-ver-padding">
        <div class="section--inner text-center has-ver-padding">
            <div class="container has-ver-padding">
                <div class="talk-holder has-ver-padding">
                    <h3 class="f-reg">Ok, let's talk</h3>
                    <a href="#" class="link btn-trigger-talk link-white link-opaque small f-med ls-med"><i class="icon-right-open-big"></i>REACH OUT TO US</a>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection

@push('scripts')

<script>
    $(document).ready(function(){
        rdm.contact();
    });

    $(window).load(function(){
        
    });

    $(window).resize(function(){

    });
</script>
    
@endpush

