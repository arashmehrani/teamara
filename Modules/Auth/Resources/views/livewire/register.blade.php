<div>
    <form wire:submit.prevent="register">
        @csrf
        <div class="form-group text-right">
            <label for="email">پست الکترونیک
                <span class="tx-danger">*</span>
            </label>
            <input wire:model.defer="email" name="email" id="email" class="form-control"
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
            <input wire:model.defer="password" name="password" id="password" class="form-control"
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
            <input wire:model.defer="mobile" name="mobile" id="mobile" class="form-control"
                   placeholder="شماره موبایل" type="text" value="{{old('mobile')}}">
            @if ($errors->has('mobile'))
                <span class="text-danger">
                                                        <small>{{ $errors->first('mobile') }}</small>
                                                    </span>
            @endif
        </div>
        <button wire:loading.remove type="submit" class="btn ripple btn-main-primary btn-block">ایجاد
            حساب
        </button>
        <button disabled wire:loading wire:target="register" class="btn ripple btn-main-primary btn-block" type="button">
            <span aria-hidden="true" class="spinner-border spinner-border-sm" role="status"></span>
        </button>
    </form>
</div>
