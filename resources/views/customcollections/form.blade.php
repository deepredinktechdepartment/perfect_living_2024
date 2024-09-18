@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-5">
            <div class="card">

                <div class="card-body">
                    <form id="collectionForm" action="{{ isset($collection) ? route('customcollections.update', $collection->id) : route('customcollections.store') }}" method="POST">
                        @csrf
                        @if(isset($collection))
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label for="name" class="form-label">Collection Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ isset($collection) ? $collection->name : '' }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Select Projects</label>
                            <div class="form-check">
                                @foreach($projects as $project)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="projects[]" value="{{ $project->id }}" id="project{{ $project->id }}"
                                            @if(isset($collection) && $collection->projects->contains($project->id)) checked @endif>
                                        <label class="form-check-label" for="project{{ $project->id }}">
                                            {{ $project->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">
                            {{ isset($collection) ? 'Update Collection' : 'Create Collection' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        // Add jQuery validation
        $('#collectionForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                'projects[]': {
                    required: true,
                    minlength: 1
                }
            },
            messages: {
                name: {
                    required: "Please enter a collection name",
                    minlength: "Collection name must be at least 3 characters long"
                },
                'projects[]': {
                    required: "Please select at least one project"
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.mb-3').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
@endsection
