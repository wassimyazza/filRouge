@extends('layouts.app')

@section('title', $property->title . ' - Stay & Travel')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumbs -->
    <div class="mb-6 text-sm">
        <a href="{{ route('properties.index') }}" class="text-blue-600 hover:text-blue-800">Properties</a>
        <span class="text-gray-500 mx-2">/</span>
        <a href="{{ route('properties.index', ['city' => $property->city]) }}" class="text-blue-600 hover:text-blue-800">{{ $property->city }}</a>
        <span class="text-gray-500 mx-2">/</span>
        <span class="text-gray-700">{{ $property->title }}</span>
    </div>
    
    <!-- Property Title Section -->
    <div class="mb-6">
        <div class="flex justify-between items-start flex-wrap">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">{{ $property->title }}</h1>
                <div class="flex items-center mt-2">
                    <span class="flex items-center text-yellow-500 mr-2">
                        <i class="fas fa-star"></i>
                        <span class="ml-1 text-gray-700">{{ number_format($property->getAverageRatingAttribute(), 1) }}</span>
                    </span>
                    <span class="text-gray-600">•</span>
                    <span class="ml-2 text-gray-600">{{ $property->city }}, {{ $property->address }}</span>
                </div>
            </div>
            
            <div class="mt-4 sm:mt-0">
                <div class="flex space-x-3">
                    <button onclick="window.history.back()" class="flex items-center justify-center w-10 h-10 rounded-full border border-gray-300 bg-white text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    @auth
                        @if($property->host_id !== Auth::id())
                            <a href="{{ route('messages.conversation', $property->host_id) }}" class="flex items-center justify-center px-4 h-10 rounded-full border border-gray-300 bg-white text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-comment-alt mr-2"></i> Contact Host
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
    
    <!-- Redesigned Property Images Gallery -->
<!-- Enhanced Property Images Gallery -->
<div class="mb-8">
    @if($property->images->count() > 0)
        @if($property->images->count() === 1)
            <!-- Only one image: full-width display -->
            <div class="h-[500px] rounded-lg overflow-hidden">
                <img src="{{ asset('storage/properties/' . $property->images[0]->image_path) }}" alt="{{ $property->title }}" class="w-full h-full object-cover rounded-lg">
            </div>
        @else
            <!-- Multiple images: featured layout -->
            <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-2 h-[500px] rounded-lg overflow-hidden">
                <!-- Main image -->
                <div class="col-span-2 row-span-2 h-full">
                    <img src="{{ asset('storage/properties/' . $property->images[0]->image_path) }}" alt="Main image" class="w-full h-full object-cover rounded-l-lg">
                </div>

                <!-- Next 4 images (if available) -->
                @foreach($property->images->slice(1, 4) as $image)
                    <div class="h-full">
                        <img src="{{ asset('storage/properties/' . $image->image_path) }}" alt="Additional image" class="w-full h-full object-cover">
                    </div>
                @endforeach
            </div>

            <!-- Extra images in gallery -->
            @if($property->images->count() > 5)
                <div class="grid grid-cols-2 md:grid-cols-4 gap-2 mt-4">
                    @foreach($property->images->slice(5) as $image)
                        <div class="h-40 rounded overflow-hidden">
                            <img src="{{ asset('storage/properties/' . $image->image_path) }}" alt="Gallery image" class="w-full h-full object-cover">
                        </div>
                    @endforeach
                </div>
            @endif
        @endif
    @else
        <!-- No images -->
        <div class="h-80 bg-gray-200 rounded-lg flex items-center justify-center">
            <i class="fas fa-home text-gray-400 text-6xl"></i>
        </div>
    @endif
