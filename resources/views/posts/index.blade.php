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
                <th scope="col">Description</th>
                <th scope="col">Post Creator</th>
                <th scope="col">Created at</th>
                <th scope="col" colspan="3">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Gaza</td>
                <td>From OCT 7th gaza under attack of Isralie occupation</td>
                <td>Mohammed Shaco </td>
                <td>2024-4-18</td>
                <td>
                    <a href="" class="btn btn-primary"> View </a>
                    <a href="" class="btn btn-secondary"> Edit </a>
                    <form action="" method="" class="d-inline">
                        @csrf
                        <button type="button" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            </tbody>
        <section>
    </table>
@endsection