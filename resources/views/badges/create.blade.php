@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="bg-white p-4 rounded shadow-sm">

            <form method="POST" action="{{ isset($badge) ? route('badges.update', $badge->id) : route('badges.store') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($badge))
                    @method('PUT')
                @endif

                <div class="mb-0">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $badge->name ?? '') }}" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="icon" class="form-label">Icon (PNG, JPG)</label>
                    <input id="icon" type="file" class="form-control @error('icon') is-invalid @enderror" name="icon">
                    @error('icon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    @if(isset($badge->icon) && File::exists(env('APP_STORAGE').'icons/'.$badge->icon))
                        <img src="{{ URL::to(env('APP_STORAGE').'icons/'.$badge->icon) }}" class="mt-2" alt="Client Logo" style="width: 50px; height: auto;">
                    @endif
                </div>

                <button type="submit" class="btn bg-custom-btn">
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
                },
                icon: {
                    required: {{ isset($badge) ? 'false' : 'true' }},
                    extension: "png|jpg|jpeg",
                    filesize: 524288 // 512KB in bytes
                }
            },
            messages: {
                name: {
                    required: "Please enter the badge name",
                    minlength: "The badge name must be at least 2 characters long"
                },
                icon: {
                    required: "Please upload a badge icon",
                    extension: "Only PNG and JPG files are allowed",
                    filesize: "The file size must be less than 512KB"
                }
            }
        });

        // Custom validator for file size
        $.validator.addMethod('filesize', function(value, element, param) {
            return this.optional(element) || (element.files[0].size <= param);
        }, 'The file size must be less than 512KB');
    });
</script>
@endpush
