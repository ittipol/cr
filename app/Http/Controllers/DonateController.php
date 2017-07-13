<?php

namespace App\Http\Controllers;

use App\library\service;
use Redirect;
use Auth;

class DonateController extends Controller
{
  public function index() {

    if(empty(request()->for) || empty(request()->id)) {
      return null;
    }

    switch (request()->for) {
      case 'charity':

        $data = Service::loadModel('Charity')->select('name')->find(request()->id);

        if(empty($data)) {
          return null;
        }

        break;

      case 'project':
        
        $data = Service::loadModel('Project')->select('name','charity_id')->find(request()->id);

        if(empty($data)) {
          return null;
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

    $donation = Service::loadModel('Donation');

    if(isset(request()->reward_chkbox) && request()->reward_chkbox) {

    }else{

    }

    // $validator = Validator::make(Input::all(), $validation['rules'],$validation['messages']);
    
    // if($validator->fails()) {
    //   // return Redirect::back()->withErrors($validator->getMessageBag())->withInput(request()->all());
    //   return Redirect::back()->withErrors($validator->getMessageBag());
    // }
// dd(request()->all());
    if(isset(request()->reward_chkbox) && request()->reward_chkbox) {

      $donation->reward = 1;

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

        $donation->model = 'Charity';
        $donation->charity_id = request()->id;
        // $data = Service::loadModel('Charity')->select('name')->find(request()->id);

        // if(empty($data)) {
        //   return null;
        // }

        break;

      case 'project':

        $donation->model = 'Project';
        $donation->project_id = request()->id;
        // $donation->charity_id = ;
        // $data = Service::loadModel('Project')->select('name','charity_id')->find(request()->id);

        // if(empty($data)) {
        //   return null;
        // }

        // $charity = Service::loadModel('Charity')->select('name')->find($data->charity_id);

        // $this->setData('charityName',$charity->name);

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
dd($donation);
    if($donation->save()) {

      // If logged in and address is empty
      // add address to user address field
      // $user = Service::loadModel('User')->find();
      // $user->address = $donation->address;
      // $user->save();
    }

    return Redirect::to('admin/charity/list');

  }

  public function complete() {
    // return $this->view();
  }

}
