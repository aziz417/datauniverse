@extends('layouts.app')

@section('title', 'Products of '.config('app.name'))
@section('meta_keywords', 'dexhub-products, Service')
<style>

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }



    /*
    body{
        background: #f2f2f2;
    }
    */

    .bg{
        background-color: transparent;
        background: url('http://sfwallpaper.com/images/backgrounds-for-logos-4.jpg') fixed no-repeat;
        background-size: cover;
        height: auto;
        border: 15px solid transparent !important;
        -o-border-image: linear-gradient(to bottom right,rgba(255, 255, 255, 0.75) 0%,rgba(245, 245, 245, 0.75) 0%,rgba(245, 245, 245, 0.75) 16.6%,rgb(245, 245, 245) 37.8%,rgb(245, 245, 245) 48.8%,rgb(254, 254, 254) 53.1%,rgba(245, 245, 245, 0.75) 79.4%,rgba(245, 245, 245, 0.75) 84.3%) !important;
        border-image: -webkit-gradient(linear,left top, right bottom,from(rgba(255, 255, 255, 0.75)),color-stop(0%, rgba(245, 245, 245, 0.75)),color-stop(16.6%, rgba(245, 245, 245, 0.75)),color-stop(37.8%, rgb(245, 245, 245)),color-stop(48.8%, rgb(245, 245, 245)),color-stop(53.1%, rgb(254, 254, 254)),color-stop(79.4%, rgba(245, 245, 245, 0.75)),color-stop(84.3%, rgba(245, 245, 245, 0.75))) !important;
        border-image: linear-gradient(to bottom right,rgba(255, 255, 255, 0.75) 0%,rgba(245, 245, 245, 0.75) 0%,rgba(245, 245, 245, 0.75) 16.6%,rgb(245, 245, 245) 37.8%,rgb(245, 245, 245) 48.8%,rgb(254, 254, 254) 53.1%,rgba(245, 245, 245, 0.75) 79.4%,rgba(245, 245, 245, 0.75) 84.3%) !important;
        border-image-slice: 1 !important;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        margin-top: 81px!important;

    }

    .card1{
        position: relative;
        height: 400px;
        /*    width: 400px;*/
        display: block;
        background: white;
        box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.15);
        transition: 0.4s linear;
        margin: 20px 20px;
    }

    .card1:hover{
        box-shadow: 0px 1px 35px 0px rgba(0,0,0,0.3);
    }

    .card1 .image1{
        position: relative;
        width: 100%;
        background: #f2f2f2;
        height: 300px;
        overflow: hidden;
    }

    .image1 img{
        height: 250px;
        width: 250px;
        transition: 0.3s;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }

    .card1:hover .image1 img{
        opacity: 0.6;
        /*    transform: scale(1.1);*/
    }

    .card1 .content{
        position: absolute;
        bottom: 0px;
        width: 100%;
        background: white;
        text-align: center;
        padding: 20px 30px;
    }

    .content .title{
        font-size: 24px;
        font-weight: 600;
        color: #333333;
    }

    .content .sub-title{
        font-size: 18px;
        font-weight: 500;
        color: #e74c3c;
        margin-bottom: 10px
    }

    .bottom p{
        color: #666666;
        font-size: 16px;
        text-align: justify;
        line-height: 1.2;
    }

    .bottom button{
        float: left;
        padding: 7px 15px;
        font-size: 17px;
        background: #e74c3c;
        color: white;
        font-weight: 500;
        border: none;
        margin: 10px 0;
        cursor: pointer;
        transition: 0.3s ease;
    }

    .bottom button:hover{
        transform: scale(0.9);
        background: #e64533;
    }

    .bottom{
        display: none;
    }

    .product_custom_style_modal {
        top: 80px!important;
    }
    .product_custom_style_modal_dialog{
        margin-bottom: 100px!important;
    }
    .modal-content{
        border-top: 5px solid #FFC107!important;
    }

    @media (min-width: 1024px){
        .modal-dialog {
            max-width: 850px!important;
        }
    }

</style>
@section('content')

    <div class="bg">
        <div class="container">
            <div class="row">
                @if(@$products->count() > 0)
                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="card1">
                                <div class="image1">
                                    <img src="{{ @$product->image()->where('type', 'image')->first()->url }}" alt="">
                                </div>
                                <div class="content">
                                    <div class="sub-title">{{ @$product->title }}</div>
                                    <div class="bottom">
                                        <a onclick="showModal({{ $product }})" class="pix-btn submit-btn"  href="javascript:void(0)">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="mx-auto">
                        <p class="text-center">Product not found</p>
                    </div>
                @endif
                @include('pages.our-products.product-modal')
            </div>
        </div>
    </div>
@endsection
@push('script')

            <script>
                function showModal(product){
                    $("#exampleModalLongTitle").html(product['title'])
                    $(".modal-body").html(product['description'])
                    $("#exampleModalLong").modal();
                }

                var main = function () {
                    $('.card1').on('mouseleave', function() {
                        $(this).find('.bottom').stop().slideUp();
                        $(this).css({
                            'height':'400px'
                        });
                    });

                    $('.card1').on('mouseenter', function() {
                        $(this).find('.bottom').stop().slideDown();
                        $(this).css({
                            'height':'400px'
                        });
                    });
                };

        $(document).ready(main);
    </script>
@endpush
