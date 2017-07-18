<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
use App\library\date;
use Redirect;
use Auth;

class AccountController extends Controller
{
  public function index() {

    $this->setData('donations',Service::loadModel('Donation')->where('user_id','=',Auth::user()->id)->take(24));

    return $this->view('page.account.index');
  }

  public function edit() {
    
  }

  public function history() {
    // Service::loadModel('Donation')->where([]);
  }
}
