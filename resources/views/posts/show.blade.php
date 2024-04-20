@extends('layout.app')

@section('title')Show @endsection

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Post Information
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{$post->title}}</h5>
            <p class="card-text">Description: {{$post->description}}</p>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            Post Creator Information
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{$post->user->name}}</h5>
            <p class="card-text">Email: {{$post->user->email}}</p>
            <p class="card-text">Created at: {{$post->user->created_at ? $post->created_at : null}}</p>
        </div>
    </div>
@endsection