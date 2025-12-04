<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\Middleware;

class PostController extends Controller
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
    }
    // Display all posts
    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return view('posts.index', compact('posts'));
    }

    // Display a single post
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    public function store(Request $request)
{
    $fields = $request->validate([
        'title' => ['required', 'max:255'],
        'body' => ['required'],
        'image' => ['nullable', 'file', 'max:3000', 'mimes:png,jpg,webp']
    ]);

    $path = null;

    if ($request->hasFile('image')) {
        $path = Storage::disk('public')->put('post_images', $request->image);
    }

    Auth::user()->posts()->create([
        'title' => $request->title,
        'body' => $request->body,
        'image' => $path
    ]);

    return back()->with('success', "Your post was created");
}

public function edit(Post $post)
{
    Gate::authorize('modify', $post);
    return view('posts.edit', ['post' => $post]);
}

public function update(Request $request, Post $post)
{
    Gate::authorize('modify', $post);

    $request->validate([
        'title' => ['required', 'max:255'],
        'body' => ['required'],
        'image' => ['nullable', 'file', 'max:3000', 'mimes:png,jpg,webp']
    ]);

    $path = $post->image;

    if ($request->hasFile('image')) {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $path = Storage::disk('public')->put('post_images', $request->image);
    }

    $post->update([
        'title' => $request->title,
        'body' => $request->body,
        'image' => $path
    ]);

    return redirect()
        ->route('dashboard')
        ->with('success', 'Your post was updated.');
}

public function destroy(Post $post)
{
    Gate::authorize('modify', $post);

    if ($post->image) {
        Storage::disk('public')->delete($post->image);
    }

    $post->delete();
    return back()->with('delete', 'Your post was deleted');
}

}
