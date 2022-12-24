@extends('layouts.app')
@section('title', 'A Top-Tier Software Development Company | '.config('app.name'))

@push('style')
    <style>
        .dev-ball-st{
            width: 20px; height: 20px
        }
        .page-banner-bg{
            background: #F3F2EF
        }
    </style>
@endpush

@section('content')
    <div class="page-banner-bg">
        <section class="page-banner">
            <div class="container">
                <div class="page-title-wrapper">

                    <h1 class="page-title">
                        @php
                            $title_array = explode(' ', @$item->title);
                            $words = str_word_count(@$item->title)/2;
                        @endphp

                        @foreach($title_array as $key => $title)
                            @if($key < $words)
                                <span class="about_text-theme">
                                    {{ ucwords(@$title) }}
                                </span>
                            @else
                                {{ ucwords(@$title) }}
                            @endif
                        @endforeach
                    </h1>
                    <h3 class="page-sub-title"> Developer <span class="ml-2">E</span><span><img class="x-logo-image" loading="lazy" src="{{ asset('frontend/assets/img/x.png') }}"></span>perience Hub</h3>

{{--                    <h1 class="page-title"><span class="about_text-theme">Developer Experience Hub</span> Constructi<span--}}
{{--                                class="about_text-theme">o</span>n</h1>--}}
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

        <section class="">
            <div class="text-center">
                <img src="{{ @$item->images()->where('type', 'construction')->first()->url }}">
            </div>
            <div class="container">
                <div class="row mt-5 justify-content-md-center">
                    <div class="col-md-10 col-lg-8 mb-5">
                        <div class="contact-froms">
                            <form
                                    action="{{ route('contact.message.store') }}" method="post"
                                    class="contact-form"
                            >
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-12">
                                        <input
                                                type="text"
                                                name="name"
                                                placeholder="Name"
                                                required
                                        />
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <input
                                                type="email"
                                                name="email"
                                                placeholder="Email"
                                                required
                                        />
                                    </div>
                                </div>
                                <input type="text" name="subject" placeholder="Subject" required/>
                                <textarea
                                        name="message"
                                        placeholder="Your Comment"
                                        required
                                ></textarea>
                                <div class="text-lg-left text-center">
                                    <button type="submit" class="pix-btn submit-btn justify-content-center">
                                        <span class="btn-text">Send Your Massage</span>
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </button>
                                </div>
                                <div class="row">
                                    <div class="form-result alert">
                                        <div class="content"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
