<footer class="bg-gray-800 text-white mt-auto">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">wassmi</h3>
                <p class="text-gray-400 mb-4">Find your perfect place to stay around the world.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-pinterest-p"></i>
                    </a>
                </div>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold mb-4">Explore</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition">Home</a></li>
                    <li><a href="{{ route('properties.index') }}" class="text-gray-400 hover:text-white transition">Properties</a></li>
                    @auth
                        @if(Auth::user()->isTraveler())
                            <li><a href="{{ route('reservations.index') }}" class="text-gray-400 hover:text-white transition">My Trips</a></li>
                        @endif
                    @endauth
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold mb-4">Host</h3>
                <ul class="space-y-2">
                    @auth
                        @if(Auth::user()->isHost())
                            <li><a href="{{ route('host.properties') }}" class="text-gray-400 hover:text-white transition">My Properties</a></li>
                            <li><a href="{{ route('properties.create') }}" class="text-gray-400 hover:text-white transition">Add Property</a></li>
                            <li><a href="{{ route('withdrawals.index') }}" class="text-gray-400 hover:text-white transition">Earnings</a></li>
                        @else
                            <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-white transition">Become a Host</a></li>
                        @endif
                    @else
                        <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-white transition">Become a Host</a></li>
                    @endauth
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Resources</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold mb-4">Support</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Help Center</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Terms of Service</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Privacy Policy</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Contact Us</a></li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} Stay & Travel. All rights reserved.</p>
        </div>
    </div>
</footer>
