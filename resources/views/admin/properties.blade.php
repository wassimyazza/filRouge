@extends('layouts.app')

@section('title', 'Pending Properties - Admin Dashboard - Stay & Travel')

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
                <h1 class="text-2xl font-bold text-gray-900">Pending Properties</h1>
                <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-arrow-left mr-1"></i> Back to Dashboard
                </a>
            </div>
            
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 bg-blue-50 border-b border-blue-100">
                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-blue-800">Properties Awaiting Approval</h2>
                        <div class="text-sm text-blue-600">
                            {{ count($properties) }} properties pending
                        </div>
                    </div>
                </div>
                
                @if(count($properties) > 0)
                    <div class="divide-y divide-gray-200">
                        @foreach($properties as $property)
                            <div class="p-6">
                                <div class="md:flex">
                                    <div class="md:w-1/4 mb-4 md:mb-0 md:pr-6">
                                        <div class="h-48 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-home text-5xl text-blue-300"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="md:w-3/4">
                                        <div class="flex justify-between items-start mb-2">
                                            <h3 class="text-lg font-semibold text-gray-900">{{ $property->title }}</h3>
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                                                Pending
                                            </span>
                                        </div>
                                        
                                        <p class="text-gray-600 mb-2">{{ $property->city }}, {{ $property->address }}</p>
                                        
                                        <div class="flex items-center mb-4">
                                            <i class="fas fa-user text-gray-400 mr-1"></i>
                                            <span class="text-sm text-gray-500">Host: {{ $property->host_name }}</span>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <h4 class="text-sm font-medium text-gray-700 mb-1">Property Details:</h4>
                                            <div class="flex flex-wrap gap-4 text-sm text-gray-600">
                                                <div>
                                                    <i class="fas fa-home text-blue-500 mr-1"></i> {{ ucfirst($property->type) }}
                                                </div>
                                                <div>
                                                    <i class="fas fa-user-friends text-blue-500 mr-1"></i> {{ $property->capacity }} guests
                                                </div>
                                                <div>
                                                    <i class="fas fa-bed text-blue-500 mr-1"></i> {{ $property->bedrooms }} bedrooms
                                                </div>
                                                <div>
                                                    <i class="fas fa-bath text-blue-500 mr-1"></i> {{ $property->bathrooms }} bathrooms
                                                </div>
                                                <div>
                                                    <i class="fas text-blue-500 mr-1">MAD</i> {{ number_format($property->price_per_night, 2) }} MAD/night
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <h4 class="text-sm font-medium text-gray-700 mb-1">Description:</h4>
                                            <p class="text-sm text-gray-600">{{ \Illuminate\Support\Str::limit($property->description, 200) }}</p>
                                        </div>
                                        
                                        <div class="flex space-x-3">
                                            <form method="POST" action="{{ route('admin.properties.approve', $property->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-2 px-4 rounded-md transition">
                                                    <i class="fas fa-check mr-1"></i> Approve Property
                                                </button>
                                            </form>
                                            
                                            <a href="{{ route('properties.show', $property->id) }}" class="bg-blue-100 text-blue-700 hover:bg-blue-200 text-sm font-medium py-2 px-4 rounded-md transition">
                                                <i class="fas fa-eye mr-1"></i> View Details
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
                        <h2 class="text-xl font-semibold text-gray-700 mb-2">No pending properties</h2>
                        <p class="text-gray-500 max-w-md mx-auto">
                            All property listings have been reviewed. New submissions will appear here for your approval.
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
