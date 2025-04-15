@extends('layouts.app')

@section('title', 'Request Withdrawal - Stay & Travel')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="w-full md:w-1/4 mb-8 md:mb-0 md:pr-6">
            @include('partials.sidebar', ['sidebar_title' => 'Host Earnings'])
        </div>
        
        <!-- Main Content -->
        <div class="w-full md:w-3/4">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Request Withdrawal</h1>
                <a href="{{ route('withdrawals.index') }}" class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-arrow-left mr-1"></i> Back to Earnings
                </a>
            </div>
            
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6 bg-blue-50 border-b border-blue-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="font-semibold text-blue-800">Your Available Balance</h2>
                            <p class="text-sm text-blue-600">Funds available for withdrawal</p>
                        </div>
                        <div class="text-2xl font-bold text-blue-600">${{ number_format($availableBalance, 2) }}</div>
                    </div>
                </div>
                
                <form method="POST" action="{{ route('withdrawals.store') }}" class="p-6">
                    @csrf
                    
                    <div class="mb-6">
                        <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">Withdrawal Amount *</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input type="number" name="amount" id="amount" min="100" max="{{ $availableBalance }}" step="0.01" required
                                value="{{ old('amount', $availableBalance >= 100 ? $availableBalance : 100) }}"
                                class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">USD</span>
                            </div>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Minimum withdrawal amount is $100.00</p>
                        @error('amount')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-6">
                        <label for="bank_info" class="block text-sm font-medium text-gray-700 mb-1">Bank Account Information *</label>
                        <textarea name="bank_info" id="bank_info" rows="4" required
                            class="focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">{{ old('bank_info') }}</textarea>
                        <p class="mt-1 text-xs text-gray-500">
                            Please enter your bank account details in the following format:<br>
                            Bank Name: [Your Bank]<br>
                            Account Holder: [Your Name]<br>
                            Account Number: [Your Account Number]<br>
                            Routing Number: [Your Routing Number]
                        </p>
                        @error('bank_info')
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
                                    Withdrawal requests are processed within 3-5 business days. A fee of $1.00 will be applied to all withdrawals.
                                    Once submitted, withdrawal requests cannot be cancelled.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-end">
                        <a href="{{ route('withdrawals.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-md mr-2 transition">
                            Cancel
                        </a>
                        <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition"
                            {{ $availableBalance < 100 ? 'disabled' : '' }}>
                            Submit Withdrawal Request
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
