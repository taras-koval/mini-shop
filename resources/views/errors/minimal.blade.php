@extends('layouts.app')

@section('title', __('Not Found'))

@section('content')
    <div class="relative flex items-center justify-center mt-64 bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
                <div class="px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider">
                    @yield('code')
                </div>
                <div class="ml-4 text-lg text-gray-500 uppercase tracking-wider">
                    @yield('message')
                </div>
            </div>
        </div>
    </div>
@endsection
