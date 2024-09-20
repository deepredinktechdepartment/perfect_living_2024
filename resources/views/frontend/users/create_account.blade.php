
<!-- Example view file -->
@extends('layouts.frontend_theme.main')
@section('mainContent')
<section class="bg-yellow">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                <div class="card login-card p-3 px-sm-3 px-2">
                    <div class="card-body">
                        <h3 class="mb-4">Create account</h3>
                        <from>
                            <div class="form-group mb-4">
                                <div class="">
                                    <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="">
                                    <input type="password" name="passwordagain" id="passwordagain" class="form-control" placeholder="Password Again">
                                </div>
                            </div>
                            <div class="mb-4">
                                <p><small>By continuing, you agree to <a href="#" class="text-brand">Terms of Use</a> & <a href="#" class="text-brand">Privacy Policy</a>.</small></p>
                            </div>
                            <div class="form-group mb-4">
                                <button type="submit" class="btn btn-danger border-radius-0 w-100">Create your account</button>
                            </div>
                            <div class="mb-5">
                                <p><small>Already have an account? <a href="{{URL::TO('login')}}" class="text-brand">Sign in</a></small></p>
                            </div>
                        </from>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>

@endsection
