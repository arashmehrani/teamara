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
                                        <form method="post">
                                            @csrf
                                            <div class="form-group text-right">
                                                <label for="email">پست الکترونیک
                                                    <span class="tx-danger">*</span>
                                                </label>
                                                <input name="email" id="email" class="form-control"
                                                       placeholder="ایمیل خود را وارد کنید"
                                                       type="email" value="{{old('email')}}" required>
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">
                                                        <small>{{ $errors->first('email') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group text-right">
                                                <label for="password">کلمه عبور
                                                    <span class="tx-danger">*</span>
                                                </label>
                                                <input name="password" id="password" class="form-control"
                                                       placeholder="رمز ورود خود را وارد کنید"
                                                       type="password" required>
                                                @if ($errors->has('password'))
                                                    <span class="text-danger">
                                                        <small>{{ $errors->first('password') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group text-right">
                                                <label for="mobile">موبایل <small>(اختیاری)</small></label>
                                                <input name="mobile" id="mobile" class="form-control"
                                                       placeholder="شماره موبایل" type="text" value="{{old('mobile')}}">
                                                @if ($errors->has('mobile'))
                                                    <span class="text-danger">
                                                        <small>{{ $errors->first('mobile') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                            <button type="submit" class="btn ripple btn-main-primary btn-block">ایجاد
                                                حساب
                                            </button>
                                        </form>
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
