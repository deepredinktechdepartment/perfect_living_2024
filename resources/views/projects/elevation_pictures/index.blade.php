@extends('layouts.app')

@section('content')

<!-- Check if there are any pictures -->
@if($pictures->isEmpty())
    <div class="alert alert-info">
        <p>No elevation pictures found for this project. <a href="{{ route('elevation_pictures.create', ['projectID' => $project->id]) }}"><u>Add a Picture</u></a></p>
    </div>
@else
    <!-- Card-based layout to display pictures -->
    <div class="row">
        @foreach($pictures as $picture)
            <div class="col-md-2 mb-4">
                <div class="card shadow-sm">

                    @if(isset($picture->file_path) && File::exists(env('APP_STORAGE').''.$picture->file_path))
                        <img src="{{ URL::to(env('APP_STORAGE').''.$picture->file_path) }}" class="card-img-top" alt="{{ $picture->file_path }}" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/default-placeholder.png') }}" class="card-img-top" alt="No image available" style="height: 200px; object-fit: cover;">
                    @endif

                    <div class="card-body">
                        {{-- <h5 class="card-title">{{ $picture->title }}</h5> --}}
                        <p class="card-text text-center">{{ $picture->title }}</p>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('elevation_pictures.edit', [$project->id, $picture->id]) }}" class="no-button">
                                <i class="{{ config('constants.icons.edit') }}"></i>
                            </a>

                            <form action="{{ route('elevation_pictures.destroy', [$project->id, $picture->id]) }}" method="POST" class="delete-form" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="no-button"><i class="{{ config('constants.icons.delete') }}"></i></button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection
