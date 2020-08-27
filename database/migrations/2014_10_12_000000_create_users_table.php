<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('countryName')->nullable();
            $table->string('tel');
            $table->string('about')->nullable();
            $table->string('level')->default(1);
            $table->string('image');
            $table->string('statusValue')->default(1);
            $table->string('fcm_token');

              
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });

          User::create([
            'name' => 'admin',
            'email' => 'ipaw@i.com',
            'user' => 'ipaw@i.com',
            'tel' => '123456',
            'password' => Hash::make('123456'),
            'image' => 'logo.png',
             'fcm_token' => 'tfyrtyrtyrt',
              
              
        ]);



              
              
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');

    }
}
