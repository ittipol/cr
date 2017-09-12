<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
use App\library\date;
use App\library\stringHelper;
use Redirect;

class CharityController extends Controller
{

  protected $pageName = 'Charity'; 

  public function index($id) {

    $charity = Service::loadModel('Charity')->find($id);

    if(empty($charity)) {
      return $this->error('ไม่พบสถานที่นี้');
    }

    $date = new Date();
    $donationModel = Service::loadModel('Donation');

    // GET DATA
    $news = Service::loadModel('News')
    ->select('id','charity_id','title','short_desc','thumbnail','created_at')
    ->where('charity_id','=',$id)
    ->orderBy('created_at','desc');

    $projects = Service::loadModel('Project')
    ->select('id','name','short_desc','thumbnail','end_date','target_amount')
    ->where([
      ['charity_id','=',$id],
      ['end_date','>',date('Y-m-d H:i:s')]
    ])
    ->orderBy('created_at','asc');

    $videos = Service::loadModel('Video')
    ->select('id','charity_id','title','short_desc','thumbnail','created_at')
    ->where('charity_id','=',$id)
    ->orderBy('created_at','desc');

    // GET IMAGES
    $images = array();
    if(!empty($charity->images)) {
      $images = json_decode($charity->images,true);
    }

    // SEND MODEL TO VIEW
    $this->setData('donationModel',$donationModel);

    // SEND LIB TO VIEW
    $this->setData('dateLib',$date);
    $this->setData('stringLib',new stringHelper);

    $this->setData('charity',$charity);
    $this->setData('projects',$projects);
    $this->setData('news',$news);
    $this->setData('videos',$videos);
    $this->setData('images',$images);
    
    $this->setData('donationTotal',$donationModel->countDonation('Charity',$id,true));
    $this->setData('donorTotal',$donationModel->countDonor('Charity',$id,true));
    $this->setData('donors',$donationModel->getDonors('Charity',$id,true));

    $this->setData('amount',$donationModel->getTotalAmount('Charity',$id,true));
    $this->setData('remainingDate',$date->remainingDate());
    $this->setData('percent',round((date('d') * 100) / date('t')));

    // SET META
    $this->setMeta('title',$charity->name.' — CharityTH');
    $this->setMeta('description',$charity->short_desc);
    $this->setMeta('image',$charity->thumbnail);

    return $this->view('page.charity.index');

  }

  public function listView() {

    $model = Service::loadModel('Charity');

    $currentPage = 1;
    if(!empty(request()->page)) {
      $currentPage = request()->page;
    }

    //set page
    Paginator::currentPageResolver(function() use ($currentPage) {
        return $currentPage;
    });

    // Search Query String
    $conditions = array();

    if(!empty(request()->q)) {
      $conditions[] = array('name','=','%'.request()->q.'%');
    }

    if(!empty(request()->type) && (request()->type != 'all')) {
      $conditions[] = array('charity_type_id','=',request()->type);
    }

    if(!empty(request()->location) && (request()->location != 'all')) {
      $conditions[] = array('province_id','=',request()->location);
    }

    $date = new Date;

    // Load Additional Data
    $provinces = Service::loadModel('Province')->select('id','name')->orderBy('top','asc')->orderBy('id','asc')->get();
    $charityTypes = Service::loadModel('CharityType')->select('id','name')->get();

    $_provinces['all'] = 'ทั้งหมด';
    foreach ($provinces as $province) {
        $_provinces[$province->id] = $province->name;
    }

    $_charityTypes['all'] = 'ทั้งหมด';
    foreach ($charityTypes as $charityType) {
        $_charityTypes[$charityType->id] = $charityType->name;
    }

    if(!empty($conditions)) {
      $charities = $model->where($conditions)->paginate(24);
    }else{
      $charities = $model->paginate(24);
    }

    $charities->appends(request()->all());

    // SET MODEL
    $this->setData('donationModel',Service::loadModel('Donation'));
    
    // SET LIB
    $this->setData('stringLib',new stringHelper);

    // SET DATA
    $this->setData('charities',$charities);
    $this->setData('provinces',$_provinces);
    $this->setData('charityTypes',$_charityTypes);
    // $this->setData('remainingDate',$date->remainingDate());
    // $this->setData('percent',round((date('d') * 100) / date('t')));

    // SET META
    $this->setMeta('title','มูลนิธิ — CharityTH');
    $this->setMeta('description','');
    $this->setMeta('image',null);

    return $this->view('page.charity.list');

  }
}