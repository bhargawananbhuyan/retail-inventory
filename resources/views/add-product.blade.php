@extends('layouts.app')

@section('title')
    Add product - Retail Inventory Management
@endsection

@section('main')
    <div class="space-y-5 max-w-sm mx-auto">
        <h1 class="text-xl font-bold">Add a product</h1>

        <form action="{{ route('add_product') }}" method="post" class="base-form">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}">
                @error('price')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div>
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}">
                @error('quantity')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <button type="submit">Add</button>
        </form>
    </div>
@endsection
