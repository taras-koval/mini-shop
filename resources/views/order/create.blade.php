@extends('layouts.app')

@section('content')
    <div class="container flex flex-col md:flex-row">
        <div class="w-full md:w-1/2 mb-8 md:mb-0 md:mr-8">
            <div class="bg-white p-8 shadow-md rounded-lg">
                <h2 class="text-2xl font-semibold mb-4">{{ $product->name }}</h2>
                <img src="{{ $product->getImage() }}" class="w-full mb-4" alt="{{ $product->name }}">
                <p class="text-gray-800 mb-4">{{ $product->description }}</p>
                <p class="text-gray-800 font-semibold mb-4">Price: ${{ $product->price }}</p>
            </div>
        </div>
        <div class="w-full md:w-1/2">
            <div class="bg-white p-8 shadow-md rounded-lg">
                <h2 class="text-2xl font-semibold mb-4">Create Order</h2>

                <form action="{{ route('order.store', $product) }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="mb-4">
                        <label for="customer_name" class="block font-semibold">Name</label>
                        <input type="text" name="customer_name" id="customer_name"
                               class="w-full border p-2 rounded @error('customer_name') border-red-500 font-weight-bold @enderror"
                               value="{{ old('customer_name') }}">
                        @error('customer_name')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="customer_email" class="block font-semibold">Email</label>
                        <input type="email" name="customer_email" id="customer_email"
                               class="w-full border p-2 rounded @error('customer_email') border-red-500 @enderror"
                               value="{{ old('customer_email') }}">
                        @error('customer_email')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="customer_phone" class="block font-semibold">Phone <span class="text-gray-500 font-normal">(optional)</span></label>
                        <input type="tel" name="customer_phone" id="customer_phone"
                               class="w-full border p-2 rounded @error('customer_phone') border-red-500 @enderror"
                               value="{{ old('customer_phone') }}">
                        @error('customer_phone')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="comment" class="block font-semibold">Comment</label>
                        <textarea name="comment" id="comment" rows="4"
                                  class="w-full border p-2 rounded @error('comment') border-red-500 @enderror">{{ old('comment') }}</textarea>
                        @error('comment')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Make
                            Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
