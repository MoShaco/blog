@extends('layout.app')

@section('title', 'Register')

@section('content')
    <!-- Display Error Masseges -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>l
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container mt-4" >
        <form action=" {{ route('register.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name"  value="{{ old('name') }}" class="form-control" id="name" autofocus required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
    <div class="mt-3">
        <p> Already registerd ? <a href="{{ route('login') }}" class="text-decoration-none"> click here to login </a> </p>
    </div>
@endsection