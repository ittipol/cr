<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
use App\library\date;
use Redirect;

class DonationController extends Controller
{
  public function index() {

    // SET META
    $this->setMeta('title','การบริจาค — Charity');

    // Stop Bot Index
    $this->botDisallowed();

    return $this->view('page.donation.index');
  }
}
