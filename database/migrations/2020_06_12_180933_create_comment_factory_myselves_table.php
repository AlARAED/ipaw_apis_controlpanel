<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentFactoryMyselvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_factory_myselves', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');


            $table->unsignedBigInteger('factory_myself_id');
            $table->foreign('factory_myself_id')->references('id')->on('factory_myselves')
                ->onDelete('cascade');


            $table->text('comment');

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
        Schema::dropIfExists('comment_factory_myselves');
    }
}
