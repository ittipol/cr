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
}
