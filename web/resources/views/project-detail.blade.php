@extends('layouts.app')

@section('title', 'Project')

@section('body_class', 'project-detail')

@section('content')

<main>
    <section id="project-name">
        <div class="section--inner has-ver-padding">
            <div class="container">
                <p>{{ $project->partner }} — 
                    @foreach (explode(',', $project->project_category) as $element)
                        <a href="#" class=" link link-white link-opaque category">{{ title_case($element) }}</a> {{ !$loop->last ? '/' : '' }}    
                    @endforeach

                <h1>{{ $project->title }}</h1>
            </div>
        </div>
    </section>

    <section id="project-intro">
        <div class="section--inner">
            <figure class="no-margin fullheight-js">
                <picture class="image-ad">
                    <source media="(max-width: 576px)" srcset="uploads/_temp/img-dummy-1-mobile.jpg">
                    <source media="(min-width: 577px)" srcset="{{ $project->getImgUrl() }}">
                    <img src="{{ $project->getImgUrl() }}" alt="">
                </picture>
            </figure>

            <div class="intro-text has-ver-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 project-intro-info">
                            <ul>
                                <li>
                                    <p class="no-margin f-bold">Project Status</p>
                                    <p class="no-margin">{{ $project->project_status }}</p>
                                </li>

                                <li>
                                    <p class="no-margin f-bold">Partners</p>
                                    <p class="no-margin">{{ $project->partner }}</p>
                                </li>

                                <li>
                                    <p class="no-margin f-bold">Year</p>
                                    <p class="no-margin">{{ $project->year }}</p>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-6 push-lg-4 project-intro-content">
                            <h5 class="lh-med">{{ $project->excerpt }}</h5>
                            {!! $project->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($project->youtube_url)

    <section id="project-video" class="has-ver-padding">
        <div class="section--inner has-ver-padding">
            <div class="container">
                <div class="video">
                    <div id="yt-player" class="vid-container embed-responsive embed-responsive-16by9">
                        <div id="player"></div>
                    </div>

                    <div id="thumb-container" class="thumb-container">
                        @php
                            $youtube_id = $project->getYoutubeId();
                        @endphp
                        <img src="http://img.youtube.com/vi/{{ $youtube_id }}/maxresdefault.jpg">
                        <a id="start-video" class="start-video" data-fancybox="video" href="https://youtu.be/{{ $youtube_id }}">
                            <i class="icon-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endif


    <section id="project-preview" class="has-ver-padding">
        <div class="section--inner">
            <div class="container">
                <div class="preview-intro">
                    <p>Asian Games 2018</p>
                    <p class="lead">This is a sneak preview of our comprehensive work of one of Asian biggest Sport Events. Asian Games – Energy of Asia succeed in a world of sport.</p>

                    <h5>Full case study will be published later this year. Check back soon!</h5>
                </div>

                <div class="preview-row" data-columns="false">
                    <div class="row">
                        <figure class="no-margin">
                            <a class="d-block" data-fancybox="project" href="uploads/_temp/img-dummy-1.jpg">
                                <img class="w-fit" src="uploads/_temp/img-dummy-1.jpg">
                            </a>
                        </figure>
                    </div>
                </div>

                <div class="preview-row" data-columns="true">
                    <div class="row">
                        <figure class="no-margin">
                            <a class="d-block" data-fancybox="project" href="uploads/_temp/img-dummy-1.jpg">
                                <img class="w-fit" src="uploads/_temp/img-dummy-1.jpg">
                            </a>
                        </figure>

                        <figure class="no-margin">
                            <a class="d-block" data-fancybox="project" href="uploads/_temp/img-dummy-2.jpg">
                                <img class="w-fit" src="uploads/_temp/img-dummy-2.jpg">
                            </a>
                        </figure>
                    </div>
                </div>

                <div class="preview-row" data-columns="true">
                    <div class="row">
                        <figure class="no-margin">
                            <a class="d-block" data-fancybox="project" href="uploads/_temp/img-dummy-1.jpg">
                                <img class="w-fit" src="uploads/_temp/img-dummy-1.jpg">
                            </a>
                        </figure>

                        <div class="preview-text">
                            <h5>Asian biggest Sport Events.</h5>
                            <p>Asian Games – Energy of Asia succeed in a world of sport.</p>
                        </div>
                    </div>
                </div>

                <div class="preview-row" data-columns="false">
                    <div class="row">
                        <figure class="no-margin">
                            <a class="d-block" data-fancybox="project" href="uploads/what-hero.jpg">
                                <img class="w-fit" src="uploads/what-hero.jpg">
                            </a>
                        </figure>
                    </div>
                </div>

                <div class="preview-bottom">
                    <p class="small no-margin">Want to know more? Contact Us.</p>
                    <p class="small no-margin"><a href="#" class="link f-med">us@onerdm.com</a> or <a href="#" class="link f-med">+628171824912839</a></p>
                </div>

                <div class="back-to-top text-center">
                    <a href="#" id="back-top" class="link link-opaque">
                        <i class="icon-right-open-big"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="next-project" class="">
        <div class="section--inner">
            <a href="#" class="d-block link link-white">
                <figure class="no-margin">
                    <img src="uploads/what-hero.jpg">
                </figure>
                <span class="overlay dark"></span>
                <div class="next-project-title">
                    <div class="container">
                        <h6 class="ls-med">NEXT PROJECT</h6>
                        <p>Marvel — <span class="opaque category">Strategy</span> / <span class="opaque category">Style Guide</span> / <span class="opaque category">Custom Apparel</span> / <span class="opaque category">Packaging</span></p>

                        <p class="h1 no-margin">Star Wars Coin 1-7</p>
                    </div>
                </div>
            </a>
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
