<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
      // Allow these fields for mass assignment
      protected $fillable = ['name','slug', 'about_builder','address1', 'address2', 'phone', 'website_url'];
}
