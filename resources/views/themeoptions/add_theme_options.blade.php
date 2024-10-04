@extends('layouts.app')

@section('content')
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <form id="themeOptionsForm" method="POST" action="{{ url('theme_options/update/'.Crypt::encrypt($theme_options_data->id)) }}" enctype="multipart/form-data">
                        @csrf
                        @if(isset($theme_options_data->id))
                        <input type="hidden" name="id" value="{{ Crypt::encrypt($theme_options_data->id) }}">
                        @endif

                        <!-- Header Logo -->
                        <div class="form-group">
                            <label>Header Logo<span class="imp_str">*</span></label>
                            <input type="file" name="header_logo" class="form-control file-input"
                                @if(!isset($theme_options_data->header_logo)) required @endif />
                        </div>

                        @if(isset($theme_options_data->header_logo) && file_exists(storage_path('app/uploads/' . basename($theme_options_data->header_logo))))
                        <img src="{{ URL::to($theme_options_data->header_logo) }}" width="100" />
                        @endif

                        <!-- Favicon -->
                        <div class="form-group mt-2">
                            <label>Favicon</label>
                            <input type="file" name="favicon" class="form-control file-input"
                                @if(!isset($theme_options_data->favicon)) required @endif />
                        </div>

                        @if(isset($theme_options_data->favicon) && file_exists(storage_path('app/uploads/' . basename($theme_options_data->favicon))))
                        <img src="{{ URL::to($theme_options_data->favicon) }}" />
                        @endif

                        <!-- Footer Icon -->
                        <div class="form-group mt-2">
                            <label>Footer Icon</label>
                            <input type="file" name="footer_logo" class="form-control file-input"
                                @if(!isset($theme_options_data->footer_logo)) required @endif />
                        </div>

                        @if(isset($theme_options_data->footer_logo) && file_exists(storage_path('app/uploads/' . basename($theme_options_data->footer_logo))))
                        <img src="{{ URL::to($theme_options_data->footer_logo) }}" width="50" />
                        @endif

                        <!-- Copyright Description -->
                        <div class="form-group">
                            <label>Copyright Description</label>
                            <input type="text" name="copyright" id="title" class="form-control" value="{{ isset($theme_options_data->id) ? $theme_options_data->copyright : old('copyright') }}">
                        </div>

                        <!-- Social Media URLs -->
                        @foreach (['facebook', 'twitter', 'linkedin', 'instagram', 'pinterest', 'youtube', 'whatsapp'] as $platform)
                        <div class="form-group">
                            <label for="{{ $platform }}_url">{{ ucfirst($platform) }} URL</label>
                            <input type="text" name="{{ $platform }}_url" id="{{ $platform }}_url" class="form-control" value="{{ old($platform . '_url', $theme_options_data->{$platform . '_url'} ?? '') }}">
                        </div>
                        @endforeach

                        <div class="form-group">
                            <label for="short_aboutus">Short About Us</label>
                            <input type="text" name="short_aboutus" id="short_aboutus" class="form-control" maxlength="255" value="{{ old('short_aboutus', $theme_options_data->short_aboutus ?? '') }}">
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-4">
                            <button type="submit" class="btn bg-custom-btn mt-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->
</div>

<!-- jQuery Validation Script -->
<script>
    $(document).ready(function () {
        // Custom method to validate file size
        $.validator.addMethod("filesize", function (value, element, param) {
            var fileInput = $(element);
            if (fileInput[0].files.length > 0) {
                var fileSize = fileInput[0].files[0].size; // File size in bytes
                return this.optional(element) || (fileSize <= param); // Check file size
            }
            return true; // If no file is selected, skip validation
        });

        // Initialize jQuery Validation
        $("#themeOptionsForm").validate({
            rules: {
                header_logo: {
                    required: function() {
                        return !{{ isset($theme_options_data->header_logo) ? 'true' : 'false' }};
                    },
                    extension: "jpg|jpeg|png|gif",
                    filesize: 512000 // 512 KB
                },
                favicon: {
                    required: function() {
                        return !{{ isset($theme_options_data->favicon) ? 'true' : 'false' }};
                    },
                    extension: "ico|png|jpg|jpeg",
                    filesize: 512000 // 512 KB
                },
                footer_logo: {
                    required: function() {
                        return !{{ isset($theme_options_data->footer_logo) ? 'true' : 'false' }};
                    },
                    extension: "ico|png|jpg|jpeg",
                    filesize: 512000 // 512 KB
                },
                copyright: {
                    required: true,
                    minlength: 5
                },
                facebook_url: {
                    url: true
                },
                twitter_url: {
                    url: true
                },
                linkedin_url: {
                    url: true
                },
                instagram_url: {
                    url: true
                },
                pinterest_url: {
                    url: true
                },
                youtube_url: {
                    url: true
                },
                whatsapp_url: {
                    url: true
                },
                short_aboutus: {
                    maxlength: 255
                }
            },
            messages: {
                header_logo: {
                    required: "Please upload a header logo",
                    extension: "Please upload a valid image file (jpg, jpeg, png, gif)",
                    filesize: "File size must be less than 512 KB"
                },
                favicon: {
                    required: "Please upload a favicon",
                    extension: "Please upload a valid file (ico, png, jpg, jpeg)",
                    filesize: "File size must be less than 512 KB"
                },
                footer_logo: {
                    required: "Please upload a footer icon",
                    extension: "Please upload a valid file (ico, png, jpg, jpeg)",
                    filesize: "File size must be less than 512 KB"
                },
                copyright: {
                    required: "Please enter a copyright description",
                    minlength: "Your copyright description must be at least 5 characters long"
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
@endsection
