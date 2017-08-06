<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\library\service;
use App\library\date;
use Redirect;
use DB;

class SummaryController extends Controller
{
  public function index() {

    $date = new Date;

    // Get charities
    $charities = Service::loadModel('Charity')->get();

    // $_charities = array();
    
    $_charities['all'] = '-';
    foreach ($charities as $charity) {
      $_charities[$charity->id] = $charity->name;
    }

    $this->setData('charities',$_charities);

    if(empty($_GET['month']) || empty($_GET['year'])) {
      return $this->view('admin.page.summary.index');
    }

    $donationModel = Service::loadModel('Donation');

    $monthly = false;
    if(!empty($_GET['date'])) {
      $monthly = true;
    }

    // $donations = null;

    $conditions = array(
      ['verified','=',1]
    );

    if(!empty($_GET['charity_id'])) {
      $conditions[] = array('model','like','Charity');
      $conditions[] = array('model_id','=',$_GET['charity_id']);
    }

    if($monthly) {
      $start = $_GET['year'].'-'.$_GET['month'].'-'.$_GET['date'].' 00:00:00';
      $end = $_GET['year'].'-'.$_GET['month'].'-'.$_GET['date'].' 23:59:59';

      $donations = $donationModel
      ->select(DB::raw('SUM(amount) as totalAmount, model, model_id'))
      ->where($conditions)
      ->whereBetween('created_at', [$start, $end])
      ->groupBy('model','model_id')
      ->orderBy('model','ASC')
      ->orderBy('model_id','ASC')
      ->get();

    }else{
      // Find Start & last date of month
      $dateRange = $date->getFirstAndLastDateOfMonth($_GET['month'],$_GET['year']);
    
      $donations = $donationModel
      ->select(DB::raw('SUM(amount) as totalAmount, model, model_id'))
      ->where($conditions)
      ->whereBetween('created_at', [$dateRange['start'], $dateRange['end']])
      ->groupBy('model','model_id')
      ->orderBy('model','ASC')
      ->orderBy('model_id','ASC')
      ->get();

    }

    $this->setData('donations',$donations);

    return $this->view('admin.page.summary.index');
  }
}
