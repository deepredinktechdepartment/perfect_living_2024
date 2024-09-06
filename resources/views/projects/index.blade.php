@extends('layouts.app')
@section('title', 'Projects List')
@section('content')

        <div class="card shadow-sm rounded">
            <div class="card-body">
        <div class="table-responsive">
                    <table class="table table-bordered mt-3 bg-white" id="projects">
            <thead class="table-dark">
                <tr>
                    <th>S.No.</th>
                    <th>Name</th>
                    <th>Company</th>
                    {{-- <th>Logo</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $project->name??'' }}<br>&nbsp;-{{ $project->project_type??'' }}</td>

                        <td>{{ $project->company->name ?? '' }}</td>
                        {{-- <td>


                            @if(isset($project->logo) && File::exists(env('APP_STORAGE').''.$project->logo))
                            <img src="{{ URL::to(env('APP_STORAGE').''.$project->logo) }}" alt="{{ $project->name??'' }}" class="card-img-top" style="height: 80px; object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white rounded-circle d-flex justify-content-center align-items-center" style="height: 80px; object-fit: cover;">
                                <span>No Icon</span>
                            </div>
                        @endif


                        </td> --}}
                        <td>
                            <a href="{{ route('projects.edit', $project->id) }}" class="no-button"> <i class="{{ config('constants.icons.edit') }}"></i></a>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="delete-form" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="no-button"> <i class="{{ config('constants.icons.delete') }}"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    </div>

@endsection
@push('scripts')

@endpush
