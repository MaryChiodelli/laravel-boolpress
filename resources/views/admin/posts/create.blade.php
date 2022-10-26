@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Create a new Post</h1>
</div>

<div class="container">
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" name="title" value="{{ old('title') }}" id="title" class="form-control @error('title') is-invalid @enderror">

            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="cover">Cover</label>
            <input id="cover" name="cover" type="file" class="form-control-file @error('cover') is-invalid @enderror">

            @error('cover')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Categoria</label>
            <select class="form-control" id="category" name="category_id">
                <option value="">-- nessuna --</option>
                @foreach ($categories as $category)
                <option @if (old('category_id') == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="d-block">Tags</label>
            @foreach ($tags as $tag)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="{{ $tag->slug }}" name="tags[]" value="{{ $tag->id }}" @if ( in_array($tag->id, old('tags', [])) ) checked @endif>
                <label class="form-check-label" for="{{ $tag->slug }}">{{ $tag->name }}</label>
            </div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="3">{{ old('content') }}</textarea>

            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <input class="btn btn-primary" type="submit" value="Create">

    </form>
</div>

@endsection