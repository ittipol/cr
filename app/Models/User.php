<?php

namespace App\Models;

class User extends Model
{
  protected $table = 'users';
  protected $fillable = ['social_provider_id','social_user_id','email','password','name','shipping_address','remember_token'];
  protected $hidden = ['password','remember_token'];
}
