<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\FoodBlog;


class CreateFoodBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_blogs', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('image');
            $table->text('short_desc_ar');
            $table->text('short_desc_en');
            $table->text('content_ar');
            $table->text('content_en');
            $table->softDeletes();
            $table->timestamps();
        });



           FoodBlog::create([
            'name_ar' => 'وجبة خاصة للكلاب',
            'name_en' => 'A special meal for dogs', 
            'image' => 'dog.jpg',
            'short_desc_ar' => 'وجبة خاصة للكلاب',
            'short_desc_en' => 'A special meal for dogs',
            'content_ar' => ' المحتويات : لحم مفروم , جزر , بطاطا , بقصم مطحون , زيت , ملح , فلفل اخضر بارد , بيض (المقادير حسب الكمية) 
** يرجى ارسال تجربتك للصفحة في حالة صنع الوجبة لكلبك **
 ملاحظات عن الوجبة :
*هذه الوجبة خاصة ( اسبوعية ربما او شهرية ) لاتقدم بشكل يومي 
*تقسم الى عدة وجبات حسب الكمية المصنوعة 
*تترك في الفرن حتى تشوى بشكل كامل 
*عدم اضافة ملح كثير لان كثرته تضر الكلاب 
*الوجبة تحتوي على فيتامينات كثيره ويمكن الاستغناء عن بعض المحتويات او اضافة محتويات اخرى 
*يمكن اضافة الاكل الجاف مع الوجبة او الرز المسلوق 
*صالحة للجراء والكبار لجميع انواع الكلاب',
             'content_en' => 'Contents: minced meat, carrots, potatoes, crushed oil, oil, salt, cold green pepper, eggs (ingredients according to quantity)
** Please send your experience to the page in case of making the meal for your dog **
  Meal notes:
* This meal is special (maybe weekly or monthly) and is not served on a daily basis
* Divided into several meals according to the quantity made
* Leave it in the oven until fully roasted
* Do not add too much salt, because it causes more harm to dogs
* The meal contains many vitamins and can be dispensed with some of the contents or add other contents
* You can add dry food with a meal or boiled rice
* Valid for puppies and adults for all types of dogs',
              
              
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_blogs');
    }
}
