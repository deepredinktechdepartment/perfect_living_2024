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
            <div class="card-body bg-persian-green" id="filterCard">
                <div class="row">
                    <div class="col-md-3">
                        <label for="projectFilter" class="form-label text-dark">Filter by Project:</label>
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
                        <button id="filterBtn" class="btn bg-halite-blue w-100">Go</button>
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
                            <th>Project</th>
                            <th>Rating</th>
                            <th>Review</th>
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
                            <td>{{ $review->project->name ?? 'N/A' }}</td>
                            <td>{{ $review->star_rating }}</td>
                            <td>{{ $review->review }}</td>
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

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

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
</script>
@endpush
