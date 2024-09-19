<!-- resources/views/projects/index.blade.php -->
@extends('layouts.app')

@section('title', 'Projects List')

@php
    use App\Models\Company;
    $companies = Company::orderBy('name', 'asc')->get();
@endphp

@section('content')
    @if($projects->isEmpty())
        <div class="alert alert-info">
            No projects found. <a href="{{ route('projects.create') }}"><u>Create New Project</u></a>
        </div>
    @else
 <!-- Filter Column -->
 <div class="col-md-12 mb-3">
    <div class="card shadow-sm rounded m-0 p-0" >

        <div class="card-body bg-custom-gray" id="filterCard">
            <div class="row">
                <div class="col-md-3">
                    <label for="companyFilter" class="form-label text-white">Filter by Company:</label>
                    <select id="companyFilter" class="form-select">
                        <option value="">All Companies</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button id="filterBtn" class="btn bg-custom-btn w-100">Go</button>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Projects Table -->
        <div class="card shadow-sm rounded">
            <div class="card-body">
                <table class="table table-bordered mt-3 bg-white" id="projectsTable">
                    <thead class="company">
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Preview</th>
                            @if(Auth::check() && in_array(Auth::user()->role, [1, 2,4]))
                            <th>Approval Status</th>
                            <th>Featured Status</th>
                        @endif
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr data-company-id="{{ $project->company_id }}">
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

                                @if(Auth::check() && in_array(Auth::user()->role, [1, 2,4]))
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input toggle-approval" type="checkbox" id="toggle-{{ $project->id }}" {{ $project->is_approved ? 'checked' : '' }} data-id="{{ $project->id }}">
                                            <label class="form-check-label" for="toggle-{{ $project->id }}">
                                                {{ $project->is_approved ? 'Approved' : 'Disapproved' }}
                                            </label>
                                        </div>
                                    </td>
                                @endif
                                @if(Auth::check() && in_array(Auth::user()->role, [1, 2,4]))
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input toggle-featured" type="checkbox" id="featured-{{ $project->id }}" {{ $project->is_featured ? 'checked' : '' }} data-id="{{ $project->id }}">
                                        <label class="form-check-label" for="featured-{{ $project->id }}">
                                            {{ $project->is_featured ? 'Featured' : 'Not Featured' }}
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
    $(document).ready(function() {
        // Initialize DataTable
        var table = $('#projectsTable').DataTable();

        // Filter by Company and Go button
        $('#filterBtn').on('click', function() {
            var companyId = $('#companyFilter').val();
            $.ajax({
                url: '{{ route('projects.get.filter') }}',
                method: 'GET',
                data: { company_id: companyId },
                success: function(data) {
                    // Clear the table
                    table.clear().draw();

                    // Add new data
                    data.projects.forEach(function(project, index) {
                        table.row.add([
                            index + 1,
                            project.name + '<br>&nbsp;-' + project.project_type,
                            project.company_name,
                            '<a href="' + project.preview_url + '" class="no-button" target="_blank" title="Preview Project"><i class="fas fa-link"></i></a>' +
                            '<button onclick="copyToClipboard(\'' + project.preview_url + '\', ' + (index + 1) + ')" class="no-button" title="Copy Link"><i class="fas fa-copy"></i></button>' +
                            '<span class="copy-message" id="message-' + (index + 1) + '">Copied!</span>',
                            project.is_approved ? '<div class="form-check form-switch"><input class="form-check-input toggle-approval" type="checkbox" id="toggle-' + project.id + '" checked data-id="' + project.id + '"><label class="form-check-label" for="toggle-' + project.id + '">Approved</label></div>' :
                            '<div class="form-check form-switch"><input class="form-check-input toggle-approval" type="checkbox" id="toggle-' + project.id + '" data-id="' + project.id + '"><label class="form-check-label" for="toggle-' + project.id + '">Disapproved</label></div>',
                            project.is_featured ? '<div class="form-check form-switch"><input class="form-check-input toggle-featured" type="checkbox" id="featured-' + project.id + '" checked data-id="' + project.id + '"><label class="form-check-label" for="featured-' + project.id + '">Featured</label></div>' :
                            '<div class="form-check form-switch"><input class="form-check-input toggle-featured" type="checkbox" id="featured-' + project.id + '" data-id="' + project.id + '"><label class="form-check-label" for="featured-' + project.id + '">Not Featured</label></div>',
                            '<a href="{{ url('/projects') }}/' + project.id + '/edit" class="no-button" title="Edit"><i class="{{ config('constants.icons.edit') }}"></i></a>' +
                            '<form action="{{ url('/projects') }}/' + project.id + '" method="POST" class="delete-form" style="display:inline;">@csrf @method('DELETE')<button type="submit" class="no-button" title="Delete"><i class="{{ config('constants.icons.delete') }}"></i></button></form>' +
                            '<a href="{{ url('/unit_configurations') }}/?projectID=' + project.id + '" class="no-button" title="Units Config"><i class="{{ config('constants.icons.unit_configuration') }}"></i></a>' +
                            '<a href="{{ url('/elevation_pictures') }}/?projectID=' + project.id + '" class="no-button" title="Elevation Pictures"><i class="{{ config('constants.icons.multiple_imges') }}"></i></a>'
                        ]).draw();
                    });
                }
            });
        });

        // Copy to Clipboard Function
        function copyToClipboard(url, row) {
        navigator.clipboard.writeText(url).then(function() {
            $('#message-' + row).fadeIn().delay(1000).fadeOut();
        }, function(err) {
            console.error('Failed to copy: ', err);
        });
    }

        // Toggle Approval Status
        $(document).on('change', '.toggle-approval', function() {
            var projectId = $(this).data('id');
            var isApproved = $(this).is(':checked') ? 1 : 0;
            var label = $(this).next('label');

            // Send AJAX request to update approval status
            fetch(`{{ URL::to('/projects') }}/${projectId}/toggle-approval`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ is_approved: isApproved })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    toastr.success('Approval status updated successfully.');
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
                toastr.error('An error occurred while updating the approval status.');
            });
        });



        // Handle toggle featured status
        $(document).on('change', '.toggle-featured', function() {
            var checkbox = $(this);
            var isChecked = checkbox.is(':checked');
            var projectId = checkbox.data('id');

            $.ajax({
                url: '{{ route('projects.update.featured.status') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: projectId,
                    status: isChecked ? 1 : 0
                },
                success: function(response) {
                    if (response.success) {
                        // Optionally display a success message or handle any UI updates


                    toastr.success('Featured status updated successfully.');
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);


                        console.log('Featured status updated successfully.');
                    } else {
                        // Handle failure (e.g., show an error message)
                        console.error('Failed to update featured status.');
                        toastr.error('Failed to update featured status.');
                        checkbox.prop('checked', !isChecked); // Revert the checkbox state
                    }
                },
                error: function(xhr) {
                    // Handle any errors
                    console.error('Error occurred while updating featured status:', xhr);
                    checkbox.prop('checked', !isChecked); // Revert the checkbox state
                }
            });
        });



    });
</script>
@endpush
