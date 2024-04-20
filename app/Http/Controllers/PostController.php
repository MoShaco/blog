<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{
    // Show all of the posts
    public function index () {
        return view('posts.index', ['posts' => Post::all()]);
    }

    // Create a new post
    public function create() {
        return view('posts.create', ['users' => User::all()]);
    }

    // Save the new post
    public function store(Request $request) {
        // Validate the data
        $request->validate([
            'title' => ['required', 'string', 'max:20'],
            'description' => ['required', 'string', 'min:10', 'max:250'],
            'post_creator' => ['required', 'exists:users,id'],
        ]);
        $title = $request->title;
        $description = $request->description;
        $postCreator = $request->post_creator;

        // Add the post detials to the database
        Post::create ([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator,
        ]);

        // Redirect the user to the homepage
        return to_route('posts.index');
    }

    // Show a spefiic post
    public function show ($id) {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }
}
