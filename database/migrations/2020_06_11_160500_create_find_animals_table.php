<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFindAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('find_animals', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('age');
            $table->string('findplace');
            $table->string('no_mobile');
            $table->string('image');
             $table->unsignedBigInteger('category_id');
             $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade');
            $table->text('note');


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
        Schema::dropIfExists('find_animals');
    }
}
