@extends('layouts.app')

@section('title', 'Edit Profile - Stay & Travel Morocco')

@section('styles')
<style>
    .form-card {
        background-color: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .page-header {
        background: linear-gradient(135deg, #d62828 0%, #f77f00 100%);
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
    
    .profile-image-preview {
        width: 5rem;
        height: 5rem;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid white;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    
    .profile-placeholder {
        width: 5rem;
        height: 5rem;
        border-radius: 50%;
        background-color: #146eb4;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 3px solid white;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    
    .file-input-container {
        position: relative;
    }
    
    .custom-file-input {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }
    
    .custom-file-input input {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }
    
    .file-input-button {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1rem;
        background-color: #f3f4f6;
        color: #374151;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.2s;
    }
    
    .file-input-button:hover {
        background-color: #e5e7eb;
    }
    
    .file-input-text {
        margin-left: 0.5rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
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
</style>
@endsection

@section('content')
<div class="container mx-auto px-4 py-10">
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900 font-serif">Edit Profile</h1>
            <p class="text-gray-600 mt-2">Update your personal information</p>
        </div>
        
        <div class="form-card">
            <div class="page-header px-6 py-4 text-white flex items-center justify-between">
                <h2 class="text-xl font-bold">Personal Information</h2>
                <a href="{{ route('profile') }}" class="text-white opacity-90 hover:opacity-100 flex items-center transition">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Profile
                </a>
            </div>
            
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')
                
                <div class="mb-6">
                    <label for="profile_image" class="block text-sm font-medium text-gray-700 mb-3">Profile Picture</label>
                    <div class="flex items-center">
                        <div class="mr-5">
                            @if($user->profile_image)
                                <img src="{{ asset('storage/profiles/' . $user->profile_image) }}" alt="{{ $user->name }}" class="profile-image-preview">
                            @else
                                <div class="profile-placeholder">
                                    <i class="fas fa-user text-2xl text-white"></i>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <div class="file-input-container">
                                <label class="custom-file-input">
                                    <span class="file-input-button">
                                        <i class="fas fa-cloud-upload-alt mr-2"></i>
                                        <span>Choose Image</span>
                                    </span>
                                    <input type="file" name="profile_image" id="profile_image" class="hidden">
                                </label>
                                <p id="file-name" class="mt-2 text-sm text-gray-500">No file selected</p>
                            </div>
                            <p class="mt-2 text-xs text-gray-500">Accepted formats: JPEG, PNG, JPG. Max size 2MB.</p>
                            @error('profile_image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                            class="form-input pl-10 @error('name') border-red-500 @enderror">
                    </div>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" id="email" value="{{ $user->email }}" disabled
                            class="form-input pl-10 bg-gray-50 cursor-not-allowed text-gray-500">
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Email cannot be changed. Contact support for assistance.</p>
                </div>
                
                <div class="mb-6">
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number (Optional)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-phone-alt text-gray-400"></i>
                        </div>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                            class="form-input pl-10 @error('phone') border-red-500 @enderror">
                    </div>
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex justify-end">
                    <a href="{{ route('profile') }}" class="btn-cancel mr-3">
                        Cancel
                    </a>
                    <button type="submit" class="btn-moroccan">
                        <i class="fas fa-save mr-2"></i> Save Changes
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
        const fileInput = document.getElementById('profile_image');
        const fileNameDisplay = document.getElementById('file-name');
        
        fileInput.addEventListener('change', function() {
            if (this.files && this.files.length > 0) {
                fileNameDisplay.textContent = this.files[0].name;
            } else {
                fileNameDisplay.textContent = 'No file selected';
            }
        });
    });
</script>
@endsection