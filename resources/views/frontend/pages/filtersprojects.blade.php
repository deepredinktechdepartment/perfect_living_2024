<!-- Example view file -->
@extends('layouts.frontend_theme.main')

@section('mainContent')
<section>
    <div class="container">
        <div class="row py-2 align-items-center">
            <div class="d-flex align-items-center justify-content-between">

                @if ($projects->count() > 0)
                <p class="mb-0 px-0 mx-0">
                    ({{ $projects->count() ?? 0 }} {{ $projects->count() == 1 ? 'Property' : 'Properties' }} Available)
                </p>

                @else
                <p class="mb-0 px-0 mx-0">

                </p>
                @endif
                <a href="{{ URL::to('filters') }}" class="text-danger text-decoration-none clear_all">Clear all</a>
            </div>
        </div>


        @include('components.project-filters')


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
                        :address="$project->areas->name"
                        :details="$project->project_type . ' ,' . $project->unitConfigurations->first()->beds . ' BHK'"
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
