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
                        <img src="{{ URL::to($theme_options_data->header_logo) }}" width="100"  />
                        @endif

                        <!-- Favicon -->
                        <div class="form-group mt-2">
                            <label>Favicon</label>
                            <input type="file" name="favicon" class="form-control file-input"
                                @if(!isset($theme_options_data->favicon)) required @endif />
                        </div>

                        @if(isset($theme_options_data->favicon) && file_exists(storage_path('app/uploads/' . basename($theme_options_data->favicon))))
                        <img src="{{ URL::to($theme_options_data->favicon) }}"  />
                        @endif

                        <!-- Footer Icon -->
                        <div class="form-group mt-2">
                            <label>Footer Icon</label>
                            <input type="file" name="footer_logo" class="form-control file-input"
                                @if(!isset($theme_options_data->footer_logo)) required @endif />
                        </div>

                        @if(isset($theme_options_data->footer_logo) && file_exists(storage_path('app/uploads/' . basename($theme_options_data->footer_logo))))
                        <img src="{{ URL::to($theme_options_data->footer_logo) }}" width="50"  />
                        @endif

                    <!-- Copyright Description -->
            <div class="form-group">
                <label>Copyright Description</label>
                <input type="text" name="copyright" id="title" class="form-control" value="{{ isset($theme_options_data->id) ? $theme_options_data->copyright : old('copyright') }}">
            </div>


            <div class="form-group">
                <label for="facebook_url">Facebook URL</label>
                <input type="text" name="facebook_url" id="facebook_url" class="form-control" value="{{ old('facebook_url', $theme_options_data->facebook_url ?? '') }}">
            </div>

            <div class="form-group">
                <label for="twitter_url">Twitter URL</label>
                <input type="text" name="twitter_url" id="twitter_url" class="form-control" value="{{ old('twitter_url', $theme_options_data->twitter_url ?? '') }}">
            </div>

            <div class="form-group">
                <label for="linkedin_url">LinkedIn URL</label>
                <input type="text" name="linkedin_url" id="linkedin_url" class="form-control" value="{{ old('linkedin_url', $theme_options_data->linkedin_url ?? '') }}">
            </div>

            <div class="form-group">
                <label for="instagram_url">Instagram URL</label>
                <input type="text" name="instagram_url" id="instagram_url" class="form-control" value="{{ old('instagram_url', $theme_options_data->instagram_url ?? '') }}">
            </div>

            <div class="form-group">
                <label for="pinterest_url">Pinterest URL</label>
                <input type="text" name="pinterest_url" id="pinterest_url" class="form-control" value="{{ old('pinterest_url', $theme_options_data->pinterest_url ?? '') }}">
            </div>

            <div class="form-group">
                <label for="youtube_url">YouTube URL</label>
                <input type="text" name="youtube_url" id="youtube_url" class="form-control" value="{{ old('youtube_url', $theme_options_data->youtube_url ?? '') }}">
            </div>
            <div class="form-group">
                <label for="whatsapp_url">WhatsApp URL</label>
                <input type="text" name="whatsapp_url" id="whatsapp_url" class="form-control" value="{{ old('whatsapp_url', $theme_options_data->whatsapp_url ?? '') }}">
            </div>

            <div class="form-group">
                <label for="short_aboutus">Short About Us</label>
                <input type="text" name="short_aboutus" id="short_aboutus" class="form-control" maxlength="255" value="{{ old('short_aboutus', $theme_options_data->short_aboutus ?? '') }}">
            </div>



                        <!-- Submit Button -->
                        <div class="mt-4">
                            <button type="submit" class="btn bg-persian-green mt-3">Submit</button>
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
        // Initialize jQuery Validation
        $("#themeOptionsForm").validate({
            rules: {
                header_logo: {
                    required: function() {
                        return !{{ isset($theme_options_data->header_logo) ? 'true' : 'false' }};
                    },
                    extension: "jpg|jpeg|png|gif"
                },
                favicon: {
                    required: function() {
                        return !{{ isset($theme_options_data->favicon) ? 'true' : 'false' }};
                    },
                    extension: "ico|png|jpg|jpeg"
                },
                footer_logo: {
                    required: function() {
                        return !{{ isset($theme_options_data->footer_logo) ? 'true' : 'false' }};
                    },
                    extension: "ico|png|jpg|jpeg"
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
                    extension: "Please upload a valid image file (jpg, jpeg, png, gif)"
                },
                favicon: {
                    required: "Please upload a favicon",
                    extension: "Please upload a valid file (ico, png, jpg, jpeg)"
                },
                footer_logo: {
                    required: "Please upload a footer icon",
                    extension: "Please upload a valid file (ico, png, jpg, jpeg)"
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
