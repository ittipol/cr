<?php

namespace App\library;

use Request;
use Auth;

class Service
{
  public static function loadModel($modelName) {
    $class = 'App\Models\\'.$modelName;

    if(!class_exists($class)) {
      return false;
    }

    return new $class;
  }

  public static function ipAddress() {
    // $ipaddress = null;
    // if (getenv('HTTP_CLIENT_IP'))
    //     $ipaddress = getenv('HTTP_CLIENT_IP');
    // else if(getenv('HTTP_X_FORWARDED_FOR'))
    //     $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    // else if(getenv('HTTP_X_FORWARDED'))
    //     $ipaddress = getenv('HTTP_X_FORWARDED');
    // else if(getenv('HTTP_FORWARDED_FOR'))
    //     $ipaddress = getenv('HTTP_FORWARDED_FOR');
    // else if(getenv('HTTP_FORWARDED'))
    //    $ipaddress = getenv('HTTP_FORWARDED');
    // else if(getenv('REMOTE_ADDR'))
    //     $ipaddress = getenv('REMOTE_ADDR');
    // else
    //     $ipaddress = 'UNKNOWN';
    // return $ipaddress;

    return Request::ip();

  }

  public static function loadFieldData($modelName,$options = array()) {
    $model = Service::loadModel($modelName);

    if(!empty($options['conditions'])){
      $model = $model->where($options['conditions']);
    }

    if(!empty($options['order'])){
      foreach ($options['order'] as $order) {
        $model = $model->orderBy($order[0],$order[1]);
      }
    }

    $records = $model->get();

    $data = array();
    foreach ($records as $record) {
      $data[$record->{$options['key']}] = $record->{$options['field']};
    }

    if(!empty($options['json'])) {
      $data = json_encode($data);
    }

    return $data;
  }

}
