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
            <label for="content">Content</label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="3">{{ old('content', $post->content) }}</textarea>

            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Categorie</label>
            <select class="form-control @error('category_id') is-invalid @enderror" id="category" name="category_id">
                <option>-- seleziona una categoria --</option>
                @foreach ($categories as $category)
                <option @if (old('category_id', $post->category_id) === $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <input class="btn btn-primary" type="submit" value="Update">

    </form>
</div>

@endsection