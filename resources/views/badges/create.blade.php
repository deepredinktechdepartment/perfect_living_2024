@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="bg-white p-4 rounded shadow-sm">
            <h4 class="mb-4">{{ $pageTitle }}</h4>

            <form method="POST" action="{{ isset($badge) ? route('badges.update', $badge->id) : route('badges.store') }}">
                @csrf
                @if(isset($badge))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="name" class="form-label">Badge Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $badge->name ?? '') }}" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    {{ isset($badge) ? 'Update' : 'Create' }}
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
                    required: "Please enter the badge name",
                    minlength: "The badge name must be at least 2 characters long"
                }
            }
        });
    });
    </script>


@endpush
