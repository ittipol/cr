<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\library\service;
use Redirect;

class CharityController extends Controller
{
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

    $data = $model->paginate(15);

    $this->setData('charities',$data);

    return $this->view('admin.page.charity.list');
  }

  public function add() {

    $charityTypes = Service::loadFieldData('CharityType',array(
      'key' =>'id',
      'field' => 'name',
    ));

    $provinces = Service::loadFieldData('Province',array(
      'key' =>'id',
      'field' => 'name',
      'order' => array(
        array('top','ASC'),
        array('id','ASC')
      )
    ));

    $this->setData('charityTypes', $charityTypes);
    $this->setData('provinces', $provinces);

    return $this->view('admin.page.charity.form.add');
  }

  public function addingSubmit() {

    $model = Service::loadModel('Charity');

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
      return Redirect::to('admin/charity/list');
    }

    return Redirect::back();
  }

  public function edit($id) {

    $data = Service::loadModel('Charity')->find($id);

    $charityTypes = Service::loadFieldData('CharityType',array(
      'key' =>'id',
      'field' => 'name',
    ));

    $provinces = Service::loadFieldData('Province',array(
      'key' =>'id',
      'field' => 'name',
      'order' => array(
        array('top','ASC'),
        array('id','ASC')
      )
    ));

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
    $this->setData('charityTypes', $charityTypes);
    $this->setData('provinces', $provinces);

    return $this->view('admin.page.charity.form.edit');

  }

  public function editingSubmit($id) {

    $model = Service::loadModel('Charity')->find($id);

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
      return Redirect::to('admin/charity/list');
    }

    return Redirect::back();

  }

  public function delete($id) {
   
    dd('Are you sure???');

    $data = Service::loadModel('Charity')->find($id);

    // ?confirm=y
    // $_GET['confirm']

    if(!empty($_GET['confirm']) && ($_GET['confirm'] == 'y')) {
      //delete
      dd('deleted');
      return Redirect::to('admin/charity/list');
    }

    // Go to confirm page

  }
}
