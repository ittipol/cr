<?php

namespace App\Models;

class Project extends Model
{
  protected $table = 'projects';
  protected $fillable = ['charity_id','name','short_desc','description','current_amount','target_amount','end_date','thumbnail','vdo_url','images'];

  public function charity() {
    return $this->hasOne('App\Models\Charity','id','charity_id');
  }
}
