@extends('layouts.app')

@section('content')
    <div class="bg-white p-8 shadow-md rounded-lg">
        <h2 class="text-2xl font-semibold mb-4">{{ $product->name }}</h2>
        <img src="{{ $product->getImage() }}" class="w-full mb-4" alt="{{ $product->name }}">
        <p class="text-gray-800 mb-4">{{ $product->description }}</p>
        <p class="text-gray-800 font-semibold mb-4">Price: ${{ $product->price }}</p>

        <div class="mt-4 flex justify-between items-center">
            <a href="{{ url()->previous() }}" class="text-blue-600 hover:underline">Back</a>
            <a href="{{ route('order.create', $product) }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Make Order</a>
        </div>
    </div>
@endsection
