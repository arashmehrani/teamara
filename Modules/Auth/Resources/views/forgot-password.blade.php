@extends('auth::layouts.master')
@section('title')
    <title>فراموشی رمز عبور | {{config('app.name')}}</title>
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
                                        @if (Session::has('status'))
                                            <div class="alert alert-success" role="alert">
                                                <button aria-label="Close" class="close" data-dismiss="alert"
                                                        type="button">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                {{ Session::get('status') }}
                                            </div>
                                        @endif
                                        @if (Session::has('email'))
                                            <div class="alert alert-danger" role="alert">
                                                <button aria-label="Close" class="close" data-dismiss="alert"
                                                        type="button">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                {{ Session::get('email') }}
                                            </div>
                                        @endif
                                        <form method="post" action="{{route('password.email')}}">
                                            @csrf
                                            <h5 class="text-right mb-2">فراموشی رمز عبور</h5>
                                            <p class="mb-4 text-muted tx-13 ml-0 text-right">
                                                در صورتی که رمز عبور خود را فراموش کرده اید با وارد کردن ایمیلی که با آن
                                                ثبت نام کرده اید درخواست بازیابی رمز را بدهید
                                            </p>
                                            <div class="form-group text-right">
                                                <label for="email">آدرس ایمیل شما</label>
                                                <input name="email" id="email" class="form-control"
                                                       placeholder="آدرس ایمیل شما"
                                                       type="email" value="{{old('email')}}" required>
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">
                                                        <small>{{ $errors->first('email') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                            <button type="submit" class="btn ripple btn-main-primary btn-block">
                                                بازیابی رمز عبور
                                            </button>
                                        </form>
                                        <div class="text-right mt-5 ml-0">
                                            <div>هنوز ثبت نام نکرده اید؟ <a href="{{route('register')}}">ثبت نام</a>
                                            </div>
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
