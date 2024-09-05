@extends('layouts.app')

@section('content')
<div class="row">
    @if($badges->isEmpty())
        <div class="alert alert-info">
            No badges found. <a href="{{ route('badges.create') }}"><u>Create a Badge</u></a>
        </div>
    @else
        @foreach($badges as $badge)
            <div class="col-lg-3 col-md-3 col-sm-3 mb-4">

                    <div class="card shadow-sm rounded" style="width: 100%; max-width: 250px;">

                            @if(isset($badge->icon) && File::exists(env('APP_STORAGE').'icons/'.$badge->icon))
                                <img src="{{ URL::to(env('APP_STORAGE').'icons/'.$badge->icon) }}" alt="{{ $badge->name }}" class="card-img-top" style="height: 80px; object-fit: cover;">
                            @else
                                <div class="bg-secondary text-white rounded-circle d-flex justify-content-center align-items-center" style="height: 80px; object-fit: cover;">
                                    <span>No Icon</span>
                                </div>
                            @endif


                        <div class="card-body p-2">
                            <h6 class="card-title text-truncate" style="font-size: 0.9rem;">{{ $badge->name }}</h6>
                        </div>


                    <div class="card-footer text-muted p-1 d-flex justify-content-between align-items-center">
                        <a href="{{ route('badges.edit', $badge->id) }}" class="btn btn-link btn-sm" title="Edit">
                            <i class="{{ config('constants.icons.edit') }}"></i>
                        </a>
                        <form action="{{ route('badges.destroy', $badge->id) }}" method="POST" class="delete-form" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link btn-sm" title="Delete">
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
