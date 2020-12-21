<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title', 'Default')</title>

    @if (LaravelLocalization::getCurrentLocale() === 'ar')
        <!-- RTL Files -->
{{--            <link rel="stylesheet" href="{{ asset('css/bootstrap/rtl/bootstrap.min.css') }}">--}}
    @endif

<!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @stack('links')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    <!-- Navbar -->
@include('admin.includes.navbar')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('admin.includes.sidebar')


<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    @include('admin.includes.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
{{--<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>--}}
{{--<script src="plugins/raphael/raphael.min.js"></script>--}}
{{--<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>--}}
{{--<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>--}}
<!-- ChartJS -->
{{--<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>--}}

<!-- PAGE SCRIPTS -->
<script src="{{ asset('assets/dist/js/pages/dashboard2.js') }}"></script>

@if (LaravelLocalization::getCurrentLocale() === 'ar')
    <!-- RTL Files -->
{{--    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>--}}
@endif
@stack('scripts')
</body>
</html>
