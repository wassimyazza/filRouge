<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Stay & Travel Morocco - Discover Authentic Experiences')</title>
    <meta name="description" content="Find and book unique accommodations across Morocco - from traditional riads to modern apartments and coastal villas.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'moroccan-blue': '#146eb4',
                        'moroccan-teal': '#1b9aaa',
                        'moroccan-red': '#d62828',
                        'moroccan-orange': '#f77f00',
                        'moroccan-yellow': '#fcbf49',
                        'moroccan-sand': '#eae2b7',
                        'moroccan-terracotta': '#cb997e'
                    },
                    fontFamily: {
                        'sans': ['Poppins', 'sans-serif'],
                        'serif': ['Playfair Display', 'serif']
                    }
                }
            }
        }
    </script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        [x-cloak] { display: none !important; }
        
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        h1, h2, h3 {
            font-family: 'Playfair Display', serif;
        }
        
        .moroccan-pattern-subtle {
            background-color: #f9f7f3;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d62828' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        .alert {
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .alert-success {
            background-color: #def7ec;
            border-left: 4px solid #0e9f6e;
            color: #046c4e;
        }
        
        .alert-error, .alert-danger {
            background-color: #fde8e8;
            border-left: 4px solid #f05252;
            color: #c81e1e;
        }
        
        .alert-info {
            background-color: #e1effe;
            border-left: 4px solid #3f83f8;
            color: #1a56db;
        }
        
        .alert-warning {
            background-color: #feecdc;
            border-left: 4px solid #ff5a1f;
            color: #c53d13;
        }
        
        .btn-primary {
            background-color: #d62828;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .btn-primary:hover {
            background-color: #b82020;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(214, 40, 40, 0.3);
        }
        
        .navbar-link {
            position: relative;
            font-weight: 500;
            padding: 0.5rem 1rem;
            color: #4b5563;
            transition: color 0.2s;
        }
        
        .navbar-link:hover {
            color: #d62828;
        }
        
        .navbar-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 1rem;
            background-color: #d62828;
            transition: width 0.3s ease;
        }
        
        .navbar-link:hover::after {
            width: calc(100% - 2rem);
        }
        
        .navbar-link.active {
            color: #d62828;
        }
        
        .navbar-link.active::after {
            width: calc(100% - 2rem);
        }
        
        .footer-link {
            color: #6b7280;
            transition: color 0.2s;
        }
        
        .footer-link:hover {
            color: #d62828;
        }
        
        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 9999px;
            background-color: #f3f4f6;
            color: #4b5563;
            transition: all 0.2s;
        }
        
        .social-icon:hover {
            background-color: #d62828;
            color: white;
            transform: translateY(-3px);
        }
        
        .navbar-container {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
        }
    </style>
    
    @yield('styles')
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <header class="sticky top-0 z-50">
        <div class="navbar-container">
            <div class="container mx-auto px-4">
                <nav class="flex items-center justify-between py-4">
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center">
                            <i class="fas fa-kaaba text-2xl text-moroccan-red mr-2"></i>
                            <span class="text-xl font-bold text-gray-800">Stay<span class="text-moroccan-red">&</span>Travel</span>
                        </a>
                    </div>
                    
                    <div class="hidden md:flex space-x-2 items-center">
                        <a href="{{ route('home') }}" class="navbar-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                        <a href="{{ route('properties.index') }}" class="navbar-link {{ request()->routeIs('properties.index') ? 'active' : '' }}">Properties</a>
                        
                        @auth
                            @if(Auth::user()->isHost())
                                <a href="{{ route('host.properties') }}" class="navbar-link {{ request()->routeIs('host.properties') ? 'active' : '' }}">
                                    My Properties
                                </a>
                                <a href="{{ route('host.reservations') }}" class="navbar-link {{ request()->routeIs('host.reservations') ? 'active' : '' }}">
                                    Reservations
                                </a>
                            @endif
                            
                            @if(Auth::user()->isTraveler())
                                <a href="{{ route('reservations.index') }}" class="navbar-link {{ request()->routeIs('reservations.index') ? 'active' : '' }}">
                                    My Trips
                                </a>
                            @endif
                            
                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="navbar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                    Admin
                                </a>
                            @endif
                            
                            <div class="relative ml-3" x-data="{ open: false }" @click.away="open = false">
                                <button @click="open = !open" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none">
                                    <span class="mr-2">{{ Auth::user()->name }}</span>
                                    <img src="{{ Auth::user()->profile_image ? asset('storage/profiles/' . Auth::user()->profile_image) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&color=7F9CF5&background=EBF4FF' }}" alt="{{ Auth::user()->name }}" class="h-8 w-8 rounded-full object-cover">
                                </button>
                                
                                <div x-show="open" x-cloak class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                                    <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Profile
                                    </a>
                                    <a href="{{ route('messages.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Messages
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="navbar-link">Login</a>
                            <a href="{{ route('register') }}" class="btn-primary">Register</a>
                        @endauth
                    </div>
                    
                    <button type="button" class="md:hidden text-gray-500 hover:text-gray-700 focus:outline-none" onclick="toggleMenu()">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </nav>
                
                <div id="mobile-menu" class="md:hidden hidden py-4 border-t border-gray-200 space-y-3">
                    <a href="{{ route('home') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-100 rounded">Home</a>
                    <a href="{{ route('properties.index') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-100 rounded">Properties</a>
                    
                    @auth
                        @if(Auth::user()->isHost())
                            <a href="{{ route('host.properties') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-100 rounded">
                                My Properties
                            </a>
                            <a href="{{ route('host.reservations') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-100 rounded">
                                Reservations
                            </a>
                        @endif
                        
                        @if(Auth::user()->isTraveler())
                            <a href="{{ route('reservations.index') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-100 rounded">
                                My Trips
                            </a>
                        @endif
                        
                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-100 rounded">
                                Admin
                            </a>
                        @endif
                        
                        <a href="{{ route('profile') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-100 rounded">Profile</a>
                        <a href="{{ route('messages.index') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-100 rounded">Messages</a>
                        
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left py-2 px-4 text-gray-700 hover:bg-gray-100 rounded">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-100 rounded">Login</a>
                        <a href="{{ route('register') }}" class="block py-2 px-4 bg-moroccan-red text-white hover:bg-red-700 rounded">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>
    
    <div class="container mx-auto px-4 mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" class="close-btn text-green-800 hover:text-green-900 focus:outline-none">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-error alert-dismissible" role="alert">
                <div class="flex items-center">
                    <i class="fas fa-times-circle mr-2"></i>
                    <span>{{ session('error') }}</span>
                </div>
                <button type="button" class="close-btn text-red-800 hover:text-red-900 focus:outline-none">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif
        
        @if(session('info'))
            <div class="alert alert-info alert-dismissible" role="alert">
                <div class="flex items-center">
                    <i class="fas fa-info-circle mr-2"></i>
                    <span>{{ session('info') }}</span>
                </div>
                <button type="button" class="close-btn text-blue-800 hover:text-blue-900 focus:outline-none">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif
        
        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible" role="alert">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <span>{{ session('warning') }}</span>
                </div>
                <button type="button" class="close-btn text-orange-800 hover:text-orange-900 focus:outline-none">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif
        
        @if($errors->any())
            <div class="alert alert-error alert-dismissible" role="alert">
                <div class="flex items-center">
                    <i class="fas fa-times-circle mr-2"></i>
                    <span>
                        <strong>Please fix the following errors:</strong>
                        <ul class="list-disc list-inside mt-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </span>
                </div>
                <button type="button" class="close-btn text-red-800 hover:text-red-900 focus:outline-none">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif
    </div>
    
    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-white border-t mt-12">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Stay & Travel Morocco</h3>
                    <p class="text-gray-600 mb-4">Discover authentic Moroccan hospitality and find your perfect stay across the kingdom.</p>
                    <div class="flex space-x-3">
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
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Explore</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('properties.index') }}" class="footer-link">All Properties</a></li>
                        <li><a href="{{ route('properties.index', ['city' => 'Marrakech']) }}" class="footer-link">Marrakech</a></li>
                        <li><a href="{{ route('properties.index', ['city' => 'Casablanca']) }}" class="footer-link">Casablanca</a></li>
                        <li><a href="{{ route('properties.index', ['city' => 'Fes']) }}" class="footer-link">Fes</a></li>
                        <li><a href="{{ route('properties.index', ['city' => 'Chefchaouen']) }}" class="footer-link">Chefchaouen</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Host</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="footer-link">Become a Host</a></li>
                        <li><a href="#" class="footer-link">Responsible Hosting</a></li>
                        <li><a href="#" class="footer-link">Host Resources</a></li>
                        <li><a href="#" class="footer-link">Community Forum</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Support</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="footer-link">Help Center</a></li>
                        <li><a href="#" class="footer-link">Safety Information</a></li>
                        <li><a href="#" class="footer-link">Cancellation Options</a></li>
                        <li><a href="#" class="footer-link">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-200 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-600 text-sm">&copy; {{ date('Y') }} Stay & Travel Morocco. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-sm text-gray-600 hover:text-moroccan-red">Privacy Policy</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-moroccan-red">Terms of Service</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-moroccan-red">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>
    
    <script>
        function toggleMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert-dismissible');
            
            alerts.forEach(function(alert) {
                const closeBtn = alert.querySelector('.close-btn');
                
                closeBtn.addEventListener('click', function() {
                    alert.remove();
                });
                
                setTimeout(function() {
                    alert.remove();
                }, 5000);
            });
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    
    @yield('scripts')
</body>
</html>