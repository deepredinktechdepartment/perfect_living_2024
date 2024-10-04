@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-12">
        <form action="{{ isset($collection) ? route('customcollections.update', $collection->id) : route('customcollections.store') }}" method="POST">
            @csrf
            @if(isset($collection))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Collection Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ isset($collection) ? $collection->name : '' }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Select Projects</label>
                <div class="form-check">
                    @foreach($projects as $project)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="projects[]" value="{{ $project->id }}" id="project{{ $project->id }}"
                                @if(isset($collection) && $collection->projects->contains($project->id)) checked @endif>
                            <label class="form-check-label" for="project{{ $project->id }}">
                                {{ $project->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-success">
                {{ isset($collection) ? 'Update Collection' : 'Create Collection' }}
            </button>
        </form>
    </div>
</div>

</div>
@endsection