@extends('layouts.frontend_theme.main')

@section('mainContent')
<section>
    <div class="container">
        <h1>{{ $pageTitle ?? '' }}</h1>

        @if ($projects->count() > 0)
        <p class="mb-3 px-0 mx-0">
            You have {{ $projects->count() }} {{ $projects->count() == 1 ? 'property' : 'properties' }} in your wishlist.
        </p>


            <div class="row">
                @foreach ($projects as $project)
                    @php
                        // Default placeholder image URL
                        $defaultImageUrl = 'https://via.placeholder.com/150';

                        // Check if elevationPictures is set and contains at least one image
                        $imageUrl = $defaultImageUrl; // Default image

                        if (isset($project->elevationPictures) && $project->elevationPictures->isNotEmpty()) {
                            $firstImagePath = $project->elevationPictures->first()->file_path;
                            $imageUrl = URL::to(env('APP_STORAGE') . $firstImagePath);
                        }
                    @endphp

                    <x-project-card-view2
                        :name="$project->name"
                        :address="$project->areas->name"
                        :details="$project->project_type . ', ' . $project->unitConfigurations->first()->beds . ' BHK'"
                        :price="number_format($project->price_per_sft)"
                        :image="$imageUrl"
                        :url="URL::to('project/' . $project->slug)"
                    />
                @endforeach
            </div>
        @else
            <p>Nothing found in your wishlist.</p>
        @endif
    </div>
</section>
@endsection
