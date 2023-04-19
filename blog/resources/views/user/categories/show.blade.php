@extends('layouts.base')

@section('page.title')
    {{ $category->name }}
@endsection
@section('content')
    <h1> {{ $category->name }} </h1>
    <div>
        <a href="{{ route('user.categories.edit', $category->id) }}">
            {{__('Edit')}}
        </a>
    </div>
    <div>
        <a href="{{ route('user.categories.index') }}">
            {{__('Back')}}
        </a>
    </div>
@endsection
