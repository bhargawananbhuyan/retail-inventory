@extends('layouts.app')

@section('title')
    All products - Retail Inventory Management
@endsection

@section('main')
    <div class="space-y-5">
        <h1 class="text-xl font-bold">All products</h1>

        @if (count($products) > 0)
            <table class="base-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>

                                <form
                                    action="{{ route('update_product', ['id' => $product->id, 'action' => 'update_price']) }}"
                                    method="post" class="w-[75px]">
                                    @csrf
                                    @method('put')
                                    <input type="number" name="price.{{ $product->id }}" id="price.{{ $product->id }}"
                                        class="w-full p-1.5 border outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 rounded @error('price.{{ $product->id }}') ring-2 ring-offset-2 ring-red-400 @enderror"
                                        value="{{ $product->price }}">
                                </form>
                            </td>
                            <td>
                                <div class="flex items-center gap-x-2">
                                    <form
                                        action="{{ route('update_product', ['id' => $product->id, 'action' => 'decrement']) }}"
                                        method="post">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1.5 rounded">
                                            -
                                        </button>
                                    </form>
                                    <form action="{{ route('update_product', ['id' => $product->id]) }}" method="post"
                                        class="w-[75px]">
                                        @csrf
                                        @method('put')
                                        <input type="number" name="quantity.{{ $product->id }}"
                                            id="quantity.{{ $product->id }}"
                                            class="w-full p-1.5 border outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 rounded @error('quantity.{{ $product->id }}') ring-2 ring-offset-2 ring-red-400 @enderror"
                                            value="{{ $product->quantity }}">
                                    </form>
                                    <form
                                        action="{{ route('update_product', ['id' => $product->id, 'action' => 'increment']) }}"
                                        method="post">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="bg-green-500 text-white px-3 py-1.5 rounded">
                                            +
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('remove_product', ['id' => $product->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="text-xs font-medium bg-red-500 text-white px-2.5 py-2 rounded">
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
        @else
            <p>You haven't added any products.</p>
        @endif
    </div>
@endsection
