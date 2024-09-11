@extends('layouts.app')

@section('title', 'Projects List')

@section('content')
    @if($projects->isEmpty())
    <div class="alert alert-info">
        No projects found. <a href="{{ route('projects.create') }}"><u>Create New Project</u></a>
    </div>
    @else
        <div class="card shadow-sm rounded">
            <div class="card-body">
                <table class="table table-bordered mt-3 bg-white" id="projects">
                    <thead class="table-dark">
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Preview</th>
                            @if(Auth::check() && in_array(Auth::user()->role, [1, 2]))
                            <th>Approval Status</th>
                            @endif
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr id="row-{{ $loop->iteration }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $project->name ?? '' }}<br>&nbsp;-{{ $project->project_type ?? '' }}</td>
                                <td>{{ $project->company->name ?? '' }}</td>
                                <td>
                                    <a href="{{ URL::to('company/project/'.$project->slug) }}" class="no-button" target="_blank" title="Preview Project">
                                        <i class="fas fa-link"></i>
                                    </a>
                                    <button onclick="copyToClipboard('{{ URL::to('company/project/'.$project->slug) }}', {{ $loop->iteration }})" class="no-button" title="Copy Link">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                    <span class="copy-message" id="message-{{ $loop->iteration }}">Copied!</span>
                                </td>
                                @if(Auth::check() && in_array(Auth::user()->role, [1, 2]))
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input toggle-approval" type="checkbox" id="toggle-{{ $project->id }}" {{ $project->is_approved ? 'checked' : '' }} data-id="{{ $project->id }}">
                                        <label class="form-check-label" for="toggle-{{ $project->id }}">
                                            {{ $project->is_approved ? 'Approved' : 'Disapproved' }}
                                        </label>
                                    </div>
                                </td>
                                @endif
                                <td>
                                    <a href="{{ route('projects.edit', $project->id) }}" class="no-button" title="Edit">
                                        <i class="{{ config('constants.icons.edit') }}"></i>
                                    </a>
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="delete-form" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="no-button" title="Delete">
                                            <i class="{{ config('constants.icons.delete') }}"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('unit_configurations.index', ['projectID' => $project->id]) }}" class="no-button" title="Units Config">
                                        <i class="{{ config('constants.icons.unit_configuration') }}"></i>
                                    </a>
                                    <a href="{{ route('elevation_pictures.index', ['projectID' => $project->id]) }}" class="no-button" title="Elevation Pictures">
                                        <i class="{{ config('constants.icons.multiple_imges') }}"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection



@push('scripts')

<script>
    function copyToClipboard(text, rowIndex) {
        navigator.clipboard.writeText(text).then(function() {
            document.querySelectorAll('.copy-message').forEach(message => {
                message.style.display = 'none';
            });
            var messageElement = document.querySelector(`#message-${rowIndex}`);
            if (messageElement) {
                messageElement.style.display = 'inline';
                setTimeout(function() {
                    messageElement.style.display = 'none';
                }, 2000);
            }
        }).catch(function(err) {
            console.error('Failed to copy text: ', err);
        });
    }

    // Toggle Approval Status
    document.querySelectorAll('.toggle-approval').forEach(function(toggle) {
        toggle.addEventListener('change', function() {
            var projectId = this.getAttribute('data-id');
            var isApproved = this.checked ? 1 : 0;
            var label = this.nextElementSibling;

            // Send AJAX request to update approval status
            fetch(`{{ URL::to('/projects') }}/${projectId}/toggle-approval`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    is_approved: isApproved
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show toast notification
                    toastr.success('Approval status updated successfully.');
                    // Reload the page after a short delay to ensure toast message is visible
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                } else {
                    console.error('Failed to update approval status');
                    toastr.error('Failed to update approval status.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toastr.error('An error occurred while updating approval status.');
            });
        });
    });
</script>
@endpush
