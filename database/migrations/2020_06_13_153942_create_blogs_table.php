<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->text('content_ar');
            $table->text('content_en');
            $table->string('image');
             $table->unsignedBigInteger('main_department_id');
             $table->foreign('main_department_id')->references('id')->on('main_departments')
                ->onDelete('cascade');
            $table->text('short_desc_ar');
            $table->text('short_desc_en');
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
        Schema::dropIfExists('blogs');
    }
}
