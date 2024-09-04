@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            @if($cities->isEmpty())
                <div class="alert alert-info">
                    No cities found. <a href="{{ route('city-masters.create') }}"><u>Create a City</u></a>
                </div>
            @else
            <div class="card shadow-sm rounded">
                <div class="card-body">
            <div class="table-responsive">
                        <table class="table table-bordered mt-3 bg-white" id="cities">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cities as $city)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $city->name }}</td>
                                    <td>
                                        <a href="{{ route('city-masters.edit', $city->id) }}" class="btn btn-link text-warning" title="Edit">
                                            <i class="{{ config('constants.icons.edit') }}"></i>
                                        </a>
                                        <form action="{{ route('city-masters.destroy', $city->id) }}" method="POST" class="delete-form d-inline" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-danger" title="Delete">
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
