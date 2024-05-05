<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterUserController extends Controller
{
    // Show register form
    public function create() {
        return view('auth.register');
    }

    // Save the data into the database
    public function store(Request $reqeust) {
        // Validate the data
        $userInformation = $reqeust->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'max:254', 'unique:App\Models\User,email'],
            'password' => ['required', 'min:8' , 'confirmed']
        ]);

        // create a user
        $user = User::create($userInformation);

        // log him in
        auth::login($user);

        // redirct the user
        return to_route('posts.index');
    }
}