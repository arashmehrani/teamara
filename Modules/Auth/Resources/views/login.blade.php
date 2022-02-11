@extends('auth::layouts.master')
@section('title')
    <title>ورود به حساب | {{config('app.name')}}</title>
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
                            <div class="mt-5 pt-4 p-2 pos-absolute">
                                <img src="{{asset('CDN/admin/assets/img/logo/logo-light.png')}}"
                                     class="header-brand-img mb-4" alt="logo">
                                <div class="clearfix"></div>
                                <img src="{{asset('CDN/admin/assets/img/svgs/user.svg')}}" class="ht-100 mb-0"
                                     alt="user">
                                <h5 class="mt-4 text-white">و یا رایگان ثبت نام کنید</h5>
                                <span class="tx-white-6 tx-13 mb-5 mt-xl-0">
                                    با ثبت نام حساب کاربری جدید امکانات زیادی برای شما فعال خواهد شد
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
                                        @if (Session::has('users_can_register'))
                                            <div class="alert alert-danger" role="alert">
                                                <button aria-label="Close" class="close" data-dismiss="alert"
                                                        type="button">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                {{ Session::get('users_can_register') }}
                                            </div>
                                        @endif
                                        @if (Session::has('registered'))
                                            <div class="alert alert-success" role="alert">
                                                <button aria-label="Close" class="close" data-dismiss="alert"
                                                        type="button">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                {{ Session::get('registered') }}
                                            </div>
                                        @endif
                                        @if (Session::has('notLogin'))
                                            <div class="alert alert-danger" role="alert">
                                                <button aria-label="Close" class="close" data-dismiss="alert"
                                                        type="button">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                {{ Session::get('notLogin') }}
                                            </div>
                                        @endif
                                        @if (Session::has('banned'))
                                            <div class="alert alert-warning" role="alert">
                                                <button aria-label="Close" class="close" data-dismiss="alert"
                                                        type="button">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                {{ Session::get('banned') }}
                                            </div>
                                        @endif
                                        @if (Session::has('status'))
                                            <div class="alert alert-success" role="alert">
                                                <button aria-label="Close" class="close" data-dismiss="alert"
                                                        type="button">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                {{ Session::get('status') }}
                                            </div>
                                        @endif
                                        <form method="post">
                                            @csrf
                                            <h5 class="text-right mb-2">به حساب خود وارد شوید</h5>
                                            <p class="mb-4 text-muted tx-13 ml-0 text-right">برای استفاده از
                                                تمامی خدمات
                                                و
                                                امکانات سایت لطفا وارد شوید</p>
                                            <div class="form-group text-right">
                                                <label for="email">پست الکترونیک</label>
                                                <input name="email" id="email" class="form-control"
                                                       placeholder="ایمیل خود را وارد کنید"
                                                       type="email" value="{{old('email')}}">
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">
                                                        <small>{{ $errors->first('email') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group text-right">
                                                <label for="password">کلمه عبور</label>
                                                <input name="password" id="password" class="form-control"
                                                       placeholder="رمز ورود خود را وارد کنید"
                                                       type="password">
                                                @if ($errors->has('password'))
                                                    <span class="text-danger">
                                                        <small>{{ $errors->first('password') }}</small>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group text-right">
                                                <label class="ckbox">
                                                    <input type="checkbox" id="remember" name="remember" value="1">
                                                    <span>مرا به خاطر بسپار</span>
                                                </label>
                                            </div>
                                            <button type="submit" class="btn ripple btn-main-primary btn-block">
                                                ورود
                                            </button>
                                        </form>
                                        <div class="text-right mt-5 ml-0">
                                            <div class="mb-1"><a href="{{route('password.request')}}">رمز عبور خود را
                                                    فراموش کرده اید؟</a>
                                            </div>
                                            @if($users_can_register == '1')
                                                <div>حساب ندارید؟ <a href="{{route('register')}}">اینجا ثبت نام
                                                        کنید</a>
                                                </div>
                                            @endif
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
