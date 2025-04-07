<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Listings - StayEase</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="min-h-screen bg-gray-50">
  <div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="hidden md:flex md:flex-shrink-0">
      <div class="flex flex-col w-64 bg-gray-800">
        <div class="flex items-center justify-center h-16 px-4 bg-gray-900">
          <span class="text-xl font-bold text-white">StayEase</span>
        </div>
        <div class="flex flex-col flex-1 overflow-y-auto">
          <nav class="flex-1 px-2 py-4 space-y-1">
            <a href="owner-dashboard.html" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <i class="fas fa-tachometer-alt mr-3 text-gray-400"></i>
              Dashboard
            </a>
            <a href="owner-listings.html" class="flex items-center px-2 py-2 text-sm font-medium text-white bg-gray-700 rounded-md group">
              <i class="fas fa-building mr-3 text-gray-300"></i>
              My Listings
            </a>
            <a href="owner-add-listing.html" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <i class="fas fa-plus-circle mr-3 text-gray-400"></i>
              Add New Listing
            </a>
            <a href="owner-reservations.html" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <i class="fas fa-calendar-alt mr-3 text-gray-400"></i>
              Reservations
            </a>
            <a href="owner-reviews.html" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <i class="fas fa-star mr-3 text-gray-400"></i>
              Reviews
            </a>
            <a href="owner-earnings.html" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <i class="fas fa-money-bill-wave mr-3 text-gray-400"></i>
              Earnings
            </a>
            <a href="owner-analytics.html" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <i class="fas fa-chart-line mr-3 text-gray-400"></i>
              Analytics
            </a>
            <a href="owner-messages.html" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <i class="fas fa-envelope mr-3 text-gray-400"></i>
              Messages
              <span class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">3</span>
            </a>
            <a href="owner-profile.html" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <i class="fas fa-user mr-3 text-gray-400"></i>
              Profile
            </a>
            <a href="owner-settings.html" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <i class="fas fa-cog mr-3 text-gray-400"></i>
              Settings
            </a>
          </nav>
        </div>
        <div class="flex items-center justify-between p-4 border-t border-gray-700">
          <div class="flex items-center">
            <img class="w-8 h-8 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="User avatar">
            <div class="ml-3">
              <p class="text-sm font-medium text-white">Ahmed Malik</p>
              <p class="text-xs font-medium text-gray-400">Hotel Owner</p>
            </div>
          </div>
          <a href="index.html" class="text-gray-400 hover:text-white">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </div>
      </div>
    </aside>

    <!-- Mobile sidebar -->
    <div class="md:hidden fixed inset-0 z-40 flex bg-black bg-opacity-50" id="mobile-sidebar-container" style="display: none;">
      <div class="relative flex-1 flex flex-col max-w-xs w-full bg-gray-800">
        <div class="absolute top-0 right-0 -mr-12 pt-2">
          <button id="close-sidebar-button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
            <span class="sr-only">Close sidebar</span>
            <i class="fas fa-times text-white"></i>
          </button>
        </div>
        <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
          <div class="flex-shrink-0 flex items-center px-4">
            <span class="text-xl font-bold text-white">StayEase</span>
          </div>
          <nav class="mt-5 px-2 space-y-1">
            <a href="owner-dashboard.html" class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
              <i class="fas fa-tachometer-alt mr-3 text-gray-400"></i>
              Dashboard
            </a>
            <a href="owner-listings.html" class="flex items-center px-2 py-2 text-base font-medium text-white bg-gray-700 rounded-md">
              <i class="fas fa-building mr-3 text-gray-300"></i>
              My Listings
            </a>
            <a href="owner-add-listing.html" class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
              <i class="fas fa-plus-circle mr-3 text-gray-400"></i>
              Add New Listing
            </a>
            <a href="owner-reservations.html" class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
              <i class="fas fa-calendar-alt mr-3 text-gray-400"></i>
              Reservations
            </a>
            <a href="owner-reviews.html" class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
              <i class="fas fa-star mr-3 text-gray-400"></i>
              Reviews
            </a>
            <a href="owner-earnings.html" class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
              <i class="fas fa-money-bill-wave mr-3 text-gray-400"></i>
              Earnings
            </a>
            <a href="owner-analytics.html" class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
              <i class="fas fa-chart-line mr-3 text-gray-400"></i>
              Analytics
            </a>
            <a href="owner-messages.html" class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
              <i class="fas fa-envelope mr-3 text-gray-400"></i>
              Messages
              <span class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">3</span>
            </a>
            <a href="owner-profile.html" class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
              <i class="fas fa-user mr-3 text-gray-400"></i>
              Profile
            </a>
            <a href="owner-settings.html" class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
              <i class="fas fa-cog mr-3 text-gray-400"></i>
              Settings
            </a>
          </nav>
        </div>
        <div class="flex-shrink-0 flex border-t border-gray-700 p-4">
          <div class="flex items-center">
            <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="User avatar">
            <div class="ml-3">
              <p class="text-base font-medium text-white">Ahmed Malik</p>
              <p class="text-sm font-medium text-gray-400">Hotel Owner</p>
            </div>
          </div>
        </div>
      </div>
      <div class="flex-shrink-0 w-14"></div>
    </div>

    <!-- Main content -->
    <div class="flex flex-col flex-1 overflow-hidden">
      <!-- Top header -->
      <header class="bg-white shadow-sm">
        <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
          <div class="flex items-center">
            <button id="open-sidebar-button" class="md:hidden -ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-teal-500">
              <span class="sr-only">Open sidebar</span>
              <i class="fas fa-bars text-xl"></i>
            </button>
            <h1 class="text-xl font-semibold text-gray-900 ml-2 md:ml-0">My Listings</h1>
          </div>
          <div class="flex items-center">
            <a href="owner-add-listing.html" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
              <i class="fas fa-plus mr-2"></i>
              Add New Property
            </a>
          </div>
        </div>
      </header>

      <!-- Main content area -->
      <main class="flex-1 overflow-y-auto bg-gray-50 p-4 sm:p-6 lg:p-8">
        <!-- Filters and search -->
        <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
          <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
            <div class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-4">
              <div class="relative">
                <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                  <option value="">All Property Types</option>
                  <option value="hotel">Hotel</option>
                  <option value="riad">Riad</option>
                  <option value="resort">Resort</option>
                  <option value="apartment">Apartment</option>
                  <option value="villa">Villa</option>
                </select>
              </div>
              <div class="relative">
                <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                  <option value="">All Locations</option>
                  <option value="marrakech">Marrakech</option>
                  <option value="casablanca">Casablanca</option>
                  <option value="fes">Fes</option>
                  <option value="rabat">Rabat</option>
                  <option value="tangier">Tangier</option>
                </select>
              </div>
              <div class="relative">
                <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                  <option value="">All Status</option>
                  <option value="active">Active</option>
                  <option value="inactive">Inactive</option>
                  <option value="pending">Pending Review</option>
                </select>
              </div>
            </div>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
              </div>
              <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-teal-500 focus:border-teal-500 sm:text-sm" placeholder="Search properties...">
            </div>
          </div>
        </div>

        <!-- Properties grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- Property 1 -->
          <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="relative h-48">
              <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80" alt="Luxury Palace Hotel" class="w-full h-full object-cover">
              <div class="absolute top-2 right-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                  Active
                </span>
              </div>
            </div>
            <div class="p-4">
              <div class="flex justify-between items-start">
                <div>
                  <h3 class="text-lg font-semibold text-gray-900">Luxury Palace Hotel</h3>
                  <p class="text-sm text-gray-600">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    Medina, Marrakech
                  </p>
                </div>
                <div class="flex items-center">
                  <div class="text-yellow-400 mr-1">
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="text-sm font-medium text-gray-900">4.8</span>
                </div>
              </div>
              <div class="mt-4 flex items-center justify-between">
                <div>
                  <p class="text-sm text-gray-600">Property Type</p>
                  <p class="text-sm font-medium text-gray-900">Hotel</p>
                </div>
                <div>
                  <p class="text-sm text-gray-600">Rooms</p>
                  <p class="text-sm font-medium text-gray-900">24</p>
                </div>
                <div>
                  <p class="text-sm text-gray-600">Price</p>
                  <p class="text-sm font-medium text-gray-900">$120/night</p>
                </div>
              </div>
              <div class="mt-4 flex items-center justify-between">
                <div>
                  <p class="text-sm text-gray-600">Bookings (30 days)</p>
                  <p class="text-sm font-medium text-gray-900">42</p>
                </div>
                <div>
                  <p class="text-sm text-gray-600">Revenue (30 days)</p>
                  <p class="text-sm font-medium text-gray-900">$12,480</p>
                </div>
              </div>
              <div class="mt-4 flex space-x-2">
                <a href="owner-edit-listing.html?id=1" class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                  <i class="fas fa-edit mr-1"></i> Edit
                </a>
                <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                  <i class="fas fa-eye mr-1"></i> Preview
                </button>
                <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                  <i class="fas fa-chart-bar mr-1"></i> Stats
                </button>
                <div class="relative ml-auto">
                  <button id="dropdown-button-1" class="inline-flex items-center px-2 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                    <i class="fas fa-ellipsis-h"></i>
                  </button>
                  <div id="dropdown-menu-1" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-10">
                    <div class="py-1">
                      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Duplicate</a>
                      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Set as Featured</a>
                      <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Deactivate</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Property 2 -->
          <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="relative h-48">
              <img src="https://images.unsplash.com/photo-1582719508461-905c673771fd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Riad Elegance" class="w-full h-full object-cover">
              <div class="absolute top-2 right-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                  Active
                </span>
              </div>
            </div>
            <div class="p-4">
              <div class="flex justify-between items-start">
                <div>
                  <h3 class="text-lg font-semibold text-gray-900">Riad Elegance</h3>
                  <p class="text-sm text-gray-600">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    Gueliz, Marrakech
                  </p>
                </div>
                <div class="flex items-center">
                  <div class="text-yellow-400 mr-1">
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="text-sm font-medium text-gray-900">4.6</span>
                </div>
              </div>
              <div class="mt-4 flex items-center justify-between">
                <div>
                  <p class="text-sm text-gray-600">Property Type</p>
                  <p class="text-sm font-medium text-gray-900">Riad</p>
                </div>
                <div>
                  <p class="text-sm text-gray-600">Rooms</p>
                  <p class="text-sm font-medium text-gray-900">8</p>
                </div>
                <div>
                  <p class="text-sm text-gray-600">Price</p>
                  <p class="text-sm font-medium text-gray-900">$95/night</p>
                </div>
              </div>
              <div class="mt-4 flex items-center justify-between">
                <div>
                  <p class="text-sm text-gray-600">Bookings (30 days)</p>
                  <p class="text-sm font-medium text-gray-900">18</p>
                </div>
                <div>
                  <p class="text-sm text-gray-600">Revenue (30 days)</p>
                  <p class="text-sm font-medium text-gray-900">$4,275</p>
                </div>
              </div>
              <div class="mt-4 flex space-x-2">
                <a href="owner-edit-listing.html?id=2" class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                  <i class="fas fa-edit mr-1"></i> Edit
                </a>
                <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                  <i class="fas fa-eye mr-1"></i> Preview
                </button>
                <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                  <i class="fas fa-chart-bar mr-1"></i> Stats
                </button>
                <div class="relative ml-auto">
                  <button id="dropdown-button-2" class="inline-flex items-center px-2 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                    <i class="fas fa-ellipsis-h"></i>
                  </button>
                  <div id="dropdown-menu-2" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-10">
                    <div class="py-1">
                      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Duplicate</a>
                      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Set as Featured</a>
                      <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Deactivate</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Property 3 -->
          <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="relative h-48">
              <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Mountain View Resort" class="w-full h-full object-cover">
              <div class="absolute top-2 right-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                  Active
                </span>
              </div>
            </div>
            <div class="p-4">
              <div class="flex justify-between items-start">
                <div>
                  <h3 class="text-lg font-semibold text-gray-900">Mountain View Resort</h3>
                  <p class="text-sm text-gray-600">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    Palmeraie, Marrakech
                  </p>
                </div>
                <div class="flex items-center">
                  <div class="text-yellow-400 mr-1">
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="text-sm font-medium text-gray-900">4.9</span>
                </div>
              </div>
              <div class="mt-4 flex items-center justify-between">
                <div>
                  <p class="text-sm text-gray-600">Property Type</p>
                  <p class="text-sm font-medium text-gray-900">Resort</p>
                </div>
                <div>
                  <p class="text-sm text-gray-600">Rooms</p>
                  <p class="text-sm font-medium text-gray-900">32</p>
                </div>
                <div>
                  <p class="text-sm text-gray-600">Price</p>
                  <p class="text-sm font-medium text-gray-900">$150/night</p>
                </div>
              </div>
              <div class="mt-4 flex items-center justify-between">
                <div>
                  <p class="text-sm text-gray-600">Bookings (30 days)</p>
                  <p class="text-sm font-medium text-gray-900">56</p>
                </div>
                <div>
                  <p class="text-sm text-gray-600">Revenue (30 days)</p>
                  <p class="text-sm font-medium text-gray-900">$21,000</p>
                </div>
              </div>
              <div class="mt-4 flex space-x-2">
                <a href="owner-edit-listing.html?id=3" class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                  <i class="fas fa-edit mr-1"></i> Edit
                </a>
                <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                  <i class="fas fa-eye mr-1"></i> Preview
                </button>
                <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                  <i class="fas fa-chart-bar mr-1"></i> Stats
                </button>
                <div class="relative ml-auto">
                  <button id="dropdown-button-3" class="inline-flex items-center px-2 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                    <i class="fas fa-ellipsis-h"></i>
                  </button>
                  <div id="dropdown-menu-3" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-10">
                    <div class="py-1">
                      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Duplicate</a>
                      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Set as Featured</a>
                      <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Deactivate</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Property 4 -->
          <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="relative h-48">
              <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Kasbah Retreat" class="w-full h-full object-cover">
              <div class="absolute top-2 right-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                  Pending Review
                </span>
              </div>
            </div>
            <div class="p-4">
              <div class="flex justify-between items-start">
                <div>
                  <h3 class="text-lg font-semibold text-gray-900">Kasbah Retreat</h3>
                  <p class="text-sm text-gray-600">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    Hivernage, Marrakech
                  </p>
                </div>
                <div class="flex items-center">
                  <div class="text-yellow-400 mr-1">
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="text-sm font-medium text-gray-900">4.3</span>
                </div>
              </div>
              <div class="mt-4 flex items-center justify-between">
                <div>
                  <p class="text-sm text-gray-600">Property Type</p>
                  <p class="text-sm font-medium text-gray-900">Hotel</p>
                </div>
                <div>
                  <p class="text-sm text-gray-600">Rooms</p>
                  <p class="text-sm font-medium text-gray-900">16</p>
                </div>
                <div>
                  <p class="text-sm text-gray-600">Price</p>
                  <p class="text-sm font-medium text-gray-900">$85/night</p>
                </div>
              </div>
              <div class="mt-4 flex items-center justify-between">
                <div>
                  <p class="text-sm text-gray-600">Bookings (30 days)</p>
                  <p class="text-sm font-medium text-gray-900">0</p>
                </div>
                <div>
                  <p class="text-sm text-gray-600">Revenue (30 days)</p>
                  <p class="text-sm font-medium text-gray-900">$0</p>
                </div>
              </div>
              <div class="mt-4 flex space-x-2">
                <a href="owner-edit-listing.html?id=4" class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                  <i class="fas fa-edit mr-1"></i> Edit
                </a>
                <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                  <i class="fas fa-eye mr-1"></i> Preview
                </button>
                <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                  <i class="fas fa-chart-bar mr-1"></i> Stats
                </button>
                <div class="relative ml-auto">
                  <button id="dropdown-button-4" class="inline-flex items-center px-2 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                    <i class="fas fa-ellipsis-h"></i>
                  </button>
                  <div id="dropdown-menu-4" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-10">
                    <div class="py-1">
                      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Duplicate</a>
                      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Set as Featured</a>
                      <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Delete</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Property 5 -->
          <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="relative h-48">
              <img src="https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Seaside Villa" class="w-full h-full object-cover">
              <div class="absolute top-2 right-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                  Inactive
                </span>
              </div>
            </div>
            <div class="p-4">
              <div class="flex justify-between items-start">
                <div>
                  <h3 class="text-lg font-semibold text-gray-900">Seaside Villa</h3>
                  <p class="text-sm text-gray-600">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    Essaouira
                  </p>
                </div>
                <div class="flex items-center">
                  <div class="text-yellow-400 mr-1">
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="text-sm font-medium text-gray-900">4.7</span>
                </div>
              </div>
              <div class="mt-4 flex items-center justify-between">
                <div>
                  <p class="text-sm text-gray-600">Property Type</p>
                  <p class="text-sm font-medium text-gray-900">Villa</p>
                </div>
                <div>
                  <p class="text-sm text-gray-600">Rooms</p>
                  <p class="text-sm font-medium text-gray-900">4</p>
                </div>
                <div>
                  <p class="text-sm text-gray-600">Price</p>
                  <p class="text-sm font-medium text-gray-900">$220/night</p>
                </div>
              </div>
              <div class="mt-4 flex items-center justify-between">
                <div>
                  <p class="text-sm text-gray-600">Bookings (30 days)</p>
                  <p class="text-sm font-medium text-gray-900">0</p>
                </div>
                <div>
                  <p class="text-sm text-gray-600">Revenue (30 days)</p>
                  <p class="text-sm font-medium text-gray-900">$0</p>
                </div>
              </div>
              <div class="mt-4 flex space-x-2">
                <a href="owner-edit-listing.html?id=5" class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                  <i class="fas fa-edit mr-1"></i> Edit
                </a>
                <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                  <i class="fas fa-eye mr-1"></i> Preview
                </button>
                <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                  <i class="fas fa-chart-bar mr-1"></i> Stats
                </button>
                <div class="relative ml-auto">
                  <button id="dropdown-button-5" class="inline-flex items-center px-2 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                    <i class="fas fa-ellipsis-h"></i>
                  </button>
                  <div id="dropdown-menu-5" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-10">
                    <div class="py-1">
                      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Duplicate</a>
                      <a href="#" class="block px-4 py-2 text-sm text-green-600 hover:bg-gray-100">Activate</a>
                      <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Delete</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Property 6 -->
          <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="relative h-48">
              <img src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="City Center Apartment" class="w-full h-full object-cover">
              <div class="absolute top-2 right-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                  Active
                </span>
              </div>
            </div>
            <div class="p-4">
              <div class="flex justify-between items-start">
                <div>
                  <h3 class="text-lg font-semibold text-gray-900">City Center Apartment</h3>
                  <p class="text-sm text-gray-600">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    Casablanca
                  </p>
                </div>
                <div class="flex items-center">
                  <div class="text-yellow-400 mr-1">
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="text-sm font-medium text-gray-900">4.5</span>
                </div>
              </div>
              <div class="mt-4 flex items-center justify-between">
                <div>
                  <p class="text-sm text-gray-600">Property Type</p>
                  <p class="text-sm font-medium text-gray-900">Apartment</p>
                </div>
                <div>
                  <p class="text-sm text-gray-600">Rooms</p>
                  <p class="text-sm font-medium text-gray-900">2</p>
                </div>
                <div>
                  <p class="text-sm text-gray-600">Price</p>
                  <p class="text-sm font-medium text-gray-900">$75/night</p>
                </div>
              </div>
              <div class="mt-4 flex items-center justify-between">
                <div>
                  <p class="text-sm text-gray-600">Bookings (30 days)</p>
                  <p class="text-sm font-medium text-gray-900">12</p>
                </div>
                <div>
                  <p class="text-sm text-gray-600">Revenue (30 days)</p>
                  <p class="text-sm font-medium text-gray-900">$2,250</p>
                </div>
              </div>
              <div class="mt-4 flex space-x-2">
                <a href="owner-edit-listing.html?id=6" class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                  <i class="fas fa-edit mr-1"></i> Edit
                </a>
                <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                  <i class="fas fa-eye mr-1"></i> Preview
                </button>
                <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                  <i class="fas fa-chart-bar mr-1"></i> Stats
                </button>
                <div class="relative ml-auto">
                  <button id="dropdown-button-6" class="inline-flex items-center px-2 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                    <i class="fas fa-ellipsis-h"></i>
                  </button>
                  <div id="dropdown-menu-6" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-10">
                    <div class="py-1">
                      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Duplicate</a>
                      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Set as Featured</a>
                      <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Deactivate</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex items-center justify-between">
          <div class="flex-1 flex justify-between sm:hidden">
            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
              Previous
            </a>
            <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
              Next
            </a>
          </div>
          <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
              <p class="text-sm text-gray-700">
                Showing <span class="font-medium">1</span> to <span class="font-medium">6</span> of <span class="font-medium">12</span> results
              </p>
            </div>
            <div>
              <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                  <span class="sr-only">Previous</span>
                  <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#" aria-current="page" class="z-10 bg-teal-50 border-teal-500 text-teal-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                  1
                </a>
                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                  2
                </a>
                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium">
                  3
                </a>
                <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                  ...
                </span>
                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                  8
                </a>
                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                  <span class="sr-only">Next</span>
                  <i class="fas fa-chevron-right"></i>
                </a>
              </nav>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script>
    // Mobile sidebar toggle
    document.getElementById('open-sidebar-button').addEventListener('click', function() {
      document.getElementById('mobile-sidebar-container').style.display = 'flex';
    });

    document.getElementById('close-sidebar-button').addEventListener('click', function() {
      document.getElementById('mobile-sidebar-container').style.display = 'none';
    });

    // Dropdown menus
    const dropdownButtons = document.querySelectorAll('[id^="dropdown-button-"]');
    dropdownButtons.forEach(button => {
      button.addEventListener('click', function() {
        const buttonId = this.id;
        const menuId = buttonId.replace('button', 'menu');
        const menu = document.getElementById(menuId);
        
        // Close all other menus
        document.querySelectorAll('[id^="dropdown-menu-"]').forEach(m => {
          if (m.id !== menuId) {
            m.classList.add('hidden');
          }
        });
        
        // Toggle current menu
        menu.classList.toggle('hidden');
      });
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
      const isDropdownButton = event.target.closest('[id^="dropdown-button-"]');
      if (!isDropdownButton) {
        document.querySelectorAll('[id^="dropdown-menu-"]').forEach(menu => {
          menu.classList.add('hidden');
        });
      }
    });
  </script>
</body>
</html>