<?php

namespace App\Http\Controllers;

use OmiseCharge;

use App\library\service;
use App\library\token;
use App\library\date;
// use App\library\creditcardValidation;
use Redirect;
use Auth;
use Validator;

class DonateController extends Controller
{
  public function __construct() {
    $this->botDisallowed();
  }
  
  public function index() {

    if(empty(request()->for) || empty(request()->id)) {
      return $this->error('URL ไม่ถูกต้อง');
    }

    $for = null;
    switch (request()->for) {
      case 'charity':

        $data = Service::loadModel('Charity')->select('name','short_desc','thumbnail','has_reward')->find(request()->id);

        if(empty($data)) {
          return $this->error('ไม่พบมูลนิธินี้');
        }

        $for = 'มูลนิธิ';

        $this->setData('charity',$data);

        break;

      case 'project':
        
        $data = Service::loadModel('Project')
        ->select('id','charity_id','short_desc','thumbnail')
        ->where([
          ['id','=',request()->id],
          ['end_date','>',date('Y-m-d H:i:s')]
        ]);

        if(!$data->exists()) {
          return $this->error('ไม่พบโครงการนี้หรือการเปิดรับบริจาคโครงการนี้สิ้นสุดแล้ว');
        }

        $for = 'โครงการ';

        $data = $data->first();

        $charity = Service::loadModel('Charity')->select('name','has_reward')->find($data->charity_id);

        $this->setData('charity',$charity);

        break;
      
      default:
        return Redirect::to('/');
        break;
    }

    $hours = array();
    $mins = array();

    for ($i=0; $i <= 23; $i++) { 

      if($i < 10) {
        $hours['0'.$i] = $i;
      }else{
        $hours[$i] = $i;
      }

    }

    for ($i=0; $i <= 59; $i++) {

      if($i < 10) {
        $mins['0'.$i] = '0'.$i;
      }else{
        $mins[$i] = $i;
      }
      
    }

    $this->setData('hours',$hours);
    $this->setData('mins',$mins);

    $provinces = Service::loadFieldData('Province',array(
      'key' =>'id',
      'field' => 'name',
      'order' => array(
        array('top','ASC'),
        array('id','ASC')
      )
    ));

    $this->setData('provinces', $provinces);

    // SET DATA
    $this->setData('name',$data->name);
    $this->setData('id',request()->id);
    $this->setData('for',request()->for);

    // SET META
    $this->setMeta('title','บริจาคให้กับ'.$for.' '.$data->name.' — CharityTH');
    $this->setMeta('description',$data->short_desc);
    $this->setMeta('image',$data->thumbnail);

    return $this->view('page.donate.index');

  }

