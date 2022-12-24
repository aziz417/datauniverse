<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!-- Title -->
    <title>@yield('title', config('app.name'))</title>
    <meta name="keywords" content="@yield('meta_keywords','')"/>
    <meta name="description" content="@yield('meta_description','')"/>
    <link rel="canonical" href="{{url()->current()}}"/>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('favicon/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <meta property="og:title"
          content="A Top-Tier Software Development Company in the world | {{ config('app.name') }}"/>
    <meta property="og:description"
          content="{{ config('app.name')  }} is a full-service software development company of engineers, designers, and developers. Mobile app development, UX design and custom software solutions in Bangladesh."/>
    <meta property="og:image" content="{{ asset('logo/devxhub-logo.png') }}"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="630"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:url" content="{{ config('app.url') }}"/>
    <meta property="og:site_name" content="{{ config('app.name') }}"/>
    <meta property="og:type" content="website">
    <meta name="twitter:title"
          content="A Top-Tier Software Development Company in the world | {{ config('app.name') }}"/>
    <meta name="twitter:description"
          content="{{ config('app.name')  }} is a full-service software development company of engineers, designers, and developers. Mobile app development, UX design and custom software solutions in Bangladesh."/>
    <meta name="twitter:image" content="{{ asset('logo/devxhub-logo.png') }}"/>
    <meta name="twitter:url" content="https://twitter.com/devxhub_com">
    <meta name="twitter:domain" content="{{ config('app.name') }}"/>
    <meta name="twitter:card" content="summary"/>

    <meta name="google-site-verification" content="3DGY2e730MdmE-coCgqnXJ-sJtzJHxanEJ-N4ox8Rq8"/>
    <!--https://search.google.com/-->
    <!--https://search.google.com/-->
    <meta name="yandex-verification" content="9522f6c2ba6d3e02"/> <!--https://webmaster.yandex.com/-->
    <meta name="msvalidate.01" content="79B80489C2CA270196BD43FBE58BC710"/> <!--bing.com/webmasters-->

    <!-- All CSS -->
@include('includes.all-css')

<!-- style -->
    @stack('style')
</head>

<body data-new-gr-c-s-check-loaded="14.1088.0" data-gr-ext-installed="">
<!--  Header Area Start -->
@include('includes.header')
<!-- Header Area End -->

<!-- page content -->
@yield('content')

<!--  Footer Area Start -->
@include('includes.footer')
<!-- Footer Area End -->

<!-- all js -->
@include('includes.all-js')

<!-- script -->
@stack('script')


<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "106014354867607");
    chatbox.setAttribute("attribution", "biz_inbox");
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v10.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));


</script>

</body>

</html>
