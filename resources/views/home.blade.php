@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Products</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach ($products as $product)
            <div class="bg-white p-4 shadow-md rounded-lg">
                <img src="{{ $product->getImage() }}" class="w-full object-cover" alt="{{ $product->name }}">
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                    <p class="text-gray-800 text-lg font-semibold">${{ number_format($product->price, 2) }}</p>
                    <div class="mt-4 flex justify-between items-center">
                        <a href="{{ route('product.show', $product) }}" class="text-blue-600 hover:underline">View Details</a>
                        <a href="{{ route('order.create', $product) }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Make Order</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-5 mb-8 flex justify-center">
        {{ $products->links() }}
    </div>
@endsection
