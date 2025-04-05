@extends('layouts.app')

@section('title', 'Explore Properties in Morocco - Stay & Travel')

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
    
    .filter-container {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    
    .property-card {
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s ease;
        background: white;
    }
    
    .property-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.1);
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
    
    .badge-moroccan {
        font-size: 0.7rem;
        font-weight: 600;
        padding: 0.2rem 0.5rem;
        border-radius: 12px;
    }
    
    .filter-pill {
        display: inline-flex;
        align-items: center;
        background: #f3f4f6;
        color: #374151;
        padding: 0.5rem 1rem;
        border-radius: 9999px;
        font-size: 0.875rem;
        margin-right: 0.5rem;
        margin-bottom: 0.5rem;
    }
    
    .filter-pill i {
        margin-right: 0.5rem;
    }
    
    .price-badge {
        position: absolute;
        bottom: 0;
        right: 0;
        background: rgba(0,0,0,0.6);
        color: white;
        padding: 0.25rem 0.75rem;
        font-weight: 600;
        border-top-left-radius: 8px;
        font-size: 0.875rem;
    }
    
    .image-container {
        position: relative;
        overflow: hidden;
        padding-top: 66.67%; /* 3:2 Aspect Ratio */
    }
    
    .image-container img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .property-card:hover .image-container img {
        transform: scale(1.05);
    }
    
    .type-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        z-index: 10;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        color: white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    
    .type-apartment { background-color: var(--moroccan-blue); }
    .type-house { background-color: var(--moroccan-teal); }
    .type-villa { background-color: var(--moroccan-red); }
    .type-cabin { background-color: var(--moroccan-orange); }
    .type-condo { background-color: var(--moroccan-teal); }
    .type-studio { background-color: var(--moroccan-blue); }
    
    .stars {
        color: var(--moroccan-yellow);
    }
    
    .card-title {
        font-weight: 700;
        color: #2d3748;
        font-size: 1.125rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .not-found-container {
        max-width: 500px;
        margin: 3rem auto;
        padding: 2rem;
        text-align: center;
        border-radius: 16px;
        background-color: white;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    
    .location-icon {
        color: var(--moroccan-red);
    }
    
    .filter-section {
        position: sticky;
        top: 80px;
        z-index: 20;
    }
</style>
@endsection

@section('content')
<div class="bg-gray-50 min-h-screen pt-6 pb-12">
    <div class="container mx-auto px-4">
        <!-- Filter Section -->
        <div class="filter-section mb-8">
            <div class="filter-container p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Find Your Perfect Moroccan Stay</h2>
                
                <form action="{{ route('properties.index') }}" method="GET" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4">
                        <div class="space-y-2">
                            <label for="city" class="block text-sm font-medium text-gray-700">Location</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                    <i class="fas fa-map-marker-alt text-gray-400"></i>
                                </div>
                                <input type="text" id="city" name="city" value="{{ $filters['city'] ?? '' }}" 
                                    placeholder="Marrakech, Fes, Essaouira..." 
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                        
                        <div class="space-y-2">
                            <label for="capacity" class="block text-sm font-medium text-gray-700">Guests</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                    <i class="fas fa-user-friends text-gray-400"></i>
                                </div>
                                <select id="capacity" name="capacity" 
                                    class="block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-lg appearance-none focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Any</option>
                                    <option value="1" {{ isset($filters['capacity']) && $filters['capacity'] == 1 ? 'selected' : '' }}>1 Guest</option>
                                    <option value="2" {{ isset($filters['capacity']) && $filters['capacity'] == 2 ? 'selected' : '' }}>2 Guests</option>
                                    <option value="3" {{ isset($filters['capacity']) && $filters['capacity'] == 3 ? 'selected' : '' }}>3 Guests</option>
                                    <option value="4" {{ isset($filters['capacity']) && $filters['capacity'] == 4 ? 'selected' : '' }}>4 Guests</option>
                                    <option value="5" {{ isset($filters['capacity']) && $filters['capacity'] == 5 ? 'selected' : '' }}>5+ Guests</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <i class="fas fa-chevron-down text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="space-y-2">
                            <label for="min_price" class="block text-sm font-medium text-gray-700">Min Price (MAD)</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                    <i class="fas fa-tag text-gray-400"></i>
                                </div>
                                <input type="number" id="min_price" name="min_price" value="{{ $filters['min_price'] ?? '' }}" 
                                    placeholder="0" min="0" 
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                        
                        <div class="space-y-2">
                            <label for="max_price" class="block text-sm font-medium text-gray-700">Max Price (MAD)</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                    <i class="fas fa-tag text-gray-400"></i>
                                </div>
                                <input type="number" id="max_price" name="max_price" value="{{ $filters['max_price'] ?? '' }}" 
                                    placeholder="Any" min="0" 
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                        
                        <div class="flex items-end">
                            <button type="submit" class="btn-moroccan py-2 px-6 w-full">
                                <i class="fas fa-search mr-2"></i>Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Active Filters -->
        @if(!empty(array_filter($filters ?? [])))
            <div class="mb-6">
                <div class="flex flex-wrap items-center">
                    <span class="text-sm font-medium text-gray-700 mr-3">Active filters:</span>
                    
                    @if(isset($filters['city']) && !empty($filters['city']))
                        <div class="filter-pill">
                            <i class="fas fa-map-marker-alt"></i> {{ $filters['city'] }}
                        </div>
                    @endif
                    
                    @if(isset($filters['capacity']) && !empty($filters['capacity']))
                        <div class="filter-pill">
                            <i class="fas fa-user-friends"></i> {{ $filters['capacity'] }} Guest{{ $filters['capacity'] > 1 ? 's' : '' }}
                        </div>
                    @endif
                    
                    @if(isset($filters['min_price']) && !empty($filters['min_price']))
                        <div class="filter-pill">
                            <i class="fas fa-tag"></i> Min: {{ $filters['min_price'] }} MAD
                        </div>
                    @endif
                    
                    @if(isset($filters['max_price']) && !empty($filters['max_price']))
                        <div class="filter-pill">
                            <i class="fas fa-tag"></i> Max: {{ $filters['max_price'] }} MAD
                        </div>
                    @endif
                    
                    <a href="{{ route('properties.index') }}" class="text-sm text-blue-600 hover:text-blue-800 ml-auto">
                        Clear all filters
                    </a>
                </div>
            </div>
        @endif
        
        <!-- Results Section -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">
                @if(isset($filters['city']) && !empty($filters['city']))
                    Properties in {{ $filters['city'] }}
                @else
                    All Properties in Morocco
                @endif
            </h1>
            <p class="text-gray-600 mt-1">{{ count($properties) }} result{{ count($properties) != 1 ? 's' : '' }} found</p>
        </div>
        
        @if(count($properties) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($properties as $property)
                    <div class="property-card shadow-md">
                        <a href="{{ route('properties.show', $property->id) }}" class="block">
                            <div class="image-container">
                                @if($property->main_image)
                                    <img src="{{ asset('storage/properties/' . $property->main_image) }}" alt="{{ $property->title }}">
                                @else
                                    <div class="absolute inset-0 flex items-center justify-center bg-blue-50">
                                        <i class="fas fa-kaaba text-5xl text-blue-300"></i>
                                    </div>
                                @endif
                                <div class="type-badge type-{{ $property->type }}">
                                    {{ ucfirst($property->type) }}
                                </div>
                                <div class="price-badge">
                                    {{ number_format($property->price_per_night) }} MAD
                                </div>
                            </div>
                        </a>
                        
                        <div class="p-4">
                            <div class="flex items-center mb-1">
                                <div class="stars flex mr-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= round($property->avg_rating))
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-gray-700 text-sm">{{ number_format($property->avg_rating, 1) }}</span>
                            </div>
                            
                            <a href="{{ route('properties.show', $property->id) }}" class="block">
                                <h3 class="card-title mb-1" title="{{ $property->title }}">{{ $property->title }}</h3>
                            </a>
                            
                            <div class="text-gray-600 text-sm flex items-center mb-2">
                                <i class="fas fa-map-marker-alt location-icon mr-1"></i> {{ $property->city }}
                            </div>
                            
                            <div class="flex items-center text-sm text-gray-600 mb-3">
                                <span class="mr-3"><i class="fas fa-user-friends mr-1"></i> {{ $property->capacity }}</span>
                                <span class="mr-3"><i class="fas fa-bed mr-1"></i> {{ $property->bedrooms }}</span>
                                <span><i class="fas fa-bath mr-1"></i> {{ $property->bathrooms }}</span>
                            </div>
                            
                            <a href="{{ route('properties.show', $property->id) }}" class="block text-blue-600 hover:text-blue-800 text-sm font-medium">
                                View details <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="not-found-container moroccan-pattern">
                <div class="text-6xl text-red-300 mb-4"><i class="fas fa-kaaba"></i></div>
                <h2 class="text-2xl font-bold text-gray-700 mb-2">No properties found</h2>
                <p class="text-gray-600 mb-6">Try adjusting your search filters or browse all available properties.</p>
                <a href="{{ route('properties.index') }}" class="btn-moroccan py-2 px-6 inline-block">
                    View All Properties
                </a>
            </div>
        @endif
    </div>
</div>
@endsection