<!-- resources/views/reviews/index.blade.php -->
@extends('layouts.frontend_theme.main')


@section('mainContent')
<section class="reviews-section">
    <div class="container">
        <h2 class="text-left mb-4">Reviews for this Project</h2>

        <!-- Approved Reviews -->
        @if($approvedReviews->count())
            <div class="approved-reviews">

                @foreach($approvedReviews as $review)
                    <div class="review-card mb-3">
                        <div class="review-rating">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fa{{ $i <= $review->star_rating ? 's' : 'r' }} fa-star"></i>
                            @endfor
                        </div>


                        <p class="review-text">{{ $review->review }}</p>
                        <p class="review-date">{{ $review->created_at->format('M d, Y') }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p>No approved reviews yet.</p>
        @endif

    </div>
</section>
@endsection