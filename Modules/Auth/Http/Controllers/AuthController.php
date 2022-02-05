<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Modules\Option\Entities\Option;

class AuthController extends Controller
{
    public function loginView()
    {
        $users_can_register = '1';
        if (Schema::hasColumn('options','option_name')){
            $users_can_register = Option::where('option_name', 'users_can_register')->first();
        }
        return view('auth::login', compact('users_can_register'));
    }

    public function registerView()
    {
        $users_can_register = '1';
        if (Schema::hasColumn('options','option_name')){
            $users_can_register = Option::where('option_name', 'users_can_register')->first();
        }
        if ($users_can_register->option_value == 1) {
            return view('auth::register');
        } else {
            return redirect()->route('login')->with('users_can_register',
                'ثبت نام کاربر جدید در حال حاضر امکان پذیر نمی باشد');
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
