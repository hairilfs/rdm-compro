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
                                <span class="d-block opaque">{{ getSetting('Contact', 'contact_text') }}</span>
                            </h4>
                        </div>
                        <div class="col-md-5 push-md-2 col-right">
                            <div class="contact-reach">
                                {!! getSetting('Contact', 'contact_reach_1') !!}
                            </div>

                            <div class="contact-reach">
                                {!! getSetting('Contact', 'contact_reach_2') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-bottom">
                <div class="mood-holder">
                    <figure class="no-margin">
                        <picture class="image-ad">
                            <source media="(max-width: 576px)" srcset="{{ getSetting('Contact', 'contact_image') }}">
                            <source media="(min-width: 577px)" srcset="{{ getSetting('Contact', 'contact_image') }}">
                            <img class="w-fit" src="{{ getSetting('Contact', 'contact_image') }}" alt="">
                        </picture>
                        <span class="overlay black"></span>
                    </figure>
                    <div class="mood-text text-center">
                        <h2 class="f-reg">{{ getSetting('Contact', 'contact_text_image') }}</h2>
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
                                {!! getSetting('Contact', 'contact_loc_indo') !!}
                            </div>

                            <div class="loc australia">
                                {!! getSetting('Contact', 'contact_loc_aus') !!}
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

@include('partials.bottom-section')

@include('partials.footer')

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

