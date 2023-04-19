@extends('layouts.base')

@section('page.title')
    list of posts
@endsection
@section('content')
    <h1> list of posts </h1>

    <form action="{{ route('blog') }}" method="get">
        <div>
            <input type="search" id="search" name="search" value="{{ request('search') }}" />
            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="" selected disabled hidden>Choose category</option>
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit">Search</button>
        </div>
    </form>

    @if(empty($posts))
        no posts

    @else
        @foreach($posts as $post)
            <div>
                @if($post->image)
                    <img src="{{url('storage/posts/'.$post->image)}} " height="100" width="100">
                @endif
            </div>
            <div>
                <a href="{{ route('blog.show', $post->id) }}">
                    {{ $post->title }}
                </a>
            </div>
            <div>
                {{ $post->content }}
            </div>
        @endforeach
    @endif
@endsection
