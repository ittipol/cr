<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
use App\library\date;
use Redirect;

class DonationController extends Controller
{
  public function __construct() {
    $this->botDisallowed();
  }

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
    $this->setMeta('title','การบริจาค — CharityTH');

    return $this->view('page.donation.index');
  }

  public function detail($code) {

    $donation = Service::loadModel('Donation')->where('code','like',$code)->first();

    if(empty($donation)) {
      return $this->error('ไม่พบการบริจาคที่คุณกำลังค้นหา');
    }

    $data = Service::loadModel($donation->model)->find($donation->model_id);

    switch ($donation->model) {
      case 'Charity':

        if(empty($data)) {
          return $this->error('ไม่พบมูลนิธินี้');
        }

        $this->setData('for','');
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
      
      default:
        return Redirect::to('/');
        break;
    }

    // SET LIB
    $this->setData('dateLib',new Date);

    // SET DATA
    $this->setData('id',$data->id);
    $this->setData('name',$data->name);
    $this->setData('code',$code);
    $this->setData('donation',$donation);
    $this->setData('_for',strtolower($donation->model));

    // SET META
    $this->setMeta('title','การบริจาค — CharityTH');

    return $this->view('page.donation.detail');
  }

  public function share($code) {

    $donation = Service::loadModel('Donation')->where('code','like',$code)->first();

    if(empty($donation)) {
      return $this->error('ไม่พบการบริจาคที่คุณกำลังค้นหา');
    }

    $data = Service::loadModel($donation->model)->find($donation->model_id);

    switch ($donation->model) {
      case 'Charity':

        if(empty($data)) {
          return $this->error('ไม่พบมูลนิธินี้');
        }

        $this->setData('for','');
        $this->setData('charity',$data);

        break;

      case 'Project':

        if(empty($data)) {
          return $this->error('ไม่พบโครงการนี้หรือการเปิดรับบริจาคโครงการนี้สิ้นสุดแล้ว');
        }

        $charity = Service::loadModel('Charity')->select('name','logo')->find($data->charity_id);

        $this->setData('for','โครงการ');
        $this->setData('charity',$charity);

        break;
      
      default:
        return Redirect::to('/');
        break;
    }

    // SET DATA
    $this->setData('id',$data->id);
    $this->setData('name',$data->name);
    $this->setData('data',$data);
    // $this->setData('code',$code);
    $this->setData('donation',$donation);
    $this->setData('_for',strtolower($donation->model));

    // SET META
    $this->setMeta('title','ขอขอบคุณที่ร่วมเป็นส่วนหนึ่งในการบริจาค — CharityTH');
    $this->setMeta('description','ขอขอบคุณที่ร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ '.$data->name);
    // $this->setMeta('image','ขอขอบคุณที่ร่วมเป็นส่วนหนึ่งในการบริจาค — CharityTH');

    return $this->view('page.donation.share');

  }

}
