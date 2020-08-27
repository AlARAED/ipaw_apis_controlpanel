<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Resources\Challenge as ChallengeResource;
use App\Models\Challenging;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\executewarning;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('locale/{locale}', function ($locale) {
   Session::put('locale',$locale);
       return redirect()->back();

   });


Route::get('/', function () {

    return view('welcome');

});




Route::group(['prefix'=>'admin','namespace'=>'Admin'], function () {
		Route::get('/login', 'AdminController@ShowformLogin')->name('admin.login');
	    Route::POST('/adminlogin', 'AdminController@adminLogin')->name('adminlogin');
         Route::post('/logout', 'AdminController@logout')->name('admin.logout');






 Route::group(['middleware' => 'auth:admin'], function () {
 	Route::get('/index', 'AdminController@index');
 	 Route::get('/members', 'AdminController@Members');
 	Route::post('/Changestatus/{id}', 'AdminController@Changestatus');
 	Route::get('/Changesettingadmin', 'AdminController@Change_Setting_Admin');
 	Route::post('/Changesettingadmin', 'AdminController@Change_Setting');
 	Route::post('/Changesettingadminimage', 'AdminController@Changesettingadminimage');
 	Route::post('/Changesettingadminpass', 'AdminController@Changesettingadminpass');
 	Route::get('/aboutus', 'AdminController@aboutus');
 	Route::post('/Changesettingadminabout', 'AdminController@Changesettingadminabout');
 	Route::get('/Changesettingadminpolicypage', 'AdminController@Changesettingadminaboutpage');
    Route::post('/Changesettingadminpolicy', 'AdminController@Changesettingadminpolicy');
    Route::get('/Categories', 'CategoryController@index');
    Route::POST('/removecategory/{id}', 'CategoryController@destroy');
    Route::POST('/storecategory', 'CategoryController@store');
    Route::get('/allcare/{id}', 'CareController@index');
    Route::POST('/removeca/{id}', 'CareController@destroy');
    Route::POST('/storeca', 'CareController@store');
    Route::POST('/edica/{id}', 'CareController@update');
    Route::get('/Character', 'CharacterController@index');
    Route::POST('/Changecharacter', 'CharacterController@update');
    Route::get('/allChallenge', 'challengController@index');
    Route::POST('/removechallenge/{id}', 'challengController@destroy');
    Route::POST('/storechalleng', 'challengController@store');
    Route::get('/storechalleng', 'challengController@indexstore');
    Route::POST('/edichalleng/{id}', 'challengController@update');
    Route::get('/edichalleng/{id}', 'challengController@edit');
    //Notification
    Route::get('/makasread', 'AdminController@makasread');
    Route::get('/all_animal_users', 'AllanimalController@index');
    Route::post('/removethisanimal/{id}', 'AllanimalController@destroy');
    Route::get('/all_library_image', 'LibraryImageController@index');
    Route::post('/removelibraryimage/{id}', 'LibraryImageController@destroy');
    Route::get('/allquestion', 'QuestionController@index');
    Route::post('/removequestion/{id}', 'QuestionController@destroy');
    Route::get('/questionwithanswer/{id}', 'QuestionController@show');
    Route::post('/storeanswer/{id}', 'QuestionController@storeanswerquestionadmin');
    ///food
    Route::get('/foodblog', 'FoodBlogController@index');
    Route::post('/removefoodblog/{id}', 'FoodBlogController@destroy');
    Route::get('/edifoodblog/{id}', 'FoodBlogController@edit');
    Route::POST('/ediFoodBlog/{id}', 'FoodBlogController@update');
    Route::get('/addfoodblog', 'FoodBlogController@show');
    Route::post('/addfoodblog', 'FoodBlogController@store');
    Route::get('/commentsfood/{id}', 'FoodBlogController@commentsfood');
    Route::post('/store/{id}', 'FoodBlogController@addcommentfoodblog');


    Route::get('/chainanimal', 'ChainAnimalController@index');
    Route::get('/addchainanimal', 'ChainAnimalController@show');
    Route::post('/addchainanimal', 'ChainAnimalController@store');
    Route::post('/removechainanimal/{id}', 'ChainAnimalController@destroy');
    Route::get('/edichainanimal/{id}', 'ChainAnimalController@edit');
    Route::post('/ediChainAnimal/{id}', 'ChainAnimalController@update');
     Route::get('/commentschainanimal/{id}', 'ChainAnimalController@commentschainanimal');
    Route::post('/store/{id}', 'ChainAnimalController@addcommentchainanimal');
    Route::get('/training', 'TrainingController@index');
    Route::post('/removeTrainin/{id}', 'TrainingController@destroy');
   Route::post('/storetrainig', 'TrainingController@store');
   Route::post('/editetraining/{id}', 'TrainingController@update');

//steps

    
    Route::get('/steps/{id}', 'TrainingController@indexsteps');
    Route::post('/removesteps/{id}', 'TrainingController@destrostepy');
    Route::post('/editestep/{id}', 'TrainingController@updatestep');
    Route::post('/storestep/{id}', 'TrainingController@storestep');
    Route::get('/vedio/{id}', 'TrainingController@indexvedio');
    Route::post('/removevedio/{id}', 'TrainingController@destroyvedio');

    Route::get('/all_animal_lost', 'LostAnimalController@index');
    Route::post('/removelostanimal/{id}', 'LostAnimalController@destroy');

    Route::get('/all_animal_findit', 'FindAnimalController@index');
   Route::post('/removefindanimal/{id}', 'FindAnimalController@destroy');

    Route::get('/all_animal_tabanaa', 'tabaneeAnimalController@index');
   Route::post('/removetabaneeanimal/{id}', 'tabaneeAnimalController@destroy');

    Route::get('/factory_myself', 'FactoryMyselfController@index');
    Route::post('/removefactory_myself/{id}', 'FactoryMyselfController@destroy');

    Route::get('/addfactory_myself', 'FactoryMyselfController@show');
    Route::post('/addfactory_myself', 'FactoryMyselfController@store');


    Route::get('/edifactory_myself/{id}', 'FactoryMyselfController@edit');
    Route::POST('/edifactory_myself/{id}', 'FactoryMyselfController@update');
    
    Route::get('/commentsfactory_myself/{id}', 'FactoryMyselfController@commentsfactory_myself');
    Route::post('/store/{id}', 'FactoryMyselfController@addcommentfactory_myself');

 Route::get('/maindepartment', 'MainDepartmentController@index');
    Route::POST('/removemaindepartment/{id}', 'MainDepartmentController@destroy');
    Route::POST('/storemaindepartment', 'MainDepartmentController@store');

 Route::get('/blogs', 'BlogsController@index');
    Route::post('/removeblogs/{id}', 'BlogsController@destroy');
    Route::get('/ediblogs/{id}', 'BlogsController@edit');
    Route::POST('/ediblogs/{id}', 'BlogsController@update');
    Route::get('/addblogs', 'BlogsController@show');
    Route::post('/addblogs', 'BlogsController@store');

    Route::post('removeclinic/{id}', 'suggestclincController@destroy');
    Route::get('suggestclinc', 'suggestclincController@index');
    
    Route::get('departchain', 'departchainController@index');
    Route::POST('/removedepartchain/{id}','departchainController@destroy');
    Route::POST('/storedepartchain', 'departchainController@store');





    




    






    


    


 	});

});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/allChallenge', 'Api\v1\challengeController@index');
Route::POST('/storecomments', 'Api\v1\CommentController@store');
Route::POST('/editecomments/{id}', 'Api\v1\CommentController@update');
Route::POST('/deletecomments/{id}', 'Api\v1\CommentController@destroy');
Route::get('/addlike/{id}', 'Api\v1\CommentController@addlike');






