@extends('layouts.app')

@section('title', 'Home')

@section('body_class', 'home inversed')

@section('content')

<main>
    <section id="home-hero" class="">
        <div class="section--inner">
            <div id="sliderHome" class="owl-carousel slider">
                @foreach ($slider as $element)
                <div class="item">
                    <figure class="no-margin fullheight-js">
                        <picture class="image-ad">
                            <source media="(max-width: 576px)" srcset="{{ $element->getImgUrl('mobile') }}">
                            <source media="(min-width: 577px)" srcset="{{ $element->getImgUrl() }}">
                            <img src="{{ $element->getImgUrl() }}" alt="">
                        </picture>
                        <span class="overlay black"></span>
                    </figure>
                </div>
                @endforeach
            </div>

            <div class="hero-heading text-center">
                <h1 class="f-reg">Creativity Meets Reality</h1>
                <p class="no-margin f-bold">Licensing &amp; Brand Innovation</p>
            </div>

            <div class="hero-cta text-center">
                <a href="#" class="btn btn-cta f-bold d-block btn-border-white small-text curved">What we can do for you</a>
                <br/>
                <a href="#" class="link-scroll link link-white">
                    <i class="icon-down-dir"></i>
                </a>
            </div>
        </div>
    </section>

    <section id="home-about" class="left-diagonal has-ver-padding">
        <div class="section--inner has-ver-padding">
            <div class="about-content text-center">
                <p class="small no-margin f-med ls-med">ABOUT US</p>
                <h5 class="f-reg">Good design is not fashion nor branding. Good design is realistic and its problem solving, its a process of refining our world. It makes us who we are.</h5>

                <a href="#" class="link link-opaque link-white small ls-med"><i class="icon-right-open-big"></i>LEARN MORE</a>
            </div>
        </div>
    </section>

    <section id="home-about-interaction" class="has-ver-padding">
        <a href="#" id="close-interaction" class="css-close close"></a>
        <div class="section--inner has-ver-padding">
            <div id="interaction-detail">
                <div class="detail-item">
                    <div class="detail-item--inner fheight flexed">
                        <div class="detail-image hidden-md-down fheight">
                            <div class="detail-image--inner fheight">
                                <span class="overlay black"></span>
                                <span class="initial opaque">R</span>
                            </div>
                        </div>
                        <div class="detail-text flexed-mobile">
                            <div class="detail-text--inner">
                                <div class="content-line_slide">
                                    <h2 class="f-reg"><span>01</span>Result Oriented.</h2>
                                    <p>Lorem ipsum dolor sit amet.</p>
                                </div>
                                <div class="content-line_slide">
                                    <p class="opaque">To truly innovate, you have to do more than increase conversion and wow your audience. Innovation simultaneously requires a global view of your digital product and the parsing of every user interaction. It means understanding what the user needs before they think they need it, and surprising them in the attention to detail. It means solving internal pain-points, automating processes, and turning complicated into simple.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="detail-item fheight flexed">
                    <div class="detail-item--inner fheight flexed">
                        <div class="detail-image hidden-md-down fheight">
                            <div class="detail-image--inner fheight">
                                <span class="overlay black"></span>
                                <span class="initial opaque">D</span>
                            </div>
                        </div>
                        <div class="detail-text flexed-mobile">
                            <div class="detail-text--inner">
                                <div class="content-line_slide">
                                    <h2 class="f-reg"><span>02</span>Different.</h2>
                                    <p>Lorem ipsum dolor sit amet.</p>
                                </div>
                                <div class="content-line_slide">
                                    <p class="opaque">To truly innovate, you have to do more than increase conversion and wow your audience. Innovation simultaneously requires a global view of your digital product and the parsing of every user interaction. It means understanding what the user needs before they think they need it, and surprising them in the attention to detail. It means solving internal pain-points, automating processes, and turning complicated into simple.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="detail-item fheight flexed">
                    <div class="detail-item--inner fheight flexed">
                        <div class="detail-image hidden-md-down fheight">
                            <div class="detail-image--inner fheight">
                                <span class="overlay black"></span>
                                <span class="initial opaque">M</span>
                            </div>
                        </div>
                        <div class="detail-text flexed-mobile">
                            <div class="detail-text--inner">
                                <div class="content-line_slide">
                                    <h2 class="f-reg"><span>03</span>Magnificent.</h2>
                                    <p>Lorem ipsum dolor sit amet.</p>
                                </div>
                                <div class="content-line_slide">
                                    <p class="opaque">To truly innovate, you have to do more than increase conversion and wow your audience. Innovation simultaneously requires a global view of your digital product and the parsing of every user interaction. It means understanding what the user needs before they think they need it, and surprising them in the attention to detail. It means solving internal pain-points, automating processes, and turning complicated into simple.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="interaction-list" class="has-ver-padding">
                <div class="container">
                    <ul>
                        <li>
                            <a href="#" class="link link-white link-opaque">
                                <span>01</span>
                                <span>Result Oriented.</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="link link-white link-opaque">
                                <span>02</span>
                                <span>Different.</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="link link-white link-opaque">
                                <span>03</span>
                                <span>Magnificent.</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="home-about-more">
        <div class="section--inner has-ver-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 about-more-head">
                        <h4 class="f-reg">About <span class="opaque">Learn more..</span></h4>
                    </div>

                    <div class="col-xl-8 about-more-content">
                        <div class="more-item flexed-desktop">
                            <h4 class="f-reg no-margin">Who <span class="opaque">we are</span></h4>
                            <a href="{{ url('about/who') }}" class="link f-med ls-med"><i class="icon-right-open-big"></i>MORE ABOUT WHO WE ARE</a>
                        </div>

                        <div class="more-item flexed-desktop">
                            <h4 class="f-reg no-margin">What <span class="opaque">we do</span></h4>
                            <a href="{{ url('about/what') }}" class="link f-med ls-med"><i class="icon-right-open-big"></i>MORE ABOUT WHAT WE DO</a>
                        </div>

                        <div class="more-item flexed-desktop">
                            <h4 class="f-reg no-margin">How <span class="opaque">we do it</span></h4>
                            <a href="{{ url('about/how') }}" class="link f-med ls-med"><i class="icon-right-open-big"></i>MORE ABOUT OUR METHODS</a>
                        </div>

                        <div class="more-item flexed-desktop">
                            <h4 class="f-reg no-margin">Why <span class="opaque">we are different</span></h4>
                            <a href="{{ url('about/why') }}" class="link f-med ls-med"><i class="icon-right-open-big"></i>MORE ABOUT OUR METHODS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="home-projects">
        <div class="section--inner">
            <div class="ongoing">
                <div class="ongoing--inner has-ver-padding">
                    <div class="container">
                        <div class="home-project-header text-center">
                            <p class="small opaque ls-med f-med">PROJECTS</p>
                            <h4 class="f-reg">Ongoing Projects</h4>
                        </div>
                        <div class="home-project-body has-ver-padding">
                            <div class="row row-no-margin flexed-desktop">
                                <div class="ongoing-left col-md-6">
                                    <figure class="no-margin">
                                        <img class="w-fit" src="uploads/ag-logo.png">
                                    </figure>
                                </div>
                                <div class="ongoing-right col-md-6">
                                    <div class="video-card">
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

                            <p class="more text-center">
                                <a href="#" class="link ls-med small"><i class="icon-right-open-big"></i>LEARN MORE ABOUT LICENSING OPPORTUNITY</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="recent">
                <div class="recent--inner has-ver-padding">
                    <div class="container">
                        <div class="home-project-header text-center">
                            <p class="small opaque ls-med f-med">PROJECTS</p>
                            <h4 class="f-reg">A selection of our recent works</h4>
                        </div>
                        <div class="home-project-body has-ver-padding">
                            <div class="row">

                                @foreach ($project as $element)
                                @if ($loop->first || $loop->iteration == 2)
                                <div class="col-md-6 {!! $loop->first ? 'col-left' : 'col-right' !!}">
                                @endif
                                    <div class="project-image">
                                        <a href="{{ $element->getUrl() }}" class="d-block link">
                                            <figure class="no-margin">
                                                <img src="{{ $element->getImgThumbUrl($loop->index) }}">
                                            </figure>
                                            <figcaption>
                                                <p>{{ $element->title }}</p>
                                                <p>{{ title_case(str_replace(',', ' ', $element->project_category)) }}</p>
                                            </figcaption>
                                        </a>
                                    </div>
                                @if ($loop->first || $loop->last)
                                </div>
                                @endif
                                @endforeach
                            </div>

                            <p class="more text-center">
                                <a href="{{ url('projects') }}" class="btn btn-border-white curved ls-med small"><i class="icon-right-open-big"></i>VIEW MORE</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="home-clients" class="left-diagonal has-ver-padding">
        <div class="section--inner has-ver-padding">
            <div class="container">
                <div class="clients-header text-center">
                    <p class="small opaque ls-med f-med">PARTNERS</p>
                    <h4 class="f-reg">You're in good company</h4>
                </div>

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
                        <a href="#" class="link ls-med f-med"><i class="icon-right-open-big"></i>VIEW ALL PARTNERS</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="home-mood-bottom" class="right-diagonal">
        <div class="section--inner fullheight-js">
            <div class="fheight has-bg-ornament bg-holder"></div>
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
