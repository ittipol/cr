<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
use App\library\date;
use Redirect;

class HomeController extends Controller
{
  public function index() {

    // Model
    $this->setData('donationModel',Service::loadModel('Donation'));

    // Lib
    $this->setData('dateLib',new Date);

    $this->setData('charities',Service::loadModel('Charity')->orderBy('created_at','desc')->take(24)->get());
    // $this->setData('projects',Service::loadModel('Project')->orderBy('created_at','desc')->take(6)->get());
    // $this->setData('news',Service::loadModel('News')->orderBy('created_at','desc')->take(6)->get());

    // SET META
    $this->setMeta('title','หน้าแรก — Charity');

    return $this->view('page.home.index');
  }
}
