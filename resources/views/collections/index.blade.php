@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if($collections->isEmpty())
            <div class="alert alert-info">
                No collections found. <a href="{{ route('collections.create') }}"><u>Create a Collection</u></a>
            </div>
        @else
        <div class="card shadow-sm rounded">
            <div class="card-body">
        <div class="table-responsive">
                <table class="table table-bordered mt-3 bg-white" id="collections">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($collections as $collection)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $collection->name }}</td>
                                <td>
                                    <a href="{{ route('collections.edit', $collection->id) }}" class="btn btn-link" title="Edit">
                                        <i class="{{ config('constants.icons.edit') }}"></i>
                                    </a>
                                    <form action="{{ route('collections.destroy', $collection->id) }}" method="POST" class="delete-form" style="display:inline;">
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
