@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-4">
            <div class="bg-white p-4 rounded shadow-sm">
                <form id="elevationPictureForm"
                action="{{ isset($picture) ? route('elevation_pictures.update', [$project->id, $picture->id]) : route('elevation_pictures.store') }}"
                method="POST"
                enctype="multipart/form-data">
              @csrf
              @if(isset($picture))
                  @method('PUT')
              @endif
                    <!-- Hidden field for project_id -->
                    <input type="text" name="project_id" value="{{ $project->id }}" hidden>

                    <div class="form-group">
                        <label for="file">Picture</label>
                        <input type="file" id="file" name="file" class="form-control @error('file') is-invalid @enderror" {{ isset($picture) ? '' : 'required' }}>
                        @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror


                    @if(isset($picture) && File::exists(env('APP_STORAGE').''.$picture->file_path))
                        <img src="{{ URL::to(env('APP_STORAGE').''.$picture->file_path) }}" class="mt-3" alt="{{ $picture->file_path }}" style="height: 80px; object-fit: cover;">
                    @else

                    @endif
                </div>

                    <button type="submit" class="btn bg-persian-green mt-3">
                        {{ isset($picture) ? 'Update' : 'Save' }}
                    </button>
                </form>
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
                file: {
                    {{ isset($picture) ? 'required: false' : 'required: true' }},
                    extension: "jpg|jpeg|png",
                    filesize: 1048576 // 1MB in bytes
                }
            },
            messages: {
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
