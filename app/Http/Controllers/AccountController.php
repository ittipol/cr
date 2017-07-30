<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileEditRequest;
use Illuminate\Pagination\Paginator;
use App\library\service;
use App\library\date;
use App\library\handleStockImage;
use App\library\imageTool;
use Redirect;
use Auth;

class AccountController extends Controller
{
  public function __construct() {
    $this->botDisallowed();
  }
  
  public function index() {

    $userId = Auth::user()->id;
    $donationModel = Service::loadModel('Donation');

    $donations = $donationModel
    ->select('id','model','model_id','amount')
    ->where([
      ['user_id','=',$userId],
      ['verified','=',1]
    ])
    ->whereBetween('transfer_date', [date('Y-m-1'), date('Y-m-t')]);

    $totalAmount = $donationModel->getTotalAmountBy(null,$userId,true);

    // SUM Amount
    // $totalAmountCharity = $donationModel->getTotalAmountBy('Charity',$userId,true);
    // $totalAmountProject = $donationModel->getTotalAmountBy('Project',$userId,true);

    $this->setData('donations',$donations);
    $this->setData('totalAmount',$totalAmount);
    // $this->setData('totalAmountCharity',$totalAmountCharity);
    // $this->setData('totalAmountProject',$totalAmountProject);

    $this->setMeta('title','บัญชี — CharityTH');
    // $this->setMeta('description',$charity->short_desc);
    // $this->setMeta('image',$charity->thumbnail);

    return $this->view('page.account.index');
  }

  public function edit() {

    $this->setData('data',Service::loadModel('User')->find(Auth::user()->id));

    $this->setMeta('title','แก้ไขโปรไฟล์ — CharityTH');

    return $this->view('page.account.profile_edit');
  }

  public function editingSubmit(ProfileEditRequest $request) {

    $user = Service::loadModel('User')->find(Auth::user()->id);

    $user->name = $request->get('name');

    if($user->save() && !empty($request->file('profile_image'))) {
      $handle = new handleStockImage($request->file('profile_image'));

      $filename = $handle->getFileName();

      list($width,$height) = $handle->resizeProfileImage();

      $target = storage_path('app/public/users/'.$user->id.'/avatar/');
      if(!is_dir($target)){
        mkdir($target,0777,true);
      }

      $imageTool = new ImageTool($handle->getRealPath());
      $imageTool->png2jpg($width,$height);
      $imageTool->resize($width,$height);
      $moved = $imageTool->save($target.$filename);

      // update filename
      $

    }

    return Redirect::to('account');

  }

  public function donationHistory() {

    $model = Service::loadModel('Donation');

    $currentPage = 1;
    if(!empty(request()->page)) {
      $currentPage = request()->page;
    }

    //set page
    Paginator::currentPageResolver(function() use ($currentPage) {
        return $currentPage;
    });

    $data = $model
    ->select('id','model','model_id','amount','created_at')
    ->where([
      ['user_id','=',Auth::user()->id],
      ['verified','=',1]
    ])->orderBy('created_at','desc')->paginate(30);

    $this->setData('dateLib',new Date);

    $this->setData('donations',$data);

    $this->setMeta('title','บัญชี » การบริจาค — CharityTH');

    return $this->view('page.account.donation_history');
  }
}
