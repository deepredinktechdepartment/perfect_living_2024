<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitConfiguration extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'beds',
        'baths',
        'balconies',
        'facing',
        'unit_size',
        'floor_plan',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
