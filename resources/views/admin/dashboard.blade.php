@extends('layouts.app')

@section('title', 'Admin Dashboard - Stay & Travel')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="w-full md:w-1/4 mb-8 md:mb-0 md:pr-6">
            @include('partials.sidebar', ['sidebar_title' => 'Admin Dashboard'])
        </div>
        
        <!-- Main Content -->
        <div class="w-full md:w-3/4">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Admin Dashboard</h1>
            
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Total Users -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Users</p>
                            <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['total_users'] }}</h3>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-md">
                            <i class="fas fa-users text-blue-600"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('admin.users') }}" class="text-sm text-blue-600 hover:text-blue-800">
                            View details <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Total Properties -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Properties</p>
                            <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['total_properties'] }}</h3>
                        </div>
                        <div class="bg-green-100 p-3 rounded-md">
                            <i class="fas fa-home text-green-600"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('admin.properties.pending') }}" class="text-sm text-blue-600 hover:text-blue-800">
                            {{ $stats['pending_properties'] }} pending <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Total Reservations -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Reservations</p>
                            <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['total_reservations'] }}</h3>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-md">
                            <i class="fas fa-calendar-check text-yellow-600"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-sm text-gray-500">
                            Active bookings system
                        </span>
                    </div>
                </div>
                
                <!-- Total Revenue -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Revenue</p>
                            <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ number_format($stats['total_revenue'], 2) }} MAD</h3>
                        </div>
                        <div class="bg-indigo-100 p-3 rounded-md">
                            <i class="fas text-indigo-600">DH</i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-sm text-gray-500">
                            Platform revenue
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- Quick Access Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Pending Properties -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-4 bg-red-50 border-b border-red-100">
                        <div class="flex justify-between items-center">
                            <h2 class="font-semibold text-red-800">Pending Properties</h2>
                            <span class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                                {{ $stats['pending_properties'] }}
                            </span>
                        </div>
                    </div>
                    <div class="p-4">
                        <p class="text-sm text-gray-600 mb-4">
                            Properties requiring approval before becoming visible to travelers.
                        </p>
                        <a href="{{ route('admin.properties.pending') }}" class="inline-flex items-center text-red-600 hover:text-red-800 text-sm font-medium">
                            Review pending properties <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Pending Reviews -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-4 bg-yellow-50 border-b border-yellow-100">
                        <div class="flex justify-between items-center">
                            <h2 class="font-semibold text-yellow-800">Pending Reviews</h2>
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                                {{ $stats['pending_reviews'] }}
                            </span>
                        </div>
                    </div>
                    <div class="p-4">
                        <p class="text-sm text-gray-600 mb-4">
                            Reviews submitted by travelers that need moderation.
                        </p>
                        <a href="{{ route('admin.reviews.pending') }}" class="inline-flex items-center text-yellow-600 hover:text-yellow-800 text-sm font-medium">
                            Moderate reviews <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Pending Withdrawals -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-4 bg-blue-50 border-b border-blue-100">
                        <div class="flex justify-between items-center">
                            <h2 class="font-semibold text-blue-800">Pending Withdrawals</h2>
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                                {{ $stats['pending_withdrawals'] }}
                            </span>
                        </div>
                    </div>
                    <div class="p-4">
                        <p class="text-sm text-gray-600 mb-4">
                            Withdrawal requests from hosts awaiting processing.
                        </p>
                        <a href="{{ route('admin.withdrawals') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm font-medium">
                            Process withdrawals <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- User Stats -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
                <div class="p-4 bg-blue-600 text-white">
                    <h2 class="font-semibold">User Statistics</h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="text-4xl font-bold text-blue-600">{{ $stats['total_travelers'] }}</div>
                            <div class="text-sm text-gray-500 mt-1">Travelers</div>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold text-green-600">{{ $stats['total_hosts'] }}</div>
                            <div class="text-sm text-gray-500 mt-1">Hosts</div>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold text-yellow-600">{{ $stats['total_transactions'] }}</div>
                            <div class="text-sm text-gray-500 mt-1">Transactions</div>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex justify-center">
                        <a href="{{ route('admin.users') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition">
                            <i class="fas fa-users mr-2"></i> Manage Users
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