</div>


    
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Property Details -->
        <div class="w-full lg:w-2/3">
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <div class="flex items-center justify-between border-b pb-4 mb-4">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">
                            {{ ucfirst($property->type) }} hosted by {{ $property->host->name }}
                        </h2>
                        <div class="text-gray-600 mt-1">
                            <span>{{ $property->capacity }} guests</span>
                            <span class="mx-2">•</span>
                            <span>{{ $property->bedrooms }} bedroom{{ $property->bedrooms != 1 ? 's' : '' }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ $property->bathrooms }} bathroom{{ $property->bathrooms != 1 ? 's' : '' }}</span>
                        </div>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center overflow-hidden">
                        @if($property->host->profile_image)
                            <img src="{{ asset('storage/profiles/' . $property->host->profile_image) }}" alt="{{ $property->host->name }}" class="w-full h-full object-cover">
                        @else
                            <i class="fas fa-user text-blue-500"></i>
                        @endif
                    </div>
                </div>
                
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Description</h3>
                    <p class="text-gray-700 whitespace-pre-line">{{ $property->description }}</p>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Highlights</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                <i class="fas fa-map-marker-alt text-blue-600"></i>
                            </div>
                            <span class="text-gray-700">Great location in {{ $property->city }}</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                <i class="fas fa-key text-blue-600"></i>
                            </div>
                            <span class="text-gray-700">Self check-in available</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                <i class="fas fa-calendar-check text-blue-600"></i>
                            </div>
                            <span class="text-gray-700">Free cancellation up to 48 hours before check-in</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                <i class="fas fa-broom text-blue-600"></i>
                            </div>
                            <span class="text-gray-700">Professionally cleaned</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Reviews Section -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-gray-900">
                        <i class="fas fa-star text-yellow-400 mr-2"></i> 
                        {{ number_format($property->getAverageRatingAttribute(), 1) }} · {{ count($reviews) }} reviews
                    </h2>
                </div>
                
                @if(count($reviews) > 0)
                    <div class="space-y-6">
                        @foreach($reviews as $review)
                            <div class="pb-6 border-b border-gray-200 last:border-0">
                                <div class="flex items-start">
                                    <div class="mr-4">
                                        @if($review->traveler_image)
                                            <img src="{{ asset('storage/profiles/' . $review->traveler_image) }}" alt="{{ $review->traveler_name }}" class="w-12 h-12 rounded-full object-cover">
                                        @else
                                            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                                                <i class="fas fa-user text-blue-500"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex justify-between">
                                            <div>
                                                <h3 class="font-semibold text-gray-900">{{ $review->traveler_name }}</h3>
                                                <p class="text-sm text-gray-500">{{ $review->created_at->format('F Y') }}</p>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="text-yellow-400">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= $review->rating)
                                                            <i class="fas fa-star"></i>
                                                        @else
                                                            <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-2 text-gray-700">{{ $review->comment }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-6">
                        <div class="text-6xl text-gray-200 mb-4"><i class="fas fa-star"></i></div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-1">No reviews yet</h3>
                        <p class="text-gray-600">Be the first to leave a review for this property.</p>
                    </div>
                @endif
            </div>
            
            <!-- Location Section -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Location</h2>
                <div class="bg-gray-100 h-60 rounded-lg flex items-center justify-center mb-4">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-map-marker-alt text-4xl mb-2"></i>
                        <p>{{ $property->address }}, {{ $property->city }}</p>
                    </div>
                </div>
                <p class="text-gray-700">
                    The exact location will be provided after booking for privacy reasons.
                </p>
            </div>
        </div>
        
        <!-- Booking Card -->
        <div class="w-full lg:w-1/3">
            <div class="bg-white rounded-lg shadow-md p-6 sticky top-8">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span class="text-xl font-bold text-gray-900">${{ number_format($property->price_per_night, 2) }}</span>
                        <span class="text-gray-600">/ night</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                        <span>{{ number_format($property->getAverageRatingAttribute(), 1) }} · {{ count($reviews) }} reviews</span>
                    </div>
                </div>
                
                @if($property->is_available && $property->is_approved)
                    @auth
                        @if(Auth::user()->isTraveler() && $property->host_id !== Auth::id())
                            <a href="{{ route('reservations.create', $property->id) }}" class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-center font-medium py-3 px-4 rounded-md transition duration-150 ease-in-out mb-4">
                                Book now
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-center font-medium py-3 px-4 rounded-md transition duration-150 ease-in-out mb-4">
                            Log in to book
                        </a>
                    @endauth
                @else
                    <div class="w-full bg-gray-300 text-gray-600 text-center font-medium py-3 px-4 rounded-md mb-4 cursor-not-allowed">
                        Not available
                    </div>
                @endif
                
                <div class="space-y-4 text-sm">
                    <div class="flex justify-between">
                        <span>${{ number_format($property->price_per_night, 2) }} x 5 nights</span>
                        <span>${{ number_format($property->price_per_night * 5, 2) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Cleaning fee</span>
                        <span>${{ number_format($property->price_per_night * 0.1, 2) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Service fee</span>
                        <span>${{ number_format($property->price_per_night * 0.15, 2) }}</span>
                    </div>
                    <div class="pt-4 border-t border-gray-200 flex justify-between font-bold">
                        <span>Total</span>
                        <span>${{ number_format($property->price_per_night * 5 + $property->price_per_night * 0.1 + $property->price_per_night * 0.15, 2) }}</span>
                    </div>
                </div>
                
                <div class="mt-6 p-4 bg-gray-50 rounded-md">
                    <h3 class="font-medium text-gray-900 mb-2">Reservation guarantee</h3>
                    <p class="text-gray-700 text-sm">Your reservation is protected by our comprehensive policy. Read more about our terms and conditions.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
