@extends('layouts.app')

@section('title', 'My Profile - Stay & Travel')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="md:flex">
                <div class="md:w-1/3 bg-blue-600 p-6 text-center">
                    <div class="mb-4">
                        @if($user->profile_image)
                            <img src="{{ asset('storage/profiles/' . $user->profile_image) }}" alt="{{ $user->name }}" class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-white">
                        @else
                            <div class="w-32 h-32 rounded-full mx-auto bg-blue-500 flex items-center justify-center border-4 border-white">
                                <i class="fas fa-user text-5xl text-white"></i>
                            </div>
                        @endif
                    </div>
                    <h1 class="text-2xl font-bold text-white">{{ $user->name }}</h1>
                    <p class="text-blue-200 mt-1">{{ ucfirst($user->role) }}</p>
                    
                    <div class="mt-6 space-y-2">
                        <a href="{{ route('profile.edit') }}" class="block w-full bg-white text-blue-600 hover:bg-blue-50 py-2 px-4 rounded-md text-sm font-medium transition">
                            <i class="fas fa-edit mr-2"></i> Edit Profile
                        </a>
                        <a href="{{ route('password.change') }}" class="block w-full bg-blue-700 text-white hover:bg-blue-800 py-2 px-4 rounded-md text-sm font-medium transition">
                            <i class="fas fa-lock mr-2"></i> Change Password
                        </a>
                    </div>
                </div>
                
                <div class="md:w-2/3 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Account Information</h2>
                    
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Email</h3>
                            <p class="mt-1 text-gray-800">{{ $user->email }}</p>
                        </div>
                        
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Phone</h3>
                            <p class="mt-1 text-gray-800">{{ $user->phone ?? 'Not provided' }}</p>
                        </div>
                        
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Account Type</h3>
                            <p class="mt-1 text-gray-800">{{ ucfirst($user->role) }}</p>
                        </div>
                        
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Account Status</h3>
                            <p class="mt-1">
                                @if($user->is_active)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-check-circle mr-1"></i> Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <i class="fas fa-times-circle mr-1"></i> Inactive
                                    </span>
                                @endif
                            </p>
                        </div>
                        
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Member Since</h3>
                            <p class="mt-1 text-gray-800">{{ $user->created_at->format('F d, Y') }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Quick Access</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @if($user->isTraveler())
                                <a href="{{ route('reservations.index') }}" class="flex items-center p-3 bg-blue-50 hover:bg-blue-100 rounded-md transition">
                                    <i class="fas fa-suitcase text-blue-600 text-xl mr-3"></i>
                                    <div>
                                        <h3 class="font-medium text-blue-600">My Trips</h3>
                                        <p class="text-sm text-gray-600">View your bookings</p>
                                    </div>
                                </a>
                            @endif
                            
                            @if($user->isHost())
                                <a href="{{ route('host.properties') }}" class="flex items-center p-3 bg-blue-50 hover:bg-blue-100 rounded-md transition">
                                    <i class="fas fa-home text-blue-600 text-xl mr-3"></i>
                                    <div>
                                        <h3 class="font-medium text-blue-600">My Properties</h3>
                                        <p class="text-sm text-gray-600">Manage your listings</p>
                                    </div>
                                </a>
                                
                                <a href="{{ route('host.reservations') }}" class="flex items-center p-3 bg-blue-50 hover:bg-blue-100 rounded-md transition">
                                    <i class="fas fa-calendar-check text-blue-600 text-xl mr-3"></i>
                                    <div>
                                        <h3 class="font-medium text-blue-600">Reservations</h3>
                                        <p class="text-sm text-gray-600">Manage bookings</p>
                                    </div>
                                </a>
                                
                                <a href="{{ route('withdrawals.index') }}" class="flex items-center p-3 bg-blue-50 hover:bg-blue-100 rounded-md transition">
                                    <i class="fas fa-money-bill-wave text-blue-600 text-xl mr-3"></i>
                                    <div>
                                        <h3 class="font-medium text-blue-600">Earnings</h3>
                                        <p class="text-sm text-gray-600">View and withdraw funds</p>
                                    </div>
                                </a>
                            @endif
                            
                            @if($user->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center p-3 bg-blue-50 hover:bg-blue-100 rounded-md transition">
                                    <i class="fas fa-tachometer-alt text-blue-600 text-xl mr-3"></i>
                                    <div>
                                        <h3 class="font-medium text-blue-600">Admin Dashboard</h3>
                                        <p class="text-sm text-gray-600">Site management</p>
                                    </div>
                                </a>
                            @endif
                            
                            <a href="{{ route('messages.index') }}" class="flex items-center p-3 bg-blue-50 hover:bg-blue-100 rounded-md transition">
                                <i class="fas fa-envelope text-blue-600 text-xl mr-3"></i>
                                <div>
                                    <h3 class="font-medium text-blue-600">Messages</h3>
                                    <p class="text-sm text-gray-600">View conversations</p>
                                </div>
                            </a>
                            
                            <a href="{{ route('transactions.index') }}" class="flex items-center p-3 bg-blue-50 hover:bg-blue-100 rounded-md transition">
                                <i class="fas fa-receipt text-blue-600 text-xl mr-3"></i>
                                <div>
                                    <h3 class="font-medium text-blue-600">Transactions</h3>
                                    <p class="text-sm text-gray-600">View payment history</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
