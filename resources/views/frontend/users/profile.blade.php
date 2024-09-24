@extends('layouts.frontend_theme.main')

@section('mainContent')
<section class="bg-yellow">
    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <div class="employee_profile h-100">
                    <div class="card login-card p-3 px-sm-3 px-2 h-100">
                        <div class="profile_img">
                            <div class="d-flex justify-content-center">


@if(Auth::user()->profile_photo && File::exists(storage_path('app/public/' . Auth::user()->profile_photo)))
<img class="rounded-circle img-fluid" src="{{ URL::to(env('APP_STORAGE').''.Auth::user()->profile_photo) }}" alt="" width="100" height="100">
@else
<!-- No Profile Picture -->
<img class="rounded-circle img-fluid" src="https://via.placeholder.com/200" alt="Default Image" width="100" height="100">
@endif
                    </div>

                        </div>
                        <h3 class="text-center nowrap-link mb-2 pt-2">{{ old('firstname', Auth::user()->fullname ?? '') }}</h3>
                        <h6 class="text-center">{{ old('email', Auth::user()->username ?? '') }}</h6>
                        <p class="text-center mb-3">{{ old('phone', Auth::user()->phone ?? '') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="card login-card p-3 px-sm-3 px-2">
                    <div class="card-body">

                        <form id="profileupdateForm" method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <input type="text" name="firstname" id="fullname" class="form-control" placeholder="Full Name" required value="{{ old('firstname', Auth::user()->fullname ?? '') }}" autocomplete="off">
                            </div>
                            <div class="form-group mb-4">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required value="{{ old('email', Auth::user()->username ?? '') }}" autocomplete="off">
                            </div>
                            <div class="form-group mb-3">
                                <input type="hidden" id="phone_with_country_code_one" name="phone_with_country_code"/>
                                <input type="hidden" id="country_code_one" name="country_code"/>
                                <input type="tel" name="phone" id="phone" class="form-control d-block w-100" placeholder="Phone Number" required value="{{ old('phone', Auth::user()->phone ?? '') }}">
                            </div>
                            <!-- <div class="form-group mb-4">
                                <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone Number" required pattern="[0-9]{10}" value="{{ old('phone') }}" autocomplete="off">
                            </div> -->
                            <div class="form-group mb-3">
                                <label for="profile" class="form-label">Profile</label>
                                <input type="file" class="form-control" name="profile" id="profile">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group mb-4">
                                <button type="submit" class="btn btn-danger border-radius-0 w-100">Save</button>
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
    $('#profileupdateForm').validate({
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
