<?php

namespace App\Models;

class News extends Model
{
  protected $table = 'news';
  protected $fillable = ['charity_id','title','short_desc','description','thumbnail'];

  public function charity() {
    return $this->hasOne('App\Models\Charity','id','charity_id');
  }
}
