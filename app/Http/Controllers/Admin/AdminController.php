<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Hash;
use Redirect;

class AdminController extends Controller
{
  public function login() {

    // if(Auth::check()){
    //   return redirect('/');
    // }
    // dd(session()->all());
    return $this->view('admin.page.user.login');

  }

  public function authenticate() {

    $email = request()->email;
    $password = request()->password;
    // $password = Hash::make(request()->password);

    if(($email == '1') && (md5($password) == '31c533c607c128ab333a980a66fa54b0')) {
      session()->put('admin_auth', true);
      return Redirect::to('/admin/dashboard');
    }else{
      return Redirect::to('/admin/login');
    }

  }

  public function logout() {
    // Session::flush();
    session()->forget('admin_auth');
    return Redirect::to('/admin/login');
  }

}
