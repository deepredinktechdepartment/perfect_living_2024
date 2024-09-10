<!-- resources/views/reviews/index.blade.php -->
@extends('layouts.frontend_theme.main')


@section('mainContent')
<section class="reviews-section">
    <div class="container">
        <h2 class="text-left mb-4">Reviews for this Project</h2>

        <!-- Approved Reviews -->
        @if($approvedReviews->count())
            <div class="approved-reviews row">

                @foreach($approvedReviews as $review)
                <div class="col-sm-3 mb-3">
                    <div class="review-card card p-4 pb-2">
                        <div class="review-rating mb-2">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fa{{ $i <= $review->star_rating ? 's' : 'r' }} fa-star"></i>
                            @endfor
                        </div>


                        <p class="review-text">{{ $review->review }}</p>
                        <p class="review-date">{{ $review->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <p>No approved reviews yet.</p>
        @endif

    </div>
</section>
@endsection