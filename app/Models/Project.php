<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'company_id',  // Assuming company is a foreign key
        'site_address',
        'city',
        'area',
        'logo',
        'website_url',
        'latitude',
        'longitude',
        'master_plan_layout',
        'about_project',
        'elevation_pictures',
        'enquiry_form',
        'map_collections',
        'map_badges',
        'amenities',
        'project_type',
        'no_of_acres',
        'no_of_towers',
        'no_of_units',
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
      
        public function collections()
        {
        return $this->belongsToMany(Collection::class, 'collections');
        }

        public function badges()
        {
        return $this->belongsToMany(Badge::class, 'badges');
        }

        public function elevationPictures()
        {
        return $this->hasMany(ElevationPicture::class);
        }

  public function company()
        {
            return $this->belongsTo(Company::class);
        }
        
   public function citites()
    {
        return $this->belongsTo(CityMaster::class, 'city');
    }

    public function areas()
    {
        return $this->belongsTo(AreaMaster::class, 'area');
    }
}
