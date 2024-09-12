@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="bg-white p-4 rounded shadow-sm">
            <h4 class="mb-4">{{ $pageTitle }}</h4>

            <form id="cityForm" method="POST" action="{{ isset($city) ? route('city-masters.update', $city->id) : route('city-masters.store') }}">
                @csrf
                @if(isset($city))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="name" class="form-label">City Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $city->name ?? '') }}" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn bg-custom-btn">
                    {{ isset($city) ? 'Update' : 'Create' }}
                </button>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $("#cityForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 2,
                maxlength: 255
            }
        },
        messages: {
            name: {
                required: "Please enter the city name.",
                minlength: "City name must be at least 2 characters long.",
                maxlength: "City name cannot exceed 255 characters."
            }
        },
        errorElement: 'div',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            error.insertAfter(element);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        }
    });
});
</script>
@endpush
