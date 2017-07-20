<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\library\service;
// use App\library\url;
use App\library\token;
use Auth;
use Hash;
use Redirect;
// use Cookie;

class UserController extends Controller
{
  public function login() {

    // if(Auth::check()){
    //   return redirect('/');
    // }

    return $this->view('page.user.login');

  }

  public function authenticate() {

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

}