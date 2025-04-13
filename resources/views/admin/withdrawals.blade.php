@extends('layouts.app')

@section('title', 'Withdrawal Requests - Admin Dashboard - Stay & Travel')

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
                <h1 class="text-2xl font-bold text-gray-900">Withdrawal Requests</h1>
                <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-arrow-left mr-1"></i> Back to Dashboard
                </a>
            </div>
            
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 bg-blue-50 border-b border-blue-100">
                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-blue-800">Host Withdrawal Requests</h2>
                        <div>
                            <button id="all-tab" class="px-3 py-1 text-sm bg-blue-600 text-white rounded-md">All</button>
                            <button id="pending-tab" class="px-3 py-1 text-sm bg-gray-200 text-gray-700 rounded-md ml-2">Pending</button>
                        </div>
                    </div>
                </div>
                
                @if(count($withdrawals) > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Host
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date Requested
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
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($withdrawals as $withdrawal)
                                    <tr class="withdrawal-row" data-status="{{ $withdrawal->status }}">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $withdrawal->host_name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ date('M d, Y', strtotime($withdrawal->created_at)) }}</div>
                                            <div class="text-xs text-gray-500">{{ date('h:i A', strtotime($withdrawal->created_at)) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">${{ number_format($withdrawal->amount, 2) }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <button type="button" class="text-sm text-blue-600 hover:text-blue-900 view-bank-info" data-bank-info="{{ $withdrawal->bank_info }}">
                                                View Details
                                            </button>
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
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            @if($withdrawal->status == 'pending')
                                                <div class="flex space-x-2">
                                                    <form method="POST" action="{{ route('admin.withdrawals.approve', $withdrawal->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="text-green-600 hover:text-green-900">
                                                            Approve
                                                        </button>
                                                    </form>
                                                    
                                                    <form method="POST" action="{{ route('admin.withdrawals.reject', $withdrawal->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                                            Reject
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                <span class="text-gray-400">No actions</span>
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
                        <h2 class="text-xl font-semibold text-gray-700 mb-2">No withdrawal requests</h2>
                        <p class="text-gray-500 max-w-md mx-auto">
                            There are currently no withdrawal requests from hosts.
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Bank Info Modal -->
<div id="bankInfoModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full p-6">
        <div class="flex justify-between items-start mb-4">
            <h3 class="text-xl font-bold text-gray-900">Bank Information</h3>
            <button type="button" onclick="closeBankInfoModal()" class="text-gray-400 hover:text-gray-500">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="bg-gray-50 p-4 rounded-md">
            <pre id="bankInfoContent" class="whitespace-pre-wrap text-sm text-gray-700"></pre>
        </div>
        <div class="mt-6 flex justify-end">
            <button type="button" onclick="closeBankInfoModal()" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Close
            </button>
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Bank info modal functionality
    const viewBankInfoButtons = document.querySelectorAll('.view-bank-info');
    const bankInfoModal = document.getElementById('bankInfoModal');
    const bankInfoContent = document.getElementById('bankInfoContent');
    
    viewBankInfoButtons.forEach(button => {
        button.addEventListener('click', function() {
            const bankInfo = this.getAttribute('data-bank-info');
            bankInfoContent.textContent = bankInfo;
            bankInfoModal.classList.remove('hidden');
        });
    });
    
    function closeBankInfoModal() {
        bankInfoModal.classList.add('hidden');
    }
    
    // Close modal when clicking outside
    bankInfoModal.addEventListener('click', function(e) {
        if (e.target === this) {
            closeBankInfoModal();
        }
    });
    
    // Tab functionality
    const allTab = document.getElementById('all-tab');
    const pendingTab = document.getElementById('pending-tab');
    const withdrawalRows = document.querySelectorAll('.withdrawal-row');
    
    allTab.addEventListener('click', function() {
        allTab.classList.remove('bg-gray-200', 'text-gray-700');
        allTab.classList.add('bg-blue-600', 'text-white');
        pendingTab.classList.remove('bg-blue-600', 'text-white');
        pendingTab.classList.add('bg-gray-200', 'text-gray-700');
        
        withdrawalRows.forEach(row => {
            row.classList.remove('hidden');
        });
    });
    
    pendingTab.addEventListener('click', function() {
        pendingTab.classList.remove('bg-gray-200', 'text-gray-700');
        pendingTab.classList.add('bg-blue-600', 'text-white');
        allTab.classList.remove('bg-blue-600', 'text-white');
        allTab.classList.add('bg-gray-200', 'text-gray-700');
        
        withdrawalRows.forEach(row => {
            if (row.dataset.status === 'pending') {
                row.classList.remove('hidden');
            } else {
                row.classList.add('hidden');
            }
        });
    });
</script>
@endsection

@endsection
