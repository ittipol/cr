<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
use App\library\date;
use Redirect;

class ProjectController extends Controller
{
  public function index($id) {

    // $project = Service::loadModel('Project')
    // ->select('id','charity_id','name','short_desc','thumbnail','end_date','target_amount','created_at')
    // ->where([
    //   ['id','=',$id],
    //   ['end_date','>',date('Y-m-d H:i:s')]
    // ]);

    $project = Service::loadModel('Project')
    ->select('id','charity_id','name','short_desc','thumbnail','end_date','target_amount','created_at')
    ->find($id);

    if(!$project->exists()) {
      return $this->error('ไม่พบโครงการนี้หรือการเปิดรับบริจาคโครงการนี้สิ้นสุดแล้ว');
    }

    // Check if has expire

    $donationModel = Service::loadModel('Donation');

    $date = new Date;

    $project = $project->first();

    // Get Charity
    $charity = Service::loadModel('Charity')->select('id','name','logo')->find($project->charity_id);

    $amount = $donationModel->getTotalAmount('Project',$id,false,false);

    // SEND LIB TO VIEW
    $this->setData('dateLib',$date);

    $this->setData('project',$project);
    $this->setData('charity',$charity);
    $this->setData('amount',number_format($amount, 0, '.', ','));
    $this->setData('donationTotal',$donationModel->countDonation('Project',$id));
    $this->setData('donorTotal',$donationModel->countDonor('Project',$id));
    $this->setData('targetAmount',number_format($project->target_amount, 0, '.', ','));
    $this->setData('percent',round(($amount*100)/$project->target_amount));
    $this->setData('remainingDate',$date->remainingDate($project->end_date));

    // SET META
    $this->setMeta('title',$project->name);
    $this->setMeta('description',$project->short_desc);
    $this->setMeta('image',$project->thumbnail);
    
    return $this->view('page.project.index');

  }

  public function listView() {

    $model = Service::loadModel('Project');

    $currentPage = 1;
    if(!empty(request()->page)) {
      $currentPage = request()->page;
    }

    //set page
    Paginator::currentPageResolver(function() use ($currentPage) {
        return $currentPage;
    });

    // SET DATA
    $this->setData('donationModel',Service::loadModel('Donation'));
    $this->setData('dateLib',new Date);
    $this->setData('projects',$model->paginate(24));

    $this->setMeta('title','โครงการ — Charity');
    $this->setMeta('description','');
    // $this->setMeta('image',null);

    return $this->view('page.project.list');

  }
}
