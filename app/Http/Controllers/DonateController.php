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

    $model = Service::loadModel('Donation');

    // $validator = Validator::make(Input::all(), $validation['rules'],$validation['messages']);
    
    // if($validator->fails()) {
    //   return array(
    //     'success' => false,
    //     'type' => 'html',
    //     'errorMessage' => view('components.form_error',array(
    //       'errors' => $validator->getMessageBag()
    //     ))->render()
    //   );
    // }

    // dd(request()->all());
  
    // reward_chkbox

    if(isset(request()->reward_chkbox) && request()->reward_chkbox) {

      $model->reward = 1;

      $model->address = json_encode(array(
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

    dd($model);

    if($model->save()) {

    }

  }

  public function complete() {
    // return $this->view();
  }

}
