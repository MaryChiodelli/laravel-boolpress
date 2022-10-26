<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Category;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $tags = Tag::orderBy('name', 'asc')->get();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->validate([
            'title' => ['required', 'max:255', 'min:5'],
            'content' => ['required'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'tags' => ['exists:tags,id'],
            'cover' => ['nullable', 'image', 'max:2048']
        ]);
        
        $params['slug'] = Str::slug($params['title']);
        
        $img_path = Storage::put('uploads', $params['cover']);
        $params['cover'] = $img_path;
        
        $post = Post::create($params);

        if (array_key_exists('tags', $params)) {
            $tags = $params['tags'];
            $post->tags()->sync($tags);
        }

        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $tags = Tag::orderBy('name', 'asc')->get();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $params = $request->validate([
            'title' => ['required', 'max:255', 'min:5'],
            'content' => ['required'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'tags' => ['nullable', 'exists:tags,id']
        ]);

        $params['slug'] = str_replace(' ', '-', $params['title']);
        $post->update($params);

        if (array_key_exists('tags', $params)) {
            $tags = $params['tags'];
            $post->tags()->sync($tags);
        }
        
        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
