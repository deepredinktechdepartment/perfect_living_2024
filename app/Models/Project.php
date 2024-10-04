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
        'is_featured',
        'company_id',  // Assuming company is a foreign key
        'site_address',
        'city',
        'area',
        'logo',
        'website_url',
        'status',
        'project_status',
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

    ];

    protected $casts = [
        'company_id' => 'array', // Automatically casts the JSON to an array
    ];
    // Relationships
    public function unitConfigurations()
    {
        return $this->hasMany(UnitConfiguration::class);
    }

 public function projectAmenities()
{
    $amenityIds = $this->amenities;

    // Check if `company_id` is a valid JSON string or array and has at least one value
    if (!is_array($amenityIds)) {
        $amenityIds = json_decode($amenityIds, true); // Decode if it's stored as a JSON string
    }

    if (is_array($amenityIds) && count($amenityIds)) {
        // Return all companies from the list of company IDs
        return Amenity::whereIn('id', $amenityIds)->get();
    }

    return collect(); // Return an empty collection if no valid company_ids exist
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


// Custom method to retrieve all companies based on the JSON `company_id`
public function company()
{
    $companyIds = $this->company_id;

    // Check if `company_id` is a valid JSON string or array and has at least one value
    if (!is_array($companyIds)) {
        $companyIds = json_decode($companyIds, true); // Decode if it's stored as a JSON string
    }

    if (is_array($companyIds) && count($companyIds)) {
        // Return all companies from the list of company IDs
        return Company::whereIn('id', $companyIds)->get();
    }

    return collect(); // Return an empty collection if no valid company_ids exist
}


    // Accessor to decode the JSON company IDs safely
    public function getCompanyIdAttribute($value)
    {
        return $value ? json_decode($value, true) : []; // Return empty array if null
    }

    // Mutator to encode the company IDs as JSON before saving
    public function setCompanyIdAttribute($value)
    {
        $this->attributes['company_id'] = json_encode($value ?: []); // Store an empty array if value is null
    }


   public function citites()
    {
        return $this->belongsTo(CityMaster::class, 'city');
    }

    public function areas()
    {
        return $this->belongsTo(AreaMaster::class, 'area');
    }


   // Scope for 'is_featured'
   public function scopeIsFeatured($query, $value = true)
   {
       return $query->where('is_featured', $value);
   }

   // Scope for 'is_approved'
   public function scopeIsApproved($query, $value = true)
   {
       return $query->where('status', 'published');
   }

     // Method to get companies associated with the project
     public function getAssociatedCompanies()
     {
         return Company::whereIn('id', $this->company_id)->get();
     }

}
