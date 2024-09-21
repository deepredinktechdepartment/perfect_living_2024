@extends('layouts.frontend_theme.main')

@section('mainContent')
<section class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class="card-title">Verify Your Email Address</h4>
                        <p>Please check your email for a verification link before proceeding.</p>
                        <p>If you did not receive the email, <a href="{{ route('verification.send') }}">click here</a> to request another.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
