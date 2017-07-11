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

    if(!empty(request()->as == 'guest')) {
      // $this->setData('guest',true);
    }

    $this->setData('name',$data->name);
    $this->setData('id',request()->id);
    $this->setData('for',request()->for);

    return $this->view('page.donate.index');

  }
}