  public function donationSubmit() {
    // dd(request()->all());
    if(empty(request()->for) || empty(request()->id)) {
      return $this->error('URL ไม่ถูกต้อง');
    }
    
    $donation = Service::loadModel('Donation');

    $validation = array();

    switch (request()->method) {
      case 'method_1':

        $donation->transaction_date = date('Y-m-d H:i:s');
        $donation->donation_via_id = 1;

        break;
      
      case 'method_2':

        // rules for bank transfer
        $validation = $donation->validation;

        $donation->transaction_date = request()->date.' '.request()->time_hour.':'.request()->time_min.':00';
        $donation->donation_via_id = 2;

        break;
    }

    // array merge if get reward exist

    if(isset(request()->reward_chkbox) && request()->reward_chkbox) {
      $validation = array_merge($validation,$donation->validationWithAddress);
    }
// dd($validator);
    // $validator = Validator::make(request()->all(), $validation['rules'],$validation['messages']);
    
    // if($validator->fails()) {
    //   return Redirect::back()->withErrors($validator->getMessageBag())->withInput(request()->all());
    // }

    // Reward
    if(isset(request()->reward_chkbox) && request()->reward_chkbox) {

      $donation->get_reward = 1;

      $donation->reward = json_encode(array(
        'selected' => 'shirt',
        'option' => array(
          'size' => request()->reward_option
        )
      ));

      $donation->shipping_address = json_encode(array(
        'receiver_name' => trim(request()->receiver_name),
        'tel_no' => request()->tel_no,
        'email' => trim(request()->email),
        'address_no' => request()->address_no,
        'building' => request()->building,
        'floor' => request()->floor,
        'squad' => request()->squad,
        'road' => request()->road,
        'alley' => request()->alley,
        'province' => Service::loadModel('Province')->find(request()->province)->name,
        'district' => Service::loadModel('District')->find(request()->district)->name,
        'sub_district' => request()->sub_district,
        'post_code' => request()->post_code
      ));

    }

    switch (request()->for) {
      case 'charity':

        if(empty(Service::loadModel('Charity')->select('name')->find(request()->id))) {
          return $this->error('ไม่พบมูลนิธินี้');
        }

        $donation->model = 'Charity';
        $donation->model_id = request()->id;

        break;

      case 'project':

        $project = Service::loadModel('Project')
        ->select('id')
        ->where([
          ['id','=',request()->id],
          ['end_date','>',date('Y-m-d H:i:s')]
        ]);

        if(!$project->exists()) {
          return $this->error('ไม่พบโครงการนี้หรือการเปิดรับบริจาคโครงการนี้สิ้นสุดแล้ว');
        }

        $donation->model = 'Project';
        $donation->model_id = request()->id;

        break;
      
      default:
        return Redirect::to('/');
        break;
    }
    
    $donation->amount = request()->amount;
    $donation->code = strtoupper(date('Yd').'-'.Token::generateSecureKey(8));

    if(Auth::check()) {
      $donation->user_id = Auth::user()->id;
    }elseif(!empty(request()->name)){
      $donation->guest_name = trim(request()->name);      
    }

    if(isset(request()->unidentified) && request()->unidentified) {
      $donation->unidentified = 1;
    }

    // charging
    $donation->fee = request()->amount * $donation->getFeeRate();
    $donation->balance = request()->amount - $donation->fee;

    // Save donation record
    if(!$donation->save()) {
      return Redirect::back()->withErrors(array(
        array('มีข้อมูลบางอย่างไม่ถูกต้อง ทำให้ไม่สามารถบันทึกข้อมูลได้')
      ));
    }

    // Credit Card paymemt
    if(request()->method == 'method_1') {
      
      define('OMISE_API_VERSION', '2015-11-17');
      define('OMISE_PUBLIC_KEY', 'pkey_test_58v3kcsit84cakasj3s');
      define('OMISE_SECRET_KEY', 'skey_test_58v3kcsjcszyrzyidsx');

      if(strpos(request()->amount, '.') !== false ) {
        $amount = str_replace('.', '', request()->amount);
      }else{
        $amount = request()->amount.'00';
      }

      $charge = OmiseCharge::create(array(
        'amount' => $amount, //2050 = 20.50 บาท
        'currency' => 'thb',
        'card' => request()->omise_token
      ));

      if ($charge['status'] != 'successful') {
        return Redirect::back()->withErrors(array(
          array('ไม่สามารถตัดเงินจากบัตรเครดิตได้')
        ));
      }

      $donation->verified = 1;
      $donation->save();

    }

    // if(Auth::check()) {}

    // If logged in and address is empty
    // add address to user address field
    // $user = Service::loadModel('User')->find();
    // $user->shipping_address = $donation->address;
    // $user->save();

    return Redirect::to('donation/'.$donation->code);

  }

  // public function complete($code) {

  //   if(empty($code)) {
  //     return $this->error('URL ไม่ถูกต้อง');
  //   }

  //   $donation = Service::loadModel('Donation')->where('code','like',$code);

  //   if(!$donation->exists()) {
  //     return $this->error('ไม่พบการบริจาคที่คุณกำลังค้นหา');
  //   }

  //   $donation = $donation->first();

  //   $data = Service::loadModel($donation->model)->find($donation->model_id);

  //   switch ($donation->model) {
  //     case 'Charity':

  //       if(empty($data)) {
  //         return $this->error('ไม่พบมูลนิธินี้');
  //       }

  //       $this->setData('for','มูลนิธิ');
  //       $this->setData('charityName',$data->name);
  //       $this->setData('charityLogo',$data->logo);

  //       break;

  //     case 'Project':

  //       if(empty($data)) {
  //         return $this->error('ไม่พบโครงการนี้หรือการเปิดรับบริจาคโครงการนี้สิ้นสุดแล้ว');
  //       }

  //       $charity = Service::loadModel('Charity')->select('name')->find($data->charity_id);

  //       $this->setData('for','โครงการ');
  //       $this->setData('charityName',$charity->name);
  //       $this->setData('charityLogo',$charity->logo);

  //       break;
      
  //     default:
  //       return Redirect::to('/');
  //       break;
  //   }

  //   // SET LIB
  //   $this->setData('dateLib',new Date);

  //   // SET DATA
  //   $this->setData('id',$data->id);
  //   $this->setData('name',$data->name);
  //   $this->setData('code',$code);
  //   $this->setData('donation',$donation);

  //   // SET META
  //   $this->setMeta('title','การบริจาค — CharityTH');

  //   return $this->view('page.donate.complete');
  // }

}
