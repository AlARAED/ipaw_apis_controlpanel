<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExecuteTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('execute_trainings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('my_animal_id');
            $table->foreign('my_animal_id')->references('id')->on('my_animals')
                ->onDelete('cascade');
            $table->unsignedBigInteger('training_id');
            $table->foreign('training_id')->references('id')->on('trainings')
                ->onDelete('cascade');

            $table->integer('evalute')->default(0);



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
        Schema::dropIfExists('execute_trainings');
    }
}
