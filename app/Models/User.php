<?php

namespace App\Models;

class User extends Model
{
  protected $table = 'users';
  protected $fillable = ['email','password','name','shipping_address','remember_token'];
  protected $hidden = ['password','remember_token'];
}
