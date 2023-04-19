<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('user.posts.index');
    }

    public function create()
    {
        return view('user.posts.create');
    }

    public function store()
    {
        return view('user.posts.store');
    }

    public function show($post)
    {
        return view('user.posts.show', compact('post'));
    }

    public function edit($post)
    {
        return view('user.posts.edit', compact('post'));
    }

    public function update($post)
    {
        return 'update';
    }

    public function delete()
    {
        return 'delete';
    }

    public function like()
    {
        return 'like';
    }
}
