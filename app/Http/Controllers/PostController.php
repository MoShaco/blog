<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

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
    public function store(PostRequest $request) {
        // Validate the data
        $postInformation = $request->validated();

        // Add the post information to the database after sanitizing it
        Post::create ([
            'title' => strip_tags($postInformation['title']),
            'description' => strip_tags($postInformation['description']),
            'user_id' => $postInformation['post_creator']
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

        return view('posts.edit', ['post' => $post]);
    }

    // Update the post
    public function update(PostRequest $request, Post $post) {
        // Validate the data
        $postInformation = $request->validated();
    
        // Update the post information to the database after sanitizing it
        $post->update([
            'title' => strip_tags($postInformation['title']),
            'description' => strip_tags($postInformation['description']),
            'user_id' => $postInformation['post_creator'],
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
