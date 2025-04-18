@extends('layouts.app')

@section('title', 'Earnings & Withdrawals - Stay & Travel')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="w-full md:w-1/4 mb-8 md:mb-0 md:pr-6">
            @include('partials.sidebar', ['sidebar_title' => 'Host Earnings'])
        </div>
        
        <!-- Main Content -->
        <div class="w-full md:w-3/4">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">My Earnings</h1>
            
            <!-- Balance Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                <div class="p-6 bg-gradient-to-r from-blue-500 to-blue-700 text-white">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-lg font-semibold">Available Balance</h2>
                            <p class="text-sm text-blue-100">Available for withdrawal</p>
                        </div>
                        <div class="text-3xl font-bold">{{ number_format($availableBalance, 2) }} MAD</div>
                    </div>
                    
                    <div class="mt-6">
                        <a href="{{ route('withdrawals.create') }}" 
                            class="inline-flex items-center px-4 py-2 bg-white text-blue-700 rounded-md hover:bg-blue-50 transition {{ $availableBalance < 100 ? 'opacity-50 cursor-not-allowed' : '' }}">
                            <i class="fas fa-money-bill-wave mr-2"></i> Request Withdrawal
                        </a>
                        @if($availableBalance < 100)
                            <p class="text-sm text-blue-100 mt-2">
                                <i class="fas fa-info-circle mr-1"></i> Minimum withdrawal amount is 1000.00 MAD
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Withdrawals History -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 bg-blue-50 border-b border-blue-100">
                    <h2 class="font-semibold text-blue-800">Withdrawal History</h2>
                </div>
                
                @if(count($withdrawals) > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Amount
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Bank Info
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($withdrawals as $withdrawal)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ date('M d, Y', strtotime($withdrawal->created_at)) }}</div>
                                            <div class="text-xs text-gray-500">{{ date('h:i A', strtotime($withdrawal->created_at)) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ number_format($withdrawal->amount, 2) }} MAD</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900 max-w-xs truncate">{{ $withdrawal->bank_info }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($withdrawal->status == 'pending')
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Pending
                                                </span>
                                            @elseif($withdrawal->status == 'approved')
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Approved
                                                </span>
                                            @elseif($withdrawal->status == 'rejected')
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Rejected
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="py-16 text-center">
                        <div class="text-6xl text-blue-200 mb-4">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-700 mb-2">No withdrawals yet</h2>
                        <p class="text-gray-500 max-w-md mx-auto mb-6">
                            When you have bookings and earn money from your properties, you can request withdrawals here.
                        </p>
                        <a href="{{ route('host.properties') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition">
                            <i class="fas fa-home mr-2"></i> Manage Properties
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
