@extends('layouts.app')

@section('title', 'Transactions - Stay & Travel')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="w-full md:w-1/4 mb-8 md:mb-0 md:pr-6">
            @include('partials.sidebar', ['sidebar_title' => 'Financial'])
        </div>
        
        <!-- Main Content -->
        <div class="w-full md:w-3/4">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Transaction History</h1>
            
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if(count($transactions) > 0)
                    <div class="px-6 py-4 bg-blue-50 border-b border-blue-100">
                        <div class="flex justify-between items-center">
                            <h2 class="font-semibold text-blue-800">Your Transactions</h2>
                            
                            @if(Auth::user()->isHost())
                                <a href="{{ route('withdrawals.index') }}" class="inline-flex items-center px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-md transition">
                                    <i class="fas fa-wallet mr-2"></i> Manage Earnings
                                </a>
                            @endif
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Property
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Type
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Amount
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ date('M d, Y', strtotime($transaction->created_at)) }}</div>
                                            <div class="text-xs text-gray-500">{{ date('h:i A', strtotime($transaction->created_at)) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($transaction->reservation && $transaction->reservation->property)
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="{{ route('properties.show', $transaction->reservation->property->id) }}" class="hover:text-blue-600">
                                                        {{ $transaction->reservation->property->title }}
                                                    </a>
                                                </div>
                                                <div class="text-xs text-gray-500">{{ $transaction->reservation->property->city }}</div>
                                            @else
                                                <div class="text-sm text-gray-500">Not available</div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                @if(Auth::user()->isTraveler())
                                                    <span class="text-red-600">Payment</span>
                                                @elseif(Auth::user()->isHost())
                                                    <span class="text-green-600">Earning</span>
                                                @else
                                                    {{ ucfirst($transaction->payment_method) }}
                                                @endif
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                @if($transaction->reservation)
                                                    Reservation #{{ $transaction->reservation->id }}
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium 
                                                @if(Auth::user()->isTraveler()) text-red-600 
                                                @elseif(Auth::user()->isHost()) text-green-600 
                                                @else text-gray-900 
                                                @endif">
                                                ${{ number_format($transaction->amount, 2) }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($transaction->status == 'completed')
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Completed
                                                </span>
                                            @elseif($transaction->status == 'pending')
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Pending
                                                </span>
                                            @elseif($transaction->status == 'refunded')
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                    Refunded
                                                </span>
                                            @elseif($transaction->status == 'failed')
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Failed
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
                            <i class="fas fa-receipt"></i>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-700 mb-2">No transactions yet</h2>
                        <p class="text-gray-500 max-w-md mx-auto mb-6">
                            @if(Auth::user()->isTraveler())
                                When you book properties, your transactions will appear here.
                            @elseif(Auth::user()->isHost())
                                When travelers book your properties, your earnings will appear here.
                            @else
                                No transactions have been recorded yet.
                            @endif
                        </p>
                        
                        @if(Auth::user()->isTraveler())
                            <a href="{{ route('properties.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition">
                                <i class="fas fa-search mr-2"></i> Browse Properties
                            </a>
                        @elseif(Auth::user()->isHost())
                            <a href="{{ route('properties.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition">
                                <i class="fas fa-plus mr-2"></i> List a Property
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
