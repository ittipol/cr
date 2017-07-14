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

Route::get('image/{file}', 'StaticFileController@serveImages');

Route::group(['prefix' => 'api/v1', 'middleware' => 'api'], function () {
  Route::get('get_district/{provinceId}', 'ApiController@getDistrict');
});

Route::group(['namespace' => 'admin', 'prefix' => 'admin'], function (){
  Route::get('login', 'AdminController@login');
  Route::post('login', 'AdminController@authenticate');

  Route::get('logout', 'AdminController@logout');
});

Route::group(['middleware' => 'admin.auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function ()
{
  Route::get('dashboard', 'DashboardController@index');

  Route::get('charity/list', 'CharityController@listView');
  Route::get('charity/add', 'CharityController@add');
  Route::post('charity/add', 'CharityController@addingSubmit');
  Route::get('charity/edit/{id}', 'CharityController@edit');
  Route::patch('charity/edit/{id}', 'CharityController@editingSubmit');
  Route::get('charity/delete/{id}', 'CharityController@delete');

  Route::get('stock_image/list', 'StockImageController@listView');
  Route::get('stock_image/add', 'StockImageController@add');
  Route::post('stock_image/add', 'StockImageController@addingSubmit');
  // Route::get('edit', 'CharityController@edit');
  // Route::post('edit', 'CharityController@editingSubmit');
  // Route::get('delete', 'CharityController@delete');

  Route::get('project/list', 'ProjectController@listView');
  Route::get('project/add', 'ProjectController@add');
  Route::post('project/add', 'ProjectController@addingSubmit');
  Route::get('project/edit/{id}', 'ProjectController@edit');
  Route::patch('project/edit/{id}', 'ProjectController@editingSubmit');
  Route::get('project/delete/{id}', 'ProjectController@delete');

  Route::get('news/list', 'NewsController@listView');
  Route::get('news/add', 'NewsController@add');
  Route::post('news/add', 'NewsController@addingSubmit');
  Route::get('news/edit/{id}', 'NewsController@edit');
  Route::patch('news/edit/{id}', 'NewsController@editingSubmit');
  Route::get('news/delete/{id}', 'NewsController@delete');

  // Route::get('donation_inform/list', 'DonationController@listView');
});

Route::group(['middleware' => ['admin.auth'], 'namespace' => 'Admin', 'prefix' => 'admin'],  function () {
  Route::post('stock_image/upload', 'StockImageController@upload');
});

// =====================================================================

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'guest'], function () {
  Route::get('/login', 'UserController@login');
  Route::post('/login', 'UserController@authenticate');

  Route::get('/register', 'UserController@register');
  Route::post('/register', 'UserController@registering');
});


Route::get('charity/list', 'CharityController@listView');
Route::get('charity/{id}', 'CharityController@index');

Route::get('charity/project/list', 'ProjectController@listView');
Route::get('charity/project/{id}', 'ProjectController@index');

Route::get('donate', 'DonateController@index');
Route::post('donate', 'DonateController@donationSubmit');

Route::get('donate/{code}', 'DonateController@complete');