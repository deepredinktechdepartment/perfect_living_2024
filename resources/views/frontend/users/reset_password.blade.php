@extends('layouts.frontend_theme.main')

@section('mainContent')
<section class="bg-yellow">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <div class="card login-card p-3 px-sm-3 px-2">
                    <div class="card-body">
                        <h3 class="mb-4">Change Password</h3>
                        <form id="resetpasswordForm" method="POST" action="{{ route('post.Register.Data') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <input type="password" name="password" id="password" class="form-control" placeholder="New Password" required minlength="8" value="" autocomplete="off">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="passwordagain" id="passwordagain" class="form-control" placeholder="Confirm New Password" required value="" autocomplete="off">
                            </div>
                            <div class="form-group mb-4">
                                <button type="submit" class="btn btn-danger border-radius-0 w-100">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')

<script>
$(document).ready(function() {
    // Custom method to prevent leading spaces
    $.validator.addMethod("noLeadingSpaces", function(value, element) {
        return this.optional(element) || /^\S.*/.test(value);
    }, "Cannot start with a space.");

    // Custom method to prevent spaces in the password
    $.validator.addMethod("noSpaces", function(value, element) {
        return this.optional(element) || /^\S*$/.test(value);
    }, "Password cannot contain spaces.");

    // Initialize form validation
    $('#resetpasswordForm').validate({
        rules: {
            password: {
                required: true,
                minlength: 8,
                noSpaces: true
            },
            passwordagain: {
                required: true,
                equalTo: "#password",
                noSpaces: true
            }
        },
        messages: {
            password: {
                required: "Please provide a password.",
                minlength: "Your password must be at least 8 characters long.",
                noSpaces: "Password cannot contain spaces."
            },
            passwordagain: {
                required: "Please confirm your password.",
                equalTo: "Passwords do not match.",
                noSpaces: "Password cannot contain spaces."
            }
        },
        errorElement: 'div',
        errorClass: 'text-danger',
        highlight: function(element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid');
        }
    });
});
</script>
@endpush
@endsection
