<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\library\service;
use Facebook\Facebook;
// use App\library\url;
use App\library\token;
use Auth;
use Hash;
use Redirect;
// use Cookie;

class UserController extends Controller
{
  public function login() {

    $this->setMeta('title','เข้าสู่ระบบ — Charity');

    return $this->view('page.user.login');
  }

  public function authenticate() {

    // $user = User::find(1);
    // Auth::login($user,true);

    // return Redirect::intended('/');

    if(Auth::attempt([
      'email' => request()->input('email'),
      'password' => request()->input('password'),
    ],!empty(request()->input('remember')) ? true : false)){
      return Redirect::intended('/');
    }

    $message = 'อีเมล หรือ รหัสผ่านไม่ถูก';

    if(empty(request()->input('email')) && empty(request()->input('password'))) {
      $message = 'กรุณาป้อนอีเมล และ รหัสผ่าน';
    }

    return Redirect::back()->withErrors([$message]);

  }

  public function register() {
    return $this->view('page.user.register');
  }

  public function registering(RegisterRequest $request) {

    $user = new User;
    $user->email = trim($request->email);
    $user->password = Hash::make(trim($request->password));
    $user->name = trim($request->name);

    if($user->save()) {
      session()->flash('register-success',true);
    }

    return Redirect::to('login');

  }

  public function logout() {
    
    if(Auth::check()) {
      Auth::logout();
      session()->flush();
    }

    return redirect('/');
  }

  public function socialCallback() {

    if(empty(request()->code)) {
      abort(404);
    }

    $fb = new \Facebook\Facebook([
      'app_id' => '227375124451364',
      'app_secret' => 'd9d3b4300ebf9d1839dad310d62295fd',
      'default_graph_version' => 'v2.9',
    ]);

    try {
      // Returns a `Facebook\FacebookResponse` object
      $response = $fb->get('/me?fields=id,name,email', request()->code);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }

    $_user = $response->getGraphUser();

    $user = User::select('id','email')->where([
      ['social_provider_id','=',1],
      ['social_user_id','=',$_user['id']],
    ])->first();

    if(empty($user)) {

      $user = new User;
      $user->social_provider_id = 1;
      $user->social_user_id = $_user['id'];

      if(!empty($_user['email'])) {
        $user->email = $_user['email'];
      }

      $user->password = Hash::make(Token::generateSecureKey(6));
      $user->name = $_user['name'];

      $user->save();
    }

    // echo 'Name: ' . $user->getName();

    Auth::login($user,true);

    return Redirect::intended('/');

  }

}