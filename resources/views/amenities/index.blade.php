@extends('layouts.app')

@section('content')
<div class="row">
    @if($amenities->isEmpty())
        <div class="alert alert-info">
            No amenities found. <a href="{{ route('amenities.create') }}"><u>Create an Amenity</u></a>
        </div>
    @else
        @php
            $categories = $amenities->groupBy('category');
        @endphp

        @foreach($categories as $category => $amenitiesGroup)
            <div class="col-12 mb-4">
                <h4>{{ ucfirst($category) }} Amenities</h4>
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Amenity Name</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($amenitiesGroup as $index => $amenity)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td class="text-center">
                                @if(isset($amenity->icon) && File::exists(env('APP_STORAGE').''.$amenity->icon))
                                    <img src="{{ URL::to(env('APP_STORAGE').''.$amenity->icon) }}" alt="{{ $amenity->name }}" class="img-fluid rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="bg-secondary text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px; font-size: 12px;">
                                        No Icon
                                    </div>
                                @endif
                            </td>
                            <td>{{ $amenity->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('amenities.edit', $amenity->id) }}" class="btn btn-sm btn-link text-danger" title="Edit">
                                    <i class="{{ config('constants.icons.edit') }}"></i>
                                </a>
                                <form action="{{ route('amenities.destroy', $amenity->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-link text-danger" title="Delete">
                                        <i class="{{ config('constants.icons.delete') }}"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    @endif
</div>
@endsection
