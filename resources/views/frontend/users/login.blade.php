@extends('layouts.frontend_theme.main')

@section('mainContent')
<section class="bg-yellow">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                        <div class="card login-card p-3 px-sm-3 px-2">
                    <div class="card-body">
                        <h3 class="mb-4">Log in</h3>
                        <form id="loginForm" method="POST" action="{{ route('verify.Auth.Login') }}" autocomplete="off">
                            @csrf
                            <div class="form-group mb-4">
                                <div class="">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autocomplete="off">
                                </div>
                            </div>
                            {{-- <div class="mb-4">
                                <p><small>By continuing, you agree to <a href="#" class="text-brand">Terms of Use</a> & <a href="#" class="text-brand">Privacy Policy</a>.</small></p>
                            </div> --}}
                            <div class="form-group mb-4">
                                <button type="submit" class="btn btn-danger border-radius-0 w-100">Continue</button>
                            </div>
                            {{-- <div class="mb-5">
                                <p><small>Have trouble logging in? <a href="#" class="text-brand">Get help</a></small></p>
                            </div> --}}
                        </form>
                        <div class="mb-5">
                            <p><small>Don't have an account yet? <a href="{{ URL::TO('create_account') }}" class="text-brand">Create your account</a></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize form validation
    $('#loginForm').validate({
        rules: {
            email: {
                required: true,
                email: true,
                noLeadingSpaces: true
            },
            password: {
                required: true,
                noSpaces: true // Removed minlength
            }
        },
        messages: {
            email: {
                required: "Please enter your email address.",
                email: "Please provide a valid email address.",
                noLeadingSpaces: "Email cannot start with a space."
            },
            password: {
                required: "Please provide a password.",
                noSpaces: "Password cannot contain spaces."
            }
        },
        errorElement: 'div',
        errorClass: 'text-danger',
        highlight: function(element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid');
        }
    });

    // Custom method to prevent leading spaces
    $.validator.addMethod("noLeadingSpaces", function(value, element) {
        return this.optional(element) || /^\S.*/.test(value);
    }, "Cannot start with a space.");

    // Custom method to prevent spaces in the password
    $.validator.addMethod("noSpaces", function(value, element) {
        return this.optional(element) || /^\S*$/.test(value);
    }, "Password cannot contain spaces.");
});
</script>





@endpush

@endsection
