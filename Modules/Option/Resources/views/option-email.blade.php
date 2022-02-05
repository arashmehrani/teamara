@extends('dashboard::layout.master')
@section('title')
    <title>تنظیمات ایمیل سایت > {{config('app.name')}}</title>
@endsection
@section('breadcrumb')
    <h2 class="main-content-title tx-24 mg-b-5">تنظیمات ایمیل سایت</h2>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">داشبورد</a></li>
        <li class="breadcrumb-item active" aria-current="page">تنظیمات</li>
    </ol>
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card custom-card">
                <div class="card-header border-bottom-0 pb-0">
                    @if (Session::has('saved'))
                        <div class="alert alert-success" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert"
                                    type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ Session::get('saved') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">تنظیمات ایمیل</h6>
                        <p class="text-muted card-sub-title">از این بخش می توانید تنظیمات سرور ایمیل سایت را انجام
                            دهید.</p>
                    </div>

                    <div class="row row-sm">
                        <div class="col-md-4">

                            <form method="post" action="{{route('options.email.update')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="admin_email">ایمیل سایت :</label>
                                    <input type="text" class="form-control" name="admin_email" id="admin_email"
                                           placeholder="ایمیل سایت"
                                           value="{{ old('admin_email',$admin_email->option_value) }}">
                                    @if ($errors->has('admin_email'))
                                        <p class="text-danger">
                                            <small>{{ $errors->first('admin_email') }}</small>
                                        </p>
                                    @else
                                        <small class="text-muted">ایمیل اصلی اطلاع رسانی سایت.</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="mailserver_url">سرور ایمیل :</label>
                                    <input type="text" class="form-control" name="mailserver_url" id="mailserver_url"
                                           placeholder="سرور ایمیل"
                                           value="{{ old('mailserver_url',$mailserver_url->option_value) }}">
                                    @if ($errors->has('mailserver_url'))
                                        <p class="text-danger">
                                            <small>{{ $errors->first('mailserver_url') }}</small>
                                        </p>
                                    @else
                                        <small class="text-muted">در صورت استفاده از سرویس دهنده های ثالت آدرس سرور آن
                                            را وارد کنید.</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="mailserver_login">نام کاربری ایمیل :</label>
                                    <input type="text" class="form-control" name="mailserver_login"
                                           id="mailserver_login"
                                           placeholder="نام کاربری ایمیل"
                                           value="{{ old('mailserver_login',$mailserver_login->option_value) }}">
                                    @if ($errors->has('mailserver_login'))
                                        <span class="text-danger">
                                                        <small>{{ $errors->first('mailserver_login') }}</small>
                                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="mailserver_pass">رمزعبور ایمیل :</label>
                                    <input type="password" class="form-control" name="mailserver_pass"
                                           id="mailserver_pass"
                                           placeholder="رمزعبور ایمیل"
                                           value="{{ old('mailserver_pass',$mailserver_pass->option_value) }}">
                                    @if ($errors->has('mailserver_pass'))
                                        <span class="text-danger">
                                                        <small>{{ $errors->first('mailserver_pass') }}</small>
                                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="mailserver_port">پورت سرور :</label>
                                    <input type="number" class="form-control" name="mailserver_port"
                                           id="mailserver_port"
                                           placeholder="پورت سرور ایمیل"
                                           value="{{ old('mailserver_port',$mailserver_port->option_value) }}">
                                    @if ($errors->has('mailserver_port'))
                                        <span class="text-danger">
                                                        <small>{{ $errors->first('mailserver_port') }}</small>
                                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="mailserver_encryption">پروتکل رمزنگاری :</label>
                                    <input type="text" class="form-control" name="mailserver_encryption"
                                           id="mailserver_encryption"
                                           placeholder="پروتکل رمزنگاری ایمیل"
                                           value="{{ old('mailserver_encryption',$mailserver_encryption->option_value) }}">
                                    @if ($errors->has('mailserver_encryption'))
                                        <span class="text-danger">
                                                        <small>{{ $errors->first('mailserver_encryption') }}</small>
                                                    </span>
                                    @endif
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary my-2">ذخیره تغییرات</button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- COL END -->
    </div>
@endsection
