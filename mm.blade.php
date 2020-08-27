<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;


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


// Route::pattren('alaa','[a-z]+');


Route::get('/page/{url_category}', 'HomeController@singel_page')->name('singel_page');

Route::get('/pages/{url_category}', 'HomeController@singel_pagech')->name('singel');


Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);


    return redirect()->back();
});


Route::get('/', 'HomeController@indexsi')->name('index');


Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function () {
    Route::get('/login', 'HomeAdminContoller@ShowformLogin')->name('admin.login');
    Route::POST('/adminlogin', 'HomeAdminContoller@adminLogin')->name('adminlogin');
    Route::post('/logout', 'HomeAdminContoller@logout')->name('admin.logout');


    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/index', 'HomeAdminContoller@index');
        Route::get('/MyProfile', 'HomeAdminContoller@MyProfile');
        Route::post('/Changesettingadmin', 'HomeAdminContoller@Changesettingadmin');
        Route::post('/Changesettingadminimage', 'HomeAdminContoller@Changesettingadminimage');
        Route::post('/Changesettingadminpass', 'HomeAdminContoller@Changesettingadminpass');
        Route::get('/WebsiteSettings', 'HomeAdminContoller@WebsiteSettings');
        Route::post('/Changesettingwebs', 'HomeAdminContoller@Changesettingwebs');
        Route::post('/Changesettingaweblogo', 'HomeAdminContoller@Changesettingaweblogo');
        Route::get('/slide', 'SlideController@index');
        Route::post('/ChangeSliderSection', 'SlideController@update');
        Route::get('/services', 'ServiceController@index');
        Route::post('/editeservice/{id}', 'ServiceController@update');
        Route::get('/aboutus', 'AboutSectionController@index');
        Route::post('/Changeseaboutussection', 'AboutSectionController@update');
        Route::get('/Category', 'CategoryController@index');
        Route::post('/addCategory', 'CategoryController@store');
        Route::post('/editeCategor/{id}', 'CategoryController@update');
        Route::post('/removeCategor/{id}', 'CategoryController@destroy');
        //Refrenc
        Route::get('/Refrenc', 'RefrenceController@index');
        Route::post('/editRefrenc/{id}', 'RefrenceController@update');
        Route::post('/removeRefrenc/{id}', 'RefrenceController@destroy');
        Route::post('/addRefrenc', 'RefrenceController@store');

        //Contact
        Route::get('/Contact', 'ContactusController@index');
        Route::post('/contact', 'ContactusController@store');
        Route::post('/removeConactus/{id}', 'ContactusController@destroy');


        //brands
        Route::get('/brands', 'BrandController@index');
        Route::post('/brands', 'BrandController@store');
        Route::post('/removebrands/{id}', 'BrandController@destroy');
        Route::get('/makasread', 'HomeAdminContoller@makasread');
        //Features
        Route::get('/Features', 'FeaturesController@index');
        Route::post('/editeFeature/{id}', 'FeaturesController@update');
        //Page
        Route::get('/NewPage', 'PagesController@index');
        Route::post('/NewPage', 'PagesController@store');
        Route::get('/All_Main_Pages', 'PagesController@show');
        Route::get('/editemainpage/{id}', 'PagesController@showedit');
        Route::post('/editemainpage/{id}', 'PagesController@update');
        Route::post('/removePage/{id}', 'PagesController@destroy');

        //submenue
        Route::get('/NewsubMenuPage', 'ChildController@index');
        Route::post('/NewsubMenuPage', 'ChildController@store');
        Route::get('/All_subMain_Pages', 'ChildController@show');
        Route::get('/editesubmainpage/{id}', 'ChildController@showedit');
        Route::post('/removecheldPage/{id}', 'ChildController@destroy');

        Route::post('/editesubmainpage/{id}', 'ChildController@update');


    });

});

Route::get('login', function () {
    return view('welcome');
})->name('login');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/donecontact', 'admin\ContactusController@show');

Route::get('/Refrence', 'admin\RefrenceController@show');


Route::get('/brandspage', 'HomeController@brandspage');
Route::get('/aboutpage', 'HomeController@aboutpage');
Route::get('/contactus', 'HomeController@contactus');





