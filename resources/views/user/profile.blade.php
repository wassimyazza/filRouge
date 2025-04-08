@extends('layouts.app')

@section('title', 'My Profile - Stay & Travel Morocco')

@section('styles')
<style>
    .moroccan-profile-card {
        background-color: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .info-label {
        font-size: 0.875rem;
        color: #6b7280;
        font-weight: 500;
    }
    
    .info-value {
        color: #1f2937;
        font-weight: 500;
    }
    
    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    
    .status-active {
        background-color: #d1fae5;
        color: #065f46;
    }
    
    .status-inactive {
        background-color: #fee2e2;
        color: #b91c1c;
    }
    
    .quick-access-card {
        display: flex;
        align-items: center;
        padding: 1rem;
        border-radius: 12px;
        transition: all 0.2s ease;
        border: 1px solid #e5e7eb;
    }
    
    .quick-access-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        border-color: transparent;
    }
    
    .trips-card {
        background-color: #eef2ff;
        border-color: #e0e7ff;
    }
    
    .trips-card:hover {
        background-color: #e0e7ff;
    }
    
    .trips-icon {
        color: #4f46e5;
    }
    
    .properties-card {
        background-color: #fef2f2;
        border-color: #fee2e2;
    }
    
    .properties-card:hover {
        background-color: #fee2e2;
    }
    
    .properties-icon {
        color: #dc2626;
    }
    
    .reservations-card {
        background-color: #eff6ff;
        border-color: #dbeafe;
    }
    
    .reservations-card:hover {
        background-color: #dbeafe;
    }
    
    .reservations-icon {
        color: #2563eb;
    }
    
    .earnings-card {
        background-color: #ecfdf5;
        border-color: #d1fae5;
    }
    
    .earnings-card:hover {
        background-color: #d1fae5;
    }
    
    .earnings-icon {
        color: #059669;
    }
    
    .admin-card {
        background-color: #f3f4f6;
        border-color: #e5e7eb;
    }
    
    .admin-card:hover {
        background-color: #e5e7eb;
    }
    
    .admin-icon {
        color: #4b5563;
    }
    
    .messages-card {
        background-color: #fff7ed;
        border-color: #ffedd5;
    }
    
    .messages-card:hover {
        background-color: #ffedd5;
    }
    
    .messages-icon {
        color: #ea580c;
    }
    
    .transactions-card {
        background-color: #f0fdfa;
        border-color: #ccfbf1;
    }
    
    .transactions-card:hover {
        background-color: #ccfbf1;
    }
    
    .transactions-icon {
        color: #0d9488;
    }
    
    .icon-circle {
        width: 3rem;
        height: 3rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: rgba(255, 255, 255, 0.8);
        margin-right: 1rem;
        font-size: 1.25rem;
    }
    
    .profile-image {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid white;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        margin: 0 auto 1.5rem;
    }
    
    .profile-placeholder {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        background-color: #d1d5db;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        border: 4px solid white;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    
    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.2s;
        margin-right: 0.5rem;
    }
    
    .btn-edit {
        background-color: #dbeafe;
        color: #1e40af;
    }
    
    .btn-edit:hover {
        background-color: #bfdbfe;
    }
    
    .btn-password {
        background-color: #fee2e2;
        color: #b91c1c;
    }
    
    .btn-password:hover {
        background-color: #fecaca;
    }
    
    .profile-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }
