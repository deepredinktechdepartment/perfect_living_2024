<!-- Contact Us Form View -->
@extends('layouts.frontend_theme.main')

@section('mainContent')

    <div class="container">
        <div class="row">
            <div class="col-sm-6 order-sm-0 order-2">
                <h1 class="card-title">{{ $pageTitle ?? 'Contact Us' }}</h1>
                <div class="card shadow border-radius-0 border-0 mt-4 p-3">
                    <div class="card-body">
                        <!-- Display success or error messages using Toastr -->
                        @if (session('success'))
                            <script>
                                toastr.success("{{ session('success') }}");
                            </script>
                        @endif

                        @if (session('error'))
                            <script>
                                toastr.error("{{ session('error') }}");
                            </script>
                        @endif

                        <!-- Contact Form -->
                        <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>

                            <!-- Phone Field with intl-tel-input -->
                            <div class="form-group mb-3">
                                <label for="phone" class="d-block">Phone</label>
                                <input type="hidden" id="phone_with_country_code_one" name="phone_with_country_code"/>
                                <input type="hidden" id="country_code_one" name="country_code"/>
                                <input type="tel" name="phone" id="phone" class="form-control d-block w-100" placeholder=" " required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
                            </div>

                            <button type="submit" class="btn bg-custom-btn mt-2">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

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

    // Form validation rules
    $("#contactForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                validPhone: true // Custom validation for phone number
            },
            message: {
                required: true,
                minlength: 10,
                maxlength: 250
            }
        },
        messages: {
            name: {
                required: "Please enter your name.",
                minlength: "Name must be at least 3 characters long.",
                maxlength: "Name cannot be more than 50 characters."
            },
            email: {
                required: "Please enter your email address.",
                email: "Please enter a valid email address."
            },
            phone: {
                required: "Please enter your phone number.",
            },
            message: {
                required: "Please enter your message.",
                minlength: "Your message must be at least 10 characters long.",
                maxlength: "Your message cannot exceed 250 characters."
            }
        },
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "div",
        errorPlacement: function(error, element) {
            error.addClass("invalid-feedback");
            error.insertAfter(element);
        },
        highlight: function(element) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        },
        submitHandler: function(form) {
            // On successful validation, set the hidden fields with phone data
            var fullNumber = iti.getNumber(); // Get full number with country code
            var countryCode = iti.getSelectedCountryData().dialCode; // Get the country code

            // Set hidden fields
            $('#phone_with_country_code_one').val(fullNumber);
            $('#country_code_one').val(countryCode);

            // Submit the form after setting hidden values
            form.submit();
        }
    });
});
</script>


@endpush
