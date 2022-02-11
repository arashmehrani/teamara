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
        $app_general = Option::where('name', 'app_general')->first();
        $app_permalink = Option::where('name', 'app_permalink')->first();
        $app_option = Option::where('name', 'app_option')->first();
        return view('option::options', compact('app_general', 'app_permalink', 'app_option'));
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
        $app_email = Option::where('name', 'app_email')->first();

        return view('option::option-email', compact('app_email'));
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

        DB::table('options')->where('name', 'app_general')
            ->update(
                [
                    'meta->site_name' => $request->site_name,
                    'meta->site_description' => $request->site_description,
                ]
            );

        DB::table('options')->where('name', 'app_permalink')
            ->update(
                [
                    'meta->post_permalink' => $request->post_permalink,
                    'meta->category_permalink' => $request->category_permalink,
                ]
            );


        DB::table('options')->where('name', 'app_option')
            ->update(['meta->posts_per_page' => $request->posts_per_page]);

        if ($request->users_can_register == 'on') {

            DB::table('options')->where('name', 'app_option')
                ->update(['meta->users_can_register' => '1']);

        } else {
            DB::table('options')->where('name', 'app_option')
                ->update(['meta->users_can_register' => '0']);
        }
        if ($request->users_can_comment == 'on') {
            DB::table('options')->where('name', 'app_option')
                ->update(['meta->users_can_comment' => '1']);
        } else {
            DB::table('options')->where('name', 'app_option')
                ->update(['meta->users_can_comment' => '0']);
        }
        if ($request->comment_registration == 'on') {
            if ($request->users_can_comment == 'on') {
                DB::table('options')->where('name', 'app_option')
                    ->update(['meta->comment_registration' => '1']);
            }
        } else {
            DB::table('options')->where('name', 'app_option')
                ->update(['meta->comment_registration' => '0']);
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

        DB::table('options')->where('name', 'app_email')
            ->update(
                [
                    'meta->admin_email' => $request->admin_email,
                    'meta->mailserver_url' => $request->mailserver_url,
                    'meta->mailserver_login' => $request->mailserver_login,
                    'meta->mailserver_pass' => $request->mailserver_pass,
                    'meta->mailserver_port' => $request->mailserver_port,
                    'meta->mailserver_encryption' => $request->mailserver_encryption,
                ]
            );

        session()->flash('saved', 'تغییرات با موفقیت ذخیره شد.');
        return redirect()->route('options.email');

    }
}
