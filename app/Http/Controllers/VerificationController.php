<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    use VerifiesEmails;

    public function __invoke(Request $request)
    {
        $user = User::find($request->id);

        if (! $user || ! hash_equals((string) $request->hash, sha1($user->email))) {
            return redirect()->route('login')->with('error', 'Invalid verification link.');
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        Auth::login($user);

        return redirect()->route('dashboard'); // Redirect to your desired route
    }
}
