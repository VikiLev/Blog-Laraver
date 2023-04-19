<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::paginate(20);

        return view('user.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('user.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
        ]);

        $category = new category();
        $category->name = $validated['name'];
        $category->save();

        return redirect()->route('user.categories.show', $category->id);
    }

    public function show(Request $request, $categoryId)
    {
        $category = category::query()->find($categoryId);

        return view('user.categories.show', compact('category'));
    }

    public function edit($categoryId)
    {
        $category = category::query()->find($categoryId);

        return view('user.categories.edit', compact('category'));
    }

    public function update(Request $request, category $category)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100']
        ]);

        $category->name = $validated['name'];
        $category->save();

        return redirect()->route('user.categories.show', $category->id);
    }

    public function delete($category)
    {
        return redirect()->route('user.categories');
    }
}
