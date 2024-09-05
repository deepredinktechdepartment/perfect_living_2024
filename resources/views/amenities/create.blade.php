@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="bg-white p-4 rounded shadow-sm">
            <form method="POST" action="{{ isset($amenity) ? route('amenities.update', $amenity->id) : route('amenities.store') }}">
                @csrf
                @if(isset($amenity))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="name" class="form-label">Amenity Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $amenity->name ?? '') }}" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    {{ isset($amenity) ? 'Update' : 'Create' }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
    $(document).ready(function() {
        $('form').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                }
            },
            messages: {
                name: {
                    required: "Please enter the amenity name",
                    minlength: "The amenity name must be at least 2 characters long"
                }
            }
        });
    });
    </script>


@endpush