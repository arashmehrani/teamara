@extends('dashboard::layout.master')
@section('title')
    <title>افزودن رسانه جدید > {{config('app.name')}}</title>
@endsection
@section('css')

@endsection
@section('breadcrumb')
    <h2 class="main-content-title tx-24 mg-b-5">افزودن رسانه جدید</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">داشبورد</a></li>
        <li class="breadcrumb-item"><a href="{{route('media')}}">رسانه ها</a></li>
        <li class="breadcrumb-item active" aria-current="page">افزودن رسانه جدید</li>
    </ol>
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">افزودن رسانه جدید</h6>
                        <p class="text-muted card-sub-title">
                            رسانه جدیدی مانند فیلم، عکس و یا سند را به آرشیو سایت اضافه کنید.
                        </p>
                    </div>

                    <div class="row row-sm">
                        <div class="col-md-6">
                            <form method="post" action="{{route('user.add')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="display_name">نام :</label>
                                    <input type="text" class="form-control" name="display_name" id="display_name"
                                           placeholder="نام نمایشی" value="{{old('display_name','کاربر سایت')}}">
                                    @if ($errors->has('display_name'))
                                        <p class="text-danger">
                                            <small>{{ $errors->first('display_name') }}</small>
                                        </p>
                                    @else
                                        <small class="text-muted">نام نمایشی این کاربر در سایت.</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="mobile">موبایل :</label>
                                    <input type="text" class="form-control" name="mobile" id="mobile"
                                           placeholder="شماره موبایل" value="{{old('mobile')}}">
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
                                           placeholder="ایمیل" value="{{old('email')}}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">
                                                        <small>{{ $errors->first('email') }}</small>
                                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">رمز عبور :
                                        <span class="tx-danger">*</span>
                                    </label>
                                    <input type="password" class="form-control" name="password" id="password"
                                           placeholder="رمز عبور">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">
                                                        <small>{{ $errors->first('password') }}</small>
                                                    </span>
                                    @endif
                                </div>
                                <div class="row row-sm" data-select2-id="21">
                                    <div class="col-sm-4" data-select2-id="20">
                                        <label for="status">وضعیت :</label>
                                        <select class="form-control select" name="status" id="status">
                                            <option value="active" selected>فعال</option>
                                            <option value="inactive">غیرفعال</option>
                                            <option value="ban">مسدود</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mt-4">
                                    <label class="ckbox">
                                        <input type="checkbox" name="send_email" id="send_email">
                                        <span class="tx-13">ارسال ایمیل تایید حساب کاربری به این کاربر جدید؟</span>
                                    </label>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary my-2">افزودن کاربر جدید</button>
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
