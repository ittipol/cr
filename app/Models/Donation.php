<?php

namespace App\Models;

use DB;

class Donation extends Model
{
  protected $table = 'donations';
  protected $fillable = ['model','model_id','code','unidentified','user_id','guest_name','acc_no','amount','transfer_date','get_reward','reward','shipping_address','verified'];

  public $validation = array(
    'rules' => array(
      // 'email' => 'email',
      'date' => 'required|date_format:Y-m-d',
      'amount' => 'required|regex:/^[0-9]{1,3}(?:,?[0-9]{3})*(?:\.[0-9]{2})?$/',
    ),
    'messages' => array(
      // 'email.email' => 'อีเมลไม่ถูกต้อง',
      'date.required' => 'วันที่โอนห้ามว่าง',
      'date.date_format' => 'วันที่โอนไม่ถูกต้อง',
      'amount.required' => 'จำนวนเงินห้ามว่าง',
      'amount.regex' => 'จำนวนเงินไม่ถูกต้อง',
    )
  );

  public $validationWithAddress = array(
    'rules' => array(
      // 'email' => 'email',
      'date' => 'required|date_format:Y-m-d',
      'amount' => 'required|regex:/^[0-9]{1,3}(?:,?[0-9]{3})*(?:\.[0-9]{2})?$/',
      'receiver_name' => 'required',
      'address_no' => 'required',
      'sub_district' => 'required',
      'post_code' => 'required|min:5|numeric',
    ),
    'messages' => array(
      // 'email.email' => 'อีเมลไม่ถูกต้อง',
      'date.required' => 'วันที่โอนห้ามว่าง',
      'date.date_format' => 'วันที่โอนไม่ถูกต้อง',
      'amount.required' => 'จำนวนเงินห้ามว่าง',
      'amount.regex' => 'จำนวนเงินไม่ถูกต้อง',
      'receiver_name.required' => 'ชื่อ นามสกุลผู้รับห้ามว่าง',
      'address_no.required' => 'บ้านเลขที่ห้ามว่าง',
      'sub_district.required' => 'ตำบล/แขวงห้ามว่าง',
      'post_code.required' => 'รหัสไปรษณีย์ห้ามว่าง',
      'post_code.min' => 'รหัสไปรษณีย์ไม่ถูกต้อง',
      'post_code.numeric' => 'รหัสไปรษณีย์ไม่ถูกต้อง',
    )
  );

  public function user() {
    return $this->hasOne('App\Models\User','id','user_id');
  }

  public function charity() {
    return $this->hasOne('App\Models\Charity','id','model_id');
  }

  public function project() {
    return $this->hasOne('App\Models\Project','id','model_id');
  }

  public function countDonation($model,$modelId,$thisMonth = false) {
    $donation = $this
    ->where([
      ['model','like',$model],
      ['model_id','=',$modelId],
      ['verified','=',1]
    ]);

    if($thisMonth) {
      $donations->whereBetween('transfer_date', [date('Y-m-1'), date('Y-m-t')]);
    }

    return $donation->count();
  }

  public function countDonor($model,$modelId,$thisMonth = false) {

    $count = 0;

    $donations = $this
    ->where([
      ['model','like',$model],
      ['model_id','=',$modelId],
      ['verified','=',1],
    ])
    ->where(function($q) {
      $q->where('user_id','=',null)
        ->orWhere([
          ['user_id','!=',null],
          ['unidentified','=',1]
        ]);
    });

    if($thisMonth) {
      $donations->whereBetween('transfer_date', [date('Y-m-1'), date('Y-m-t')]);
    }

    $count += $donations->count();

    $donations = $this
    ->select('user_id')
    ->where([
      ['model','like',$model],
      ['model_id','=',$modelId],
      ['verified','=',1],
      ['user_id','!=',null],
      ['unidentified','=',0]
    ])
    // ->groupBy('user_id')
    ->distinct('user_id');
    

    if($thisMonth) {
      $donations->whereBetween('transfer_date', [date('Y-m-1'), date('Y-m-t')]);
    }

    $count += $donations->count('user_id');

    return $count;

  }

  public function getTotalAmountBy($model,$userId,$thisMonth = false,$format = true) {

    $condition = array();

    if(!empty($model)) {
      $condition[] = ['model','like',$model];
    }

    if(!empty($userId)) {
      $condition[] = ['user_id','=',$userId];
    }

    $condition[] = ['verified','=',1];

    $donations = $this
    ->select(DB::raw('SUM(amount) as amount'))
    ->where($condition)
    ->groupBy('model');

    if($thisMonth) {
      $donations->whereBetween('transfer_date', [date('Y-m-1'), date('Y-m-t')]);
    }

    $donation = $donations->first();

    if(empty($donation)) {
      return 0;
    }

    if($format) {
      return number_format($donation->amount, 0, '.', ',');
    }

    return $donations->first()->amount;

  }

  public function getTotalAmount($model,$modelId,$thisMonth = false,$format = true) {

    $donations = $this
    ->select(DB::raw('SUM(amount) as amount'))
    ->where([
      ['model','like',$model],
      ['model_id','=',$modelId],
      ['verified','=',1]
    ])
    ->groupBy('model','model_id');

    if($thisMonth) {
      $donations->whereBetween('transfer_date', [date('Y-m-1'), date('Y-m-t')]);
    }

    $donation = $donations->first();

    if(empty($donation)) {
      return 0;
    }

    if($format) {
      return number_format($donation->amount, 0, '.', ',');
    }

    return $donations->first()->amount;

  }

  public function getDonors($model,$modelId) {

    return $this
    ->select('user_id')
    ->where([
      ['model','like',$model],
      ['model_id','=',$modelId],
      ['verified','=',1],
      ['user_id','!=',null],
      ['unidentified','=',0]
    ])
    ->distinct('user_id');

  }

}
