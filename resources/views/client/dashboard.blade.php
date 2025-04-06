<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - StayEase</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="min-h-screen bg-gray-50">
  <!-- Navigation -->
  <header class="sticky top-0 z-50 w-full bg-white/95 backdrop-blur-sm border-b border-gray-200">
    <div class="container mx-auto px-4 h-16 flex items-center justify-between">
      <!-- Logo -->
      <a href="index.html" class="flex items-center">
        <span class="text-2xl font-bold text-teal-600">StayEase</span>
      </a>
      
      <!-- Desktop Navigation -->
      <nav class="hidden md:flex items-center space-x-8">
        <a href="search.html" class="text-gray-700 hover:text-teal-600 transition-colors">Hotels</a>
        <a href="destinations.html" class="text-gray-700 hover:text-teal-600 transition-colors">Destinations</a>
        <a href="deals.html" class="text-gray-700 hover:text-teal-600 transition-colors">Deals</a>
        <a href="about.html" class="text-gray-700 hover:text-teal-600 transition-colors">About</a>
        <a href="contact.html" class="text-gray-700 hover:text-teal-600 transition-colors">Contact</a>
      </nav>
      
      <!-- User Actions -->
      <div class="flex items-center space-x-4">
        <a href="favorites.html" class="hidden md:block text-gray-700 hover:text-teal-600 transition-colors">
          <i class="fas fa-heart"></i>
        </a>
        <a href="language.html" class="hidden md:block text-gray-700 hover:text-teal-600 transition-colors">
          <i class="fas fa-globe"></i>
        </a>
        
        <div class="relative">
          <button id="user-menu-button" class="flex items-center text-gray-700 hover:text-teal-600">
            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User" class="w-8 h-8 rounded-full mr-2">
            <span class="hidden md:inline">Sarah</span>
            <i class="fas fa-chevron-down ml-1 text-xs"></i>
          </button>
          
          <!-- User Dropdown Menu (hidden by default) -->
          <div id="user-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden">
            <a href="dashboard.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
            <a href="profile.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
            <a href="bookings.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Bookings</a>
            <a href="settings.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
            <div class="border-t border-gray-100"></div>
            <a href="index.html" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Sign Out</a>
          </div>
        </div>
        
        <button id="mobile-menu-button" class="md:hidden text-gray-700">
          <i class="fas fa-bars text-xl"></i>
        </button>
      </div>
    </div>
    
    <!-- Mobile Menu (hidden by default) -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200 py-4">
      <div class="container mx-auto px-4 space-y-4">
        <a href="search.html" class="block text-gray-700 hover:text-teal-600 transition-colors py-2">Hotels</a>
        <a href="destinations.html" class="block text-gray-700 hover:text-teal-600 transition-colors py-2">Destinations</a>
        <a href="deals.html" class="block text-gray-700 hover:text-teal-600 transition-colors py-2">Deals</a>
        <a href="about.html" class="block text-gray-700 hover:text-teal-600 transition-colors py-2">About</a>
        <a href="contact.html" class="block text-gray-700 hover:text-teal-600 transition-colors py-2">Contact</a>
        <a href="favorites.html" class="block text-gray-700 hover:text-teal-600 transition-colors py-2">Favorites</a>
        <a href="language.html" class="block text-gray-700 hover:text-teal-600 transition-colors py-2">Language</a>
        <div class="border-t border-gray-200 my-2"></div>
        <a href="dashboard.html" class="block text-gray-700 hover:text-teal-600 transition-colors py-2">Dashboard</a>
        <a href="profile.html" class="block text-gray-700 hover:text-teal-600 transition-colors py-2">Profile</a>
        <a href="bookings.html" class="block text-gray-700 hover:text-teal-600 transition-colors py-2">My Bookings</a>
        <a href="settings.html" class="block text-gray-700 hover:text-teal-600 transition-colors py-2">Settings</a>
        <a href="index.html" class="block text-red-600 hover:text-red-700 transition-colors py-2">Sign Out</a>
      </div>
    </div>
  </header>

  <!-- Dashboard Header -->
  <div class="bg-teal-700 py-6">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center">
        <h1 class="text-2xl md:text-3xl font-bold text-white">My Dashboard</h1>
        
        <div class="flex items-center space-x-4">
          <button class="relative text-white hover:bg-teal-600 p-2 rounded-full">
            <i class="fas fa-bell"></i>
            <span class="absolute -top-1 -right-1 h-4 w-4 flex items-center justify-center bg-red-500 text-white text-xs rounded-full">
              3
            </span>
          </button>
          
          <button class="relative text-white hover:bg-teal-600 p-2 rounded-full">
            <i class="fas fa-comment"></i>
            <span class="absolute -top-1 -right-1 h-4 w-4 flex items-center justify-center bg-red-500 text-white text-xs rounded-full">
              2
            </span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-8">
      <!-- Sidebar Navigation -->
      <div class="w-full md:w-1/4">
        <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
          <nav class="space-y-1">
            <a href="dashboard.html" class="flex items-center px-3 py-2 rounded-md text-sm font-medium bg-teal-50 text-teal-700">
              <i class="fas fa-home mr-3"></i>
              Dashboard
            </a>
            <a href="bookings.html" class="flex items-center px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
              <i class="fas fa-calendar-alt mr-3"></i>
              My Bookings
            </a>
            <a href="history.html" class="flex items-center px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
              <i class="fas fa-history mr-3"></i>
              Booking History
            </a>
            <a href="favorites.html" class="flex items-center px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
              <i class="fas fa-heart mr-3"></i>
              Saved Hotels
            </a>
            <a href="payments.html" class="flex items-center px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
              <i class="fas fa-credit-card mr-3"></i>
              Payment Methods
            </a>
            <a href="settings.html" class="flex items-center px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
              <i class="fas fa-cog mr-3"></i>
              Account Settings
            </a>
            <a href="help.html" class="flex items-center px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
              <i class="fas fa-question-circle mr-3"></i>
              Help & Support
            </a>
            
            <div class="pt-4 mt-4 border-t border-gray-200">
              <a href="index.html" class="flex items-center px-3 py-2 rounded-md text-sm font-medium text-red-600 hover:bg-red-50 w-full">
                <i class="fas fa-sign-out-alt mr-3"></i>
                Sign Out
              </a>
            </div>
          </nav>
        </div>
        
        <!-- User Profile Card -->
        <div class="bg-white rounded-xl shadow-sm p-6 text-center">
          <div class="relative mx-auto h-24 w-24 rounded-full overflow-hidden mb-4">
            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User profile" class="w-full h-full object-cover" />
            <button class="absolute bottom-0 right-0 bg-teal-600 text-white p-1 rounded-full">
              <i class="fas fa-pencil-alt text-xs"></i>
            </button>
          </div>
          
          <h3 class="text-xl font-semibold text-gray-800">Sarah Johnson</h3>
          <p class="text-gray-600 text-sm mb-4">Member since October 2022</p>
          
          <div class="flex justify-center space-x-2 mb-4">
            <div class="bg-teal-50 px-3 py-1 rounded-full">
              <span class="text-xs font-medium text-teal-700">Gold Member</span>
            </div>
            <div class="bg-blue-50 px-3 py-1 rounded-full">
              <span class="text-xs font-medium text-blue-700">15 Bookings</span>
            </div>
          </div>
          
          <button class="w-full border border-gray-300 hover:bg-gray-50 text-gray-700 py-2 px-4 rounded-md text-sm font-medium">
            Edit Profile
          </button>
        </div>
      </div>
      
      <!-- Main Content -->
      <div class="w-full md:w-3/4">
        <!-- Upcoming Bookings -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
          <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Upcoming Bookings</h2>
            <a href="bookings.html" class="text-teal-600 hover:text-teal-700 text-sm font-medium flex items-center">
              View All
              <i class="fas fa-arrow-right ml-1"></i>
            </a>
          </div>
          
          <div class="space-y-6">
            <!-- Booking 1 -->
            <div class="border rounded-lg p-4 flex flex-col md:flex-row">
              <div class="relative h-40 md:h-auto md:w-48 rounded-md overflow-hidden mb-4 md:mb-0 md:mr-4">
                <img 
                  src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                  alt="Luxury Palace Hotel" 
                  class="w-full h-full object-cover"
                />
              </div>
              
              <div class="flex-1">
                <div class="flex flex-col md:flex-row md:justify-between md:items-start">
                  <div>
                    <h3 class="text-lg font-semibold text-gray-800">Luxury Palace Hotel</h3>
                    <div class="flex items-center text-gray-600 text-sm mt-1">
                      <i class="fas fa-map-marker-alt mr-1"></i>
                      <span>Medina, Marrakech</span>
                    </div>
                  </div>
                  
                  <div class="mt-2 md:mt-0">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                      Confirmed
                    </span>
                  </div>
                </div>
                
                <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-3">
                  <div class="flex items-center">
                    <i class="fas fa-calendar text-teal-600 mr-2"></i>
                    <div>
                      <p class="text-xs text-gray-500">Check-in</p>
                      <p class="text-sm font-medium">Oct 15, 2023</p>
                    </div>
                  </div>
                  
                  <div class="flex items-center">
                    <i class="fas fa-calendar text-teal-600 mr-2"></i>
                    <div>
                      <p class="text-xs text-gray-500">Check-out</p>
                      <p class="text-sm font-medium">Oct 18, 2023</p>
                    </div>
                  </div>
                  
                  <div class="flex items-center">
                    <i class="fas fa-users text-teal-600 mr-2"></i>
                    <div>
                      <p class="text-xs text-gray-500">Guests</p>
                      <p class="text-sm font-medium">2 Guests</p>
                    </div>
                  </div>
                </div>
                
                <div class="mt-4 flex flex-col md:flex-row md:justify-between md:items-center">
                  <div class="text-sm text-gray-600 mb-3 md:mb-0">
                    Booking #: <span class="font-medium">BK12345</span>
                  </div>
                  
                  <div class="flex space-x-2">
                    <button class="border border-gray-300 hover:bg-gray-50 text-gray-700 py-1 px-3 rounded-md text-sm font-medium">
                      Modify
                    </button>
                    <button class="border border-red-200 hover:bg-red-50 text-red-600 py-1 px-3 rounded-md text-sm font-medium">
                      Cancel
                    </button>
                    <button class="bg-teal-600 hover:bg-teal-700 text-white py-1 px-3 rounded-md text-sm font-medium">
                      View Details
                    </button>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Booking 2 -->
            <div class="border rounded-lg p-4 flex flex-col md:flex-row">
              <div class="relative h-40 md:h-auto md:w-48 rounded-md overflow-hidden mb-4 md:mb-0 md:mr-4">
                <img 
                  src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                  alt="Mountain View Resort" 
                  class="w-full h-full object-cover"
                />
              </div>
              
              <div class="flex-1">
                <div class="flex flex-col md:flex-row md:justify-between md:items-start">
                  <div>
                    <h3 class="text-lg font-semibold text-gray-800">Mountain View Resort</h3>
                    <div class="flex items-center text-gray-600 text-sm mt-1">
                      <i class="fas fa-map-marker-alt mr-1"></i>
                      <span>Palmeraie, Marrakech</span>
                    </div>
                  </div>
                  
                  <div class="mt-2 md:mt-0">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                      Pending
                    </span>
                  </div>
                </div>
                
                <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-3">
                  <div class="flex items-center">
                    <i class="fas fa-calendar text-teal-600 mr-2"></i>
                    <div>
                      <p class="text-xs text-gray-500">Check-in</p>
                      <p class="text-sm font-medium">Nov 10, 2023</p>
                    </div>
                  </div>
                  
                  <div class="flex items-center">
                    <i class="fas fa-calendar text-teal-600 mr-2"></i>
                    <div>
                      <p class="text-xs text-gray-500">Check-out</p>
                      <p class="text-sm font-medium">Nov 15, 2023</p>
                    </div>
                  </div>
                  
                  <div class="flex items-center">
                    <i class="fas fa-users text-teal-600 mr-2"></i>
                    <div>
                      <p class="text-xs text-gray-500">Guests</p>
                      <p class="text-sm font-medium">3 Guests</p>
                    </div>
                  </div>
                </div>
                
                <div class="mt-4 flex flex-col md:flex-row md:justify-between md:items-center">
                  <div class="text-sm text-gray-600 mb-3 md:mb-0">
                    Booking #: <span class="font-medium">BK12346</span>
                  </div>
                  
                  <div class="flex space-x-2">
                    <button class="border border-gray-300 hover:bg-gray-50 text-gray-700 py-1 px-3 rounded-md text-sm font-medium">
                      Modify
                    </button>
                    <button class="border border-red-200 hover:bg-red-50 text-red-600 py-1 px-3 rounded-md text-sm font-medium">
                      Cancel
                    </button>
                    <button class="bg-teal-600 hover:bg-teal-700 text-white py-1 px-3 rounded-md text-sm font-medium">
                      View Details
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Booking History -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
          <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Booking History</h2>
            <a href="history.html" class="text-teal-600 hover:text-teal-700 text-sm font-medium flex items-center">
              View All
              <i class="fas fa-arrow-right ml-1"></i>
            </a>
          </div>
          
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Hotel
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Dates
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Amount
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
                  </th>
                  <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div>
                      <div class="font-medium text-gray-900">Ocean View Resort</div>
                      <div class="text-sm text-gray-500">Casablanca, Morocco</div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Aug 5 - Aug 10, 2023
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    $475
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      Completed
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="#" class="text-teal-600 hover:text-teal-900">Details</a>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div>
                      <div class="font-medium text-gray-900">Kasbah Retreat</div>
                      <div class="text-sm text-gray-500">Fes, Morocco</div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Jul 15 - Jul 18, 2023
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    $255
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      Completed
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="#" class="text-teal-600 hover:text-teal-900">Details</a>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div>
                      <div class="font-medium text-gray-900">Atlas Panorama Hotel</div>
                      <div class="text-sm text-gray-500">Marrakech, Morocco</div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Jun 20 - Jun 25, 2023
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    $550
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                      Cancelled
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="#" class="text-teal-600 hover:text-teal-900">Details</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Saved Hotels -->
        <div class="bg-white rounded-xl shadow-sm p-6">
          <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Saved Hotels</h2>
            <a href="favorites.html" class="text-teal-600 hover:text-teal-700 text-sm font-medium flex items-center">
              View All
              <i class="fas fa-arrow-right ml-1"></i>
            </a>
          </div>
          
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Saved Hotel 1 -->
            <div class="border rounded-lg overflow-hidden group">
              <div class="relative h-40">
                <img 
                  src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                  alt="Luxury Palace Hotel" 
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                />
                <button class="absolute top-3 right-3 bg-white/80 p-2 rounded-full hover:bg-white transition-colors">
                  <i class="fas fa-heart text-red-500"></i>
                </button>
              </div>
              
              <div class="p-4">
                <h3 class="font-semibold text-gray-800 group-hover:text-teal-600 transition-colors">
                  Luxury Palace Hotel
                </h3>
                <p class="text-gray-600 text-sm mb-2">Medina, Marrakech</p>
                
                <div class="flex items-center mb-3">
                  <div class="flex items-center text-yellow-500 mr-2">
                    <i class="fas fa-star"></i>
                    <span class="ml-1 text-sm font-medium">4.8</span>
                  </div>
                  <span class="text-xs text-gray-500">(245 reviews)</span>
                </div>
                
                <div class="flex justify-between items-center">
                  <div>
                    <span class="text-lg font-bold text-gray-800">$120</span>
                    <span class="text-gray-600 text-sm"> / night</span>
                  </div>
                  
                  <a href="hotel-details.html?id=1" class="bg-teal-600 hover:bg-teal-700 text-white py-1 px-3 rounded-md text-sm font-medium">
                    View
                  </a>
                </div>
              </div>
            </div>
            
            <!-- Saved Hotel 2 -->
            <div class="border rounded-lg overflow-hidden group">
              <div class="relative h-40">
                <img 
                  src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                  alt="Ocean View Resort" 
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                />
                <button class="absolute top-3 right-3 bg-white/80 p-2 rounded-full hover:bg-white transition-colors">
                  <i class="fas fa-heart text-red-500"></i>
                </button>
              </div>
              
              <div class="p-4">
                <h3 class="font-semibold text-gray-800 group-hover:text-teal-600 transition-colors">
                  Ocean View Resort
                </h3>
                <p class="text-gray-600 text-sm mb-2">Casablanca, Morocco</p>
                
                <div class="flex items-center mb-3">
                  <div class="flex items-center text-yellow-500 mr-2">
                    <i class="fas fa-star"></i>
                    <span class="ml-1 text-sm font-medium">4.6</span>
                  </div>
                  <span class="text-xs text-gray-500">(189 reviews)</span>
                </div>
                
                <div class="flex justify-between items-center">
                  <div>
                    <span class="text-lg font-bold text-gray-800">$95</span>
                    <span class="text-gray-600 text-sm"> / night</span>
                  </div>
                  
                  <a href="hotel-details.html?id=2" class="bg-teal-600 hover:bg-teal-700 text-white py-1 px-3 rounded-md text-sm font-medium">
                    View
                  </a>
                </div>
              </div>
            </div>
            
            <!-- Saved Hotel 3 -->
            <div class="border rounded-lg overflow-hidden group">
              <div class="relative h-40">
                <img 
                  src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                  alt="Mountain Retreat" 
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                />
                <button class="absolute top-3 right-3 bg-white/80 p-2 rounded-full hover:bg-white transition-colors">
                  <i class="fas fa-heart text-red-500"></i>
                </button>
              </div>
              
              <div class="p-4">
                <h3 class="font-semibold text-gray-800 group-hover:text-teal-600 transition-colors">
                  Mountain Retreat
                </h3>
                <p class="text-gray-600 text-sm mb-2">Atlas Mountains, Morocco</p>
                
                <div class="flex items-center mb-3">
                  <div class="flex items-center text-yellow-500 mr-2">
                    <i class="fas fa-star"></i>
                    <span class="ml-1 text-sm font-medium">4.9</span>
                  </div>
                  <span class="text-xs text-gray-500">(120 reviews)</span>
                </div>
                
                <div class="flex justify-between items-center">
                  <div>
                    <span class="text-lg font-bold text-gray-800">$150</span>
                    <span class="text-gray-600 text-sm"> / night</span>
                  </div>
                  
                  <a href="hotel-details.html?id=3" class="bg-teal-600 hover:bg-teal-700 text-white py-1 px-3 rounded-md text-sm font-medium">
                    View
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white pt-16 pb-8 mt-12">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
        <!-- Company Info -->
        <div>
          <h3 class="text-xl font-bold mb-4">StayEase</h3>
          <p class="text-gray-400 mb-4">
            Find your perfect stay with our curated selection of hotels and accommodations across Morocco.
          </p>
          <div class="flex space-x-4">
            <a href="#" class="text-gray-400 hover:text-teal-500 transition-colors">
              <i class="fab fa-facebook"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-teal-500 transition-colors">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-teal-500 transition-colors">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-teal-500 transition-colors">
              <i class="fab fa-youtube"></i>
            </a>
          </div>
        </div>
        
        <!-- Quick Links -->
        <div>
          <h3 class="text-xl font-bold mb-4">Quick Links</h3>
          <ul class="space-y-2">
            <li>
              <a href="about.html" class="text-gray-400 hover:text-teal-500 transition-colors">
                About Us
              </a>
            </li>
            <li>
              <a href="search.html" class="text-gray-400 hover:text-teal-500 transition-colors">
                Hotels
              </a>
            </li>
            <li>
              <a href="destinations.html" class="text-gray-400 hover:text-teal-500 transition-colors">
                Destinations
              </a>
            </li>
            <li>
              <a href="blog.html" class="text-gray-400 hover:text-teal-500 transition-colors">
                Travel Blog
              </a>
            </li>
            <li>
              <a href="faq.html" class="text-gray-400 hover:text-teal-500 transition-colors">
                FAQs
              </a>
            </li>
          </ul>
        </div>
        
        <!-- Support -->
        <div>
          <h3 class="text-xl font-bold mb-4">Support</h3>
          <ul class="space-y-2">
            <li>
              <a href="help.html" class="text-gray-400 hover:text-teal-500 transition-colors">
                Help Center
              </a>
            </li>
            <li>
              <a href="terms.html" class="text-gray-400 hover:text-teal-500 transition-colors">
                Terms of Service
              </a>
            </li>
            <li>
              <a href="privacy.html" class="text-gray-400 hover:text-teal-500 transition-colors">
                Privacy Policy
              </a>
            </li>
            <li>
              <a href="cancellation.html" class="text-gray-400 hover:text-teal-500 transition-colors">
                Cancellation Policy
              </a>
            </li>
            <li>
              <a href="contact.html" class="text-gray-400 hover:text-teal-500 transition-colors">
                Contact Us
              </a>
            </li>
          </ul>
        </div>
        
        <!-- Contact -->
        <div>
          <h3 class="text-xl font-bold mb-4">Contact Us</h3>
          <ul class="space-y-4">
            <li class="flex items-start">
              <i class="fas fa-map-marker-alt text-teal-500 mr-2 mt-1"></i>
              <span class="text-gray-400">
                123 Business Avenue, Casablanca, Morocco
              </span>
            </li>
            <li class="flex items-center">
              <i class="fas fa-phone text-teal-500 mr-2"></i>
              <span class="text-gray-400">
                +212 5XX-XXXXXX
              </span>
            </li>
            <li class="flex items-center">
              <i class="fas fa-envelope text-teal-500 mr-2"></i>
              <span class="text-gray-400">
                info@stayease.com
              </span>
            </li>
          </ul>
        </div>
      </div>
      
      <div class="border-t border-gray-800 pt-8">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <p class="text-gray-400 text-sm mb-4 md:mb-0">
            &copy; <span id="current-year"></span> StayEase. All rights reserved.
          </p>
          <div class="flex space-x-6">
            <a href="terms.html" class="text-gray-400 hover:text-teal-500 transition-colors text-sm">
              Terms
            </a>
            <a href="privacy.html" class="text-gray-400 hover:text-teal-500 transition-colors text-sm">
              Privacy
            </a>
            <a href="cookies.html" class="text-gray-400 hover:text-teal-500 transition-colors text-sm">
              Cookies
            </a>
            <a href="sitemap.html" class="text-gray-400 hover:text-teal-500 transition-colors text-sm">
              Sitemap
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
      const mobileMenu = document.getElementById('mobile-menu');
      mobileMenu.classList.toggle('hidden');
    });

    // User menu toggle
    document.getElementById('user-menu-button').addEventListener('click', function() {
      const userMenu = document.getElementById('user-menu');
      userMenu.classList.toggle('hidden');
    });

    // Close user menu when clicking outside
    document.addEventListener('click', function(event) {
      const userMenu = document.getElementById('user-menu');
      const userMenuButton = document.getElementById('user-menu-button');
      
      if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
        userMenu.classList.add('hidden');
      }
    });

    // Set current year in footer
    document.getElementById('current-year').textContent = new Date().getFullYear();
  </script>
</body>
</html>