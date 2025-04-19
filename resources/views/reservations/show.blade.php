@extends('layouts.app')

@section('title', 'Reservation Details - Stay & Travel Morocco')

@section('styles')
<style>
    .page-container {
        background-color: #f9f7f5;
    }
    
    .reservation-card {
        background-color: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    
    .status-header {
        padding: 1.5rem;
        position: relative;
    }
    
    .status-header.pending {
        background-color: #fffbeb;
    }
    
    .status-header.confirmed {
        background-color: #ecfdf5;
    }
    
    .status-header.completed {
        background-color: #eff6ff;
    }
    
    .status-header.cancelled {
        background-color: #fef2f2;
    }
    
    .status-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 6px;
        background-image: url("data:image/svg+xml,%3Csvg width='100' height='6' viewBox='0 0 100 6' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 6 L10 0 L20 6 L30 0 L40 6 L50 0 L60 6 L70 0 L80 6 L90 0 L100 6 L100 6 L0 6' fill='white'/%3E%3C/svg%3E");
        background-size: 100px 6px;
        background-repeat: repeat-x;
    }
    
    .status-title {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
    }
    
    .status-title.pending {
        color: #92400e;
    }
    
    .status-title.confirmed {
        color: #065f46;
    }
    
    .status-title.completed {
        color: #1e40af;
    }
    
    .status-title.cancelled {
        color: #b91c1c;
    }
    
    .status-description {
        margin-top: 0.5rem;
    }
    
    .status-description.pending {
        color: #92400e;
    }
    
    .status-description.confirmed {
        color: #065f46;
    }
    
    .status-description.completed {
        color: #1e40af;
    }
    
    .status-description.cancelled {
        color: #b91c1c;
    }
    
    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    
    .status-badge.pending {
        background-color: #fef3c7;
        color: #92400e;
    }
    
    .status-badge.confirmed {
        background-color: #d1fae5;
        color: #065f46;
    }
    
    .status-badge.completed {
        background-color: #dbeafe;
        color: #1e40af;
    }
    
    .status-badge.cancelled {
        background-color: #fee2e2;
        color: #b91c1c;
    }
    
    .property-image {
        height: 12rem;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .property-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .property-image-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #e5e7eb;
    }
    
    .property-title {
        font-weight: 700;
        font-size: 1.25rem;
        color: #1f2937;
    }
    
    .property-address {
        color: #6b7280;
        margin-top: 0.25rem;
        margin-bottom: 1rem;
    }
    
    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }
    
    .info-label {
        font-size: 0.75rem;
        color: #6b7280;
        font-weight: 500;
    }
    
    .info-value {
        font-weight: 600;
        color: #1f2937;
    }
    
    .info-subtext {
        font-size: 0.75rem;
        color: #6b7280;
    }
    
    .payment-details {
        background-color: #f9fafb;
        border-radius: 0.5rem;
        padding: 1rem;
    }
    
    .payment-row {
        display: flex;
        justify-content: space-between;
        padding: 0.5rem 0;
    }
    
    .payment-label {
        color: #6b7280;
    }
    
    .payment-value {
        color: #1f2937;
    }
    
    .payment-total {
        border-top: 1px solid #e5e7eb;
        padding-top: 0.75rem;
        margin-top: 0.25rem;
        font-weight: 700;
    }
    
    .payment-status {
        display: flex;
        align-items: center;
        margin-top: 1rem;
        font-size: 0.875rem;
    }
    
    .payment-status.completed i {
        color: #059669;
    }
    
    .payment-status.refunded i {
        color: #d97706;
    }
    
    .payment-status.pending i {
        color: #4b5563;
    }
    
    .contact-section {
        display: flex;
        align-items: center;
    }
    
    .contact-avatar {
        width: 3rem;
        height: 3rem;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 1rem;
    }
    
    .contact-placeholder {
        width: 3rem;
        height: 3rem;
        border-radius: 50%;
        background-color: #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
    }
    
    .contact-name {
        font-weight: 600;
        color: #1f2937;
    }
    
    .contact-role {
        font-size: 0.75rem;
        color: #6b7280;
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
    
    .btn-message {
        background-color: #dbeafe;
        color: #1e40af;
    }
    
    .btn-message:hover {
        background-color: #bfdbfe;
    }
    
    .btn-cancel {
        background-color: #fee2e2;
        color: #b91c1c;
    }
    
    .btn-cancel:hover {
        background-color: #fecaca;
    }
    
    .btn-confirm {
        background-color: #d1fae5;
        color: #065f46;
    }
    
    .btn-confirm:hover {
        background-color: #a7f3d0;
    }
    
    .btn-review {
        background-color: #fef3c7;
        color: #92400e;
    }
    
    .btn-review:hover {
        background-color: #fde68a;
    }
    
    .btn-view {
        background-color: #f3f4f6;
        color: #4b5563;
    }
    
    .btn-view:hover {
        background-color: #e5e7eb;
    }
    
    .btn-back {
        background-color: #f3f4f6;
        color: #4b5563;
    }
    
    .btn-back:hover {
        background-color: #e5e7eb;
    }
    
    .breadcrumbs {
        display: flex;
        align-items: center;
        font-size: 0.875rem;
        margin-bottom: 1.5rem;
    }
    
    .breadcrumb-link {
        color: #146eb4;
        transition: color 0.2s;
    }
    
    .breadcrumb-link:hover {
        color: #0f4f82;
    }
    
    .breadcrumb-separator {
        color: #9ca3af;
        margin: 0 0.5rem;
    }
    
    .breadcrumb-current {
        color: #6b7280;
    }
    
    .btn-payment {
        display: block;
        width: 100%;
        padding: 0.75rem;
        background-color: #d62828;
        color: white;
        border-radius: 0.5rem;
        font-weight: 600;
        text-align: center;
        transition: all 0.2s;
        margin-top: 1rem;
    }
    
    .btn-payment:hover {
        background-color: #b82020;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(214, 40, 40, 0.3);
    }
    
    .btn-payment:disabled {
        background-color: #cccccc;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }
    
    .price-value {
        font-weight: 600;
        color: #1f2937;
    }
    
    .price-total {
        font-weight: 700;
        color: #d62828;
    }
    
    /* Payment Form Styles */
    .payment-form {
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid #e5e7eb;
    }
    
    .payment-form-title {
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }
    
    .form-group {
        margin-bottom: 1rem;
    }
    
    .form-label {
        display: block;
        margin-bottom: 0.25rem;
        font-size: 0.875rem;
        font-weight: 500;
        color: #4b5563;
    }
    
    .form-input {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #d1d5db;
        border-radius: 0.25rem;
        font-size: 0.875rem;
    }
    
    .payment-card-row {
        display: flex;
        gap: 1rem;
    }
    
    .payment-card-row .form-group {
        flex: 1;
    }
    
    #card-errors {
        color: #dc2626;
        font-size: 0.75rem;
        margin-top: 0.5rem;
    }
    
    .spinner {
        border: 2px solid #f3f3f3;
        border-top: 2px solid #d62828;
        border-radius: 50%;
        width: 16px;
        height: 16px;
        animation: spin 1s linear infinite;
        display: inline-block;
        vertical-align: middle;
        margin-right: 0.5rem;
        display: none;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@endsection

@section('content')
<div class="page-container py-10">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <!-- Breadcrumbs -->
            <div class="breadcrumbs">
                @if(Auth::user()->isTraveler())
                    <a href="{{ route('reservations.index') }}" class="breadcrumb-link">My Trips</a>
                @elseif(Auth::user()->isHost())
                    <a href="{{ route('host.reservations') }}" class="breadcrumb-link">Reservations</a>
                @endif
                <span class="breadcrumb-separator">/</span>
                <span class="breadcrumb-current">Reservation #{{ $reservation->id }}</span>
            </div>
            
            <div class="reservation-card">
                <!-- Status Header -->
                <div class="status-header {{ $reservation->status }}">
                    <div class="flex justify-between items-center">
                        <h1 class="status-title {{ $reservation->status }} text-2xl">
                            Reservation #{{ $reservation->id }}
                        </h1>
                        
                        <div>
                            @if($reservation->status == 'pending')
                                <span class="status-badge pending">
                                    <i class="fas fa-clock mr-2"></i> Pending
                                </span>
                            @elseif($reservation->status == 'confirmed')
                                <span class="status-badge confirmed">
                                    <i class="fas fa-check-circle mr-2"></i> Confirmed
                                </span>
                            @elseif($reservation->status == 'completed')
                                <span class="status-badge completed">
                                    <i class="fas fa-check-double mr-2"></i> Completed
                                </span>
                            @elseif($reservation->status == 'cancelled')
                                <span class="status-badge cancelled">
                                    <i class="fas fa-times-circle mr-2"></i> Cancelled
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <p class="status-description {{ $reservation->status }}">
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
                            <div class="property-image">
                                @if($reservation->property->main_image)
                                    <img src="{{ asset('storage/properties/' . $reservation->property->main_image) }}" alt="{{ $reservation->property->title }}">
                                @else
                                    <div class="property-image-placeholder">
                                        <i class="fas fa-home text-5xl text-gray-400"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="md:w-2/3">
                            <h2 class="property-title">{{ $reservation->property->title }}</h2>
                            <p class="property-address">{{ $reservation->property->address }}, {{ $reservation->property->city }}</p>
                            
                            <div class="info-grid">
                                <div>
                                    <h3 class="info-label">Check-in</h3>
                                    <p class="info-value">{{ date('F d, Y', strtotime($reservation->check_in_date)) }}</p>
                                    <p class="info-subtext">After 3:00 PM</p>
                                </div>
                                
                                <div>
                                    <h3 class="info-label">Check-out</h3>
                                    <p class="info-value">{{ date('F d, Y', strtotime($reservation->check_out_date)) }}</p>
                                    <p class="info-subtext">Before 11:00 AM</p>
                                </div>
                                
                                <div>
                                    <h3 class="info-label">Guests</h3>
                                    <p class="info-value">{{ $reservation->guests_count }} {{ $reservation->guests_count > 1 ? 'guests' : 'guest' }}</p>
                                </div>
                                
                                <div>
                                    <h3 class="info-label">Duration</h3>
                                    <p class="info-value">
                                        {{ date_diff(date_create($reservation->check_in_date), date_create($reservation->check_out_date))->days }} nights
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Payment Information -->
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-xl font-bold text-gray-900 mb-4 font-serif">Payment Information</h2>
                    
                    <div class="payment-details">
                        <div class="mb-4">
                            <div class="payment-row">
                                <span class="payment-label">{{ number_format($reservation->property->price_per_night) }} MAD x {{ date_diff(date_create($reservation->check_in_date), date_create($reservation->check_out_date))->days }} nights</span>
                                <span class="payment-value">{{ number_format($reservation->property->price_per_night * date_diff(date_create($reservation->check_in_date), date_create($reservation->check_out_date))->days) }} MAD</span>
                            </div>
                            <div class="payment-row">
                                <span class="payment-label">Cleaning fee</span>
                                <span class="payment-value">{{ number_format($reservation->property->price_per_night * 0.1) }} MAD</span>
                            </div>
                            <div class="payment-row">
                                <span class="payment-label">Service fee</span>
                                <span class="payment-value">{{ number_format($reservation->property->price_per_night * 0.15) }} MAD</span>
                            </div>
                        </div>
                        
                        <div class="payment-row payment-total">
                            <span>Total</span>
                            <span class="price-total">{{ number_format($reservation->total_price) }} MAD</span>
                        </div>
                        
                        @if($reservation->transaction)
                            <div class="payment-status 
                                {{ $reservation->transaction->status == 'completed' ? 'completed' : '' }}
                                {{ $reservation->transaction->status == 'refunded' ? 'refunded' : '' }}
                                {{ $reservation->transaction->status == 'pending' ? 'pending' : '' }}">
                                <i class="fas {{ $reservation->transaction->status == 'completed' ? 'fa-credit-card' : ($reservation->transaction->status == 'refunded' ? 'fa-undo' : 'fa-hourglass-half') }} mr-2"></i>
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
                        @endif
                        
                        @if($reservation->status == 'pending' && !$reservation->transaction)
                            <div class="payment-form">
                                <h3 class="payment-form-title">Enter Payment Information</h3>
                                <form id="payment-form" action="{{ route('payment.intent') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                                    
                                    <div class="form-group">
                                        <label for="card-holder" class="form-label">Card Holder Name</label>
                                        <input type="text" id="card-holder" class="form-input" placeholder="Full name on card" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="card-number" class="form-label">Card Number</label>
                                        <input type="text" id="card-number" class="form-input" placeholder="XXXX XXXX XXXX XXXX" maxlength="19" required>
                                    </div>
                                    
                                    <div class="payment-card-row">
                                        <div class="form-group">
                                            <label for="card-expiry" class="form-label">Expiration Date</label>
                                            <input type="text" id="card-expiry" class="form-input" placeholder="MM/YY" maxlength="5" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="card-cvc" class="form-label">Security Code (CVC)</label>
                                            <input type="text" id="card-cvc" class="form-input" placeholder="CVC" maxlength="3" required>
                                        </div>
                                    </div>
                                    
                                    <div id="card-errors" role="alert"></div>
                                    
                                    <button type="submit" id="payment-button" class="btn-payment" disabled>
                                        <span id="spinner" class="spinner"></span>
                                        Pay {{ number_format($reservation->total_price) }} MAD
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Contact Host / Traveler Section -->
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-xl font-bold text-gray-900 mb-4 font-serif">
                        @if(Auth::user()->isTraveler())
                            Contact Host
                        @else
                            Traveler Information
                        @endif
                    </h2>
                    
                    <div class="contact-section">
                        @if(Auth::user()->isTraveler())
                            @if($reservation->property->host->profile_image)
                                <img src="{{ asset('storage/profiles/' . $reservation->property->host->profile_image) }}" alt="{{ $reservation->property->host->name }}" class="contact-avatar">
                            @else
                                <div class="contact-placeholder">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                            @endif
                            <div>
                                <h3 class="contact-name">{{ $reservation->property->host->name }}</h3>
                                <p class="contact-role">Host</p>
                            </div>
                        @else
                            @if($reservation->traveler->profile_image)
                                <img src="{{ asset('storage/profiles/' . $reservation->traveler->profile_image) }}" alt="{{ $reservation->traveler->name }}" class="contact-avatar">
                            @else
                                <div class="contact-placeholder">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                            @endif
                            <div>
                                <h3 class="contact-name">{{ $reservation->traveler->name }}</h3>
                                <p class="contact-role">Traveler</p>
                            </div>
                        @endif
                        
                        <div class="ml-auto">
                            @if(Auth::user()->isTraveler())
                                <a href="{{ route('messages.conversation', $reservation->property->host_id) }}" class="btn-action btn-message">
                                    <i class="fas fa-comment-alt mr-2"></i> Message Host
                                </a>
                            @else
                                <a href="{{ route('messages.conversation', $reservation->traveler_id) }}" class="btn-action btn-message">
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
                            <button type="submit" class="btn-action btn-cancel">
                                <i class="fas fa-times-circle mr-2"></i> Cancel Reservation
                            </button>
                        </form>
                    @endif
                    
                    @if(Auth::user()->isHost() && $reservation->status == 'pending')
                        <form method="POST" action="{{ route('reservations.update', $reservation->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="confirmed">
                            <button type="submit" class="btn-action btn-confirm">
                                <i class="fas fa-check-circle mr-2"></i> Confirm Reservation
                            </button>
                        </form>
                        
                        <form method="POST" action="{{ route('reservations.update', $reservation->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="cancelled">
                            <button type="submit" class="btn-action btn-cancel">
                                <i class="fas fa-times-circle mr-2"></i> Decline Reservation
                            </button>
                        </form>
                    @endif
                    
                    @if(Auth::user()->isTraveler() && ($reservation->status == 'completed' || $reservation->status == 'confirmed') && !$reservation->review)
                        <a href="{{ route('reviews.create', $reservation->id) }}" class="btn-action btn-review">
                            <i class="fas fa-star mr-2"></i> Leave a Review
                        </a>
                    @endif
                    
                    <a href="{{ route('properties.show', $reservation->property_id) }}" class="btn-action btn-view">
                        <i class="fas fa-eye mr-2"></i> View Property
                    </a>
                    
                    @if(Auth::user()->isTraveler())
                        <a href="{{ route('reservations.index') }}" class="btn-action btn-back">
                            <i class="fas fa-arrow-left mr-2"></i> Back to My Trips
                        </a>
                    @else
                        <a href="{{ route('host.reservations') }}" class="btn-action btn-back">
                            <i class="fas fa-arrow-left mr-2"></i> Back to Reservations
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Only run this script if the payment form exists
        if (document.getElementById('payment-form')) {
            const paymentForm = document.getElementById('payment-form');
            const paymentButton = document.getElementById('payment-button');
            const spinner = document.getElementById('spinner');
            const cardHolder = document.getElementById('card-holder');
            const cardNumber = document.getElementById('card-number');
            const cardExpiry = document.getElementById('card-expiry');
            const cardCvc = document.getElementById('card-cvc');
            const cardErrors = document.getElementById('card-errors');
            
            // Format card number with spaces
            cardNumber.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
                let formattedValue = '';
                
                for (let i = 0; i < value.length; i++) {
                    if (i > 0 && i % 4 === 0) {
                        formattedValue += ' ';
                    }
                    formattedValue += value[i];
                }
                
                e.target.value = formattedValue;
            });
            
            // Format expiry date
            cardExpiry.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
                
                if (value.length > 2) {
                    e.target.value = value.substring(0, 2) + '/' + value.substring(2);
                } else {
                    e.target.value = value;
                }
            });
            
            // Only allow numbers for CVC
            cardCvc.addEventListener('input', function(e) {
                e.target.value = e.target.value.replace(/[^0-9]/gi, '');
            });
            
            // Check form validity on input
            function checkFormValidity() {
                const isNameValid = cardHolder.value.trim().length > 3;
                const isCardNumberValid = cardNumber.value.replace(/\s+/g, '').length === 16;
                const isExpiryValid = /^\d{2}\/\d{2}$/.test(cardExpiry.value);
                const isCvcValid = cardCvc.value.length === 3;
                
                // Simple validation
                if (!isNameValid) {
                    cardErrors.textContent = 'Please enter the cardholder name';
                    paymentButton.disabled = true;
                    return;}
                
                if (!isCardNumberValid) {
                    cardErrors.textContent = 'Please enter a valid 16-digit card number';
                    paymentButton.disabled = true;
                    return;
                }
                
                if (!isExpiryValid) {
                    cardErrors.textContent = 'Please enter a valid expiration date (MM/YY)';
                    paymentButton.disabled = true;
                    return;
                }
                
                if (!isCvcValid) {
                    cardErrors.textContent = 'Please enter a valid 3-digit CVC code';
                    paymentButton.disabled = true;
                    return;
                }
                
                // All validations passed
                cardErrors.textContent = '';
                paymentButton.disabled = false;
            }
            
            // Add event listeners to all form fields
            cardHolder.addEventListener('input', checkFormValidity);
            cardNumber.addEventListener('input', checkFormValidity);
            cardExpiry.addEventListener('input', checkFormValidity);
            cardCvc.addEventListener('input', checkFormValidity);
            
            // Handle form submission
            paymentForm.addEventListener('submit', function(event) {
                event.preventDefault();
                
                // Show spinner
                spinner.style.display = 'inline-block';
                paymentButton.disabled = true;
                
                // In a real implementation, you would send the card data to your server
                // or use a payment processor's JS library here
                
                // Simulate payment processing
                setTimeout(function() {
                    // Submit the form
                    paymentForm.submit();
                }, 1500);
            });
            
            // Initial check
            checkFormValidity();
        }
    });
</script>
@endsection