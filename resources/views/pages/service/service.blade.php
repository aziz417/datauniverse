@extends('layouts.app')

@section('title', 'Why Us page of '.config('app.name'))
@section('meta_keywords', 'Why Us, Why choose Us', 'choose us')
@section('meta_description', 'Why Us definition page of '.config('app.name'))


@push('style')
    <style>
        .saaspik-icon-box-wrapper.style-four {
            padding: 24px 40px 0px;
        }

        .card_position {
            position: relative;
        }

        .card_arrow_icon {
            position: absolute;
            bottom: 10px;
            left: 37px;
        }

        .x-logo-image{
            width: 60px!important;
        }

        @media (max-width: 770px){
            .page-title {
                font-size: 30px!important;
                margin: 15px auto 10px!important;
            }
            .x-logo-image {
                width: 45px!important;
            }
            .custom-mt{
                margin-top: 60px!important;
            }
        }

        @media (max-width: 525px){
            .page-title {
                font-size: 23px!important;
            }
            .x-logo-image {
                width: 30px!important;
            }
        }
        @media (max-width: 320px){
            .page-title {
                font-size: 20px!important;
            }
        }
    </style>
@endpush


@section('content')

    <section class="page-banner">
        <div class="container">
            <div class="page-title-wrapper">
                <h1 class="page-title custom-mt">
                    @if(@$siteTitles->s_title_1)
                        {!! @$siteTitles->s_title_1 !!}
                    @else
                        WHY
                    @endif
                    </h1>
                <h1 class="page-title"> Developer <span class="ml-2">E</span><span><img class="x-logo-image" loading="lazy" src="{{ asset('frontend/assets/img/x.png') }}"></span>perience Hub</h1>
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

    <section class="service">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-5">
                    <img loading="lazy" src="{{ @$weOffer->image->url }}" alt="{{@$weOffer->title}}"/>
                </div>
                <div class="col-lg-7">
                    <div class="service-content pt-0">
                        <div class="section-title">
                            <h2 class="title wow pixFadeUp" data-wow-delay="0.5s">
                                {{ @$weOffer->title }}
                            </h2>
                        </div>
                        <p class="wow pixFadeUp" data-wow-delay="0.7s">
                            <i>
                                "{!! @$weOffer->description !!}"
                            </i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="featured-two-service linkedin-bg py-5" id="why-us">
        <div class="container text-center">
            <div class="section-title text-center">
                <!-- <h3 class="sub-title wow pixFadeUp">Our service</h3> -->
                <!-- class="title wow pixFadeUp" data-wow-delay="0.3s" -->
                <h1 class="title wow pixFadeUp mt-3 pb-3" data-wow-delay="0.3s">
                    @if(@$siteTitles->s_title_2)
                        {!! @$siteTitles->s_title_2 !!}
                    @else
                        Why choose us?
                    @endif

                </h1>
            </div>

            <div class="row mb-5 pb-5">
                @foreach($whyChooses as $whyChoose)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div
                            class="saaspik-icon-box-wrapper style-four wow pixFadeLeft h-100 text-left card_position bg-white"
                            data-wow-delay="0.5s"
                        >
                            <div class="saaspik-icon-box-icon">
                                <img loading="lazy" width="96px" src="{{ @$whyChoose->image->url }}" alt="{{ @$whyChoose->title }}"/>
                            </div>
                            <div class="pixsass-icon-box-content">
                                <h3 class="pixsass-icon-box-title">
                                    <a href="javascript:void(0)">{{ @$whyChoose->title }}</a>
                                </h3>
                                <p></p>
                                <a href="javascript:void(0)" class="more-btn card_arrow_icon"><i
                                        class="ei ei-arrow_right"></i></a>
                                <svg
                                    class="layer"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="370px"
                                    height="270px"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        fill="rgb(253, 248, 248)"
                                        d="M-0.000,269.999 L-0.000,-0.001 L370.000,-0.001 C370.000,-0.001 347.889,107.879 188.862,112.181 C35.160,116.338 -0.000,269.999 -0.000,269.999 Z"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <section class="py-5" id="we-do-care">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="title wow pixFadeUp mt-3 pb-3" data-wow-delay="0.3s">
                    @if(@$siteTitles->s_title_3)
                        {!! @$siteTitles->s_title_3 !!}
                    @else
                        We do care !!!
                    @endif

                </h2>
            </div>
            <div class="row justify-content-center mb-5">
                @foreach($weDoCares as $weDoCare)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div
                            class="saaspik-icon-box-wrapper style-four wow pixFadeLeft h-100 card_position"
                            data-wow-delay="0.5s"
                        >
                            <div class="saaspik-icon-box-icon">
                                <img loading="lazy" width="96px" src="{{ $weDoCare->image->url }}" alt="{{ @$weDoCare->title }}"/>
                            </div>
                            <div class="pixsass-icon-box-content">
                                <h3 class="pixsass-icon-box-title">
                                    <a href="javascript:void(0)">{{ @$weDoCare->title }}</a>
                                </h3>
                                <p></p>
                                <a href="javascript:void(0)" class="more-btn card_arrow_icon"
                                ><i class="ei ei-arrow_right"></i
                                    ></a>
                                <svg
                                    class="layer"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="370px"
                                    height="270px"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        fill="rgb(253, 248, 248)"
                                        d="M-0.000,269.999 L-0.000,-0.001 L370.000,-0.001 C370.000,-0.001 347.889,107.879 188.862,112.181 C35.160,116.338 -0.000,269.999 -0.000,269.999 Z"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
