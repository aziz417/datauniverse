@extends('layouts.app')

@section('title', 'Career page of '.config('app.name'))
@section('meta_keywords', 'career, What does career mean')
@section('meta_description', 'career post of '.config('app.name'))

@push('style')
    <style>
        body {
            background: #f3f2ef;
        }

        .border {
            border-radius: 8px
        }

        .job_card {
            position: relative;
        }

        .job_status {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .dev-pb-0 {
            padding-bottom: 0 !important;
        }

        .dev-banner-title {
            visibility: visible;
            animation-delay: 0.3s;
            animation-name: i;
        }

        .dev-banner-small {
            visibility: visible;
            animation-name: i;
        }
        .position_color{
            color: #fa7070
        }

        .dev-swiper-st {
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
                    @if(@$siteTitles->c_title_1)
                        {!! @$siteTitles->c_title_1 !!}
                    @else
                        Ca<span class="about_text-theme">r</span>ee<span class="about_text-theme">r</span>
                    @endif
                </h1>
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

    <section class="about linkedin-bg pb-lg-5 dev-pb-0">
        <div class="container">
            <div class="heading-page">
                <h1
                    class="banner-title wow pixFadeUp text-center display-4 dev-swiper-st"
                    data-wow-delay="0.3s"
                >
                    @if(@$siteTitles->c_title_2)
                        {!! @$siteTitles->c_title_2 !!}
                    @else
                        Open Positions
                    @endif

                </h1>
                <div class="section-small text-center wow pixFadeUp dev-banner-small">
                    <h4 class="title">
                        @if(@$siteTitles->c_title_3)
                            {!! @$siteTitles->c_title_3 !!}
                        @else
                            We have the following positions for you right now
                        @endif
                    </h4>
                </div>
            </div>
            <div class="row my-5">
                @foreach($careers as $career)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="wow pixFadeUp card bg-white p-4 text-center rounded border h-100 job_card dev-banner-title"
                             data-wow-delay="0.3s"
                        >
                            <div class="card-body mb-3">
                                <div class="text-right job_status">
                                    @if(@$career->status)
                                        <p class="badge badge-primary float-right">Open</p>
                                    @else
                                        <p class="badge badge-danger float-right">Close</p>
                                    @endif
                                </div>
                                <h4 class="card-title font-weight-normal wow pixFadeUp mt-3">{{ $career->title }}</h4>
                                @if(@$career->status)
                                    <h6 class="position_color">{{ @$career->vacancy ?? 0 }} Positions</h6>
                                @endif
                                <p class="card-text wow pixFadeUp">For view the full job post please click "Click For
                                    Apply" button.</p>
                                <a href="{{ route('careerDetails', $career->slug) }}"
                                   class="pix-btn wow pixFadeUp"
                                   data-wow-delay="0.9s"
                                >Apply</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $(".card").hover(
                function () {
                    $(this).addClass('shadow-sm');
                }, function () {
                    $(this).removeClass('shadow-sm');
                }
            );
        });
    </script>
@endpush
