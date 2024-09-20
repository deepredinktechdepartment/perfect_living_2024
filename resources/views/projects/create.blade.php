@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="bg-white p-4 rounded shadow-sm">
            @if(isset($project))
                <form id="project-form" method="POST" action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data">
                @method('PUT')
            @else
                <form id="project-form" method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
            @endif
                @csrf

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name" class="form-label">Project Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $project->name ?? '') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="company" class="form-label">Company</label>
                            <select id="company" class="form-control @error('company_id') is-invalid @enderror" name="company_id" required>
                                <option value="">Select Company</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}" {{ (old('company_id', $project->company_id ?? '') == $company->id) ? 'selected' : '' }}>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('company_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Type of Project dropdown -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="project_type" class="form-label">Type of Project</label>
                            <select id="project_type" class="form-control @error('project_type') is-invalid @enderror" name="project_type" required>
                                <option value="">Select Project Type</option>
                                <option value="Standalone Villa" {{ old('project_type', $project->project_type ?? '') == 'Standalone Villa' ? 'selected' : '' }}>Standalone Villa</option>
                                <option value="Standalone Apartment" {{ old('project_type', $project->project_type ?? '') == 'Standalone Apartment' ? 'selected' : '' }}>Standalone Apartment</option>
                                <option value="Villa Gated Community" {{ old('project_type', $project->project_type ?? '') == 'Villa Gated Community' ? 'selected' : '' }}>Villa Gated Community</option>
                                <option value="Apartment Gated Community" {{ old('project_type', $project->project_type ?? '') == 'Apartment Gated Community' ? 'selected' : '' }}>Apartment Gated Community</option>
                                <option value="Commercial Space" {{ old('project_type', $project->project_type ?? '') == 'Commercial Space' ? 'selected' : '' }}>Commercial Space</option>
                                <option value="Retail Space" {{ old('project_type', $project->project_type ?? '') == 'Retail Space' ? 'selected' : '' }}>Retail Space</option>
                            </select>
                            @error('project_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="site_address" class="form-label">Site Address (Google Map)</label>
                            <input id="site_address" type="text" class="form-control @error('site_address') is-invalid @enderror" name="site_address" value="{{ old('site_address', $project->site_address ?? '') }}">
                            @error('site_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- City dropdown -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="city_id" class="form-label">City</label>
                            <select id="city_id" class="form-control @error('city_id') is-invalid @enderror" name="city_id" required>
                                <option value="">Select City</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ (old('city_id', $project->city ?? '') == $city->id) ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('city_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Area dropdown -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="area_id" class="form-label">Area</label>
                            <select id="area_id" class="form-control @error('area_id') is-invalid @enderror" name="area_id" required>
                                <option value="">Select Area</option>
                                <!-- Areas will be loaded dynamically via AJAX -->
                            </select>
                            @error('area_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="logo" class="form-label">Logo</label>
                            <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if(isset($project->logo) && File::exists(env('APP_STORAGE').''.$project->logo))
                            <img src="{{ URL::to(env('APP_STORAGE').''.$project->logo) }}" alt="{{ $project->name??'' }}" class="card-img-left" style="height: 20px; object-fit: cover;">
                        @else
                        @endif
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="website_url" class="form-label">Website URL</label>
                            <input id="website_url" type="url" class="form-control @error('website_url') is-invalid @enderror" name="website_url" value="{{ old('website_url', $project->website_url ?? '') }}">
                            @error('website_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Latitude and Longitude fields side by side -->
                    <div class="col-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="latitude" class="form-label">Latitude</label>
                                    <input id="latitude" type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{ old('latitude', $project->latitude ?? '') }}">
                                    @error('latitude')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude" class="form-label">Longitude</label>
                                    <input id="longitude" type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{ old('longitude', $project->longitude ?? '') }}">
                                    @error('longitude')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="master_plan_layout" class="form-label">Master Plan Layout</label>
                            <input id="master_plan_layout" type="file" class="form-control @error('master_plan_layout') is-invalid @enderror" name="master_plan_layout">
                            @error('master_plan_layout')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if(isset($project->master_plan_layout) && File::exists(env('APP_STORAGE').''.$project->master_plan_layout))
                            @if(pathinfo($project->master_plan_layout, PATHINFO_EXTENSION) == 'pdf')
                                <!-- If the file is a PDF, provide a link to download or view it -->
                                <a href="{{ URL::to(env('APP_STORAGE').''.$project->master_plan_layout) }}" target="_blank" class="btn btn-link btn-sm">View PDF</a>
                            @else
                                <!-- If the file is an image, display it -->
                                <img src="{{ URL::to(env('APP_STORAGE').''.$project->master_plan_layout) }}" alt="{{ $project->name??'' }}" class="card-img-left" style="height: 20px; object-fit: cover;">
                            @endif
                        @else
                        @endif
                    </div>



                    @php
    // Decode map_collections and map_badges if they exist and are valid JSON, otherwise default to empty array
    $projectCollections = isset($project->map_collections) && is_string($project->map_collections) ? json_decode($project->map_collections, true) : [];
    $projectBadges = isset($project->map_badges) && is_string($project->map_badges) ? json_decode($project->map_badges, true) : [];
@endphp

<!-- Collections checkboxes -->
<div class="col-6">
    <div class="form-group">
        <label class="form-label">Collections</label>
        <div class="form-check">
            @foreach($collections as $collection)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="collection_{{ $collection->id }}" name="map_collections[]" value="{{ $collection->id }}" {{ in_array($collection->id, old('map_collections', $projectCollections)) ? 'checked' : '' }}>
                    <label class="form-check-label" for="collection_{{ $collection->id }}">
                        {{ $collection->name??'' }}
                    </label>
                </div>
            @endforeach
        </div>
        @error('collections')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- Badges checkboxes -->
<div class="col-6">
    <div class="form-group">
        <label class="form-label">Badges</label>
        <div class="form-check">
            @foreach($badges as $badge)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="badge_{{ $badge->id }}" name="map_badges[]" value="{{ $badge->id }}" {{ in_array($badge->id, old('map_badges', $projectBadges)) ? 'checked' : '' }}>
                    <label class="form-check-label" for="badge_{{ $badge->id }}">
                        {{ $badge->name }}
                    </label>
                </div>
            @endforeach
        </div>
        @error('badges')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

@php
// Decode amenities if they exist and are valid JSON, otherwise default to empty array
$projectAmenities = isset($project->amenities) && is_string($project->amenities) ? json_decode($project->amenities, true) : [];
@endphp

<!-- Amenities checkboxes -->
<div class="col-6">
<div class="form-group">
    <label class="form-label">Amenities</label>
    <div class="form-check">
        @foreach($amenities as $amenity)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="amenity_{{ $amenity->id }}" name="amenities[]" value="{{ $amenity->id }}" {{ in_array($amenity->id, old('amenities', $projectAmenities)) ? 'checked' : '' }}>
                <label class="form-check-label" for="amenity_{{ $amenity->id }}">
                    {{ $amenity->name }}
                </label>
            </div>
        @endforeach
    </div>
    @error('amenities')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
</div>



<div class="row">
    <!-- Other existing form fields -->

    <!-- No of Acres -->
    <div class="col-6">
        <div class="form-group">
            <label for="no_of_acres" class="form-label">No of Acres</label>
            <input id="no_of_acres" type="number" step="0.01" class="form-control @error('no_of_acres') is-invalid @enderror" name="no_of_acres" value="{{ old('no_of_acres', $project->no_of_acres ?? '') }}" required>
            @error('no_of_acres')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- No of Towers -->
    <div class="col-6">
        <div class="form-group">
            <label for="no_of_towers" class="form-label">No of Towers</label>
            <input id="no_of_towers" type="number" class="form-control @error('no_of_towers') is-invalid @enderror" name="no_of_towers" value="{{ old('no_of_towers', $project->no_of_towers ?? '') }}" required>
            @error('no_of_towers')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- No of Units -->
    <div class="col-6">
        <div class="form-group">
            <label for="no_of_units" class="form-label">No of Units</label>
            <input id="no_of_units" type="number" class="form-control @error('no_of_units') is-invalid @enderror" name="no_of_units" value="{{ old('no_of_units', $project->no_of_units ?? '') }}" required>
            @error('no_of_units')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Price per sft -->
    <div class="col-6">
        <div class="form-group">
            <label for="price_per_sft" class="form-label">Price per sft</label>
            <input id="price_per_sft" type="number" step="0.01" class="form-control @error('price_per_sft') is-invalid @enderror" name="price_per_sft" value="{{ old('price_per_sft', $project->price_per_sft ?? '') }}" required>
            @error('price_per_sft')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>



<div class="col-12">
    <div class="form-group">
        <label for="about_project" class="form-label">About the Project</label>
        <textarea id="about_project" class="form-control @error('about_project') is-invalid @enderror" name="about_project">{{ old('about_project', $project->about_project ?? '') }}</textarea>
        @error('about_project')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="col-4">
    <div class="mb-3">
        <label for="status" class="form-label">Project Status</label>
        <select id="status" class="form-select @error('status') is-invalid @enderror" name="status" required>
            <option value="">Select Status</option>
            <option value="newly_added" {{ old('status', $project->status ?? '') == 'newly_added' ? 'selected' : '' }}>Newly Added</option>
            <option value="in_review" {{ old('status', $project->status ?? '') == 'in_review' ? 'selected' : '' }}>In Review</option>
            <option value="published" {{ old('status', $project->status ?? '') == 'published' ? 'selected' : '' }}>Published</option>
            <option value="deactivated" {{ old('status', $project->status ?? '') == 'deactivated' ? 'selected' : '' }}>Deactivated</option>

        </select>
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>




                    <!-- Continue with other fields -->

                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn bg-custom-btn">
                                {{ isset($project) ? 'Update Project' : 'Save Project' }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    $("#project-form").validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            site_address: {
                required: true,
            },
            company_id: {
                required: true
            },
            logo: {
                extension: "jpg|jpeg|png|gif"
            },
            master_plan_layout: {
                extension: "jpg|jpeg|png|gif|pdf"
            },
            website_url: {
                url: true
            },
            latitude: {
                number: true
            },
            longitude: {
                number: true
            },
            city_id: {
                required: true,
            },
            area_id: {
                required: true,
            },
            acres: {
                number: true,
                min: 0
            },
            towers: {
                number: true,
                min: 0
            },
            units: {
                number: true,
                min: 0
            },
            price_per_sft: {
                number: true,
                min: 0
            },
            project_type: {
                required: true
            },
            collections: {
                required: false
            },
            badges: {
                required: false
            },
            no_of_acres: {
        required: false,

    },
    no_of_towers: {
        required: false,

    },
    no_of_units: {
        required: false,

    },
    price_per_sft: {
        required: false,

    }
            // Add other rules as needed
        },
        messages: {
            name: {
                required: "Please enter the project name.",
                minlength: "Project name must be at least 2 characters long."
            },
            company_id: {
                required: "Please select a company."
            },
            logo: {
                extension: "Please upload a valid image file (jpg, jpeg, png, gif)."
            },
            master_plan_layout: {
                extension: "Please upload a valid image file (jpg, jpeg, png, gif,pdf)."
            },
            website_url: {
                url: "Please enter a valid URL."
            },
            latitude: {
                number: "Please enter a valid number for latitude."
            },
            longitude: {
                number: "Please enter a valid number for longitude."
            },
            project_type: {
                required: "Please select a type of project."
            },
            collections: {
                required: "Please select at least one collection."
            },
            badges: {
                required: "Please select at least one badge."
            }
            // Add other messages as needed
        }
    });
});


$(document).ready(function() {
    // Function to load areas based on the selected city
    function loadAreas(cityId) {
        $.ajax({
            url: '{{ route('areas.byCity') }}',
            type: 'GET',
            data: { city_id: cityId },
            success: function(data) {
                $('#area_id').empty();
                $('#area_id').append('<option value="">Select Area</option>');
                $.each(data.areas, function(index, area) {
                    $('#area_id').append('<option value="' + area.id + '">' + area.name + '</option>');
                });

                // Prefill area if it exists
                @if(isset($project->area))
                    $('#area_id').val({{ $project->area }}).change();
                @endif
            }
        });
    }

    // When city dropdown changes
    $('#city_id').change(function() {
        var cityId = $(this).val();
        if (cityId) {
            loadAreas(cityId);
        } else {
            $('#area_id').empty();
            $('#area_id').append('<option value="">Select Area</option>');
        }
    });

    // Initialize area dropdown based on the selected city
    @if(isset($project->city))
        loadAreas({{ $project->city }});
    @endif
});

</script>
@endpush
@endsection
