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

                    <!-- Add other fields in similar manner -->

                    <div class="col-6">
                        <div class="form-group">
                            <label for="site_address" class="form-label">Site Address</label>
                            <input id="site_address" type="text" class="form-control @error('site_address') is-invalid @enderror" name="site_address" value="{{ old('site_address', $project->site_address ?? '') }}">
                            @error('site_address')
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
                        <img src="{{ URL::to(env('APP_STORAGE').''.$project->logo) }}" alt="{{ $project->name??'' }}" class="card-img-left" style="height: 80px; object-fit: cover;">
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

                    <div class="col-6">
                        <div class="form-group">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input id="latitude" type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{ old('latitude', $project->latitude ?? '') }}">
                            @error('latitude')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input id="longitude" type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{ old('longitude', $project->longitude ?? '') }}">
                            @error('longitude')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Continue with other fields -->

                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
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
            website_url: {
                url: true
            },
            latitude: {
                number: true
            },
            longitude: {
                number: true
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
            website_url: {
                url: "Please enter a valid URL."
            },
            latitude: {
                number: "Please enter a valid number for latitude."
            },
            longitude: {
                number: "Please enter a valid number for longitude."
            }
            // Add other messages as needed
        }
    });
});
</script>
@endpush
@endsection
