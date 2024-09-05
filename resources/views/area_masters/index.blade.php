@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if($areas->isEmpty())
            <div class="alert alert-info">
                No area masters found. <a href="{{ route('area-masters.create') }}"><u>Create an Area Master</u></a>
            </div>
        @else
        <div class="card shadow-sm rounded">
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mt-3 bg-white" id="areas">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Area Name</th>
                            <th>City Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($areas as $area)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $area->name }}</td>
                                <td>{{ $area->city->name }}</td> <!-- Access city name through the relationship -->
                                <td>
                                    <!-- Edit Icon -->
                                    <a href="{{ route('area-masters.edit', $area->id) }}" class="btn btn-link" title="Edit">
                                        <i class="{{ config('constants.icons.edit') }}"></i>
                                    </a>
                                    <!-- Delete Icon -->
                                    <form action="{{ route('area-masters.destroy', $area->id) }}" method="POST" class="delete-form" style="display:inline;">
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
