@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="bg-white p-4 rounded shadow-sm">

            @php
                // Decode map_badges if it exists and is valid JSON, otherwise default to an empty array
                $projectBadges = isset($project->map_badges) && is_string($project->map_badges) ? json_decode($project->map_badges, true) : [];
            @endphp

            <form id="badgesForm" action="{{ route('projects.updateBadges', $project->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Badges checkboxes -->
                <div class="col-12">
                    <div class="form-group">
                        
                        <div class="row">
                            @foreach($badges as $badge)
                                <div class="col-4"> <!-- Adjust column width as needed -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="badge_{{ $badge->id }}" name="map_badges[]" value="{{ $badge->id }}"
                                            {{ in_array($badge->id, old('map_badges', $projectBadges)) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="badge_{{ $badge->id }}">
                                            {{ $badge->name }}
                                        </label>
                                    </div>
                                </div>

                                <!-- Ensure that every three badges, a new row starts -->
                                @if (($loop->iteration % 3) == 0)
                                    </div><div class="row"> <!-- Close and reopen row divs -->
                                @endif
                            @endforeach
                        </div>
                        @error('map_badges')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn bg-custom-btn">Save Changes</button>
            </form>

        </div>
    </div>
</div>


@push('scripts')
<script>
    $(document).ready(function() {
        $('#badgesForm').on('submit', function(e) {
            // Check if at least one badge is checked
            if ($('input[name="map_badges[]"]:checked').length === 0) {
                e.preventDefault(); // Prevent form submission
                // Show toaster error message using Toastr.js
                toastr.error('Please select at least one badge.'); 
            }
        });


    });
</script>
@endpush
@endsection
