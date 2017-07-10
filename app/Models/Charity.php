<?php

namespace App\Models;

class Charity extends Model
{
  protected $table = 'charities';
  protected $fillable = ['name','description','donation_description','charity_type_id','address','district_id','province_id'];

  public function charityType() {
    return $this->hasOne('App\Models\CharityType','id','charity_type_id');
  }

  public function province() {
    return $this->hasOne('App\Models\Province','id','province_id');
  }
}
