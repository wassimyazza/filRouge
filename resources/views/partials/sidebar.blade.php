<div class="w-full md:w-64 bg-white shadow-md rounded-lg overflow-hidden">
    <div class="p-4 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-800">
            @if(isset($sidebar_title))
                {{ $sidebar_title }}
            @else
                Dashboard
            @endif
        </h2>
    </div>
    
    <div class="py-2">
        @auth
            @if(Auth::user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-600' : '' }}">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
                <a href="{{ route('admin.users') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('admin.users') ? 'bg-blue-50 text-blue-600' : '' }}">
                    <i class="fas fa-users mr-2"></i> Users
                </a>
                <a href="{{ route('admin.properties.pending') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('admin.properties.pending') ? 'bg-blue-50 text-blue-600' : '' }}">
                    <i class="fas fa-home mr-2"></i> Pending Properties
                </a>
                <a href="{{ route('admin.reviews.pending') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('admin.reviews.pending') ? 'bg-blue-50 text-blue-600' : '' }}">
                    <i class="fas fa-star mr-2"></i> Pending Reviews
                </a>
                <a href="{{ route('admin.withdrawals') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('admin.withdrawals') ? 'bg-blue-50 text-blue-600' : '' }}">
                    <i class="fas fa-money-bill-wave mr-2"></i> Withdrawals
                </a>
            @endif
            
            @if(Auth::user()->isHost())
                <a href="{{ route('host.properties') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('host.properties') ? 'bg-blue-50 text-blue-600' : '' }}">
                    <i class="fas fa-home mr-2"></i> My Properties
                </a>
                <a href="{{ route('properties.create') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('properties.create') ? 'bg-blue-50 text-blue-600' : '' }}">
                    <i class="fas fa-plus-circle mr-2"></i> Add Property
                </a>
                <a href="{{ route('host.reservations') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('host.reservations') ? 'bg-blue-50 text-blue-600' : '' }}">
                    <i class="fas fa-calendar-check mr-2"></i> Reservations
                </a>
                <a href="{{ route('withdrawals.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('withdrawals.index') ? 'bg-blue-50 text-blue-600' : '' }}">
                    <i class="fas fa-wallet mr-2"></i> Earnings
                </a>
            @endif
            
            @if(Auth::user()->isTraveler())
                <!-- Traveler Sidebar -->
                <a href="{{ route('reservations.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('reservations.index') ? 'bg-blue-50 text-blue-600' : '' }}">
                    <i class="fas fa-suitcase mr-2"></i> My Trips
                </a>
            @endif
            
            <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('profile') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-user mr-2"></i> Profile
            </a>
            <a href="{{ route('messages.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('messages.index') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-envelope mr-2"></i> Messages
            </a>
            <a href="{{ route('transactions.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('transactions.index') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-receipt mr-2"></i> Transactions
            </a>
            <form method="POST" action="{{ route('logout') }}" class="block px-4 py-2">
                @csrf
                <button type="submit" class="text-gray-700 hover:text-red-600 w-full text-left">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </button>
            </form>
        @else
            <!-- Guest Sidebar -->
            <a href="{{ route('login') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                <i class="fas fa-sign-in-alt mr-2"></i> Login
            </a>
            <a href="{{ route('register') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                <i class="fas fa-user-plus mr-2"></i> Register
            </a>
        @endauth
    </div>
</div>
