<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
use App\library\date;
use Redirect;

class DonationController extends Controller
{
  public function index() {

    $search = false;
    $donation = null;

    if(!empty(request()->code)) {
      $search = true;
      $donation = Service::loadModel('Donation')->where('code','like',request()->code)->first();
    }

    if(!empty($donation)) {

      $data = Service::loadModel($donation->model)->find($donation->model_id);

      switch ($donation->model) {
        case 'Charity':

          if(empty($data)) {
            return $this->error('ไม่พบมูลนิธินี้');
          }

          $this->setData('for','มูลนิธิ');
          $this->setData('charityName',$data->name);
          $this->setData('charityLogo',$data->logo);

          break;

        case 'Project':

          if(empty($data)) {
            return $this->error('ไม่พบโครงการนี้หรือการเปิดรับบริจาคโครงการนี้สิ้นสุดแล้ว');
          }

          $charity = Service::loadModel('Charity')->select('name')->find($data->charity_id);

          $this->setData('for','โครงการ');
          $this->setData('charityName',$charity->name);
          $this->setData('charityLogo',$charity->logo);

          break;

      }

      $this->setData('id',$data->id);
      $this->setData('name',$data->name);

    }

    // SET LIB
    $this->setData('dateLib',new Date);

    // SET VALUE
    $this->setData('search',$search);
    $this->setData('donation',$donation);

    // SET META
    $this->setMeta('title','การบริจาค — Charity');

    // Stop Bot Index
    $this->botDisallowed();

    return $this->view('page.donation.index');
  }
}
