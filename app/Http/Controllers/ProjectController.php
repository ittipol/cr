<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
use App\library\date;
use Redirect;

class ProjectController extends Controller
{
  public function index($id) {

    $project = Service::loadModel('Project')
    ->select('id','charity_id','name','short_desc','thumbnail','end_date','target_amount','created_at')
    ->where([
      ['id','=',$id],
      ['end_date','>',date('Y-m-d H:i:s')]
    ]);

    if(!$project->exists()) {
      return $this->error('ไม่พบโครงการนี้หรือการเปิดรับบริจาคโครงการนี้สิ้นสุดแล้ว');
    }

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
    
    return $this->view('page.project.index');

  }

  public function listView() {

    $model = Service::loadModel('Project');

    $currentPage = 1;
    if(!empty($this->query['page'])) {
      $currentPage = $this->query['page'];
    }

    //set page
    Paginator::currentPageResolver(function() use ($currentPage) {
        return $currentPage;
    });

    $data = $model->paginate(15);

    $this->setData('projects',$data);

    return $this->view('page.project.list');

  }
}
