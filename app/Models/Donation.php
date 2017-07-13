<?php

namespace App\Models;

class Donation extends Model
{
  protected $table = 'donations';
  protected $fillable = ['charity_id','project_id','user_id','donator_name','email','acc_no','amount','transfer_date','reward','address','verified'];

  public $validation = array(
    'rules' => array(
      'email' => 'email',
      'date' => 'required|date_format:Y-m-d',
      'amount' => 'required|regex:/^[0-9]{1,3}(?:,?[0-9]{3})*(?:\.[0-9]{2})?$/',
    ),
    'messages' => array(
      'email.email' => 'อีเมลไม่ถูกต้อง',
      'date.required' => 'วันที่โอนห้ามว่าง',
      'date.date_format' => 'วันที่โอนไม่ถูกต้อง',
      'amount.required' => 'จำนวนเงินห้ามว่าง',
      'amount.regex' => 'จำนวนเงินไม่ถูกต้อง',
    )
  );

  public $validationWithAddress = array(
    'rules' => array(
      'email' => 'email',
      'date' => 'required|date_format:d-m-Y',
      'amount' => 'required|regex:/^[0-9]{1,3}(?:,?[0-9]{3})*(?:\.[0-9]{2})?$/',
      'receiver_name' => 'required',
      'address_no' => 'required',
      'sub_district' => 'required',
      'post_code' => 'required|min:5|max:5|numeric',
    ),
    'messages' => array(
      'email.email' => 'อีเมลไม่ถูกต้อง',
      'date.required' => 'วันที่โอนห้ามว่าง',
      'date.date_format' => 'วันที่โอนไม่ถูกต้อง',
      'amount.required' => 'จำนวนเงินห้ามว่าง',
      'amount.regex' => 'จำนวนเงินไม่ถูกต้อง',
      'receiver_name.required' => 'ชื่อ นามสกุลผู้รับห้ามว่าง',
      'address_no.required' => 'บ้านเลขที่ห้ามว่าง',
      'sub_district.required' => 'ตำบล/แขวงห้ามว่าง',
      'post_code.required' => 'รหัสไปรษณีย์ห้ามว่าง',
      'post_code.min' => 'รหัสไปรษณีย์ไม่ถูกต้อง',
      'post_code.max' => 'รหัสไปรษณีย์ไม่ถูกต้อง',
      'post_code.numeric' => 'รหัสไปรษณีย์ไม่ถูกต้อง',
    )
  );

}
