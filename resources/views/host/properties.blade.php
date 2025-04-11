@extends('layouts.app')

@section('title', 'My Properties - Stay & Travel')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="w-full md:w-1/4 mb-8 md:mb-0 md:pr-6">
            @include('partials.sidebar', ['sidebar_title' => 'Host Dashboard'])
        </div>
        
        <!-- Main Content -->
        <div class="w-full md:w-3/4">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-900">My Properties</h1>
                <a href="{{ route('properties.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md text-sm font-medium transition">
                    <i class="fas fa-plus mr-1"></i> Add New Property
                </a>
            </div>
            
            @if(count($properties) > 0)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    @foreach($properties as $property)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="flex">
                                <div class="w-1/3 bg-blue-100">
                                    @if($property->main_image)
                                        <img src="{{ asset('storage/properties/' . $property->main_image) }}" alt="{{ $property->title }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="h-full flex items-center justify-center">
                                            <i class="fas fa-home text-4xl text-blue-300"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="w-2/3 p-4">
                                    <div class="flex justify-between">
                                        <h2 class="text-lg font-semibold text-gray-900 truncate">{{ $property->title }}</h2>
                                        <div>
                                            @if($property->is_approved)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    <i class="fas fa-check-circle mr-1"></i> Approved
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    <i class="fas fa-clock mr-1"></i> Pending
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <p class="text-gray-600 text-sm mt-1">{{ $property->city }}</p>
                                    
                                    <div class="flex justify-between items-end mt-4">
                                        <div>
                                            <div class="text-gray-700 text-sm">
                                                <span>${{ number_format($property->price_per_night, 2) }} / night</span>
                                            </div>
                                            <div class="text-gray-500 text-xs mt-1">
                                                @if($property->is_available)
                                                    <span class="text-green-600"><i class="fas fa-circle text-xs mr-1"></i> Available</span>
                                                @else
                                                    <span class="text-red-600"><i class="fas fa-circle text-xs mr-1"></i> Not Available</span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="flex space-x-2">
                                            <a href="{{ route('properties.edit', $property->id) }}" class="text-blue-600 hover:text-blue-800" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('properties.show', $property->id) }}" class="text-green-600 hover:text-green-800" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <button 
                                                type="button" 
                                                onclick="confirmDelete({{ $property->id }})" 
                                                class="text-red-600 hover:text-red-800" 
                                                title="Delete"
                                            >
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white p-8 rounded-lg shadow-md text-center">
                    <div class="text-6xl text-blue-200 mb-4"><i class="fas fa-home"></i></div>
                    <h2 class="text-2xl font-bold text-gray-700 mb-2">No properties yet</h2>
                    <p class="text-gray-600 mb-6">Start listing your space and earn extra income.</p>
                    <a href="{{ route('properties.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md transition">
                        Add Your First Property
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full p-6">
        <h3 class="text-xl font-bold text-gray-900 mb-4">Confirm Deletion</h3>
        <p class="text-gray-700 mb-6">Are you sure you want to delete this property? This action cannot be undone and all associated reservations will be affected.</p>
        <div class="flex justify-end space-x-3">
            <button onclick="closeModal()" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-md transition">
                Cancel
            </button>
            <form id="deleteForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md transition">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    function confirmDelete(propertyId) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        
        form.action = `/properties/${propertyId}`;
        modal.classList.remove('hidden');
    }
    
    function closeModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.add('hidden');
    }
    
    // Close modal when clicking outside
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>
@endsection

@endsection
