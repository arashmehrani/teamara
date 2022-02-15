<div>
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
        <form wire:submit.prevent="login">
            @csrf
            <h5 class="text-right mb-2">به حساب خود وارد شوید</h5>
            <p class="mb-4 text-muted tx-13 ml-0 text-right">برای استفاده از
                تمامی خدمات
                و
                امکانات سایت لطفا وارد شوید</p>
            <div class="form-group text-right">
                <label for="email">پست الکترونیک</label>
                <input wire:model.defer="email" name="email" id="email" class="form-control"
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
                <input wire:model.defer="password" name="password" id="password" class="form-control"
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
                    <input wire:model.defer="remember" type="checkbox" id="remember" name="remember" value="1">
                    <span>مرا به خاطر بسپار</span>
                </label>
            </div>
            <button wire:loading.remove  class="btn ripple btn-main-primary btn-block">
                ورود
            </button>
            <button disabled wire:loading wire:target="login" class="btn ripple btn-main-primary btn-block" type="button">
                <span aria-hidden="true" class="spinner-border spinner-border-sm" role="status"></span>
            </button>
            </for>
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
