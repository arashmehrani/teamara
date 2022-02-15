<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Auth\Entities\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;
        if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => null], $remember)) {
            // Authentication passed...
            $request->session()->regenerate();
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

    protected function redirectTo()
    {
        return '/dashboard';
    }
}
