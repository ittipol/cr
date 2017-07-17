<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
use App\library\date;
use Redirect;

class CharityController extends Controller
{
  public function index($id) {

    $charity = Service::loadModel('Charity')->find($id);

    if(empty($charity)) {
      return $this->error('ไม่พบมูลนิธินี้');
    }

    $donationModel = Service::loadModel('Donation');

    // GET DATA
    $news = Service::loadModel('News')
    ->select('id','title','short_desc','thumbnail','created_at')
    ->where('charity_id','=',$id)
    ->orderBy('created_at','desc')
    ->take(6);

    $projects = Service::loadModel('Project')
    ->select('id','name','short_desc','thumbnail','end_date','target_amount')
    ->where([
      ['charity_id','=',$id],
      ['end_date','>',date('Y-m-d H:i:s')]
    ])
    ->orderBy('created_at','desc')
    ->take(6);

    // GET IMAGES
    $images = array();
    if(!empty($charity->images)) {
      $images = json_decode($charity->images,true);
    }

    $date = new Date();

    // SEND MODEL TO VIEW
    $this->setData('donationModel',$donationModel);

    // SEND LIB TO VIEW
    $this->setData('dateLib',$date);

    $this->setData('charity',$charity);
    $this->setData('projects',$projects);
    $this->setData('news',$news);
    $this->setData('images',$images);
    $this->setData('amount',$donationModel->getTotalAmount('Charity',$id,true));
    $this->setData('donationTotal',$donationModel->countDonation('Charity',$id));
    $this->setData('donorTotal',$donationModel->countDonor('Charity',$id,true));
    $this->setData('remainingDate',$date->remainingDate(date('Y-m-t'),date('Y-m-d')));
    $this->setData('percent',round((date('d') * 100) / date('t')));

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

    $date = new Date;

    $this->setData('donationModel',Service::loadModel('Donation'));
    
    $this->setData('charities',$model->paginate(15));
    $this->setData('remainingDate',$date->remainingDate(date('Y-m-t'),date('Y-m-d')));
    $this->setData('percent',round((date('d') * 100) / date('t')));

    return $this->view('page.charity.list');

  }
}