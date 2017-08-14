<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
use App\library\date;
use App\library\stringHelper;
use Redirect;

class NewsController extends Controller
{
  public function index($id) {

    $news = Service::loadModel('News')->find($id);

    if(empty($news)) {
      return $this->error('ไม่พบข่าวสารนี้');
    }

    $this->setData('dateLib',new Date);
    $this->setData('news',$news);

    // SET META
    $this->setMeta('title',$news->title);
    $this->setMeta('description',$news->short_desc);
    $this->setMeta('image',$news->thumbnail);

    return $this->view('page.news.index');

  }

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

    // SET LIB
    $this->setData('stringLib',new stringHelper);
    $this->setData('dateLib',new Date);
    
    // SET DATA
    $this->setData('news',$model->paginate(24));

    // SET META
    $this->setMeta('title','ข่าวสาร — CharityTH');
    $this->setMeta('description','');
    // $this->setMeta('image',null);

    return $this->view('page.news.list');

  }

  public function listByCharity($id) {
   
    $model = Service::loadModel('News');

    $currentPage = 1;
    if(!empty(request()->page)) {
      $currentPage = request()->page;
    }

    //set page
    Paginator::currentPageResolver(function() use ($currentPage) {
        return $currentPage;
    });

    $news = $model->where('charity_id','=',$id)->paginate(24);

    $this->setData('news',$news);

    return $this->view('page.news.list_by_charity');

  }
}
