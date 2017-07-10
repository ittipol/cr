<?php

namespace App\Http\Controllers;

use App\Models\StockImage;
use Response;

class StaticFileController extends Controller
{
  private $noImagePath = 'images/common/no-img.png';
  
  public function serveImages($filename){

    $image = StockImage::select('filename')->where('filename','like',$filename);

    if(!$image->exists()) {
      // return Response::make(file_get_contents($this->noImagePath), 200, $headers);
      return null;
    }

    $path = $image->first()->getImagePath();

    if(file_exists($path)){

      $headers = array(
        // 'Pragma' => 'no-cache',
        // 'Cache-Control' => 'no-cache, must-revalidate',
        // 'Cache-Control' => 'pre-check=0, post-check=0, max-age=0',
        'Cache-Control' => 'public, max-age=86400',
        'Content-Type' => mime_content_type($path),
        // 'Content-length' => filesize($path),
      );

      return Response::make(file_get_contents($path), 200, $headers);

      // return Response::download($path, $filename, $headers);

    }

    // return response()->download($this->noImagePath, null, [], null);
    return null;

    // $headers = array(
    //   'Cache-Control' => 'no-cache, must-revalidate',
    //   // 'Cache-Control' => 'no-store, no-cache, must-revalidate',
    //   // 'Cache-Control' => 'pre-check=0, post-check=0, max-age=0',
    //   // 'Pragma' => 'no-cache',
    //   'Content-Type' => mime_content_type($path),
    //   // 'Content-Disposition' => 'inline; filename="'.$image->name.'"',
    //   // 'Content-Transfer-Encoding' => 'binary',
    //   'Content-length' => filesize($path),
    // );

    // return Response::make(file_get_contents($path), 200, $headers);

  }
}
