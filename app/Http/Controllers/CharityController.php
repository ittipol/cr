<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
use Redirect;

class CharityController extends Controller
{
  public function index($id) {

    $data = Service::loadModel('Charity')->find($id);

    $this->setData('charity',$data);

    return $this->view('page.charity.index');

  }
}
