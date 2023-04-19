@extends('layouts.base')

@section('page.title')
    My posts
@endsection
@section('content')
    <h1> Create post </h1>

    <x-form action="{{ route('user.posts.store') }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <label>
                {{ __('Title') }}
            </label>
            <input type="title" name="title">
        </div>
        <div>
            <label>
                {{ __('content') }}
            </label>
            <textarea name="content" rows="10"></textarea>
        </div>
        <div>
            <input id="image" type="file" name="image">
        </div>
        <div>
            <label for="category">Category</label>
            <select name="category" id="category" >
                <option value="0">--- SELECT CATEGORY ---</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">save</button>
    </x-form>

    <div>
        <a href="{{ route('user.posts.index') }}">
            Back
        </a>
    </div>
@endsection
