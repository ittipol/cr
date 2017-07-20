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

  protected $metaTitle = 'CharityTh';
  protected $metaDescription = null;
  protected $metaImage = null;

  protected $meta = array(
    'title' => null,
    'description' => null,
    'image' => null
  );

  protected $botDisallowed = false;

  protected function botDisallowed() {
    $this->botDisallowed = true;
  }

  protected function setMeta($type,$value = null) {
    
    if(empty($value)) {
      return false;
    }

    $this->meta[$type] = $value;

  }

  protected function setData($index,$value) {
    $this->data[$index] = $value;
  }

  protected function error($message) {

    $data = array(
      'message' => $message
    );

    return view('errors.error',$data);
  }

  protected function view($view = null) {

    // $this->data['_page_url'] = Request::fullUrl();
    // Request::fullUrl()
    // Request::url()
    // Request::ip()

    $this->data['_meta'] = $this->meta;
    $this->data['_bot'] = $this->botDisallowed;

    return view($view,$this->data);
  }
}
