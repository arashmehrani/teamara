<?php

namespace Modules\Auth\Http\Livewire;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Modules\Auth\Entities\User;

class Register extends Component
{

    public $users, $email, $password, $mobile;

    protected $rules = [
        'mobile' => 'nullable|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:users,mobile',
        'email' => 'required|email|unique:users|max:190',
        'password' => 'required|max:190|min:6',
    ];

    public function render()
    {
        return view('auth::livewire.register');
    }

    public function register()
    {
        $this->validate();
        $user = new User();
        $user->mobile = $this->mobile;
        $user->password = Hash::make($this->password);
        $user->email = $this->email;
        $user->save();
        try {
            event(new Registered($user));
        } catch (\Exception $e) {
            return redirect()->intended('login')
                ->with('EmailNotSent', 'ثبت نام با موفقیت انجام شد! اما اشکالی در ارسال ایمیل تایید حساب وجود دارد. لطفا با پشتیبانی سایت تماس بگیرید.');
        }

        return redirect()->intended('login')
            ->with('registered', 'ثبت نام با موفقیت انجام شد! لطفا ابتدا ایمیل خود را چک کنید');
    }
}
