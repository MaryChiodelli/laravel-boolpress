@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Edit an existent post</h1>
</div>

<div class="container">
    <form action="{{ route('admin.posts.update', $post) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" id="title" class="form-control @error('title') is-invalid @enderror">

            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Categoria</label>
            <select class="form-control" id="category" name="category_id">
                <option value="">-- nessuna --</option>
                @foreach ($categories as $category)
                <option @if (old('category_id', $category->id) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="d-block">Tags</label>
            @foreach ($tags as $tag)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="{{ $tag->slug }}" name="tags[]" value="{{ $tag->id }}" >
                <label class="form-check-label" for="{{ $tag->slug }}">{{ $tag->name }}</label>
            </div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="3">{{ old('content', $post->content) }}</textarea>

            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <input class="btn btn-primary" type="submit" value="Update">

    </form>
</div>

@endsection