<?php

namespace App\Http\Controllers;

use App\library\service;
use App\library\token;
use Redirect;
use Auth;
use Validator;

class DonateController extends Controller
{
  public function index() {

    if(empty(request()->for) || empty(request()->id)) {
      return $this->error('URL ไม่ถูกต้อง');
    }

    switch (request()->for) {
      case 'charity':

        $data = Service::loadModel('Charity')->select('name')->find(request()->id);

        if(empty($data)) {
          return $this->error('ไม่พบมูลนิธินี้');
        }

        break;

      case 'project':
        
        $project = Service::loadModel('Project')
        ->select('id')
        ->where([
          ['id','=',$id],
          ['end_date','>',date('Y-m-d H:i:s')]
        ]);

        if($project->exists()) {
          return $this->error('ไม่พบโครงการนี้หรือการเปิดรับบริจาคโครงการนี้สิ้นสุดแล้ว');
        }

        $charity = Service::loadModel('Charity')->select('name')->find($data->charity_id);

        $this->setData('charityName',$charity->name);

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

    if(Auth::check()) {
      // $this->setData('donor_name','');
    }

    $this->setData('name',$data->name);
    $this->setData('id',request()->id);
    $this->setData('for',request()->for);

    return $this->view('page.donate.index');

  }

  public function donationSubmit() {

    if(empty(request()->for) || empty(request()->id)) {
      return $this->error('URL ไม่ถูกต้อง');
    }

    $donation = Service::loadModel('Donation');

    if(isset(request()->reward_chkbox) && request()->reward_chkbox) {
      $validation = $donation->validationWithAddress;
    }else{
      $validation = $donation->validation;
    }

    $validator = Validator::make(request()->all(), $validation['rules'],$validation['messages']);
    
    if($validator->fails()) {
      return Redirect::back()->withErrors($validator->getMessageBag())->withInput(request()->all());
    }

    if(isset(request()->reward_chkbox) && request()->reward_chkbox) {

      $donation->get_reward = 1;

      $donation->reward = json_encode(array(
        'selected' => 'shirt',
        'option' => array(
          'size' => request()->reward_option
        )
      ));

      $donation->shipping_address = json_encode(array(
        'receiver_name' => request()->receiver_name,
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
          ['id','=',$id],
          ['end_date','>',date('Y-m-d H:i:s')]
        ]);

        if($project->exists()) {
          return $this->error('ไม่พบโครงการนี้หรือการเปิดรับบริจาคโครงการนี้สิ้นสุดแล้ว');
        }

        $donation->model = 'Project';
        $donation->model_id = request()->id;

        break;
      
      default:
        return Redirect::to('/');
        break;
    }

    $donation->transfer_date = request()->date.' '.request()->time_hour.':'.request()->time_min.':00';
    $donation->amount = request()->amount;
    $donation->code = Token::generateSecureKey(10);

    if(Auth::check()) {
      $donation->user_id = Auth::user()->id;
    }else{

      $_guestData = array();

      if(!empty(request()->name)) {
        $_guestData['name'] = trim(request()->name);
      }

      if(!empty(request()->name)) {
        $_guestData['email'] = trim(request()->email);
      }

      if(!empty($_guestData)) {
        $donation->guest_data = json_encode($_guestData);
      }
      
    }

    if(isset(request()->unidentified) && request()->unidentified) {
      $donation->unidentified = request()->unidentified;
    }

    // $date = date('Y m d');
    // $date = str_replace('0', 'X', $date);
    // $date = explode(' ', $date);
    // dd($date);

    if($donation->save()) {

      // if(Auth::check()) {}

      // If logged in and address is empty
      // add address to user address field
      // $user = Service::loadModel('User')->find();
      // $user->shipping_address = $donation->address;
      // $user->save();

      // Code 2XDX5R1517
      // 2X year first 2 letter
      // D random
      // X5 month
      // R randomm
      // 15 date
      // 17 year latest 2 letter
      // replace 0 as X or random char

      return Redirect::to('donate/'.$donation->code);

    }

    return Redirect::to('donate');

  }

  public function complete($code) {
    dd($code);
    return $this->view('page.donate.complete');
  }

}
