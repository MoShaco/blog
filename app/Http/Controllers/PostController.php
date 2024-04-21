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
        $validatedPostData = $request->validate([
            'title' => ['required', 'string', 'max:20'],
            'description' => ['required', 'string', 'max:250'],
            'post_creator' => ['required', 'exists:users,id'],
        ]);

        // Add the post detials to the database
        Post::create ([
            'title' => trim($validatedPostData['title']),
            'description' => trim($validatedPostData['description']),
            'user_id' => $validatedPostData['post_creator']
        ]);

        // Redirect the user to the homepage
        return to_route('posts.index');
    }

    // Show a spefiic post
    public function show (Post $post) {
        return view('posts.show', ['post' => $post]);
    }

    // Enable editing a post
    public function edit(Post $post) {
        return view('posts.edit', ['post' => $post, 'users' => User::all()]);
    }

    // Update the post
    public function update(Request $request, Post $post) {
        // Validate the data
        $validatedPostData = $request->validate([
            'title' => ['required', 'string', 'max:20'],
            'description' => ['required', 'string', 'max:250'],
            'post_creator' => ['required', 'exists:users,id'],
        ]);        

        // Update the post
        $post->update([
            'title' => trim($validatedPostData['title']),
            'description' => trim($validatedPostData['description']),
            'user_id' => $validatedPostData['post_creator'],
        ]);

        // View that post after editing
        return to_route('posts.show', $post->id);
    }

    // Delete a post
    public function destroy (Post $post) {
        $post->delete();
        return to_route('posts.index');
    }
}
