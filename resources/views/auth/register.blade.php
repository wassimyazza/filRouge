@extends('layouts.app')

@section('title', 'Register - Stay & Travel Morocco')

@section('styles')
<style>
    .auth-container {
        background-color: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .auth-header {
        background: linear-gradient(135deg, #d62828 0%, #f77f00 100%);
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
    
    .form-select {
        border-width: 1px;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        width: 100%;
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.75rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        transition: all 0.2s;
    }
    
    .form-select:focus {
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
        top: 10%;
        right: 5%;
        font-size: 2.5rem;
        transform: rotate(15deg);
    }
    
    .auth-decoration-3 {
        top: 40%;
        left: 15%;
        font-size: 2rem;
        transform: rotate(-5deg);
    }
    
    .role-option {
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        padding: 1rem;
        transition: all 0.2s;
        cursor: pointer;
        position: relative;
    }
    
    .role-option:hover {
        border-color: #d1d5db;
        background-color: #f9fafb;
    }
    
    .role-option.selected {
        border-color: #d62828;
        background-color: rgba(214, 40, 40, 0.05);
    }
    
    .role-option input {
        position: absolute;
        opacity: 0;
    }
    
    .role-icon {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
        color: #4b5563;
    }
    
    .role-option.selected .role-icon {
        color: #d62828;
    }
    
    .role-option.selected .role-title {
        color: #d62828;
    }
    
    .password-strength {
        height: 4px;
        border-radius: 2px;
        margin-top: 0.5rem;
        background-color: #e5e7eb;
        overflow: hidden;
    }
    
    .password-strength-bar {
        height: 100%;
        width: 0;
        transition: width 0.3s ease;
    }
    
    .strength-weak { width: 25%; background-color: #ef4444; }
    .strength-medium { width: 50%; background-color: #f59e0b; }
    .strength-good { width: 75%; background-color: #10b981; }
    .strength-strong { width: 100%; background-color: #047857; }
</style>
@endsection

@section('content')
<div class="min-h-screen py-12 flex flex-col justify-center sm:px-6 lg:px-8 moroccan-pattern-subtle">
    <div class="sm:mx-auto sm:w-full sm:max-w-md mb-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-900 font-serif">
                Join Our Community
            </h1>
            <p class="mt-2 text-sm text-gray-600">
                Create an account to start exploring Morocco
            </p>
        </div>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="auth-container relative">
            <div class="auth-header py-6 px-8 text-white text-center relative overflow-hidden">
                <h2 class="text-2xl font-bold font-serif relative z-10">Create an Account</h2>
                <p class="mt-1 text-red-100 relative z-10">Discover the wonders of Morocco</p>
                
                <i class="fas fa-kaaba auth-decoration auth-decoration-1"></i>
                <i class="fas fa-star auth-decoration auth-decoration-2"></i>
                <i class="fas fa-moon auth-decoration auth-decoration-3"></i>
            </div>
            
            <form method="POST" action="{{ route('register.submit') }}" class="py-8 px-8 relative z-10">
                @csrf
                
                <div class="mb-5">
                    <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Full Name</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="far fa-user text-gray-400"></i>
                        </div>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            class="form-input pl-10 @error('name') border-red-500 @enderror">
                    </div>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="far fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email"
                            class="form-input pl-10 @error('email') border-red-500 @enderror">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="phone" class="block text-gray-700 text-sm font-medium mb-2">Phone Number (Optional)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-phone-alt text-gray-400"></i>
                        </div>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" autocomplete="tel"
                            class="form-input pl-10 @error('phone') border-red-500 @enderror">
                    </div>
                    @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Account Type</label>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="role-option {{ old('role') == 'traveler' ? 'selected' : '' }}" id="traveler-option">
                            <input type="radio" name="role" value="traveler" {{ old('role') == 'traveler' ? 'checked' : '' }} required>
                            <div class="text-center">
                                <div class="role-icon">
                                    <i class="fas fa-suitcase"></i>
                                </div>
                                <div class="role-title font-medium mb-1">Traveler</div>
                                <div class="text-xs text-gray-500">I want to book properties</div>
                            </div>
                        </label>
                        
                        <label class="role-option {{ old('role') == 'host' ? 'selected' : '' }}" id="host-option">
                            <input type="radio" name="role" value="host" {{ old('role') == 'host' ? 'checked' : '' }} required>
                            <div class="text-center">
                                <div class="role-icon">
                                    <i class="fas fa-home"></i>
                                </div>
                                <div class="role-title font-medium mb-1">Host</div>
                                <div class="text-xs text-gray-500">I want to list my properties</div>
                            </div>
                        </label>
                    </div>
                    @error('role')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" name="password" id="password" required autocomplete="new-password"
                            class="form-input pl-10 @error('password') border-red-500 @enderror">
                        <div class="password-strength">
                            <div class="password-strength-bar" id="passwordStrength"></div>
                        </div>
                    </div>
                    <p class="text-gray-500 text-xs mt-1">Must be at least 8 characters</p>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-medium mb-2">Confirm Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password"
                            class="form-input pl-10">
                    </div>
                </div>
                
                <div class="mb-6">
                    <button type="submit" class="btn-moroccan">
                        <i class="fas fa-user-plus mr-2"></i> Create Account
                    </button>
                </div>
                
                <div class="text-center text-gray-600 text-sm">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="link-moroccan">Login here</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Role selection
        const travelerOption = document.getElementById('traveler-option');
        const hostOption = document.getElementById('host-option');
        const travelerInput = travelerOption.querySelector('input');
        const hostInput = hostOption.querySelector('input');
        
        travelerOption.addEventListener('click', function() {
            travelerInput.checked = true;
            travelerOption.classList.add('selected');
            hostOption.classList.remove('selected');
        });
        
        hostOption.addEventListener('click', function() {
            hostInput.checked = true;
            hostOption.classList.add('selected');
            travelerOption.classList.remove('selected');
        });
        
        // If we have a value from old input, make sure it's selected
        if (travelerInput.checked) {
            travelerOption.classList.add('selected');
        } else if (hostInput.checked) {
            hostOption.classList.add('selected');
        }
        
        // Password strength meter
        const passwordInput = document.getElementById('password');
        const strengthBar = document.getElementById('passwordStrength');
        
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            
            // Length check
            if (password.length >= 8) {
                strength += 1;
            }
            
            // Character variety checks
            if (/[A-Z]/.test(password)) {
                strength += 1;
            }
            
            if (/[0-9]/.test(password)) {
                strength += 1;
            }
            
            if (/[^A-Za-z0-9]/.test(password)) {
                strength += 1;
            }
            
            // Update the strength bar
            strengthBar.className = "password-strength-bar";
            
            if (strength === 0) {
                strengthBar.classList.add('strength-weak');
                strengthBar.style.width = '0';
            } else if (strength === 1) {
                strengthBar.classList.add('strength-weak');
            } else if (strength === 2) {
                strengthBar.classList.add('strength-medium');
            } else if (strength === 3) {
                strengthBar.classList.add('strength-good');
            } else {
                strengthBar.classList.add('strength-strong');
            }
        });
    });
</script>
@endsection