<?php

namespace App\Http\Controllers\Admin;

class StaticFileController extends Controller
{
  public function serveImages($filename){
dd('xsss');
    $image = StockImage::select(array('model','model_id','filename','image_type_id'))
    ->where('filename','like',$filename)
    ->first();

    if(empty($image)) {
      return Response::make(file_get_contents($this->noImagePath), 200, $headers);
      // return response()->download($this->noImagePath, null, [], null);
    }

    $path = $image->getImagePath();

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

    return response()->download($this->noImagePath, null, [], null);

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
