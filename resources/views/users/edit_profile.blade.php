@extends('layouts.app')

@section('content')
<div class="row mt-5">
    <!-- Start col -->
    <div class="col-md-4">
        <div class="employee_profile h-100">
            <div class="card h-100">
                <div class="profile_img">
                    <div class="d-flex justify-content-center">
                        @if(Auth::user()->profile_photo && File::exists(storage_path('app/public/' . Auth::user()->profile_photo)))
                            <img class="rounded-circle img-fluid" src="{{ URL::to(env('APP_STORAGE').''.Auth::user()->profile_photo) }}" alt="">
                        @else
                            <!-- No Profile Picture -->
                            <img class="rounded-circle img-fluid" src="https://via.placeholder.com/200" alt="Default Image" width="200" height="200">
                        @endif
                    </div>
                </div>
                <h2 class="text-center nowrap-link mb-2 pt-2">{{ old('firstname', Auth::user()->fullname ?? '') }}</h2>
                <h5 class="text-center">{{ old('email', Auth::user()->username ?? '') }}</h5>
                <p class="text-center mb-3">{{ old('phone', Auth::user()->phone ?? '') }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <form id="profileForm" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Full Name -->
                    <div class="mb-0">
                        <label for="firstname" class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="firstname" id="firstname" value="{{ old('firstname', Auth::user()->fullname ?? '') }}" required>
                        <div class="invalid-feedback"></div>
                    </div>

                    <!-- Email -->
                    <div class="mb-0">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email', Auth::user()->username ?? '') }}" required>
                        <div class="invalid-feedback"></div>
                    </div>

                    <!-- Mobile -->
                    <div class="mb-0">
                        <label for="phone" class="form-label">Mobile <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone', Auth::user()->phone ?? '') }}" required maxlength="10" minlength="10">
                        <div class="invalid-feedback"></div>
                    </div>

                    <!-- Profile Picture -->
                    <div class="mb-3">
                        <label for="profile" class="form-label">Profile</label>
                        <input type="file" class="form-control" name="profile" id="profile">
                        <div class="invalid-feedback"></div>
                    </div>

                    <!-- Display Profile Picture -->
                    <div class="mb-3">
                        @if(Auth::user()->profile_photo && File::exists(storage_path('app/public/' . Auth::user()->profile_photo)))
                            <img src="{{ URL::to(env('APP_STORAGE').''.Auth::user()->profile_photo) }}"
                                 class="img-fluid rounded-circle border border-secondary mt-2"
                                 width="100"
                                 alt="Profile Picture">
                        @else
                            <!-- No Profile Picture -->
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn bg-custom-btn btn-lg">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End col -->
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#profileForm').validate({
        rules: {
            firstname: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                minlength: 10,
                maxlength: 10
            },
            profile: {
                extension: "jpg|jpeg|png|gif",
                filesize: true // Custom rule for filesize validation
            }
        },
        messages: {
            firstname: {
                required: "Please enter your full name"
            },
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            phone: {
                required: "Please enter your mobile number",
                minlength: "Mobile number must be exactly 10 digits",
                maxlength: "Mobile number must be exactly 10 digits"
            },
            profile: {
                extension: "Only image files are allowed (jpg, jpeg, png, gif)",
                filesize: "The image size must be less than 512KB"
            }
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.mb-3').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        }
    });

    // Custom jQuery validation method for file size
    $.validator.addMethod("filesize", function(value, element, param) {
        if (element.files.length > 0) {
            var size = element.files[0].size; // File size in bytes
            return size <= param; // Check if size is less than or equal to 512KB
        }
        return true; // If no file selected, valid
    }, "File size must be less than 512KB.");
});
</script>
@endpush
