@extends('layouts.app')
@section('title', 'Login')
@section('content')




<section class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card p-0 m-0 border-0 rounded-0 shadow">
                    <div class="row ms-0 me-0">
                        <div class="col-lg-6 col-md-6 my-auto ms-0 me-0 ps-0 pe-0">
                            <img src="assets/images/img1.png" alt="img1" class="img-fluid float-left" />
                        </div>
                        <div class="col-lg-6 col-md-6 my-auto p-0">
                            <div class="p-5">
                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <div>
                                        <h2>Sign In</h2>
                                    </div>
                                    <div class="social d-flex align-items-center gap-2">
                                        <a href="https://twitter.com/i/flow/login?redirect_after_login=%2Futtamblastech" target="_blanc"><i class="fa-brands fa-twitter"></i></a>
                                        <a href="https://www.facebook.com/uttamblastech/" target="_blanc"><i class="fa-brands fa-facebook-f"></i></a>
                                        <a href="https://www.linkedin.com/company/uttam-blastech-pvt-ltd" target="_blanc"><i class="fa-brands fa-linkedin-in"></i></a>
                                    </div>
                                </div>


                                <form id="loginForm" class="form-horizontal mt-2 pt-2 needs-validation" novalidate action="{{ route('auth.verify') }}" method="post">
                                    @csrf
                                    <div class="mb-1">
                                        <label for="tb-email">Username</label>
                                        <input type="text" class="form-control" id="tb-email" placeholder="" required name="username" />

                                    </div>

                                    <div class="mb-1">
                                        <label for="text-password">Password</label>
                                        <input type="password" class="form-control" id="text-password" placeholder="" required name="password" />

                                    </div>

                                    <div class="d-flex align-items-stretch button-group mt-4 pt-2">
                                        <button type="submit" class="btn btn-primary btn-block w-100 mb-4">Sign in</button>
                                    </div>
                                </form>



                                <div class="d-flex justify-content-between align-items-center mb-4">

                                   <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Remember me
                                        </label>
                                    </div>
                                    <div>
                                        <a href="{{ route('forget.password') }}">Forgot Password?</a>
                                    </div>

                                </div>
                                <div>
                                    {{-- <p class="text-center">Not a member? <a href="#">Sign Up</a></p> --}}
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
$(document).ready(function () {
    $('#loginForm').validate({
        rules: {
            username: {
                required: true
            },
            password: {
                required: true
            }
        },
        messages: {
            username: {
                required: "Please enter your username"
            },
            password: {
                required: "Please enter your password"
            }
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.mb-1').append(error);
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
