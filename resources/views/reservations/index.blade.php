@extends('layouts.app')

@section('title', 'My Trips - Stay & Travel Morocco')

@section('styles')
<style>
    .page-container {
        background-color: #f9f7f5;
    }
    
    .tab-button {
        position: relative;
        padding: 0.75rem 1rem;
        font-weight: 500;
        transition: all 0.2s;
    }
    
    .tab-button:hover {
        color: #d62828;
    }
    
    .tab-button::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background-color: transparent;
        transition: all 0.2s;
    }
    
    .tab-button.active {
        color: #d62828;
    }
    
    .tab-button.active::after {
        background-color: #d62828;
    }
    
    .trip-card {
        background-color: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        transition: all 0.3s;
    }
    
    .trip-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 20px rgba(0,0,0,0.1);
    }
    
    .trip-image {
        position: relative;
    }
    
    .trip-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .trip-image-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #e5e7eb;
    }
    
    .status-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .status-pending {
        background-color: #fef3c7;
        color: #92400e;
    }
    
    .status-confirmed {
        background-color: #d1fae5;
        color: #065f46;
    }
    
    .status-completed {
        background-color: #dbeafe;
        color: #1e40af;
    }
    
    .status-cancelled {
        background-color: #fee2e2;
        color: #b91c1c;
    }
    
    .trip-info {
        padding: 1.5rem;
    }
    
    .trip-title {
        font-weight: 700;
        font-size: 1.25rem;
        color: #1f2937;
        margin-bottom: 0.25rem;
    }
    
    .trip-location {
        color: #6b7280;
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }
    
    .trip-location i {
        color: #d62828;
        margin-right: 0.5rem;
    }
    
    .trip-detail-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }
    
    .trip-detail-label {
        font-size: 0.75rem;
        color: #6b7280;
        font-weight: 500;
    }
    
    .trip-detail-value {
        font-weight: 600;
        color: #1f2937;
    }
    
    .btn-action {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.2s;
    }
    
    .btn-action:hover {
        transform: translateY(-2px);
    }
    
    .btn-primary {
        background-color: #dbeafe;
        color: #1e40af;
    }
    
    .btn-primary:hover {
        background-color: #bfdbfe;
    }
    
    .btn-danger {
        background-color: #fee2e2;
        color: #b91c1c;
    }
    
    .btn-danger:hover {
        background-color: #fecaca;
    }
    
    .btn-success {
        background-color: #d1fae5;
        color: #065f46;
    }
    
    .btn-success:hover {
        background-color: #a7f3d0;
    }
    
    .btn-warning {
        background-color: #fef3c7;
        color: #92400e;
    }
    
    .btn-warning:hover {
        background-color: #fde68a;
    }
    
    .price-value {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        color: #d62828;
    }
    
    .empty-trips {
        background-color: white;
        border-radius: 12px;
        padding: 3rem 2rem;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }
    
    .empty-trips-icon {
        font-size: 4rem;
        color: #e5e7eb;
        margin-bottom: 1.5rem;
    }
    
    .empty-trips-title {
        font-weight: 700;
        font-size: 1.5rem;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }
    
    .empty-trips-text {
        color: #6b7280;
        max-width: 20rem;
        margin: 0 auto 1.5rem;
    }
    
    .btn-browse {
        display: inline-flex;
        align-items: center;
        padding: 0.75rem 1.5rem;
        background-color: #d62828;
        color: white;
        border-radius: 0.5rem;
        font-weight: 600;
        transition: all 0.2s;
    }
    
    .btn-browse:hover {
        background-color: #b82020;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(214, 40, 40, 0.3);
    }
</style>
@endsection

