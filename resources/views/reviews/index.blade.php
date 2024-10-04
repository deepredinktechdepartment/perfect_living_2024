@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <!-- Display success message if available -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Filter Section -->
        <div class="card shadow-sm rounded mb-3 m-0 p-0">
            <div class="card-body bg-custom-gray" id="filterCard">
                <div class="row">
                    <div class="col-md-3">
                        <label for="projectFilter" class="form-label text-white">Filter by Project:</label>
                        <select id="projectFilter" class="form-select">
                            <option value="">All Projects</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}" {{ request()->get('project_id') == $project->id ? 'selected' : '' }}>
                                    {{ $project->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-1 d-flex align-items-end">
                        <button id="filterBtn" class="btn bg-custom-btn w-100">Go</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Display table of reviews -->
        <div class="card shadow-sm rounded">
            <div class="card-body">
                <table class="table table-bordered mt-3 bg-white" id="reviews">
                    <thead class="company">
                        <tr>
                            <th>S.No.</th>
                            <th>Customer</th>
                            <th>Project</th>
                            <th>Rating</th>
                         
                            <th>Reviewed On</th>
                            <th>IP Address</th>
                            @if(Auth::check() && in_array(Auth::user()->role, [1, 2]))
                            <th>Approval Status</th>
                            @endif
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
<td>
    @if(!empty($review->name))
        {{ $review->fullname }}<br>
    @endif

    @if(!empty($review->email))
        {{ $review->email }}<br>
    @endif

    @if(!empty($review->phone))
        {{ $review->phone }}<br>
    @endif

    @if(!empty($review->tower))
        <span>Tower:</span> {{ $review->tower }}<br>
    @endif

    @if(!empty($review->flat))
        <span>Flat:</span> {{ $review->flat }}
    @endif
</td>


                            <td>{{ $review->project->name ?? 'N/A' }}</td>
                            <td>{{ $review->star_rating }}</td>
                         
                            <td>{{ $review->created_at->format('d-m-Y') }}</td>
                            <td>{{ $review->ip_address }}</td>
                            @if(Auth::check() && in_array(Auth::user()->role, [1, 2]))
                            <td>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input approval-toggle" id="approvalSwitch{{ $review->id }}" data-id="{{ $review->id }}" {{ $review->approval_status ? 'checked' : '' }}>
                                    <label class="form-check-label" for="approvalSwitch{{ $review->id }}">{{ $review->approval_status ? 'Approved' : 'Disapproved' }}</label>
                                </div>
                            </td>
                            @endif
                            <td>
                                   <!-- Edit Button -->
                                   <button class="no-button edit-review-btn" data-id="{{ $review->id }}" data-rating="{{ $review->star_rating }}" data-review="{{ $review->review }}" data-bs-toggle="modal" data-bs-target="#editReviewModal">
                                    <img src="https://i.imgur.com/Oy59BAN.png" width="16/">
                                </button>




                                &nbsp;
                                <!-- Delete Form -->
                                <form action="{{ route('reviews.delete', $review->id) }}" method="POST" class="delete-form" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="no-button"><i class="{{ config('constants.icons.delete') }}"></i></button>
                                </form>

                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Edit Review Modal -->
<div class="modal fade" id="editReviewModal" tabindex="-1" aria-labelledby="editReviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editReviewModalLabel">Edit Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editReviewForm">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="reviewId" name="reviewId">
                    <div class="mb-3">
                        <label for="editStarRating" class="form-label">Rating</label>
                        <input type="number" class="form-control" id="editStarRating" name="star_rating" min="1" max="5">
                    </div>
                    <div class="mb-3">
                        <label for="editReviewText" class="form-label">Review</label>
                        <textarea class="form-control" id="editReviewText" name="review" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection



@push('scripts')


<script>
document.addEventListener("DOMContentLoaded", function() {
    const toggleApprovalUrl = @json(route('reviews.toggleApproval'));
    const filterBtn = document.getElementById('filterBtn');
    const projectFilter = document.getElementById('projectFilter');

    function initializeApprovalToggles() {
        document.querySelectorAll('.approval-toggle').forEach(function(toggle) {
            toggle.addEventListener('change', function() {
                let id = this.getAttribute('data-id');
                let approved = this.checked ? 1 : 0;

                fetch(`${toggleApprovalUrl}/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ approve: approved }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        toastr.success(data.message);
                        // Update the approval status in the table without refreshing
                        updateApprovalStatus(id, approved);
                    } else {
                        toastr.error('Error updating approval status.');
                    }
                });
            });
        });
    }

    function updateApprovalStatus(id, approved) {
        const toggle = document.querySelector(`.approval-toggle[data-id="${id}"]`);
        if (toggle) {
            toggle.checked = approved;
            toggle.nextElementSibling.textContent = approved ? 'Approved' : 'Disapproved';
        }
    }

    function updateReviewTable(reviews) {
        const tbody = document.querySelector('#reviews tbody');
        tbody.innerHTML = '';

        if (reviews.length === 0) {
            tbody.innerHTML = '<tr><td colspan="8">No reviews found.</td></tr>';
            return;
        }

        reviews.forEach((review, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${index + 1}</td>
                <td>${review.project ? review.project.name : 'N/A'}</td>
                <td>${review.star_rating}</td>
                <td>${review.review}</td>
                <td>${new Date(review.created_at).toLocaleDateString()}</td>
                <td>${review.ip_address}</td>
                ${renderApprovalColumn(review)}
                <td>
                    <form action="{{ route('reviews.delete', '') }}/${review.id}" method="POST" class="delete-form" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="no-button"><i class="{{ config('constants.icons.delete') }}"></i></button>
                    </form>
                </td>
            `;
            tbody.appendChild(row);
        });

        initializeApprovalToggles();
    }

    function renderApprovalColumn(review) {
        @if(Auth::check() && in_array(Auth::user()->role, [1, 2]))
            return `
                <td>
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input approval-toggle" id="approvalSwitch${review.id}" data-id="${review.id}" ${review.approval_status ? 'checked' : ''}>
                        <label class="form-check-label" for="approvalSwitch${review.id}">${review.approval_status ? 'Approved' : 'Disapproved'}</label>
                    </div>
                </td>
            `;
        @else
            return '';
        @endif
    }

    filterBtn.addEventListener('click', function() {
        const selectedProject = projectFilter.value;

        fetch("{{ route('reviews.filter') }}?project_id=" + selectedProject, {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                updateReviewTable(data.reviews);
            } else {
                toastr.error('Error fetching reviews.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            toastr.error('Something went wrong.');
        });
    });

    // Display toaster message if available
    const approvalMessage = sessionStorage.getItem('approvalMessage');
    if (approvalMessage) {
        toastr.success(approvalMessage);
        sessionStorage.removeItem('approvalMessage');
    }

    // Initialize approval toggles on page load
    initializeApprovalToggles();
});



// Edit Review Button Click
document.querySelectorAll('.edit-review-btn').forEach(button => {
    button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        const rating = this.getAttribute('data-rating');
        const review = this.getAttribute('data-review');

        // Set the modal fields
        document.getElementById('reviewId').value = id;
        document.getElementById('editStarRating').value = rating;
        document.getElementById('editReviewText').value = review;
    });
});


// Handle the edit review form submission
document.getElementById('editReviewForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    const reviewId = document.getElementById('reviewId').value;

    // Prepare the update review URL
    const updateReviewUrl = "{{ URL::to('/updatereviews') }}";

    // Create the request body with FormData
    const requestBody = new FormData();
    requestBody.append('star_rating', $('#editStarRating').val());
    requestBody.append('review', $('#editReviewText').val());

    // Perform the fetch request
    fetch(`${updateReviewUrl}/${reviewId}`, { // Include the reviewId in the URL for PUT
        method: 'POST', // Set method to POST (ensure your server is set to handle this)
        body: requestBody, // Pass the FormData object
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
    .then(response => {

        if (!response.ok) { // Check if the response status is OK (200-299)
            throw new Error('Network response was not ok');
        }
        return response.json(); // Parse the JSON response
    })
    .then(data => {
        if (data.success) {
            toastr.success(data.message); // Show success message
            updateReviewRow(data.review); // Update the specific row in the table
            $('#editReviewModal').modal('hide'); // Close the modal
            location.reload(); // Refresh the page
        } else {
            toastr.error('Error updating review: ' + data.message); // Show error message
        }
    })
    .catch(error => {
        console.error('Error:', error);
        toastr.error('Something went wrong: ' + error.message); // Show general error message
    });
});







// Function to update the review row in the table
function updateReviewRow(updatedReview) {
    // Assuming you have a way to find the corresponding row in the table
    const reviewRow = document.querySelector(`#review-${updatedReview.id}`); // Example selector

    if (reviewRow) {
        reviewRow.querySelector('.review-text').textContent = updatedReview.review; // Update review text
        reviewRow.querySelector('.star-rating').textContent = updatedReview.star_rating; // Update star rating display
    }
}

</script>
@endpush
