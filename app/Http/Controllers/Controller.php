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

  protected $meta = array(
    'title' => 'CharityTh',
    'description' => 'ร่วมเป็นส่วนหนึ่งในการช่วยเหลือและสนับสนุนมูลนิธิและโครงการ',
    'image' => 'http://www.charityth.com/images/logo/logo_thumbnail.png'
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

    // Request::fullUrl()
    // Request::url()
    // Request::ip()

    $this->data['_meta'] = $this->meta;
    $this->data['_bot'] = $this->botDisallowed;

    return view($view,$this->data);
  }
}
