@extends('layout.app')

@section('title') Shaco Blog @endsection

@section ('content')
    <div class="text-center">
        <a href="{{route('posts.create')}}" class="btn btn-success mb-3">Create a post</a>
    </div>
    <section>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Post Creator</th>
                <th scope="col">Created at</th>
                <th scope="col" colspan="3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->created_at}}</td>
                <td>
                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary"> View </a>
                    <a href="" class="btn btn-secondary"> Edit </a>
                    <form action="" method="" class="d-inline">
                        @csrf
                        <button type="button" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        <section>
    </table>
@endsection