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
            <input type="text" name="title" value="{{ $post->title }}" class="form-control" id="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label" >Description</label>
            <textarea name="description" class="form-control" id="description" rows="3" required> {{$post->description}} </textarea>
        </div>
        <div class="form-floating">
            <select class="form-select" name="post_creator" required>
                <option  disabled>Select the post creator</option>
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <label>Post Creator</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@endsection