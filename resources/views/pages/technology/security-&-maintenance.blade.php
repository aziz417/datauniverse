@extends('layouts.app')


@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/skillAndTechnology/devOps/css/normalize.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/skillAndTechnology/devOps/css/demo.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/skillAndTechnology/devOps/css/component.css')}}" />
    <div class="demo-4">
        <div id="container" class="intro-effect-side">
            <!-- Top Navigation -->
            <header class="header">
                <div class="bg-img"><img loading="lazy" src="https://www.tetratech.com/en/images/why-cybersecurity-risks-should-be-on-the-sustainabi-is19-035-960.jpg" alt="why-cyber security-risks-should-be-on-the-sustainable" /></div>
                <div class="title">
                    <h1>
                        Monthly Security & Maintenance Plans
                    </h1>
                </div>
            </header>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <p>{!! @$technology->description !!}</p>
            </div>
        </div>
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


        // disable/enable scroll (mousewheel and keys) from http://stackoverflow.com/a/4770179
        // left: 37, up: 38, right: 39, down: 40,
        // spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
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
