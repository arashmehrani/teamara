<?php

namespace Modules\Installer\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Modules\Auth\Entities\User;
use Nwidart\Modules\Facades\Module;

class InstallerController extends Controller
{
    public function connection()
    {
        Artisan::call('cache:clear');
        $check = \Illuminate\Support\Facades\DB::connection()->getDatabaseName();
        if ($check) {
            return redirect('/');
        } else {
            return view('installer::connection');
        }

    }

    public function installer(Request $request)
    {

        Artisan::call('cache:clear');
        return view('installer::installer');

    }

    public function installerCheck(Request $request)
    {
        $validated = $request->validate([
            'db_name' => 'required|max:190',
            'db_username' => 'required|max:190',
            'db_password' => 'nullable|max:190',
            'db_host' => 'required|max:190',
        ]);
        $db_name = $request->db_name;
        $db_username = $request->db_username;
        $db_password = $request->db_password;
        $db_host = $request->db_host;

        try {
            $con = new \PDO('mysql:host=' . $db_host . '; dbname=' . $db_name, $db_username, $db_password);
        } catch (\PDOException $err) {
            return redirect()->back()->with('NotConnected', 'خطا: متاسفانه ارتباط با این پایگاه داده برقرار نشد!');
        }
        $conn = null;

        Artisan::call('key:generate');

        $db_name_key = 'DB_DATABASE';
        $this->changeEnvironmentVariable($db_name_key, $db_name);

        $db_username_key = 'DB_USERNAME';
        $this->changeEnvironmentVariable($db_username_key, $db_username);

        $db_password_key = 'DB_PASSWORD';
        $this->changeEnvironmentVariable($db_password_key, $db_password);

        $db_host_key = 'DB_HOST';
        $this->changeEnvironmentVariable($db_host_key, $db_host);

        Session::put('checked', 'آماده نصب سایت');
        Session::forget('oldData');
        Session::forget('noData');

        if (Schema::hasColumn('users', 'updated_at')) {

            // we have old database
            Session::put('oldData', 'به نظر میرسد داده هایی از قبل برای این سایت وجود دارد');
            return redirect()->route('installer', ['step' => '2']);

        } else {

            // database is not ours
            Session::put('noData', 'دیتابیس خالی و آمده نصب');
            return redirect()->route('installer', ['step' => '2']);

        }

    }

    public function migration()
    {
        Session::forget('oldData');
        Session::forget('noData');
        Artisan::call('migrate:fresh --seed');
        Artisan::call('module:seed');
        Session::put('migrated', 'جداول نصب شد');
        return redirect()->route('installer', ['step' => '3']);
    }

    public function cancel(Request $request)
    {
        $module = Module::find('installer');
        $module->disable();
        return redirect()->route('home');
    }

    public function admin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|max:190|min:5|confirmed',
        ]);

        $user = User::where('email', 'admin@admin.com')->first();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $module = Module::find('installer');
        $module->disable();
        return redirect()->route('login');
    }

    public static function changeEnvironmentVariable($key, $value)
    {
        $path = base_path('.env');

        if (is_bool(env($key))) {
            $old = env($key) ? 'true' : 'false';
        } elseif (env($key) === null) {
            $old = 'null';
        } else {
            $old = env($key);
        }

        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                "$key=" . $old, "$key=" . $value, file_get_contents($path)
            ));
        }
    }
}
