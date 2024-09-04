@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if($companies->isEmpty())
            <div class="alert alert-info">
                No companies found. <a href="{{ route('companies.create') }}"><u>Create a Company</u></a>
            </div>
        @else

        <div class="card shadow-sm rounded">
            <div class="card-body">
        <div class="table-responsive">
                    <table class="table table-bordered mt-3 bg-white" id="companies">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Website URL</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->phone }}</td>
                                    <td><a href="{{ $company->website_url }}" target="_blank">{{ $company->website_url }}</a></td>
                                    <td>
                                        <!-- Edit Icon -->
                                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-link" title="Edit">
                                            <i class="{{ config('constants.icons.edit') }}"></i>
                                        </a>
                                        <!-- Delete Icon -->
                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="delete-form" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="no-button" title="Delete">
                                                <i class="{{ config('constants.icons.delete') }}"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')

@endpush
