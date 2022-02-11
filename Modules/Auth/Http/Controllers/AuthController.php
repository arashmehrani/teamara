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
        if (Schema::hasTable('options')) {
            $option = Option::where('name', 'app_option')->first();
            $users_can_register = $option->meta['users_can_register'];
        }
        return view('auth::login', compact('users_can_register'));
    }

    public function registerView()
    {
        $users_can_register = '1';
        if (Schema::hasTable('options')) {
            $option = Option::where('name', 'app_option')->first();
            $users_can_register = $option->meta['users_can_register'];
        }
        if ($users_can_register == 1) {
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
