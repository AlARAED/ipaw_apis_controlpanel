<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Care;


class CreateCaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cares', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('image');
             $table->unsignedBigInteger('category_id');
             $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade');
            // $table->enum('typerepeat', ['daily', '2day','3day','4day','weakly','2weak','3weak','monthly','2month','3month','6month' ,'yearly']);
            $table->softDeletes();

            $table->timestamps();
        });

         Care::create([
            'name_ar' => 'الوجبة المميزة',
            'name_en' => 'special meal',
            'category_id'=>'1',
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
        Schema::dropIfExists('cares');
    }
}
