<?php

namespace Modules\Auth\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Modules\Auth\Entities\User;
use Modules\Option\Entities\Option;

class Login extends Component
{
    public $users, $email, $password, $remember;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    public function render()
    {
        $users_can_register = '1';

        if (Schema::hasTable('options')) {
            $option = Option::where('name', 'app_option')->first();
            $users_can_register = $option->meta['users_can_register'];
        }
        return view('auth::livewire.login', compact('users_can_register'));
    }

    public function login()
    {
        $this->validate();
        $email = $this->email;
        $password = $this->password;
        $remember = $this->remember;
        if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => null], $remember)) {
            // Authentication passed...
            Session::regenerate(true);
            return redirect()->intended('dashboard');
        }
        $bannedUser = User::where('email', $email)->where('status', 'ban')->first();
        if ($bannedUser) {
            session()
                ->flash('banned', 'حساب کاربری شما توسط مدیریت مسدود گردیده است، لطفا برای اطلاعات بیشتر با پشتیبانی سایت در تماس باشید.');
        } else {
            session()->flash('notLogin', 'کاربری با این مشخصات پیدا نشد!');
        }
    }
}
