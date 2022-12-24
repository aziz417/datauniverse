@extends('layouts.app')

@section('title', 'Career Details page of '.config('app.name'))
@section('meta_keywords', 'career, What does career mean')
@section('meta_description', 'career post of '.config('app.name'))

@push('style')
    <style>
        .border {
            border-radius: 8px
        }
        .dev-visibility-title {
            visibility: visible;
            animation-delay: 0.3s;
            animation-name: i;
        }
    </style>
@endpush

@section('content')

    <section class="page-banner">
        <div class="container">
            <div class="page-title-wrapper">


                <h1 class="page-title">
                    @if(@$siteTitles->c_d_title_1)
                        {!! @$siteTitles->c_title_1 !!}
                    @else
                        <span class="about_text-theme">Job</span> Descripti<span class="about_text-theme">o</span>n
                    @endif
                </h1>
                <h3 class="page-sub-title"> Developer <span class="ml-2">E</span><span><img class="x-logo-image" loading="lazy" src="{{ asset('frontend/assets/img/x.png') }}"></span>perience Hub</h3>
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

    <section class="about linkedin-bg pb-2">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-10 offset-lg-1">
                    <div class="wow pixFadeUp card bg-white p-3 p-md-5 rounded border dev-visibility-title"
                         data-wow-delay="0.3s"
                    >
                        <div class="card-body mb-3">
                            <div class="row">
                                <div class="col-lg-9">
                                    <h3 class="card-title wow pixFadeUp jobpost_title">
                                        {{ $career->title }}
                                    </h3>
                                </div>
                                <div class="col-lg-3 text-lg-right">
                                    <a href="mailto:career@devxhub.com"
                                       class="pix-btn wow pixFadeUp dev-visibility-title"
                                       data-wow-delay="0.3s"
                                    >Apply Now</a>
                                </div>
                            </div>
                            <div class="job-content mt-4 wow pixFadeUp dev-visibility-title"
                                 data-wow-delay="0.3s">
                                {!! @$career->desc !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $(".card").hover(
                function () {
                    $(this).addClass('shadow-sm').css('cursor', 'pointer');
                }, function () {
                    $(this).removeClass('shadow-sm');
                }
            );
        });
    </script>
@endpush
