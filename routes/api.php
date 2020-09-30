
<?php




Route::POST('v1/register','Api\V1\UserController@store');
Route::post('/login','Api\V1\UserController@login');
Route::post('v1/resetpassword', 'Api\V1\UserController@resetpassword');
Route::get('v1/alluser', 'Api\V1\UserController@alluser');

Route::post('v1/save-fcm-token', 'Api\V1\UserController@SaveFCMToken');


// Route::get('v1/locale/{locale}', function ($locale) {
//    Session::put('locale',$locale);
//        return redirect()->back();

//    });


Route::group(['prefix' => 'v1' , 'namespace' => 'Api\V1' ,'middleware' => ['auth:api']], function () {

Route::get('user','UserController@index');
Route::get('user/{id}','UserController@show');
Route::get('userauth','UserController@userauth');


Route::get('aboutus','AboutusController@getall');
Route::get('changechararcter','characterController@getall');
Route::get('allchallengeWithComment','ChallengeController@index');
Route::POST('storecomments', 'CommentController@store');
Route::post('editecomments/{id}','CommentController@update');
Route::post('deletecomments/{id}','CommentController@destroy');
Route::get('addlike/{idc}/{idch}','CommentController@addlike');
Route::get('alllike/{idc}', 'CommentController@alllike');
Route::post('changesettinguser','UserController@changesettinguser');
Route::POST('storemyanimal', 'MyAniamlController@store');
Route::get('allmyanimal', 'MyAniamlController@index');
Route::get('myanimal/{id}', 'MyAniamlController@show');

Route::post('edit_my_animal/{id}','MyAniamlController@update');
Route::post('allevaluate_animal/{id}','MyAniamlController@allevaluate_animal');

Route::post('delete_my_animal/{id}','MyAniamlController@destroy');



Route::get('allcategory', 'CategoryController@index');

Route::post('logout', 'UserController@logoutApi');

/////

Route::get('challenges/{id}', 'challengeController@show');

Route::get('libraryimage', 'LibraryImageController@index');
Route::post('libraryimage', 'LibraryImageController@store');
Route::delete('removelibraryimage/{id}', 'LibraryImageController@destroy');
Route::get('allnotification', 'UserController@allnotification');
Route::delete('deletecomments/{id}', 'MyAniamlController@destroy');

//questions

Route::POST('addquestion', 'QuestionController@store');
Route::get('allquestion', 'QuestionController@index');
Route::get('allquestionprivate', 'QuestionController@indexprivate');


Route::delete('removequestion/{id}', 'QuestionController@destroy');
Route::POST('addanswerquestion', 'QuestionController@storeanswerquestion');


 Route::get('/foodblog', 'FoodBlogController@index');
 Route::get('/foodblog/{id}', 'FoodBlogController@show');
 Route::post('addcommentfoodblog', 'FoodBlogController@addcommentfoodblog');
  Route::post('/searchfoodblog', 'FoodBlogController@searchfoodblog');


 //chainanimal
  Route::get('/allchainanimalcategory/{id}', 'ChainAnimalController@index');
   Route::get('/chainanimal/{id}', 'ChainAnimalController@show');

 Route::post('addcommentchainanimal', 'ChainAnimalController@addcommentchainanimal');
 Route::post('addexecutingtraining', 'TrainingController@store');
    Route::get('alltraining', 'TrainingController@index');
    Route::post('searchalltraining', 'TrainingController@searchalltraining');

    Route::get('alltstep/{id}', 'TrainingController@indexsteps');
    Route::post('uploadvedio', 'TrainingController@storevedio');
    Route::get('allvedio/{id}', 'TrainingController@allvedio');
    Route::post('deltemyvedio/{id}', 'TrainingController@deltemyvedio');
    Route::post('addlostanimal', 'LostAnimalController@store');
    Route::get('alllostanimal', 'LostAnimalController@alllostanimal');
    Route::get('lostanimal/{id}', 'LostAnimalController@show');
    Route::post('editlostanimal/{id}', 'LostAnimalController@update');



    Route::post('findlostanimal/{id}', 'LostAnimalController@destroy');


    Route::post('addfindanimal', 'findtAnimalController@store');
    Route::get('allfindanimal', 'findtAnimalController@allfindanimal');
    Route::post('recivedanimal/{id}', 'findtAnimalController@destroy');



    Route::post('addtabaneeanimal', 'tabaneeAnimalController@store');
    Route::get('alltabaneeanimal', 'tabaneeAnimalController@alltabaneeanimal');
    Route::post('donetabaneeanimal/{id}', 'tabaneeAnimalController@destroy');


 Route::get('/factory_myself', 'FactoryMyselfController@index');
 Route::get('/factory_myself/{id}', 'FactoryMyselfController@show');
 Route::post('addcommentfactory_myself', 'FactoryMyselfController@addcommentfactory_myself');

    
    Route::get('/allmaindepartment', 'BlogsController@allmaindepartment');

 Route::get('/allblogs/{idmaindep}', 'BlogsController@index');
 Route::get('/blog/{id}', 'BlogsController@show');
 Route::post('suggestclinc', 'suggestclincController@store');

    Route::post('addexecutingwarning', 'executewarningcontroller@store');
    Route::get('/allexecutingwarning/{idanimal}', 'executewarningcontroller@index');
    Route::post('removeecutingwarning/{id}', 'executewarningcontroller@destroy');
    Route::post('editeecutingwarning/{id}','executewarningcontroller@update');
    Route::post('Donewarning/{id}','executewarningcontroller@Donewarning');


     Route::get('allcarebycategory/{id}','CategoryController@allcarebycategory');

     //loqah
     Route::get('/loqah/{idanimal}', 'loqshcontroller@index');

     Route::post('addeloqah', 'loqshcontroller@store');
     Route::post('editeloqah/{idloqah}', 'loqshcontroller@update');
    Route::post('removeloqah/{idloqah}', 'loqshcontroller@destroy');

    Route::post('search', 'UserController@search');
    Route::get('userfrind', 'UserController@userfrind');
    Route::post('addfrind/{idfrind}', 'UserController@addfrind');

    Route::post('removefrind/{idfrind}', 'UserController@removefrind');


    //////api 
    Route::get('departchains','departchainController@index');

    Route::POST('storecommentshare', 'CommentShareController@store');
    Route::post('editecommentshare/{id}','CommentShareController@update');
    Route::post('deletecommentshare/{id}','CommentShareController@destroy');
    


    Route::post('searchuserwithanimal/{id}', 'UserController@searchuserwithanimal');



    Route::post('searchblog', 'BlogsController@searchblog');









});
?>