@extends('layouts.app')

@section('title', 'Project')

@section('body_class', 'project ongoing inversed')

@section('content')

<main>
    <section id="landing-intro" class="">
        <div class="section--inner">
            <div class="container">
                <div class="hero-heading has-ver-padding">
                    <h1 class="f-reg">We the creative agency, <span>and one stop <br/> solution for Asian Games 2018 Licensing</span></h1>
                </div>
            </div>
        </div>
    </section>

    <section id="project-featured">
        <div class="section--inner">
            <div class="feature-top fullheight-js has-ver-padding text-center">

                <div class="ag-logo">
                    <img class="img-fluid" src="assets/img/ag-logo.png">
                </div>

                <h4 class="f-bold no-margin">ENERGY OF ASIA</h4>
            </div>

            <div class="store-locator">
                <div class="store-locator-head">
                    <div class="container">
                        <h3 class="f-bold no-margin">Store Location</h3>
                    </div>
                </div>

                <div class="store-locator-body">
                    <div class="store-location has-ver-padding has-bg-ornament">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 location-col">
                                    <h5>NOW AVAILABLE AT</h5>
                                    <ul>
                                        <li>Central Park</li>
                                        <li>FX Sudirman</li>
                                        <li>Pacific Place</li>
                                        <li>Gandaria City</li>
                                        <li>Senayan City</li>
                                        <li>Bintaro Exchange</li>
                                    </ul>
                                </div>

                                <div class="col-md-6 location-col">
                                    <h5>UPCOMING STORE</h5>
                                    <ul>
                                        <li>Pondok Indah Mall</li>
                                        <li>Lippo Mall Kemang</li>
                                        <li>Plaza Semanggi</li>
                                        <li>Mall Kelapa Gading</li>
                                        <li>Grand Indonesia</li>
                                        <li>Plaza Indonesia</li>
                                        <li>Kota Kasablanka</li>
                                        <li>Summarecon Mall Serpong</li>
                                        <li>Summarecon Mall Bekasi</li>
                                        <li>Terminal 1 Bandara Soekarno Hatta</li>
                                        <li>Terminal 2 Bandara Soekarno Hatta</li>
                                        <li>Stasiun Gambir</li>
                                        <li>Aeon Mall Bekasi</li>
                                        <li>Lippo Mall Puri</li>
                                        <li>Sarinah</li>
                                        <li>2000 Store Alfamart</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="project-video">
                <div class="container">
                    <div class="section--inner">
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
        </div>
    </section>

    <section id="about">
        <div class="section--inner">
            <div class="container">
                <div class="about-top has-ver-padding has-bg-ornament">
                    <div class="row">
                        <div class="col-md-6 section-title">
                            <h5>ABOUT US</h5>
                        </div>

                        <div class="col-md-6 section-content">
                            <p>
                                RDM is an Indonesian company with extensive experience in developing impeccable design and merchandising for various international brands.
                                <br/>
                                <br/>
                                We are proud to be the appointed official master license of Asian Games 2018 and to able to contribute to manage merchandise licensing for one of the biggest sports events in Asia.
                                <br/>
                                <br/>
                                We invite you to join us and take this opportunity to participate and contribute to the success of Asian Games 2018.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="about-bottom has-ver-padding">
                    <div class="row">
                        <div class="col-md-6 col-left">
                            <div class="about-image">
                                <a href="javascript:void(0)" class="d-block link">
                                    <figure class="no-margin">
                                        <img src="assets/img/img-project-1.jpg">
                                    </figure>
                                    <figcaption>
                                        <p>Asian Games 2018 Booth</p>
                                        <p>Central Park</p>
                                    </figcaption>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6 col-right">
                            <div class="about-image">
                                <a href="javascript:void(0)" class="d-block link">
                                    <figure class="no-margin">
                                        <img src="assets/img/img-project-2.jpg">
                                    </figure>
                                    <figcaption>
                                        <p>Asian Games 2018 Booth</p>
                                        <p>Central Park</p>
                                    </figcaption>
                                </a>
                            </div>

                            <div class="about-image">
                                <a href="javascript:void(0)" class="d-block link">
                                    <figure class="no-margin">
                                        <img src="assets/img/img-project-3.jpg">
                                    </figure>
                                    <figcaption>
                                        <p>Asian Games 2018 Booth</p>
                                        <p>Central Park</p>
                                    </figcaption>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="enquiries">
        <div class="section--inner has-ver-padding">
            <div class="container has-bg-ornament">
                <div class="row">
                    <div class="col-md-6 section-title">
                        <h5>ENQUIRIES</h5>
                    </div>

                    <div class="col-md-6 section-content">
                        <p>Please fill out the following form with your new business request, and feel free to attach your brief via the PDF upload.</p>

                        <form id="enquiries-form">
                            <div class="row row-xs">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="enq-name" class="d-block">
                                            <input id="enq-name" type="text" class="form-control" name="" placeholder="Name">
                                        </label>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="enq-company" class="d-block">
                                            <input id="enq-company" type="text" class="form-control" name="" placeholder="Company">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-xs">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="enq-phone" class="d-block">
                                            <input id="enq-phone" type="text" class="form-control" name="" placeholder="Telephone">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-xs">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="enq-email" class="d-block">
                                            <input id="enq-email" type="email" class="form-control" name="" placeholder="Email">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-xs">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="select-option--holder">
                                            <i class="icon-down-dir"></i>
                                            <select id="enq-topic" class="form-control" name=''>
                                                <option value="0" selected>How can we help?</option>
                                                <option value="1">Lorem ipsum</option>
                                                <option value="2">Dolor sit amet</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-xs">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="enq-msg" class="d-block">
                                            <textarea id="enq-msg" class="form-control" name="" placeholder="Message..."></textarea>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-border-black pad-lg curved">SUBMIT MAIL <i class="icon-right"></i></button>
                        </form>

                        <p class="footnote no-margin">If you’d prefer to skip the form,<br/>feel free to get in touch via <a href="mailto:info@onerdm.com?Subject=Hello" class="link">info@onerdm.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="section--inner has-ver-padding">
            <div class="container has-bg-ornament">
                <div class="row">
                    <div class="col-md-6 section-title">
                        <h5>CONTACT</h5>
                    </div>

                    <div class="col-md-6 section-content">
                        <p>
                            PT.RDM
                            <br/>
                            Rukan Crown Blok H No.1
                            <br/>
                            Green Lake City
                            <br/>
                            Cipondoh - Tangerang
                            <br/>
                            Indonesia
                        </p>

                        <p class="no-margin"><a href="mailto:info@onerdm.com?Subject=Hello" class="link">info@onerdm.com</a>
                        </p>
                        <p><a href="tel:021-5502637" class="link">021 - 5502637</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="landing-license" class="has-ver-padding">
        <div class="section--inner">
            <div class="container">
                <div class="license-top has-ver-padding text-center">
                    <h5>MASTER LICENSE BY</h5>
                    <figure class="no-margin">
                        <img class="img-fluid" src="assets/img/master.png">
                    </figure>
                </div>
                <div class="license-bottom has-ver-padding">
                    <div class="license-bottom-holder row flexed">
                        <div class="item">
                            <figure class="no-margin">
                                <img src="assets/img/1-sritex.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin">
                                <img src="assets/img/2-madonna.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin">
                                <img src="assets/img/3-tjingtjau.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin">
                                <img src="assets/img/4-royalselangor.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin">
                                <img src="assets/img/6-party-indo.png">
                            </figure>
                        </div>


                        <div class="item">
                            <figure class="no-margin">
                                <img src="assets/img/6-sinde.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin">
                                <img src="assets/img/7-cahaya.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin">
                                <img src="assets/img/8-duanyam.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin">
                                <img src="assets/img/9-familia.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin">
                                <img src="assets/img/10-ananta-rupa.png">
                            </figure>
                        </div>


                        <div class="item">
                            <figure class="no-margin">
                                <img src="assets/img/11-new-energy.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin">
                                <img src="assets/img/12-bisobang.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin">
                                <img src="assets/img/13-beautiful-tomorrow.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin">
                                <img src="assets/img/14-monalisa.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin">
                                <img src="assets/img/15-og.png">
                            </figure>
                        </div>


                        <div class="item">
                            <figure class="no-margin">
                                <img src="assets/img/16-indofood.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin">
                                <img src="assets/img/17-aqua.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin">
                                <img src="assets/img/18-sinarmas.png">
                            </figure>
                        </div>

                        <div class="item">
                            <figure class="no-margin">
                                <img src="assets/img/19-kfc.png">
                            </figure>
                        </div>
                    </div>
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

    });
</script>
    
@endpush

