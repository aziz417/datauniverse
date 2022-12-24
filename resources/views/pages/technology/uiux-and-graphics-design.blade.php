@extends('layouts.app')

@section('title', ' Ui Ux and graphics designer')
@section('meta_keywords', ' graphics, Ux, designer, Ui ,Plans, development,software, Developer, full, what is full stack developer')
@section('meta_description', 'We created our website security & maintenance plan to protect our clients sites from getting hacked.')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/skillAndTechnology/devOps/css/normalize.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/skillAndTechnology/devOps/css/demo.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/skillAndTechnology/devOps/css/component.css')}}" />
    <h2>g</h2>
    <style>

            .intro-effect-grid .grid li:first-child {
                top: 0;
                left: 0;
                height: 50%;
                width: 25%;
                background-image: url(http://itsnotacareer.files.wordpress.com/2017/10/32b535e5a569e638e1182a3cc14ee9af-illustration-vector-graphic-design-illustration.jpg);
            }

            .intro-effect-grid .grid li:nth-child(2) {
                top: 50%;
                left: 0;
                height: 50%;
                width: 25%;
                background-image: url(http://wallpaperaccess.com/full/112181.jpg);
            }

            .intro-effect-grid .grid li:nth-child(3) {
                top: 0;
                left: 25%;
                height: 100%;
                width: 25%;
                background-image: url(http://wallpaperaccess.com/full/251562.jpg);
            }

            .intro-effect-grid .grid li:nth-child(4) {
                top: 0;
                left: 50%;
                height: 50%;
                width: 50%;
                background-image: url(http://blueprintdigital.com/wp-content/uploads/2015/01/GraphicDesign.jpg);
            }

            .intro-effect-grid .grid li:nth-child(5) {
                top: 50%;
                left: 50%;
                height: 50%;
                width: 25%;
                background-image: url(http://ct101.us/wp-content/uploads/2016/02/3d.png);
                -webkit-transform: scale(0);
                transform: scale(0);
                opacity: 0;
            }

            .intro-effect-grid.modify .grid li:nth-child(5) {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 1;
            }

            .intro-effect-grid .grid li:nth-child(5) h2 {
                color: #de8721;
            }

            .intro-effect-grid .grid li:nth-child(6) {
                top: 50%;
                left: 75%;
                height: 50%;
                width: 25%;
                opacity: 0.8;
                background-image: url(http://www.digitalartsonline.co.uk/cmsdata/slideshow/3598399/Graphic-Design-Tutorials-Main_1000_thumb1200_4-3.jpg);
            }

            .header {
                position: relative;
                margin: 0 auto;
                min-height: 700px;
                width: 100%;
            }


            element.style {
            }
            .intro-effect-grid.modify .title {
                -webkit-transform: translateX(-50%) translateY(0);
                transform: translateX(-50%) translateY(0);
            }
            .intro-effect-grid:not(.notrans) .grid li:nth-child(5), .intro-effect-grid:not(.notrans) .bg-img, .intro-effect-grid:not(.notrans) .title, .intro-effect-grid:not(.notrans) .header h1, .intro-effect-grid:not(.notrans) .header p, .intro-effect-grid:not(.notrans) .codrops-demos a {
                -webkit-transition-timing-function: cubic-bezier(0.7,0,0.3,1);
                transition-timing-function: cubic-bezier(0.7,0,0.3,1);
                -webkit-transition-duration: 1s;
                transition-duration: 1s;
            }
            .intro-effect-grid:not(.notrans) .bg-img, .intro-effect-grid:not(.notrans) .title {
                -webkit-transition-property: -webkit-transform;
                transition-property: transform;
            }
            .intro-effect-grid .title {
                max-width: 900px;
                padding-top: 2em;
            }
            .title {
                z-index: 1000;
                margin: 0 auto;
                padding: 0 1.25em;
                width: 100%;
                text-align: left!important;
                position: absolute;
                top: 50%;
                left: 50%;
                -webkit-transform: translateX(-50%) translateY(-50%);
                transform: translateX(-50%) translateY(-50%);
            }

            @media screen and (max-width: 770px) {
                .header {
                    min-height: 300px!important;
                }

                .bg-img img {
                    min-height: 50%!important;
                }
            }

        </style>
        <div id="container" class="intro-effect-grid">
            <header class="header">
                <ul class="grid">
                    <li><h2>Graphic Design is Emotional Design</h2></li>
                    <li><h2>Visual identity graphic design</h2></li>
                    <li><h2>Marketing & advertising graphic design</h2></li>
                    <li><h2>User interface graphic design</h2></li>
                    <li><h2>Publication graphic design</h2></li>
                    <li><h2>Packaging graphic design</h2></li>
                </ul>
                <div class="title">
                    <h4 class="text-center mb-3">{{ @$technology->title }} Types</h4>
                </div>
            </header>
            <div  class="bg-img"><img loading="lazy"  src="http://ct101.us/wp-content/uploads/2016/02/3d.png" alt="3d"/></div>

            <article class="content">
                <div>
                    {!! @$technology->description !!}
                </div>
            </article>


{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-5 col-12">--}}
{{--                        <p ><strong>#.</strong>  Visual identity graphic design</p>--}}
{{--                        <p ><strong>#.</strong>  Marketing & advertising graphic design</p>--}}
{{--                        <p ><strong>#.</strong>  User interface graphic design</p>--}}
{{--                        <p ><strong>#.</strong>  Packaging graphic design</p>--}}
{{--                        <p ><strong>#.</strong>  Motion graphic design</p>--}}
{{--                        <p ><strong>#.</strong>  Environmental graphic design</p>--}}
{{--                        <p ><strong>#.</strong>  Publication graphic design</p>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-5 col-12">--}}
{{--                        <p ><strong>#.</strong>  Packaging graphic design</p>--}}
{{--                        <p ><strong>#.</strong>  Motion graphic design</p>--}}
{{--                        <p ><strong>#.</strong>  Environmental graphic design</p>--}}
{{--                        <p ><strong>#.</strong>  Art and illustration for graphic design</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="row">--}}
{{--                    <div class="offset-1 col-md-10 col-12">--}}
{{--                        {!! @$technology->description !!}--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>


<script src="{{ asset('frontend/skillAndTechnology/devOps/js/classie.js') }}"></script>
<script>
    (function() {

        // detect if IE : from http://stackoverflow.com/a/16657946
        var ie = (function(){
            var undef,rv = -1; // Return value assumes failure.
            var ua = window.navigator.userAgent;
            var msie = ua.indexOf('MSIE ');
            var trident = ua.indexOf('Trident/');

            if (msie > 0) {
                // IE 10 or older => return version number
                rv = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
            } else if (trident > 0) {
                // IE 11 (or newer) => return version number
                var rvNum = ua.indexOf('rv:');
                rv = parseInt(ua.substring(rvNum + 3, ua.indexOf('.', rvNum)), 10);
            }

            return ((rv > -1) ? rv : undef);
        }());


        var keys = [32, 37, 38, 39, 40], wheelIter = 0;

        function preventDefault(e) {
            e = e || window.event;
            if (e.preventDefault)
                e.preventDefault();
            e.returnValue = false;
        }

        function keydown(e) {
            for (var i = keys.length; i--;) {
                if (e.keyCode === keys[i]) {
                    preventDefault(e);
                    return;
                }
            }
        }

        function touchmove(e) {
            preventDefault(e);
        }

        function wheel(e) {
            // for IE
            //if( ie ) {
            //preventDefault(e);
            //}
        }

        function disable_scroll() {
            window.onmousewheel = document.onmousewheel = wheel;
            document.onkeydown = keydown;
            document.body.ontouchmove = touchmove;
        }

        function enable_scroll() {
            window.onmousewheel = document.onmousewheel = document.onkeydown = document.body.ontouchmove = null;
        }

        var docElem = window.document.documentElement,
            scrollVal,
            isRevealed,
            noscroll,
            isAnimating,
            container = document.getElementById( 'container' ),
            trigger = container.querySelector( 'button.trigger' );

        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }

        function scrollPage() {
            scrollVal = scrollY();

            if( noscroll && !ie ) {
                if( scrollVal < 0 ) return false;
                // keep it that way
                window.scrollTo( 0, 0 );
            }

            if( classie.has( container, 'notrans' ) ) {
                classie.remove( container, 'notrans' );
                return false;
            }

            if( isAnimating ) {
                return false;
            }

            if( scrollVal <= 0 && isRevealed ) {
                toggle(0);
            }
            else if( scrollVal > 0 && !isRevealed ){
                toggle(1);
            }
        }

        function toggle( reveal ) {
            isAnimating = true;

            if( reveal ) {
                classie.add( container, 'modify' );
            }
            else {
                noscroll = true;
                disable_scroll();
                classie.remove( container, 'modify' );
            }

            // simulating the end of the transition:
            setTimeout( function() {
                isRevealed = !isRevealed;
                isAnimating = false;
                if( reveal ) {
                    noscroll = false;
                    enable_scroll();
                }
            }, 1000 );
        }

        // refreshing the page...
        var pageScroll = scrollY();
        noscroll = pageScroll === 0;

        disable_scroll();

        if( pageScroll ) {
            isRevealed = true;
            classie.add( container, 'notrans' );
            classie.add( container, 'modify' );
        }

        window.addEventListener( 'scroll', scrollPage );
        trigger.addEventListener( 'click', function() { toggle( 'reveal' ); } );
    })();
</script>
</div>
@endsection
