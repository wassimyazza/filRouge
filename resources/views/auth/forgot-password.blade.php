@extends('layouts.app')

@section('title', 'Forgot Password - Stay & Travel Morocco')

@section('styles')
<style>
    .auth-container {
        background-color: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .auth-header {
        background: linear-gradient(135deg, #1b9aaa 0%, #146eb4 100%);
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
        border-color: #1b9aaa;
        box-shadow: 0 0 0 2px rgba(27, 154, 170, 0.1);
        outline: none;
    }
    
    .btn-moroccan-teal {
        background-color: #1b9aaa;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.2s;
        width: 100%;
    }
    
    .btn-moroccan-teal:hover {
        background-color: #158693;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(27, 154, 170, 0.3);
    }
    
    .link-moroccan {
        color: #1b9aaa;
        transition: all 0.2s;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
    }
    
    .link-moroccan:hover {
        color: #158693;
        text-decoration: underline;
    }
    
    .auth-decoration {
        position: absolute;
        z-index: 0;
        opacity: 0.1;
    }
    
    .auth-decoration-1 {
        bottom: 10%;
        left: 8%;
        font-size: 3rem;
        transform: rotate(-15deg);
    }
    
    .auth-decoration-2 {
        top: 20%;
        right: 10%;
        font-size: 2rem;
        transform: rotate(10deg);
    }
    
    .illustration-container {
        display: flex;
        justify-content: center;
        margin-bottom: 1.5rem;
    }
    
    .illustration {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background-color: rgba(27, 154, 170, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: #1b9aaa;
    }
</style>
@endsection

@section('content')
<div class="min-h-screen py-12 flex flex-col justify-center sm:px-6 lg:px-8 moroccan-pattern-subtle">
    <div class="sm:mx-auto sm:w-full sm:max-w-md mb-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-900 font-serif">
                Password Recovery
            </h1>
            <p class="mt-2 text-sm text-gray-600">
                We'll help you get back to exploring Morocco
            </p>
        </div>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="auth-container relative">
            <div class="auth-header py-6 px-8 text-white text-center relative overflow-hidden">
                <h2 class="text-2xl font-bold font-serif relative z-10">Forgot Your Password?</h2>
                <p class="mt-1 text-blue-100 relative z-10">We'll send you a reset link</p>
                
                <i class="fas fa-key auth-decoration auth-decoration-1"></i>
                <i class="fas fa-envelope auth-decoration auth-decoration-2"></i>
            </div>
            
            <div class="py-8 px-8 relative z-10">
                <div class="illustration-container">
                    <div class="illustration">
                        <i class="fas fa-unlock-alt"></i>
                    </div>
                </div>
                
                @if (session('status'))
                    <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-check-circle text-green-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-700">
                                    {{ session('status') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
                
                <p class="text-gray-600 text-sm mb-6">
                    Enter your email address below and we'll send you a link to reset your password.
                </p>
                
                <form method="POST" action="{{ route('password.email') }}">
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
                        <button type="submit" class="btn-moroccan-teal">
                            <i class="fas fa-paper-plane mr-2"></i> Send Reset Link
                        </button>
                    </div>
                </form>
                
                <div class="text-center">
                    <a href="{{ route('login') }}" class="link-moroccan text-sm">
                        <i class="fas fa-arrow-left mr-2"></i> Back to Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection