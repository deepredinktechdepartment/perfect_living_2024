@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="bg-white p-4 rounded shadow-sm">


            <form method="POST" action="{{ isset($collection) ? route('collections.update', $collection->id) : route('collections.store') }}">
                @csrf
                @if(isset($collection))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="name" class="form-label">Collection Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $collection->name ?? '') }}" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    {{ isset($collection) ? 'Update' : 'Create' }}
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
                    required: "Please enter the collection name",
                    minlength: "The collection name must be at least 2 characters long"
                }
            }
        });
    });
    </script>

@endpush