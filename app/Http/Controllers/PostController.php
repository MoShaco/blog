<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // Show all of the posts
    public function index () {
        return view('posts.index');
    }
}
