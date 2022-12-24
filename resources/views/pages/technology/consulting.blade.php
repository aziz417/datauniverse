@extends('layouts.app')
@section('title', 'Technology Details')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/skillAndTechnology/3d_animation/css/normalize.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/skillAndTechnology/3d_animation/css/demo.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/skillAndTechnology/3d_animation/css/component.css')}}" />
    <h1>fd</h1>
    <style>
        .demo-2 .large-header {
            background-image: url('https://images.squarespace-cdn.com/content/v1/51db07d9e4b0664104405cda/1558369821406-Z3ZXXNY3VN06DFJ2JHB9/ke17ZwdGBToddI8pDm48kB6N0s8PWtX2k_eW8krg04V7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UWjr1U28ZISEM8rMSWEVoVBPazTdHfiEOJ72GfvPijNc3WUfc_ZsVm9Mi1E6FasEnQ/4A.gif?format=2500w');
            background-position: center bottom;
        }
    </style>
    <div class="demo-2">
        <div id="large-header" class="large-header">
            <canvas id="demo-canvas"></canvas>
            <h1 class="main-title"><span class="thin">{{ @$technology->title }}</span></h1>
        </div>
    </div>
    <div class="container">
        <p>{!! @$technology->description !!}</p>
    </div>

    <script src="{{ asset('frontend/skillAndTechnology/3d_animation/js/rAF.js')}}"></script>
    <script src="{{ asset('frontend/skillAndTechnology/3d_animation/js/demo-2.js')}}"></script>
@endsection
