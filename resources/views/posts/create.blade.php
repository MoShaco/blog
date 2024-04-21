@extends('layout.app')

@section('title') Create a post @endsection

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

    <!-- Create post form -->
    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label" >Description</label>
            <textarea name="description" class="form-control" id="description" rows="3" required> {{ old('description') }}</textarea>
        </div>
        <div class="form-floating">
            <select class="form-select" name="post_creator" required>
                <option selected disabled>Select the post creator</option>
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <label>Post Creator</label>
        </div>
        <button type="submit" class="btn btn-success mt-3">Submit</button>
    </form>
@endsection