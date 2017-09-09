<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home/{forum_id?}/{thread_id?}', 'HomeController@index')->name('home');
Route::get('/update_fcm_token', 'HomeController@update_token');

Route::get('/api/fech_form', 'ApiController@fetch_forum')->name('fetch_forum');
Route::resource('threads', 'ThreadController');
Route::resource('posts', 'PostController');
Route::get('profile','HomeController@profile')->name("profile");
Route::post('follow', 'HomeController@follow')->name("follow");
Route::post('edit_profile','HomeController@edit_profile')->name("edit_profile");
Route::get('like','HomeController@like_ajax')->name('like_ajax');
