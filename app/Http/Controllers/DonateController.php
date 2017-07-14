<?php

namespace App\Http\Controllers;

use App\library\service;
use App\library\token;
use Redirect;
use Auth;

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
        
        $data = Service::loadModel('Project')->select('name','charity_id')->find(request()->id);

        if(empty($data)) {
          return $this->error('ไม่พบโครงการนี้');
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

    }else{

    }

    // $validator = Validator::make(Input::all(), $validation['rules'],$validation['messages']);
    
    // if($validator->fails()) {
    //   // return Redirect::back()->withErrors($validator->getMessageBag())->withInput(request()->all());
    //   return Redirect::back()->withErrors($validator->getMessageBag());
    // }
dd(request()->all());
    if(isset(request()->reward_chkbox) && request()->reward_chkbox) {

      $donation->get_reward = 1;

      $donation->reward = array(
        'selected' => 'shirt',
        'option' => array(
          'size' => 's'
        )
      );

      $donation->address = json_encode(array(
        'receiver_name' => request()->receiver_name,
        'address_no' => request()->address_no,
        'building' => request()->building,
        'floor' => request()->floor,
        'squad' => request()->squad,
        'road' => request()->road,
        'alley' => request()->alley,
        'province' => request()->province,
        'district' => request()->district,
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

        if(empty(Service::loadModel('Project')->select('id')->find(request()->id))) {
          return $this->error('ไม่พบโครงการนี้');
        }

        $donation->model = 'Project';
        $donation->model_id = request()->id;

        break;
      
      default:
        return Redirect::to('/');
        break;
    }

    $donation->donator_name = request()->name;
    $donation->email = request()->email;
    $donation->transfer_date = request()->date.' '.request()->time_hour.':'.request()->time_min.':00';
    $donation->amount = request()->amount;

    if(Auth::check()) {
      $donation->user_id = Auth::user()->id;
    }


    $date = date('Y m d');
    $date = str_replace('0', 'X', $date);
    $date = explode(' ', $date);
    dd($date);

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

      return Redirect::to('donate/'.$code);

    }

    return Redirect::to('/donate');

  }

  public function complete() {
    // return $this->view();
  }

}
