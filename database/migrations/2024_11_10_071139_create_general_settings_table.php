<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        // Insert default settings
        DB::table('general_settings')->insert([
            [
                'key' => 'site_name',
                'value' => 'Universitas Khairun',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'site_logo',
                'value' => '/images/logo.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'footer_text',
                'value' => '© 2024 Universitas Khairun. All rights reserved.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'loader_image',
                'value' => '/images/loader.gif',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'app_url',
                'value' => env('APP_URL', 'http://localhost'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'site_email',
                'value' => env('MAIL_FROM_ADDRESS', 'info@unkhair.ac.id'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'mail_mailer',
                'value' => env('MAIL_MAILER', 'log'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'mail_host',
                'value' => env('MAIL_HOST', '127.0.0.1'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'mail_port',
                'value' => env('MAIL_PORT', '2525'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'mail_username',
                'value' => env('MAIL_USERNAME', null),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'mail_password',
                'value' => env('MAIL_PASSWORD', null),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'mail_encryption',
                'value' => env('MAIL_ENCRYPTION', null),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'mail_from_address',
                'value' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'mail_from_name',
                'value' => env('MAIL_FROM_NAME', env('APP_NAME', 'Laravel')),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_settings');
    }
}
