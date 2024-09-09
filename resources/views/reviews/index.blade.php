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
                    <th>Rating</th>
                    <th>Review</th>
                    <th>Reviewed On</th>
                    <th>IP Address</th>
                    <th>Approval Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $review)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $review->star_rating }} Stars</td>
                    <td>{{ $review->review }}</td>
                    <td>{{ $review->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>{{ $review->ip_address }}</td>
                    <td>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input approval-toggle" id="approvalSwitch{{ $review->id }}" data-id="{{ $review->id }}" {{ $review->approval_status ? 'checked' : '' }}>
                            <label class="form-check-label" for="approvalSwitch{{ $review->id }}">{{ $review->approval_status ? 'Approved' : 'Disapproved' }}</label>
                        </div>
                    </td>
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
                    location.reload(); // Refresh the page on successful status update
                } else {
                    alert('Error updating approval status.');
                }
            });
        });
    });
});
</script>
@endpush
