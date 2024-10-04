@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="bg-white p-4 rounded shadow-sm">

            <form method="POST" action="{{ isset($collection) ? route('collections.update', $collection->id) : route('collections.store') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($collection))
                    @method('PUT')
                @endif

                <div class="mb-0">
                    <label for="name" class="form-label">Collection Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $collection->name ?? '') }}" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-0">
                    <label for="background_image" class="form-label">Background Image</label>
                    <input id="background_image" type="file" class="form-control @error('background_image') is-invalid @enderror" name="background_image">
                    @error('background_image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    @if(isset($collection->background_image) && File::exists(storage_path('app/public/' . $collection->background_image)))
                        <img src="{{ URL::to(env('APP_STORAGE').''.$collection->background_image) }}" class="card-img-left mt-2" alt="{{ $collection->name }}" style="height: 80px; object-fit: cover;">
                    @else

                    @endif

                </div>

                <div class="mb-3">
                    <label for="target_link" class="form-label">Target Link</label>
                    <input id="target_link" type="text" class="form-control @error('target_link') is-invalid @enderror" name="target_link" value="{{ old('target_link', $collection->target_link ?? '') }}" required>
                    @error('target_link')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn bg-custom-btn">
                    {{ isset($collection) ? 'Update' : 'Create' }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('form').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                background_image: {
                    // Only validate if the file input is not empty
                    required: function() {
                        return !$('#background_image').val() && !{{ isset($collection) ? 'true' : 'false' }};
                    },
                    extension: "jpg|jpeg|png",
                    filesize: 524288 // max 512KB
                },
                target_link: {
                    required: true,
                    url: true
                }
            },
            messages: {
                name: {
                    required: "Please enter the collection name",
                    minlength: "The collection name must be at least 2 characters long"
                },
                background_image: {
                    required: "Please upload a background image",
                    extension: "Please upload a valid image (jpg, jpeg, png)",
                    filesize: "The image size must be less than 512KB"
                },
                target_link: {
                    required: "Please enter the target link",
                    url: "Please enter a valid URL"
                }
            }
        });

        // Custom validator for file size
        $.validator.addMethod('filesize', function(value, element, param) {
            return this.optional(element) || (element.files[0].size <= param);
        }, 'The file size must be less than 512KB');
    });
</script>
@endpush
