@extends('layouts.app')
@section('title', 'Technology Details')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/skillAndTechnology/devOps/css/normalize.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/skillAndTechnology/devOps/css/demo.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/skillAndTechnology/devOps/css/component.css')}}" />
    <style>
        button.trigger::before {
            position: absolute;
            bottom: 100%;
            left: -100%;
            padding: 0.8em;
            width: 300%;
            color: #000000!important;
            content: attr(data-info);
            font-size: 0.35em;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        @media screen and (max-width: 770px) {
            .intro-effect-jam3 .bg-img {
                top: -45px;
                right: -30px;
                bottom: -45px;
                left: -30px;
                background: #514753;
                width: 109%;
            }
        }

    </style>
    <div class="demo-7">
        <div id="container" class="intro-effect-jam3">
            <!-- Top Navigation -->
            <header class="header">
                <div  class="bg-img"><img loading="lazy" src="https://vsource-software.com/img/Slide/web-application.jpg" alt="web-application"/></div>
            </header>
            <button class="trigger scroll_custom_hide" data-info="Click here other details"><i style="color: black" class="fa fa-arrow-down"></i></button>

            <article class="content scrollD">
                <div>
                    {!! @$technology->description !!}
                </div>
            </article>
        </div>
    </div>

    <script src="{{ asset('frontend/skillAndTechnology/devOps/js/classie.js') }}"></script>
    <script>
        (function() {
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

                if( scrollVal > 10 ){
                    $(".scroll_custom_hide").hide()
                    return false;
                }else{
                    $(".scroll_custom_hide").show()
                }

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
                }, 600 );
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
