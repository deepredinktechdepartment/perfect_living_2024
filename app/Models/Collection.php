<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

  // app/Models/Collection.php

protected $fillable = [
'name',
'slug',
'background_image',
'target_link',
];

}
