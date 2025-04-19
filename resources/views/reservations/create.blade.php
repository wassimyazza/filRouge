@extends('layouts.app')

@section('title', 'Make a Reservation - Stay & Travel')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-5xl mx-auto">
        <!-- Breadcrumbs -->
        <div class="mb-6 text-sm">
            <a href="{{ route('properties.index') }}" class="text-blue-600 hover:text-blue-800">Properties</a>
            <span class="text-gray-500 mx-2">/</span>
            <a href="{{ route('properties.show', $property->id) }}" class="text-blue-600 hover:text-blue-800">{{ $property->title }}</a>
            <span class="text-gray-500 mx-2">/</span>
            <span class="text-gray-700">Make a Reservation</span>
        </div>
        
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Reservation Form -->
            <div class="w-full lg:w-2/3">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Make a Reservation</h1>
                
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-6 bg-blue-50 border-b border-blue-100">
                        <h2 class="text-lg font-semibold text-blue-800">{{ $property->title }}</h2>
                        <p class="text-blue-600">{{ $property->address }}, {{ $property->city }}</p>
                    </div>
                    
                    <form method="POST" action="{{ route('reservations.store') }}" class="p-6">
                        @csrf
                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                        
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Select Your Dates</label>
                            <div class="p-4 bg-blue-50 border border-blue-100 rounded-md">
                                <div id="reservation-calendar" class="mb-4"></div>
                                <!-- Hidden inputs that will be populated by the date picker -->
                                <input type="hidden" name="check_in_date" id="check_in_date" required>
                                <input type="hidden" name="check_out_date" id="check_out_date" required>
                                
                                <div class="mt-2 flex items-center text-sm">
                                    <div class="flex items-center mr-4">
                                        <div class="w-4 h-4 bg-green-100 border border-green-300 rounded-sm mr-1"></div>
                                        <span>Available</span>
                                    </div>
                                    <div class="flex items-center mr-4">
                                        <div class="w-4 h-4 bg-gray-200 border border-gray-300 rounded-sm mr-1"></div>
                                        <span>Unavailable</span>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-4 h-4 bg-blue-500 border border-blue-600 rounded-sm mr-1"></div>
                                        <span>Selected</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex mt-3 text-sm">
                                <div class="w-1/2 pr-2">
                                    <label class="block text-gray-700">Check-in</label>
                                    <div id="display-check-in" class="font-medium">-</div>
                                </div>
                                <div class="w-1/2 pl-2">
                                    <label class="block text-gray-700">Check-out</label>
                                    <div id="display-check-out" class="font-medium">-</div>
                                </div>
                            </div>
                            
                            @error('check_in_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            @error('check_out_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-6">
                            <label for="guests_count" class="block text-sm font-medium text-gray-700 mb-1">Number of Guests *</label>
                            <select name="guests_count" id="guests_count" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @for($i = 1; $i <= $property->capacity; $i++)
                                    <option value="{{ $i }}" {{ old('guests_count') == $i ? 'selected' : '' }}>{{ $i }} {{ $i == 1 ? 'guest' : 'guests' }}</option>
                                @endfor
                            </select>
                            @error('guests_count')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-6 p-4 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm">
                                        By proceeding with this reservation, you agree to the host's house rules and the refund policy.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-end">
                            <a href="{{ route('properties.show', $property->id) }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-md mr-2 transition">
                                Cancel
                            </a>
                            <button type="submit" id="reservation-submit" disabled class="bg-gray-400 text-white font-medium py-2 px-4 rounded-md transition">
                                Continue to Review
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Property Summary -->
            <div class="w-full lg:w-1/3">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-8">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Reservation Summary</h2>
                    
                    <div class="flex mb-4">
                        <div class="w-1/3 bg-blue-100 rounded-lg overflow-hidden">
                            @if($property->main_image)
                                <img src="{{ asset('storage/properties/' . $property->main_image) }}" alt="{{ $property->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="h-full flex items-center justify-center">
                                    <i class="fas fa-home text-3xl text-blue-300"></i>
                                </div>
                            @endif
                        </div>
                        <div class="w-2/3 pl-4">
                            <h3 class="font-medium text-gray-900">{{ $property->title }}</h3>
                            <p class="text-sm text-gray-600">{{ $property->city }}</p>
                            <div class="flex items-center mt-1 text-sm">
                                <span class="flex items-center text-yellow-500">
                                    <i class="fas fa-star"></i>
                                    <span class="ml-1 text-gray-700">{{ number_format($property->getAverageRatingAttribute(), 1) }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-200 py-4">
                        <div class="flex justify-between mb-1">
                            <div>
                                <span id="price-per-night">{{ number_format($property->price_per_night, 2) }} MAD</span> x <span id="num-nights">0</span> nights
                            </div>
                            <div id="subtotal">0 MAD</div>
                        </div>
                        <div class="flex justify-between mb-1">
                            <div>Cleaning fee</div>
                            <div id="cleaning-fee">0 MAD</div>
                        </div>
                        <div class="flex justify-between mb-1">
                            <div>Service fee</div>
                            <div id="service-fee">0 MAD</div>
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex justify-between font-bold">
                            <div>Total</div>
                            <div id="total-price">0 MAD</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    .flatpickr-day.booked {
        background-color: #f7fafc;
        color: #cbd5e0;
        text-decoration: line-through;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get property price
        var pricePerNight = {{ $property->price_per_night }};
        
        // Get booked dates from PHP
        var bookedDates = @json($bookedDates);
        
        // Prepare disabled dates for calendar
        var disabledDates = [];
        
        // Loop through booked dates and add all dates in range
        bookedDates.forEach(function(booking) {
            var startDate = new Date(booking.check_in_date);
            var endDate = new Date(booking.check_out_date);
            
            // Loop through each day in range
            var currentDate = new Date(startDate);
            while (currentDate <= endDate) {
                disabledDates.push(formatDate(currentDate));
                currentDate.setDate(currentDate.getDate() + 1);
            }
        });
        
        // Initialize calendar
        var calendar = flatpickr("#reservation-calendar", {
            mode: "range",
            minDate: "today",
            inline: true,
            disable: disabledDates,
            dateFormat: "Y-m-d",
            onChange: function(selectedDates) {
                // Only update if we have both dates
                if (selectedDates.length === 2) {
                    var checkIn = selectedDates[0];
                    var checkOut = selectedDates[1];
                    
                    // Update hidden inputs for form submission
                    document.getElementById('check_in_date').value = formatDate(checkIn);
                    document.getElementById('check_out_date').value = formatDate(checkOut);
                    
                    // Show selected dates to user
                    document.getElementById('display-check-in').textContent = formatDisplayDate(checkIn);
                    document.getElementById('display-check-out').textContent = formatDisplayDate(checkOut);
                    
                    // Calculate nights
                    var nights = calculateNights(checkIn, checkOut);
                    
                    // Update pricing
                    updatePricing(nights);
                    
                    // Enable the submit button
                    var submitButton = document.getElementById('reservation-submit');
                    submitButton.disabled = false;
                    submitButton.classList.remove('bg-gray-400');
                    submitButton.classList.add('bg-blue-600', 'hover:bg-blue-700');
                }
            }
        });
        
        // Helper function to format date for hidden input
        function formatDate(date) {
            var d = new Date(date);
            var month = '' + (d.getMonth() + 1);
            var day = '' + d.getDate();
            var year = d.getFullYear();
            
            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;
            
            return [year, month, day].join('-');
        }
        
        // Helper function to format date for display
        function formatDisplayDate(date) {
            var options = { weekday: 'short', month: 'short', day: 'numeric', year: 'numeric' };
            return date.toLocaleDateString('en-US', options);
        }
        
        // Calculate nights between two dates
        function calculateNights(checkIn, checkOut) {
            var timeDiff = checkOut.getTime() - checkIn.getTime();
            return Math.ceil(timeDiff / (1000 * 3600 * 24));
        }
        
        // Update pricing calculations
        function updatePricing(nights) {
            // Update nights display
            document.getElementById('num-nights').textContent = nights;
            
            // Calculate subtotal
            var subtotal = pricePerNight * nights;
            document.getElementById('subtotal').textContent = formatPrice(subtotal);
            
            // Calculate cleaning fee (10% of price per night)
            var cleaningFee = pricePerNight * 0.1;
            document.getElementById('cleaning-fee').textContent = formatPrice(cleaningFee);
            
            // Calculate service fee (15% of price per night)
            var serviceFee = pricePerNight * 0.15;
            document.getElementById('service-fee').textContent = formatPrice(serviceFee);
            
            // Calculate total
            var total = subtotal + cleaningFee + serviceFee;
            document.getElementById('total-price').textContent = formatPrice(total);
        }
        
        // Format price to show MAD currency
        function formatPrice(price) {
            return Math.round(price).toLocaleString() + ' MAD';
        }
    });
</script>
@endsection

@endsection