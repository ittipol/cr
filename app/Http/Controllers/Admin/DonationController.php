<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\library\service;
use Redirect;

class DonationController extends Controller
{
  public function listView() {

    $model = Service::loadModel('Donation');

    $currentPage = 1;
    if(!empty($this->query['page'])) {
      $currentPage = $this->query['page'];
    }

    //set page
    Paginator::currentPageResolver(function() use ($currentPage) {
        return $currentPage;
    });

    $data = $model->orderBy('created_at','desc')->paginate(15);

    $this->setData('donations',$data);

    return $this->view('admin.page.donation.list');
  }

  public function detail($id) {
    
    $data = Service::loadModel('Donation')->find($id);
dd($data);
    $this->setData('donation',$data);

    return $this->view('admin.page.donation.detail');
  }

  public function varify($id) {
    
    $data = Service::loadModel('Donation')->find($id);
    $data->verified = 1;
    $data->save();
  }
}
