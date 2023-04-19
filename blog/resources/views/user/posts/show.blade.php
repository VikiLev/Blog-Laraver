@extends('layouts.base')

@section('page.title')
    {{ $post->title }}
@endsection
@section('content')
    <div>
        @if($post->image)
            <img src="{{url('storage/posts/'.$post->image)}} " height="100" width="100">
        @endif
    </div>
    <h1> {{ $post->title }} </h1>
    <div>
        {{ $post->content }}
    </div>
    <div>
        <a href="{{ route('user.posts.edit', $post->id) }}">
            {{__('Edit')}}
        </a>
    </div>
    <div>
        <a href="{{ route('user.posts.index') }}">
            {{__('Back')}}
        </a>
    </div>
@endsection
