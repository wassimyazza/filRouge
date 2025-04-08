@extends('layouts.app')

@section('title', 'My Profile - Stay & Travel Morocco')

@section('styles')
<style>
    /* Import fonts */
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap');
    
    /* Global styles and variables */
    :root {
        /* Primary Colors */
        --primary-900: #0f3460;
        --primary-800: #16498c;
        --primary-700: #1e5daa;
        --primary-600: #2571c8;
        --primary-500: #3084e3;
        --primary-400: #5a9fe8;
        --primary-300: #84b9ee;
        --primary-200: #aed3f4;
        --primary-100: #d9ecfa;
        --primary-50: #eef7ff;
        
        /* Accent Colors */
        --accent-900: #8c2a0d;
        --accent-800: #b33410;
        --accent-700: #d03f12;
        --accent-600: #e84914;
        --accent-500: #f65d17;
        --accent-400: #ff7e42;
        --accent-300: #ff9a69;
        --accent-200: #ffb690;
        --accent-100: #ffd2b8;
        --accent-50: #fff0e8;
        
        /* Neutrals */
        --neutral-900: #111827;
        --neutral-800: #1f2937;
        --neutral-700: #374151;
        --neutral-600: #4b5563;
        --neutral-500: #6b7280;
        --neutral-400: #9ca3af;
        --neutral-300: #d1d5db;
        --neutral-200: #e5e7eb;
        --neutral-100: #f3f4f6;
        --neutral-50: #f9fafb;
        
        /* Functional Colors */
        --success-500: #10b981;
        --success-100: #d1fae5;
        --warning-500: #f59e0b;
        --warning-100: #fef3c7;
        --error-500: #ef4444;
        --error-100: #fee2e2;
        --info-500: #3b82f6;
        --info-100: #dbeafe;
        
        /* Fonts */
        --font-primary: 'Poppins', sans-serif;
        --font-display: 'Playfair Display', serif;
    }
    
    /* Page container */
    .page-container {
        background-color: var(--neutral-50);
        min-height: calc(100vh - 64px);
    }
    
    /* Profile container */
    .profile-card {
        background-color: white;
        border-radius: 1rem;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }
    
    /* Profile header */
    .profile-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    
    .profile-title {
        font-family: var(--font-display);
        font-size: 1.75rem;
        font-weight: 600;
        color: var(--neutral-800);
        position: relative;
        padding-bottom: 0.5rem;
    }
    
    .profile-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 40px;
        background: linear-gradient(to right, var(--primary-500), var(--accent-500));
    }
    
    /* Action buttons */
    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.6rem 1.2rem;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.2s;
        margin-right: 0.5rem;
        font-family: var(--font-primary);
    }
    
    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .btn-primary {
        background-color: var(--primary-500);
        color: white;
    }
    
    .btn-primary:hover {
        background-color: var(--primary-600);
    }
    
    .btn-secondary {
        background-color: var(--neutral-100);
        color: var(--neutral-700);
    }
    
    .btn-secondary:hover {
        background-color: var(--neutral-200);
    }
    
    .btn-danger {
        background-color: var(--error-100);
        color: var(--error-500);
    }
    
    .btn-danger:hover {
        background-color: var(--error-200);
    }
    
    /* Profile image section */
    .profile-image-container {
        text-align: center;
        padding: 2rem;
        border-bottom: 1px solid var(--neutral-200);
        background-color: var(--primary-50);
        position: relative;
    }
    
    .profile-image {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        margin: 0 auto 1.25rem;
    }
    
    .profile-placeholder {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        background-color: var(--primary-200);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.25rem;
        border: 4px solid white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .profile-name {
        font-family: var(--font-display);
        font-size: 1.75rem;
        font-weight: 600;
        color: var(--neutral-800);
        margin-bottom: 0.25rem;
    }
    
    .profile-role {
        color: var(--neutral-600);
        font-size: 1rem;
    }
    
    /* Profile information section */
    .account-info-section {
        padding: 2rem;
    }
    
    .section-title {
        font-family: var(--font-display);
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--neutral-800);
        margin-bottom: 1.5rem;
        position: relative;
        padding-bottom: 0.5rem;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        height: 2px;
        width: 40px;
        background: linear-gradient(to right, var(--primary-500), var(--accent-500));
    }
    
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 1.5rem;
    }
    
    .info-item {
        margin-bottom: 1.25rem;
    }
    
    .info-label {
        font-size: 0.875rem;
        color: var(--neutral-500);
        font-weight: 500;
        margin-bottom: 0.35rem;
    }
    
    .info-value {
        color: var(--neutral-800);
        font-weight: 500;
    }
    
    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.25rem 0.75rem;
        border-radius: 2rem;
        font-size: 0.75rem;
        font-weight: 600;
    }
    
    .status-active {
        background-color: var(--success-100);
        color: var(--success-500);
    }
    
    .status-inactive {
        background-color: var(--error-100);
        color: var(--error-500);
    }
    
    /* Quick access section */
    .quick-access-section {
        padding: 2rem;
        border-top: 1px solid var(--neutral-200);
        background-color: var(--neutral-50);
    }
    
    .quick-access-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1rem;
    }
    
    .quick-card {
        background-color: white;
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        padding: 1.25rem;
        transition: all 0.2s ease;
        border: 1px solid var(--neutral-200);
    }
    
    .quick-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }
    
    .icon-circle {
        width: 3rem;
        height: 3rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        flex-shrink: 0;
    }
    
    .quick-content {
        flex: 1;
    }
    
    .quick-title {
        font-weight: 600;
        color: var(--neutral-800);
        margin-bottom: 0.25rem;
    }
    
    .quick-description {
        font-size: 0.875rem;
        color: var(--neutral-500);
    }
    
    /* Card themes */
    .trips-card .icon-circle {
        background-color: var(--primary-100);
        color: var(--primary-700);
    }
    
    .trips-card:hover {
        border-color: var(--primary-300);
    }
    
    .properties-card .icon-circle {
        background-color: var(--accent-100);
        color: var(--accent-700);
    }
    
    .properties-card:hover {
        border-color: var(--accent-300);
    }
    
    .reservations-card .icon-circle {
        background-color: var(--info-100);
        color: var(--info-500);
    }
    
    .reservations-card:hover {
        border-color: var(--info-300);
    }
    
    .earnings-card .icon-circle {
        background-color: var(--success-100);
        color: var(--success-500);
    }
    
    .earnings-card:hover {
        border-color: var(--success-300);
    }
    
    .admin-card .icon-circle {
        background-color: var(--neutral-200);
        color: var(--neutral-700);
    }
    
    .admin-card:hover {
        border-color: var(--neutral-400);
    }
    
    .messages-card .icon-circle {
        background-color: var(--warning-100);
        color: var(--warning-500);
    }
    
    .messages-card:hover {
        border-color: var(--warning-300);
    }
    
    .transactions-card .icon-circle {
        background-color: var(--success-100);
        color: var(--success-500);
    }
    
    .transactions-card:hover {
        border-color: var(--success-300);
    }
    
    /* Responsive design */
    @media (max-width: 768px) {
        .action-buttons {
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .action-btn {
            width: 100%;
            margin-right: 0;
            margin-bottom: 0.5rem;
        }
        
        .info-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="page-container py-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Sidebar -->
            <div class="w-full md:w-1/4">
                @include('partials.sidebar', ['sidebar_title' => 'Traveler Dashboard'])
            </div>
            
            <!-- Main Content -->
            <div class="w-full md:w-3/4">
                <div class="profile-header">
                    <h1 class="profile-title">My Profile</h1>
                    <div class="action-buttons flex flex-wrap">
                        <a href="{{ route('profile.edit') }}" class="action-btn btn-primary">
                            <i class="fas fa-edit mr-2"></i> Edit Profile
                        </a>
                        <a href="{{ route('password.change') }}" class="action-btn btn-secondary">
                            <i class="fas fa-lock mr-2"></i> Change Password
                        </a>
                    </div>
                </div>
                
                <div class="profile-card">
                    <!-- Profile Image Section -->
                    <div class="profile-image-container">
                        @if($user->profile_image)
                            <img src="{{ asset('storage/profiles/' . $user->profile_image) }}" alt="{{ $user->name }}" class="profile-image">
                        @else
                            <div class="profile-placeholder">
                                <i class="fas fa-user text-4xl text-white"></i>
                            </div>
                        @endif
                        <h1 class="profile-name">{{ $user->name }}</h1>
                        <p class="profile-role">{{ ucfirst($user->role) }}</p>
                    </div>
                    
                    <!-- Account Information Section -->
                    <div class="account-info-section">
                        <h2 class="section-title">Account Information</h2>
                        
                        <div class="info-grid">
                            <div class="info-item">
                                <h3 class="info-label">Email</h3>
                                <p class="info-value">{{ $user->email }}</p>
                            </div>
                            
                            <div class="info-item">
                                <h3 class="info-label">Phone</h3>
                                <p class="info-value">{{ $user->phone ?? 'Not provided' }}</p>
                            </div>
                            
                            <div class="info-item">
                                <h3 class="info-label">Account Type</h3>
                                <p class="info-value">{{ ucfirst($user->role) }}</p>
                            </div>
                            
                            <div class="info-item">
                                <h3 class="info-label">Account Status</h3>
                                <p>
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
                            
                            <div class="info-item">
                                <h3 class="info-label">Member Since</h3>
                                <p class="info-value">{{ $user->created_at->format('F d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quick Access Section -->
                    <div class="quick-access-section">
                        <h2 class="section-title">Quick Access</h2>
                        
                        <div class="quick-access-grid">
                            @if($user->isTraveler())
                                <a href="{{ route('reservations.index') }}" class="quick-card trips-card">
                                    <div class="icon-circle">
                                        <i class="fas fa-suitcase"></i>
                                    </div>
                                    <div class="quick-content">
                                        <h3 class="quick-title">My Trips</h3>
                                        <p class="quick-description">View your bookings</p>
                                    </div>
                                </a>
                            @endif
                            
                            @if($user->isHost())
                                <a href="{{ route('host.properties') }}" class="quick-card properties-card">
                                    <div class="icon-circle">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <div class="quick-content">
                                        <h3 class="quick-title">My Properties</h3>
                                        <p class="quick-description">Manage your listings</p>
                                    </div>
                                </a>
                                
                                <a href="{{ route('host.reservations') }}" class="quick-card reservations-card">
                                    <div class="icon-circle">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <div class="quick-content">
                                        <h3 class="quick-title">Reservations</h3>
                                        <p class="quick-description">Manage bookings</p>
                                    </div>
                                </a>
                                
                                <a href="{{ route('withdrawals.index') }}" class="quick-card earnings-card">
                                    <div class="icon-circle">
                                        <i class="fas fa-money-bill-wave"></i>
                                    </div>
                                    <div class="quick-content">
                                        <h3 class="quick-title">Earnings</h3>
                                        <p class="quick-description">View and withdraw funds</p>
                                    </div>
                                </a>
                            @endif
                            
                            @if($user->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="quick-card admin-card">
                                    <div class="icon-circle">
                                        <i class="fas fa-tachometer-alt"></i>
                                    </div>
                                    <div class="quick-content">
                                        <h3 class="quick-title">Admin Dashboard</h3>
                                        <p class="quick-description">Site management</p>
                                    </div>
                                </a>
                            @endif
                            
                            <a href="{{ route('messages.index') }}" class="quick-card messages-card">
                                <div class="icon-circle">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="quick-content">
                                    <h3 class="quick-title">Messages</h3>
                                    <p class="quick-description">View conversations</p>
                                </div>
                            </a>
                            
                            <a href="{{ route('transactions.index') }}" class="quick-card transactions-card">
                                <div class="icon-circle">
                                    <i class="fas fa-receipt"></i>
                                </div>
                                <div class="quick-content">
                                    <h3 class="quick-title">Transactions</h3>
                                    <p class="quick-description">View payment history</p>
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