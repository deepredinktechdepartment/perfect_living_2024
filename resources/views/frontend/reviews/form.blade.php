@extends('layouts.frontend_theme.main')

@section('mainContent')
<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 order-sm-0 order-2">
                <!-- <h1 class="card-title mb-4"> {{ $pageTitle ?? 'Review' }}</h1> -->
                <h2 class="mb-4 pb-sm-3">Rate Rajapushpa Provincia on the following criteria:</h2>
                <div class="card border-0">
                    <div class="card-body p-5">

                        <form id="reviewForm" action="{{ route('reviews.store') }}" method="POST">
                            @csrf

                            <div>
                                <h5 class="mb-4">Your Feedback</h5>
                                
                                <!-- Overall Satisfaction Section -->
                                <div class="row mb-3">
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <label for="star_rating1" class="form-label">Overall Satisfaction<span class="text-red">*</span></label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 mb-2">
                                        <div id="star-rating1" class="star-rating">
                                            <i class="fa fa-star" data-value="1"></i>
                                            <i class="fa fa-star" data-value="2"></i>
                                            <i class="fa fa-star" data-value="3"></i>
                                            <i class="fa fa-star" data-value="4"></i>
                                            <i class="fa fa-star" data-value="5"></i>
                                        </div>
                                        <input type="hidden" id="star_rating1" name="star_rating1" value="">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 text-md-center" id="emoji_expression1">
                                        <p class="text-grey worning_text">Terrible &nbsp; <i class="fa-solid fa-face-angry text-danger"></i></p>
                                        <p class="text-grey worning_text">Poor &nbsp; <i class="fa-solid fa-face-frown text-info"></i></p>
                                        <p class="text-grey worning_text">Average &nbsp; <i class="fa-solid fa-face-meh text-warning"></i></p>
                                        <p class="text-grey worning_text">Good &nbsp; <i class="fa-solid fa-face-smile text-success"></i></p>
                                        <p class="text-grey worning_text">Excellent &nbsp; <i class="fa-solid fa-face-grin-hearts text-success"></i></p>
                                    </div>
                                </div>
                                
                                <!-- Location & Accessibility Section -->
                                <div class="row mb-3">
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <label for="star_rating2" class="form-label">Location & Accessibility<span class="text-red">*</span></label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 mb-2">
                                        <div id="star-rating2" class="star-rating">
                                            <i class="fa fa-star" data-value="1"></i>
                                            <i class="fa fa-star" data-value="2"></i>
                                            <i class="fa fa-star" data-value="3"></i>
                                            <i class="fa fa-star" data-value="4"></i>
                                            <i class="fa fa-star" data-value="5"></i>
                                        </div>
                                        <input type="hidden" id="star_rating2" name="star_rating2" value="">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 text-md-center" id="emoji_expression2">
                                        <p class="text-grey worning_text">Terrible &nbsp; <i class="fa-solid fa-face-angry text-danger"></i></p>
                                        <p class="text-grey worning_text">Poor &nbsp; <i class="fa-solid fa-face-frown text-info"></i></p>
                                        <p class="text-grey worning_text">Average &nbsp; <i class="fa-solid fa-face-meh text-warning"></i></p>
                                        <p class="text-grey worning_text">Good &nbsp; <i class="fa-solid fa-face-smile text-success"></i></p>
                                        <p class="text-grey worning_text">Excellent &nbsp; <i class="fa-solid fa-face-grin-hearts text-success"></i></p>
                                    </div>
                                </div>
                                
                                <!-- Amenities & Facilities Section -->
                                <div class="row mb-3">
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <label for="star_rating3" class="form-label">Amenities & Facilities<span class="text-red">*</span></label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 mb-2">
                                        <div id="star-rating3" class="star-rating">
                                            <i class="fa fa-star" data-value="1"></i>
                                            <i class="fa fa-star" data-value="2"></i>
                                            <i class="fa fa-star" data-value="3"></i>
                                            <i class="fa fa-star" data-value="4"></i>
                                            <i class="fa fa-star" data-value="5"></i>
                                        </div>
                                        <input type="hidden" id="star_rating3" name="star_rating3" value="">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 text-md-center" id="emoji_expression3">
                                        <p class="text-grey worning_text">Terrible &nbsp; <i class="fa-solid fa-face-angry text-danger"></i></p>
                                        <p class="text-grey worning_text">Poor &nbsp; <i class="fa-solid fa-face-frown text-info"></i></p>
                                        <p class="text-grey worning_text">Average &nbsp; <i class="fa-solid fa-face-meh text-warning"></i></p>
                                        <p class="text-grey worning_text">Good &nbsp; <i class="fa-solid fa-face-smile text-success"></i></p>
                                        <p class="text-grey worning_text">Excellent &nbsp; <i class="fa-solid fa-face-grin-hearts text-success"></i></p>
                                    </div>
                                </div>
                            
                                 <!-- Apartment/Condo Unit Design & Quality Section -->
                                <div class="row mb-3">
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <label for="star_rating4" class="form-label">Apartment/Condo Unit Design & Quality<span class="text-red">*</span></label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 mb-2">
                                        <div id="star-rating4" class="star-rating">
                                            <i class="fa fa-star" data-value="1"></i>
                                            <i class="fa fa-star" data-value="2"></i>
                                            <i class="fa fa-star" data-value="3"></i>
                                            <i class="fa fa-star" data-value="4"></i>
                                            <i class="fa fa-star" data-value="5"></i>
                                        </div>
                                        <input type="hidden" id="star_rating4" name="star_rating4" value="">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 text-md-center" id="emoji_expression4">
                                        <p class="text-grey worning_text">Terrible &nbsp; <i class="fa-solid fa-face-angry text-danger"></i></p>
                                        <p class="text-grey worning_text">Poor &nbsp; <i class="fa-solid fa-face-frown text-info"></i></p>
                                        <p class="text-grey worning_text">Average &nbsp; <i class="fa-solid fa-face-meh text-warning"></i></p>
                                        <p class="text-grey worning_text">Good &nbsp; <i class="fa-solid fa-face-smile text-success"></i></p>
                                        <p class="text-grey worning_text">Excellent &nbsp; <i class="fa-solid fa-face-grin-hearts text-success"></i></p>
                                    </div>
                                </div>

                                <!-- Safety & Security Section -->
                                <div class="row mb-3">
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <label for="star_rating5" class="form-label">Safety & Security<span class="text-red">*</span></label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 mb-2">
                                        <div id="star-rating5" class="star-rating">
                                            <i class="fa fa-star" data-value="1"></i>
                                            <i class="fa fa-star" data-value="2"></i>
                                            <i class="fa fa-star" data-value="3"></i>
                                            <i class="fa fa-star" data-value="4"></i>
                                            <i class="fa fa-star" data-value="5"></i>
                                        </div>
                                        <input type="hidden" id="star_rating5" name="star_rating5" value="">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 text-md-center" id="emoji_expression5">
                                        <p class="text-grey worning_text">Terrible &nbsp; <i class="fa-solid fa-face-angry text-danger"></i></p>
                                        <p class="text-grey worning_text">Poor &nbsp; <i class="fa-solid fa-face-frown text-info"></i></p>
                                        <p class="text-grey worning_text">Average &nbsp; <i class="fa-solid fa-face-meh text-warning"></i></p>
                                        <p class="text-grey worning_text">Good &nbsp; <i class="fa-solid fa-face-smile text-success"></i></p>
                                        <p class="text-grey worning_text">Excellent &nbsp; <i class="fa-solid fa-face-grin-hearts text-success"></i></p>
                                    </div>
                                </div>

                            </div>
                            

                            <div class="mb-3 pt-3">
                                <!-- Name Field -->
                                <h5 class="mb-3">What is remarkable about this property?</h5>
                                <textarea class="form-control" id="about_property" name="about_property" rows="5" required></textarea>
                            </div>

                            
                            <div class="mb-3 pt-3">
                                <h5 class="mb-3">Your Details</h5>
                                
                            </div>

                            <div class="row mb-3">
                                <!-- Name Field -->
                                <div class="col-lg-6 col-md-4 col-sm-12">
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                           value="{{ Auth::check() ? Auth::user()->name : '' }}" required>
                                    </div>
                                </div>
                                <!-- Email Field -->
                                <div class="col-lg-6 col-md-4 col-sm-12">
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                               value="{{ Auth::check() ? Auth::user()->email : '' }}" required>
                                    </div>
                                </div>
                                <!-- Phone Field -->
                                <div class="col-lg-6 col-md-4 col-sm-12">
                                    <div class="form-group mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="hidden" id="phone_with_country_code_one" name="phone_with_country_code"/>
                                        <input type="hidden" id="country_code_one" name="country_code"/>
                                        <input type="tel" name="phone" id="phone" class="form-control d-block w-100" value="{{ Auth::check() ? Auth::user()->phone : '' }}" placeholder=" " required>
                                    </div>
                                </div>
                                <!-- Name Field -->
                                <div class="col-lg-6 col-md-4 col-sm-12">
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Location</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                           value="{{ Auth::check() ? Auth::user()->name : '' }}" required>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="is_anonymous" name="is_anonymous" value="0">
                            <button type="button" onclick="document.getElementById('is_anonymous').value=1; this.form.submit();" class="btn bg-custom-btn mb-3">Publish Anonymously</button>
                            <button type="button" onclick="document.getElementById('is_anonymous').value=0; this.form.submit();" class="btn bg-custom-btn mb-3">Publish with my Name</button>
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
    .worning_text{
        display: none;
    }
    .fa-solid{
        font-size: 20px;
    }
    .star-rating {
    display: inline-flex;
    justify-content: flex-start; /* Align stars to the left */
    gap: 15px; /* Space between stars */
    cursor: pointer;
    width: 100%;
    direction: ltr; /* Ensure left-to-right alignment */
    }

    .star-rating i {
        font-size: 24px;
        color: #ccc; /* Default color for unselected stars */
        transition: color 0.3s ease-in-out;
    }

    .star-rating i.selected {
        color: #f5c518; /* Gold color for selected stars */
    }

    .form-label-inline {
        display: inline;
        margin-right: 10px;
    }


