@extends('layouts.app')

@section('title', 'Forgot Password - Stay & Travel')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <div class="py-4 px-6 bg-blue-600 text-white text-center">
        <h2 class="text-2xl font-bold">Forgot Your Password?</h2>
        <p class="mt-1 text-blue-100">We'll send you a link to reset it</p>
    </div>
    
    <form method="POST" action="{{ route('password.email') }}" class="py-6 px-8">
        @csrf
        
        <div class="mb-6">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                class="appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 @error('email') border-red-500 @enderror">
            <p class="text-gray-500 text-xs mt-1">Enter the email address associated with your account</p>
        </div>
        
        <div class="mb-6">
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150">
                Send Password Reset Link
            </button>
        </div>
        
        <div class="text-center text-gray-600 text-sm">
            <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800">
                <i class="fas fa-arrow-left mr-1"></i> Back to Login
            </a>
        </div>
    </form>
</div>
@endsection
