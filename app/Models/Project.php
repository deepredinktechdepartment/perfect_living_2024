<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_id',  // Assuming company is a foreign key
        'site_address',
        'logo',
        'website_url',
        'latitude',
        'longitude',
        'master_plan_layout',
        'about',
        'elevation_pictures',
        'enquiry_form',
        'map_collections',
        'map_badges',
        'project_type',
        'acres',
        'towers',
        'units',
        'price_per_sft',
        'unit_configurations',  // Assuming this is a JSON field or similar
        'amenities',            // Assuming this is a JSON field or similar
    ];


    // Relationships
    public function unitConfigurations()
    {
        return $this->hasMany(UnitConfiguration::class);
    }

    public function projectAmenities()
    {
        return $this->hasMany(ProjectAmenity::class);
    }
        // Define the relationship with the Company model
        public function company()
        {
            return $this->belongsTo(Company::class);
        }
}
