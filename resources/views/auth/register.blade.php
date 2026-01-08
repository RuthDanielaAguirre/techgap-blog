@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center px-6 py-12">
    <div class="w-full max-w-md">
        <div class="bg-white border border-gray-200 rounded-lg p-8">
            <h1 class="text-2xl font-bold mb-2">Register</h1>
            <p class="text-gray-600 mb-8">Create a new account to access system features.</p>

            @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded text-red-600 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="/register" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Full Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        value="{{ old('name') }}"
                        placeholder="John Doe"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

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

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium mb-2">Password</label>
                        <input 
                            type="password" 
                            name="password" 
                            placeholder="Min. 8 characters"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Confirm Password</label>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            placeholder="Re-enter password"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2">Account Type</label>
                    <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Subscriber</option>
                        <option>Writer</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="flex items-start">
                        <input type="checkbox" required class="mr-2 mt-1">
                        <span class="text-sm text-gray-600">
                            I agree to the terms of service and privacy policy. This system is for authorized use only.
                        </span>
                    </label>
                </div>

                <button 
                    type="submit"
                    class="w-full bg-gray-900 text-white py-3 rounded-lg hover:bg-gray-800 transition font-medium"
                >
                    Create Account
                </button>
            </form>

            <div class="mt-6 pt-6 border-t border-gray-200 text-center">
                <span class="text-gray-600">Already have an account? </span>
                <a href="/login" class="text-blue-600 hover:text-blue-800 font-medium">Login here</a>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200">
                <p class="text-sm font-semibold mb-2">Registration Notes:</p>
                <ul class="text-xs text-gray-600 space-y-1">
                    <li>• Password validation via Laravel rules</li>
                    <li>• Email verification required</li>
                    <li>• Role assignment pending admin approval</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection