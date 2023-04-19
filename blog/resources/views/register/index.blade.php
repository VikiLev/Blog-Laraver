@extends('layouts.base')

@section('page.title')
    new registration page title
@endsection
@section('content')
    <x-login>
        <h1> {{ __('Registration') }}</h1>
        <x-form action="{{ route('register.store') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div>
                <label>
                    {{ __('name') }}
                </label>
                <input type="text" name="name">
            </div>
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
            <div>
                <label>
                    {{ __('repeat password') }}
                </label>
                <input type="password" name="password_confirmation">
            </div>
            <button type="submit">Registration</button>
        </x-form>
    </x-login>
@endsection
