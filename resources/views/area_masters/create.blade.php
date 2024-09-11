@extends('layouts.app')
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="bg-white p-4 rounded shadow-sm">


            <form method="POST" action="{{ isset($area) ? route('area-masters.update', $area->id) : route('area-masters.store') }}">
                @csrf
                @if(isset($area))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $area->name ?? '') }}" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="city_id" class="form-label">City</label>
                    <select id="city_id" class="form-select @error('city_id') is-invalid @enderror" name="city_id" required>
                        <option value="" disabled selected>Select a city</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ isset($area) && $area->city_id == $city->id ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('city_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn bg-persian-green">
                    {{ isset($area) ? 'Update' : 'Create' }}
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
                    required: "Please enter the area master name",
                    minlength: "The area master name must be at least 2 characters long"
                }
            }
        });
    });
    </script>


@endpush