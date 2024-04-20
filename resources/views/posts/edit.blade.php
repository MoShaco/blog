@extends('layout.app')

@section('title') Edit @endsection

@section('content')
    <form action="" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" value="{{$post->title}}" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label" >Description</label>
            <textarea name="description" class="form-control" id="description" rows="3"> {{$post->description}} </textarea>
        </div>
        <div class="form-floating">
            <select class="form-select" name="post_creator">
                @foreach($users as $user)
                    <option @selected($user->id == $post->user_id) value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <label for="floatingSelect">Post Creator</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@endsection