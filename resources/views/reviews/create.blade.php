@extends('layouts.app')

@section('title', 'Leave a Review - Stay & Travel')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-blue-600 text-white">
                <h1 class="text-xl font-bold">Leave a Review</h1>
                <p class="mt-1 text-sm text-blue-100">Share your experience at {{ $reservation->property->title }}</p>
            </div>
            
            <form method="POST" action="{{ route('reviews.store') }}" class="p-6">
                @csrf
                <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                
                <div class="mb-6">
                    <div class="flex items-center mb-2">
                        <img src="{{ $reservation->property->main_image ? asset('storage/properties/' . $reservation->property->main_image) : '' }}" 
                            alt="{{ $reservation->property->title }}" 
                            class="w-16 h-16 rounded-md object-cover mr-4"
                            onerror="this.onerror=null; this.innerHTML='<i class=\'fas fa-home text-3xl text-blue-300\'></i>'; this.classList.add('flex', 'items-center', 'justify-center', 'bg-blue-100');">
                        <div>
                            <h3 class="font-medium text-gray-900">{{ $reservation->property->title }}</h3>
                            <p class="text-sm text-gray-600">
                                Stayed from {{ date('M d, Y', strtotime($reservation->check_in_date)) }} to {{ date('M d, Y', strtotime($reservation->check_out_date)) }}
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label for="rating" class="block text-sm font-medium text-gray-700 mb-1">Overall Rating *</label>
                    <div class="flex items-center" id="rating-stars">
                        <button type="button" class="text-3xl text-gray-300 hover:text-yellow-400 focus:outline-none" data-value="1">★</button>
                        <button type="button" class="text-3xl text-gray-300 hover:text-yellow-400 focus:outline-none" data-value="2">★</button>
                        <button type="button" class="text-3xl text-gray-300 hover:text-yellow-400 focus:outline-none" data-value="3">★</button>
                        <button type="button" class="text-3xl text-gray-300 hover:text-yellow-400 focus:outline-none" data-value="4">★</button>
                        <button type="button" class="text-3xl text-gray-300 hover:text-yellow-400 focus:outline-none" data-value="5">★</button>
                        <span class="ml-2 text-gray-700" id="rating-text">Select a rating</span>
                    </div>
                    <input type="hidden" name="rating" id="rating" value="{{ old('rating') }}" required>
                    @error('rating')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">Your Review *</label>
                    <textarea name="comment" id="comment" rows="5" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('comment') }}</textarea>
                    <p class="mt-1 text-sm text-gray-500">
                        Share details about your experience. What did you enjoy? What could be improved? Your review will help other travelers.
                    </p>
                    @error('comment')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6 p-4 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm">
                                All reviews are moderated and will be visible to the public once approved by our team.
                                Please ensure your review follows our community guidelines.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-end">
                    <a href="{{ route('reservations.show', $reservation->id) }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-md mr-2 transition">
                        Cancel
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition">
                        Submit Review
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('#rating-stars button');
        const ratingInput = document.getElementById('rating');
        const ratingText = document.getElementById('rating-text');
        
        const descriptions = [
            'Poor',
            'Fair',
            'Good',
            'Very Good',
            'Excellent'
        ];
        
        // Set initial rating if it exists
        const initialRating = parseInt('{{ old('rating', 0) }}');
        if (initialRating > 0) {
            setRating(initialRating);
        }
        
        stars.forEach(star => {
            star.addEventListener('click', function() {
                const value = parseInt(this.dataset.value);
                setRating(value);
            });
        });
        
        function setRating(value) {
            ratingInput.value = value;
            
            stars.forEach((star, index) => {
                if (index < value) {
                    star.classList.remove('text-gray-300');
                    star.classList.add('text-yellow-400');
                } else {
                    star.classList.remove('text-yellow-400');
                    star.classList.add('text-gray-300');
                }
            });
            
            ratingText.textContent = descriptions[value - 1];
        }
    });
</script>
@endsection

@endsection
