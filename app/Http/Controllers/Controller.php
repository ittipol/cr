<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  protected $data = array();

  protected $botDisallowed = true;

  // protected $modelData;
  // protected $paginator;
  // protected $formHelper;

  // protected function botAllowed() {
  //   $this->botDisallowed = false;
  // }

  protected function setData($index,$value) {
    $this->data[$index] = $value;
  }

  protected function view($view = null) {

    // $this->data['_page_url'] = Request::fullUrl();
    // Request::fullUrl()
    // Request::url()
    // Request::ip()

    return view($view,$this->data);
  }
}
