<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PostController extends Controller
{
    // Show all of the posts
    public function index () : View{
        return view('posts.index');
    }

    // Create a new post
    public function create() {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    // Save the new post
    public function store(Request $request) : RedirectResponse {

        // Validate the data
        $request->validate([
            'title' => ['required', 'string', 'max:20'],
            'description' => ['required', 'string', 'min:10', 'max:250'],
            'post_creator' => ['required', 'exists:users,id'],
        ]);

        // Add the post detials to the database


        // Redirect the user to the homepage
        return to_route('posts.index');
    }
}
