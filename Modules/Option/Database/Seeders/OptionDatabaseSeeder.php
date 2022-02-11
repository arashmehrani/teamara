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
                'name' => 'app_general',
                'created_at' => now(),
                'updated_at' => now(),
                'meta' => json_encode([
                    'site_name' => 'تیم آرا',
                    'site_description' => 'یک سایت دیگر با تیم آرا',
                ])
            ], [
                'name' => 'app_option',
                'created_at' => now(),
                'updated_at' => now(),
                'meta' => json_encode([
                    'users_can_register' => '1',
                    'users_can_comment' => '1',
                    'comment_registration' => '0',
                    'posts_per_page' => '10',
                    'admin_per_page' => '10',
                    'timezone' => 'Asia/Tehran',
                ])
            ], [
                'name' => 'app_permalink',
                'created_at' => now(),
                'updated_at' => now(),
                'meta' => json_encode([
                    'post_permalink' => '',
                    'category_permalink' => 'category',
                    'tag_permalink' => 'tag',
                ])
            ], [
                'name' => 'app_email',
                'created_at' => now(),
                'updated_at' => now(),
                'meta' => json_encode([
                    'admin_email' => 'admin@example.com',
                    'mailserver_url' => 'smtp.example.com',
                    'mailserver_login' => 'login@example.com',
                    'mailserver_pass' => 'password',
                    'mailserver_port' => '2525',
                    'mailserver_encryption' => 'tls',
                ])
            ]
        ]);
    }
}
