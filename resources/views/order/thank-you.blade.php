@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center mt-24">
        <div class="text-center">
            <h2 class="text-2xl font-semibold mb-4">Thank You for Your Order!</h2>
            <p class="mb-4">Your order has been successfully created.</p>
            <a href="{{ route('home') }}" class="text-blue-600 hover:underline">Return to Home Page</a>
        </div>
    </div>
@endsection
