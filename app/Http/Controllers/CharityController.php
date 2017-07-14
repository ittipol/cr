<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
// use App\library\date;
use Redirect;

class CharityController extends Controller
{
  public function index($id) {

    $data = Service::loadModel('Charity')->find($id);

    $donationModel = Service::loadModel('Donation');

    $donationModel->countDonor('Charity',$id);

    $this->setData('charity',$data);
    $this->setData('amount',$donationModel->getTotalAmount('Charity',$id,true));

    return $this->view('page.charity.index');

  }

  public function listView() {

    $model = Service::loadModel('Charity');

    $currentPage = 1;
    if(!empty($this->query['page'])) {
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
