@extends('layouts.app')

@section('title', 'Login - Stay & Travel Morocco')

@section('styles')
<style>
    .auth-container {
        background-color: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .auth-header {
        background: linear-gradient(135deg, #146eb4 0%, #1b9aaa 100%);
        position: relative;
    }
    
    .auth-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 10px;
        background-image: url("data:image/svg+xml,%3Csvg width='100' height='10' viewBox='0 0 100 10' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 10 L10 0 L20 10 L30 0 L40 10 L50 0 L60 10 L70 0 L80 10 L90 0 L100 10 L100 10 L0 10' fill='white'/%3E%3C/svg%3E");
        background-size: 100px 10px;
        background-repeat: repeat-x;
    }
    
    .form-input {
        border-width: 1px;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        width: 100%;
        transition: all 0.2s;
    }
    
    .form-input:focus {
        border-color: #d62828;
        box-shadow: 0 0 0 2px rgba(214, 40, 40, 0.1);
        outline: none;
    }
    
    .btn-moroccan {
        background-color: #d62828;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.2s;
        width: 100%;
    }
    
    .btn-moroccan:hover {
        background-color: #b82020;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(214, 40, 40, 0.3);
    }
    
    .moroccan-divider {
        display: flex;
        align-items: center;
        text-align: center;
        margin: 1.5rem 0;
        color: #6b7280;
    }
    
    .moroccan-divider::before,
    .moroccan-divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .moroccan-divider::before {
        margin-right: 1rem;
    }
    
    .moroccan-divider::after {
        margin-left: 1rem;
    }
    
    .social-login-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        transition: all 0.2s;
        font-weight: 500;
        width: 100%;
    }
    
    .social-login-btn:hover {
        background-color: #f9fafb;
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    
    .checkbox-moroccan {
        border-radius: 4px;
        border-color: #d1d5db;
    }
    
    .checkbox-moroccan:checked {
        background-color: #d62828;
        border-color: #d62828;
    }
    
    .link-moroccan {
        color: #d62828;
        transition: all 0.2s;
        font-weight: 500;
    }
    
    .link-moroccan:hover {
        color: #b82020;
        text-decoration: underline;
    }
    
    .auth-decoration {
        position: absolute;
        z-index: 0;
        opacity: 0.1;
    }
    
    .auth-decoration-1 {
        bottom: 10%;
        left: 5%;
        font-size: 4rem;
        transform: rotate(-15deg);
    }
    
    .auth-decoration-2 {
        top: 15%;
        right: 5%;
        font-size: 2.5rem;
        transform: rotate(15deg);
    }
</style>
@endsection

@section('content')
<div class="min-h-screen py-12 flex flex-col justify-center sm:px-6 lg:px-8 moroccan-pattern-subtle">
    <div class="sm:mx-auto sm:w-full sm:max-w-md mb-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-900 font-serif">
                Welcome Back
            </h1>
            <p class="mt-2 text-sm text-gray-600">
                Sign in to continue your Moroccan journey
            </p>
        </div>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="auth-container relative">
            <div class="auth-header py-6 px-8 text-white text-center relative overflow-hidden">
                <h2 class="text-2xl font-bold font-serif relative z-10">Login to Your Account</h2>
                <p class="mt-1 text-blue-100 relative z-10">Experience the magic of Morocco</p>
                
                <i class="fas fa-moon auth-decoration auth-decoration-1"></i>
                <i class="fas fa-star auth-decoration auth-decoration-2"></i>
            </div>
            
            <form method="POST" action="{{ route('login.submit') }}" class="py-8 px-8 relative z-10">
                @csrf
                
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="far fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            class="form-input pl-10 @error('email') border-red-500 @enderror">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-gray-700 text-sm font-medium">Password</label>
                        <a href="{{ route('password.request') }}" class="text-xs link-moroccan">
                            Forgot password?
                        </a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" name="password" id="password" required autocomplete="current-password"
                            class="form-input pl-10 @error('password') border-red-500 @enderror">
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex items-center mb-6">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                        class="h-4 w-4 checkbox-moroccan">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                        Remember me
                    </label>
                </div>
                
                <div class="mb-6">
                    <button type="submit" class="btn-moroccan">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                    </button>
                </div>
                
                <div class="moroccan-divider">
                    <span class="px-2 text-sm">Or</span>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <a href="#" class="social-login-btn">
                        <i class="fab fa-google text-red-500 mr-2"></i> Google
                    </a>
                    <a href="#" class="social-login-btn">
                        <i class="fab fa-facebook-f text-blue-600 mr-2"></i> Facebook
                    </a>
                </div>
                
                <div class="text-center text-gray-600 text-sm">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="link-moroccan">Register now</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection