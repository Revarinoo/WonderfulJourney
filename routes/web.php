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



Route::get('/','HomeController@index')->name('home');

Route::get('/about', 'HomeController@about')->name('about');
Route::resource('user', 'UserController');
Route::resource('user/article','BlogController');
Route::get('/article/{article}','BlogController@fullstory')->name('article.fullstory');
Route::get('/article/category/{article}', 'BlogController@categorize')->name('article.categorize');

Route::group(['middleware'=>['isAdmin']],function (){
    Route::get('/admin/user','AdminController@listUser')->name('admin.listuser');
    Route::delete('/admin/user/{user}','AdminController@destroyUser')->name('admin.destroyUser');
    Route::get('/admin/category/list','CategoryController@show')->name('admin.category');
    Route::get('/admin/category/create','CategoryController@create')->name('admin.createcategory');
    Route::post('/admin/category','CategoryController@store')->name('admin.storecategory');
    Route::delete('/admin/category/{category}','CategoryController@destroy')->name('admin.deletecategory');
});

Auth::routes();
Route::group([
    'middleware'=>['auth']
], function (){
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});
