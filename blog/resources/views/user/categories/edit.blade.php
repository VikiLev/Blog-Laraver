@extends('layouts.base')

@section('page.title')
    Edit post
@endsection
@section('content')
    <h1> Edit post </h1>

    <x-form action="{{ route('user.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <label>
                {{ __('Name') }}
            </label>
            <input type="text" name="name" value="{{ $category->name }}">
        </div>
        <button type="submit">save</button>
    </x-form>

    <div>
        <a href="{{ route('user.categories.show', $category->id) }}">
            Back
        </a>
    </div>
@endsection
