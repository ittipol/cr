<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
use App\library\date;
use Redirect;

class NewsController extends Controller
{
  public function index($id) {

    $news = Service::loadModel('News')->find($id);

    if(empty($news)) {
      return $this->error('ไม่พบข่าวสารนี้');
    }

    $this->setData('news',$news);

    return $this->view('page.news.index');

  }

  public function listView() {
   
    $model = Service::loadModel('News');

    $currentPage = 1;
    if(!empty($this->query['page'])) {
      // request()->page
      $currentPage = $this->query['page'];
    }

    //set page
    Paginator::currentPageResolver(function() use ($currentPage) {
        return $currentPage;
    });

    $this->setData('news',$model->paginate(15));

    return $this->view('page.news.list');

  }
}
