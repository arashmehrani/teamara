<?php

namespace Modules\Option\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Option\Entities\Option;


class OptionController extends Controller
{
    public function index()
    {
        $site_name = Option::where('option_name', 'site_name')->first();
        $site_description = Option::where('option_name', 'site_description')->first();
        $post_permalink = Option::where('option_name', 'post_permalink')->first();
        $category_permalink = Option::where('option_name', 'category_permalink')->first();
        $posts_per_page = Option::where('option_name', 'posts_per_page')->first();
        $users_can_register = Option::where('option_name', 'users_can_register')->first();
        $users_can_comment = Option::where('option_name', 'users_can_comment')->first();
        $comment_registration = Option::where('option_name', 'comment_registration')->first();

        return view('option::options', compact('site_name', 'site_description'
            , 'post_permalink', 'category_permalink', 'posts_per_page', 'users_can_register', 'users_can_comment'
            , 'comment_registration'));
    }

    public function status()
    {
        $results = DB::select(DB::raw('SHOW VARIABLES LIKE "%version%"'));
        $mysql_version = $results[0]->{'Value'};
        $tls_version = $results[3]->{'Value'};
        $mysql_type = $results[5]->{'Value'};
        $os_type = $results[7]->{'Value'};
        $memory_limit = ini_get('memory_limit');
        $post_max_size = ini_get('post_max_size');
        $upload_max_filesize = ini_get('upload_max_filesize');
        $max_execution_time = ini_get('max_execution_time');

        return view('option::option-status',
            compact('mysql_version', 'tls_version', 'mysql_type', 'os_type'
                , 'memory_limit', 'post_max_size', 'upload_max_filesize', 'max_execution_time'));
    }

    public function email()
    {
        $admin_email = Option::where('option_name', 'admin_email')->first();
        $mailserver_url = Option::where('option_name', 'mailserver_url')->first();
        $mailserver_login = Option::where('option_name', 'mailserver_login')->first();
        $mailserver_pass = Option::where('option_name', 'mailserver_pass')->first();
        $mailserver_port = Option::where('option_name', 'mailserver_port')->first();
        $mailserver_encryption = Option::where('option_name', 'mailserver_encryption')->first();

        return view('option::option-email', compact('admin_email', 'mailserver_url'
            , 'mailserver_login', 'mailserver_pass', 'mailserver_port', 'mailserver_encryption'));
    }

    public function optionsUpdate(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required|max:190',
            'site_description' => 'required|max:190',
            'post_permalink' => 'max:190',
            'category_permalink' => 'max:190',
            'posts_per_page' => 'required|numeric',
        ]);

        $site_name = Option::where('option_name', 'site_name')->first();
        $site_name->option_value = $request->site_name;
        $site_name->save();

        $site_description = Option::where('option_name', 'site_description')->first();
        $site_description->option_value = $request->site_description;
        $site_description->save();

        $post_permalink = Option::where('option_name', 'post_permalink')->first();
        $post_permalink->option_value = $request->post_permalink;
        $post_permalink->save();

        $category_permalink = Option::where('option_name', 'category_permalink')->first();
        $category_permalink->option_value = $request->category_permalink;
        $category_permalink->save();

        $posts_per_page = Option::where('option_name', 'posts_per_page')->first();
        $posts_per_page->option_value = $request->posts_per_page;
        $posts_per_page->save();

        if ($request->users_can_register == 'on') {
            $users_can_register = Option::where('option_name', 'users_can_register')->first();
            $users_can_register->option_value = '1';
            $users_can_register->save();
        } else {
            $users_can_register = Option::where('option_name', 'users_can_register')->first();
            $users_can_register->option_value = '0';
            $users_can_register->save();
        }
        if ($request->users_can_comment == 'on') {
            $users_can_comment = Option::where('option_name', 'users_can_comment')->first();
            $users_can_comment->option_value = '1';
            $users_can_comment->save();
        } else {
            $users_can_comment = Option::where('option_name', 'users_can_comment')->first();
            $users_can_comment->option_value = '0';
            $users_can_comment->save();
        }
        if ($request->comment_registration == 'on') {
            if ($request->users_can_comment == 'on') {
                $comment_registration = Option::where('option_name', 'comment_registration')->first();
                $comment_registration->option_value = '1';
                $comment_registration->save();
            }
        } else {
            $comment_registration = Option::where('option_name', 'comment_registration')->first();
            $comment_registration->option_value = '0';
            $comment_registration->save();
        }
        session()->flash('saved', 'تغییرات با موفقیت ذخیره شد.');
        return redirect()->route('options');
    }

    public function emailUpdate(Request $request)
    {
        $validated = $request->validate([
            'admin_email' => 'required|email|max:190',
            'mailserver_url' => 'required|max:190',
            'mailserver_login' => 'required|max:190',
            'mailserver_pass' => 'required|max:190',
            'mailserver_port' => 'required|numeric',
            'mailserver_encryption' => 'required|max:190',
        ]);
        $admin_email = Option::where('option_name', 'admin_email')->first();
        $admin_email->option_value = $request->admin_email;
        $admin_email->save();

        $mailserver_url = Option::where('option_name', 'mailserver_url')->first();
        $mailserver_url->option_value = $request->mailserver_url;
        $mailserver_url->save();

        $mailserver_login = Option::where('option_name', 'mailserver_login')->first();
        $mailserver_login->option_value = $request->mailserver_login;
        $mailserver_login->save();

        $mailserver_pass = Option::where('option_name', 'mailserver_pass')->first();
        $mailserver_pass->option_value = $request->mailserver_pass;
        $mailserver_pass->save();

        $mailserver_port = Option::where('option_name', 'mailserver_port')->first();
        $mailserver_port->option_value = $request->mailserver_port;
        $mailserver_port->save();

        $mailserver_encryption = Option::where('option_name', 'mailserver_encryption')->first();
        $mailserver_encryption->option_value = $request->mailserver_encryption;
        $mailserver_encryption->save();

        session()->flash('saved', 'تغییرات با موفقیت ذخیره شد.');
        return redirect()->route('options.email');

    }
}
