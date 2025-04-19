@extends('layouts.app')

@section('title', 'Stay & Travel Morocco - Experience Authentic Moroccan Hospitality')

@section('styles')
<style>
    /* Moroccan-inspired color scheme */
    :root {
        --moroccan-blue: #146eb4;
        --moroccan-teal: #1b9aaa;
        --moroccan-red: #d62828;
        --moroccan-orange: #f77f00;
        --moroccan-yellow: #fcbf49;
        --moroccan-sand: #eae2b7;
        --moroccan-terracotta: #cb997e;
    }
    
    .moroccan-pattern {
        background-color: #f9f7f3;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d62828' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    
    .hero-section {
        background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1489749798305-4fea3ae63d43?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-position: center;
    }
    
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .moroccan-card {
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .moroccan-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }
    
    .moroccan-divider {
        height: 5px;
        background: linear-gradient(to right, var(--moroccan-blue), var(--moroccan-teal), var(--moroccan-red), var(--moroccan-orange), var(--moroccan-yellow));
        border-radius: 5px;
        margin: 2rem 0;
    }
    
    .city-card {
        height: 200px;
        background-size: cover;
        background-position: center;
        border-radius: 12px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    
    .city-card:hover {
        transform: scale(1.03);
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }
    
    .city-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.2) 60%, rgba(0,0,0,0.1) 100%);
    }
    
    .city-marrakech { background-image: url('https://images.unsplash.com/photo-1548018560-c7196548e84d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); }
    .city-casablanca { background-image: url('https://images.unsplash.com/photo-1577147443647-81856d5a3383?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); }
    .city-fes { background-image: url('https://images.unsplash.com/photo-1560543899-58ce3bc3c8fc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); }
    .city-chefchaouen { background-image: url('https://images.unsplash.com/photo-1553244978-0bd50cacc03c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); }
    
    .search-box {
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(5px);
    }
    
    .btn-moroccan {
        background-color: var(--moroccan-red);
        color: white;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.2s ease;
    }
    
    .btn-moroccan:hover {
        background-color: #b82020;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(214, 40, 40, 0.3);
    }
    
    .property-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        color: white;
        background-color: var(--moroccan-red);
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    
    .property-price {
        font-family: 'Poppins', sans-serif;
        color: var(--moroccan-blue);
    }
    
    .property-location {
        display: flex;
        align-items: center;
        color: #555;
        font-size: 0.9rem;
    }
    
    .property-location i {
        color: var(--moroccan-red);
        margin-right: 5px;
    }
    
    .rating-stars {
        color: var(--moroccan-yellow);
    }
    
    .cta-section {
        background: linear-gradient(135deg, var(--moroccan-blue) 0%, var(--moroccan-teal) 100%);
        border-radius: 16px;
    }
</style>
@endsection

@section('content')

<div class="hero-section relative rounded-none md:rounded-2xl overflow-hidden mb-8">
    <div class="relative max-w-7xl mx-auto py-32 px-4 sm:py-40 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl mb-6">
            Discover Morocco's Hidden Gems
        </h1>
        <p class="max-w-2xl mx-auto text-xl text-white opacity-90 mb-10">
            From the vibrant medinas to serene coastal retreats, find your perfect Moroccan getaway
        </p>
        
        <!-- Search Form - Modern Airbnb Style -->
        <div class="search-box max-w-4xl mx-auto p-6 mb-8">
            <form action="{{ route('properties.index') }}" method="GET" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label for="city" class="block text-sm font-medium text-gray-700">Where</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" id="city" name="city" placeholder="Marrakech, Fes, Casablanca..." 
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <label for="capacity" class="block text-sm font-medium text-gray-700">Guests</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user-friends text-gray-400"></i>
                            </div>
                            <select id="capacity" name="capacity" 
                                class="block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg appearance-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Any</option>
                                <option value="1">1 Guest</option>
                                <option value="2">2 Guests</option>
                                <option value="3">3 Guests</option>
                                <option value="4">4 Guests</option>
                                <option value="5">5+ Guests</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price Range</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-tag text-gray-400"></i>
                            </div>
                            <div class="flex space-x-2">
                                <input type="number" id="min_price" name="min_price" placeholder="Min MAD" min="0" 
                                    class="block w-1/2 pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                <input type="number" id="max_price" name="max_price" placeholder="Max MAD" min="0" 
                                    class="block w-1/2 pl-3 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-center">
                    <button type="submit" class="btn-moroccan py-3 px-8 text-base">
                        <i class="fas fa-search mr-2"></i>Find Places to Stay
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Available Properties Section -->
<div class="container mx-auto px-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Explore Morocco</h2>
        <a href="{{ route('properties.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center text-sm font-semibold">
            View all properties <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
    
    @if(count($properties) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($properties as $property)
                <div class="moroccan-card bg-white shadow-md">
                    <a href="{{ route('properties.show', $property->id) }}" class="block">
                        <div class="relative h-60 bg-gray-200">
                            @if($property->main_image)
                                <img src="{{ asset('storage/properties/' . $property->main_image) }}" alt="{{ $property->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="absolute inset-0 flex items-center justify-center bg-blue-50">
                                    <i class="fas fa-kaaba text-5xl text-blue-300"></i>
                                </div>
                            @endif
                            <div class="property-badge">
                                {{ ucfirst($property->type) }}
                            </div>
                        </div>
                    </a>
                    
                    <div class="p-5">
                        <div class="flex items-center mb-1">
                            <div class="rating-stars flex mr-2">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= round($property->avg_rating))
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <span class="text-gray-700 text-sm font-medium">{{ number_format($property->avg_rating, 1) }}</span>
                        </div>
                        
                        <h3 class="text-lg font-bold mb-2 text-gray-800">{{ $property->title }}</h3>
                        
                        <p class="property-location mb-3">
                            <i class="fas fa-map-marker-alt"></i> {{ $property->city }}
                        </p>
                        
                        <div class="flex items-center text-sm text-gray-600 mb-4">
                            <span class="mr-3"><i class="fas fa-user-friends mr-1"></i> {{ $property->capacity }} guests</span>
                            <span class="mr-3"><i class="fas fa-bed mr-1"></i> {{ $property->bedrooms }} beds</span>
                            <span><i class="fas fa-bath mr-1"></i> {{ $property->bathrooms }} baths</span>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <div class="property-price text-lg font-semibold">{{ number_format($property->price_per_night) }} MAD <span class="text-gray-500 font-normal text-sm">/ night</span></div>
                            <a href="{{ route('properties.show', $property->id) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white p-8 rounded-lg shadow-md text-center moroccan-pattern">
            <div class="text-6xl text-blue-200 mb-4"><i class="fas fa-kaaba"></i></div>
            <h2 class="text-2xl font-bold text-gray-700 mb-2">No properties available</h2>
            <p class="text-gray-600 mb-6">Check back soon or try a different search.</p>
        </div>
    @endif
</div>

<div class="moroccan-divider max-w-5xl mx-auto"></div>

<!-- Popular Cities Section -->
<div class="container mx-auto px-4 mb-16">
    <h2 class="text-2xl font-bold text-gray-900 mb-8">Explore Morocco's Top Destinations</h2>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <a style="background-image: url({{ asset('storage/img/marrakech.jpg') }})" href="{{ route('properties.index', ['city' => 'Marrakech']) }}" class="city-card city-marrakech">
            <div class="city-overlay"></div>
            <div class="absolute bottom-0 left-0 p-5 text-white">
                <h3 class="text-xl font-bold">Marrakech</h3>
                <p class="text-sm mt-1 opacity-90">Explore the Red City</p>
            </div>
        </a>
        
        <a style="background-image: url({{ asset('storage/img/casablanca.jpg') }})" href="{{ route('properties.index', ['city' => 'Casablanca']) }}" class="city-card city-casablanca">
            <div class="city-overlay"></div>
            <div style="background-image: " class="absolute bottom-0 left-0 p-5 text-white">
                <h3 class="text-xl font-bold">Casablanca</h3>
                <p class="text-sm mt-1 opacity-90">Modern metropolis</p>
            </div>
        </a>
        
        <a style="background-image: url({{ asset('storage/img/fes.jpg') }})" href="{{ route('properties.index', ['city' => 'Fes']) }}" class="city-card city-fes">
            <div class="city-overlay"></div>
            <div class="absolute bottom-0 left-0 p-5 text-white">
                <h3 class="text-xl font-bold">Fes</h3>
                <p class="text-sm mt-1 opacity-90">Ancient medina</p>
            </div>
        </a>
        
        <a style="background-image: url({{ asset('storage/img/chafchaouen.jpg') }})" href="{{ route('properties.index', ['city' => 'Chefchaouen']) }}" class="city-card city-chefchaouen">
            <div class="city-overlay"></div>
            <div class="absolute bottom-0 left-0 p-5 text-white">
                <h3 class="text-xl font-bold">Chefchaouen</h3>
                <p class="text-sm mt-1 opacity-90">The Blue Pearl</p>
            </div>
        </a>
    </div>
</div>

<!-- Become a Host CTA -->
<div class="container mx-auto px-4 mb-16">
    <div class="cta-section overflow-hidden">
        <div class="max-w-7xl mx-auto md:flex md:items-center">
            <div class="md:w-3/5 py-12 px-6 md:py-16 md:px-10">
                <h2 class="text-3xl font-extrabold text-white">Share Your Moroccan Space</h2>
                <p class="mt-4 text-lg text-white opacity-90">
                    Earn extra income and showcase Moroccan hospitality by sharing your space with travelers from around the world.
                </p>
                <div class="mt-8">
                    @auth
                        @if(Auth::user()->isHost())
                            <a href="{{ route('properties.create') }}" class="inline-flex items-center bg-white text-blue-700 px-6 py-3 rounded-md text-base font-medium hover:bg-blue-50 transition-colors">
                                List your property
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        @else
                            <a href="#" class="inline-flex items-center bg-white text-blue-700 px-6 py-3 rounded-md text-base font-medium hover:bg-blue-50 transition-colors">
                                Become a host
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        @endif
                    @else
                        <a href="{{ route('register') }}?role=host" class="inline-flex items-center bg-white text-blue-700 px-6 py-3 rounded-md text-base font-medium hover:bg-blue-50 transition-colors">
                            Get started
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection