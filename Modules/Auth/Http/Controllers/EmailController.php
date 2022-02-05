<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailController extends Controller
{
    public function verifyNotice()
    {
        $email = Auth::user()->email;
        if (Auth::user()->email_verified_at) {
            return redirect('/dashboard');
        }
        return view('auth::verify-email', compact('email'));
    }

    public function verifyRequest(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/dashboard');
    }

    public function resendVerification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('resend', 'لینک تایید دوباره ارسال شد!');
    }
}
