<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Themeoptions extends Model
{
    // Specify the table if it's not the plural form of the model name
    protected $table = 'themeoptions';

    // Specify the primary key if it's not the default 'id'
    protected $primaryKey = 'id';

    // Indicate if the model should be timestamped (created_at and updated_at)
    public $timestamps = false;

    // The attributes that are mass assignable
    protected $fillable = [
        'header_logo',
        'footer_logo',
        'favicon',
        'copyright',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'instagram_url',
        'pinterest_url',
        'youtube_url',
        'whatsapp_url',
        'short_aboutus',

    ];

    // Optionally, you may add guarded if you have other protected attributes
    // protected $guarded = [];
}
