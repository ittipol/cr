<?php

namespace App\Models;

class DonationVia extends Model
{
  protected $table = 'donation_vias';
  protected $fillable = ['name','alias'];
}
