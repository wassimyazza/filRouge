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
                            <label for="check_in_date" class="block text-sm font-medium text-gray-700 mb-1">Check-in Date *</label>
                            <input type="date" name="check_in_date" id="check_in_date" value="{{ old('check_in_date', date('Y-m-d', strtotime('+1 day'))) }}" required min="{{ date('Y-m-d') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('check_in_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-6">
                            <label for="check_out_date" class="block text-sm font-medium text-gray-700 mb-1">Check-out Date *</label>
                            <input type="date" name="check_out_date" id="check_out_date" value="{{ old('check_out_date', date('Y-m-d', strtotime('+6 day'))) }}" required min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
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
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition">
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
                                <span id="price-per-night">${{ number_format($property->price_per_night, 2) }}</span> x <span id="num-nights">5</span> nights
                            </div>
                            <div id="subtotal">${{ number_format($property->price_per_night * 5, 2) }}</div>
                        </div>
                        <div class="flex justify-between mb-1">
                            <div>Cleaning fee</div>
                            <div id="cleaning-fee">${{ number_format($property->price_per_night * 0.1, 2) }}</div>
                        </div>
                        <div class="flex justify-between mb-1">
                            <div>Service fee</div>
                            <div id="service-fee">${{ number_format($property->price_per_night * 0.15, 2) }}</div>
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex justify-between font-bold">
                            <div>Total</div>
                            <div id="total-price">${{ number_format($property->price_per_night * 5 + $property->price_per_night * 0.1 + $property->price_per_night * 0.15, 2) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Date validation and price calculation
    document.addEventListener('DOMContentLoaded', function() {
        const checkInDateInput = document.getElementById('check_in_date');
        const checkOutDateInput = document.getElementById('check_out_date');
        const pricePerNight = parseFloat('{{ $property->price_per_night }}');
        
        // Update prices when dates change
        function updatePrices() {
            const checkInDate = new Date(checkInDateInput.value);
            const checkOutDate = new Date(checkOutDateInput.value);
            
            // Calculate number of nights
            const diffTime = Math.abs(checkOutDate - checkInDate);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            
            if (diffDays > 0) {
                // Update display
                document.getElementById('num-nights').textContent = diffDays;
                const subtotal = pricePerNight * diffDays;
                document.getElementById('subtotal').textContent = '$' + subtotal.toFixed(2);
                
                const cleaningFee = pricePerNight * 0.1;
                document.getElementById('cleaning-fee').textContent = '$' + cleaningFee.toFixed(2);
                
                const serviceFee = pricePerNight * 0.15;
                document.getElementById('service-fee').textContent = '$' + serviceFee.toFixed(2);
                
                const total = subtotal + cleaningFee + serviceFee;
                document.getElementById('total-price').textContent = '$' + total.toFixed(2);
            }
        }
        
        // Ensure checkout date is after checkin date
        checkInDateInput.addEventListener('change', function() {
            const checkInDate = new Date(this.value);
            const nextDay = new Date(checkInDate);
            nextDay.setDate(nextDay.getDate() + 1);
            
            const formattedDate = nextDay.toISOString().split('T')[0];
            checkOutDateInput.min = formattedDate;
            
            if (new Date(checkOutDateInput.value) <= checkInDate) {
                checkOutDateInput.value = formattedDate;
            }
            
            updatePrices();
        });
        
        checkOutDateInput.addEventListener('change', updatePrices);
        
        // Initialize
        updatePrices();
    });
</script>
@endsection

@endsection
