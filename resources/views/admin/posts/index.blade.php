@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Posts list:</h1>
    <a class="btn btn-primary" href="{{ route('admin.posts.create') }}" role="button">Add new post</a>
</div>

<div class="container-fluid">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Created at</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->created_at }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.posts.show', $post) }}" role="button">view</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection