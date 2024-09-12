@extends('layouts.app')

@section('content')
<div class="row justify-content-left">
    <div class="col-md-6">
        <div class="card">


            <div class="card-body">
                <form method="POST" action="{{ isset($company) ? route('companies.update', $company->id) : route('companies.store') }}">
                    @csrf
                    @if(isset($company))
                        @method('PUT')
                    @endif

                    <div class="mb-0">
                        <label for="name" class="form-label">Company Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $company->name ?? '') }}" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-0">
                        <label for="address1" class="form-label">Address 1</label>
                        <input id="address1" type="text" class="form-control @error('address1') is-invalid @enderror" name="address1" value="{{ old('address1', $company->address1 ?? '') }}" required>
                        @error('address1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-0">
                        <label for="address2" class="form-label">Address 2 (Optional)</label>
                        <input id="address2" type="text" class="form-control @error('address2') is-invalid @enderror" name="address2" value="{{ old('address2', $company->address2 ?? '') }}">
                        @error('address2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-0">
                        <label for="phone" class="form-label">Phone</label>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $company->phone ?? '') }}" required>
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-0">
                        <label for="website_url" class="form-label">Website URL</label>
                        <input id="website_url" type="url" class="form-control @error('website_url') is-invalid @enderror" name="website_url" value="{{ old('website_url', $company->website_url ?? '') }}" required>
                        @error('website_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="about_builder" class="form-label">About The Builder</label>
                            <textarea id="about_builder" class="form-control @error('about_builder') is-invalid @enderror" name="about_builder">{{ old('about_builder', $company->about_builder ?? '') }}</textarea>
                            @error('about_builder')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn bg-custom-btn">
                            {{ isset($company) ? 'Update Company' : 'Create Company' }}
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    $('form').validate({
        rules: {
            name: {
                required: true
            },
            address1: {
                required: true
            },
            phone: {
                required: true
            },
            website_url: {
                required: true,
                url: true
            }
        },
        messages: {
            name: {
                required: "Please enter the company name"
            },
            address1: {
                required: "Please enter the address"
            },
            phone: {
                required: "Please enter the phone number"
            },
            website_url: {
                required: "Please enter the website URL",
                url: "Please enter a valid URL"
            }
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.mb-0').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        }
    });
});
</script>
@endpush
