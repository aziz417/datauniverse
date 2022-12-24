<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name')) | {{ config('app.name', 'DevXHub') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    @include('admin.includes.all-css')
</head>
<body class="sidebar-mini layout-fixed text-sm dark-mode accent-navy">
<div class="wrapper">

    <!-- Navbar -->
    @include('admin.includes.header')
    <!-- /.navbar -->

    @include('admin.includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

    @include('admin.includes.footer')
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admin.includes.all-js')
</body>
</html>


{{--<!DOCTYPE html>--}}
{{--<html>--}}

{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}

{{--    <title>@yield('title', config('app.name')) | {{ config('app.name', 'Polo Store Dashboard') }}</title>--}}

{{--    --}}{{-- all-css --}}
{{--    @include('admin.includes.all-css')--}}


{{--</head>--}}

{{--<body class="fixed-sidebar">--}}

{{--<div id="wrapper">--}}

{{--    --}}{{-- sidebar --}}
{{--    @include('admin.includes.sidebar')--}}

{{--    <div id="page-wrapper" class="gray-bg">--}}

{{--        <div class="row border-bottom">--}}
{{--            @include('admin.includes.header')--}}
{{--        </div>--}}

{{--        <div class="wrapper wrapper-content">--}}
{{--            @yield('content')--}}
{{--        </div>--}}

{{--        @include('admin.includes.footer')--}}

{{--    </div>--}}
{{--</div>--}}

{{--    all-js    --}}
{{--@include('admin.includes.all-js')--}}


{{--</body>--}}
{{--</html>--}}
