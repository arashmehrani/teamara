<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

    <!-- Favicon -->
    <link rel="icon" href="{{asset('CDN/admin/assets/img/brand/favicon.ico')}}" type="image/x-icon"/>

    <!-- Title -->
    <title>نصب سایت ساز</title>

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

</head>

<body class="main-body leftmenu">

<!-- Loader -->
<div id="global-loader">
    <img src="{{asset('CDN/admin/assets/img/loader.svg')}}" class="loader-img" alt="لودر">
</div>
<!-- End Loader -->

<!-- Page -->
<div class="page">

    <!-- Main Content-->
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">

                <!-- Page Header -->
                <div class="row row-sm">
                    <div class="col-lg-6 col-md-6 mx-auto">
                        <div class="page-header">
                            <div class="mx-auto mt-5">
                                <h2 class="main-content-title tx-24 mg-b-5">نصب سایت ساز</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Header -->

                <!-- Row -->
                <div class="row row-sm">
                    <div class="col-lg-6 col-md-6 mx-auto">
                        <div class="card custom-card ">
                            <div class="card-body accordion-wizard">
                                @if(Request::get('step') == null)
                                    <div>
                                        <h6 class="main-content-label mb-1">نصب و پیکربندی</h6>
                                        <p class="text-muted card-sub-title mt-2">
                                            به نصب سایت ساز خوش آمدید. قبل از نصب ما به اطلاعات پایگاه‌دادهٔ شما احتیاج
                                            داریم. شما باید جهت شروع نصب موارد زیر را بدانید.
                                        </p>
                                        <ol class="text-muted">
                                            <li class="mt-2">نام پایگاه‌داده</li>
                                            <li class="mt-1">نام‌کاربری پایگاه‌داده</li>
                                            <li class="mt-1">رمز عبور پایگاه‌داده</li>
                                            <li class="mt-1">میزبان پایگاه‌داده</li>
                                        </ol>

                                        <p class="text-muted card-sub-title mt-2">
                                            موارد بالا توسط میزبان شما (هاست) ارائه می‌شوند. اگر اطلاعات بالا را ندارید
                                            بهتر
                                            از پیش
                                            از ادامهٔ کار با پشتیبان سرویس میزبانی خود تماس بگیرید.
                                        </p>
                                        <div class="pt-3">
                                            <a href="{{route('installer')}}?step=1" class="btn btn-primary float-left">شروع
                                                نصب</a>
                                        </div>

                                    </div>

                                @elseif(Request::get('step') == 1)
                                    <div>
                                        @if (Session::has('NotConnected'))
                                            <div class="alert alert-danger" role="alert">
                                                <button aria-label="Close" class="close" data-dismiss="alert"
                                                        type="button">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                {{ Session::get('NotConnected') }}
                                            </div>
                                        @endif
                                        <h6 class="main-content-label mb-1">نصب و پیکربندی</h6>
                                        <p class="text-muted card-sub-title mt-2">برای نصب سایت ساز ابتدا اطلاعات پایگاه
                                            داده (دیتابیس) را وارد کنید، اگر از این اطلاعات آگاهی ندارید با پشتیبان
                                            سرویس
                                            میزبانی خود تماس بگیرید.</p>
                                    </div>

                                    <form id="form" method="post" action="{{route('installer.check')}}">
                                        @csrf
                                        <div class="list-group">
                                            <div class="list-group-item py-4 open" data-acc-step="">
                                                <h6 class="mb-0" data-acc-title="">
                                                    <span
                                                        class="acc-step-number badge badge-light ml-1">
                                                        اتصال به پایگاه داده
                                                    </span>
                                                </h6>
                                                <div data-acc-content="" style="">
                                                    <div class="my-3">

                                                        <div class="form-group">
                                                            <label for="db_name">نام پایگاه داده:</label>
                                                            <input type="text" name="db_name" id="db_name"
                                                                   class="form-control" value="{{old('db_name')}}"
                                                                   placeholder="نام پایگاه داده">
                                                            @if ($errors->has('db_name'))
                                                                <p class="text-danger">
                                                                    <small>{{ $errors->first('db_name') }}</small>
                                                                </p>
                                                            @else
                                                                <small class="text-muted">
                                                                    نام پایگاه داده ای که در MySql سرویس میزبانی (هاست)
                                                                    خود
                                                                    ساخته اید.
                                                                </small>
                                                            @endif
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="db_username">نام کاربری:</label>
                                                            <input type="text" name="db_username" id="db_username"
                                                                   class="form-control"
                                                                   value="{{old('db_username','root')}}"
                                                                   placeholder="نام کاربری پایگاه داده">
                                                            @if ($errors->has('db_username'))
                                                                <p class="text-danger">
                                                                    <small>{{ $errors->first('db_username') }}</small>
                                                                </p>
                                                            @else
                                                                <small class="text-muted">
                                                                    نام کاربری پایگاه داده MySql شما.
                                                                </small>
                                                            @endif
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="db_password">رمزعبور :</label>
                                                            <input type="text" name="db_password" id="db_password"
                                                                   class="form-control" {{old('db_password')}}
                                                                   placeholder="رمز پایگاه داده">
                                                            @if ($errors->has('db_password'))
                                                                <p class="text-danger">
                                                                    <small>{{ $errors->first('db_password') }}</small>
                                                                </p>
                                                            @else
                                                                <small class="text-muted">
                                                                    رمزعبور پایگاه داده MySql شما.
                                                                </small>
                                                            @endif
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="db_host">میزبان پایگاه داده :</label>
                                                            <input type="text" name="db_host" id="db_host"
                                                                   class="form-control"
                                                                   value="{{old('db_host','localhost')}}"
                                                                   placeholder="میزبان پایگاه داده">
                                                            @if ($errors->has('db_host'))
                                                                <p class="text-danger">
                                                                    <small>{{ $errors->first('db_host') }}</small>
                                                                </p>
                                                            @else
                                                                <small class="text-muted">
                                                                    میزبان به صورت عمومی localhost است، درغیر این صورت
                                                                    با
                                                                    پشتیبان سرویس میزبانی خود تماس بگیرید.
                                                                </small>
                                                            @endif
                                                        </div>

                                                    </div>
                                                    <input type="submit" value="بررسی اتصال"
                                                           class="btn btn-primary float-left">
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                @elseif(Request::get('step') == 2)
                                    @if (Session::has('checked'))

                                        @if (Session::has('oldData'))
                                            <div>
                                                <h6 class="main-content-label mb-1">داده های تکراری!</h6>
                                                <p class="text-muted card-sub-title mt-2">
                                                    به نظر میرسد سایت ساز قبلا نصب شده یا جداول مشابهی در پایگاه داده به
                                                    صورت ناقص وجود
                                                    دارد. در صورتی که مایل به ادامه فرآیند نصب باشید تمامی جداول حذف شده
                                                    و
                                                    از نو ساخته خواهند شد. درصورتی که مایل به ادامه کار با اطلاعات قدیمی
                                                    هستید گزینه "انصراف" را انتخاب کنید.
                                                </p>
                                                <p class="text-muted card-sub-title mt-2">
                                                    توجه: در صورت انتخاب گزینه "نصب مجدد" تمامی داده های قدیمی حذف
                                                    خواهند
                                                    شد.
                                                </p>

                                                <form method="post" action="{{route('installer.migration')}}">
                                                    @csrf
                                                    <input type="submit" value="حذف و نصب مجدد"
                                                           class="btn btn-danger float-left ml-2">
                                                </form>

                                                <form method="post" action="{{route('installer.cancel')}}">
                                                    @csrf
                                                    <input type="submit" value="انصراف" class="btn btn-outline-light">
                                                </form>
                                            </div>
                                        @endif
                                        @if (Session::has('noData'))
                                            <div>
                                                <h6 class="main-content-label mb-1">نصب جداول پایگاه داده</h6>
                                                <p class="text-muted card-sub-title mt-2">
                                                    بسیار عالی! همه چیز برای نصب جداول پایگاه داده آماده است. برای شروع
                                                    روی
                                                    دکمه "نصب" کلیک کنید. اینکار ممکن است چند دقیقه طول بکشد، لطفا تا
                                                    پایان
                                                    عملیات این صفحه را
                                                    نبندید.
                                                </p>
                                                <form method="post" action="{{route('installer.migration')}}">
                                                    @csrf
                                                    <input type="submit" value="نصب"
                                                           class="btn btn-primary float-left">
                                                </form>
                                            </div>
                                        @endif
                                    @else
                                        <div class="text-center">
                                            <p>اتصال به پایگاه داده هنوز انجام نشده است!</p>
                                            <div class="pt-3">
                                                <a href="{{route('installer')}}" class="btn btn-primary">بازگشت به
                                                    نصب</a>
                                            </div>
                                        </div>
                                    @endif
                                @elseif(Request::get('step') == 3)


                                    @if (Session::has('checked'))

                                        @if (Session::has('migrated'))
                                            <h6 class="main-content-label mb-1">تکمیل نصب</h6>
                                            <p class="text-muted card-sub-title mt-2">
                                                تبریک! سایت ساز با موفقیت نصب شده است. لطفا اطلاعات مدیرکل سایت را جهت
                                                ورود
                                                به پنل مدیریت تعریف نمایید.
                                            </p>
                            </div>

                            <form id="form" method="post" action="{{route('installer.admin')}}">
                                @csrf
                                <div class="list-group">
                                    <div class="list-group-item py-4 open" data-acc-step="">
                                        <div data-acc-content="" style="">
                                            <div class="my-3">

                                                <div class="form-group">
                                                    <label for="email">ایمیل مدیر:</label>
                                                    <input type="email" name="email" id="email"
                                                           class="form-control"
                                                           value="{{old('email','admin@admin.com')}}"
                                                           placeholder="ایمیل مدیریت">
                                                    @if ($errors->has('email'))
                                                        <p class="text-danger">
                                                            <small>{{ $errors->first('email') }}</small>
                                                        </p>
                                                    @else
                                                        <small class="text-muted">
                                                            آدرس ایمیل مدیرکل سایت جهت ورود به پنل مدیریت.
                                                        </small>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="password">رمزعبور :</label>
                                                    <input type="password" name="password" id="password"
                                                           class="form-control" placeholder="رمزعبور مدیرکل">
                                                    @if ($errors->has('password'))
                                                        <p class="text-danger">
                                                            <small>{{ $errors->first('password') }}</small>
                                                        </p>
                                                    @else
                                                        <small class="text-muted">
                                                            رمزعبور مدیرکل سایت جهت ورود به پنل مدیریت، لطفا جهت جلوگیری
                                                            از خطرات امنیتی از رمز های پیچیده و سخت استفاده کنید.

                                                        </small>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="password_confirmation">تکرار رمزعبور :</label>
                                                    <input type="password" name="password_confirmation"
                                                           id="password_confirmation"
                                                           class="form-control" placeholder="تکرار رمزعبور">
                                                    @if ($errors->has('password_confirmation'))
                                                        <p class="text-danger">
                                                            <small>{{ $errors->first('password_confirmation') }}</small>
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <input type="submit" value="بعدی"
                                                   class="btn btn-primary float-left">
                                        </div>
                                    </div>
                                </div>
                            </form>

                            @else
                                <div>
                                    <h6 class="main-content-label mb-1">خطایی رخ داده است!</h6>
                                    <p class="text-muted card-sub-title mt-2">
                                        متاسفانه عملیات نصب جداول پایگاه داده کامل نشده است! لطفا مجددا روی دکمه
                                        نصب کلیک کنید و تا پایان عملیات این صفحه را نبندید!
                                    </p>
                                    <form method="post" action="{{route('installer.migration')}}">
                                        @csrf
                                        <input type="submit" value="نصب"
                                               class="btn btn-primary float-left">
                                    </form>
                                </div>
                            @endif
                            @else
                                <div class="text-center">
                                    <p>اتصال به پایگاه داده هنوز انجام نشده است!</p>
                                    <div class="pt-3">
                                        <a href="{{route('installer')}}" class="btn btn-primary">بازگشت به
                                            نصب</a>
                                    </div>
                                </div>
                            @endif

                            @else
                                <div class="text-center">
                                    <p>خطایی رخ داده است!</p>
                                    <div class="pt-3">
                                        <a href="{{route('installer')}}" class="btn btn-primary">بازگشت به نصب</a>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->

        </div>
    </div>
</div>
<!-- End Main Content-->

<!-- Main Footer-->
<div class="main-footer text-center">
    <div class="container">
        <div class="row row-sm">
            <div class="col-md-12">
                <span> طراحی و پشتیبانی توسط <a href="https://teamara.ir">تـیـم آرا</a></span>
            </div>
        </div>
    </div>
</div>
<!--End Footer-->
</div>
<!-- End Page -->

<!-- Jquery js-->
<script src="{{asset('CDN/admin/assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('CDN/admin/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('CDN/admin/assets/plugins/bootstrap/js/bootstrap-rtl.js')}}"></script>

<!-- Perfect-scrollbar js -->
<script src="{{asset('CDN/admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js')}}"></script>

<!-- Internal Jquery-steps js-->
<script src="{{asset('CDN/admin/assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>

<!-- Sticky js -->
<script src="{{asset('CDN/admin/assets/js/sticky.js')}}"></script>

<!-- Custom js -->
<script src="{{asset('CDN/admin/assets/js/custom.js')}}"></script>

</body>
</html>
