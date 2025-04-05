@if ($errors->any())
<div class="alert-dismissible bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 mx-4 md:mx-0" role="alert">
    <div class="flex items-start">
        <div class="flex-shrink-0 mt-1">
            <i class="fas fa-exclamation-circle"></i>
        </div>
        <div class="ml-3">
            <h3 class="text-sm font-medium">Please fix the following errors:</h3>
            <ul class="mt-1 list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button type="button" class="close-btn ml-auto flex-shrink-0 -mr-1 -mt-1 text-red-500 hover:text-red-700 focus:outline-none">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>
@endif

@if (session('success'))
<div class="alert-dismissible bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 mx-4 md:mx-0" role="alert">
    <div class="flex">
        <div class="flex-shrink-0">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="ml-3">
            <p class="text-sm">{{ session('success') }}</p>
        </div>
        <button type="button" class="close-btn ml-auto flex-shrink-0 -mr-1 -mt-1 text-green-500 hover:text-green-700 focus:outline-none">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>
@endif

@if (session('error'))
<div class="alert-dismissible bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 mx-4 md:mx-0" role="alert">
    <div class="flex">
        <div class="flex-shrink-0">
            <i class="fas fa-exclamation-circle"></i>
        </div>
        <div class="ml-3">
            <p class="text-sm">{{ session('error') }}</p>
        </div>
        <button type="button" class="close-btn ml-auto flex-shrink-0 -mr-1 -mt-1 text-red-500 hover:text-red-700 focus:outline-none">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>
@endif

@if (session('info'))
<div class="alert-dismissible bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-4 mx-4 md:mx-0" role="alert">
    <div class="flex">
        <div class="flex-shrink-0">
            <i class="fas fa-info-circle"></i>
        </div>
        <div class="ml-3">
            <p class="text-sm">{{ session('info') }}</p>
        </div>
        <button type="button" class="close-btn ml-auto flex-shrink-0 -mr-1 -mt-1 text-blue-500 hover:text-blue-700 focus:outline-none">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>
@endif

@if (session('warning'))
<div class="alert-dismissible bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4 mx-4 md:mx-0" role="alert">
    <div class="flex">
        <div class="flex-shrink-0">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div class="ml-3">
            <p class="text-sm">{{ session('warning') }}</p>
        </div>
        <button type="button" class="close-btn ml-auto flex-shrink-0 -mr-1 -mt-1 text-yellow-500 hover:text-yellow-700 focus:outline-none">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>
@endif
