@extends('layouts.app')

@section('title')
    Home - Retail Inventory Management
@endsection

@section('main')
    <div>
        <section class="py-6 max-w-screen-sm mx-auto">
            <h1 class="text-xl text-center sm:text-3xl font-bold">
                Hello, {{ Auth::user()->name ?? 'world' }}!
            </h1>
            @auth
                <p class="flex items-center justify-center gap-x-2 mt-5">
                    <a href="{{ route('products_view') }}" class="bg-black text-white text-sm font-medium px-2.5 py-2 rounded">
                        All products
                    </a>
                    <a href="{{ route('add_product_view') }}" class="border border-black text-sm font-medium px-2.5 py-2 rounded">
                        Add a product
                    </a>
                </p>
            @endauth
        </section>
    </div>
@endsection
