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


Route::get('get_image/{file}', 'StaticFileController@serveImages');
Route::get('avatar/{file}', 'StaticFileController@userAvatar');

Route::group(['prefix' => 'api/v1', 'middleware' => 'api'], function () {
  Route::get('get_district/{provinceId}', 'ApiController@getDistrict');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function (){
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

  Route::get('donation/list', 'DonationController@listView');
  Route::get('donation/detail/{id}', 'DonationController@detail');
  Route::get('donation/delete/{id}', 'DonationController@delete');
  Route::get('donation/verify/{id}', 'DonationController@verify');

  Route::get('summary', 'SummaryController@index');
});

Route::group(['middleware' => ['admin.auth'], 'namespace' => 'Admin', 'prefix' => 'admin'],  function () {
  Route::post('stock_image/upload', 'StockImageController@upload');
});

Route::group(['middleware' => 'admin.auth'],  function () {
  Route::get('slip/{id}/{filename}', 'StaticFileController@slip');
});

// =====================================================================

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('about', 'HomeController@about');

Route::group(['middleware' => 'guest'], function () {
  
  Route::get('login', array('as' => 'login', 'uses' => 'UserController@login'));
  Route::post('login', 'UserController@authenticate');

  Route::get('facebook/login', 'UserController@socialCallback');

  Route::get('subscription', 'UserController@register');
  Route::post('subscription', 'UserController@registering');
});

Route::group(['middleware' => 'auth'], function () {

  Route::get('account', 'AccountController@index');

  Route::get('account/profile/edit', 'AccountController@edit');
  Route::patch('account/profile/edit', 'AccountController@editingSubmit');

  Route::get('account/donation/history', 'AccountController@donationHistory');

  Route::get('logout', 'UserController@logout');
});

Route::get('charity/list', 'CharityController@listView');
Route::get('charity/{id}', 'CharityController@index');

Route::get('project/list', 'ProjectController@listView');
Route::get('project/{id}', 'ProjectController@index');

Route::get('news/list', 'NewsController@listView');
Route::get('news/{id}', 'NewsController@index');

Route::get('charity/{id}/project', 'ProjectController@listByCharity');
Route::get('charity/{id}/news', 'NewsController@listByCharity');

Route::get('donate', 'DonateController@index');
Route::post('donate', 'DonateController@donationSubmit');

Route::get('donation', 'DonationController@index');
// Route::get('donation/share', 'DonationController@share');
Route::get('donation/{code}', 'DonationController@detail');
Route::get('share/{code}', 'DonationController@share');