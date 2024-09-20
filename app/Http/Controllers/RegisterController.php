<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        $user->sendEmailVerificationNotification();

        return redirect()->route('verification.notice')->with('status', 'Registration successful! Please check your email for verification.');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 5, // Set the role to 5 by default
        ]);
    }
}
