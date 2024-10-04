<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Company extends Model
{
    use HasFactory;

    // Allow these fields for mass assignment
    protected $fillable = ['name', 'slug', 'about_builder', 'address1', 'address2', 'phone', 'website_url'];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        // Default order by name in ascending order
        static::addGlobalScope('orderByName', function (Builder $builder) {
            $builder->orderBy('name', 'asc');
        });
    }
}
