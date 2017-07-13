<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
  public function index() {

    dd(\Auth::check());

    return $this->view('page.home.index');
  }
}
