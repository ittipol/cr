<?php

namespace App\library;

class handleStockImage
{
  private $image;
  private $filename;
  private $width;
  private $height;
  // private $maxFileSizes;
  // private $acceptedFileTypes;

  private $temporaryPath = null;

  public function __construct($image = null) {

    if(!empty($image)) {

      $this->image = $image;
      $this->generateFileName();

      list($this->width,$this->height) = getimagesize($this->image->getRealPath());

    }

    $this->temporaryPath = Service::loadModel('StockImage')->getTempPath();

  }

  private function generateFileName() {
    $this->filename = time().Token::generateNumber(15).$this->image->getSize().'.'.$this->image->getClientOriginalExtension();
  }

  public function getFileName() {
    return $this->filename;
  }

  public function getOriginalFileName() {
    return $this->image->getClientOriginalName();
  }

  public function getRealPath() {
    return $this->image->getRealPath();
  }

  // public function checkFileType() {
  //   return in_array($this->image->getMimeType(), $this->acceptedFileTypes);
  // }

  // public function checkFileSize() {
  //   if($this->image->getSize() <= $this->maxFileSizes){
  //     return true;
  //   }
  //   return false;
  // }

  public function generateImageSize($originalWidth = null,$originalHeight = null){

    if(empty($originalWidth)) {
      $originalWidth = $this->width; 
    }

    if(empty($originalHeight)) {
      $originalHeight = $this->height; 
    }

    $ratio = abs($originalWidth/$originalHeight);

    $width = $originalWidth;
    $height = $originalHeight;

    if(($originalWidth > 960) || ($originalHeight > 960)) {

      if($originalWidth > $originalHeight) {

        $width = 960;

        if(($ratio > 1) && ($ratio < 1.6)) {
          $width = $originalWidth/2;
        } 

        $height = round($originalHeight*($width/$originalWidth));

      }elseif($originalWidth < $originalHeight) {

        $height = 960;

        if(($ratio > 1) && ($ratio < 1.6)) {
          $height = $originalHeight/2;
        } 

        $width = round($originalWidth*($height/$originalHeight));

      }else {
        // ratio = 1
        $width = 960;
        $height = 960;
      }  

    }

    return array($width,$height);

  }

  public function resizeProfileImage($originalWidth = null,$originalHeight = null){

    if(empty($originalWidth)) {
      $originalWidth = $this->width; 
    }

    if(empty($originalHeight)) {
      $originalHeight = $this->height; 
    }

    $ratio = abs($originalWidth/$originalHeight);

    $width = $originalWidth;
    $height = $originalHeight;


    if($height > 300) {
      // or automatic crop
      // top_x (imageWidth - cropsizewidth) / 2
      // top_y (imageHeight - cropsizeheight) / 2
      // bottom_x = top_x + 300;
      // bottom_y = top_y + 300

      $height = 300;
      $width = round($originalWidth*($height/$originalHeight));
    }

    return array($width,$height);

  }

  public function createTemporyFolder($folderName) {

    $url = new Url;

    $temporaryPath = $this->temporaryPath;

    if(!is_dir($temporaryPath)){
      mkdir($temporaryPath,0777,true);
    }

    $temporaryPath .= $folderName;

    if(!is_dir($temporaryPath)){
      mkdir($temporaryPath,0777,true);
    }

    return $url->addSlash($temporaryPath);

  }

}