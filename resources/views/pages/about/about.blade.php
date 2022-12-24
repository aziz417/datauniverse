@extends('layouts.app')
@section('title', 'Know about '.config('app.name'))
@section('meta_keywords', 'contact me, contact us, know about devxhub, about us')
@section('meta_description', 'Developer eXperiecne Hub IT')
@section('content')

    <section class="page-banner">
        <div class="container">
            <div class="page-title-wrapper">
                <h1 class="page-title">
                    @if(@$siteTitles->a_title_1)
                        {!! @$siteTitles->a_title_1 !!}
                    @else
                        About <span class="about_text-theme"> Us</span></h1>
                    @endif
                <h3 class="page-sub-title"> Developer <span class="ml-2">E</span><span><img class="x-logo-image" loading="lazy" src="{{ asset('frontend/assets/img/x.png') }}"></span>perience Hub</h3>
            </div>
        </div>
        <svg
            class="circle"
            data-parallax='{"x" : -200}'
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
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
    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="about-content">
                        <div class="section-title">
{{--                            <h3 class="sub-title wow pixFadeUp">Our History</h3>--}}
                            <h2 class="title wow pixFadeUp" data-wow-delay="0.3s">
                                {{ @$about->title }}
                            </h2>
                        </div>
                        <p class="description wow pixFadeUp" data-wow-delay="0.4s">
                            {!! @$about->description !!}
                        </p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about-thumb wow pixFadeRight" data-wow-delay="0.6s">
                        <img loading="lazy" src="{{ @$about->image->url }}" alt="about" />
{{--                        <img loading="lazy" src="{{ asset('frontend/media/about/about-us .png') }}" alt="about" />--}}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
