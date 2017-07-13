<?php

namespace App\Http\Controllers;

// use App\Models\User;
use App\library\service;
// use App\library\url;
use App\library\token;
use Auth;
use Hash;
use Redirect;
use Cookie;

class UserController extends Controller
{
  public function login() {

    if(Auth::check()){
      return redirect('/');
    }

    return $this->view('page.user.login');

  }

  public function auth() {

  }

  public function register() {

  }

  public function registering() {

  }

  public function logout() {
    
    if(Auth::check()) {
      Auth::logout();
      Session::flush();
    }

    return redirect('/');
  }

}