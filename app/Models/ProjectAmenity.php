<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectAmenity extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'amenity_name',
        'quantity',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
