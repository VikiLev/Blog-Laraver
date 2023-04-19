@extends('layouts.base')

@section('page.title')
    {{ $post->title }}
@endsection
@section('content')
    <h1> {{ $post->title }} </h1>
    <div>
        {{ $post->content }}
    </div>
    <div>
        @if($post->image)
            <img src="{{url('storage/posts/'.$post->image)}} " height="100" width="100">
        @endif
    </div>
    <div>
        <a href="{{ route('blog') }}">
           Back
        </a>
    </div>
@endsection
