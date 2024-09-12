<!-- Example view file -->
@extends('layouts.frontend_theme.main')

@section('mainContent')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 order-sm-0 order-2">
                <h1 class="card-title">{{ $pageTitle ?? '' }}</h1>
                <div class="card shadow mt-4">
                    <div class="card-body">

                        <form id="reviewForm" action="{{ route('reviews.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="star_rating" class="form-label">Star Rating</label>
                                <select name="star_rating" id="star_rating" class="form-select">
                                    <option value="">Select Rating</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="review" class="form-label">Review</label>
                                <textarea name="review" id="review" class="form-control" rows="5" required></textarea>
                            </div>

                            <button type="submit" class="btn bg-custom-btn text-white">Submit Review</button>
                            <input type="hidden" name="project_id" value="{{$projectId ?? 0}}" />
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
    $("#reviewForm").validate({
        rules: {
            star_rating: {
                required: true,
            },
            review: {
                required: true,
                minlength: 10,
                maxlength: 500
            }
        },
        messages: {
            star_rating: {
                required: "Please select a star rating.",
            },
            review: {
                required: "Please enter your review.",
                minlength: "Your review must be at least 10 characters long.",
                maxlength: "Your review must be less than 500 characters long."
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
