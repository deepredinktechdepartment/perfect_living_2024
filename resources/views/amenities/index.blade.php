@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if($amenities->isEmpty())
            <div class="alert alert-info">
                No amenities found. <a href="{{ route('amenities.create') }}"><u>Create an Amenity</u></a>
            </div>
        @else
                <div class="card shadow-sm rounded">
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered mt-3 bg-white" id="amenities">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($amenities as $amenity)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $amenity->name }}</td>
                                <td>
                                    <a href="{{ route('amenities.edit', $amenity->id) }}" class="btn btn-link" title="Edit">
                                        <i class="{{ config('constants.icons.edit') }}"></i>
                                    </a>
                                    <form action="{{ route('amenities.destroy', $amenity->id) }}" method="POST" class="delete-form" style="display:inline;">
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
