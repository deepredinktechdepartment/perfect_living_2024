@extends('layouts.app')

@section('content')
<div class="row">
    @if($amenities->isEmpty())
        <div class="alert alert-info">
            No amenities found. <a href="{{ route('amenities.create') }}"><u>Create an Amenity</u></a>
        </div>
    @else
        @foreach($amenities as $amenity)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card border-light shadow-sm rounded h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">

                            @if(isset($amenity->icon) && File::exists(env('APP_STORAGE').''.$amenity->icon))
                                <img src="{{ URL::to(env('APP_STORAGE').''.$amenity->icon) }}" alt="{{ $amenity->name }}" class="img-fluid rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <div class="bg-secondary text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px; font-size: 24px;">
                                    <span>No Icon</span>
                                </div>
                            @endif
                        </div>

                        <div class="card-body p-2">
                            <h6 class="card-title text-truncate" style="font-size: 0.9rem;">{{ $amenity->name }}</h6>
                        </div>
                    </div>

                    <div class="card-footer text-muted p-1 d-flex justify-content-between align-items-center">
                        <a href="{{ route('amenities.edit', $amenity->id) }}" class="btn btn-link text-danger btn-sm" title="Edit">
                            <i class="{{ config('constants.icons.edit') }}"></i>
                        </a>
                        <form action="{{ route('amenities.destroy', $amenity->id) }}" method="POST" class="delete-form d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger btn-sm" title="Delete">
                                <i class="{{ config('constants.icons.delete') }}"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
