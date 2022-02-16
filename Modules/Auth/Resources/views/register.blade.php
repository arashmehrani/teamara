@extends('auth::layouts.master')
@section('title')
    <title>ثبت نام | {{config('app.name')}}</title>
@endsection
@section('css')
@endsection
@section('content')
    <div class="page main-signin-wrapper">
        <!-- Row -->
        <div class="row signpages text-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="row row-sm">
                        <div class="col-lg-6 col-xl-5 d-none d-lg-block text-center bg-primary details">
                            <div class="mt-5 pt-5 p-2 pos-absolute">
                                <img src="{{asset('CDN/admin/assets/img/logo/logo-light.png')}}"
                                     class="header-brand-img mb-4" alt="logo">
                                <div class="clearfix"></div>
                                <img src="{{asset('CDN/admin/assets/img/svgs/user.svg')}}" class="ht-100 mb-0"
                                     alt="user">
                                <h5 class="mt-4 text-white">رایگان حساب کاربری بسازید</h5>
                                <span class="tx-white-6 tx-13 mb-5 mt-xl-0">
                                    برای استفاده از تمامی امکانات سایت ثبت نام کنید
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form ">
                            <div class="container-fluid">
                                <div class="row row-sm">
                                    <div class="card-body mt-2 mb-2">
                                        <img src="{{asset('CDN/admin/assets/img/logo/logo.png')}}"
                                             class=" d-lg-none header-brand-img text-left float-left mb-4" alt="logo">
                                        <div class="clearfix"></div>
                                        <h5 class="text-right mb-2">ثبت نام رایگان</h5>
                                        <p class="mb-4 text-muted tx-13 ml-0 text-right">ثبت نام رایگان است و فقط یک
                                            دقیقه طول می کشد.</p>


                                        <livewire:auth::register />


                                        <div class="text-right mt-5 ml-0">
                                            <p class="mb-0">از قبل حساب کاربری دارید؟ <a
                                                    href="{{route('login')}}">وارد شوید</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
@endsection
@section('javaScript')
@endsection
