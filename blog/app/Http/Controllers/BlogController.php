<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('category_id');

//        $posts = Post::all('id','title');

        $posts = Post::query()->latest('created_at')->paginate(12);
        $categories = Category::all();

        if ($categoryId){
            $posts = Post::whereHas('category', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })->get();
        }

        if ($search){
            $posts = Post::where( function ($query) use ($search) {
                $query->where('title', 'like', '%'.$search.'%');
            })->get();
        }

        return view('blog.index', compact('posts','categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show($postId)
    {
        $post = cache()->remember("posts.{$postId}" , now()->addHour(), function () use ($postId) {
            return Post::query()->find($postId);
        });

//        $post = Post::query()->find($postId);

        return view('blog.show', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function like($postId)
    {
        //
    }

}
