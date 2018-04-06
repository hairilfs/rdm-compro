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
                <h1>Projects</h1>
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
                        <li class="active"><a href="#" class="link">All<i class="icon-right-open-big"></i></a></li>
                        <li><a href="#" class="link">Products<i class="icon-right-open-big"></i></a></li>
                        <li><a href="#" class="link">Campaigns<i class="icon-right-open-big"></i></a></li>
                        <li><a href="#" class="link">Style Guides<i class="icon-right-open-big"></i></a></li>
                        <li><a href="#" class="link">Licenses<i class="icon-right-open-big"></i></a></li>
                    </ul>
                </div>

                <div class="project-body has-ver-padding">
                    <div class="project-body--inner">
                        <div class="row grid">
                            <div class="col-md-6 item portrait">
                                <div class="project-image">
                                    <a href="javascript:void(0)" class="d-block link">
                                        <figure class="no-margin">
                                            <img src="uploads/AG-showcase.png">
                                        </figure>
                                        <figcaption>
                                            <p>Asian Games</p>
                                            <p>Product Design</p>
                                        </figcaption>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6 item landscape">
                                <div class="project-image">
                                    <a href="javascript:void(0)" class="d-block link">
                                        <figure class="no-margin">
                                            <img src="uploads/infinity-war.png">
                                        </figure>
                                        <figcaption>
                                            <p>Asian Games</p>
                                            <p>Product Design</p>
                                        </figcaption>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6 item landscape">
                                <div class="project-image">
                                    <a href="javascript:void(0)" class="d-block link">
                                        <figure class="no-margin">
                                            <img src="uploads/starwars.png">
                                        </figure>
                                        <figcaption>
                                            <p>Asian Games</p>
                                            <p>Product Design</p>
                                        </figcaption>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6 item landscape">
                                <div class="project-image">
                                    <a href="javascript:void(0)" class="d-block link">
                                        <figure class="no-margin">
                                            <img src="uploads/beyond-winner.png">
                                        </figure>
                                        <figcaption>
                                            <p>Asian Games</p>
                                            <p>Product Design</p>
                                        </figcaption>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6 item landscape">
                                <div class="project-image">
                                    <a href="javascript:void(0)" class="d-block link">
                                        <figure class="no-margin">
                                            <img src="uploads/mug-ag.png">
                                        </figure>
                                        <figcaption>
                                            <p>Asian Games</p>
                                            <p>Product Design</p>
                                        </figcaption>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6 item landscape">
                                <div class="project-image">
                                    <a href="javascript:void(0)" class="d-block link">
                                        <figure class="no-margin">
                                            <img src="uploads/rogue-one.png">
                                        </figure>
                                        <figcaption>
                                            <p>Asian Games</p>
                                            <p>Product Design</p>
                                        </figcaption>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6 item portrait">
                                <div class="project-image">
                                    <a href="javascript:void(0)" class="d-block link">
                                        <figure class="no-margin">
                                            <img src="uploads/sw-coin.png">
                                        </figure>
                                        <figcaption>
                                            <p>Asian Games</p>
                                            <p>Product Design</p>
                                        </figcaption>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6 item landscape">
                                <div class="project-image">
                                    <a href="javascript:void(0)" class="d-block link">
                                        <figure class="no-margin">
                                            <img src="uploads/dbp-preview.png">
                                        </figure>
                                        <figcaption>
                                            <p>Asian Games</p>
                                            <p>Product Design</p>
                                        </figcaption>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6 item landscape">
                                <div class="project-image">
                                    <a href="javascript:void(0)" class="d-block link">
                                        <figure class="no-margin">
                                            <img src="uploads/pillow-ag.png">
                                        </figure>
                                        <figcaption>
                                            <p>Asian Games</p>
                                            <p>Product Design</p>
                                        </figcaption>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6 item landscape">
                                <div class="project-image">
                                    <a href="javascript:void(0)" class="d-block link">
                                        <figure class="no-margin">
                                            <img src="uploads/dbp-fix.png">
                                        </figure>
                                        <figcaption>
                                            <p>Asian Games</p>
                                            <p>Product Design</p>
                                        </figcaption>
                                    </a>
                                </div>
                            </div>
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