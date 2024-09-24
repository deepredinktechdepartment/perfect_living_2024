@extends('layouts.frontend_theme.main')

@section('mainContent')
<section class="bg-yellow">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <div class="card login-card p-3 px-sm-3 px-2">
                    <div class="card-body">
                        <h3 class="mb-4">Change Password</h3>
                        <form id="changePasswordForm" action="{{ route('verifying.password') }}" method="post">
                            @csrf
                            <!-- New Password -->
                            <div class="mb-3">

                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter new password" required>
                                <div class="invalid-feedback"></div>
                            </div>

                            <!-- Confirm New Password -->
                            <div class="mb-3">

                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm new password" required>
                                <div class="invalid-feedback"></div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn bg-custom-btn btn-lg">Change Password</button>
                            </div>
                            <input type="hidden" name="page"  value="nonadminuser">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



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

@endsection
