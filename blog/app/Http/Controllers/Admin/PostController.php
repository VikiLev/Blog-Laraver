<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return 'list of the posts';
    }

    public function create()
    {
        return 'create';
    }

    public function store()
    {
        return 'save';
    }

    public function show($post)
    {
        return "show {$post}";
    }

    public function edit()
    {
        return 'edit';
    }

    public function update()
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
