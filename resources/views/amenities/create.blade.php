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

                <!-- Extended Amenity Category Dropdown -->
                <div class="mb-3">
                    <label for="category" class="form-label">Amenity Category</label>
                    <select id="category" class="form-select @error('category') is-invalid @enderror" name="category" required>
                        <option value="" disabled selected>Select Category</option>
                        <option value="indoor-games" {{ old('category', $amenity->category ?? '') == 'indoor-games' ? 'selected' : '' }}>Indoor Games</option>
                        <option value="outdoor-games" {{ old('category', $amenity->category ?? '') == 'outdoor-games' ? 'selected' : '' }}>Outdoor Games</option>
                        <option value="sports" {{ old('category', $amenity->category ?? '') == 'sports' ? 'selected' : '' }}>Sports</option>
                        <option value="security" {{ old('category', $amenity->category ?? '') == 'security' ? 'selected' : '' }}>Security</option>
                        <option value="convenience" {{ old('category', $amenity->category ?? '') == 'convenience' ? 'selected' : '' }}>Convenience</option>
                        <option value="fitness" {{ old('category', $amenity->category ?? '') == 'fitness' ? 'selected' : '' }}>Fitness</option>
                        <option value="entertainment" {{ old('category', $amenity->category ?? '') == 'entertainment' ? 'selected' : '' }}>Entertainment</option>
                        <option value="clubhouse" {{ old('category', $amenity->category ?? '') == 'clubhouse' ? 'selected' : '' }}>Clubhouse</option>
                        <option value="wellness" {{ old('category', $amenity->category ?? '') == 'wellness' ? 'selected' : '' }}>Wellness</option>
                        <option value="kids" {{ old('category', $amenity->category ?? '') == 'kids' ? 'selected' : '' }}>Kids</option>
                        <option value="community" {{ old('category', $amenity->category ?? '') == 'community' ? 'selected' : '' }}>Community</option>
                        <option value="transport" {{ old('category', $amenity->category ?? '') == 'transport' ? 'selected' : '' }}>Transport</option>
                        <option value="pet-friendly" {{ old('category', $amenity->category ?? '') == 'pet-friendly' ? 'selected' : '' }}>Pet-Friendly</option>
                        <option value="other" {{ old('category', $amenity->category ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('category')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="icon" class="form-label">Icon</label>
                    <input id="icon" type="file" class="form-control @error('icon') is-invalid @enderror" name="icon">
                    @error('icon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    @if(isset($amenity->icon) && File::exists(env('APP_STORAGE').''.$amenity->icon))
                        <img src="{{ URL::to(env('APP_STORAGE').''.$amenity->icon) }}" alt="{{ $amenity->name }}" class="img-fluid mt-2" style="height: 50px;">
                    @endif
                </div>

                <button type="submit" class="btn bg-custom-btn">
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
                category: {
                    required: true
                },
                icon: {
                    extension: "jpg|jpeg|png|gif",
                    filesize: 512 // max 512KB
                }
            },
            messages: {
                name: {
                    required: "Please enter the amenity name",
                    minlength: "The amenity name must be at least 2 characters long"
                },
                category: {
                    required: "Please select a category"
                },
                icon: {
                    extension: "Please upload a valid image (jpg, jpeg, png, gif)",
                    filesize: "The image size must be less than 512KB"
                }
            }
        });
    });

    $.validator.addMethod("filesize", function(value, element, param) {
    if (element.files.length) {
        return element.files[0].size <= param * 1024; // Convert KB to bytes
    }
    return true; // Skip validation if no file is selected
});



</script>
@endpush
