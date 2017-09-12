<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\library\service;
use Redirect;

class VideoController extends Controller
{
  public function listView() {

    $model = Service::loadModel('Video');

    $currentPage = 1;
    if(!empty(request()->page)) {
      $currentPage = request()->page;
    }

    //set page
    Paginator::currentPageResolver(function() use ($currentPage) {
        return $currentPage;
    });

    $data = $model->paginate(15);

    $this->setData('videos',$data);

    return $this->view('admin.page.video.list');
  }

  public function add() {
    
    $charities = Service::loadFieldData('Charity',array(
      'key' =>'id',
      'field' => 'name',
    ));

    $this->setData('charities', $charities);

    return $this->view('admin.page.video.form.add');

  }

  public function addingSubmit() {

    $model = Service::loadModel('Video');

    $model->video_embed = 1; // 1 = youtube

    if($model->fill(request()->all())->save()) {
      return Redirect::to('admin/video/list');
    }

    return Redirect::back();
  }

  public function edit($id) {
    
    $data = Service::loadModel('Video')->find($id);

    $charities = Service::loadFieldData('Charity',array(
      'key' =>'id',
      'field' => 'name',
    ));

    $this->setData('data',$data);
    $this->setData('charities', $charities);

    return $this->view('admin.page.video.form.edit');

  }

  public function editingSubmit($id) {
    
    $data = Service::loadModel('Video')->find($id);

    if($data->fill(request()->all())->save()) {
      return Redirect::to('admin/video/list');
    }

    return Redirect::back();

  }

  public function delete() {
    
  }
}
