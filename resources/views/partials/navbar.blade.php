<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold font-serif">
                    <i class="fas fa-kaaba mr-2 text-moroccan-red"></i>Stay<span class="text-moroccan-red">&</span>Travel
                </a>
            </div>
            
            <div class="hidden md:flex items-center space-x-1">
                <a href="{{ route('properties.index') }}" class="navbar-link {{ request()->routeIs('properties.index') ? 'active' : '' }}">Properties</a>
                
                @auth
                    @if(Auth::user()->isHost())
                        <a href="{{ route('host.properties') }}" class="navbar-link {{ request()->routeIs('host.properties') ? 'active' : '' }}">My Properties</a>
                        <a href="{{ route('host.reservations') }}" class="navbar-link {{ request()->routeIs('host.reservations') ? 'active' : '' }}">Reservations</a>
                        <a href="{{ route('withdrawals.index') }}" class="navbar-link {{ request()->routeIs('withdrawals.index') ? 'active' : '' }}">Earnings</a>
                    @endif
                    
                    @if(Auth::user()->isTraveler())
                        <a href="{{ route('reservations.index') }}" class="navbar-link {{ request()->routeIs('reservations.index') ? 'active' : '' }}">My Trips</a>
                    @endif
                    
                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="navbar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Admin</a>
                    @endif
                    
                    <!-- Messages with unread count -->
                    <a href="{{ route('messages.index') }}" class="navbar-link {{ request()->routeIs('messages.index') ? 'active' : '' }} relative">
                        <i class="fas fa-envelope mr-1"></i> Messages
                        <span id="unread-count" class="hidden absolute -top-2 -right-2 bg-moroccan-red text-white rounded-full w-5 h-5 flex items-center justify-center text-xs"></span>
                    </a>
                    
                    <!-- User Dropdown -->
                    <div class="relative ml-3" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center focus:outline-none" type="button">
                            <div class="h-8 w-8 rounded-full overflow-hidden border-2 border-gray-200">
                                @if(Auth::user()->profile_image)
                                    <img src="{{ asset('storage/profiles/' . Auth::user()->profile_image) }}" alt="{{ Auth::user()->name }}" class="h-full w-full object-cover">
                                @else
                                    <div class="h-full w-full bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-user text-gray-500"></i>
                                    </div>
                                @endif
                            </div>
                            <span class="ml-2 text-gray-700">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down ml-1 text-xs text-gray-500"></i>
                        </button>
                        
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-moroccan-red">
                                <i class="fas fa-user-circle mr-2"></i> Profile
                            </a>
                            <a href="{{ route('transactions.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-moroccan-red">
                                <i class="fas fa-receipt mr-2"></i> Transactions
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-moroccan-red">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="navbar-link">Login</a>
                    <a href="{{ route('register') }}" class="btn-primary ml-3">Register</a>
                @endauth
            </div>
            
            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button type="button" onclick="toggleMenu()" class="text-gray-700 hover:text-moroccan-red focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="py-3 space-y-1 border-t border-gray-200">
                <a href="{{ route('properties.index') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-50 hover:text-moroccan-red {{ request()->routeIs('properties.index') ? 'bg-gray-50 text-moroccan-red font-medium' : '' }}">
                    <i class="fas fa-search mr-2"></i> Properties
                </a>
                
                @auth
                    @if(Auth::user()->isHost())
                        <a href="{{ route('host.properties') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-50 hover:text-moroccan-red {{ request()->routeIs('host.properties') ? 'bg-gray-50 text-moroccan-red font-medium' : '' }}">
                            <i class="fas fa-home mr-2"></i> My Properties
                        </a>
                        <a href="{{ route('host.reservations') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-50 hover:text-moroccan-red {{ request()->routeIs('host.reservations') ? 'bg-gray-50 text-moroccan-red font-medium' : '' }}">
                            <i class="fas fa-calendar-check mr-2"></i> Reservations
                        </a>
                        <a href="{{ route('withdrawals.index') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-50 hover:text-moroccan-red {{ request()->routeIs('withdrawals.index') ? 'bg-gray-50 text-moroccan-red font-medium' : '' }}">
                            <i class="fas fa-wallet mr-2"></i> Earnings
                        </a>
                    @endif
                    
                    @if(Auth::user()->isTraveler())
                        <a href="{{ route('reservations.index') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-50 hover:text-moroccan-red {{ request()->routeIs('reservations.index') ? 'bg-gray-50 text-moroccan-red font-medium' : '' }}">
                            <i class="fas fa-suitcase mr-2"></i> My Trips
                        </a>
                    @endif
                    
                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-50 hover:text-moroccan-red {{ request()->routeIs('admin.dashboard') ? 'bg-gray-50 text-moroccan-red font-medium' : '' }}">
                            <i class="fas fa-tachometer-alt mr-2"></i> Admin
                        </a>
                    @endif
                    
                    <a href="{{ route('messages.index') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-50 hover:text-moroccan-red {{ request()->routeIs('messages.index') ? 'bg-gray-50 text-moroccan-red font-medium' : '' }}">
                        <i class="fas fa-envelope mr-2"></i> Messages
                    </a>
                    <a href="{{ route('profile') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-50 hover:text-moroccan-red {{ request()->routeIs('profile') ? 'bg-gray-50 text-moroccan-red font-medium' : '' }}">
                        <i class="fas fa-user mr-2"></i> Profile
                    </a>
                    <a href="{{ route('transactions.index') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-50 hover:text-moroccan-red {{ request()->routeIs('transactions.index') ? 'bg-gray-50 text-moroccan-red font-medium' : '' }}">
                        <i class="fas fa-receipt mr-2"></i> Transactions
                    </a>
                    
                    <form method="POST" action="{{ route('logout') }}" class="block">
                        @csrf
                        <button type="submit" class="w-full text-left py-2 px-4 text-gray-700 hover:bg-gray-50 hover:text-moroccan-red">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-50 hover:text-moroccan-red">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                    </a>
                    <a href="{{ route('register') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-50 hover:text-moroccan-red">
                        <i class="fas fa-user-plus mr-2"></i> Register
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

@auth
<script>
    function checkUnreadMessages() {
        fetch('/messages/unread/conversation')
            .then(response => response.json())
            .then(data => {
                const unreadCount = document.getElementById('unread-count');
                if (data.unread_count > 0) {
                    unreadCount.textContent = data.unread_count;
                    unreadCount.classList.remove('hidden');
                } else {
                    unreadCount.classList.add('hidden');
                }
            });
    }
    
    document.addEventListener('DOMContentLoaded', checkUnreadMessages);
    
    setInterval(checkUnreadMessages, 30000);
</script>
@endauth