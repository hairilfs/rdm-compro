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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::get('/slider/{category}/list', 'SliderController@list');
Route::post('/slider/{category}/sort', 'SliderController@sort');
Route::post('/slider/{category}/delete', 'SliderController@delete');
Route::get('/slider/{category}', 'SliderController@index');
Route::post('/slider/{category}', 'SliderController@save');

Route::get('/project', 'ProjectController@index');
Route::get('/project/datatables', 'ProjectController@datatables');
Route::get('/project/form/{cid?}', 'ProjectController@show');
Route::post('/project/form/{cid?}', 'ProjectController@save');

Route::get('/project-category/list', 'ProjectCategoryController@list');
Route::post('/project-category/sort', 'ProjectCategoryController@sort');
Route::get('/project-category/{cid}/delete', 'ProjectCategoryController@delete');
Route::get('/project-category/{cid?}/{edit?}', 'ProjectCategoryController@index');
Route::post('/project-category/{cid?}/{edit?}', 'ProjectCategoryController@save');

Route::get('/module/list/{project_cid?}', 'ModuleController@list');
Route::get('/module/{category}/{id?}', 'ModuleController@index');
Route::post('/module/{category}/{id?}', 'ModuleController@save');

Route::get('/setting', 'SettingController@index');
Route::post('/setting', 'SettingController@save');