@section('content')
<div class="page-container py-10">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row">
            <!-- Sidebar - Using the existing partial as requested -->
            <div class="w-full md:w-1/4 mb-8 md:mb-0 md:pr-6">
                @include('partials.sidebar', ['sidebar_title' => 'Traveler Dashboard'])
            </div>
            
            <!-- Main Content -->
            <div class="w-full md:w-3/4">
                <h1 class="text-2xl font-bold text-gray-900 mb-6 font-serif">My Trips</h1>
                
                <!-- Filter Tabs -->
                <div class="flex border-b border-gray-200 mb-6">
                    <button id="all-tab" class="tab-button active">All</button>
                    <button id="upcoming-tab" class="tab-button">Upcoming</button>
                    <button id="past-tab" class="tab-button">Past</button>
                    <button id="cancelled-tab" class="tab-button">Cancelled</button>
                </div>
                
                @if(count($reservations) > 0)
                    <div class="space-y-6">
                        @foreach($reservations as $reservation)
                            <div class="reservation-item trip-card" 
                                data-status="{{ $reservation->status }}" 
                                data-date="{{ $reservation->check_out_date }}">
                                <div class="md:flex">
                                    <div class="md:w-1/3 trip-image">
                                        @if($reservation->property->main_image)
                                            <img src="{{ asset('storage/properties/' . $reservation->property->main_image) }}" alt="{{ $reservation->property->title }}">
                                        @else
                                            <div class="trip-image-placeholder">
                                                <i class="fas fa-home text-5xl text-gray-400"></i>
                                            </div>
                                        @endif
                                        
                                        @if($reservation->status == 'pending')
                                            <span class="status-badge status-pending">
                                                <i class="fas fa-clock mr-1"></i> Pending
                                            </span>
                                        @elseif($reservation->status == 'confirmed')
                                            <span class="status-badge status-confirmed">
                                                <i class="fas fa-check-circle mr-1"></i> Confirmed
                                            </span>
                                        @elseif($reservation->status == 'completed')
                                            <span class="status-badge status-completed">
                                                <i class="fas fa-check-double mr-1"></i> Completed
                                            </span>
                                        @elseif($reservation->status == 'cancelled')
                                            <span class="status-badge status-cancelled">
                                                <i class="fas fa-times-circle mr-1"></i> Cancelled
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <div class="md:w-2/3 trip-info">
                                        <h3 class="trip-title">{{ $reservation->property->title }}</h3>
                                        <p class="trip-location">
                                            <i class="fas fa-map-marker-alt"></i> {{ $reservation->property->city }}
                                        </p>
                                        
                                        <div class="trip-detail-grid mb-6">
                                            <div>
                                                <p class="trip-detail-label">Check-in</p>
                                                <p class="trip-detail-value">{{ date('M d, Y', strtotime($reservation->check_in_date)) }}</p>
                                            </div>
                                            <div>
                                                <p class="trip-detail-label">Check-out</p>
                                                <p class="trip-detail-value">{{ date('M d, Y', strtotime($reservation->check_out_date)) }}</p>
                                            </div>
                                            <div>
                                                <p class="trip-detail-label">Guests</p>
                                                <p class="trip-detail-value">{{ $reservation->guests_count }}</p>
                                            </div>
                                            <div>
                                                <p class="trip-detail-label">Total</p>
                                                <p class="price-value">{{ number_format($reservation->total_price) }} MAD</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex flex-wrap gap-3">
                                            <a href="{{ route('reservations.show', $reservation->id) }}" class="btn-action btn-primary">
                                                <i class="fas fa-info-circle mr-2"></i> View Details
                                            </a>
                                            
                                            @if($reservation->status == 'pending')
                                                <form method="POST" action="{{ route('reservations.cancel', $reservation->id) }}" onsubmit="return confirm('Are you sure you want to cancel this reservation?');">
                                                    @csrf
                                                    <button type="submit" class="btn-action btn-danger">
                                                        <i class="fas fa-times mr-2"></i> Cancel
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            @if($reservation->status == 'completed' && !$reservation->review)
                                                <a href="{{ route('reviews.create', $reservation->id) }}" class="btn-action btn-success">
                                                    <i class="fas fa-star mr-2"></i> Leave Review
                                                </a>
                                            @endif
                                            
                                            @if($reservation->status == 'confirmed')
                                                <a href="#" class="btn-action btn-warning">
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
                    <div class="empty-trips">
                        <div class="empty-trips-icon">
                            <i class="fas fa-suitcase-rolling"></i>
                        </div>
                        <h2 class="empty-trips-title">No trips yet</h2>
                        <p class="empty-trips-text">Start exploring properties and book your next adventure in Morocco.</p>
                        <a href="{{ route('properties.index') }}" class="btn-browse">
                            <i class="fas fa-search mr-2"></i> Browse Properties
                        </a>
                    </div>
                @endif
            </div>
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
            tab.classList.remove('active');
        });
        
        activeTab.classList.add('active');
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