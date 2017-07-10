<?php

namespace App\Models;

class Goal extends Model
{
  protected $table = 'goals';
  protected $fillable = ['charity_id','name','description','current_amount','target_amount','end_date'];

  public function charity() {
    return $this->hasOne('App\Models\Charity','id','charity_id');
  }
}
