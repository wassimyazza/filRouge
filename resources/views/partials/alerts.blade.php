@if ($errors->any())
<div class="alert-dismissible bg-white border-l-4 border-moroccan-red rounded-lg shadow-md p-4 mb-6 mx-4 md:mx-0" role="alert">
    <div class="flex items-start">
        <div class="flex-shrink-0 pt-0.5">
            <i class="fas fa-exclamation-circle text-moroccan-red text-lg"></i>
        </div>
        <div class="ml-3 flex-1">
            <h3 class="text-sm font-medium text-gray-900">Please fix the following errors:</h3>
            <ul class="mt-2 list-disc list-inside text-sm text-gray-600 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button type="button" class="close-btn ml-auto flex-shrink-0 -mr-1 -mt-1 text-gray-400 hover:text-gray-500 focus:outline-none">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>
@endif

@if (session('success'))
<div class="alert-dismissible bg-white border-l-4 border-green-500 rounded-lg shadow-md p-4 mb-6 mx-4 md:mx-0" role="alert">
    <div class="flex items-center">
        <div class="flex-shrink-0">
            <i class="fas fa-check-circle text-green-500 text-lg"></i>
        </div>
        <div class="ml-3 flex-1">
            <p class="text-sm font-medium text-gray-700">{{ session('success') }}</p>
        </div>
        <button type="button" class="close-btn ml-auto flex-shrink-0 -mr-1 -mt-1 text-gray-400 hover:text-gray-500 focus:outline-none">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>
@endif

@if (session('error'))
<div class="alert-dismissible bg-white border-l-4 border-moroccan-red rounded-lg shadow-md p-4 mb-6 mx-4 md:mx-0" role="alert">
    <div class="flex items-center">
        <div class="flex-shrink-0">
            <i class="fas fa-exclamation-circle text-moroccan-red text-lg"></i>
        </div>
        <div class="ml-3 flex-1">
            <p class="text-sm font-medium text-gray-700">{{ session('error') }}</p>
        </div>
        <button type="button" class="close-btn ml-auto flex-shrink-0 -mr-1 -mt-1 text-gray-400 hover:text-gray-500 focus:outline-none">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>
@endif

@if (session('info'))
<div class="alert-dismissible bg-white border-l-4 border-moroccan-blue rounded-lg shadow-md p-4 mb-6 mx-4 md:mx-0" role="alert">
    <div class="flex items-center">
        <div class="flex-shrink-0">
            <i class="fas fa-info-circle text-moroccan-blue text-lg"></i>
        </div>
        <div class="ml-3 flex-1">
            <p class="text-sm font-medium text-gray-700">{{ session('info') }}</p>
        </div>
        <button type="button" class="close-btn ml-auto flex-shrink-0 -mr-1 -mt-1 text-gray-400 hover:text-gray-500 focus:outline-none">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>
@endif

@if (session('warning'))
<div class="alert-dismissible bg-white border-l-4 border-moroccan-orange rounded-lg shadow-md p-4 mb-6 mx-4 md:mx-0" role="alert">
    <div class="flex items-center">
        <div class="flex-shrink-0">
            <i class="fas fa-exclamation-triangle text-moroccan-orange text-lg"></i>
        </div>
        <div class="ml-3 flex-1">
            <p class="text-sm font-medium text-gray-700">{{ session('warning') }}</p>
        </div>
        <button type="button" class="close-btn ml-auto flex-shrink-0 -mr-1 -mt-1 text-gray-400 hover:text-gray-500 focus:outline-none">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>
@endif