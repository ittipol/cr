<?php

namespace App\Models;

class SocialProvider extends Model
{
  protected $table = 'social_providers';
  protected $fillable = ['name','alias'];
}
