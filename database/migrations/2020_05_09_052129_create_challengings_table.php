<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Challenging;


class CreateChallengingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challengings', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->text('content_ar');
            $table->text('content_en');
            $table->string('image');
            $table->timestamp('enddate');
            $table->unsignedBigInteger('user_id')->nullable();
          
             $table->string('status')->default(1);

            $table->timestamps();
        });


         Challenging::create([
            'name_ar' => 'افضل عناية بالقطط ',
            'name_en' => 'best care of cats',
            'content_ar'=>'=====',
            'content_en'=>'=====',
            'image' => 'Fruits.jpg',
            'enddate'=>'2020-05-12 04:03:13',
            'status'=>'1',//1 acive 0 end
            'user_id'=>null
            

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challengings');
    }
}
