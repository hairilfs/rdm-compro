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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/projects', 'ProjectController@index');
Route::get('/project/ongoing', 'ProjectController@ongoing');
Route::get('/project/{slug}', 'ProjectController@show');

Route::get('/about/{section?}', 'AboutController@index');
Route::post('/about/partner', 'AboutController@partner');

Route::get('/contact', 'ContactController@index');

Route::post('/talk', 'TalkController@save');

Route::get('email', function (){
        return new \App\Mail\Talk(1);
	// \Mail::to('hairilfiqri@gmail.com')
 //        ->send(new \App\Mail\Talk(1));
});