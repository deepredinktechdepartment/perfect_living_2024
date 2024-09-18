<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomCollection extends Model
{
    use HasFactory;

  // app/Models/CustomCollection.php

  // Specify the table associated with the model
  protected $table = 'collection_project';

  // Specify the primary key for the model
  protected $primaryKey = 'id';

  // Define fillable attributes
  protected $fillable = [
      'projects',
      'name',

  ];

  // Define the type casting for the datetime fields
  protected $casts = [
      'created_at' => 'datetime',
      'updated_at' => 'datetime',
  ];
}
