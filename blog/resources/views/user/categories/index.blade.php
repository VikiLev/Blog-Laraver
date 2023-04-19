@extends('layouts.base')

@section('page.title')
    My categories
@endsection
@section('content')
    <h1> My categories </h1>

    @if(empty($categories))
        no categories

    @else
        @foreach($categories as $category)
            <div>
                <a href="{{ route('user.categories.show', $category->id) }}">
                    {{ $category->name }}
                </a>
            </div>
        @endforeach
    @endif
    <a href="{{ route('user.categories.create') }}">
        <button>
            {{ __('Create new category') }}
        </button>
    </a>
@endsection
