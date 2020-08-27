<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


use App\Models\Character;



class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->text('about_en');
            $table->text('about_ar');
            $table->string('image');
            $table->timestamps();
        });
       Character::create([
            'about_en' => 'الوجبة ',
            'about_ar' => 'special meal',
            'image' => 'Fruits.jpg',
            // 'typerepeat'=>'daily',
            //start date+name animal+user 

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
