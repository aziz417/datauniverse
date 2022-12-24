@extends('layouts.app')
@section('title', 'Full Stack Web Developer')
@section('meta_keywords', 'Stack, development,software, Developer, full, what is full stack developer')
@section('meta_description', 'A full stack web developer is a person who can develop both client and server software.')
@push("style")
    <style>
        .backgrounGif{
            background: url("https://www.esoftech.com/wp-content/uploads/2020/09/how-machine-learning-has-helped-web-development-evolve-image-800x450-2.gif");
            opacity: 0.4;
            background-repeat: no-repeat;
            width: 100%!important;
        }
    </style>
    <style>
        .cussection{
            height:100%;
            width:100%;
            position:absolute ;
            /*background:radial-gradient(#333,#000);*/
        }
        .leaf{
            position:absolute ;
            width:100%;
            height:100%;
            top:0;
            left:0;
        }
        .leaf div{
            position:absolute ;
            display:block ;
        }
        .leaf div:nth-child(1){
            left:20%;
            animation:fall 15s linear infinite ;
            animation-delay:-2s;
        }
        .leaf div:nth-child(2){
            left:70%;
            animation:fall 15s linear infinite ;
            animation-delay:-4s;
        }
        .leaf div:nth-child(3){
            left:10%;
            animation:fall 20s linear infinite ;
            animation-delay:-7s;
        }
        .leaf div:nth-child(4){
            left:50%;
            animation:fall 18s linear infinite ;
            animation-delay:-5s;
        }
        .leaf div:nth-child(5){
            left:85%;
            animation:fall 14s linear infinite ;
            animation-delay:-5s;
        }
        .leaf div:nth-child(6){
            left:15%;
            animation:fall 16s linear infinite ;
            animation-delay:-10s;
        }
        .leaf div:nth-child(7){
            left:90%;
            animation:fall 15s linear infinite ;
            animation-delay:-4s;
        }
        @keyframes fall{
            0%{
                opacity:1;
                top:-10%;
                transform:translateX (20px) rotate(0deg);
            }
            20%{
                opacity:0.8;
                transform:translateX (-20px) rotate(45deg);
            }
            40%{
                transform:translateX (-20px) rotate(90deg);
            }
            60%{
                transform:translateX (-20px) rotate(135deg);
            }
            80%{
                transform:translateX (-20px) rotate(180deg);
            }
            100%{
                top:110%;
                transform:translateX (-20px) rotate(225deg);
            }
        }
        .leaf1{
            transform: rotateX(180deg);
        }
        h2{
            position:absolute ;
            top:40%;
            width:100%;
            font-family: 'Courgette', cursive;
            font-size:4em;
            text-align:center;
            transform:translate ;
            color:#fff;
            transform:translateY (-50%);
        }
    </style>
@endpush
@section('content')

    <section class="service pt-0">
        <div class="cussection">
            <div class="leaf">
                <div>  <img loading="lazy" src="{{ @$technology->image->url }}" height="75px" width="75px"></img></div>
                <div>  <img loading="lazy" src="{{ @$technology->image->url }}" height="75px" width="75px"></img></div>
                <div>  <img loading="lazy" src="{{ @$technology->image->url }}" height="75px" width="75px"></img></div>
            </div>
            <div class="leaf leaf1">
                <div>  <img loading="lazy" src="{{ @$technology->image->url }}" height="75px" width="75px"></img></div>
                <div>  <img loading="lazy" src="{{ @$technology->image->url }}" height="75px" width="75px"></img></div>
                <div>  <img loading="lazy" src="{{ @$technology->image->url }}" height="75px" width="75px"></img></div>
                <div>  <img loading="lazy" src="{{ @$technology->image->url }}" height="75px" width="75px"></img></div>
            </div>
            <div class="leaf leaf2">
                <div>  <img loading="lazy" src="{{ @$technology->image->url }}" height="75px" width="75px"></img></div>
                <div>  <img loading="lazy" src="{{ @$technology->image->url }}" height="75px" width="75px"></img></div>
                <div>  <img loading="lazy" src="{{ @$technology->image->url }}" height="75px" width="75px"></img></div>
                <div>  <img loading="lazy" src="{{ @$technology->image->url }}" height="75px" width="75px"></img></div>
            </div>
            <div class="leaf leaf3">
                <div>  <img loading="lazy" src="{{ @$technology->image->url }}" height="75px" width="75px"></img></div>
                <div>  <img loading="lazy" src="{{ @$technology->image->url }}" height="75px" width="75px"></img></div>
                <div>  <img loading="lazy" src="{{ @$technology->image->url }}" height="75px" width="75px"></img></div>
                <div>  <img loading="lazy" src="{{ @$technology->image->url }}" height="75px" width="75px"></img></div>
            </div>
        </div>
        <div class="container">
            <div class="title-light text-center pt-5 pb-0">
                <h1> {{ @$technology->title }}</h1>
            </div>
            <div class="row pt-3">
                <div class="col-lg-7">
                    <div class="wow pixFadeRight">
                        <img loading="lazy" src="https://www.aalpha.net/wp-content/uploads/2020/12/full-stack-development.gif" alt="full-stack-development" width="100%" height="400">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="service-content p-0">
                        <h5><strong>1. </strong> Brainstorming and planning</h5>
                        <h5><strong>2. </strong> Requirements and feasibility analysis</h5>
                        <h5><strong>3. </strong> Design</h5>
                        <h5><strong>4. </strong> Development & coding</h5>
                        <h5><strong>5. </strong> Integration and testing</h5>
                        <h5><strong>6. </strong> Implementation and deployment</h5>
                        <h5><strong>7. </strong> Operations and maintenance</h5>
                        <h5>And finally</h5>
                    </div>
                </div>
            </div>
            <div class="row pt-5 justify-content-between">
                <div class="col-md-10 col-12">
                    <div>
                        {!! @$technology->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection