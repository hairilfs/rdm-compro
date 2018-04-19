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

Route::get('/partner/list', 'PartnerController@list');
Route::post('/partner/sort', 'PartnerController@sort');
Route::post('/partner/delete', 'PartnerController@delete');
Route::get('/partner', 'PartnerController@index');
Route::post('/partner', 'PartnerController@save');

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
Route::post('/module/sort', 'ModuleController@sort');
Route::post('/module/delete', 'ModuleController@delete');
Route::get('/module/{category}/{id?}', 'ModuleController@index');
Route::post('/module/{category}/{id?}', 'ModuleController@save');

Route::get('/talk', 'TalkController@index');
Route::get('/talk/datatables', 'TalkController@datatables');
Route::get('/talk/form/{cid?}', 'TalkController@show');
Route::post('/talk/form/{cid?}', 'TalkController@save');

Route::get('/setting', 'SettingController@index');
Route::post('/setting', 'SettingController@save');

// -------------------------
Route::get('/about/who-testimony', 'AboutController@testimony');
Route::get('/about/who-testimony/datatables', 'AboutController@testimonyDatatables');
Route::get('/about/who-testimony/delete/{id}', 'AboutController@deleteTestimony');
Route::get('/about/who-testimony/form/{id?}', 'AboutController@showTestimony');
Route::post('/about/who-testimony/form/{id?}', 'AboutController@saveTestimony');
// -------------------------
Route::get('/about/who-people', 'AboutController@people');
Route::get('/about/who-people/datatables', 'AboutController@peopleDatatables');
Route::get('/about/who-people/delete/{id}', 'AboutController@deletePeople');
Route::get('/about/who-people/form/{id?}', 'AboutController@showPeople');
Route::post('/about/who-people/form/{id?}', 'AboutController@savePeople');
// -------------------------
Route::get('/about/who-scope', 'AboutController@scope');
Route::get('/about/who-scope/datatables', 'AboutController@scopeDatatables');
Route::get('/about/who-scope/delete/{id}', 'AboutController@deleteScope');
Route::get('/about/who-scope/form/{id?}', 'AboutController@showScope');
Route::post('/about/who-scope/form/{id?}', 'AboutController@saveScope');
// -------------------------
Route::get('/about/{section}', 'AboutController@intro');
Route::post('/about/{section}', 'AboutController@save');