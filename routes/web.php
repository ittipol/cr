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

Route::group(['namespace' => 'admin', 'prefix' => 'admin'], function ()
{
  Route::get('login', 'AdminController@login');
});

Route::group([/*'middleware' => 'admin', */'namespace' => 'Admin', 'prefix' => 'admin'], function ()
{
  Route::get('menu', 'MenuController@index');

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

  Route::get('goal/list', 'ProjectController@listView');
  Route::get('goal/add', 'ProjectController@add');
  Route::post('goal/add', 'ProjectController@addingSubmit');
  Route::get('goal/edit/{id}', 'ProjectController@edit');
  Route::patch('goal/edit/{id}', 'ProjectController@editingSubmit');
  Route::get('goal/delete/{id}', 'ProjectController@delete');

  Route::get('news/list', 'NewsController@listView');
  Route::get('news/add', 'NewsController@add');
  Route::post('news/add', 'NewsController@addingSubmit');
  Route::get('news/edit/{id}', 'NewsController@edit');
  Route::patch('news/edit/{id}', 'NewsController@editingSubmit');
  Route::get('news/delete/{id}', 'NewsController@delete');

  // Route::get('donation_inform/list', 'DonationController@listView');
});

Route::group(['middleware' => [/*'admin',*/'api'], 'namespace' => 'Admin', 'prefix' => 'admin'],  function () {
  Route::post('stock_image/upload', 'StockImageController@upload');
});

// =====================================================================

Route::get('/', 'HomeController@index');

Route::get('charity/list', 'CharityController@listView');
Route::get('charity/{id}', 'CharityController@index');

Route::get('charity/project/list', 'ProjectController@listView');
Route::get('charity/project/{id}', 'ProjectController@index');