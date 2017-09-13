<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\library\service;
use App\library\date;
use App\library\stringHelper;
use Redirect;

class VideoController extends Controller
{
  protected $pageName = 'Video';
  
  private $sorting = array(
    'created_at:desc' => 'ใหม่สุด',
    'created_at:asc' => 'เก่าสุด',
  );

  public function index($id) {

    $video = Service::loadModel('Video')->find($id);

    if(empty($video)) {
      return $this->error('ไม่พบวีดีโอนี้');
    }

    // Get Related Video
    $relatedVideo = Service::loadModel('Video')
    ->select('id','charity_id','title','short_desc','thumbnail','created_at')
    ->where('id','!=',$id)
    ->orderBy('created_at','desc')
    ->take(12);

    // Get Charity
    $charity = Service::loadModel('Charity')->select('id','name','logo')->find($video->charity_id);

    // SET LIB
    $this->setData('dateLib',new Date);

    // SET DATA
    $this->setData('video',$video);
    $this->setData('relatedVideo',$relatedVideo);
    $this->setData('charity',$charity);

    // SET META
    $this->setMeta('title',$video->title);
    $this->setMeta('description',$video->short_desc);
    $this->setMeta('image',$video->thumbnail);

    return $this->view('page.video.index');

  }

  public function listByCharity($id) {
   
    $model = Service::loadModel('Video');

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
      $conditions[] = array('title','=','%'.request()->q.'%');
    }

    if(!empty(request()->sort)) {
      list($field,$sorting) = explode(':', request()->sort);
    }

    $video = $model->where($conditions)->orderBy($field,$sorting)->paginate(24);
    $video->appends(request()->all());

    // GET Charity
    $charity = Service::loadModel('Charity')->find($id);

    if(empty($charity)) {
      return $this->error('ไม่พบสถานที่');
    }

    // SET LIB
    $this->setData('stringLib',new stringHelper);
    $this->setData('dateLib',new Date);

    // SET DATA
    $this->setData('video',$video);
    $this->setData('charity',$charity);
    $this->setData('sorting',$this->sorting);

    // SET META
    $this->setMeta('title','วีดีโอ - '.$charity->name.' — CharityTH');
    $this->setMeta('description',$charity->short_desc);
    $this->setMeta('image',$charity->thumbnail);

    return $this->view('page.video.list_by_charity');

  }
}
