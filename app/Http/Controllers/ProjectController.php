<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
use App\library\date;
use Redirect;

class ProjectController extends Controller
{
  public function index($id) {

    $project = Service::loadModel('Project')->find($id);

    $date = new Date;

    // Get charity Detail
    $charity = Service::loadModel('Charity')->select('id','name','logo')->find($project->charity_id);

    $donationModel = Service::loadModel('Donation');

    $amount = $donationModel->getTotalAmount('Project',$id,false,false);
    $percent = ($amount*100)/$project->target_amount;

    $this->setData('project',$project);
    $this->setData('charity',$charity);
    $this->setData('amount',number_format($amount, 0, '.', ','));
    $this->setData('targetAmount',number_format($project->target_amount, 0, '.', ','));
    $this->setData('percent',round($percent));
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
