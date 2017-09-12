<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
use App\library\date;
use App\library\stringHelper;
use Redirect;

class ProjectController extends Controller
{
  protected $pageName = 'Project'; 
  
  private $sorting = array(
    'created_at:desc' => 'ใหม่สุด',
    'created_at:asc' => 'เก่าสุด',
    'name:asc' => 'ตัวอักษร A - Z ก - ฮ',
    'name:desc' => 'ตัวอักษร Z - A ฮ - ก'
  );

  public function index($id) {

    $projectModel = Service::loadModel('Project');
    $now = date('Y-m-d H:i:s');

    $project = $projectModel
    ->select('id','charity_id','name','short_desc','thumbnail','end_date','target_amount','created_at')
    ->find($id);

    if(empty($project)) {
      return $this->error('ไม่พบโครงการนี้หรือการเปิดรับบริจาคโครงการนี้สิ้นสุดแล้ว');
    }

    $projectEnd = true;
    if($project->end_date > $now) {
      $projectEnd = false;
    }

    $donationModel = Service::loadModel('Donation');

    $date = new Date;

    // Get Charity
    $charity = Service::loadModel('Charity')->select('id','name','logo')->find($project->charity_id);

    // Total
    $amount = $donationModel->getTotalAmount('Project',$id,false,false);

    // SEND LIB TO VIEW
    $this->setData('dateLib',$date);

    $this->setData('project',$project);
    $this->setData('charity',$charity);
    $this->setData('amount',number_format($amount, 0, '.', ','));
    $this->setData('donationTotal',$donationModel->countDonation('Project',$id));
    $this->setData('donorTotal',number_format($donationModel->countDonor('Project',$id), 0, '.', ','));
    $this->setData('targetAmount',number_format($project->target_amount, 0, '.', ','));
    $this->setData('percent',round(($amount*100)/$project->target_amount));
    $this->setData('remainingDate',$date->remainingDate($project->end_date));
    $this->setData('donors',$donationModel->getDonors('Project',$id));
    $this->setData('projectEnd',$projectEnd);
    // $this->setData('countProject',number_format($projectModel->where('charity_id','=',$charity->id)->count(), 0, '.', ','));
    // $this->setData('countOpenedProject',number_format($projectModel->where([['charity_id','=',$charity->id],['end_date','>',$now]])->count(), 0, '.', ','));
    
    // SET META
    $this->setMeta('title',$project->name.' — CharityTH');
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

    // Search Query String
    $conditions = array();

    $conditions[] = array('end_date','>',date('Y-m-d H:i:s'));
    $field = 'created_at';
    $sorting = 'desc';

    if(!empty(request()->q)) {
      $conditions[] = array('name','=','%'.request()->q.'%');
    }

    if(!empty(request()->sort)) {
      list($field,$sorting) = explode(':', request()->sort);
    }

    $projects = $model->where($conditions)->orderBy($field,$sorting)->paginate(24);
    $projects->appends(request()->all());

    // SET LIB
    $this->setData('stringLib',new stringHelper);
    $this->setData('dateLib',new Date);

    // SET DATA
    $this->setData('donationModel',Service::loadModel('Donation'));
    $this->setData('projects',$projects);
    $this->setData('sorting',$this->sorting);

    $this->setMeta('title','โครงการ — CharityTH');
    // $this->setMeta('description','');
    // $this->setMeta('image',null);

    return $this->view('page.project.list');

  }

  public function listByCharity($id) {

    $model = Service::loadModel('Project');
    $now = date('Y-m-d H:i:s');

    $currentPage = 1;
    if(!empty(request()->page)) {
      $currentPage = request()->page;
    }

    //set page
    Paginator::currentPageResolver(function() use ($currentPage) {
        return $currentPage;
    });

    // GET Charity
    $charity = Service::loadModel('Charity')->find($id);

    // Search Query String
    $conditions = array();

    $conditions[] = array('charity_id','=',$id);
    $field = 'created_at';
    $sorting = 'desc';

    if(!empty(request()->q)) {
      $conditions[] = array('name','=','%'.request()->q.'%');
    }

    if(!empty(request()->opened)) {
      $conditions[] = array('end_date','>',$now);
    }

    if(!empty(request()->sort)) {
      list($field,$sorting) = explode(':', request()->sort);
    }

    $projects = $model->where($conditions)->orderBy($field,$sorting)->paginate(24);
    $projects->appends(request()->all());

    // SET LIB
    $this->setData('stringLib',new stringHelper);
    $this->setData('dateLib',new Date);

    // SET DATA
    $this->setData('donationModel',Service::loadModel('Donation'));
    $this->setData('projects',$projects);
    $this->setData('charity',$charity);
    $this->setData('countProject',number_format($model->where('charity_id','=',$id)->count(), 0, '.', ','));
    $this->setData('countOpenedProject',number_format($model->where([['charity_id','=',$id],['end_date','>',$now]])->count(), 0, '.', ','));
    $this->setData('now',$now);
    $this->setData('sorting',$this->sorting);

    // SET META
    $this->setMeta('title','โครงการ - '.$charity->name.' — CharityTH');
    $this->setMeta('description',$charity->short_desc);
    $this->setMeta('image',$charity->thumbnail);

    return $this->view('page.project.list_by_charity');

  }
}
