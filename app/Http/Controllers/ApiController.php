<?php

namespace App\Http\Controllers;

use App\library\service;
use Auth;
// use Input;

class ApiController extends Controller
{
  public function getDistrict($provinceId = null) {

    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
      exit('Error!!!');  //trygetRealPath detect AJAX request, simply exist if no Ajax
    }

    $records = Service::loadModel('District')->where('province_id', '=', $provinceId)->get(); 

    $districts = array();
    foreach ($records as $record) {
      $districts[$record->id] = $record->name;
    }

    return response()->json($districts);
  }

  public function accessToken() {

    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
      exit('Error!!!');  //trygetRealPath detect AJAX request, simply exist if no Ajax
    }

    $app = Service::loadModel('App')
    ->select('id')
    ->where('name','like',request()->app);

    if(!$app->exists()) {
      exit('Error!!!');
    }

    $app = $app->first();

    $user = Service::loadModel('User')->where([
      ['app_id','=',$app->id],
      ['app_user','=',request()->app_user],
      ['app_access_token','=',request()->app_access_token]
    ])->first();

    if(!empty($user)) {
      // new user
      // create account

      $user = Service::loadModel('User');
      $user->app_id = $app->id;
      $user->app_user = trim($request->email);
      $user->app_access_token = Hash::make(trim($request->password));
      $user->name = trim($request->name);

    }
dd('xxx');
    // Login and "remember" the given user...
    // Auth::login($user, true);

    // Login
    Auth::login($user);

    return array();

  }
}
