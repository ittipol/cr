<?php

namespace App\Models;

class Charity extends Model
{
  protected $table = 'charities';
  protected $fillable = ['name','short_desc','description','charity_type_id','logo','thumbnail','vdo_url','shared_image','images','address','district_id','province_id','has_reward','active'];

  public function charityType() {
    return $this->hasOne('App\Models\CharityType','id','charity_type_id');
  }

  public function province() {
    return $this->hasOne('App\Models\Province','id','province_id');
  }
}
