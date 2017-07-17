<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\library\service;
use App\library\date;
use Redirect;

class NewsController extends Controller
{
  public function listView() {

    $model = Service::loadModel('News');

    $currentPage = 1;
    if(!empty(request()->page)) {
      $currentPage = request()->page;
    }

    //set page
    Paginator::currentPageResolver(function() use ($currentPage) {
        return $currentPage;
    });

    $data = $model->paginate(15);

    $this->setData('news',$data);

    return $this->view('admin.page.news.list');
  }

  public function add() {
    
    $charities = Service::loadFieldData('Charity',array(
      'key' =>'id',
      'field' => 'name',
    ));

    $this->setData('charities', $charities);

    return $this->view('admin.page.news.form.add');

  }

  public function addingSubmit() {

    $model = Service::loadModel('News');

    if($model->fill(request()->all())->save()) {
      return Redirect::to('admin/news/list');
    }

    return Redirect::back();
  }

  public function edit($id) {
    
    $data = Service::loadModel('News')->find($id);

    $charities = Service::loadFieldData('Charity',array(
      'key' =>'id',
      'field' => 'name',
    ));

    $this->setData('data',$data);
    $this->setData('charities', $charities);

    return $this->view('admin.page.news.form.edit');

  }

  public function editingSubmit($id) {
    
    $data = Service::loadModel('News')->find($id);

    if($data->fill(request()->all())->save()) {
      return Redirect::to('admin/news/list');
    }

    return Redirect::back();

  }

  public function delete() {
    
  }
}
