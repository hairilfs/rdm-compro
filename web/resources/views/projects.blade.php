@extends('layouts.app')

@section('title', 'Projects')

@section('body_class', 'projects has-filtering inversed')

@section('content')

<main>
    <section id="project-hero" class="">
        <div class="section--inner">
            <figure class="no-margin fullheight-js">
                <picture class="image-ad fheight">
                    <source media="(max-width: 576px)" srcset="uploads/_temp/img-dummy-1-mobile.jpg">
                    <source media="(min-width: 577px)" srcset="uploads/_temp/img-dummy-1.jpg">
                    <img src="uploads/_temp/img-dummy-1.jpg" alt="">
                </picture>
                <span class="overlay black"></span>
            </figure>

            <div class="hero-heading text-center">
                <h1 class="f-reg">Projects</h1>
            </div>
        </div>
    </section>

    <section id="project-body" class="right-diagonal has-ver-padding">
        <div class="section--inner">
            <div class="container">
                <div class="project-filter">
                    <div class="filter-header">
                        <a href="javascript:void(0)" class="link link-white">Filter Projects</a>
                    </div>
                    <ul class="filter-list no-margin">
                        <li class="active"><a href="#" class="link filter-js" data-filter="*">All<i class="icon-right-open-big"></i></a></li>
                        <li><a href="#" class="link filter-js" data-filter=".product">Products<i class="icon-right-open-big"></i></a></li>
                        <li><a href="#" class="link filter-js" data-filter=".campaign">Campaigns<i class="icon-right-open-big"></i></a></li>
                        <li><a href="#" class="link filter-js" data-filter=".guide">Style Guides<i class="icon-right-open-big"></i></a></li>
                        <li><a href="#" class="link filter-js" data-filter=".license">Licenses<i class="icon-right-open-big"></i></a></li>
                    </ul>
                </div>

                <div class="project-body has-ver-padding">
                    <div class="project-body--inner">
                        <div class="row grid">
                            @foreach ($projects as $element)
                                <div class="col-md-6 item{{ $loop->index % 7 == 0 ? ' portrait' : ' landscape' }} {{ str_replace(',', ' ', $element->project_category) }}">
                                    <div class="project-image">
                                        <a href="javascript:void(0)" class="d-block link">
                                            <figure class="no-margin">
                                                {{-- <img src="uploads/AG-showcase.png"> --}}
                                                <img src="{{ $element->getImgUrl($loop->index) }}">
                                            </figure>
                                            <figcaption>
                                                <p>{{ $element->title }}</p>
                                                <p>{{ title_case(str_replace(',', ' ', $element->project_category)) }}</p>
                                            </figcaption>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="more text-center">
                            <a href="#" class="link ls-med f-med">+ MORE PROJECTS</a>
                        </div>
                    </div>
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
