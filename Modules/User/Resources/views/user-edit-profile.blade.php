@extends('dashboard::layout.master')
@section('title')
    <title>ویرایش پروفایل > {{config('app.name')}}</title>
@endsection
@section('css')

@endsection
@section('breadcrumb')
    <h3 class="main-content-title tx-22 mg-b-5">ویرایش پروفایل</h3>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">داشبورد</a></li>
        <li class="breadcrumb-item"><a href="{{route('users')}}">مدیریت کاربران</a></li>
        <li class="breadcrumb-item active" aria-current="page">ویرایش پروفایل</li>
    </ol>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card custom-card">
                <div class="card-header border-bottom-0 pb-0">
                    @if (Session::has('edited'))
                        <div class="alert alert-success" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert"
                                    type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ Session::get('edited') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">

                    <div class="row row-sm">
                        <div class="col-md-6">

                            <form method="post" action="{{route('profile.update')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="display_name">نام :</label>
                                    <input type="text" class="form-control" name="display_name" id="display_name"
                                           placeholder="نام نمایشی" value="{{$user->display_name}}">
                                    @if ($errors->has('display_name'))
                                        <p class="text-danger">
                                            <small>{{ $errors->first('display_name') }}</small>
                                        </p>
                                    @else
                                        <small class="text-muted">نام نمایشی در سایت.</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="mobile">موبایل :</label>
                                    <input type="text" class="form-control" name="mobile" id="mobile"
                                           placeholder="شماره موبایل" value="{{$user->mobile}}">
                                    @if ($errors->has('mobile'))
                                        <p class="text-danger">
                                            <small>{{ $errors->first('mobile') }}</small>
                                        </p>
                                    @else
                                        <small class="text-muted">به صورت عمومی جایی نمایش داده نمی شود.</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">ایمیل :
                                        <span class="tx-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="ایمیل" value="{{$user->email}}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">
                                                        <small>{{ $errors->first('email') }}</small>
                                                    </span>
                                    @else
                                        <small class="text-muted">
                                            در صورت تغییر ایمیل، یک ایمیل فعال سازی مجددا برای شما ارسال خواهد شد.
                                        </small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">رمز عبور :</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                           placeholder="رمز عبور">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">
                                                        <small>{{ $errors->first('password') }}</small>
                                                    </span>
                                    @else
                                        <small class="text-muted">اگر نمی خواهید رمزعیور را تغییر دهید، خالی
                                            بگذارید.</small>
                                    @endif
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary my-2">بروزرسانی حساب</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- COL END -->
    </div>
@endsection
@section('javaScript')
@endsection
