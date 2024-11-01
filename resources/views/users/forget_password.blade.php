@extends('layouts.app')
@section('content')
@php
use App\Models\Themeoptions;
use Illuminate\Support\Facades\Auth;
use App\Scopes\ActiveOrgaization;
$theme_options_data = Themeoptions::withoutGlobalScope(new ActiveOrgaization)->get()->first();
@endphp


<section class="login d-flex align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card p-0 m-0 border-0 rounded-0 shadow">
                    <div class="row ms-0 me-0">
                        <!-- Left Side Image -->
                        <div class="col-lg-6 col-md-6 d-none d-md-block p-0">
                            <img src="https://i.imgur.com/C4BC7k1.png" alt="Banner Image" class="img-fluid h-100 w-100 object-cover" />
                        </div>
                        <!-- Right Side Form -->
                        <div class="col-lg-6 col-md-6 my-auto p-0">
                            <div class="p-5">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <h2>{{ $pageTitle ?? 'Reset Your Password' }}</h2>
                         
                                </div>

                                <form method="POST" action="{{ route('forget.password.post') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="email">{{ __('Username') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-login w-100">
                                        {{ __('Send') }}
                                    </button>
                                </form>

                                <div class="justify-content-center mb-4 mt-4">
                                    <a href="{{ route('login') }}" class="forgot-password-link"><u>Sign In</u></a>
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

@push('styles')
<style>
    .forgot-password-link {
        color: #007bff; /* Blue color similar to Bootstrap's primary */
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s, text-decoration 0.3s;
    }

    .forgot-password-link:hover {
        color: #0056b3; /* Darker blue for hover */
        text-decoration: underline;
    }
</style>
@endpush
