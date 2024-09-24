@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="bg-white p-4 rounded shadow-sm">

            @php
            // Decode map_collections if they exist and are valid JSON, otherwise default to empty array
            $projectCollections = isset($project->map_collections) && is_string($project->map_collections) ? json_decode($project->map_collections, true) : [];
            @endphp

            <!-- Form to update collections -->
            <form id="collectionForm" action="{{ route('projects.updateCollections', $project->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                  
                    <div class="row">
                        @foreach($collections as $index => $collection)
                            <div class="col-md-6"> <!-- 3 columns per row -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="collection_{{ $collection->id }}" name="map_collections[]" value="{{ $collection->id }}"
                                        {{ in_array($collection->id, old('map_collections', $projectCollections)) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="collection_{{ $collection->id }}">
                                        {{ $collection->name ?? '' }}
                                    </label>
                                </div>
                            </div>

                            @if(($index + 1) % 2 == 0)
                                </div><div class="row">
                            @endif
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn bg-custom-btn">Save Collections</button>
            </form>

        </div>
    </div>
</div>

@push('scripts')

<script>
    $(document).ready(function() {
        $('#collectionForm').on('submit', function(e) {
            // Check if at least one collection is checked
            if ($('input[name="map_collections[]"]:checked').length === 0) {
                e.preventDefault(); // Prevent form submission
                // Show toaster error message using Toastr.js
                toastr.error('Please select at least one collection.');
            }
        });
    });
</script>
@endpush
@endsection
