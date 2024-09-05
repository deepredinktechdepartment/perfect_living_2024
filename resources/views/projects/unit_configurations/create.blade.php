@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="bg-white p-4 rounded shadow-sm">
            <form method="POST" action="{{ route('unit_configurations.store') }}">
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
                    <label for="beds" class="form-label">Beds</label>
                    <input id="beds" type="number" class="form-control @error('beds') is-invalid @enderror" name="beds" value="{{ old('beds') }}" required>
                    @error('beds')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="baths" class="form-label">Baths</label>
                    <input id="baths" type="number" class="form-control @error('baths') is-invalid @enderror" name="baths" value="{{ old('baths') }}" required>
                    @error('baths')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="balconies" class="form-label">Balconies</label>
                    <input id="balconies" type="number" class="form-control @error('balconies') is-invalid @enderror" name="balconies" value="{{ old('balconies') }}" required>
                    @error('balconies')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="facing" class="form-label">Facing</label>
                    <input id="facing" type="text" class="form-control @error('facing') is-invalid @enderror" name="facing" value="{{ old('facing') }}" required>
                    @error('facing')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="unit_size" class="form-label">Unit Size (sq.ft)</label>
                    <input id="unit_size" type="number" class="form-control @error('unit_size') is-invalid @enderror" name="unit_size" value="{{ old('unit_size') }}" step="0.01" required>
                    @error('unit_size')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="floor_plan" class="form-label">Floor Plan</label>
                    <input id="floor_plan" type="text" class="form-control @error('floor_plan') is-invalid @enderror" name="floor_plan" value="{{ old('floor_plan') }}" required>
                    @error('floor_plan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save Unit Configuration</button>
            </form>
        </div>
    </div>
</div>
@endsection
