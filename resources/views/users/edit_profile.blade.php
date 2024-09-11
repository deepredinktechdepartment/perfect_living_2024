@extends('layouts.app')

@section('content')
<div class="row">
    <!-- Start col -->
    <div class="col-lg-4">
        <div class="card shadow-sm">
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
                        <button type="submit" class="btn bg-persian-green btn-lg">Save</button>
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
                extension: "jpg|jpeg|png|gif"
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
                extension: "Only image files are allowed (jpg, jpeg, png, gif)"
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
});
</script>
@endpush
