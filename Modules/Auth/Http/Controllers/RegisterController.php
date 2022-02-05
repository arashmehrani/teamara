<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Entities\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'mobile' => 'nullable|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:users,mobile',
            'email' => 'required|email|unique:users|max:190',
            'password' => 'required|max:190|min:6',
        ]);
        $user = new User();
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->save();
        event(new Registered($user));
        return redirect()->intended('login')->with('registered', 'ثبت نام با موفقیت انجام شد! لطفا ابتدا ایمیل خود را چک کنید');
    }

    protected function redirectTo()
    {
        return '/dashboard';
    }
}
