<footer class="bg-gradient-to-r from-moroccan-blue to-moroccan-teal text-white mt-auto relative">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold font-serif mb-6">Stay & Travel Morocco</h3>
                <p class="text-blue-100 mb-6">Discover authentic Moroccan hospitality and find your perfect stay across the kingdom.</p>
                <div class="flex space-x-4">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-pinterest-p"></i>
                    </a>
                </div>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold mb-6">Explore</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('home') }}" class="footer-link">Home</a></li>
                    <li><a href="{{ route('properties.index') }}" class="footer-link">Properties</a></li>
                    <li><a href="{{ route('properties.index', ['city' => 'Marrakech']) }}" class="footer-link">Marrakech</a></li>
                    <li><a href="{{ route('properties.index', ['city' => 'Casablanca']) }}" class="footer-link">Casablanca</a></li>
                    <li><a href="{{ route('properties.index', ['city' => 'Fes']) }}" class="footer-link">Fes</a></li>
                    <li><a href="{{ route('properties.index', ['city' => 'Chefchaouen']) }}" class="footer-link">Chefchaouen</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold mb-6">Host</h3>
                <ul class="space-y-3">
                    @auth
                        @if(Auth::user()->isHost())
                            <li><a href="{{ route('host.properties') }}" class="footer-link">My Properties</a></li>
                            <li><a href="{{ route('properties.create') }}" class="footer-link">Add Property</a></li>
                            <li><a href="{{ route('withdrawals.index') }}" class="footer-link">Earnings</a></li>
                        @else
                            <li><a href="{{ route('register') }}?role=host" class="footer-link">Become a Host</a></li>
                        @endif
                    @else
                        <li><a href="{{ route('register') }}?role=host" class="footer-link">Become a Host</a></li>
                    @endauth
                    <li><a href="#" class="footer-link">Responsible Hosting</a></li>
                    <li><a href="#" class="footer-link">Host Resources</a></li>
                    <li><a href="#" class="footer-link">Community Forum</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold mb-6">Support</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="footer-link">Help Center</a></li>
                    <li><a href="#" class="footer-link">Terms of Service</a></li>
                    <li><a href="#" class="footer-link">Privacy Policy</a></li>
                    <li><a href="#" class="footer-link">Cancellation Options</a></li>
                    <li><a href="#" class="footer-link">Safety Information</a></li>
                    <li><a href="#" class="footer-link">Contact Us</a></li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-blue-400 border-opacity-30 mt-10 pt-8 text-center text-blue-100">
            <p>&copy; {{ date('Y') }} Stay & Travel Morocco. All rights reserved.</p>
        </div>
    </div>
    
    <!-- Moroccan pattern overlay -->
    <div class="absolute top-0 left-0 right-0 bottom-0 pointer-events-none opacity-5">
        <div class="w-full h-full" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
</footer>

<style>
    .social-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 9999px;
        background-color: rgba(255, 255, 255, 0.1);
        color: white;
        transition: all 0.2s;
    }