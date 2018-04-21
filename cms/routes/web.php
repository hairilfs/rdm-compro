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

/*
|--------------------------------------------------------------------------
| ABOUT WHO
|--------------------------------------------------------------------------
*/
Route::get('/about/who-testimony', 'AboutWhoController@testimony');
Route::get('/about/who-testimony/datatables', 'AboutWhoController@testimonyDatatables');
Route::get('/about/who-testimony/delete/{id}', 'AboutWhoController@deleteTestimony');
Route::get('/about/who-testimony/form/{id?}', 'AboutWhoController@showTestimony');
Route::post('/about/who-testimony/form/{id?}', 'AboutWhoController@saveTestimony');
// -------------------------
Route::get('/about/who-people', 'AboutWhoController@people');
Route::get('/about/who-people/datatables', 'AboutWhoController@peopleDatatables');
Route::get('/about/who-people/delete/{id}', 'AboutWhoController@deletePeople');
Route::get('/about/who-people/form/{id?}', 'AboutWhoController@showPeople');
Route::post('/about/who-people/form/{id?}', 'AboutWhoController@savePeople');
// -------------------------
Route::get('/about/who-scope', 'AboutWhoController@scope');
Route::get('/about/who-scope/datatables', 'AboutWhoController@scopeDatatables');
Route::get('/about/who-scope/delete/{id}', 'AboutWhoController@deleteScope');
Route::get('/about/who-scope/form/{id?}', 'AboutWhoController@showScope');
Route::post('/about/who-scope/form/{id?}', 'AboutWhoController@saveScope');
// -------------------------
Route::get('/about/who-partner/list', 'AboutWhoController@listPartner');
Route::post('/about/who-partner/sort', 'AboutWhoController@sortPartner');
Route::post('/about/who-partner/delete', 'AboutWhoController@deletePartner');
Route::get('/about/who-partner', 'AboutWhoController@indexPartner');
Route::post('/about/who-partner', 'AboutWhoController@savePartner');
// -------------------------
Route::get('/about/{section}', 'AboutWhoController@intro')->where('section', '^([0-9A-Za-z\-]+)?who([0-9A-Za-z\-]+)?');;
Route::post('/about/{section}', 'AboutWhoController@save')->where('section', '^([0-9A-Za-z\-]+)?who([0-9A-Za-z\-]+)?');;

/*
|--------------------------------------------------------------------------
| ABOUT WHAT
|--------------------------------------------------------------------------
*/
Route::get('/about/what-content', 'AboutWhatController@showContent');
// -------------------------
Route::get('/about/{section2}', 'AboutWhatController@index')->where('section2', '^([0-9A-Za-z\-]+)?what([0-9A-Za-z\-]+)?');
Route::post('/about/{section2}', 'AboutWhatController@save')->where('section2', '^([0-9A-Za-z\-]+)?what([0-9A-Za-z\-]+)?');

/*
|--------------------------------------------------------------------------
| ABOUT HOW
|--------------------------------------------------------------------------
*/
Route::get('/about/how-content', 'AboutHowController@showContent');
// -------------------------
Route::get('/about/{section3}', 'AboutHowController@index')->where('section3', '^([0-9A-Za-z\-]+)?how([0-9A-Za-z\-]+)?');
Route::post('/about/{section3}', 'AboutHowController@save')->where('section3', '^([0-9A-Za-z\-]+)?how([0-9A-Za-z\-]+)?');

/*
|--------------------------------------------------------------------------
| ABOUT WHY
|--------------------------------------------------------------------------
*/
Route::get('/about/why-content', 'AboutWhyController@showContent');
// -------------------------
Route::get('/about/{section4}', 'AboutWhyController@index')->where('section4', '^([0-9A-Za-z\-]+)?why([0-9A-Za-z\-]+)?');
Route::post('/about/{section4}', 'AboutWhyController@save')->where('section4', '^([0-9A-Za-z\-]+)?why([0-9A-Za-z\-]+)?');