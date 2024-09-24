@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="bg-white p-4 rounded shadow-sm">

            @php
            // Decode amenities if they exist and are valid JSON, otherwise default to empty array
            $projectAmenities = isset($project->amenities) && is_string($project->amenities) ? json_decode($project->amenities, true) : [];
            @endphp

            <!-- Assuming the form action points to the store/update route -->
            <form id="amenitiesForm" action="{{ route('projects.updateAmenities', $project->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Checkbox fields for amenities divided into three columns -->
                <div class="form-group">
                  
                    <div class="row">
                        @foreach($amenities as $index => $amenity)
                            <div class="col-md-4"> <!-- Change to 3 columns per row -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="amenity_{{ $amenity->id }}" name="amenities[]" value="{{ $amenity->id }}"
                                        {{ in_array($amenity->id, old('amenities', $projectAmenities)) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="amenity_{{ $amenity->id }}">
                                        {{ $amenity->name }}
                                    </label>
                                </div>
                            </div>

                            <!-- Close and open a new row after every 3 amenities -->
                            @if(($index + 1) % 3 == 0)
                                </div><div class="row">
                            @endif
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn bg-custom-btn">Save Amenities</button>
            </form>

        </div>
    </div>
</div>

@push('scripts')

<script>
    $(document).ready(function() {
        $('#amenitiesForm').on('submit', function(e) {
            // Check if at least one checkbox is checked
            if ($('input[name="amenities[]"]:checked').length === 0) {
                e.preventDefault(); // Prevent form submission
                // Show toaster error message using Toastr.js
                toastr.error('Please select at least one amenity.');
            }
        });
    });
</script>
@endpush
@endsection
