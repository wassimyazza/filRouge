@extends('layouts.app')

@section('title', 'Register - Stay & Travel')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <div class="py-4 px-6 bg-blue-600 text-white text-center">
        <h2 class="text-2xl font-bold">Create an Account</h2>
        <p class="mt-1 text-blue-100">Join Stay & Travel today</p>
    </div>
    
    <form method="POST" action="{{ route('register.submit') }}" class="py-6 px-8">
        @csrf
        
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Full Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                class="appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 @error('name') border-red-500 @enderror">
        </div>
        
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email"
                class="appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 @error('email') border-red-500 @enderror">
        </div>
        
        <div class="mb-4">
            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone Number (Optional)</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" autocomplete="tel"
                class="appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 @error('phone') border-red-500 @enderror">
        </div>
        
        <div class="mb-4">
            <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Account Type</label>
            <select name="role" id="role" required
                class="appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 @error('role') border-red-500 @enderror">
                <option value="">Select account type</option>
                <option value="traveler" {{ old('role') == 'traveler' ? 'selected' : '' }}>Traveler - I want to book properties</option>
                <option value="host" {{ old('role') == 'host' ? 'selected' : '' }}>Host - I want to list my properties</option>
            </select>
        </div>
        
        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input type="password" name="password" id="password" required autocomplete="new-password"
                class="appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 @error('password') border-red-500 @enderror">
            <p class="text-gray-500 text-xs mt-1">Must be at least 8 characters</p>
        </div>
        
        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password"
                class="appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:border-blue-500">
        </div>
        
        <div class="mb-6">
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150">
                Register
            </button>
        </div>
        
        <div class="text-center text-gray-600 text-sm">
            Already have an account? 
            <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800">Login here</a>
        </div>
    </form>
</div>
@endsection
