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
                        We strategize, design
                        <span class="opaque d-block">and create content and do all the things.</span>
                    </h1>
                </div>
            </div>

            <div class="intro-image image-offset">
                <figure class="no-margin">
                    <img class="w-fit" src="uploads/what-hero.jpg">
                </figure>
            </div>
        </div>
    </section>

    <section id="company-content">
        <div class="content-block has-ver-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 content-head">
                        <h4 class="content-header f-reg">We create brands</h4>
                    </div>

                    <div class="col-md-6 content-body">
                        <div class="content-body--inner">
                            <p>We pride ourselves on being different and with your success being a priority. The passionate team works collaboratively with you to stay ahead in any changing and challenging retail environment. We believe in keeping you informed and openly communicate with your shoppers and suppliers to ensure that each needs and demands are met.</p>

                            <ul>
                                <li>Brand Architecture</li>
                                <li>Brand Audit</li>
                                <li>Brand Guidelines</li>
                                <li>Brand Strategy</li>
                                <li>Competitor Analysis</li>
                                <li>Creative Direction</li>
                                <li>Logo &amp; Identity</li>
                                <li>Brand Architecture</li>
                                <li>Naming</li>
                            </ul>

                            <blockquote>“This is a sneak preview of our comprehensive work of one of Asian biggest Sport Events. Asian Games Energy of Asia succeed in a world of sport.”</blockquote>
                        </div>            
                    </div>
                </div>
            </div>
        </div>

        <div class="content-block has-ver-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 content-head">
                        <h4 class="content-header f-reg">We build products</h4>
                    </div>

                    <div class="col-md-6 content-body">
                        <div class="content-body--inner">
                            <p>We pride ourselves on being different and with your success being a priority. The passionate team works collaboratively with you to stay ahead in any changing and challenging retail environment. We believe in keeping you informed and openly communicate with your shoppers and suppliers to ensure that each needs and demands are met.</p>
                        </div>            
                    </div>
                </div>
            </div>
        </div>

        <div class="content-block has-ver-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 content-head">
                        <h4 class="content-header f-reg">We create marketing things</h4>
                    </div>

                    <div class="col-md-6 content-body">
                        <div class="content-body--inner">
                            <p>We pride ourselves on being different and with your success being a priority. The passionate team works collaboratively with you to stay ahead in any changing and challenging retail environment. We believe in keeping you informed and openly communicate with your shoppers and suppliers to ensure that each needs and demands are met.</p>

                            <figure>
                                <img class="w-fit" src="uploads/_temp/img-dummy-1.jpg">
                            </figure>
                        </div>            
                    </div>
                </div>
            </div>
        </div>

        <div class="content-block has-ver-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 content-head">
                        <h4 class="content-header f-reg">Mission</h4>
                    </div>

                    <div class="col-md-6 content-body">
                        <div class="content-body--inner">
                            <h4 class="section-large-text f-reg">Creates a long term partnership with Brand partners</h4>
                            <p>We pride ourselves on being unique and creativeThe passionate team works collaboratively with partners to stay ahead in any changing and challenging retail environment</p>
                        </div>            
                    </div>
                </div>
            </div>
        </div>

        <div class="content-block has-ver-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 content-head">
                        <h4 class="content-header f-reg">Vision</h4>
                    </div>

                    <div class="col-md-6 content-body">
                        <div class="content-body--inner">
                            <h4 class="section-large-text f-reg">To be The Best Brand Licensing Company in Indonesia</h4>
                            <p>Partnering with world-renown brand to enhance and maximize the business thru a unique and exclusive marketing and licensing model</p>
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
        
    });

    $(window).load(function(){
        
    });

    $(window).resize(function(){
        
    });
</script>
    
@endpush

