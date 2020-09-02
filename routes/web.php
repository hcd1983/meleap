<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/MailTest','meleap@MailTest')->name('mailtest');
Route::post('/FormSubmit','meleap@FormSubmit')->name('FormSubmit');

Route::get('/mobile',function(){
    return view("mobile");
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/recache-all', 'meleap@recache')->name('recache');



Route::get('/test',"meleap@test")->name("test");

Route::get('/',"meleap@index")->name('index');
Route::get('/join-us',"meleap@index");

Route::get('/{locale}/about',"meleap@company")->name("about");
Route::get('/{locale}/contact',"meleap@contact")->name("contact");
Route::get('/{locale}/product/{slug?}', "meleap@product")->name("product");
//Route::get('/{locale}/news',"meleap@news")->name("news");
//Route::get('/{locale}/news/{slug}',"meleap@news_single")->name("news-single");

Route::get('/{locale}/news_api/category/{slug?}',"meleap@news_api_category")->name("news_api_category");
Route::get('/{locale}/search/{query?}',"meleap@search")->name("search");
Route::get('/{locale}/news_api',"meleap@news_api")->name("news_api");
Route::get('/{locale}/news_api/{id?}',"meleap@news_single_api")->name("news_single_api");

Route::get('/{locale}',"meleap@index")->name('home');





//Route::get('/about',"meleap@company")->name("company");
//Route::get('/contact',"meleap@contact")->name("contact");
//Route::get('/product/{slug}', "meleap@product")->name("product");
//Route::get('/news',"meleap@news")->name("news")->name("news");
//Route::get('/news/{slug}',"meleap@news_single")->name("news-single");


//Route::get('/news_api',"meleap@news_api")->name("news_api");
//Route::get('/news_api/{id}',"meleap@news_single_api")->name("news_single_api");




Route::get('/canvas',function (){
    return view("canvas");
});



