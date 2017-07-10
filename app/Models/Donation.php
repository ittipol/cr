<?php

namespace App\Models;

class Donation extends Model
{
  protected $table = 'donations';
  protected $fillable = ['charity_id','donator_name','acc_no','amount'];

  public function setUpdatedAt($value) {}
}