</style>
@endpush

@push('scripts')
<script>

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

    $(document).ready(function () {
    // Initialize jQuery Validation
    $("#reviewForm").validate({
        rules: {
            star_rating1: "required",
            star_rating2: "required",
            star_rating3: "required",
            star_rating4: "required",
            star_rating5: "required",
            about_property: "required",
            name: "required",
            email: {
                required: true,
                email: true
            },
            phone: "required"
        },
        messages: {
            star_rating1: "Please rate your Overall Satisfaction.",
            star_rating2: "Please rate Location & Accessibility.",
            star_rating3: "Please rate Amenities & Facilities.",
            star_rating4: "Please rate Design & Quality.",
            star_rating5: "Please rate Safety & Security.",
            about_property: "Please provide feedback about the property.",
            name: "Please enter your name.",
            email: "Please enter a valid email address.",
            phone: "Please enter your phone number."
        },
        errorElement: 'div',
        errorClass: 'invalid-feedback',
        highlight: function (element) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid");
        }
    });

    // Star rating and emoji mapping for each section
    const ratingSections = [
        { id: 1, expressions: ["Terrible", "Poor", "Average", "Good", "Excellent"] },
        { id: 2, expressions: ["Terrible", "Poor", "Average", "Good", "Excellent"] },
        { id: 3, expressions: ["Terrible", "Poor", "Average", "Good", "Excellent"] },
        { id: 4, expressions: ["Terrible", "Poor", "Average", "Good", "Excellent"] },
        { id: 5, expressions: ["Terrible", "Poor", "Average", "Good", "Excellent"] }
    ];

    ratingSections.forEach(section => {
        const starRatingContainer = document.getElementById(`star-rating${section.id}`);
        const ratingInput = document.getElementById(`star_rating${section.id}`);
        const emojiExpressionContainer = document.getElementById(`emoji_expression${section.id}`);
        const stars = starRatingContainer.querySelectorAll("i");

        let selectedRating = 0;

        stars.forEach(star => {
            // Click event to select rating
            star.addEventListener("click", function() {
                selectedRating = this.getAttribute("data-value");
                ratingInput.value = selectedRating;

                updateStars(stars, selectedRating);
                showEmojiExpression(emojiExpressionContainer, section.expressions, selectedRating);
            });

            // Mouseover event for hover effect
            star.addEventListener("mouseover", function() {
                const hoverRating = this.getAttribute("data-value");
                updateStars(stars, hoverRating);
                showEmojiExpression(emojiExpressionContainer, section.expressions, hoverRating);
            });

            // Mouseout event to revert to selected rating
            star.addEventListener("mouseout", function() {
                updateStars(stars, selectedRating);
                showEmojiExpression(emojiExpressionContainer, section.expressions, selectedRating);
            });
        });

        // Function to update star colors based on rating
        function updateStars(stars, rating) {
            stars.forEach(s => s.classList.toggle("text-warning", s.getAttribute("data-value") <= rating));
        }

        // Function to show only the relevant emoji expression
        function showEmojiExpression(container, expressions, rating) {
        const expressionText = expressions[rating - 1] || "";
        const expressionIcons = [
            "fa-face-angry",   // 1 Star
            "fa-face-frown",   // 2 Stars
            "fa-face-meh",     // 3 Stars
            "fa-face-smile",   // 4 Stars
            "fa-face-grin-hearts"    // 5 Stars
        ];
        // Custom colors (you can replace these with any desired colors)
        const expressionColors = [
            "#ff4869", // Red for "Terrible"
            "#fb733b", // Orange for "Poor"
            "#faba2e", // Yellow for "Average"
            "#71e34b", // Green for "Good"
            "#53c343"  // Blue for "Excellent"
        ];

        container.style.display = "block";
        // Set the icon color directly using inline styles
        container.innerHTML = `${expressionText} &nbsp; <i class="fa-solid ${expressionIcons[rating - 1]}" style="color: ${expressionColors[rating - 1]}"></i>`;
    }

    });
});

</script>
@endpush