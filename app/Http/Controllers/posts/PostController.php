<?php

namespace App\Http\Controllers\posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'string|required',
            'thumbnail' => 'image|file|max:2048',
            'body' => 'string|required'
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->thumbnail = $request->file('thumbnail')->store('thumbnail');
        $post->body = $request->body;
        $post->save();

        return redirect('/posts')->with('success', 'Berhasil membuat artikel');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'string|required',
            'thumbnail' => 'image|file|max:2048',
            'body' => 'string|required'
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->thumbnail = $request->file('thumbnail')->store('thumbnail');
        $post->body = $request->body;
        $post->save();

        return redirect('/posts')->with('success', 'Berhasil mengubah artikel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/posts')->with('success', 'Berhasil menghapus artikel');
    }
}
