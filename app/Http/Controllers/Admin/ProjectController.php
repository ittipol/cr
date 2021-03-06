<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\library\service;
use App\library\date;
use Redirect;

class ProjectController extends Controller
{
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

    $data = $model->paginate(15);

    $this->setData('goals',$data);

    return $this->view('admin.page.goal.list');
  }

  public function add() {

    $charities = Service::loadFieldData('Charity',array(
      'key' =>'id',
      'field' => 'name',
    ));

    $this->setData('charities', $charities);
    $this->setDateTime();

    return $this->view('admin.page.goal.form.add');

  }

  public function addingSubmit() {

    $model = Service::loadModel('Project');

    $model->end_date = request()->get('end_year').'-'.request()->get('end_month').'-'.request()->get('end_day').' '.request()->get('end_hour').':'.request()->get('end_min').':59';

    if(!empty(request()->_images)) {

      $images = array();
      foreach (request()->_images as $value) {
        
        if(empty($value)) {
          continue;
        }

        $images[] = $value;

      }

      if(!empty($images)) {
        $model->images = json_encode($images);
      }

    }

    if($model->fill(request()->all())->save()) {

      // Add to timeline

      return Redirect::to('admin/project/list');
    }

    return Redirect::back();
  }

  public function edit($id) {

    $data = Service::loadModel('Project')->find($id);

    $charities = Service::loadFieldData('Charity',array(
      'key' =>'id',
      'field' => 'name',
    ));

    $date = new Date;
    $endDate = $date->explodeDateTime($data->end_date);

    $data['end_day'] = $endDate['day'];
    $data['end_month'] = $endDate['month'];
    $data['end_year'] = $endDate['year'];
    $data['end_hour'] = $endDate['hour'];
    $data['end_min'] = $endDate['min'];

    $images = array(null,null,null,null,null,null,null,null,null,null);
    if(!empty($data->images)) {
      $images = json_decode($data->images,true);

      $remain = 10 - count($images);

      for ($i=1; $i <= $remain; $i++) { 
        $images[] = null;
      }
    }

    $this->setData('data',$data);
    $this->setData('_images',$images);
    $this->setData('charities', $charities);
    $this->setDateTime();

    return $this->view('admin.page.goal.form.edit');

  }

  public function editingSubmit($id) {

    $model = Service::loadModel('Project')->find($id);

    $model->end_date = request()->get('end_year').'-'.request()->get('end_month').'-'.request()->get('end_day').' '.request()->get('end_hour').':'.request()->get('end_min').':59';

    if(!empty(request()->_images)) {

      $images = array();
      foreach (request()->_images as $value) {
        
        if(empty($value)) {
          continue;
        }

        $images[] = $value;

      }

      if(!empty($images)) {
        $model->images = json_encode($images);
      }

    }

    if($model->fill(request()->all())->save()) {
      return Redirect::to('admin/project/list');
    }

    return Redirect::back();

  }

  public function delete($id) {
   
    dd('Are you sure???');

    $data = Service::loadModel('Project')->find($id);

    // ?confirm=y
    // $_GET['confirm']

    if(!empty($_GET['confirm']) && ($_GET['confirm'] == 'y')) {
      //delete
      dd('deleted');
      return Redirect::to('admin/project/list');
    }

    // Go to confirm page
  }

  private function setDateTime() {

    $date = new Date;

    $currentYear = date('Y');
    
    $day = array();
    $month = array();
    $year = array();

    for ($i=1; $i <= 31; $i++) { 
      $day[$i] = $i;
    }

    for ($i=1; $i <= 12; $i++) { 
      $month[$i] = $date->getMonthName($i);
    }

    for ($i=$currentYear; $i <= $currentYear + 6; $i++) { 
      $year[$i] = $i+543;
    }

    // Time
    $hours = array();
    $mins = array();

    for ($i=0; $i <= 23; $i++) { 

      if($i < 10) {
        $hours['0'.$i] = $i;
      }else{
        $hours[$i] = $i;
      }

    }

    for ($i=0; $i <= 59; $i++) {

      if($i < 10) {
        $mins['0'.$i] = '0'.$i;
      }else{
        $mins[$i] = $i;
      }
      
    }

    $this->setData('day',$day);
    $this->setData('month',$month);
    $this->setData('year',$year);

    $this->setData('currentDay',date('j'));
    $this->setData('currentMonth',date('n'));
    $this->setData('currentYear',$currentYear);

    $this->setData('hours',$hours);
    $this->setData('mins',$mins);

  }
}
