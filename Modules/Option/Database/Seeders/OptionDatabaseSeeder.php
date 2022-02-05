<?php

namespace Modules\Option\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OptionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('options')->insert([
            [
                'option_name' => 'site_name',
                'option_value' => 'تیم آرا',
                'option_key' => 'option',
            ],[
                'option_name' => 'site_description',
                'option_value' => 'یک سایت دیگر با تیم آرا',
                'option_key' => 'option',
            ],[
                'option_name' => 'users_can_register',
                'option_value' => '1',
                'option_key' => 'option',
            ],[
                'option_name' => 'users_can_comment',
                'option_value' => '1',
                'option_key' => 'option',
            ],[
                'option_name' => 'comment_registration',
                'option_value' => '0',
                'option_key' => 'option',
            ],[
                'option_name' => 'posts_per_page',
                'option_value' => '10',
                'option_key' => 'option',
            ],[
                'option_name' => 'timezone',
                'option_value' => 'Asia/Tehran',
                'option_key' => 'option',
            ],[
                'option_name' => 'post_permalink',
                'option_value' => '',
                'option_key' => 'option',
            ],[
                'option_name' => 'category_permalink',
                'option_value' => 'category',
                'option_key' => 'option',
            ],[
                'option_name' => 'admin_email',
                'option_value' => 'admin@example.com',
                'option_key' => 'option_email',
            ],[
                'option_name' => 'mailserver_url',
                'option_value' => 'smtp.example.com',
                'option_key' => 'option_email',
            ],[
                'option_name' => 'mailserver_login',
                'option_value' => 'login@example.com',
                'option_key' => 'option_email',
            ],[
                'option_name' => 'mailserver_pass',
                'option_value' => 'password',
                'option_key' => 'option_email',
            ],[
                'option_name' => 'mailserver_port',
                'option_value' => '2525',
                'option_key' => 'option_email',
            ],[
                'option_name' => 'mailserver_encryption',
                'option_value' => 'tls',
                'option_key' => 'option_email',
            ]
        ]);
    }
}
