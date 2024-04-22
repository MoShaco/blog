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
                <td>{{$post->created_at->format('Y-m-d H:m')}}</td>
                <td>
                    <a href="{{ route('posts.show', $post->id)}}" class="btn btn-primary"> View </a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary"> Edit </a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete the post?')" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        <section>
    </table>
@endsection