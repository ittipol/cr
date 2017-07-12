<?php

namespace App\Models;

class Donation extends Model
{
  protected $table = 'donations';
  protected $fillable = ['charity_id','user_id','donator_name','email','acc_no','amount','transfer_date','reward','address','verified'];

}
