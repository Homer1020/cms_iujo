<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function publicIndex() {
        $posts = Post::all();
        return view('blog.index', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('blog.dashboard', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('blog.create', ['post' => new Post(), 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payload = $request->validate([
            'title'     => 'required|string',
            'content'   => 'required|string|min:3',
            'excerpt'   => 'required|string|min:3',
            'slug'      => 'required|string',
            'thumbnail' => 'required|image|mimes:png,jpg,jpeg',
            'category'  => 'integer',
        ]);

        $post = new Post();

        $post->title = $payload['title'];
        $post->slug = $payload['slug'];
        $post->content = $payload['content'];
        $post->excerpt = $payload['excerpt'];
        $post->user_id = Auth::user()->id;
        $post->category_id = isset($payload['category']) ? $payload['category'] : null;

        if($request->hasfile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            Storage::disk('local')->put('public/posts/' . $filename, file_get_contents($file));
            $post->thumbnail = $filename;
        }

        $post->save();

        return response()->redirectToRoute('blog.index')->with('info', 'Se creo la publicación');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('blog.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $payload = $request->validate([
            'title'     => 'required|string',
            'content'   => 'required|string|min:3',
            'excerpt'   => 'required|string|min:3',
            'slug'      => 'required|string',
            'thumbnail' => 'image|mimes:png,jpg,jpeg',
            'category'  => 'integer',
        ]);

        

        if($request->hasfile('thumbnail'))
        {
            Storage::disk('local')->delete('public/posts/' . $post->thumbnail);
            $file = $request->file('thumbnail');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            Storage::disk('local')->put('public/posts/' . $filename, file_get_contents($file));
            $post->thumbnail = $filename;
        }

        $post->title = $payload['title'];
        $post->slug = $payload['slug'];
        $post->content = $payload['content'];
        $post->excerpt = $payload['excerpt'];
        $post->user_id = Auth::user()->id;
        $post->category_id = isset($payload['category']) ? $payload['category'] : null;

        $post->save();

        return response()->redirectToRoute('blog.index')->with('info', 'Se actualizo la publicación');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Storage::disk('local')->delete('public/posts/' . $post->thumbnail);
        $post->delete();
        return response()->redirectToRoute('blog.index')->with('info', 'Se elimino la publicación');
    }
}
