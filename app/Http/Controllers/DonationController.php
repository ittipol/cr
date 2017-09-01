<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
use App\library\date;
use Redirect;
use Cookie;

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

          // $charity = $data;

          $for = '';
          
          break;

        case 'Project':

          if(empty($data)) {
            return $this->error('ไม่พบโครงการนี้หรือการเปิดรับบริจาคโครงการนี้สิ้นสุดแล้ว');
          }

          // $charity = Service::loadModel('Charity')->select('name','logo','shared_image')->find($data->charity_id);

          $for = 'โครงการ';

          break;
        
        default:
          return Redirect::to('/');
          break;
      }

      $this->setData('popup',false);

      $this->setData('id',$data->id);
      $this->setData('name',$data->name);
      $this->setData('code',request()->code);
      $this->setData('for',$for);
      $this->setData('_for',strtolower($donation->model));


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

        $charity = $data;

        $for = '';
        
        break;

      case 'Project':

        if(empty($data)) {
          return $this->error('ไม่พบโครงการนี้หรือการเปิดรับบริจาคโครงการนี้สิ้นสุดแล้ว');
        }

        $charity = Service::loadModel('Charity')->select('name','logo','shared_image')->find($data->charity_id);

        $for = 'โครงการ';

        break;
      
      default:
        return Redirect::to('/');
        break;
    }

    if (Cookie::get('donation_d_'.md5($code)) !== null) {
      $this->setData('popup',false);
    }else {
      Cookie::queue('donation_d_'.md5($code), 1, 7200);
      $this->setData('popup',true);
    }

    // SET LIB
    $this->setData('dateLib',new Date);

    // SET DATA
    $this->setData('id',$data->id);
    $this->setData('name',$data->name);
    $this->setData('code',$code);
    $this->setData('donation',$donation);
    $this->setData('for',$for);
    $this->setData('_for',strtolower($donation->model));

    $this->setData('charityName',$charity->name);
    $this->setData('charityLogo',$charity->logo);
    $this->setData('sharedImage',$charity->shared_image);

    $title = 'เราขอขอบคุณที่คุณได้ร่วมเป็นส่วนหนึ่งในการช่วยเหลือและสนับสนุน'.$for.' '.$data->name;

    if($donation->unidentified) {
      $desc = 'ขอขอบคุณที่ร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ'.$for.' '.$data->name;
    }elseif(!empty($donation->user_id)) {
      $desc = 'ขอขอบคุณ คุณ '.$donation->user->name.' ที่ร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ'.$for.' '.$data->name;
    }else{
      $desc = 'ขอขอบคุณ คุณ '.$donation->guest_name.' ที่ร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ'.$for.' '.$data->name;
    }

    // SET META
    $this->setMeta('title',$title.' — CharityTH');
    $this->setMeta('description',$desc);
    $this->setMeta('image',$charity->shared_image);

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

        $charity = $data;

        $for = '';

        break;

      case 'Project':

        if(empty($data)) {
          return $this->error('ไม่พบโครงการนี้หรือการเปิดรับบริจาคโครงการนี้สิ้นสุดแล้ว');
        }

        $charity = Service::loadModel('Charity')->select('name','logo','shared_image')->find($data->charity_id);

        $for = 'โครงการ';

        break;
      
      default:
        return Redirect::to('/');
        break;
    }

    // SET DATA
    $this->setData('id',$data->id);
    $this->setData('name',$data->name);
    $this->setData('data',$data);
    $this->setData('donation',$donation);
    $this->setData('for','');
    $this->setData('_for',strtolower($donation->model));

    $this->setData('charity',$charity);

    // 
    $title = 'เราขอขอบคุณที่คุณได้ร่วมเป็นส่วนหนึ่งในการช่วยเหลือและสนับสนุน'.$for.' '.$data->name;

    if($donation->unidentified) {
      $desc = 'ขอขอบคุณที่ร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ'.$for.' '.$data->name;
    }elseif(!empty($donation->user_id)) {
      $desc = 'ขอขอบคุณ คุณ '.$donation->user->name.' ที่ร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ'.$for.' '.$data->name;
    }else{
      $desc = 'ขอขอบคุณ คุณ '.$donation->guest_name.' ที่ร่วมเป็นส่วนหนึ่งในการบริจาคให้กับ'.$for.' '.$data->name;
    }

    $desc .= ' เรา CharityTH และ '.$charity->name.' ขอกล่าวขอบพระคุณอย่างสูง';

    // SET META
    $this->setMeta('title',$title.' — CharityTH');
    $this->setMeta('description',$desc);
    $this->setMeta('image',$charity->shared_image);

    return $this->view('page.donation.share');

  }

}
