@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="bg-white p-4 rounded shadow-sm">
            <form method="POST" action="{{ isset($amenity) ? route('amenities.update', $amenity->id) : route('amenities.store') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($amenity))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="name" class="form-label">Amenity Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $amenity->name ?? '') }}" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="icon" class="form-label">Icon</label>
                    <input id="icon" type="file" class="form-control @error('icon') is-invalid @enderror" name="icon" >
                    @error('icon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    @if(isset($amenity->icon) && File::exists(env('APP_STORAGE').''.$amenity->icon))
                        <img src="{{ URL::to(env('APP_STORAGE').''.$amenity->icon) }}" alt="{{ $amenity->name }}" class="img-fluid mt-2" style="height: 50px;">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">
                    {{ isset($amenity) ? 'Update' : 'Create' }}
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
                icon: {
                    extension: "jpg|jpeg|png|gif",
                    filesize: 2048 // max 2MB
                }
            },
            messages: {
                name: {
                    required: "Please enter the amenity name",
                    minlength: "The amenity name must be at least 2 characters long"
                },
                icon: {
                    extension: "Please upload a valid image (jpg, jpeg, png, gif)",
                    filesize: "The image size must be less than 2MB"
                }
            }
        });
    });
</script>
@endpush
