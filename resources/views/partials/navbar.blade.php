<nav class="bg-white shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">
                    <i class="fas fa-house-user mr-2"></i>Stay<span class="text-indigo-500">&</span>Travel
                </a>
            </div>
            
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('properties.index') }}" class="text-gray-700 hover:text-blue-600 transition">Properties</a>
                
                @auth
                    @if(Auth::user()->isHost())
                        <a href="{{ route('host.properties') }}" class="text-gray-700 hover:text-blue-600 transition">My Properties</a>
                        <a href="{{ route('host.reservations') }}" class="text-gray-700 hover:text-blue-600 transition">Reservations</a>
                        <a href="{{ route('withdrawals.index') }}" class="text-gray-700 hover:text-blue-600 transition">Earnings</a>
                    @endif
                    
                    @if(Auth::user()->isTraveler())
                        <a href="{{ route('reservations.index') }}" class="text-gray-700 hover:text-blue-600 transition">My Trips</a>
                    @endif
                    
                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-600 transition">Admin</a>
                    @endif
                    
                    <!-- Messages with unread count -->
                    <a href="{{ route('messages.index') }}" class="text-gray-700 hover:text-blue-600 transition relative">
                        <i class="fas fa-envelope mr-1"></i> Messages
                        <span id="unread-count" class="hidden absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs"></span>
                    </a>
                    
                    <!-- User Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center text-gray-700 hover:text-blue-600 transition focus:outline-none" type="button">
                            @if(Auth::user()->profile_image)
                                <img src="{{ asset('storage/profiles/' . Auth::user()->profile_image) }}" alt="{{ Auth::user()->name }}" class="w-8 h-8 rounded-full mr-2 object-cover">
                            @else
                                <i class="fas fa-user-circle text-2xl mr-2"></i>
                            @endif
                            <span>{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="{{ route('transactions.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Transactions</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 transition">Login</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">Sign Up</a>
                @endauth
            </div>
            
            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button type="button" onclick="toggleMenu()" class="text-gray-700 hover:text-blue-600 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="py-3 space-y-3">
                <a href="{{ route('properties.index') }}" class="block text-gray-700 hover:text-blue-600 transition">Properties</a>
                
                @auth
                    @if(Auth::user()->isHost())
                        <a href="{{ route('host.properties') }}" class="block text-gray-700 hover:text-blue-600 transition">My Properties</a>
                        <a href="{{ route('host.reservations') }}" class="block text-gray-700 hover:text-blue-600 transition">Reservations</a>
                        <a href="{{ route('withdrawals.index') }}" class="block text-gray-700 hover:text-blue-600 transition">Earnings</a>
                    @endif
                    
                    @if(Auth::user()->isTraveler())
                        <a href="{{ route('reservations.index') }}" class="block text-gray-700 hover:text-blue-600 transition">My Trips</a>
                    @endif
                    
                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="block text-gray-700 hover:text-blue-600 transition">Admin</a>
                    @endif
                    
                    <a href="{{ route('messages.index') }}" class="block text-gray-700 hover:text-blue-600 transition">Messages</a>
                    <a href="{{ route('profile') }}" class="block text-gray-700 hover:text-blue-600 transition">Profile</a>
                    <a href="{{ route('transactions.index') }}" class="block text-gray-700 hover:text-blue-600 transition">Transactions</a>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left text-gray-700 hover:text-blue-600 transition">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block text-gray-700 hover:text-blue-600 transition">Login</a>
                    <a href="{{ route('register') }}" class="block text-gray-700 hover:text-blue-600 transition">Sign Up</a>
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
