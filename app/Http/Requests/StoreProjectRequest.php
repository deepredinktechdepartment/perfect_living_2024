<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Authorization logic
        // For example, allow any authenticated user to create a project
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('projects', 'name'), // Ensure the project name is unique
            ],
            'company_id' => [
                'required',
                'exists:companies,id', // Ensure the company ID exists in the companies table
            ],
            'site_address' => 'nullable|string|max:255',
            'logo' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048', // Maximum file size in kilobytes
            ],
            'website_url' => 'nullable|url|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'master_plan_layout' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'about' => 'nullable|string',
            'elevation_pictures.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'enquiry_form' => 'nullable|string|max:255',
            'map_collections' => 'nullable|string|max:255',
            'map_badges' => 'nullable|string|max:255',
            'project_type' => [
                'required',
                'string',
                Rule::in(['Standalone Villa', 'Standalone Apartment', 'Villa Gated Community', 'Apartment Gated Community', 'Commercial Space', 'Retail Space']),
            ],
            'acres' => 'nullable|numeric',
            'towers' => 'nullable|integer',
            'units' => 'nullable|integer',
            'price_per_sft' => 'nullable|numeric',
            'unit_configurations' => 'nullable|string',
            'amenities' => 'nullable|string',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'project name',
            'company_id' => 'company',
            'site_address' => 'site address',
            'logo' => 'logo',
            'website_url' => 'website URL',
            'latitude' => 'latitude',
            'longitude' => 'longitude',
            'master_plan_layout' => 'master plan layout',
            'about' => 'about the project',
            'elevation_pictures' => 'elevation pictures',
            'enquiry_form' => 'enquiry form',
            'map_collections' => 'map collections',
            'map_badges' => 'map badges',
            'project_type' => 'project type',
            'acres' => 'number of acres',
            'towers' => 'number of towers',
            'units' => 'number of units',
            'price_per_sft' => 'price per square foot',
            'unit_configurations' => 'unit configurations',
            'amenities' => 'project amenities',
        ];
    }
}
