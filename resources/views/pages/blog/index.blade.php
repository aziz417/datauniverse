@extends('layouts.app')

@section('title', 'Blog page of '.config('app.name'))
@section('meta_keywords', 'blog, content, post, technology, popular post, recent post blog')
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

        .blog_card_position {
            position: relative;
        }

        .blog_card_date {
            position: absolute;
            bottom: 10px;
            left: 10px;
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
        .dev-post-description{
            line-height:1.6
        }
        .dev-post-time{
            font-size: 15px
        }
        .dev-post-title{
            font-size: large
        }
        .card-body {
             padding: 0;
        }
        .small_read_more {
            padding: 5px 8px;
            background: #0A3041;
            display: inline-block;
            color: #fff;
        }
        .categoryList{
            font-size: 20px;
        }
        @media (min-width: 1200px){
            .container:not(.no-override) {
                max-width: 1142px;
            }}
    </style>
@endpush
@section('content')

    <div style="margin-top: 135px" class="blog-post-archive">
        <div class="container">
        @if( isset($featured_posts) && count(@$featured_posts) > 0)
            @php
                $first_featured_post = json_decode(json_encode(Arr::only($featured_posts->toArray(), [0])))[0];
                $first_featured_post_1 = json_decode(json_encode(Arr::only($featured_posts->toArray(), [1,2,3,4])));
                $first_featured_post_2 = json_decode(json_encode(Arr::only($featured_posts->toArray(), [5,6,7,8,9])));
            @endphp
            <!--    Start featured sections-->
                <h3>
                    @if(@$siteTitles->b_title_4)
                        {!! @$siteTitles->b_title_4 !!}
                    @else
                        Leads And Data
                    @endif
                </h3>
                <hr>
                <div class="row mb-5">
                    <div class="col-lg-4 mb-3">
                        <div class="card border bg-white blog_card_position">

                            <div class="sidebar">
                                <div id="categories" class="widget widget_categories">
                                    <h3>
                                        Categories
                                    </h3>
                                    <ul>
                                        @foreach(@$categories as $category)

                                            <div class="" role="menu">
                                                <a class="categoryList" href="{{ route('category.blogs', @$category->slug) }}">{{ ucfirst(@$category->name) }}</a>
                                            </div>

                                        @endforeach
                                    </ul>
                                </div>

                            </div>


                            {{--                            <img--}}
{{--                                loading="lazy"--}}
{{--                                src="{{ @$first_featured_post->image->url }}"--}}
{{--                                class="card-img-top" alt="{{ @$first_featured_post->title }}">--}}
{{--                            <div class="card-body">--}}
{{--                                <a href="{{ route('blog.show', @$first_featured_post->slug) }}">--}}
{{--                                    <h4 class="h4 px-3 pt-3 text-dark">{{ Str::limit(@$first_featured_post->title, 60) }}</h4>--}}
{{--                                </a>--}}

{{--                                <div class="py-0 px-3">--}}
{{--                                    <p class="card-text text-dark mb-3 dev-post-description">--}}
{{--                                        {!! substr(strip_tags(@$first_featured_post->short_description), 0, 200) !!}--}}
{{--                                        @if(strlen(strip_tags(@$first_featured_post->short_description)) > 200)--}}
{{--                                            ....--}}
{{--                                        @endif--}}
{{--                                    </p>--}}
{{--                                    <div class="d-flex mb-3 justify-content-between align-items-center">--}}
{{--                                        <p class="mb-0 text-dark font-italic align-self-end dev-post-time">--}}
{{--                                            <i class="fa fa-calendar-alt"></i>--}}
{{--                                            {{ \Carbon\Carbon::parse(@$first_featured_post->created_at)->isoFormat('MMM Do Y')  }}--}}
{{--                                        </p>--}}
{{--                                        <a href="{{ route('blog.show', @$first_featured_post->slug) }}"--}}
{{--                                           class=" btn medium_read_more small_read_more btn-sm">--}}
{{--                                            <small>Read More & File Download</small>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-3">
                        @foreach(@$first_featured_post_1 as $post)
                            <div class="card popular_card bg-white mb-4 border">
                                <img src="{{ @$post->image->url }}" class="card-img-top" alt="{{ @$post->title }}">
                                <div class="card-body py-2">
                                    <a href="{{ route('blog.show', @$post->slug) }}">
                                        <h5 class="text-dark px-3 h5 dev-post-title">{{ Str::limit(@$post->title, 60) }}</h5>
                                    </a>
                                    <div class="d-flex justify-content-between align-items-center px-3">
{{--                                        <small class="mb-0 text-dark font-italic">--}}
{{--                                            <i class="fa fa-calendar-alt"></i>--}}
{{--                                            {{ \Carbon\Carbon::parse(@$post->created_at)->isoFormat('MMM Do Y')  }}--}}
{{--                                        </small>--}}
                                        <a href="{{ route('blog.show', @$post->slug) }}" class="badge small_read_more">
                                            <small>Read More & File Download</small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-lg-4 col-md-6">
                        @foreach(@$first_featured_post_2 as $post)
                            <div class="card popular_card bg-white mb-4 border">
                                <img src="{{ @$post->image->url }}" class="card-img-top" alt="{{ @$post->title }}">
                                <div class="card-body py-2">
                                    <a href="{{ route('blog.show', @$post->slug) }}">
                                        <h5 class="text-dark px-3 h5 dev-post-title">{{ Str::limit(@$post->title, 60) }}</h5>
                                    </a>
                                    <div class="d-flex justify-content-between align-items-center px-3">
{{--                                        <small class="mb-0 text-dark font-italic">--}}
{{--                                            <i class="fa fa-calendar-alt"></i>--}}
{{--                                            {{ \Carbon\Carbon::parse(@$post->created_at)->isoFormat('MMM Do Y')  }}--}}
{{--                                        </small>--}}
                                        <a href="{{ route('blog.show', @$post->slug) }}" class="badge small_read_more">
                                            <small>Read More & File Download</small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!--End featured sections-->
            @endif

            <div class="row mt-5">

                <div class="col-lg-8">
                    <h3 style="text-transform: capitalize;">{{ @$wise_name ?? 'Latest ' }}</h3>
                    <hr>
                    @if(count(@$popular_posts) > 0)
                        <div class="row">
                            @foreach(@$latestBlogs as $post)
                                <div class="col-md-6 mb-4">
                                    <div class="card border bg-white h-100 blog_card_position">
                                        <img
                                            loading="lazy"
                                            src="{{ @$post->image->url }}"
                                            class="card-img-top" alt="{{ @$post->title }}">
                                        <div class="card-body">
                                            <a href="{{ route('blog.show', @$post->slug) }}">
                                                <h4 class="h4 px-3 pt-3 text-dark">{{ Str::limit(@$post->title, 60) }}</h4>
                                            </a>
                                            <div class="py-0 px-3">
                                                <p class="card-text text-dark mb-3 dev-post-description">
                                                    {!! substr(strip_tags(@$post->short_description), 0, 200) !!}
                                                    @if(strlen(strip_tags(@$post->short_description)) > 200)
                                                        ....
                                                    @endif
                                                </p>
                                                <div class="d-flex mb-3 justify-content-between align-items-center">
{{--                                                    <p class="mb-0 text-dark font-italic align-self-end dev-post-time">--}}
{{--                                                        <i class="fa fa-calendar-alt"></i>--}}
{{--                                                        {{ \Carbon\Carbon::parse(@$post->created_at)->isoFormat('MMM Do Y')  }}--}}
{{--                                                    </p>--}}
                                                    <a href="{{ route('blog.show', @$post->slug) }}"
                                                       class=" btn medium_read_more small_read_more btn-sm">
                                                        <small>Read More & File Download</small>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{ @$latestBlogs->links() }}
                    @else
                        <p class="text-danger text-center">There are no post</p>
                    @endif
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <h3>
                        @if(@$siteTitles->b_title_6)
                            {!! @$siteTitles->b_title_6 !!}
                        @else
                            Popular List
                        @endif
                    </h3>
                    <hr>
                    @if(count(@$popular_posts) > 0)
                        @foreach(@$popular_posts as $post)
                            <div class="card popular_card bg-white mb-4 border">
                                <img src="{{ @$post->image->url }}" class="card-img-top" alt="{{ @$post->title }}">
                                <div class="card-body py-2">
                                    <a href="{{ route('blog.show', @$post->slug) }}">
                                        <h5 class="text-dark px-3 h5 dev-post-title">{{ Str::limit(@$post->title, 60) }}</h5>
                                    </a>
                                    <div class="d-flex justify-content-between align-items-center px-3">
{{--                                        <small class="mb-0 text-dark font-italic">--}}
{{--                                            <i class="fa fa-calendar-alt"></i>--}}
{{--                                            {{ \Carbon\Carbon::parse(@$post->created_at)->isoFormat('MMM Do Y')  }}--}}
{{--                                        </small>--}}
                                        <a href="{{ route('blog.show', @$post->slug) }}" class="badge small_read_more">
                                            <small>Read More & File Download</small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-danger text-center">There are no popular post</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $(".card, .hoverEffect").hover(
                function () {
                    $(this).addClass('shadow-sm');
                }, function () {
                    $(this).removeClass('shadow-sm');
                }
            );
        });
    </script>
@endpush
