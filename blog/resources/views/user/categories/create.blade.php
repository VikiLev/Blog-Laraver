@extends('layouts.base')

@section('page.title')
    My categories
@endsection
@section('content')
    <h1> Create Category </h1>

    <x-form action="{{ route('user.categories.store') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <label>
                {{ __('Name') }}
            </label>
            <input type="test" name="name">
        </div>
        <button type="submit">save</button>
    </x-form>

    <div>
        <a href="{{ route('user.categories.index') }}">
            Back
        </a>
    </div>
@endsection
