<!-- Example view file -->
@extends('layouts.frontend_theme.main')

@section('mainContent')
<section>
    <div class="container filter_bg">
        <div class="row py-2 bg-dark-grey align-items-center">
            <div class="d-flex justify-content-between align-items-center">

                @if ($projects->count() > 0)
                <p class="mb-0">({{ $projects->count()??0}} Properties Available)</p>
                @else
                @endif
                <div class="col-lg-2">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Relevance</option>
                        <option value="1">Price(Inc)</option>
                        <option value="2">Price(Dec)</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row py-2 mb-3 bg-grey align-items-center">
            <div class="col-lg-2">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Select Type</option>
                    <option value="1">New</option>
                    <option value="2">Resale</option>
                </select>
            </div>
            <div class="col-lg-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Budget</option>
                    <option value="1">₹1.00 Cr* - ₹2.00 Cr*</option>
                    <option value="2">₹3.00 Cr* - ₹4.00 Cr*</option>
                </select>
            </div>
            <div class="col-lg-2">
                <select class="form-select" aria-label="Default select example">
                    <option selected>BHK</option>
                    <option value="1">1 BHK</option>
                    <option value="2">2 BHK</option>
                </select>
            </div>
            <div class="col-lg-2">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Property Status</option>
                    <option value="Ongoing">Ongoing</option>
                    <option value="Upcoming">Upcoming</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            <div class="col-lg-2">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Property Type</option>
                    <option value="Apartment">Apartment</option>
                    <option value="Villa">Villa</option>
                    <option value="Plot">Plot</option>
                </select>
            </div>
            <div class="col-lg-1">
                <a href="#" class="text-danger text-decoration-none">Clear all</a>
            </div>
        </div>

        @if ($projects->count() > 0)
            <div class="row">
                @foreach ($projects as $project)
                    @php
                        // Default placeholder image URL
                        $defaultImageUrl = 'https://via.placeholder.com/150';

                        // Check if elevationPictures is set and contains at least one image
                        $imageUrl = $defaultImageUrl; // Default image

                        if (isset($project->elevationPictures) && $project->elevationPictures->isNotEmpty()) {
                            $firstImagePath = $project->elevationPictures->first()->file_path;
                            $imageUrl = URL::to(env('APP_STORAGE').$firstImagePath);
                        }
                    @endphp

                    <x-project-card-view2
                        :name="$project->name"
                        :address="$project->name . ', ' . $project->company->name"
                        :details="$project->project_type . ' , ' . $project->no_of_units . ' units'"
                        :price="'₹' . number_format($project->price_per_sft) . ' per sqft'"
                        :image="$imageUrl"
                        :url="URL::to('company/project/'.$project->slug)"
                    />
                @endforeach
            </div>

            @else
            <p>Nothing found</p>
        @endif
    </div>
</section>
@endsection
