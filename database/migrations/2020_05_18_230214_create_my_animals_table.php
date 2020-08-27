<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_animals', function (Blueprint $table) {
            $table->id();
             $table->string('name');
            $table->text('description');
             $table->date('birth');
            $table->string('gender');
             $table->unsignedBigInteger('category_id');
             $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade');
            $table->string('image');
              $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
           
            $table->softDeletes();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_animals');
    }
}
