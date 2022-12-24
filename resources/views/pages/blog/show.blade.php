@extends('layouts.app')

@section('title', 'Blog show page of '.config('app.name'))
@section('meta_keywords', 'blog, show, details, content, post, technology, popular post, recent post blog')
@section('meta_description', 'blog post of '.config('app.name'))

@push('style')
    <style>
        body {
            background: #f3f2ef;
        }

        .border {
            border-radius: 8px
        }

        .hover_bg:hover {
            background: #dddddd;
        }

        .popular_card {
            flex-direction: row;
        }

        .popular_card img {
            width: 30%;
        }

        .small_card_image {
            height: 110px !important;
        }

        .small_read_more {
            padding: 5px 8px;
            background: #fa7070;
            display: inline-block;
            color: #fff;
        }

        .medium_read_more {
            padding: 1px 8px !important;
        }

        .small_read_more:hover {
            color: #ffffff;
        }

        .dev-post-description {
            line-height: 1.6
        }

        .btn-success {
            width: 100%;
            font-size: 20px;
        }

        .dev-post-title {
            font-size: large
        }
    </style>
@endpush
@section('content')

    {{--  post section  --}}
    <section style="margin-top: 135px" class="blog-single">
        <div class="container pb-120">
            <div class="row my-5">
                <div class="col-lg-8">
                    <div class="card border bg-white">
                        <img
                                loading="lazy"
                                src="{{  @$post->image->url }}"
                                class="card-img-top" alt="{{ @$post->title }}">
                        <div class="card-body">
                            @dd(Auth::check());
                            @if(Auth::check())
                                <a href="{{
                                        $post->image->type == 'data_file' ? @$post->image->url : ''
                                    }}" class="btn btn-success w-full">Download Now</a>
                            @else
                                <div>
                                    <div class="wrap-login100">
                                        <form id="login-form" action="{{ route('login') }}">
                                            @csrf
                                            <h2>Login Now & Download This File</h2>
                                            <br/>
                                            <div class="wrap-input100 validate-input">
                                                <input class="form-control" type="email" name="email"
                                                       placeholder="Email">
                                            </div>
                                            <br/>
                                            <div class="wrap-input100 validate-input">
                                                <input class="form-control" type="password" name="password"
                                                       placeholder="Password">
                                            </div>
                                            <br/>
                                            <div class="container-login100-form-btn">
                                                <button class="btn btn-info float-right" type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <button onclick="withoutLoginDownload()" class="btn btn-success w-full d-none">Download
                                    Now
                                </button>
                            @endif
                            <div class="p-3">
                                <h3 class="h3">{{ @$post->title }}</h3>
                                {{--                                <p class="text-dark mb-3 font-italic">--}}
                                {{--                                    <i class="fa fa-calendar-alt"></i>--}}
                                {{--                                    {{ @$post->created_at->isoFormat('MMM Do Y') }}</p>--}}
                                <p class="card-text dev-post-description">{!! @$post->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-lg-0 mt-5">
                    <h3>
                        @if(@$siteTitles->b_title_1)
                            {!! @$siteTitles->b_title_1 !!}
                        @else
                            Related Leads And Data
                        @endif
                    </h3>
                    <hr>
                    @foreach(@$related_posts as $post)
                        <div class="card popular_card bg-white mb-4 border">
                            <img src="{{ @$post->image->url }}" class="card-img-top" alt="{{ @$post->title }}">
                            <div class="card-body py-2">
                                <a href="{{ route('blog.show', @$post->slug) }}">
                                    <h5 class="text-dark px-3 h5 dev-post-title">{{ Str::limit(@$post->title, 60) }}</h5>
                                </a>
                                <div class="d-flex justify-content-between align-items-center px-3">
                                    {{--                                    <small class="mb-0 text-dark font-italic">--}}
                                    {{--                                        <i class="fa fa-calendar-alt"></i>--}}
                                    {{--                                        {{ \Carbon\Carbon::parse(@$post->created_at)->isoFormat('MMM Do Y')  }}--}}
                                    {{--                                    </small>--}}
                                    <a href="{{ route('blog.show', @$post->slug) }}" class="badge small_read_more">
                                        <small>Read More & File Download</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="card bg-white p-4 mb-3 border">
                        @include('pages.blog.sidebar')
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
@push('script')
    <script>
        function withoutLoginDownload() {
            console.log('ggggggg')
        }

        $(document).ready(function () {

            $(".card, .hoverEffect").hover(
                function () {
                    $(this).addClass('shadow-sm')
                }, function () {
                    $(this).removeClass('shadow-sm');
                }
            );
        });
    </script>
@endpush
