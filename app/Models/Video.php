<?php

namespace App\Models;

class Video extends Model
{
    protected $table = 'videos';
    protected $fillable = ['charity_id','url','title','short_desc','description','thumbnail','video_embed'];

    public function charity() {
      return $this->hasOne('App\Models\Charity','id','charity_id');
    }
}
