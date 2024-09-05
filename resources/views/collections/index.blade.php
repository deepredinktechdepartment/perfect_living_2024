@extends('layouts.app')

@section('content')
<div class="row">
    @if($collections->isEmpty())
        <div class="col-lg-12">
            <div class="alert alert-info">
                No collections found. <a href="{{ route('collections.create') }}"><u>Create a Collection</u></a>
            </div>
        </div>
    @else
        @foreach($collections as $collection)
            <div class="col-lg-3 col-md-3 col-sm-3 mb-4">
                <div class="card shadow-sm rounded" style="width: 100%; max-width: 250px;">

                    @if(isset($collection->background_image) && File::exists(env('APP_STORAGE').''.$collection->background_image))
                        <img src="{{ URL::to(env('APP_STORAGE').''.$collection->background_image) }}" class="card-img-top" alt="{{ $collection->name }}" style="height: 150px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/250x150.png?text=No+Image" class="card-img-top" alt="Placeholder" style="height: 150px; object-fit: cover;">
                    @endif
                    <div class="card-body p-2">
                        <h6 class="card-title text-truncate" style="font-size: 0.9rem;">{{ $collection->name }}</h6>
                    </div>
                    <div class="card-footer text-muted p-1 d-flex justify-content-between align-items-center">
                        <a href="{{ route('collections.edit', $collection->id) }}" class="btn btn-link btn-sm" title="Edit">
                            <i class="{{ config('constants.icons.edit') }}"></i>
                        </a>
                        @if($collection->target_link)
                            <a href="{{ $collection->target_link }}" target="_blank" class="btn btn-link btn-sm" title="Visit Link">
                                <i class="{{ config('constants.icons.link') }}"></i>
                            </a>
                        @endif
                        <form action="{{ route('collections.destroy', $collection->id) }}" method="POST" class="delete-form d-inline">
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
