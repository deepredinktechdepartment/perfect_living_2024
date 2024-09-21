<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function __invoke(Request $request)
    {
        dd($request);
        $user = User::find($request->id);

        if (!$user || !hash_equals((string) $request->hash, sha1($user->email))) {
            return redirect()->route('userAuthLogin')->with('error', 'Invalid verification link.');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('dashboard')->with('status', 'Email already verified.');
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        Auth::login($user);

        return redirect()->route('dashboard')->with('status', 'Email verified successfully.');
    }

    public function send(Request $request)
    {
        // Ensure the user is authenticated
        $this->authorize('sendVerificationEmail', User::class);

        // Check if the user is authenticated
        if ($request->user()) {
            $request->user()->sendEmailVerificationNotification();
            return back()->with('status', 'Verification link sent!');
        }

        return redirect()->route('login')->with('error', 'You need to be logged in to resend the verification link.');
    }

}
