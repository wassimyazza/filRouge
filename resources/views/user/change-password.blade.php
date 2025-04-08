@extends('layouts.app')

@section('title', 'Change Password - Stay & Travel Morocco')

@section('styles')
<style>
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
    }
    
    .btn-moroccan:hover {
        background-color: #b82020;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(214, 40, 40, 0.3);
    }
    
    .btn-cancel {
        background-color: #f3f4f6;
        color: #4b5563;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.2s;
    }
    
    .btn-cancel:hover {
        background-color: #e5e7eb;
        transform: translateY(-2px);
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
    
    .page-header {
        background: linear-gradient(135deg, #146eb4 0%, #1b9aaa 100%);
        border-radius: 12px 12px 0 0;
        position: relative;
        overflow: hidden;
    }
    
    .page-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 6px;
        background-image: url("data:image/svg+xml,%3Csvg width='100' height='6' viewBox='0 0 100 6' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 6 L10 0 L20 6 L30 0 L40 6 L50 0 L60 6 L70 0 L80 6 L90 0 L100 6 L100 6 L0 6' fill='white'/%3E%3C/svg%3E");
        background-size: 100px 6px;
        background-repeat: repeat-x;
    }
    
    .form-card {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .warning-box {
        background-color: rgba(245, 158, 11, 0.1);
        border-left: 4px solid #f59e0b;
        border-radius: 4px;
        padding: 1rem;
        display: flex;
        align-items: flex-start;
    }
    
    .warning-icon {
        color: #f59e0b;
        margin-right: 0.75rem;
        font-size: 1.25rem;
        margin-top: 0.1rem;
    }
</style>
@endsection

@section('content')
<div class="container mx-auto px-4 py-10">
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900 font-serif">Change Password</h1>
            <p class="text-gray-600 mt-2">Update your password to keep your account secure</p>
        </div>
        
        <div class="form-card bg-white">
            <div class="page-header px-6 py-4 text-white flex items-center justify-between">
                <h2 class="text-xl font-bold">Password Settings</h2>
                <a href="{{ route('profile') }}" class="text-white opacity-90 hover:opacity-100 flex items-center transition">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Profile
                </a>
            </div>
            
            <form method="POST" action="{{ route('password.update') }}" class="p-6">
                @csrf
                @method('PUT')
                
                <div class="mb-5">
                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" name="current_password" id="current_password" required
                            class="form-input pl-10 @error('current_password') border-red-500 @enderror">
                    </div>
                    @error('current_password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-key text-gray-400"></i>
                        </div>
                        <input type="password" name="password" id="password" required
                            class="form-input pl-10 @error('password') border-red-500 @enderror">
                        <div class="password-strength">
                            <div class="password-strength-bar" id="passwordStrength"></div>
                        </div>
                    </div>
                    <p class="mt-1 text-sm text-gray-500">Minimum 8 characters, with at least one letter and one number</p>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-shield-alt text-gray-400"></i>
                        </div>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                            class="form-input pl-10">
                    </div>
                </div>
                
                <div class="mb-6 warning-box">
                    <div class="warning-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div>
                        <p class="text-sm text-yellow-800">
                            For security, changing your password will log you out of all other devices. You'll need to log in again with your new password.
                        </p>
                    </div>
                </div>
                
                <div class="flex justify-end">
                    <a href="{{ route('profile') }}" class="btn-cancel mr-3">
                        Cancel
                    </a>
                    <button type="submit" class="btn-moroccan">
                        <i class="fas fa-check mr-2"></i> Update Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
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