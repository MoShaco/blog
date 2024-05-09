@extends('layout.app')

@section('title') Edit @endsection

@section('content')

    <!-- Display Error Masseges -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Edit post form -->
    <form action="{{route('posts.update', $post->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" value="{{ $post->title }}" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label" >Description</label>
            <textarea name="description" class="form-control" id="description" rows="3"> {{$post->description}} </textarea>
        </div>
        <div>
            <input type="hidden" name="post_creator" value="{{ auth()->check() ? auth()->user()->id : null }}" >
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@endsection