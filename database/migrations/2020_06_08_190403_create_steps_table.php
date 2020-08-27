<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Steps;


class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steps', function (Blueprint $table) {
            $table->id();
            $table->text('content_ar');

            $table->text('content_en');

            $table->string('image');
               $table->unsignedBigInteger('training_id');
            $table->foreign('training_id')->references('id')->on('trainings')
                ->onDelete('cascade');
            $table->softDeletes();


            $table->timestamps();
        });




          Steps::create([
            'content_ar' => 'التأكد من عمره',
            'content_en' => 'confirm this fit for his age',
            'image' => 'logo.png',
            'training_id' => 1,

              
              
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('steps');
    }
}
