<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentChainAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_chain_animals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');


            $table->unsignedBigInteger('chain_animal_id');
            $table->foreign('chain_animal_id')->references('id')->on('chain_animals')
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
        Schema::dropIfExists('comment_chain_animals');
    }
}
