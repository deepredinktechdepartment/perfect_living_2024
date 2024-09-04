@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card shadow-sm">
                        @if(isset($theme_options_data->id))
                        <div class="card-header d-flex justify-content-end align-items-center">
                            <a href="{{ url('theme_options/edit/'.Crypt::encrypt($theme_options_data->id) ?? 0) }}" class="btn btn-link" title="Edit">
                                {!! Config::get('constants.EditIcon') !!}
                            </a>
                        </div>


                        <div class="card-body">
                            <!-- Header Logo -->
                            <div class="mb-4">
                                <h5 class="mb-2">Header Logo</h5>
                                @if(isset($theme_options_data->header_logo) && file_exists(storage_path('app/uploads/' . basename($theme_options_data->header_logo))))
                                    <img src="{{ URL::to($theme_options_data->header_logo) }}" class="img-fluid" alt="Header Logo" style="max-width: 100px;">
                                @else
                                    <p>No header logo available.</p>
                                @endif
                            </div>

                            <!-- Favicon -->
                            <div class="mb-4">
                                <h5 class="mb-2">Favicon</h5>
                                @if(isset($theme_options_data->favicon) && file_exists(storage_path('app/uploads/' . basename($theme_options_data->favicon))))
                                    <img src="{{ URL::to($theme_options_data->favicon) }}" class="img-fluid" alt="Favicon" style="max-width: 50px;">
                                @else
                                    <p>No favicon available.</p>
                                @endif
                            </div>

                            <!-- Footer Logo -->
                            <div class="mb-4">
                                <h5 class="mb-2">Footer Logo</h5>
                                @if(isset($theme_options_data->footer_logo) && file_exists(storage_path('app/uploads/' . basename($theme_options_data->footer_logo))))
                                    <img src="{{ URL::to($theme_options_data->footer_logo) }}" class="img-fluid" alt="Footer Logo" style="max-width: 100px;">
                                @else
                                    <p>No footer logo available.</p>
                                @endif
                            </div>

                            <!-- Copyright -->
                            <div class="mb-4">
                                <h5 class="mb-2">Copyright</h5>
                                @if(isset($theme_options_data->copyright) && !empty($theme_options_data->copyright))
                                    <p>{{ $theme_options_data->copyright }}</p>
                                @else
                                    <p>No copyright information available.</p>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
</div>
@endsection

@push('styles')
<style>
    .card-title {
        font-size: 1.25rem;
        font-weight: 500;
    }

    .card-header {
        background-color: #f8f9fa;
    }

    .card-body img {
        border: 1px solid #ddd;
        border-radius: 0.375rem;
    }

    .mb-4 {
        margin-bottom: 1.5rem;
    }
</style>
@endpush
