@extends('layouts.app')

@section('content')
<div class="row justify-content-left">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <form id="changePasswordForm" action="{{ route('verifying.password') }}" method="post">
                    @csrf
                    <!-- New Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">New Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter new password" required>
                        <div class="invalid-feedback"></div>
                    </div>

                    <!-- Confirm New Password -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm New Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm new password" required>
                        <div class="invalid-feedback"></div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn bg-custom-btn btn-lg">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    // Custom validator to prevent spaces in the password
    $.validator.addMethod("noSpaces", function(value, element) {
        return value.trim() === value && value.indexOf(" ") === -1;
    }, "Password cannot contain spaces");

    $('#changePasswordForm').validate({
        rules: {
            password: {
                required: true,
                minlength: 8,
                noSpaces: true // Applying the custom validator
            },
            password_confirmation: {
                required: true,
                minlength: 8,
                equalTo: "#password",
                noSpaces: true // Applying the custom validator
            }
        },
        messages: {
            password: {
                required: "Please enter a new password",
                minlength: "Your password must be at least 8 characters long",
                noSpaces: "Password cannot contain spaces or only spaces"
            },
            password_confirmation: {
                required: "Please confirm your new password",
                minlength: "Your password must be at least 8 characters long",
                equalTo: "Passwords do not match",
                noSpaces: "Password cannot contain spaces or only spaces"
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
