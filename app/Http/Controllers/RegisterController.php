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
            $user = $this->create($validatedData);
           // event(new Registered($user));

// After user registration
//$user = $this->create($validatedData); // Assuming this creates the user
//$user->notify(new CustomVerifyEmail($user)); // Pass the user to the notification

            return redirect()->route('verification.notice')->with('status', 'Registration successful! Please check your email for verification.');
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
    protected function create(array $data)
    {
        return User::create([
            'fullname' => $data['fullname'],
            'username' => $data['email'], // Store email as username
            'phone' => $data['phone'], // Save the phone number
            'password' => Hash::make($data['password']),
            'role' => 5, // Set role to 5 by default
        ]);
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

         // Attempt to log the user in
         if (Auth::attempt(['username' => $request->email, 'password' => $request->password])) {
             // Check if the authenticated user has role 5
             if (Auth::user()->role === 5) {
                 return redirect()->intended('/')->with('success', 'Successfully logged in!');
             } else {
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
}
