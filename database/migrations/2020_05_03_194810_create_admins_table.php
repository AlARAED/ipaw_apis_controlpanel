<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin;
class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image');
            $table->date('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->string('emailsite');
            $table->string('imageabout');
            $table->text('aboutsite_en');
            $table->text('aboutsite_ar');
            $table->string('Watsapp');
            $table->string('imagepolicy');
            $table->text('policy_ar')->nullable();
            $table->text('policy_en')->nullable();
            $table->rememberToken();

            $table->timestamps();
        });

           Admin::create([
            'name' => 'ahmad',
            'email' => 'ipaw@i.com',
            'password' => Hash::make('123456'),
            'image' => 'logo.png',
            'emailsite'=>'Support@i-paw.com',
            'aboutsite_ar'=>'تطبيق  ipaw يدعم الحيوانات وكل ما يخص فيهم ',
            'aboutsite_en'=>'ipaw application for all kind of animals',
            'Watsapp'=>'+06477123480864',
            'imageabout'=>'PETA-Zoom-Background.jpg',
            'imagepolicy'=>'PETA-Zoom-Background.jpg',
            'policy_ar'=>'بدأت قصتنا بحبنا للحيوانات واحساسنا بـ انها تمثل جزء من الأسرة مثلها مثل أي فرد في العائلة وإنهم يستحقون نفس القدر من الرعاية والحب.
ولإننا نحب الحيوانات ونهتم بـ رعايتها قررنا ان نقوم بعمل شيء جديد وغير مسبوق في العناية في الحيوان حيث تم نشر اول موقع الكتروني سنة 2015 للتذكير بموعد تطعيم الحيوان الاليف وتسجيل التطعيمات الكترونيا والتذكير الطبي للعلاجات والتطعيمات ولكن لم يكن هذا هدفنا فقط, بل كنا نطمح لصنع شيء افضل واكثر عناية بالحيوانات لذلك قمنا بالعمل على فكرة تطبيق I Paw الذي بدأ العمل عليه على ان يكون افضل تطبيق عالميا للعناية بالحيوانات بشكل كامل حيث حاولنا توفير كل شيء تحتاجوه عن تربية الحيوان في مكان واحد فقط ويعتبر من اول التطبيقات عالميا في العناية بالحيوانات الذي يدعم اللغة العربية والانجليزية.
لماذا I Paw :
يعتبر I Paw  اول تطبيق يقوم بالعناية بحيواناتكم الاليفة بشكل كامل ولكافة المستويات, حيث استخدمنا تجاربنا السابقة في تربية الحيوانات مع بعض الخبرات التي تم دراستها بشكل دقيق ومفصل لصناعة تطبيق يقوم بمساعدة المربين بكافة المستويات بالعناية بحيواناتهم وابقائهم بأفضل صحة ممكنة , حيث يتم الاستعانة باشخاص فائقي المهارة لصناعة محتوى التطبيق وايضا توفير اطباء بيطريين محترفين للرد على اسئلتكم ونشر الارشادات الطبية بشكل دوري , ويسعدنا اننا قمنا بصناعة افضل تطبيق رعاية للحيوانات الاليفة على هواتفكم المحمولة.
',
            'policy_en'=>'It all began with our love for animals and our feeling that they are part of the family just like everyone in the family and they deserve just as much care and love.
because of this, we decided to do something new and unprecedented in animal e-care, as our  first website was published in 2015 to remind the date of pet vaccination and to register vaccinations electronically and medical reminders of treatments and vaccinations, but that was not our main goal, we aspired to make something biggest and be more helpful for pet breeder, so we worked on the idea of I Paw application, which started working on it to be the best global application for animal care, as we tried to provide everything you need as a pet breeder in only one place, and it’s one of the first global applications in animal care that support both Arabic and English languages.
Why I Paw:
I Paw is the first application that takes full care of your pets at all levels, where we used our previous experiences in animal husbandry with some of the experiences that were studied in a precise and detailed way to create an application that helps all pet breeders at all levels to take care of their animals and keep them in the best possible health life, where also use professional breeders to create the content of the application and also provide professional veterinarians to answer your questions and publish medical advice periodically, we are pleased that we have create the best application of pet care on your own mobile device.
',

        ]);
    }




     

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
