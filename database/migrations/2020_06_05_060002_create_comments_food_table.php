<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_food', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');


            $table->unsignedBigInteger('food_blog_id');
            $table->foreign('food_blog_id')->references('id')->on('food_blogs')
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
        Schema::dropIfExists('comments_food');
    }
}
