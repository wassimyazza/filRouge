@extends('layouts.app')

@section('title', 'My Reservations - Host Dashboard - Stay & Travel')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="w-full md:w-1/4 mb-8 md:mb-0 md:pr-6">
            @include('partials.sidebar', ['sidebar_title' => 'Host Dashboard'])
        </div>
        
        <!-- Main Content -->
        <div class="w-full md:w-3/4">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Reservations for My Properties</h1>
            
            <!-- Filter Tabs -->
            <div class="flex border-b border-gray-200 mb-6">
                <button id="all-tab" class="text-blue-600 border-b-2 border-blue-600 py-2 px-4 font-medium">All</button>
                <button id="pending-tab" class="text-gray-600 hover:text-gray-800 py-2 px-4 font-medium">Pending</button>
                <button id="confirmed-tab" class="text-gray-600 hover:text-gray-800 py-2 px-4 font-medium">Confirmed</button>
                <button id="completed-tab" class="text-gray-600 hover:text-gray-800 py-2 px-4 font-medium">Completed</button>
                <button id="cancelled-tab" class="text-gray-600 hover:text-gray-800 py-2 px-4 font-medium">Cancelled</button>
            </div>
            
            @if(count($reservations) > 0)
                <div class="space-y-6">
                    @foreach($reservations as $reservation)
                        <div class="reservation-item bg-white rounded-lg shadow-md overflow-hidden" data-status="{{ $reservation->status }}">
                            <div class="md:flex">
                                <div class="md:w-1/3 bg-blue-50 p-6">
                                    <h3 class="font-semibold text-blue-800 mb-4">Reservation #{{ $reservation->id }}</h3>
                                    
                                    <div class="space-y-3">
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-700">Property:</h4>
                                            <p class="text-gray-900">{{ $reservation->property->title }}</p>
                                        </div>
                                        
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-700">Traveler:</h4>
                                            <div class="flex items-center">
                                                @if($reservation->traveler->profile_image)
                                                    <img src="{{ asset('storage/profiles/' . $reservation->traveler->profile_image) }}" alt="{{ $reservation->traveler->name }}" class="w-8 h-8 rounded-full mr-2 object-cover">
                                                @else
                                                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mr-2">
                                                        <i class="fas fa-user text-blue-500"></i>
                                                    </div>
                                                @endif
                                                <span>{{ $reservation->traveler->name }}</span>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-700">Status:</h4>
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
                                    </div>
                                </div>
                                
                                <div class="md:w-2/3 p-6">
                                    <div class="grid grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-700">Check-in:</h4>
                                            <p class="font-medium">{{ date('M d, Y', strtotime($reservation->check_in_date)) }}</p>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-700">Check-out:</h4>
                                            <p class="font-medium">{{ date('M d, Y', strtotime($reservation->check_out_date)) }}</p>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-700">Guests:</h4>
                                            <p class="font-medium">{{ $reservation->guests_count }}</p>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-700">Total:</h4>
                                            <p class="font-medium">{{ number_format($reservation->total_price, 2) }} MAD</p>
                                        </div>
                                    </div>
                                    
                                    <div class="border-t border-gray-200 pt-4 mt-4">
                                        <div class="flex flex-wrap gap-3">
                                            <a href="{{ route('reservations.show', $reservation->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition">
                                                <i class="fas fa-info-circle mr-2"></i> View Details
                                            </a>
                                            
                                            @if($reservation->status == 'pending')
                                                <form method="POST" action="{{ route('reservations.update', $reservation->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="confirmed">
                                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition">
                                                        <i class="fas fa-check mr-2"></i> Accept
                                                    </button>
                                                </form>
                                                
                                                <form method="POST" action="{{ route('reservations.update', $reservation->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="cancelled">
                                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-100 text-red-700 rounded-md hover:bg-red-200 transition">
                                                        <i class="fas fa-times mr-2"></i> Decline
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            <a href="{{ route('messages.conversation', $reservation->traveler_id) }}" class="inline-flex items-center px-4 py-2 bg-indigo-100 text-indigo-700 rounded-md hover:bg-indigo-200 transition">
                                                <i class="fas fa-comment-alt mr-2"></i> Message Traveler
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white p-8 rounded-lg shadow-md text-center">
                    <div class="text-6xl text-blue-200 mb-4"><i class="fas fa-calendar-check"></i></div>
                    <h2 class="text-2xl font-bold text-gray-700 mb-2">No reservations yet</h2>
                    <p class="text-gray-600 mb-6">When travelers book your properties, their reservations will appear here.</p>
                </div>
            @endif
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Tab functionality
    const allTab = document.getElementById('all-tab');
    const pendingTab = document.getElementById('pending-tab');
    const confirmedTab = document.getElementById('confirmed-tab');
    const completedTab = document.getElementById('completed-tab');
    const cancelledTab = document.getElementById('cancelled-tab');
    const reservationItems = document.querySelectorAll('.reservation-item');
    
    // Set active tab style
    function setActiveTab(activeTab) {
        [allTab, pendingTab, confirmedTab, completedTab, cancelledTab].forEach(tab => {
            tab.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600');
            tab.classList.add('text-gray-600', 'hover:text-gray-800');
        });
        
        activeTab.classList.remove('text-gray-600', 'hover:text-gray-800');
        activeTab.classList.add('text-blue-600', 'border-b-2', 'border-blue-600');
    }
    
    // Filter reservations
    function filterReservations(status) {
        reservationItems.forEach(item => {
            if (status === 'all' || item.dataset.status === status) {
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
    
    pendingTab.addEventListener('click', function() {
        setActiveTab(pendingTab);
        filterReservations('pending');
    });
    
    confirmedTab.addEventListener('click', function() {
        setActiveTab(confirmedTab);
        filterReservations('confirmed');
    });
    
    completedTab.addEventListener('click', function() {
        setActiveTab(completedTab);
        filterReservations('completed');
    });
    
    cancelledTab.addEventListener('click', function() {
        setActiveTab(cancelledTab);
        filterReservations('cancelled');
    });
</script>
@endsection

@endsection
