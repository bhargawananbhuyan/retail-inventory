@extends('layouts.app')

@section('title')
    Register - Retail Inventory Management
@endsection

@section('main')
    <div class="space-y-5 max-w-sm mx-auto">
        <h1 class="text-xl font-bold">Register</h1>

        <form action="{{ route('register') }}" method="post" class="base-form">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                    <small>{{ $message }}</small>
                @enderror
            </div>
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
            <div>
                <label for="password_confirmation">Confirm password</label>
                <input type="password" name="password_confirmation" id="password_confirmation">
            </div>
            <button type="submit">Register</button>
        </form>

        <p class="text-center [&>a]:underline [&>a]:text-blue-500">
            Already registered? <a href="{{ route('login') }}">Login</a>
        </p>
    </div>
@endsection
