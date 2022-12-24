@extends('layouts.app')

@section('title', 'Technology Details')
@section('meta_keywords', 'Terms of Use choose us')
@section('meta_description', 'we can make professional level 3d animation')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/skillAndTechnology/3d_animation/css/normalize.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/skillAndTechnology/3d_animation/css/demo.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/skillAndTechnology/3d_animation/css/component.css')}}" />
    <style>
        .demo-1 .large-header {
            background-image: url('https://64.media.tumblr.com/62799deb11fc4c9113011d4f171ec890/tumblr_pdqcc80GVj1uruo10o1_500.gifv');
        }
    </style>
    <div class="demo-1">
        <div id="large-header" class="large-header">
            <canvas id="demo-canvas"></canvas>
            <h1 class="main-title"><span class="thin">{{ @$technology->title }}</span></h1>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <p>{!! @$technology->description !!}</p>
            </div>
        </div>

    </div>


<script src="{{ asset('frontend/skillAndTechnology/3d_animation/js/TweenLite.min.js')}}"></script>
<script src="{{ asset('frontend/skillAndTechnology/3d_animation/js/EasePack.min.js')}}"></script>
<script src="{{ asset('frontend/skillAndTechnology/3d_animation/js/rAF.js')}}"></script>
<script src="{{ asset('frontend/skillAndTechnology/3d_animation/js/demo-1.js')}}"></script>
@endsection
