<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;



class RegisterController extends Controller
{
    /**
     * Display the registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle the registration request.
     */
    public function register(Request $request)
    {
        // Perform validation
        $validatedData = $this->validator($request->all())->validate();

        try {
            // Create user and trigger registered event

            $token = Str::random(60); // Generate a random verification token
            $user = $this->create($validatedData,$token);


           // event(new Registered($user));

// After user registration

//$user->notify(new CustomVerifyEmail($user)); // Pass the user to the notification

            return redirect()->route('verification.notice',['token'=>$token])->with('success', 'Registration successful! Please check your email for verification.');
        } catch (Exception $e) {
            Log::error('Registration failed: ' . $e->getMessage());


            // Return with error message to be shown on the view
            return back()->withErrors(['error' => 'Registration failed. Please try again later.']);
        }
    }

    /**
     * Validate the registration request data.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fullname' => ['required', 'string', 'max:255', 'regex:/^\S.*$/'], // No leading spaces
            'email' => ['required', 'string', 'email', 'max:255', 'regex:/^\S.*$/'], // No leading spaces
            'phone' => ['required', 'string', 'size:10', 'regex:/^[0-9]+$/'], // 10-digit validation
            'password' => ['required', 'string', 'min:8', 'regex:/^\S*$/'], // No spaces
            'passwordagain' => ['required', 'string', 'same:password', 'regex:/^\S*$/'], // Confirm password
        ], $this->validationMessages())->after(function ($validator) use ($data) {
            // Check for uniqueness of the username (which is the email)
            if (User::where('username', $data['email'])->exists()) {
                $validator->errors()->add('email', 'This email is already registered.');
            }
        });
    }


    /**
     * Custom error messages for validation.
     *
     * @return array
     */
    protected function validationMessages()
    {
        return [
            'fullname.required' => 'Please enter your full name.',
            'fullname.regex' => 'Full name cannot start with a space.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'email.regex' => 'Email cannot start with a space.',
            'phone.required' => 'Please enter your phone number.',
            'phone.size' => 'Phone number must be exactly 10 digits.',
            'phone.regex' => 'Phone number must contain only digits.',
            'password.required' => 'Please provide a password.',
            'password.min' => 'Your password must be at least 8 characters long.',
            'password.regex' => 'Password cannot contain spaces.',
            'passwordagain.required' => 'Please confirm your password.',
            'passwordagain.same' => 'Passwords do not match.',
            'passwordagain.regex' => 'Password confirmation cannot contain spaces.',
        ];
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */


    protected function create(array $data,$token)
{


    $user = User::create([
        'fullname' => $data['fullname'],
        'username' => $data['email'],
        'phone' => $data['phone'],
        'password' => Hash::make($data['password']),
        'role' => 5,
        'active' => 0,
        'verification_token' => $token, // Store the verification token
    ]);

    // Send verification email (implement this method)
    $user->notify(new CustomVerifyEmail($user, $token));

    return $user;

}


     /**
     * Handle a login request to the application.
     */


     public function login(Request $request)
     {

         // Validate the incoming request
         $this->loginValidator($request->all())->validate();

         // Check if the user with the provided email exists
         $user = User::where('username', $request->email)->first();

         if (!$user) {
             // If the user does not exist, set a session flash message
             return redirect()->back()->with('error', 'Account does not exist.');
         }

         // Check if the user's account is active
         if ($user->active === 0) {
             return redirect()->back()->with('error', 'Your account is inactive.');
         }

         // Attempt to log the user in
         if (Auth::attempt(['username' => $request->email, 'password' => $request->password])) {
             // Check if the authenticated user has role 5
             if (Auth::user()->role === 5) {
                 // Check if 'redirect_to' exists in the request
                 if ($request->has('redirect_to')) {
                     return redirect($request->input('redirect_to'))->with('success', 'Successfully logged in!');
                 } else {
                     // Redirect to the default intended URL
                     return redirect()->intended('/')->with('success', 'Successfully logged in!');
                 }
             } else {
                 // Logout the user if they do not have the correct role
                 Auth::logout();
                 return redirect()->back()->with('error', 'You do not have permission to access this area.');
             }
         }

         // Authentication failed
         return redirect()->back()->with('error', 'Invalid email or password.');
     }




/**
 * Validate the login request data.
 *
 * @param array $data
 * @return \Illuminate\Contracts\Validation\Validator
 */
protected function loginValidator(array $data)
{
    return Validator::make($data, [
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string'],
    ], $this->loginValidationMessages());
}

/**
 * Custom error messages for login validation.
 *
 * @return array
 */
protected function loginValidationMessages()
{
    return [
        'email.required' => 'Please enter your email address.',
        'email.email' => 'Please enter a valid email address.',
        'password.required' => 'Please provide your password.',
    ];
}


public function verifyEmail($token)
{
    try {
        // Retrieve the user based on the verification token
        $user = User::where('verification_token', $token)->first();

        // Check if the user exists
        if (!$user) {

            return redirect('/')->with('error', 'Invalid verification token.');

        }

        // Check if the user is already verified
        if ($user->email_verified_at) {

            return redirect('/')->with('error', 'Your email is already verified.');
        }

        // Verify the user account
        $user->email_verified_at = now(); // Set verification timestamp
        $user->verification_token = null; // Clear the token
        $user->active = true;
        $user->save();

        // Log in the user
        Auth::login($user);

        return redirect('/')->with('success', 'Your email has been verified! You are now logged in.');
    } catch (\Exception $e) {
        return redirect('/')->withErrors(['error' => 'An error occurred while verifying your email. Please try again.']);
    }
}





}
