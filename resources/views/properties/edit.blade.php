@extends('layouts.app')

@section('title', 'Edit Property - Stay & Travel')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Edit Property</h1>
            <a href="{{ route('host.properties') }}" class="text-blue-600 hover:text-blue-800">
                <i class="fas fa-arrow-left mr-1"></i> Back to My Properties
            </a>
        </div>
        
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6 bg-blue-600 text-white">
                <h2 class="text-xl font-semibold">Property Details</h2>
                <p class="mt-1 text-sm text-blue-100">Update the details of your property. Fields marked with * are required.</p>
            </div>
            
            <form method="POST" action="{{ route('properties.update', $property->id) }}" enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Property Title *</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $property->title) }}" required maxlength="255"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Property Type *</label>
                        <select name="type" id="type" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Select property type</option>
                            @foreach($property_types as $type)
                                <option value="{{ $type }}" {{ old('type', $property->type) == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                            @endforeach
                        </select>
                        @error('type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description *</label>
                    <textarea name="description" id="description" rows="5" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('description', $property->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-sm text-gray-500">Describe your property, amenities, and nearby attractions.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City *</label>
                        <input type="text" name="city" id="city" value="{{ old('city', $property->city) }}" required maxlength="100"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('city')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address *</label>
                        <input type="text" name="address" id="address" value="{{ old('address', $property->address) }}" required maxlength="255"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div>
                        <label for="price_per_night" class="block text-sm font-medium text-gray-700 mb-1">Price per Night (MAD) *</label>
                        <input type="number" name="price_per_night" id="price_per_night" value="{{ old('price_per_night', $property->price_per_night) }}" required min="0" step="0.01"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('price_per_night')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="capacity" class="block text-sm font-medium text-gray-700 mb-1">Guest Capacity *</label>
                        <input type="number" name="capacity" id="capacity" value="{{ old('capacity', $property->capacity) }}" required min="1"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('capacity')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="is_available" class="block text-sm font-medium text-gray-700 mb-1">Availability</label>
                        <div class="flex items-center mt-2">
                            <input type="checkbox" name="is_available" id="is_available" value="1" {{ old('is_available', $property->is_available) ? 'checked' : '' }}
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="is_available" class="ml-2 block text-sm text-gray-700">
                                Available for booking
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label for="bedrooms" class="block text-sm font-medium text-gray-700 mb-1">Bedrooms *</label>
                        <input type="number" name="bedrooms" id="bedrooms" value="{{ old('bedrooms', $property->bedrooms) }}" required min="0"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('bedrooms')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="bathrooms" class="block text-sm font-medium text-gray-700 mb-1">Bathrooms *</label>
                        <input type="number" name="bathrooms" id="bathrooms" value="{{ old('bathrooms', $property->bathrooms) }}" required min="0"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('bathrooms')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Images</label>
                    
                    @if(count($property->images) > 0)
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                            @foreach($property->images as $image)
                                <div class="relative">
                                    <img src="{{ asset('storage/properties/' . $image->image_path) }}" alt="Property image" class="h-32 w-full object-cover rounded">
                                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-xs p-1 text-center">
                                        {{ $image->is_main ? 'Main Image' : 'Image ' . ($loop->index + 1) }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 mb-4">No images uploaded yet.</p>
                    @endif
                </div>
                
                <div class="mb-8">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Add New Images</label>
                    <div class="flex items-center justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-3"></i>
                            <div class="flex text-sm text-gray-600">
                                <label for="new_images" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                    <span>Upload new images</span>
                                    <input id="new_images" name="new_images[]" type="file" class="sr-only" multiple accept="image/jpeg,image/png,image/jpg">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">
                                PNG, JPG, JPEG up to 2MB
                            </p>
                        </div>
                    </div>
                    @error('new_images')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    @error('new_images.*')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    
                    <div id="image-preview" class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4"></div>
                </div>
                
                @if(!$property->is_approved)
                    <div class="p-4 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 mb-8">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm">
                                    Your property listing is still pending approval by our team.
                                    This process usually takes 24-48 hours.
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
                
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('host.properties') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-md">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition">
                        Update Property
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Image preview functionality
    document.getElementById('new_images').addEventListener('change', function(event) {
        const preview = document.getElementById('image-preview');
        preview.innerHTML = '';
        
        const files = event.target.files;
        
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            
            if (!file.type.match('image.*')) {
                continue;
            }
            
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.className = 'relative';
                
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'h-32 w-full object-cover rounded';
                
                const label = document.createElement('div');
                label.className = 'absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-xs p-1 text-center';
                label.textContent = `New Image ${i + 1}`;
                
                div.appendChild(img);
                div.appendChild(label);
                preview.appendChild(div);
            };
            
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection

@endsection
