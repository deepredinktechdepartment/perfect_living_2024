@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="bg-white p-4 rounded shadow-sm">
                <form id="elevationPictureForm" action="{{ route('elevation_pictures.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Hidden field for project_id -->
                    <input type="text" name="project_id" value="{{ $project->id }}" hidden>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="file">Picture</label>
                        <input type="file" id="file" name="file" class="form-control @error('file') is-invalid @enderror" required>
                        @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        // Initialize jQuery validation
        $('#elevationPictureForm').validate({
            rules: {
                title: {
                    required: true,
                    minlength: 2
                },
                file: {
                    required: true,
                    extension: "jpg|jpeg|png",
                    filesize: 1048576 // 1MB in bytes
                }
            },
            messages: {
                title: {
                    required: "Please enter a title.",
                    minlength: "Title must be at least 2 characters long."
                },
                file: {
                    required: "Please upload a picture.",
                    extension: "Please upload a file in JPG, JPEG, or PNG format.",
                    filesize: "The file size must be less than 1MB."
                }
            }
        });

        // Add custom method for file size validation
        $.validator.addMethod('filesize', function (value, element, size) {
            if (element.files.length) {
                return element.files[0].size <= size;
            }
            return true;
        }, 'File size must be less than {0} bytes.');
    });
</script>
@endpush
