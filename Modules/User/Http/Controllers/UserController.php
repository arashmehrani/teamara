<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Entities\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        if ($request->get('search')) {
            $search = $request->get('search');
            $users = User::where('display_name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('mobile', 'like', '%' . $search . '%')
                ->orderBy('created_at', 'desc')->paginate(10);
        }
        return view('user::users', compact('users'));
    }

    public function delete($id)
    {
        if ($id != Auth::id()) {
            $user = User::findOrfail($id);
            $user->delete();
            return response()->json(['message' => 'کاربر مورد نظر با موفقیت حذف شد!'], Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'شما نمی توانید حساب خود را پاک کنید!'], Response::HTTP_FORBIDDEN);
        }

    }

    public function new()
    {
        return view('user::user-new');
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'mobile' => 'nullable|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:users,mobile',
            'email' => 'required|email|unique:users|max:190',
            'password' => 'required|max:190|min:6',
            'display_name' => 'max:190|min:3',
        ]);
        $user = new User();
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        if (!empty($request->display_name)) {
            $user->display_name = $request->display_name;
        }
        if ($request->status == 'active') {
            $user->email_verified_at = now();
        } elseif ($request->status == 'inactive') {
            $user->email_verified_at = null;
        } elseif ($request->status == 'ban') {
            $user->status = $request->status;
        }
        $user->save();
        if ($request->send_email == 'on') {
            event(new Registered($user));
        }
        return redirect()->route('users')->with('added', 'کاربر جدید با موفقیت افزوده شد.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        if ($id == Auth::user()->id) {
            return redirect()->route('profile.edit');
        }
        return view('user::user-edit', compact('user'));
    }

    public function update(Request $request)
    {
        $validatedId = $request->validate([
            'id' => 'required|numeric',
        ]);

        $id = $request->id;
        $validated = $request->validate([
            'mobile' => 'nullable|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:users,mobile,' . $id,
            'email' => 'required|email|max:190|unique:users,email,' . $id,
            'password' => 'nullable|max:190|min:6',
            'display_name' => 'max:190|min:3',
        ]);
        $user = User::findOrFail($id);

        $user->display_name = $request->display_name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        if ($request->status == 'active') {
            if ($user->email_verified_at == null) {
                $user->email_verified_at = now();
            }
            if ($user->status == 'ban') {
                $user->status = null;
            }
        } elseif ($request->status == 'inactive') {
            $user->email_verified_at = null;
        } elseif ($request->status == 'ban') {
            $user->status = $request->status;
        }
        $user->save();
        if ($request->send_email == 'on') {
            event(new Registered($user));
        }
        return redirect()->back()->with('edited', 'کاربر مورد نظر با موفقیت ویرایش شد.');
    }

    public function profileEdit()
    {
        $user = Auth::user();
        return view('user::user-edit-profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;
        $validated = $request->validate([
            'mobile' => 'nullable|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:users,mobile,' . $id,
            'email' => 'required|email|max:190|unique:users,email,' . $id,
            'password' => 'nullable|max:190|min:6',
            'display_name' => 'max:190|min:3',
        ]);

        $user->display_name = $request->display_name;
        $user->mobile = $request->mobile;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($user->email != $request->email) {
            $user->email = $request->email;
            $user->email_verified_at = null;
            $user->save();
            event(new Registered($user));
        }
        $user->save();
        return redirect()->back()->with('edited', 'حساب کاربری شما با موفقیت ویرایش شد.');
    }
}
