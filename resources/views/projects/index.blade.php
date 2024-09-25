<!-- resources/views/projects/index.blade.php -->
@extends('layouts.app')

@section('title', 'Projects List')

@php
    use App\Models\Company;
    $companies = Company::orderBy('name', 'asc')->get();

@endphp

@section('content')

<!-- Tabs for Project Status -->

<div class="common_tabs">
    <!-- Nav Tabs -->
    <ul class="nav nav-tabs" id="userTabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link {{ $tab === 'newly_added' ? 'active' : '' }}" href="{{ route('projects.index', ['tab' => 'newly_added']) }}">
            Newly Added <span class="badge bg-primary">{{ $statusCounts['newly_added'] ?? 0 }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $tab === 'in_review' ? 'active' : '' }}" href="{{ route('projects.index', ['tab' => 'in_review']) }}">
            In Review <span class="badge bg-warning">{{ $statusCounts['in_review'] ?? 0 }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $tab === 'published' ? 'active' : '' }}" href="{{ route('projects.index', ['tab' => 'published']) }}">
            Published <span class="badge bg-success">{{ $statusCounts['published'] ?? 0 }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $tab === 'deactivated' ? 'active' : '' }}" href="{{ route('projects.index', ['tab' => 'deactivated']) }}">
            Deactivated <span class="badge bg-danger">{{ $statusCounts['deactivated'] ?? 0 }}</span>
        </a>
    </li>
</ul>
</div>





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
                            <th>Builder</th>
                            <th>Preview</th>
                            @if(Auth::check() && in_array(Auth::user()->role, [1, 2,4]))
                            <th>Published</th>
                            <th>Featured</th>
                        @endif
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)

                                <tr data-company-id="{{ is_array($project->company_id) ? implode(',', $project->company_id) : $project->company_id }}">

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $project->name ?? '' }}<br>&nbsp;-{{ $project->project_type ?? '' }}</td>
                      <td>


    @if($project->company()->count())
        @foreach($project->company() as $company) <!-- Ensure to call get() to retrieve the companies -->
            {{ $company->name }}{{ !$loop->last ? ', ' : '' }} <!-- Display the company names separated by commas -->
        @endforeach
    @else
        No Companies Assigned
    @endif
</td>
                                <td align="center">
                                    <a href="{{ URL::to('project/'.$project->slug) }}" class="no-button" target="_blank" title="Preview Project">

                                        <img src="https://i.imgur.com/7rkMFI0.png" width=20/>
                                    </a>
                                    <!--<button onclick="copyToClipboard('{{ URL::to('project/'.$project->slug) }}', {{ $loop->iteration }})" class="no-button" title="Copy Link">-->
                                    <!--    <i class="fas fa-copy"></i>-->
                                    <!--</button>-->
                                    <!--<span class="copy-message" id="message-{{ $loop->iteration }}">Copied!</span>-->
                                </td>



                                @if(Auth::check() && in_array(Auth::user()->role, [1, 2, 4]))
    <td align="center">
        <div class="form-check form-switch d-flex justify-content-center">
            <!-- Check if the status is 'published', and set the checkbox accordingly -->
            <input class="form-check-input toggle-approval" type="checkbox" id="toggle-{{ $project->id }}" {{ $project->status === 'published' ? 'checked' : '' }} data-id="{{ $project->id }}">
            <label class="form-check-label" for="toggle-{{ $project->id }}">
                {{ $project->status === 'published' ? '' : '' }}
            </label>
        </div>
    </td>
@endif



                                @if(Auth::check() && in_array(Auth::user()->role, [1, 2,4]))
                                <td align="center">
                                    <div class="form-check form-switch d-flex justify-content-center">
                                        <input class="form-check-input toggle-featured" type="checkbox" id="featured-{{ $project->id }}" {{ $project->is_featured ? 'checked' : '' }} data-id="{{ $project->id }}">
                                        <label class="form-check-label" for="featured-{{ $project->id }}">
                                            {{ $project->is_featured ? '' : '' }}
                                        </label>
                                    </div>
                                </td>
                                @endif
                                <td align="right">
                                    <a href="{{ route('projects.edit', $project->id) }}" class="no-button" title="Edit">

                                        <img src="https://i.imgur.com/Oy59BAN.png" width=16/>

                                    </a>
                                    &nbsp;
                                    <a href="{{ route('unit_configurations.index', ['projectID' => $project->id]) }}" class="no-button" title="Units Config">
                                        <img src="https://i.imgur.com/QTHxvFs.png" width=16/>
                                    </a>
&nbsp;
                                    <a href="{{ route('elevation_pictures.index', ['projectID' => $project->id]) }}" class="no-button ml-1" title="Elevation Pictures">

                                        <img src="https://i.imgur.com/z2SYxLH.png" width=16/>


                                    </a>
                                    &nbsp;
                                       <!-- Other icons -->
    <a href="{{ route('amenities.show', $project->id) }}" class="no-button" alt="Amenities"  title="Amenities" id="amenities-icon-{{ $project->id }}">

        <img src="https://i.imgur.com/3RwcFOk.png" width=20/>
    </a>
    &nbsp;                                 <!-- Other icons -->
    <a href="{{ route('projects.editCollections', $project->id) }}" class="no-button" alt="Collections"  title="Collections" id="collections-icon-{{ $project->id }}">

        <img src="https://i.imgur.com/MuCPL1S.png" width=24/>
    </a>
    &nbsp;
        <a href="{{ route('projects.editBadges', $project->id) }}" class="no-button" alt="Badges"  title="Badges" id="badges-icon-{{ $project->id }}">

       <img src="https://i.imgur.com/NdMSUey.png" width=20/>

    </a>
    &nbsp;
    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="delete-form" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="no-button" title="Delete">

            <img src="https://i.imgur.com/wWbe0EQ.png" width=15/>
        </button>
    </form>





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
    // Assuming project.company_name is now a string of company names separated by commas
    table.row.add([
        index + 1,
        project.name + '<br>&nbsp;-' + project.project_type,
        project.company_name || 'No Companies Assigned', // Handle case where there are no companies
        '<a href="' + project.preview_url + '" class="no-button" target="_blank" title="Preview Project"><i class="fas fa-link"></i></a>' +
        // '<button onclick="copyToClipboard(\'' + project.preview_url + '\', ' + (index + 1) + ')" class="no-button" title="Copy Link"><i class="fas fa-copy"></i></button>' +
        // '<span class="copy-message" id="message-' + (index + 1) + '">Copied!</span>',
        project.status === 'published'
            ? '<div class="form-check form-switch">' +
                '<input class="form-check-input toggle-approval" type="checkbox" id="toggle-' + project.id + '" checked data-id="' + project.id + '">' +
                '<label class="form-check-label" for="toggle-' + project.id + '"></label>' +
              '</div>'
            : '<div class="form-check form-switch">' +
                '<input class="form-check-input toggle-approval" type="checkbox" id="toggle-' + project.id + '" data-id="' + project.id + '">' +
                '<label class="form-check-label" for="toggle-' + project.id + '"></label>' +
              '</div>',
        project.is_featured
            ? '<div class="form-check form-switch"><input class="form-check-input toggle-featured" type="checkbox" id="featured-' + project.id + '" checked data-id="' + project.id + '"><label class="form-check-label" for="featured-' + project.id + '"></label></div>'
            : '<div class="form-check form-switch"><input class="form-check-input toggle-featured" type="checkbox" id="featured-' + project.id + '" data-id="' + project.id + '"><label class="form-check-label" for="featured-' + project.id + '"></label></div>',
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
            var isApproved = $(this).is(':checked') ? 'published' : 'in_review';
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
