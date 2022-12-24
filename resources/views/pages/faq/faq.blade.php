@extends('layouts.app')

@section('title', 'DevXHub | FAQs')

@push('style')
    <style>
        .dev-transformer {
            transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1);
            -webkit-transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1);
        }
    </style>
@endpush
@section('content')
    <section class="page-banner">
        <div class="container">
            <div class="page-title-wrapper">
                <h1 class="page-title">
                    @if(@$siteTitles->faq_title_1)
                        {!! @$siteTitles->faq_title_1 !!}
                    @else
                        Frequently Asked<span class="about_text-theme"> Questions</span></h1>
                @endif
                <h3 class="page-sub-title"> Developer <span class="ml-2">E</span><span><img class="x-logo-image" loading="lazy" src="{{ asset('frontend/assets/img/x.png') }}"></span>perience Hub</h3>
            </div>
            <!-- /.page-title-wrapper -->
        </div>
        <!-- /.container -->

        <svg class="circle dev-transformer" data-parallax="{&quot;x&quot; : -200}" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink" width="950px" height="950px">
            <path fill-rule="evenodd" stroke="rgb(250, 112, 112)" stroke-width="100px" stroke-linecap="butt"
                  stroke-linejoin="miter" opacity="0.051" fill="none"
                  d="M450.000,50.000 C670.914,50.000 850.000,229.086 850.000,450.000 C850.000,670.914 670.914,850.000 450.000,850.000 C229.086,850.000 50.000,670.914 50.000,450.000 C50.000,229.086 229.086,50.000 450.000,50.000 Z"></path>
        </svg>

        <ul class="animate-ball">
            <li class="ball"></li>
            <li class="ball"></li>
            <li class="ball"></li>
            <li class="ball"></li>
            <li class="ball"></li>
        </ul>
    </section>
    <!-- /.page-banner -->

    <!--=========================-->
    <!--=         About         =-->
    <!--=========================-->
    <section class="faqs">
        <div class="container">
            <div class="tabs-wrapper">
                <!-- <ul class="nav faq-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="false">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="design-tab" data-toggle="tab" href="#design" role="tab" aria-controls="design" aria-selected="true">UI/UX Design</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="service-tab" data-toggle="tab" href="#service" role="tab" aria-controls="service" aria-selected="false">Service</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="branding-tab" data-toggle="tab" href="#branding" role="tab" aria-controls="branding" aria-selected="false">Branding</a>
                    </li>
                </ul> -->
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                        <div id="accordionsing-3" class="faq faq-two pixFade">
                            <div class="card active">
                                <div class="card-header" id="heading102">
                                    <h5>
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapse002" aria-expanded="false"
                                                aria-controls="collapse002">
                                            Who can be a customer at DevXHub ?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse002" class="collapse show" aria-labelledby="heading102"
                                     data-parent="#accordionsing-3">
                                    <div class="card-body">
                                        <p>
                                            Anyone here can be a customer for our all IT Services.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading202">
                                    <h5>
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse102"
                                                aria-expanded="true" aria-controls="collapse102">
                                            How can we do the order ?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse102" class="collapse" aria-labelledby="heading202"
                                     data-parent="#accordionsing-3">
                                    <div class="card-body">
                                        <p>
                                            Please visit our service pages and follow the order system. If you have any
                                            problems, just contact us.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading302">
                                    <h5>
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapse202" aria-expanded="false"
                                                aria-controls="collapse202">
                                            How do we finish a job ?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse202" class="collapse" aria-labelledby="heading302"
                                     data-parent="#accordionsing-3">
                                    <div class="card-body">
                                        <p>
                                            The work will be done according to our prescribed rules.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading402">
                                    <h5>
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapse402" aria-expanded="false"
                                                aria-controls="collapse302">
                                            How do we make payments ?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse402" class="collapse" aria-labelledby="heading402"
                                     data-parent="#accordionsing-3">
                                    <div class="card-body">
                                        <p>
                                            Here you can make your payments in three ways. Such as: Cash payment, Bank
                                            payment & bKash payment. Please see our payment system page.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading502">
                                    <h5>
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapse502" aria-expanded="false"
                                                aria-controls="collapse302">
                                            How do we get support ?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse502" class="collapse" aria-labelledby="heading502"
                                     data-parent="#accordionsing-3">
                                    <div class="card-body">
                                        <p>
                                            Please open our <a href="{{ route('contact') }}">suooprt ticket</a> page and
                                            complete the form - then submit it.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading602">
                                    <h5>
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapse602" aria-expanded="false"
                                                aria-controls="collapse302">
                                            How we get instant support ?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse602" class="collapse" aria-labelledby="heading602"
                                     data-parent="#accordionsing-3">
                                    <div class="card-body">
                                        <p>
                                            At first, submit your ticket in our <a href="{{ route('contact') }}">suooprt
                                                ticket</a> page. Then let us know by phone.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading702">
                                    <h5>
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapse702" aria-expanded="false"
                                                aria-controls="collapse302">
                                            Can we get monthly or yearly support ?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse702" class="collapse" aria-labelledby="heading702"
                                     data-parent="#accordionsing-3">
                                    <div class="card-body">
                                        <p>
                                            Yes, of course. But for that, you have to contract with us.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="faq-forms" id="targetId">
                <div class="section-title text-center">
                    <h3 class="sub-title">
                        @if(@$siteTitles->faq_title_2)
                            {!! @$siteTitles->faq_title_2 !!}
                        @else
                            Question form
                        @endif
                    </h3>

                    <h2 class="title">
                        @if(@$siteTitles->faq_title_3)
                            {!! @$siteTitles->faq_title_3 !!}
                        @else
                            Do you have any Question?
                        @endif
                        </h2>
                </div>
                <!-- /.section-title -->
                <form action="{{ route('user.question.store') }}" method="post" class="faq-form target">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" value="{{ old('name') }}" name="name" placeholder="Name" required>
                            @error('name')
                            <span class="help-block m-b-none text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <input type="text" value="{{ old('email') }}" name="email" placeholder="Email" required>
                            @error('email')
                            <span class="help-block m-b-none text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <input type="text" name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                    @error('subject')
                    <span class="help-block m-b-none text-danger">
                        {{ $message }}
                    </span>
                    @enderror

                    <textarea name="message" cols="30" rows="10" placeholder="Your Question"
                              required>{{ old('message') }}</textarea>
                    @error('message')
                    <span class="help-block m-b-none text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                    <button type="submit" class="pix-btn submit-btn">Send Questions</button>
                </form>
                <!-- /.faq-form -->
            </div>
            <!-- /.faq-forms -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.faq-section -->
@endsection
@push('script')
    <script>
        $(document).ready(function () {
            @if($errors->any())
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#targetId").offset().top
            }, 2000);
            @endif
        })
    </script>
@endpush
