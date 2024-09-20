@extends('layouts.frontend_theme.main')

@section('mainContent')
<section class="bg-yellow">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                <div class="card login-card p-3 px-sm-3 px-2">
                    <div class="card-body">
                        <h3 class="mb-4">Create account</h3>
                        <form id="registrationForm" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="form-group mb-4">
                                <input type="email" name="username" id="username" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="passwordagain" id="passwordagain" class="form-control" placeholder="Password Again" required>
                            </div>
                            <div class="mb-4">
                                <p><small>By continuing, you agree to <a href="#" class="text-brand">Terms of Use</a> & <a href="#" class="text-brand">Privacy Policy</a>.</small></p>
                            </div>
                            <div class="form-group mb-4">
                                <button type="submit" class="btn btn-danger border-radius-0 w-100">Create your account</button>
                            </div>
                            <div class="mb-5">
                                <p><small>Already have an account? <a href="{{ URL::to('login') }}" class="text-brand">Sign in</a></small></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')

<script>
$(document).ready(function() {
    $('#registrationForm').on('submit', function(e) {
        var password = $('#password').val();
        var passwordAgain = $('#passwordagain').val();
        var isValid = true;

        // Clear previous error messages
        $('.error-message').remove();

        // Validate password length
        if (password.length < 8) {
            e.preventDefault();
            $('#password').after('<div class="error-message text-danger">Password must be at least 8 characters long.</div>');
            isValid = false;
        }

        // Validate passwords match
        if (password !== passwordAgain) {
            e.preventDefault();
            $('#passwordagain').after('<div class="error-message text-danger">Passwords do not match.</div>');
            isValid = false;
        }

        // Optionally, use Bootstrap's validation classes
        if (isValid) {
            $(this).addClass('was-validated');
        }
    });
});
</script>
@endpush

@endsection
