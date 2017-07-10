<?php

namespace App\Models;

use File;

class StockImage extends Model
{
  protected $table = 'stock_images';
  protected $fillable = ['filename'];

  private $temporaryPath = 'temporary/';
  private $stockImagePath = 'app/public/stock_images/';

  public function getTempPath() {
    return storage_path($this->temporaryPath);
  }

  public function getTempFilenamePath($token) {
    return $this->getTempPath().$token.'/'.$this->filename;
  }

  public function getStockImagePath() {
    return storage_path($this->stockImagePath);
  }

  public function getImagePath($filename = '') {

    if(empty($filename)) {
      $filename = $this->filename;
    }

    return $this->getStockImagePath().'/'.$filename;
  }

  public function moveImage($path) {

    if(empty($path)) {
      return false;
    }

    return File::move($path, $this->getImagePath());
  }

  public function deleteTempDir($directoryName) {
    return File::deleteDirectory($this->getTempPath().$directoryName);
  }

}
