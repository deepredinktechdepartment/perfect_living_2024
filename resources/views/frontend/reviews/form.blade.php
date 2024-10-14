@extends('layouts.frontend_theme.main')

@section('mainContent')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 order-sm-0 order-2">
                <h1 class="card-title mb-4">{{ $pageTitle ?? 'Review' }}</h1>

                <div class="card shadow border-radius-0 border-0">
                    <div class="card-body p-4">

                        <form id="reviewForm" action="{{ route('reviews.store') }}" method="POST">
                            @csrf
                            <div class="mb-0">
                                <label for="star_rating" class="form-label">Rating</label>
                            </div>
                            <div class="mb-4">
                                <!-- Star Rating System (5 to 1) -->
                                <div id="star-rating" class="star-rating">
                                    <i class="fa fa-star" data-value="5"></i>
                                    <i class="fa fa-star" data-value="4"></i>
                                    <i class="fa fa-star" data-value="3"></i>
                                    <i class="fa fa-star" data-value="2"></i>
                                    <i class="fa fa-star" data-value="1"></i>
                                </div>
                                <input type="hidden" id="star_rating" name="star_rating" value="">
                            </div>

                            <div class="mb-3">
                                <!-- Name Field -->
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       value="{{ Auth::check() ? Auth::user()->name : '' }}" required>
                            </div>

                            <div class="row mb-3">
                                <!-- Email Field -->
                                <div class="col-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                           value="{{ Auth::check() ? Auth::user()->email : '' }}" required>
                                </div>
                                <!-- Phone Field -->
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="hidden" id="phone_with_country_code_one" name="phone_with_country_code"/>
                                        <input type="hidden" id="country_code_one" name="country_code"/>
                                        <input type="tel" name="phone" id="phone" class="form-control d-block w-100" value="{{ Auth::check() ? Auth::user()->phone : '' }}" placeholder=" " required>
                                    </div>
                                
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Are you a resident of this project?</label><br>
                                <input type="radio" id="resident_yes" name="resident" value="1" onclick="toggleResidentFields()">
                                <label for="resident_yes" class="form-label-inline">Yes</label>
                                <input type="radio" id="resident_no" name="resident" value="0" onclick="toggleResidentFields()">
                                <label for="resident_no" class="form-label-inline">No</label>
                            </div>

                            <div id="resident_fields" style="display: none;">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="tower" class="form-label">Tower</label>
                                        <input type="text" name="tower" id="tower" class="form-control" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="flat" class="form-label">Flat</label>
                                        <input type="text" name="flat" id="flat" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <!-- Review Textarea -->
                                <textarea name="review" id="review" class="form-control" rows="5" placeholder="Write a Review" required></textarea>
                            </div>

                            <button type="submit" class="btn bg-custom-btn">Submit Review</button>
                            <input type="hidden" name="project_id" value="{{ $projectId ?? 0 }}" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<!-- Add FontAwesome or a similar icon library for the stars -->

<!-- Custom styles for the star rating -->
<style>
    .star-rating {
        display: inline-flex; /* Use inline-flex to ensure left alignment */
        justify-content: flex-start; /* Ensure stars are aligned to the left */
        gap: 5px; /* Add some spacing between the stars */
        cursor: pointer;
    }
    .star-rating i {
        font-size: 24px;
        color: #ccc; /* Default grey color for unselected stars */
        transition: color 0.3s ease-in-out;
    }
    .star-rating i.selected {
        color: #f5c518; /* Gold color for selected stars */
    }
    .form-label-inline {
        display: inline; /* Make labels inline */
        margin-right: 10px; /* Add some space between labels */
    }
</style>
@endpush

@push('scripts')
<script>

$(document).ready(function() {
    // Handle the star rating click
    $('.star-rating i').on('click', function() {
        var rating = $(this).data('value'); // Get the value of the clicked star
        $('#star_rating').val(rating); // Set the hidden input to the selected rating

        // Highlight the stars from the clicked one down to 5
        $('.star-rating i').each(function() {
            if ($(this).data('value') <= rating) {
                $(this).addClass('selected');
            } else {
                $(this).removeClass('selected');
            }
        });
    });

    // Optional hover effect to preview the rating before clicking
    $('.star-rating i').on('mouseover', function() {
        var rating = $(this).data('value');

        // Highlight stars from the clicked one down to 5
        $('.star-rating i').each(function() {
            if ($(this).data('value') <= rating) {
                $(this).addClass('selected');
            } else {
                $(this).removeClass('selected');
            }
        });
    });

    // Restore the selected stars when the user moves the mouse away
    $('.star-rating').on('mouseleave', function() {
        var selectedRating = $('#star_rating').val();

        // Re-apply the highlighting for the selected stars
        $('.star-rating i').each(function() {
            if ($(this).data('value') <= selectedRating) {
                $(this).addClass('selected');
            } else {
                $(this).removeClass('selected');
            }
        });
    });

    
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

    // Custom validation method to check if the first letter is not a space
    $.validator.addMethod("noSpaceFirstLetter", function(value, element) {
        return this.optional(element) || /^[^\s].*/.test(value);
    }, "First letter cannot be a space.");


    // jQuery validation
    $("#reviewForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 2,
                noSpaceFirstLetter: true, // Apply custom validation
            },
            email: {
                required: true,
                noSpaceFirstLetter: true, // Apply custom validation
                email: true,
            },
            phone: {
                required: true,
                validPhone: true // Custom validation for phone number
            },
            review: {
                required: true,
                noSpaceFirstLetter: true, // Apply custom validation
                minlength: 10
            },
            star_rating: {
                required: true
            },
            tower: {
                required: function() {
                    return $('input[name="resident"]:checked').val() === '1'; // Only required if resident is yes
                }
            },
            flat: {
                required: function() {
                    return $('input[name="resident"]:checked').val() === '1'; // Only required if resident is yes
                }
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Your name must be at least 2 characters long"
            },
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            phone: {
                required: "Please enter your phone number"
            },
            review: {
                required: "Please write a review",
                minlength: "Your review must be at least 10 characters long"
            },
            star_rating: {
                required: "Please select a rating"
            },
            tower: {
                required: "Please enter the tower number"
            },
            flat: {
                required: "Please enter the flat number"
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
            form.submit(); // Submit the form if valid
        }
    });
});

// Function to toggle the visibility of resident fields
function toggleResidentFields() {
    const isResident = document.querySelector('input[name="resident"]:checked');
    const residentFields = document.getElementById('resident_fields');

    if (isResident && isResident.value === '1') {
        residentFields.style.display = 'block';
        document.getElementById('tower').setAttribute('required', 'required'); // Set tower field as required
        document.getElementById('flat').setAttribute('required', 'required'); // Set flat field as required
    } else {
        residentFields.style.display = 'none';
        document.getElementById('tower').removeAttribute('required'); // Remove required attribute from tower field
        document.getElementById('flat').removeAttribute('required'); // Remove required attribute from flat field
        document.getElementById('tower').value = ''; // Clear tower field
        document.getElementById('flat').value = ''; // Clear flat field
    }
}
</script>
@endpush
