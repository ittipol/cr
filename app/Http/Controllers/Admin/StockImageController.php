<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\Models\StockImage;
use App\library\handleStockImage;
use App\library\imageTool;
use Input;
use Redirect;

class StockImageController extends Controller
{
  public function listView() {

    $model = new StockImage;

    $currentPage = 1;
    if(!empty($_GET['page'])) {
      $currentPage = $_GET['page'];
    }

    //set page
    Paginator::currentPageResolver(function() use ($currentPage) {
        return $currentPage;
    });

    $data = $model->orderBy('created_at','desc')->paginate(24);

    $this->setData('images',$data);

    return $this->view('admin.page.stock_image.list');

  }

  public function add() {
    return $this->view('admin.page.stock_image.form.add');
  }

  public function addingSubmit() {

    if(empty(request()->get('Image'))) {
      return Redirect::to('admin/stock_image/list');
    }

    $data = request()->get('Image');

    $this->addImages($data['images'],$data['token']);

    return Redirect::to('admin/stock_image/list');

  }

  private function addImages($images,$token,$options = array()) {

    foreach ($images as $image) {
      $this->handleImage($image,$token);
    }

    $imageInstance = new StockImage;
    $imageInstance->deleteTempDir($token);

    return true;

  }

  private function handleImage($image,$token) {

    $imageInstance = new StockImage;

    if(!empty($image['id'])) {
      $imageInstance = $imageInstance->where([
        ['id','=',$image['id']],
      ])->first();

      if(empty($imageInstance)) {
        return false;
      }

    }

    $path = null;
    if(!empty($image['filename'])) {

      $imageInstance->filename = $image['filename'];

      $path = $imageInstance->getTempFilenamePath($token);

      if(!file_exists($path)) {
        return false;
      }

    }

    if(!$imageInstance->save()) {
      return false;
    }

    $target = $imageInstance->getStockImagePath();
    if(!is_dir($target)){
      mkdir($target,0777,true);
    }

    $imageInstance->moveImage($path);

    return $imageInstance->id;

  }

  public function upload() {

    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
      exit('Error!!!');  //trygetRealPath detect AJAX request, simply exist if no Ajax
    }

    $handle = new handleStockImage(Input::file('image'));

    $filename = $handle->getFileName();

    list($width,$height) = $handle->generateImageSize();

    $temporaryPath = $handle->createTemporyFolder(Input::get('imageToken'));

    $imageTool = new ImageTool($handle->getRealPath());
    $imageTool->png2jpg($width,$height);
    $imageTool->resize($width,$height);
    $moved = $imageTool->save($temporaryPath.$filename);

    if(!$moved) {
      return response()->json(array('success' => false));
    }

    return response()->json(array(
      'success' => true,
      'filename' => $filename
    ));

  }

}
