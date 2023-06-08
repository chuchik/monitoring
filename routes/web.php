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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/administration', 'Administration@index')->name('administration');

Route::get('/agents', 'AgentController@index')->name('agents');
Route::post('/agent/{id}', 'AgentController@update')->name('agent_update');
Route::get('/agent/{id}/details', 'AgentController@getdetails')->name('agent_details');
Route::get('/agent/{id}', 'AgentController@get')->name('agent_update_form');
Route::get('/agent', 'AgentController@createForm')->name('create_agent_form');
Route::post('/agent', 'AgentController@create')->name('create_agent');
Route::get('/agent/log/{id}', 'AgentController@log')->name('agent_log');

Route::get('/sites', 'SiteController@index')->name('sites');
Route::get('/site/{id}', 'SiteController@get')->name('site_update_form');
Route::post('/site/{id}', 'SiteController@update')->name('site_update');
Route::get('/site', 'SiteController@createForm')->name('create_site_form');
Route::post('/site', 'SiteController@create')->name('create_site');

