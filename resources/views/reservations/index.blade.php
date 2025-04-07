@extends('layouts.app')

@section('title', 'My Trips - Stay & Travel')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="w-full md:w-1/4 mb-8 md:mb-0 md:pr-6">
            @include('partials.sidebar', ['sidebar_title' => 'Traveler Dashboard'])
        </div>
        
        <!-- Main Content -->
        <div class="w-full md:w-3/4">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">My Trips</h1>
            
            <!-- Filter Tabs -->
            <div class="flex border-b border-gray-200 mb-6">
                <button id="all-tab" class="text-blue-600 border-b-2 border-blue-600 py-2 px-4 font-medium">All</button>
                <button id="upcoming-tab" class="text-gray-600 hover:text-gray-800 py-2 px-4 font-medium">Upcoming</button>
                <button id="past-tab" class="text-gray-600 hover:text-gray-800 py-2 px-4 font-medium">Past</button>
                <button id="cancelled-tab" class="text-gray-600 hover:text-gray-800 py-2 px-4 font-medium">Cancelled</button>
            </div>
            
            @if(count($reservations) > 0)
                <div class="space-y-6">
                    @foreach($reservations as $reservation)
                        <div class="reservation-item bg-white rounded-lg shadow-md overflow-hidden" 
                             data-status="{{ $reservation->status }}" 
                             data-date="{{ $reservation->check_out_date }}">
                            <div class="md:flex">
                                <div class="md:w-1/3 h-48 md:h-auto bg-blue-100">
                                    @if($reservation->property->main_image)
                                        <img src="{{ asset('storage/properties/' . $reservation->property->main_image) }}" alt="{{ $reservation->property->title }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="h-full flex items-center justify-center">
                                            <i class="fas fa-home text-5xl text-blue-300"></i>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="md:w-2/3 p-6">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h2 class="text-xl font-bold text-gray-900">{{ $reservation->property->title }}</h2>
                                            <p class="text-gray-600">{{ $reservation->property->city }}</p>
                                        </div>
                                        
                                        <div>
                                            @if($reservation->status == 'pending')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    <i class="fas fa-clock mr-1"></i> Pending
                                                </span>
                                            @elseif($reservation->status == 'confirmed')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    <i class="fas fa-check-circle mr-1"></i> Confirmed
                                                </span>
                                            @elseif($reservation->status == 'completed')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                    <i class="fas fa-check-double mr-1"></i> Completed
                                                </span>
                                            @elseif($reservation->status == 'cancelled')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                    <i class="fas fa-times-circle mr-1"></i> Cancelled
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 grid grid-cols-2 gap-4">
                                        <div>
                                            <p class="text-sm text-gray-500">Check-in</p>
                                            <p class="font-medium">{{ date('M d, Y', strtotime($reservation->check_in_date)) }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500">Check-out</p>
                                            <p class="font-medium">{{ date('M d, Y', strtotime($reservation->check_out_date)) }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500">Guests</p>
                                            <p class="font-medium">{{ $reservation->guests_count }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500">Total</p>
                                            <p class="font-medium">${{ number_format($reservation->total_price, 2) }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-6 flex flex-wrap gap-3">
                                        <a href="{{ route('reservations.show', $reservation->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition">
                                            <i class="fas fa-info-circle mr-2"></i> View Details
                                        </a>
                                        
                                        @if($reservation->status == 'pending')
                                            <form method="POST" action="{{ route('reservations.cancel', $reservation->id) }}" onsubmit="return confirm('Are you sure you want to cancel this reservation?');">
                                                @csrf
                                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-100 text-red-700 rounded-md hover:bg-red-200 transition">
                                                    <i class="fas fa-times mr-2"></i> Cancel
                                                </button>
                                            </form>
                                        @endif
                                        
                                        @if($reservation->status == 'completed' && !$reservation->review)
                                            <a href="{{ route('reviews.create', $reservation->id) }}" class="inline-flex items-center px-4 py-2 bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition">
                                                <i class="fas fa-star mr-2"></i> Leave Review
                                            </a>
                                        @endif
                                        
                                        @if($reservation->status == 'confirmed')
                                            <a href="#" class="inline-flex items-center px-4 py-2 bg-yellow-100 text-yellow-700 rounded-md hover:bg-yellow-200 transition">
                                                <i class="fas fa-comment-alt mr-2"></i> Contact Host
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white p-8 rounded-lg shadow-md text-center">
                    <div class="text-6xl text-blue-200 mb-4"><i class="fas fa-suitcase-rolling"></i></div>
                    <h2 class="text-2xl font-bold text-gray-700 mb-2">No trips yet</h2>
                    <p class="text-gray-600 mb-6">Start exploring properties and book your next adventure.</p>
                    <a href="{{ route('properties.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md transition">
                        Browse Properties
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Tab functionality
    const allTab = document.getElementById('all-tab');
    const upcomingTab = document.getElementById('upcoming-tab');
    const pastTab = document.getElementById('past-tab');
    const cancelledTab = document.getElementById('cancelled-tab');
    const reservationItems = document.querySelectorAll('.reservation-item');
    
    // Set active tab style
    function setActiveTab(activeTab) {
        [allTab, upcomingTab, pastTab, cancelledTab].forEach(tab => {
            tab.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600');
            tab.classList.add('text-gray-600', 'hover:text-gray-800');
        });
        
        activeTab.classList.remove('text-gray-600', 'hover:text-gray-800');
        activeTab.classList.add('text-blue-600', 'border-b-2', 'border-blue-600');
    }
    
    // Filter reservations
    function filterReservations(filter) {
        const today = new Date().toISOString().split('T')[0];
        
        reservationItems.forEach(item => {
            const status = item.dataset.status;
            const checkoutDate = item.dataset.date;
            
            if (filter === 'all') {
                item.style.display = 'block';
            } else if (filter === 'upcoming' && (status === 'pending' || status === 'confirmed') && checkoutDate >= today) {
                item.style.display = 'block';
            } else if (filter === 'past' && (status === 'completed' || (status === 'confirmed' && checkoutDate < today))) {
                item.style.display = 'block';
            } else if (filter === 'cancelled' && status === 'cancelled') {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }
    
    // Event listeners
    allTab.addEventListener('click', function() {
        setActiveTab(allTab);
        filterReservations('all');
    });
    
    upcomingTab.addEventListener('click', function() {
        setActiveTab(upcomingTab);
        filterReservations('upcoming');
    });
    
    pastTab.addEventListener('click', function() {
        setActiveTab(pastTab);
        filterReservations('past');
    });
    
    cancelledTab.addEventListener('click', function() {
        setActiveTab(cancelledTab);
        filterReservations('cancelled');
    });
    
    // Initial setup
    filterReservations('all');
</script>
@endsection

@endsection
