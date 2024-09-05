<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaMaster extends Model
{
    use HasFactory;

    protected $table = 'area_masters';

    protected $fillable = ['name', 'city_id'];

    public function city()
    {
        return $this->belongsTo(CityMaster::class);
    }
}
