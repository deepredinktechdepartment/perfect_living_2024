@extends('layouts.frontend_theme.main')

@section('mainContent')
<section class="bg-yellow">
    <div class="container">
        <div class="row justify-content-center">




            <div class="col-sm-5">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



                <div class="card login-card p-3 px-sm-3 px-2">
                    <div class="card-body">
                        <h3 class="mb-4">Create Account</h3>
                        <form id="registrationForm" method="POST" action="{{ route('post.Register.Data') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name" required value="venkat">
                            </div>
                            <div class="form-group mb-4">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required value="venkat@gmail.com">
                            </div>
                            <div class="form-group mb-4">
                                <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone Number" required pattern="[0-9]{10}" value="9876543210">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required minlength="8" value="12345678">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="passwordagain" id="passwordagain" class="form-control" placeholder="Confirm Password" required value="12345678">
                            </div>
                            <div class="mb-4">
                                <p><small>By continuing, you agree to our <a href="#" class="text-brand">Terms of Use</a> & <a href="#" class="text-brand">Privacy Policy</a>.</small></p>
                            </div>
                            <div class="form-group mb-4">
                                <button type="submit" class="btn btn-danger border-radius-0 w-100">Create Your Account</button>
                            </div>
                            <div class="mb-5">
                                <p><small>Already have an account? <a href="{{ URL::to('login') }}" class="text-brand">Sign In</a></small></p>
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
    $('#registrationForm').validate({
        rules: {
            fullname: {
                required: true,
                noLeadingSpaces: true
            },
            email: {
                required: true,
                email: true,
                noLeadingSpaces: true
            },
            phone: {
            required: true,
            digits: true,
            minlength: 10,
            maxlength: 10
        },

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
            fullname: {
                required: "Please enter your full name.",
                noLeadingSpaces: "Full name cannot start with a space."
            },
            email: {
                required: "Please enter your email address.",
                email: "Please provide a valid email address.",
                noLeadingSpaces: "Email cannot start with a space."
            },
            phone: {
            required: "Please enter your phone number.",
            digits: "Phone number must be 10 digits.",
            minlength: "Phone number must be 10 digits.",
            maxlength: "Phone number must be 10 digits."
        },
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
