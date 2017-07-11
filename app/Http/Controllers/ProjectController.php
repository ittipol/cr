<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
use Redirect;

class ProjectController extends Controller
{
  public function index($id) {

    $data = Service::loadModel('Project')->find($id);

    $this->setData('project',$data);

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
