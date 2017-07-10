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
    if(!empty($this->query['page'])) {
      $currentPage = $this->query['page'];
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
      // 'index' => 'charityTypes'
    ));

    $provinces = Service::loadFieldData('Province',array(
      'key' =>'id',
      'field' => 'name',
      // 'index' => 'provinces',
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

    if($model->fill(request()->all())->save()) {
      return Redirect::to('admin/charity/list');
    }

    return Redirect::back();
  }

  public function edit($id) {

    $charityTypes = Service::loadFieldData('CharityType',array(
      'key' =>'id',
      'field' => 'name',
      // 'index' => 'charityTypes'
    ));

    $provinces = Service::loadFieldData('Province',array(
      'key' =>'id',
      'field' => 'name',
      // 'index' => 'provinces',
      'order' => array(
        array('top','ASC'),
        array('id','ASC')
      )
    ));

    $this->setData('data',Service::loadModel('Charity')->find($id));
    $this->setData('charityTypes', $charityTypes);
    $this->setData('provinces', $provinces);

    return $this->view('admin.page.charity.form.edit');

  }

  public function editingSubmit($id) {

    $data = Service::loadModel('Charity')->find($id);

    if($data->fill(request()->all())->save()) {
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
