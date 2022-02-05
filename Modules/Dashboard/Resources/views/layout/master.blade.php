<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
@yield('meta')
<!-- Favicon -->
    <link rel="icon" href="{{asset('CDN/admin/assets/img/logo/favicon.ico')}}" type="image/x-icon"/>
    <!-- Title -->
@yield('title')
<!-- Bootstrap css-->
    <link href="{{asset('CDN/admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <!-- Icons css-->
    <link href="{{asset('CDN/admin/assets/plugins/web-fonts/icons.css')}}" rel="stylesheet"/>
    <link href="{{asset('CDN/admin/assets/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('CDN/admin/assets/plugins/web-fonts/plugin.css')}}" rel="stylesheet"/>
    <!-- Style css-->
    <link href="{{asset('CDN/admin/assets/css-rtl/style/style.css')}}" rel="stylesheet">
    <link href="{{asset('CDN/admin/assets/css-rtl/skins.css')}}" rel="stylesheet">
    <link href="{{asset('CDN/admin/assets/css-rtl/dark-style.css')}}" rel="stylesheet">
    <link href="{{asset('CDN/admin/assets/css-rtl/colors/default.css')}}" rel="stylesheet">

    <!-- Color css-->
    <link id="theme" rel="stylesheet" type="text/css" media="all"
          href="{{asset('CDN/admin/assets/css-rtl/colors/color.css')}}">

    <!-- Sidemenu css-->
    <link href="{{asset('CDN/admin/assets/css-rtl/sidemenu/sidemenu.css')}}" rel="stylesheet">

    @yield('css')
</head>

<body class="main-body leftmenu">

<!-- Loader -->
<div id="global-loader">
    <img src="{{asset('CDN/admin/assets/img/loader.svg')}}" class="loader-img" alt="بارگذاری">
</div>
<!-- End Loader -->

<!-- Page -->
<div class="page">

    <!-- Sidemenu -->
@include('dashboard::layout.sidebar')
<!-- End Sidemenu -->

    <!-- Main Header-->
@include('dashboard::layout.header')
<!-- End Main Header-->

    <!-- Mobile-header -->
@include('dashboard::layout.header-mobile')
<!-- Mobile-header closed -->
    <!-- Main Content-->
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <!-- Page Header -->
            @include('dashboard::layout.breadcrumb')
            <!-- End Page Header -->
                @yield('content')
            </div>
        </div>
    </div>
    <!-- End Main Content-->

    <!-- Main Footer-->
@include('dashboard::layout.footer')
<!--End Footer-->

</div>
<!-- End Page -->

<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

<!-- Jquery js-->
<script src="{{asset('CDN/admin/assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('CDN/admin/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('CDN/admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Perfect-scrollbar js -->
<script src="{{asset('CDN/admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js')}}"></script>

<!-- Sidemenu js -->
<script src="{{asset('CDN/admin/assets/plugins/sidemenu/sidemenu-rtl.js')}}"></script>

<!-- Sidebar js -->
<script src="{{asset('CDN/admin/assets/plugins/sidebar/sidebar-rtl.js')}}"></script>

<!-- Sticky js -->
<script src="{{asset('CDN/admin/assets/js/sticky.js')}}"></script>

<!-- Custom js -->
<script src="{{asset('CDN/admin/assets/js/custom.js')}}"></script>

@yield('javaScript')
</body>
</html>
