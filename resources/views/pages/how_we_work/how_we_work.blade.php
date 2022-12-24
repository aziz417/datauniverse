@extends('layouts.app')

@section('title', 'How We Work page of '.config('app.name'))
@section('meta_keywords', 'How We Work, work')
@section('meta_description', 'working definition page of '.config('app.name'))

@section('content')
    <style>
        .x-logo-image {
            width: 60px !important;
        }

        @media (max-width: 770px) {
            .page-title {
                font-size: 30px !important;
                margin: 15px auto 10px !important;
            }

            .x-logo-image {
                width: 45px !important;
            }

            .custom-mt {
                margin-top: 60px !important;
            }
        }

        @media (max-width: 525px) {
            .page-title {
                font-size: 23px !important;
            }

            .x-logo-image {
                width: 30px !important;
            }
        }

        @media (max-width: 320px) {
            .page-title {
                font-size: 20px !important;
            }
        }

        .dev-ball-st {
            width: 20px;
            height: 20px
        }

    </style>
    @php($data_placeholder_bg = "linear-gradient(100deg,#fa7070,#fa9770)")

    <section class="page-banner">
        <div class="container">
            <div class="page-title-wrapper">
                <h1 class="page-title custom-mt">How</h1>
                <h1 class="page-title"> Developer <span class="ml-2">E</span><span><img class="x-logo-image" loading="lazy"
                           src="{{ asset('frontend/assets/img/x.png') }}"></span>perience
                    Hub</h1>
                <h1 class="page-title">Work</h1>
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
            <li class="ball dev-ball-st"></li>
            <li class="ball"></li>
            <li class="ball"></li>
        </ul>
    </section>

    <section class="py-0 work_road_map_custom_bg" id="how-we-work">
        <div class="container-fluid">
            <div class="row">

                <div class="">
                    <img data-src="{{ @$workRoadMap->image->url }}" alt="how we work" class="img-fluid lozad"
                         data-placeholder-background="{{ $data_placeholder_bg }}"/>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        new CircleType(document.getElementById('mailTitle')).radius(900);
    </script>
@endpush
