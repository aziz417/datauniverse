@extends('layouts.app')
@section('title', 'devops')
@section('meta_keywords', 'devops, development,software')
@section('meta_description', 'DevOps is a software development strategy which bridges the gap between the developers and the IT staff')

@section('content')


{{--    <img src="https://www.logigear.com/blog/wp-content/uploads/DevOps-1024x768px.gif">--}}

<section class="contactus pb-0">
    <div class="container">
        <div class="text-center">
            <img loading="lazy" src="https://www.logigear.com/blog/wp-content/uploads/DevOps-1024x768px.gif">
        </div>
        <div>
            {!! @$technology->description !!}
        </div>
    </div>
</section>



    {{--    <div style="height: 400px!important; margin-top: 10px"></div>--}}




@endsection