</style>
@endsection

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row">
        <!-- Including the exact same sidebar from the reservations page -->
        <div class="w-full md:w-1/4 mb-8 md:mb-0 md:pr-6">
            @include('partials.sidebar', ['sidebar_title' => 'Traveler Dashboard'])
        </div>
        
        <!-- Main Content -->
        <div class="w-full md:w-3/4">
            <div class="profile-header">
                <h1 class="text-2xl font-bold text-gray-900">My Profile</h1>
                <div>
                    <a href="{{ route('profile.edit') }}" class="action-btn btn-edit">
                        <i class="fas fa-edit mr-2"></i> Edit Profile
                    </a>
                    <a href="{{ route('password.change') }}" class="action-btn btn-password">
                        <i class="fas fa-lock mr-2"></i> Change Password
                    </a>
                </div>
            </div>
            
            <div class="moroccan-profile-card">
                <div class="p-6">
                    <div class="text-center mb-8">
                        @if($user->profile_image)
                            <img src="{{ asset('storage/profiles/' . $user->profile_image) }}" alt="{{ $user->name }}" class="profile-image">
                        @else
                            <div class="profile-placeholder">
                                <i class="fas fa-user text-5xl text-white"></i>
                            </div>
                        @endif
                        <h1 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h1>
                        <p class="text-gray-600">{{ ucfirst($user->role) }}</p>
                    </div>
                    
                    <h2 class="text-xl font-bold text-gray-800 mb-6 font-serif">Account Information</h2>
                    
                    <div class="space-y-5">
                        <div>
                            <h3 class="info-label">Email</h3>
                            <p class="info-value mt-1">{{ $user->email }}</p>
                        </div>
                        
                        <div>
                            <h3 class="info-label">Phone</h3>
                            <p class="info-value mt-1">{{ $user->phone ?? 'Not provided' }}</p>
                        </div>
                        
                        <div>
                            <h3 class="info-label">Account Type</h3>
                            <p class="info-value mt-1">{{ ucfirst($user->role) }}</p>
                        </div>
                        
                        <div>
                            <h3 class="info-label">Account Status</h3>
                            <p class="mt-1">
                                @if($user->is_active)
                                    <span class="status-badge status-active">
                                        <i class="fas fa-check-circle mr-1"></i> Active
                                    </span>
                                @else
                                    <span class="status-badge status-inactive">
                                        <i class="fas fa-times-circle mr-1"></i> Inactive
                                    </span>
                                @endif
                            </p>
                        </div>
                        
                        <div>
                            <h3 class="info-label">Member Since</h3>
                            <p class="info-value mt-1">{{ $user->created_at->format('F d, Y') }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-10 pt-6 border-t border-gray-200">
                        <h2 class="text-xl font-bold text-gray-800 mb-6 font-serif">Quick Access</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @if($user->isTraveler())
                                <a href="{{ route('reservations.index') }}" class="quick-access-card trips-card">
                                    <div class="icon-circle trips-icon">
                                        <i class="fas fa-suitcase"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900">My Trips</h3>
                                        <p class="text-sm text-gray-600">View your bookings</p>
                                    </div>
                                </a>
                            @endif
                            
                            @if($user->isHost())
                                <a href="{{ route('host.properties') }}" class="quick-access-card properties-card">
                                    <div class="icon-circle properties-icon">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900">My Properties</h3>
                                        <p class="text-sm text-gray-600">Manage your listings</p>
                                    </div>
                                </a>
                                
                                <a href="{{ route('host.reservations') }}" class="quick-access-card reservations-card">
                                    <div class="icon-circle reservations-icon">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900">Reservations</h3>
                                        <p class="text-sm text-gray-600">Manage bookings</p>
                                    </div>
                                </a>
                                
                                <a href="{{ route('withdrawals.index') }}" class="quick-access-card earnings-card">
                                    <div class="icon-circle earnings-icon">
                                        <i class="fas fa-money-bill-wave"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900">Earnings</h3>
                                        <p class="text-sm text-gray-600">View and withdraw funds</p>
                                    </div>
                                </a>
                            @endif
                            
                            @if($user->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="quick-access-card admin-card">
                                    <div class="icon-circle admin-icon">
                                        <i class="fas fa-tachometer-alt"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900">Admin Dashboard</h3>
                                        <p class="text-sm text-gray-600">Site management</p>
                                    </div>
                                </a>
                            @endif
                            
                            <a href="{{ route('messages.index') }}" class="quick-access-card messages-card">
                                <div class="icon-circle messages-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Messages</h3>
                                    <p class="text-sm text-gray-600">View conversations</p>
                                </div>
                            </a>
                            
                            <a href="{{ route('transactions.index') }}" class="quick-access-card transactions-card">
                                <div class="icon-circle transactions-icon">
                                    <i class="fas fa-receipt"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Transactions</h3>
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