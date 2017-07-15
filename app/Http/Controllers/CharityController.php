<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
// use App\library\date;
use Redirect;

class CharityController extends Controller
{
  public function index($id) {

    $charity = Service::loadModel('Charity')->find($id);

    $donationModel = Service::loadModel('Donation');

    // $donationModel->countDonor('Charity',$id);

    // Get project
    $projects = Service::loadModel('Project')
    ->select('id','name','short_desc')
    ->where([
      ['charity_id','=',$id],
      ['end_date','>',date('Y-m-d H:i:s')]
    ]);

    // dd($projects->get());

    // Get News
    $news = Service::loadModel('News');

    $projects = Service::loadModel('Project')->where('charity_id','=',$id)->orderBy('created_by','desc')->take(6);

    $images = array();
    if(!empty($charity->images)) {
      $images = json_decode($charity->images,true);
    }

    $this->setData('charity',$charity);
    $this->setData('projects',$projects);
    $this->setData('news',$news);
    $this->setData('images',$images);
    $this->setData('amount',$donationModel->getTotalAmount('Charity',$id,true));
    $this->setData('donationTotal',$donationModel->countDonation('Charity',$id));

    return $this->view('page.charity.index');

  }

  public function listView() {

    $model = Service::loadModel('Charity');

    $currentPage = 1;
    if(!empty($this->query['page'])) {
      // request()->page
      $currentPage = $this->query['page'];
    }

    //set page
    Paginator::currentPageResolver(function() use ($currentPage) {
        return $currentPage;
    });

    $data = $model->paginate(15);

    $this->setData('charities',$data);

    return $this->view('page.charity.list');

  }
}
