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
                            <th>Preview</th> <!-- New Column -->
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
                                    <!-- Preview Link -->
                                    <a href="{{ URL::to('company/project/'.$project->slug) }}" class="no-button" target="_blank" title="Preview Project">
                                        <i class="fas fa-link"></i>
                                    </a>
                                    <!-- Copy Link Button -->
                                    <button onclick="copyToClipboard('{{ URL::to('company/project/'.$project->slug) }}', {{ $loop->iteration }})" class="no-button" title="Copy Link">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                    <!-- Copy Message -->
                                    <span class="copy-message" id="message-{{ $loop->iteration }}">Copied!</span>
                                </td>
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
            // Hide all messages first
            document.querySelectorAll('.copy-message').forEach(message => {
                message.style.display = 'none';
            });

            // Show the specific message for the row that was clicked
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
</script>
@endpush


