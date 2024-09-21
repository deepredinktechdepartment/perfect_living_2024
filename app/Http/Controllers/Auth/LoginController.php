<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Exception;
use Carbon\Carbon;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        try {
            return view('login');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed to load login form: ' . $exception->getMessage());
        }
    }

    /**
     * Handle user login.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        try {
            $credentials = $request->only('username', 'password');

            if (Auth::attempt($credentials)) {
                // Authentication passed...
                return redirect()->intended('dashboard');
            }

            return back()->withErrors([
                'username' => 'The provided credentials do not match our records.',
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Login failed: ' . $exception->getMessage());
        }
    }

    /**
     * Handle user authentication with additional checks.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        try {
            return $this->processAuthentication($request);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Authentication failed: ' . $exception->getMessage());
        }
    }

    /**
     * Process user authentication with detailed checks.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    private function processAuthentication(Request $request)
    {
        try {
            // Destroy Session Variables
            Session::forget('OrganizationID');

            // Find the user without the global ActiveOrganization scope
            $user = User::withoutGlobalScope(ActiveOrgaization::class)
                        ->where('username', $request->username)
                        ->first();

            // Check if the user exists
            if (!$user) {
                return redirect()->back()->with('error', 'Account not found.');
            }

            // Check if the account is active
            if ($user->active != 1) {
                return redirect()->back()->with('error', 'Account is not active.');
            }

            // Check if the user is a non-admin (role 5) and prevent access
            if ($user->role == 5) {
                return redirect()->back()->with('error', 'You do not have access to this system. Please contact your organization for more details.');
            }

            // Attempt to authenticate the user
            if (!Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                return redirect()->back()->with('error', 'Invalid credentials.');
            }

            // Store the Organization ID in the session
            Session::put('OrganizationID', auth()->user()->client_id ?? 0);

            // Update last login information
            $user = Auth::user();
            $user->last_login_at = $user->current_login_at ?? now()->toDateTimeString();
            $user->last_login_ip_address = $user->current_login_ip ?? request()->ip();
            $user->current_login_at = now()->toDateTimeString();
            $user->current_login_ip = request()->ip();
            $user->save();

            // Redirect to dashboard with a success message
            return redirect('dashboard')->with('toast_success', 'Account is verified.');
        } catch (Exception $exception) {
            // Handle any exceptions and redirect with an error message
            return redirect()->back()->with('error', 'Authentication error: ' . $exception->getMessage());
        }
    }


    /**
     * Handle user logout.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        try {
            return $this->processLogout($request);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Logout failed: ' . $exception->getMessage());
        }
    }

    /**
     * Process user logout and redirect accordingly.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    private function processLogout(Request $request = null)
    {
        try {
            Auth::logout();
            Session::flush();

            if (isset($request->comesfrom) && $request->comesfrom == "changepassword") {
                return redirect()->route('login')->with('success', 'Password changed successfully. Please login with new credentials.');
            } else {
                return redirect()->route('login')->with('error', 'You have been successfully logged out!');
            }
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Logout error: ' . $exception->getMessage());
        }
    }
}
