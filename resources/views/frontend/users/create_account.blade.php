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
                                <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name" required value="{{ old('fullname') }}" autocomplete="off">
                            </div>
                            <div class="form-group mb-4">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required value="{{ old('email') }}" autocomplete="off">
                            </div>
                            <div class="form-group mb-3">
                                <input type="hidden" id="phone_with_country_code_one" name="phone_with_country_code"/>
                                <input type="hidden" id="country_code_one" name="country_code"/>
                                <input type="tel" name="phone" id="phone" class="form-control d-block w-100" placeholder="Phone Number" required>
                            </div>
                            <!-- <div class="form-group mb-4">
                                <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone Number" required pattern="[0-9]{10}" value="{{ old('phone') }}" autocomplete="off">
                            </div> -->
                            <div class="form-group mb-4">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required minlength="8" value="" autocomplete="off">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="passwordagain" id="passwordagain" class="form-control" placeholder="Confirm Password" required value="" autocomplete="off">
                            </div>
                            {{-- <div class="mb-4">
                                <p><small>By continuing, you agree to our <a href="#" class="text-brand">Terms of Use</a> & <a href="#" class="text-brand">Privacy Policy</a>.</small></p>
                            </div> --}}
                            <div class="form-group mb-4">
                                <button type="submit" class="btn btn-danger border-radius-0 w-100">Create Your Account</button>
                            </div>
                            <div class="mb-5">
                                <p><small>Already have an account? <a href="#" class="text-brand" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Log in</a></small></p>
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


// Initialize intl-tel-input
var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
        initialCountry:"in",
        autoHideDialCode: true,
        separateDialCode: true,
        autoPlaceholder:"polite",
        formatOnDisplay:true,
        dropdownContainer: document.body,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    // Custom phone validation method to include Jio numbers starting with '6' and ensure 10 digits
    $.validator.addMethod("validPhone", function(value, element) {
        var fullNumber = iti.getNumber(); // Get full phone number
        var isValid = iti.isValidNumber(); // Check using intl-tel-input validation

        // Check if the number starts with '6', is 10 digits long, and belongs to India
        var isJioNumber = fullNumber.startsWith('+91') && fullNumber[3] == '6' && fullNumber.length == 13; // +91 6XXXXXXXXX (13 chars with country code)

        return isValid || isJioNumber; // Pass validation if it's valid or a Jio number with 10 digits
    }, "Please enter a valid phone number starting with 6 and 10 digits long.");


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
                noLeadingSpaces: true,
                minlength: 1,
                maxlength: 100
            },
            email: {
                required: true,
                email: true,
                noLeadingSpaces: true,
                minlength: 1,
                maxlength: 150
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
