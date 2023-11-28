@extends('layouts.app')

@section('title')
    Login - Retail Inventory Management
@endsection

@section('main')
    <div class="space-y-5 max-w-sm mx-auto">
        <h1 class="text-xl font-bold">Login</h1>

        <form action="{{ route('login') }}" method="post" class="base-form">
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
                @error('email')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                @error('password')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <button type="submit">Login</button>
        </form>

        <p class="text-center [&>a]:underline [&>a]:text-blue-500">
            Don't have an account? <a href="{{ route('register') }}">Register</a>
        </p>
    </div>
@endsection
