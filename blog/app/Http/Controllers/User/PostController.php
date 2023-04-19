<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $posts = Post::query()->where('user_id', $userId)->latest('created_at')->paginate(12);

        return view('user.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('user.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:10000'],
            'published_at' => ['nullable', 'string', 'date'],
            'category' => ['nullable'],
        ]);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->category_id = $validated['category'];
        $post->published_at = $validated['published_at'] ?? null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/posts/' . $image);
            $post->image = $image;
        }
        $post->save();

        return redirect()->route('user.posts.show', $post->id);
    }

    public function show(Request $request, $postId)
    {
        $post = Post::query()->find($postId);

        return view('user.posts.show', compact('post'));
    }

    public function edit($postId)
    {
        $post = Post::query()->find($postId);

        return view('user.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:10000'],
            'published_at' => ['nullable', 'string', 'date'],
            'image' => ['nullable']
        ]);

        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->published_at = $validated['published_at'] ?? null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/posts/' . $image);
            $post->image = $image;
        }
        $post->save();

        return redirect()->route('user.posts.show', $post->id);
    }

    public function delete($post)
    {
        return redirect()->route('user.posts');
    }

    public function like()
    {
        return 'like';
    }
}
