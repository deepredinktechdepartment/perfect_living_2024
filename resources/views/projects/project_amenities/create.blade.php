@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="bg-white p-4 rounded shadow-sm">
            <form method="POST" action="{{ route('project_amenities.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="project_id" class="form-label">Project</label>
                    <select id="project_id" name="project_id" class="form-select @error('project_id') is-invalid @enderror" required>
                        <!-- Populate options dynamically -->
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                    @error('project_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="amenity_name" class="form-label">Amenity Name</label>
                    <input id="amenity_name" type="text" class="form-control @error('amenity_name') is-invalid @enderror" name="amenity_name" value="{{ old('amenity_name') }}" required>
                    @error('amenity_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required>
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save Amenity</button>
            </form>
        </div>
    </div>
</div>
@endsection
