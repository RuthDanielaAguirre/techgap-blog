@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center px-6">
    <div class="w-full max-w-md">
        <div class="bg-white border border-gray-200 rounded-lg p-8">
            <h1 class="text-2xl font-bold mb-2">Login</h1>
            <p class="text-gray-600 mb-8">Access your account to manage content and settings.</p>

            @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded text-red-600 text-sm">
                {{ $errors->first() }}
            </div>
            @endif

            <form action="/login" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Email Address</label>
                    <input 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        placeholder="user@example.com"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

                <div class="mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-sm font-medium">Password</label>
                        <a href="#" class="text-sm text-blue-600 hover:text-blue-800">Forgot?</a>
                    </div>
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="Enter your password"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

                <div class="mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" class="mr-2">
                        <span class="text-sm text-gray-600">Remember me for 30 days</span>
                    </label>
                </div>

                <button 
                    type="submit"
                    class="w-full bg-gray-900 text-white py-3 rounded-lg hover:bg-gray-800 transition font-medium"
                >
                    Login
                </button>
            </form>

            <div class="mt-6 pt-6 border-t border-gray-200 text-center">
                <span class="text-gray-600">Don't have an account? </span>
                <a href="/register" class="text-blue-600 hover:text-blue-800 font-medium">Register here</a>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200">
                <p class="text-sm font-semibold mb-2">System Information:</p>
                <ul class="text-xs text-gray-600 space-y-1">
                    <li>Auth: Laravel Sanctum</li>
                    <li>Session: Cookie-based</li>
                    <li>CSRF Protection: Enabled</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection