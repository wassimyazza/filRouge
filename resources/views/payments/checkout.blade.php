@extends('layouts.app')

@section('title', 'Payment Checkout')

@section('styles')
<style>
    .payment-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }
    
    .booking-details {
        background-color: #f9f9f9;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 30px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .booking-details h3 {
        margin-top: 0;
        color: #484848;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }
    
    .detail-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }
    
    .detail-label {
        font-weight: 600;
        color: #717171;
    }
    
    .payment-form {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
    }
    
    #card-element {
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: #f9f9f9;
    }
    
    #card-errors {
        color: #ff3860;
        margin-top: 8px;
        font-size: 14px;
    }
    
    .btn-payment {
        background-color: #FF5A5F;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 4px;
        font-weight: 600;
        cursor: pointer;
        width: 100%;
        margin-top: 10px;
    }
    
    .btn-payment:hover {
        background-color: #FF3B41;
    }
    
    .payment-success {
        display: none;
        background-color: #e6f7e6;
        border: 1px solid #9ed49e;
        color: #3c763d;
        padding: 15px;
        border-radius: 4px;
        margin-top: 20px;
        text-align: center;
    }
    
    .payment-loading {
        display: none;
        text-align: center;
        margin-top: 15px;
    }
    
    .spinner {
        border: 4px solid #f3f3f3;
        border-top: 4px solid #FF5A5F;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        animation: spin 1s linear infinite;
        margin: 0 auto;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@endsection

@section('content')
<div class="payment-container">
    <h2>Complete Your Booking</h2>
    
    <div class="booking-details">
        <h3>Booking Details</h3>
        <div class="detail-row">
            <span class="detail-label">Property:</span>
            <span>{{ $reservation->property->title }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Check-in:</span>
            <span>{{ date('M d, Y', strtotime($reservation->check_in_date)) }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Check-out:</span>
            <span>{{ date('M d, Y', strtotime($reservation->check_out_date)) }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Guests:</span>
            <span>{{ $reservation->guests_count }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Total Price:</span>
            <span class="price-total">{{ number_format($reservation->total_price, 0, '.', ',') }} MAD</span>
        </div>
    </div>
    
    <div class="payment-form">
        <h3>Payment Details</h3>
        <form id="payment-form" action="{{ route('payment.intent') }}" method="POST">
            @csrf
            <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
            
            <div class="form-group">
                <label for="card-element" class="form-label">Credit or debit card</label>
                <div id="card-element">
                    <!-- Stripe Card Element will be inserted here -->
                </div>
                <div id="card-errors" role="alert"></div>
            </div>
            
            <button type="submit" class="btn-payment">
                Pay {{ number_format($reservation->total_price, 0, '.', ',') }} MAD
            </button>
        </form>
        
        <div class="payment-loading">
            <div class="spinner"></div>
            <p>Processing payment...</p>
        </div>
        
        <div class="payment-success">
            <h4>Payment Successful!</h4>
            <p>Your booking has been confirmed. You will receive a confirmation email shortly.</p>
            <a href="{{ route('reservations.show', $reservation->id) }}" class="btn-payment" style="display: inline-block; width: auto; margin-top: 15px;">View Reservation</a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Stripe
        const stripe = Stripe('{{ env('STRIPE_KEY') }}');
        const elements = stripe.elements();
        
        // Create an instance of the card Element
        const cardElement = elements.create('card');
        
        // Add an instance of the card Element into the `card-element` div
        cardElement.mount('#card-element');
        
        // Handle form submission
        const form = document.getElementById('payment-form');
        form.addEventListener('submit', async function(event) {
            event.preventDefault();
            
            // Show loading
            document.querySelector('.payment-loading').style.display = 'block';
            
            // Submit form to create payment intent
            const formData = new FormData(form);
            
            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                
                const result = await response.json();
                
                // Handle the result
                if (result.success) {
                    // Show success message
                    document.querySelector('.payment-form form').style.display = 'none';
                    document.querySelector('.payment-loading').style.display = 'none';
                    document.querySelector('.payment-success').style.display = 'block';
                    
                    // Redirect after 3 seconds
                    setTimeout(function() {
                        window.location.href = "{{ route('reservations.show', $reservation->id) }}";
                    }, 3000);
                } else {
                    // Show error
                    document.querySelector('.payment-loading').style.display = 'none';
                    document.getElementById('card-errors').textContent = result.error || 'An error occurred. Please try again.';
                }
            } catch (error) {
                document.querySelector('.payment-loading').style.display = 'none';
                document.getElementById('card-errors').textContent = 'An error occurred. Please try again.';
                console.error('Error:', error);
            }
        });
    });
</script>
@endsection