<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    // Show register form
    public function create() {
        return view('auth.login');
    }

    // Save the data into the database
    public function store(Request $reqeust) {
        // Validate the data
        $userInformation = $reqeust->validate([
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', 'min:8']
        ]);

        if (!Auth::attempt($userInformation)) {
            throw  ValidationException::withMessages([
                'email' => 'Invalid Email\Password'
            ]);
        }

        request()->session()->regenerate();

        return to_route('posts.index');

    }

    public function destroy() {
        Auth::logout();
        return redirect('/');
    }
}
