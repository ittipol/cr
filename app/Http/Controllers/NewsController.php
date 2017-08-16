<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
use App\library\date;
use App\library\stringHelper;
use Redirect;

class NewsController extends Controller
{
  private $sorting = array(
    'created_at:desc' => 'ใหม่สุด',
    'created_at:asc' => 'เก่าสุด',
  );

  public function index($id) {

    $news = Service::loadModel('News')->find($id);

    if(empty($news)) {
      return $this->error('ไม่พบข่าวสารนี้');
    }

    // Get Charity
    $charity = Service::loadModel('Charity')->select('id','name','logo')->find($news->charity_id);

    // SET LIB
    $this->setData('dateLib',new Date);

    // SET DATA
    $this->setData('news',$news);
    $this->setData('charity',$charity);

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

    // Search Query String
    $conditions = array();

    $field = 'created_at';
    $sorting = 'desc';

    if(!empty(request()->q)) {
      $conditions[] = array('name','=','%'.request()->q.'%');
    }

    if(!empty(request()->sort)) {
      list($field,$sorting) = explode(':', request()->sort);
    }

    if(!empty($conditions)) {
      $news = $model->where($conditions)->orderBy($field,$sorting)->paginate(24);
    }else{
      $news = $model->orderBy($field,$sorting)->paginate(24);
    }
    
    $news->appends(request()->all());

    // SET LIB
    $this->setData('stringLib',new stringHelper);
    $this->setData('dateLib',new Date);
    
    // SET DATA
    $this->setData('news',$news);
    $this->setData('sorting',$this->sorting);

    // SET META
    $this->setMeta('title','ข่าวสาร — CharityTH');
    // $this->setMeta('description','');
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

    // Search Query String
    $conditions = array();

    $conditions[] = array('charity_id','=',$id);
    $field = 'created_at';
    $sorting = 'desc';

    if(!empty(request()->q)) {
      $conditions[] = array('name','=','%'.request()->q.'%');
    }

    if(!empty(request()->sort)) {
      list($field,$sorting) = explode(':', request()->sort);
    }

    $news = $model->where($conditions)->orderBy($field,$sorting)->paginate(24);
    $news->appends(request()->all());

    // GET Charity
    $charity = Service::loadModel('Charity')->find($id);

    if(empty($charity)) {
      return $this->error('ไม่พบมูลนิธิ');
    }

    // SET LIB
    $this->setData('stringLib',new stringHelper);
    $this->setData('dateLib',new Date);

    // SET DATA
    $this->setData('news',$news);
    $this->setData('charity',$charity);
    $this->setData('sorting',$this->sorting);

    // SET META
    $this->setMeta('title','ข่าวสาร - '.$charity->name.' — CharityTH');
    $this->setMeta('description',$charity->short_desc);
    $this->setMeta('image',$charity->thumbnail);

    return $this->view('page.news.list_by_charity');

  }
}
