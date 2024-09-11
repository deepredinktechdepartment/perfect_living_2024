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

        <!-- Display table of reviews -->
        <div class="card shadow-sm rounded">
            <div class="card-body">
                <table class="table table-bordered mt-3 bg-white" id="reviews">
                    <thead class="table-dark">
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
                            <td>{{ $review->project->name ?? 'N/A' }}</td> <!-- Assuming you have a relation named 'project' -->
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
<script>
document.addEventListener("DOMContentLoaded", function() {
    const toggleApprovalUrl = @json(route('reviews.toggleApproval'));

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
                    // Store the success message in session storage
                    sessionStorage.setItem('approvalMessage', data.message);

                    // Reload the page
                    location.reload();
                } else {
                    toastr.error('Error updating approval status.');
                }
            });
        });
    });

    // Display toaster message if available
    const approvalMessage = sessionStorage.getItem('approvalMessage');
    if (approvalMessage) {
        toastr.success(approvalMessage);

        // Clear the message from session storage
        sessionStorage.removeItem('approvalMessage');
    }
});


</script>
@endpush
