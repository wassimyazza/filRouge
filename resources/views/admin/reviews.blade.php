@extends('layouts.app')

@section('title', 'Pending Reviews - Admin Dashboard - Stay & Travel')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="w-full md:w-1/4 mb-8 md:mb-0 md:pr-6">
            @include('partials.sidebar', ['sidebar_title' => 'Admin Dashboard'])
        </div>
        
        <!-- Main Content -->
        <div class="w-full md:w-3/4">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Pending Reviews</h1>
                <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-arrow-left mr-1"></i> Back to Dashboard
                </a>
            </div>
            
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 bg-blue-50 border-b border-blue-100">
                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-blue-800">Reviews Awaiting Moderation</h2>
                        <div class="text-sm text-blue-600">
                            {{ count($reviews) }} reviews pending
                        </div>
                    </div>
                </div>
                
                @if(count($reviews) > 0)
                    <div class="divide-y divide-gray-200">
                        @foreach($reviews as $review)
                            <div class="p-6">
                                <div class="md:flex">
                                    <div class="md:w-1/4 mb-4 md:mb-0">
                                        <div class="bg-blue-50 p-4 rounded-lg">
                                            <div class="mb-3">
                                                <h3 class="font-medium text-gray-900">Property</h3>
                                                <p class="text-sm text-gray-600">{{ $review->property_title }}</p>
                                            </div>
                                            <div class="mb-3">
                                                <h3 class="font-medium text-gray-900">Reviewer</h3>
                                                <p class="text-sm text-gray-600">{{ $review->traveler_name }}</p>
                                            </div>
                                            <div class="mb-3">
                                                <h3 class="font-medium text-gray-900">Date</h3>
                                                <p class="text-sm text-gray-600">{{ date('M d, Y', strtotime($review->created_at)) }}</p>
                                            </div>
                                            <div>
                                                <h3 class="font-medium text-gray-900">Rating</h3>
                                                <div class="flex items-center">
                                                    <div class="flex text-yellow-400">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= $review->rating)
                                                                <i class="fas fa-star"></i>
                                                            @else
                                                                <i class="far fa-star"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <span class="ml-2 text-sm text-gray-600">{{ $review->rating }}/5</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="md:w-3/4 md:pl-6">
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">Review Content</h3>
                                        <div class="bg-gray-50 p-4 rounded-lg mb-4">
                                            <p class="text-gray-700">{{ $review->comment }}</p>
                                        </div>
                                        
                                        <div class="flex flex-wrap gap-3">
                                            <form method="POST" action="{{ route('admin.reviews.approve', $review->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-2 px-4 rounded-md transition">
                                                    <i class="fas fa-check mr-1"></i> Approve Review
                                                </button>
                                            </form>
                                            
                                            <form method="POST" action="{{ route('reviews.destroy', $review->id) }}" onsubmit="return confirm('Are you sure you want to reject this review? This action cannot be undone.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium py-2 px-4 rounded-md transition">
                                                    <i class="fas fa-times mr-1"></i> Reject Review
                                                </button>
                                            </form>
                                            
                                            <a href="{{ route('properties.show', $review->property_id) }}" class="bg-blue-100 text-blue-700 hover:bg-blue-200 text-sm font-medium py-2 px-4 rounded-md transition">
                                                <i class="fas fa-eye mr-1"></i> View Property
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="py-16 text-center">
                        <div class="text-6xl text-blue-200 mb-4">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-700 mb-2">No pending reviews</h2>
                        <p class="text-gray-500 max-w-md mx-auto">
                            All reviews have been moderated. New reviews will appear here for your approval.
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
