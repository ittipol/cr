<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
use App\library\date;
// use Facebook\Facebook;
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

    if(empty($code)) {
      return $this->error('URL ไม่ถูกต้อง');
    }

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

  // public function share() {

  //   // request()->code

  //   // if(empty($code)) {
  //   //   return $this->error('URL ไม่ถูกต้อง');
  //   // }

  //   $accessToken = request()->code;
  //   $donationCode = request()->_code;

  //   $donation = Service::loadModel('Donation')->where('code','like',$donationCode)->first();

  //   if(empty($donation)) {
  //     return $this->error('ไม่พบการบริจาคที่คุณกำลังค้นหา');
  //   }

  //   $data = Service::loadModel($donation->model)->find($donation->model_id);

  //   switch ($donation->model) {
  //     case 'Charity':

  //       if(empty($data)) {
  //         return $this->error('ไม่พบมูลนิธินี้');
  //       }

  //       break;

  //     case 'Project':

  //       if(empty($data)) {
  //         return $this->error('ไม่พบโครงการนี้หรือการเปิดรับบริจาคโครงการนี้สิ้นสุดแล้ว');
  //       }

  //       break;
      
  //     default:
  //       return Redirect::to('/');
  //       break;
  //   }

  //   $fb = new \Facebook\Facebook([
  //     'app_id' => '227375124451364',
  //     'app_secret' => 'd9d3b4300ebf9d1839dad310d62295fd',
  //     'default_graph_version' => 'v2.9',
  //   ]);

  //   $data = [
  //     'message' => 'My message example. \n test posting',
  //     // 'link' => {web url},
  //   ];

  //   try {
  //     // Returns a `Facebook\FacebookResponse` object
  //     $response = $fb->post('/me/feed', $data, $accessToken);
  //   } catch(Facebook\Exceptions\FacebookResponseException $e) {
  //     echo 'Graph returned an error: ' . $e->getMessage();
  //     exit;
  //   } catch(Facebook\Exceptions\FacebookSDKException $e) {
  //     echo 'Facebook SDK returned an error: ' . $e->getMessage();
  //     exit;
  //   }


  //   // Update posted_to_fb -> 1
  //   // $donation->posted_to_fb = 1;
  //   // $donation->save();

  //   dd('posted');

  // }

}
