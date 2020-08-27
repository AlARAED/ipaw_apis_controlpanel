<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\FactoryMyself;

class CreateFactoryMyselvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factory_myselves', function (Blueprint $table) {
            $table->id();
            $table->text('content_ar');
            $table->text('content_en');
            $table->string('image');

             $table->softDeletes();
            $table->timestamps();
        });



          FactoryMyself::create([
            'content_ar' => 'التأكد من عمره',
            'content_en' => 'confirm this fit for his age',
            'image' => 'logo.png',

              
              
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factory_myselves');
    }
}
