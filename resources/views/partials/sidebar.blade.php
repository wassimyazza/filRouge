<div class="w-full md:w-64 bg-white shadow-md rounded-lg overflow-hidden">
    <div class="p-4 bg-gradient-to-r from-moroccan-blue to-moroccan-teal text-white relative">
        <h2 class="text-lg font-serif font-bold relative z-10">
            @if(isset($sidebar_title))
                {{ $sidebar_title }}
            @else
                Dashboard
            @endif
        </h2>
        <div class="absolute top-0 right-0 left-0 bottom-0 opacity-10">
            <div class="pattern-dots-md text-white">
                <!-- Pattern background -->
            </div>
        </div>
    </div>
    
    <div class="py-2">
        @auth
            @if(Auth::user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="{{ route('admin.users') }}" class="sidebar-link {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                    <i class="fas fa-users"></i> Users
                </a>
                <a href="{{ route('admin.properties.pending') }}" class="sidebar-link {{ request()->routeIs('admin.properties.pending') ? 'active' : '' }}">
                    <i class="fas fa-home"></i> Pending Properties
                </a>
                <a href="{{ route('admin.reviews.pending') }}" class="sidebar-link {{ request()->routeIs('admin.reviews.pending') ? 'active' : '' }}">
                    <i class="fas fa-star"></i> Pending Reviews
                </a>
                <a href="{{ route('admin.withdrawals') }}" class="sidebar-link {{ request()->routeIs('admin.withdrawals') ? 'active' : '' }}">
                    <i class="fas fa-money-bill-wave"></i> Withdrawals
                </a>
            @endif
            
            @if(Auth::user()->isHost())
                <a href="{{ route('host.properties') }}" class="sidebar-link {{ request()->routeIs('host.properties') ? 'active' : '' }}">
                    <i class="fas fa-home"></i> My Properties
                </a>
                <a href="{{ route('properties.create') }}" class="sidebar-link {{ request()->routeIs('properties.create') ? 'active' : '' }}">
                    <i class="fas fa-plus-circle"></i> Add Property
                </a>
                <a href="{{ route('host.reservations') }}" class="sidebar-link {{ request()->routeIs('host.reservations') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check"></i> Reservations
                </a>
                <a href="{{ route('withdrawals.index') }}" class="sidebar-link {{ request()->routeIs('withdrawals.index') ? 'active' : '' }}">
                    <i class="fas fa-wallet"></i> Earnings
                </a>
            @endif
            
            @if(Auth::user()->isTraveler())
                <!-- Traveler Sidebar -->
                <a href="{{ route('reservations.index') }}" class="sidebar-link {{ request()->routeIs('reservations.index') ? 'active' : '' }}">
                    <i class="fas fa-suitcase"></i> My Trips
                </a>
            @endif
            
            <a href="{{ route('profile') }}" class="sidebar-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                <i class="fas fa-user"></i> Profile
            </a>
            <a href="{{ route('messages.index') }}" class="sidebar-link {{ request()->routeIs('messages.index') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i> Messages
            </a>
            <a href="{{ route('transactions.index') }}" class="sidebar-link {{ request()->routeIs('transactions.index') ? 'active' : '' }}">
                <i class="fas fa-receipt"></i> Transactions
            </a>
            <form method="POST" action="{{ route('logout') }}" class="sidebar-link-container">
                @csrf
                <button type="submit" class="sidebar-link-button">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        @else
            <!-- Guest Sidebar -->
            <a href="{{ route('login') }}" class="sidebar-link">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
            <a href="{{ route('register') }}" class="sidebar-link">
                <i class="fas fa-user-plus"></i> Register
            </a>
        @endauth
    </div>
</div>

<style>
    .sidebar-link {
        display: flex;
        align-items: center;
        padding: 0.75rem 1rem;
        color: #4b5563;
        font-weight: 500;
        transition: all 0.2s;
        border-left: 3px solid transparent;
    }
    
    .sidebar-link:hover {
        background-color: #f9fafb;
        color: #d62828;
    }
    
    .sidebar-link.active {
        background-color: #fef2f2;
        color: #d62828;
        border-left-color: #d62828;
    }
    
    .sidebar-link i {
        width: 1.5rem;
        text-align: center;
        margin-right: 0.75rem;
        font-size: 0.875rem;
    }
    
    .sidebar-link-container {
        padding: 0 1rem;
    }
    
    .sidebar-link-button {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 0.75rem 0;
        color: #4b5563;
        font-weight: 500;
        transition: all 0.2s;
        text-align: left;
    }
    
    .sidebar-link-button:hover {
        color: #d62828;
    }
    
    .sidebar-link-button i {
        width: 1.5rem;
        text-align: center;
        margin-right: 0.75rem;
        font-size: 0.875rem;
    }
    
    .pattern-dots-md {
        background-image: radial-gradient(currentColor 1px, transparent 1px);
        background-size: 5px 5px;
        width: 100%;
        height: 100%;
    }
</style>