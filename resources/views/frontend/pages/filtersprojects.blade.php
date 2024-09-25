<!-- Example view file -->
@extends('layouts.frontend_theme.main')

@section('mainContent')


    <div class="container">
        <h1 class="mb-3">{{ $pageTitle??'' }}</h1>

        @include('components.project-filters')

        @if ($projects->count() > 0)
                <p class="mb-3 px-0 mx-0">
                    {{ $projects->count() ?? 0 }} {{ $projects->count() == 1 ? 'Property' : 'Properties' }} Available
                </p>

                @else
                <p class="mb-0 px-0 mx-0">

                </p>
                @endif
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
                        :details="$project->project_type . ', ' . $project->unitConfigurations->first()->beds . ' BHK'"
                         :price="number_format($project->price_per_sft)"
                        :image="$imageUrl"
                        :url="URL::to('project/'.$project->slug)"
                    />
                @endforeach
            </div>

            @else
            <p>No Apartments are listed.</p>
        @endif
    </div>



@push('scripts')


<script>
    $(document).ready(function() {
        $('#searchForm').on('submit', function(event) {
            // Prevent default form submission to modify action
            event.preventDefault();

            // Get selected values
            var propertyType = $('#propertyType').val();

            var budgets = $('#budget').val();
            var beds = $('#beds').val();

            // Create the base URL
            var baseUrl = "{{ URL::to('search') }}";

            // Construct the new action URL based on selected values
            var actionUrl = baseUrl;

            // Append the property type, budgets, and beds if they are selected
            if (propertyType) {
                actionUrl += "/" + encodeURIComponent(propertyType);
            }
            if (budgets) {
                actionUrl += "/" + encodeURIComponent(budgets);
            }
            if (beds) {
                actionUrl += "/" + encodeURIComponent(beds);
            }

            // Set the form action to the new URL
            this.action = actionUrl;

            // Submit the form with the new action
            this.submit();
        });
    });
</script>
@endpush

@endsection
