@extends('layouts.app')

@section('title', 'Clients of '.config('app.name'))
@section('meta_keywords', 'dexhub-clients, client')
<style>
/*    body{
        box-sizing: border-box;
    }*/

    .background{
        position: relative;
        z-index: 2;
        background-color: transparent;
        background: url('http://sfwallpaper.com/images/backgrounds-for-logos-4.jpg') fixed no-repeat;
        background-size: cover;
        margin-top: 40px!important;
        padding-top: 30px!important;
        padding-bottom: 1px!important;
        -o-border-image: linear-gradient(to bottom right,rgba(255, 255, 255, 0.75) 0%,rgba(245, 245, 245, 0.75) 0%,rgba(245, 245, 245, 0.75) 16.6%,rgb(245, 245, 245) 37.8%,rgb(245, 245, 245) 48.8%,rgb(254, 254, 254) 53.1%,rgba(245, 245, 245, 0.75) 79.4%,rgba(245, 245, 245, 0.75) 84.3%) !important;
        border-image: -webkit-gradient(linear,left top, right bottom,from(rgba(255, 255, 255, 0.75)),color-stop(0%, rgba(245, 245, 245, 0.75)),color-stop(16.6%, rgba(245, 245, 245, 0.75)),color-stop(37.8%, rgb(245, 245, 245)),color-stop(48.8%, rgb(245, 245, 245)),color-stop(53.1%, rgb(254, 254, 254)),color-stop(79.4%, rgba(245, 245, 245, 0.75)),color-stop(84.3%, rgba(245, 245, 245, 0.75))) !important;
        border-image: linear-gradient(to bottom right,rgba(255, 255, 255, 0.75) 0%,rgba(245, 245, 245, 0.75) 0%,rgba(245, 245, 245, 0.75) 16.6%,rgb(245, 245, 245) 37.8%,rgb(245, 245, 245) 48.8%,rgb(254, 254, 254) 53.1%,rgba(245, 245, 245, 0.75) 79.4%,rgba(245, 245, 245, 0.75) 84.3%) !important;
        border-image-slice: 1 !important;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .all-card{
        padding: 0px;
        width: 100%;
        height: auto;
        margin-top: 70px;
        margin-bottom: 70px;
        display: flex;
        flex-flow: wrap row;
        justify-content: center;
        align-items: center;
        background-color: transparent;
        border: 20px solid transparent;
        -o-border-image: linear-gradient(to bottom right,rgba(255, 255, 255, 0.75) 0%,rgba(245, 245, 245, 0.75) 0%,rgba(245, 245, 245, 0.75) 16.6%,rgb(245, 245, 245) 37.8%,rgb(245, 245, 245) 48.8%,rgb(254, 254, 254) 53.1%,rgba(245, 245, 245, 0.75) 79.4%,rgba(245, 245, 245, 0.75) 84.3%) !important;
        border-image: -webkit-gradient(linear,left top, right bottom,from(rgba(255, 255, 255, 0.75)),color-stop(0%, rgba(245, 245, 245, 0.75)),color-stop(16.6%, rgba(245, 245, 245, 0.75)),color-stop(37.8%, rgb(245, 245, 245)),color-stop(48.8%, rgb(245, 245, 245)),color-stop(53.1%, rgb(254, 254, 254)),color-stop(79.4%, rgba(245, 245, 245, 0.75)),color-stop(84.3%, rgba(245, 245, 245, 0.75))) !important;
        border-image: linear-gradient(to bottom right,rgba(255, 255, 255, 0.75) 0%,rgba(245, 245, 245, 0.75) 0%,rgba(245, 245, 245, 0.75) 16.6%,rgb(245, 245, 245) 37.8%,rgb(245, 245, 245) 48.8%,rgb(254, 254, 254) 53.1%,rgba(245, 245, 245, 0.75) 79.4%,rgba(245, 245, 245, 0.75) 84.3%) !important;
        border-image-slice: 1 !important;
        -webkit-transition: all 0.6s ease;
        transition: all 0.6s ease;
        -webkit-animation: blockAppear .6s ease-in-out;
        animation: blockAppear .6s ease-in-out;
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
    }

    .overlay{
        height: 400px;
        width: 366px;
        /*    background-color: aqua;*/


    }
    .overlay:nth-last-child(-n+3){
        margin-bottom: 30px!important;
    }
    .card{
        height: 100%;
        width: 100%;
        background-color: transparent;
        border: 20px solid transparent !important;
        -o-border-image: linear-gradient(to bottom right,rgba(255, 255, 255, 0.75) 0%,rgba(245, 245, 245, 0.75) 0%,rgba(245, 245, 245, 0.75) 16.6%,rgba(245, 245, 245, 0.75) 79.4%,rgba(245, 245, 245, 0.75) 84.3%) !important;
        border-image: -webkit-gradient(linear,left top, right bottom,from(rgba(255, 255, 255, 0.75)),color-stop(0%, rgba(245, 245, 245, 0.75)),color-stop(16.6%, rgba(245, 245, 245, 0.75)),color-stop(79.4%, rgba(245, 245, 245, 0.75)),color-stop(84.3%, rgba(245, 245, 245, 0.75))) !important;
        border-image: linear-gradient(to bottom right,rgba(255, 255, 255, 0.75) 0%,rgba(245, 245, 245, 0.75) 0%,rgba(245, 245, 245, 0.75) 16.6%,rgba(245, 245, 245, 0.75) 79.4%,rgba(245, 245, 245, 0.75) 84.3%) !important;
        border-image-slice: 1 !important;
        -webkit-transition: -webkit-transform 0.6s ease;
        transition: -webkit-transform 0.6s ease;
        transition: transform 0.6s ease;
        transition: transform 0.6s ease, -webkit-transform 0.6s ease;
        -webkit-animation: blockAppear .6s ease-in-out;
        animation: blockAppear .6s ease-in-out;
        -webkit-animation-duration: 1.5s;
        animation-duration: 1.5s;
    }

    @-webkit-keyframes blockAppear {
        0% {
            opacity: 0;
            -webkit-transform: translateY(20px) ;
            transform: translateY(20px) ;
        }
    ready.css:1
    40% {
        opacity: 0;
        -webkit-transform: translateY(20px);
        transform: translateY(20px);
        -webkit-box-shadow: 0 10px 35px rgba(0,0,0,.15), 0 1px 0 rgba(0,0,0,.15);
        box-shadow: 0 10px 35px rgba(0,0,0,.15), 0 1px 0 rgba(0,0,0,.15);
    }
    ready.css:1
    80% {
        opacity: 1;
        -webkit-transform: translateY(-5px);
        transform: translateY(-5px);
    }
    ready.css:1
    100% {
        opacity: 1;
        -webkit-transform: translateY(0);
        transform: translateY(0);
        -webkit-box-shadow: none;
        box-shadow: none;
    }
    }

    @keyframes blockAppear {
        0% {
            opacity: 0;
            -webkit-transform: translateY(20px) ;
            transform: translateY(20px) ;
        }
    ready.css:1
    40% {
        opacity: 0;
        -webkit-transform: translateY(20px);
        transform: translateY(20px);
        -webkit-box-shadow: 0 10px 35px rgba(0,0,0,.15), 0 1px 0 rgba(0,0,0,.15);
        box-shadow: 0 10px 35px rgba(0,0,0,.15), 0 1px 0 rgba(0,0,0,.15);
    }
    ready.css:1
    80% {
        opacity: 1;
        -webkit-transform: translateY(-5px);
        transform: translateY(-5px);
    }
    ready.css:1
    100% {
        opacity: 1;
        -webkit-transform: translateY(0);
        transform: translateY(0);
        -webkit-box-shadow: none;
        box-shadow: none;
    }
    }

    .overlay:hover .card{
        z-index: 999;
        /*    height: 600px;*/
        width: 100%!important;
        border: none !important;
        border-right: 60px solid transparent !important;
        border-bottom: 20px solid transparent !important;
        margin-right: -20px;
        -webkit-transform:  translate(-30px, -50px);
        transform:  translate(-30px, -50px);
    }

    .card:before{
        -webkit-box-shadow: none;
        box-shadow: none;
        display: block;
        content: '';
        position: absolute;
        /*  width: 100%;*/
        /*  max-width: 400px;*/
        height: 100%;
        -webkit-transition: -webkit-box-shadow 0.6s ease;
        transition: -webkit-box-shadow 0.6s ease;
        transition: box-shadow 0.6s ease;
        transition: box-shadow 0.6s ease, -webkit-box-shadow 0.6s ease;
    }

    .overlay:hover:before
    {

        -webkit-box-shadow: 60px 60px 20px RGBA(142, 142, 142, .6);
        box-shadow: 60px 60px 20px RGBA(142, 142, 142, .6);
    }

    .overlay:hover .card-img-top{
        width: 117%!important;
        height: 300px;
    }

    .overlay:hover .card-block {
        width: 117%!important;
        background-image: -webkit-gradient(linear,right bottom, left top,from(rgb(72, 85, 108)),color-stop(50%, rgb(27, 33, 43)),color-stop(51%, rgb(20, 25, 34)),to(rgb(53, 59, 69)));
        background-image: linear-gradient(to top left,rgb(72, 85, 108) 0%,rgb(27, 33, 43) 50%,rgb(20, 25, 34) 51%,rgb(53, 59, 69) 100%);
    }

    .overlay:hover .card-title{
        color: white;
    }

    .overlay:hover .card-text{
        /*display: block !important;*/
        color: white;
    }

    .card-block{
        background-color: transparent;
        background-image: -webkit-gradient(linear,left top, right bottom,from(rgba(255, 255, 255, 0.75)),color-stop(0%, rgba(245, 245, 245, 0.75)),color-stop(16.6%, rgba(245, 245, 245, 0.75)),color-stop(37.8%, rgb(245, 245, 245)),color-stop(48.8%, rgb(245, 245, 245)),color-stop(53.1%, rgb(254, 254, 254)),color-stop(79.4%, rgba(245, 245, 245, 0.75)),color-stop(84.3%, rgba(245, 245, 245, 0.75)));
        background-image: linear-gradient(to bottom right,rgba(255, 255, 255, 0.75) 0%,rgba(245, 245, 245, 0.75) 0%,rgba(245, 245, 245, 0.75) 16.6%,rgb(245, 245, 245) 37.8%,rgb(245, 245, 245) 48.8%,rgb(254, 254, 254) 53.1%,rgba(245, 245, 245, 0.75) 79.4%,rgba(245, 245, 245, 0.75) 84.3%);
        background-repeat: no-repeat;
        padding: 20px;
    }

    .card-text {
        display: none;
    }

    .card-img-top{
        width: 100%;
        height: 210px;
        background-color: #fff;
        -webkit-transition: height 0.8s ease;
        transition: height 0.8s ease;
        background-repeat: no-repeat;
        background-size: cover;
    }



    a{
        text-decoration: none;
        color: inherit;
        cursor: pointer;
        opacity: 0.95;
    }

    a:hover{
        opacity: 1;
        color: black;
    }


    @media (max-width: 768px) {
        .all-card{
            margin: 0;
        }
        .background{
            margin-top: 55px!important;
            margin-bottom: 55px!important;
        }
    }


    @media (max-width: 800px){
        /*
            .news-block{
               min-width: 380px;
            }
        */
        .overlay:hover .card{
            border-left: 20px solid transparent !important;
            margin-right: -40px;
            -webkit-transform:  translate(0, -50px);
            transform:  translate(0, -50px);
        }
        .overlay:hover:before{
            -webkit-box-shadow: 0px 60px 40px RGBA(142, 142, 142, .5);
            box-shadow: 0px 60px 40px RGBA(142, 142, 142, .5);
        }
        /*
            .card:hover .card-block{
              width: 300px;
            }
        */
    }
</style>
@section('content')

    <div class="background">
        <div class="container all-card">
            @if(@$clients->count() > 0)
                @foreach($clients as $client)
                <div class="overlay mt-4">
                    <div class="card">
                        <div class="card-img-top" style="background-image: url({{ @$client->image()->where('type','image')->first()->url }})"></div>
                        <div class="card-block" >
                            <h5 class="card-title" style="font-family: 'Anton', sans-serif">{{ @$client->title }}<hr></h5>
                            <div class="card-text">{!! @$client->description !!}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p class="text-center">Client not found</p>
            @endif
        </div>
    </div>
@endsection

@push('script')
    <script name="toggle-grid" type="text/javascript">
        var main = function () {
            var temp;

            $('.overlay').on('mouseenter', function() {
                $(this).find('.card-text').slideDown(300);
            });

            $('.overlay').on('mouseleave', function(event) {
                $(this).find('.card-text').css({
                    'display': 'none'
                });
            });
//
//    $('.card').on('mouseleave', function() {
//         $(this).find('.bottom').slideUp(function(){
//             $('.card').removeClass("active");
//         });
//    }
//
//    $('.card').on('mouseenter', function() {
//        $(this).find('.bottom').stop().slideDown();
//        $('.card').addClass("active");
//    }
        };

        $(document).ready(main);
    </script>
@endpush
