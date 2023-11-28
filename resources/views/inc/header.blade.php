<header class="container py-4 flex flex-wrap items-center gap-x-5 justify-between">
    <a href="{{ route('home') }}">Retail Inventory Management</a>

    <nav class="text-sm flex flex-wrap items-center gap-x-5">
        <a href="{{ route('home') }}" @class(['underline' => Route::is('home')])>Home</a>

        @guest
            <a href="{{ route('login') }}" class="bg-black text-white font-medium px-2.5 py-2 rounded">
                Login
            </a>
        @endguest

        @auth
            <a href="{{ route('products_view') }}" @class(['underline' => Route::is('products_view')])>
                All products
            </a>
            <a href="{{ route('add_product_view') }}" @class(['underline' => Route::is('add_product_view')])>
                Add product
            </a>
            <form action="{{ route('logout') }}" method="post" class="bg-red-500 text-white font-medium px-2.5 py-2 rounded">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth
    </nav>
</header>
