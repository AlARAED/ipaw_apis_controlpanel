<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExecutewarningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executewarnings', function (Blueprint $table) {
            $table->id();
              $table->unsignedBigInteger('care_id');
             $table->foreign('care_id')->references('id')->on('cares')
                ->onDelete('cascade');
            $table->unsignedBigInteger('my_animal_id');
            $table->foreign('my_animal_id')->references('id')->on('my_animals')
                ->onDelete('cascade');

          $table->enum('typerepeat', ['daily', '2day','3day','4day','weakly','2weak','3weak','monthly','2month','3month','6month' ,'yearly']);
         $table->timestamp('startdate');
        $table->timestamp('newdate')->nullable();
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
        Schema::dropIfExists('executewarnings');
    }
}
