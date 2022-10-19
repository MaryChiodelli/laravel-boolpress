@extends('layouts.app')

@section('content')

<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->slug }}</p>
    <p>{{ $post->content }}</p>
</div>

<div class="container">
    <div class="d-flex">
        <a class="btn btn-success mr-2" href="{{ route('admin.posts.edit', $post) }}" role="button">edit</a>
        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
            
            @csrf
            @method('DELETE')
    
            <input class="btn btn-danger" type="submit" value="delete">
        
        </form>
    </div>
</div>


@endsection