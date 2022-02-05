<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <meta charset="utf-8">
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
    @yield('css')
</head>

<body class="main-body leftmenu">

<!-- Loader -->
<div id="global-loader">
    <img src="{{asset('CDN/admin/assets/img/loader.svg')}}" class="loader-img" alt="بارگذاری">
</div>
<!-- End Loader -->

<!-- Page -->
@yield('content')
<!-- End Page -->

<!-- Jquery js-->
<script src="{{asset('CDN/admin/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('CDN/admin/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('CDN/admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Select2 js-->
<script src="{{asset('CDN/admin/assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Custom js -->
<script src="{{asset('CDN/admin/assets/js/custom.js')}}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var elements = document.getElementsByTagName("INPUT");
        for (var i = 0; i < elements.length; i++) {
            elements[i].oninvalid = function (e) {
                e.target.setCustomValidity("");
                if (!e.target.validity.valid) {
                    e.target.setCustomValidity("وارد کردن این مقادیر الزامی است");
                }
            };
            elements[i].oninput = function (e) {
                e.target.setCustomValidity("");
            };
        }
    })
</script>
@yield('javaScript')
</body>
</html>
