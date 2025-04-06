@extends('layouts.app')

@section('title', 'Login - Stay & Travel')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <div class="py-4 px-6 bg-blue-600 text-white text-center">
        <h2 class="text-2xl font-bold">Login to Your Account</h2>
        <p class="mt-1 text-blue-100">Welcome back to Stay & Travel</p>
    </div>
    
    <form method="POST" action="{{ route('login.submit') }}" class="py-6 px-8">
        @csrf
        
        <div class="mb-6">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                class="appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 @error('email') border-red-500 @enderror">
        </div>
        
        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input type="password" name="password" id="password" required autocomplete="current-password"
                class="appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 @error('password') border-red-500 @enderror">
        </div>
        
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-700">
                    Remember me
                </label>
            </div>
            
            <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800">
                Forgot your password?
            </a>
        </div>
        
        <div class="mb-6">
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150">
                Login
            </button>
        </div>
        
        <div class="text-center text-gray-600 text-sm">
            Don't have an account? 
            <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800">Register now</a>
        </div>
    </form>
</div>
@endsection
