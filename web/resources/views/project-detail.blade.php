@extends('layouts.app')

@section('title', 'Project')

@section('body_class', 'project-detail')

@section('meta')
<meta property="og:url" content="{{ $project->getUrl() }}">
<meta property="og:type" content="article">
<meta property="og:title" content="{{ $project->title }}">
<meta property="og:description" content="{{ $project->excerpt }}">
<meta property="og:image" content="{{ $project->getImgUrl() }}">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="{{ $project->getUrl() }}">
<meta name="twitter:creator" content="RDM">
<meta name="twitter:title" content="{{ $project->title }}">
<meta name="twitter:description" content="{{ $project->excerpt }}">
<meta name="twitter:image" content="{{ $project->getImgUrl() }}">
@endsection

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
            <figure class="no-margin">
                <picture class="image-ad">
                    {{-- <source media="(max-width: 576px)" srcset="uploads/_temp/img-dummy-1-mobile.jpg">
                    <source media="(min-width: 577px)" srcset="{{ $project->getImgUrl() }}"> --}}
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

    @php
        $modules = $project->modules;
    @endphp
    @if ($modules->count())
    <section id="project-preview" class="has-ver-padding">
        <div class="section--inner">
            <div class="container">
                @foreach ($modules as $element)
                    {!! $element->toHtml() !!}
                @endforeach                

                <div class="preview-bottom">
                    <p class="small no-margin">Want to know more? Contact Us.</p>
                    <p class="small no-margin"><a href="mailto:info@onerdm.com" class="link f-med">info@onerdm.com</a> or <a href="tel:+62215502637" class="link f-med">+62215502637</a></p>
                </div>

                <div class="back-to-top text-center">
                    <a href="#" id="back-top" class="link link-opaque">
                        <i class="icon-right-open-big"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section id="project-talk" class="has-ver-padding">
        <div class="section--inner text-center has-ver-padding">
            <div class="container has-ver-padding">
                <div class="talk-holder has-ver-padding">
                    <h3 class="f-reg">Want to know more?</h3>
                    <a href="#" class="link btn-trigger-talk link-opaque small f-med ls-med"><i class="icon-right-open-big"></i>REACH US</a>
                </div>
            </div>
        </div>
    </section>
    
    @if ($other->count())
    <section id="next-project" class="">
        <div class="section--inner">
            <a href="{{ $other->getUrl() }}" class="d-block link link-white">
                <figure class="no-margin">
                    <img src="{{ $other->getImgUrl() }}">
                </figure>
                <span class="overlay dark"></span>
                <div class="next-project-title">
                    <div class="container">
                        <h6 class="ls-med">NEXT PROJECT</h6>
                        <p>{{ $other->partner }} — 
                        @foreach (explode(',', $project->project_category) as $element)
                            <span class="opaque category">{{ title_case($element) }}</span> {{ !$loop->last ? '/' : '' }}
                        @endforeach

                        <p class="h1 no-margin">{{ $other->title }}</p>
                    </div>
                </div>
            </a>
        </div>
    </section>
    @endif
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
