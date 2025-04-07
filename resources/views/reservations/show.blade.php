@extends('layouts.app')

@section('title', 'Reservation Details - Stay & Travel')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-5xl mx-auto">
        <!-- Breadcrumbs -->
        <div class="mb-6 text-sm">
            @if(Auth::user()->isTraveler())
                <a href="{{ route('reservations.index') }}" class="text-blue-600 hover:text-blue-800">My Trips</a>
            @elseif(Auth::user()->isHost())
                <a href="{{ route('host.reservations') }}" class="text-blue-600 hover:text-blue-800">Reservations</a>
            @endif
            <span class="text-gray-500 mx-2">/</span>
            <span class="text-gray-700">Reservation #{{ $reservation->id }}</span>
        </div>
        
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Status Header -->
            <div class="p-6 
                @if($reservation->status == 'pending') bg-yellow-50 
                @elseif($reservation->status == 'confirmed') bg-green-50 
                @elseif($reservation->status == 'completed') bg-blue-50 
                @elseif($reservation->status == 'cancelled') bg-red-50 
                @endif">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold 
                        @if($reservation->status == 'pending') text-yellow-800 
                        @elseif($reservation->status == 'confirmed') text-green-800 
                        @elseif($reservation->status == 'completed') text-blue-800 
                        @elseif($reservation->status == 'cancelled') text-red-800 
                        @endif">
                        Reservation #{{ $reservation->id }}
                    </h1>
                    
                    <div>
                        @if($reservation->status == 'pending')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                <i class="fas fa-clock mr-2"></i> Pending
                            </span>
                        @elseif($reservation->status == 'confirmed')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-2"></i> Confirmed
                            </span>
                        @elseif($reservation->status == 'completed')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                <i class="fas fa-check-double mr-2"></i> Completed
                            </span>
                        @elseif($reservation->status == 'cancelled')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                <i class="fas fa-times-circle mr-2"></i> Cancelled
                            </span>
                        @endif
                    </div>
                </div>
                
                <p class="mt-1 
                    @if($reservation->status == 'pending') text-yellow-700 
                    @elseif($reservation->status == 'confirmed') text-green-700 
                    @elseif($reservation->status == 'completed') text-blue-700 
                    @elseif($reservation->status == 'cancelled') text-red-700 
                    @endif">
                    
                    @if($reservation->status == 'pending')
                        Your reservation is pending confirmation from the host.
                    @elseif($reservation->status == 'confirmed')
                        Your reservation is confirmed. You're all set for your trip!
                    @elseif($reservation->status == 'completed')
                        Your stay has been completed. We hope you had a great time!
                    @elseif($reservation->status == 'cancelled')
                        This reservation has been cancelled.
                    @endif
                </p>
            </div>
            
            <!-- Property & Date Info -->
            <div class="p-6 border-b border-gray-200">
                <div class="md:flex">
                    <div class="md:w-1/3 mb-4 md:mb-0 md:pr-6">
                        <div class="rounded-lg overflow-hidden h-48 bg-blue-100">
                            @if($reservation->property->main_image)
                                <img src="{{ asset('storage/properties/' . $reservation->property->main_image) }}" alt="{{ $reservation->property->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="h-full flex items-center justify-center">
                                    <i class="fas fa-home text-5xl text-blue-300"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="md:w-2/3">
                        <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $reservation->property->title }}</h2>
                        <p class="text-gray-600 mb-4">{{ $reservation->property->address }}, {{ $reservation->property->city }}</p>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Check-in</h3>
                                <p class="font-semibold text-gray-800">{{ date('F d, Y', strtotime($reservation->check_in_date)) }}</p>
                                <p class="text-sm text-gray-600">After 3:00 PM</p>
                            </div>
                            
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Check-out</h3>
                                <p class="font-semibold text-gray-800">{{ date('F d, Y', strtotime($reservation->check_out_date)) }}</p>
                                <p class="text-sm text-gray-600">Before 11:00 AM</p>
                            </div>
                            
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Guests</h3>
                                <p class="font-semibold text-gray-800">{{ $reservation->guests_count }} {{ $reservation->guests_count > 1 ? 'guests' : 'guest' }}</p>
                            </div>
                            
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Duration</h3>
                                <p class="font-semibold text-gray-800">
                                    {{ date_diff(date_create($reservation->check_in_date), date_create($reservation->check_out_date))->days }} nights
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Payment Information -->
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-lg font-bold text-gray-900 mb-4">Payment Information</h2>
                
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="mb-4">
                        <div class="flex justify-between py-2">
                            <span class="text-gray-600">${{ number_format($reservation->property->price_per_night, 2) }} x {{ date_diff(date_create($reservation->check_in_date), date_create($reservation->check_out_date))->days }} nights</span>
                            <span class="text-gray-900">${{ number_format($reservation->property->price_per_night * date_diff(date_create($reservation->check_in_date), date_create($reservation->check_out_date))->days, 2) }}</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-gray-600">Cleaning fee</span>
                            <span class="text-gray-900">${{ number_format($reservation->property->price_per_night * 0.1, 2) }}</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-gray-600">Service fee</span>
                            <span class="text-gray-900">${{ number_format($reservation->property->price_per_night * 0.15, 2) }}</span>
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex justify-between">
                            <span class="font-bold text-gray-900">Total</span>
                            <span class="font-bold text-gray-900">${{ number_format($reservation->total_price, 2) }}</span>
                        </div>
                        
                        @if($reservation->transaction)
                            <div class="mt-4 text-sm">
                                <div class="flex items-center">
                                    <i class="fas fa-credit-card text-green-600 mr-2"></i>
                                    <span>
                                        @if($reservation->transaction->status == 'completed')
                                            Paid on {{ date('F d, Y', strtotime($reservation->transaction->created_at)) }}
                                        @elseif($reservation->transaction->status == 'refunded')
                                            Refunded on {{ date('F d, Y', strtotime($reservation->transaction->updated_at)) }}
                                        @elseif($reservation->transaction->status == 'pending')
                                            Payment pending
                                        @endif
                                    </span>
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    @if($reservation->status == 'pending' && !$reservation->transaction)
                        <div class="mt-4">
                            <form method="POST" action="{{ route('payment.intent') }}">
                                @csrf
                                <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition">
                                    Proceed to Payment
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Contact Host / Traveler Section -->
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-lg font-bold text-gray-900 mb-4">
                    @if(Auth::user()->isTraveler())
                        Contact Host
                    @else
                        Traveler Information
                    @endif
                </h2>
                
                <div class="flex items-center">
                    <div class="mr-4">
                        @if(Auth::user()->isTraveler())
                            @if($reservation->property->host->profile_image)
                                <img src="{{ asset('storage/profiles/' . $reservation->property->host->profile_image) }}" alt="{{ $reservation->property->host->name }}" class="w-12 h-12 rounded-full object-cover">
                            @else
                                <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                                    <i class="fas fa-user text-blue-500"></i>
                                </div>
                            @endif
                        @else
                            @if($reservation->traveler->profile_image)
                                <img src="{{ asset('storage/profiles/' . $reservation->traveler->profile_image) }}" alt="{{ $reservation->traveler->name }}" class="w-12 h-12 rounded-full object-cover">
                            @else
                                <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                                    <i class="fas fa-user text-blue-500"></i>
                                </div>
                            @endif
                        @endif
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-gray-900">
                            @if(Auth::user()->isTraveler())
                                {{ $reservation->property->host->name }}
                            @else
                                {{ $reservation->traveler->name }}
                            @endif
                        </h3>
                        <p class="text-gray-600 text-sm">
                            @if(Auth::user()->isTraveler())
                                Host
                            @else
                                Traveler
                            @endif
                        </p>
                    </div>
                    
                    <div class="ml-auto">
                        @if(Auth::user()->isTraveler())
                            <a href="{{ route('messages.conversation', $reservation->property->host_id) }}" class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition">
                                <i class="fas fa-comment-alt mr-2"></i> Message Host
                            </a>
                        @else
                            <a href="{{ route('messages.conversation', $reservation->traveler_id) }}" class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition">
                                <i class="fas fa-comment-alt mr-2"></i> Message Traveler
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="p-6 flex flex-wrap gap-3">
                @if(Auth::user()->isTraveler() && $reservation->status == 'pending')
                    <form method="POST" action="{{ route('reservations.cancel', $reservation->id) }}" onsubmit="return confirm('Are you sure you want to cancel this reservation?');">
                        @csrf
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-100 text-red-700 rounded-md hover:bg-red-200 transition">
                            <i class="fas fa-times-circle mr-2"></i> Cancel Reservation
                        </button>
                    </form>
                @endif
                
                @if(Auth::user()->isHost() && $reservation->status == 'pending')
                    <form method="POST" action="{{ route('reservations.update', $reservation->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="confirmed">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition">
                            <i class="fas fa-check-circle mr-2"></i> Confirm Reservation
                        </button>
                    </form>
                    
                    <form method="POST" action="{{ route('reservations.update', $reservation->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="cancelled">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-100 text-red-700 rounded-md hover:bg-red-200 transition">
                            <i class="fas fa-times-circle mr-2"></i> Decline Reservation
                        </button>
                    </form>
                @endif
                
                @if(Auth::user()->isTraveler() && ($reservation->status == 'completed' || $reservation->status == 'confirmed') && !$reservation->review)
                    <a href="{{ route('reviews.create', $reservation->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-100 text-yellow-700 rounded-md hover:bg-yellow-200 transition">
                        <i class="fas fa-star mr-2"></i> Leave a Review
                    </a>
                @endif
                
                <a href="{{ route('properties.show', $reservation->property_id) }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition">
                    <i class="fas fa-eye mr-2"></i> View Property
                </a>
                
                @if(Auth::user()->isTraveler())
                    <a href="{{ route('reservations.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition">
                        <i class="fas fa-arrow-left mr-2"></i> Back to My Trips
                    </a>
                @else
                    <a href="{{ route('host.reservations') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition">
                        <i class="fas fa-arrow-left mr-2"></i> Back to Reservations
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
