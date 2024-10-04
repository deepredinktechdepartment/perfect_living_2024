@if($reviews->count())
    <div class="approved-reviews row">
        @foreach($reviews as $review)
            <div class="col-sm-4 mb-3">
                <!-- Dynamically set background color based on star rating -->
                <div class="review-card card p-4 pb-2" style="background-color: {{ $review->star_rating == 5 ? '#d4edda' : ($review->star_rating >= 3 ? '#fff3cd' : '#f8d7da') }};">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <!-- Review Rating -->
                        <div class="review-rating">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fa{{ $i <= $review->star_rating ? 's' : 'r' }} fa-star"></i>
                            @endfor
                        </div>
                        <!-- Date displayed to the right of the rating -->
                        <p class="review-date mb-0"><small>{{ $review->created_at->format('M d, Y') }}</small></p>
                    </div>

                    <!-- Resident and Visitor Information -->
                    @if($review->iam_resident_in_project)
                        <p class="m-0 pb-1">Review by {{ $review->fullname }}, a resident of {{ $projectName ?? '' }}.</p>
                    @endif
                    @if(!$review->iam_resident_in_project)
                        <p class="m-0 pb-1">Review by {{ $review->fullname }}, who visited {{ $projectName ?? '' }}.</p>
                    @endif

                    <!-- Limited text with ellipsis for long reviews -->
                    @if(strlen($review->review) > 100)
                        <p class="review-text m-0 p-0 text-truncate mt-2" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                            {{ substr($review->review, 0, 100) }}<span style="color: lightgray;">...</span>
                        </p>
                        <!-- Read More link to open the modal -->
                        <a href="javascript:void(0);" class="read-more" data-bs-toggle="modal" data-bs-target="#reviewModal-{{ $review->id }}">Read More</a>
                    @else
                        <p class="review-text m-0 p-0">{{ $review->review }}</p>
                    @endif
                </div>
            </div>

            <!-- Modal for showing full review -->
            <div class="modal fade" id="reviewModal-{{ $review->id }}" tabindex="-1" aria-labelledby="reviewModalLabel-{{ $review->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reviewModalLabel-{{ $review->id }}">Review by {{ $review->fullname }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Modal content with rating and date on the right -->
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="review-rating">
                                    <strong>Rating:</strong> 
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fa{{ $i <= $review->star_rating ? 's' : 'r' }} fa-star"></i>
                                    @endfor
                                </div>
                                <p class="review-date mb-0"><small>{{ $review->created_at->format('M d, Y') }}</small></p>
                            </div>

                            <!-- Resident and Visitor Information in the Modal -->
                            @if($review->iam_resident_in_project)
                                <p class="m-0"><strong>Resident:</strong> Review by {{ $review->fullname }}, a resident of {{ $projectName ?? '' }}.</p>
                            @endif
                            @if($review->visited_botanika)
                                <p class="m-0"><strong>Visited:</strong> Review by {{ $review->fullname }}, who visited {{ $projectName ?? '' }}.</p>
                            @endif
                            @if(!empty($review->tower))
                                <p class="m-0"><strong>Tower:</strong> {{ $review->tower }}</p>
                            @endif
                            @if(!empty($review->flat))
                                <p class="m-0"><strong>Flat:</strong> {{ $review->flat }}</p>
                            @endif

                            <!-- Displaying full review text with "Review" heading -->
                           <p class="m-0"><strong>Review:</strong></p>
                            <p class="m-0">{{ $review->review }}</p> <!-- No padding between p tags -->

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>No reviews yet.</p>
@endif
