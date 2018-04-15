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
                        RDM is a creative-living company in
                        <span class="opaque d-block">the heart of Indonesia.</span>
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
                <div class="content-body">
                    <div class="content-body--inner">
                        <h4 class="content-header f-reg">We strategize</h4>
                        <p>We pride ourselves on being different and with your success being a priority. The passionate team works collaboratively with you to stay ahead in any changing and challenging retail environment. We believe in keeping you informed and openly communicate with your shoppers and suppliers to ensure that each needs and demands are met.</p>

                        <blockquote>“This is a sneak preview of our comprehensive work of one of Asian biggest Sport Events. Asian Games Energy of Asia succeed in a world of sport.”</blockquote>
                    </div>            
                </div>
            </div>
        </div>

        <div class="content-block has-ver-padding">
            <div class="container">
                <div class="content-body">
                    <div class="content-body--inner">
                        <h4 class="content-header f-reg">Sales</h4>
                        
                        <div class="infographic">
                            <div class="row flexed-desktop">
                                <div class="col-md-5">
                                    <figure class="text-center">
                                        <img class="img-fluid" src="uploads/sales-icon.png">
                                    </figure>
                                </div>
                                <div class="col-md-7">
                                    <ul>
                                        <li>+13% in revenue</li>
                                        <li>+ 8% in shopper basket</li>
                                        <li>+3% in partner brands</li>
                                    </ul>
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
                        <h4 class="content-header f-reg">Brand Advocacy</h4>
                        
                        <div class="infographic">
                            <div class="row flexed-desktop">
                                <div class="col-md-5">
                                    <figure class="text-center">
                                        <img class="img-fluid" src="uploads/brand-icon.png">
                                    </figure>
                                </div>
                                <div class="col-md-7">
                                    <ul>
                                        <li>+13% in revenue</li>
                                        <li>+ 8% in shopper basket</li>
                                        <li>+3% in partner brands</li>
                                    </ul>
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
                        <h4 class="content-header f-reg">Sales</h4>
                        
                        <div class="infographic">
                            <div class="row flexed-desktop">
                                <div class="col-md-5">
                                    <figure class="text-center">
                                        <img class="img-fluid" src="uploads/sales-icon.png">
                                    </figure>
                                </div>
                                <div class="col-md-7">
                                    <ul>
                                        <li>+13% in revenue</li>
                                        <li>+ 8% in shopper basket</li>
                                        <li>+3% in partner brands</li>
                                    </ul>
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

