<!-- Contact Us Form View -->
@extends('layouts.frontend_theme.main')

@section('mainContent')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 order-sm-0 order-2">
                <h1 class="card-title">{{ $pageTitle ?? 'Contact Us' }}</h1>
                <div class="card shadow mt-4 p-3">
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

                            <!-- New Phone Field -->
                            <div class="intl-tel-input">
                            <div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input type="hidden" id="phone_with_country_code_one" name="phone_with_country_code"/>
                                <input type="hidden" id="country_code_one" name="country_code"/>
                                <input type="text" name="phone" id="phone" class="form-control" required>
                            </div>
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
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
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
                digits: true,
                minlength: 10,
                maxlength: 15
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
                digits: "Please enter a valid phone number.",
                minlength: "Phone number must be at least 10 digits long.",
                maxlength: "Phone number cannot be more than 15 digits."
            },
            message: {
                required: "Please enter your message.",
                minlength: "Your message must be at least 10 characters long.",
                maxlength: "Your message cannot exceed 500 characters."
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
        }
    });
});
</script>
@endpush
