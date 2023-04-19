@extends('layouts.base')

@section('page.title')
    new login page title
@endsection
@section('content')
    <x-login>
        <h1> {{ __('Login') }}</h1>
            <x-form action="{{ route('login.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div>
                    <label>
                        {{ __('email') }}
                    </label>
                    <input type="email" name="email">
                </div>
                <div>
                    <label>
                        {{ __('password') }}
                    </label>
                    <input type="password" name="password">
                </div>
                <button type="submit">login</button>
            </x-form>
    </x-login>
@endsection
