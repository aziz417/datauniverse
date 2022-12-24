@extends('layouts.app')

@section('title', 'Terms of Use '.config('app.name'))
@section('meta_keywords', 'Terms of Use choose us')
@section('meta_description', 'we use various think. we still developing us')

@section('content')

    <section class="page-banner">
        <div class="container">
            <div class="page-title-wrapper">
                <h1 class="page-title">Terms of Use</h1>
                <ul class="bradcurmed">
                    <li>Developer eXperience Hub IT</li>
                </ul>
            </div>
        </div>
        <svg
            class="circle"
            data-parallax='{"x" : -200}'
            xmlns="http://www.w3.org/2000/svg"
            width="950px"
            height="950px"
        >
            <path
                fill-rule="evenodd"
                stroke="rgb(250, 112, 112)"
                stroke-width="100px"
                stroke-linecap="butt"
                stroke-linejoin="miter"
                opacity="0.051"
                fill="none"
                d="M450.000,50.000 C670.914,50.000 850.000,229.086 850.000,450.000 C850.000,670.914 670.914,850.000 450.000,850.000 C229.086,850.000 50.000,670.914 50.000,450.000 C50.000,229.086 229.086,50.000 450.000,50.000 Z"
            />
        </svg>
        <ul class="animate-ball">
            <li class="ball"></li>
            <li class="ball"></li>
            <li class="ball"></li>
            <li class="ball"></li>
            <li class="ball"></li>
        </ul>
    </section>

    <section class="about pt-5">
        <div class="container">
            <div class="row">
                <div id="primary" class="content-area col-md-8 mx-auto">
                    <div id="content" class="site-content" role="main">
                        <article id="post-108" class="post-108 page type-page status-publish hentry">
                            <header class="entry-header mt-3 pb-3">
                                <h1 class="entry-title text-center">Terms of Use</h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content mt-4">
                                {!! @$terms_of_use->terms_of_use !!}
                            </div><!-- .entry-content -->
                        </article><!-- #post-108 -->
                    </div><!-- #content .site-content -->
                </div><!-- #primary .content-area -->

            </div>
        </div>
    </section>

@endsection
