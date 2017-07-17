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

    $this->setData('donation',$data);
    $this->setData('reward',json_decode($data->reward,true));
    $this->setData('address',json_decode($data->address,true));

    return $this->view('admin.page.donation.detail');
  }

  public function verify($id) {

    $data = Service::loadModel('Donation')->select('id','verified')->find($id);
    $data->verified = 1;
    $data->save();

    return Redirect::to('admin/donation/detail/'.$data->id);

  }

  public function delete($id) {

    if(isset($_GET['delete']) && $_GET['delete'] == 'y') {
      
      $data = Service::loadModel('Donation')->select('id')->find($id);

      if(!empty($data)) {
        $data->delete();
      }

      return Redirect::to('admin/donation/list/');
    }

    return $this->view('admin.page.donation.delete');

  }
}
