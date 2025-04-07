<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile - StayEase</title>
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
            <a href="owner-listings.html" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <i class="fas fa-building mr-3 text-gray-400"></i>
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
            <a href="owner-profile.html" class="flex items-center px-2 py-2 text-sm font-medium text-white bg-gray-700 rounded-md group">
              <i class="fas fa-user mr-3 text-gray-300"></i>
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
            <a href="owner-listings.html" class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
              <i class="fas fa-building mr-3 text-gray-400"></i>
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
            <a href="owner-profile.html" class="flex items-center px-2 py-2 text-base font-medium text-white bg-gray-700 rounded-md">
              <i class="fas fa-user mr-3 text-gray-300"></i>
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
            <h1 class="text-xl font-semibold text-gray-900 ml-2 md:ml-0">Profile</h1>
          </div>
          <div class="flex items-center">
            <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
              <i class="fas fa-edit mr-2"></i>
              Edit Profile
            </button>
          </div>
        </div>
      </header>

      <!-- Main content area -->
      <main class="flex-1 overflow-y-auto bg-gray-50 p-4 sm:p-6 lg:p-8">
        <!-- Profile header -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
          <div class="h-32 bg-gradient-to-r from-teal-500 to-teal-600"></div>
          <div class="px-4 sm:px-6 lg:px-8 pb-6">
            <div class="flex flex-col sm:flex-row sm:items-end -mt-16">
              <div class="flex-shrink-0">
                <img class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32" src="https://randomuser.me/api/portraits/men/32.jpg" alt="User avatar">
              </div>
              <div class="mt-6 sm:mt-0 sm:ml-6 sm:flex-1">
                <div class="flex items-center justify-between">
                  <div>
                    <h2 class="text-xl font-bold text-gray-900 sm:text-2xl">Ahmed Malik</h2>
                    <p class="text-sm text-gray-500">Hotel Owner since October 2020</p>
                  </div>
                  <div class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                    <button type="button" class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                      <i class="fas fa-share-alt mr-2 text-gray-500"></i>
                      <span>Share Profile</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
          <!-- Left column -->
          <div class="lg:col-span-1">
            <!-- Personal Information -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
              <h3 class="text-lg font-medium text-gray-900 mb-4">Personal Information</h3>
              <div class="space-y-4">
                <div>
                  <h4 class="text-sm font-medium text-gray-500">Full Name</h4>
                  <p class="mt-1 text-sm text-gray-900">Ahmed Malik</p>
                </div>
                <div>
                  <h4 class="text-sm font-medium text-gray-500">Email Address</h4>
                  <p class="mt-1 text-sm text-gray-900">ahmed.malik@example.com</p>
                </div>
                <div>
                  <h4 class="text-sm font-medium text-gray-500">Phone Number</h4>
                  <p class="mt-1 text-sm text-gray-900">+212 612 345 678</p>
                </div>
                <div>
                  <h4 class="text-sm font-medium text-gray-500">Location</h4>
                  <p class="mt-1 text-sm text-gray-900">Marrakech, Morocco</p>
                </div>
                <div>
                  <h4 class="text-sm font-medium text-gray-500">Languages</h4>
                  <p class="mt-1 text-sm text-gray-900">Arabic, French, English</p>
                </div>
              </div>
            </div>
            
            <!-- Verification Status -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
              <h3 class="text-lg font-medium text-gray-900 mb-4">Verification Status</h3>
              <div class="space-y-4">
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <i class="fas fa-envelope text-green-500 mr-2"></i>
                    <span class="text-sm text-gray-900">Email</span>
                  </div>
                  <span class="text-xs font-medium text-green-600">Verified</span>
                </div>
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <i class="fas fa-phone text-green-500 mr-2"></i>
                    <span class="text-sm text-gray-900">Phone</span>
                  </div>
                  <span class="text-xs font-medium text-green-600">Verified</span>
                </div>
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <i class="fas fa-id-card text-green-500 mr-2"></i>
                    <span class="text-sm text-gray-900">ID</span>
                  </div>
                  <span class="text-xs font-medium text-green-600">Verified</span>
                </div>
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <i class="fas fa-building text-green-500 mr-2"></i>
                    <span class="text-sm text-gray-900">Business License</span>
                  </div>
                  <span class="text-xs font-medium text-green-600">Verified</span>
                </div>
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <i class="fas fa-shield-alt text-yellow-500 mr-2"></i>
                    <span class="text-sm text-gray-900">Enhanced Security</span>
                  </div>
                  <button class="text-xs font-medium text-teal-600 hover:text-teal-500">Enable</button>
                </div>
              </div>
            </div>
            
            <!-- Social Profiles -->
            <div class="bg-white rounded-lg shadow-sm p-6">
              <h3 class="text-lg font-medium text-gray-900 mb-4">Social Profiles</h3>
              <div class="space-y-4">
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <i class="fab fa-facebook text-blue-600 mr-2"></i>
                    <span class="text-sm text-gray-900">Facebook</span>
                  </div>
                  <button class="text-xs font-medium text-teal-600 hover:text-teal-500">Connect</button>
                </div>
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <i class="fab fa-instagram text-pink-600 mr-2"></i>
                    <span class="text-sm text-gray-900">Instagram</span>
                  </div>
                  <span class="text-xs font-medium text-gray-500">Connected</span>
                </div>
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <i class="fab fa-twitter text-blue-400 mr-2"></i>
                    <span class="text-sm text-gray-900">Twitter</span>
                  </div>
                  <button class="text-xs font-medium text-teal-600 hover:text-teal-500">Connect</button>
                </div>
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <i class="fab fa-linkedin text-blue-700 mr-2"></i>
                    <span class="text-sm text-gray-900">LinkedIn</span>
                  </div>
                  <span class="text-xs font-medium text-gray-500">Connected</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Right column -->
          <div class="lg:col-span-2">
            <!-- About -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
              <h3 class="text-lg font-medium text-gray-900 mb-4">About</h3>
              <p class="text-sm text-gray-600">
                Experienced hospitality professional with over 15 years in the industry. I own and manage several properties in Marrakech, including luxury hotels, traditional riads, and modern apartments. My goal is to provide authentic Moroccan experiences  traditional riads, and modern apartments. My goal is to provide authentic Moroccan experiences with world-class hospitality. I'm passionate about showcasing the beauty and culture of Morocco to visitors from around the world.

I have a background in hotel management with a degree from École Hôtelière de Lausanne and have worked with international hotel chains before starting my own business. I believe in sustainable tourism and supporting local communities through my properties.
              </p>
            </div>
            
            <!-- Properties Overview -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
              <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">Properties Overview</h3>
                <a href="owner-listings.html" class="text-sm font-medium text-teal-600 hover:text-teal-500">View All</a>
              </div>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Property 1 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                  <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Luxury Palace Hotel" class="w-full h-40 object-cover">
                  <div class="p-4">
                    <h4 class="text-sm font-medium text-gray-900">Luxury Palace Hotel</h4>
                    <p class="text-xs text-gray-500 mt-1">Marrakech, Morocco</p>
                    <div class="flex items-center mt-2">
                      <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </div>
                      <span class="text-xs text-gray-500 ml-2">4.8 (124 reviews)</span>
                    </div>
                  </div>
                </div>
                
                <!-- Property 2 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                  <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Riad Elegance" class="w-full h-40 object-cover">
                  <div class="p-4">
                    <h4 class="text-sm font-medium text-gray-900">Riad Elegance</h4>
                    <p class="text-xs text-gray-500 mt-1">Marrakech, Morocco</p>
                    <div class="flex items-center mt-2">
                      <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                      <span class="text-xs text-gray-500 ml-2">5.0 (87 reviews)</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Host Stats -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
              <h3 class="text-lg font-medium text-gray-900 mb-4">Host Statistics</h3>
              <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                  <div class="text-2xl font-bold text-gray-900">98%</div>
                  <p class="text-sm text-gray-500">Response Rate</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                  <div class="text-2xl font-bold text-gray-900">2 hrs</div>
                  <p class="text-sm text-gray-500">Response Time</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                  <div class="text-2xl font-bold text-gray-900">4.9</div>
                  <p class="text-sm text-gray-500">Average Rating</p>
                </div>
              </div>
            </div>
            
            <!-- Reviews -->
            <div class="bg-white rounded-lg shadow-sm p-6">
              <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">Recent Reviews</h3>
                <a href="owner-reviews.html" class="text-sm font-medium text-teal-600 hover:text-teal-500">View All</a>
              </div>
              <div class="space-y-6">
                <!-- Review 1 -->
                <div class="border-b border-gray-200 pb-6">
                  <div class="flex items-start">
                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Johnson">
                    <div class="ml-4">
                      <div class="flex items-center">
                        <h4 class="text-sm font-medium text-gray-900">Sarah Johnson</h4>
                        <span class="text-xs text-gray-500 ml-2">Oct 15, 2023</span>
                      </div>
                      <div class="flex text-yellow-400 mt-1">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                      <p class="mt-2 text-sm text-gray-600">
                        Ahmed was an exceptional host! The Luxury Palace Hotel exceeded all our expectations. The staff was incredibly attentive and helpful, and Ahmed personally ensured our stay was perfect. Highly recommend!
                      </p>
                    </div>
                  </div>
                </div>
                
                <!-- Review 2 -->
                <div>
                  <div class="flex items-start">
                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/67.jpg" alt="James Brown">
                    <div class="ml-4">
                      <div class="flex items-center">
                        <h4 class="text-sm font-medium text-gray-900">James Brown</h4>
                        <span class="text-xs text-gray-500 ml-2">Oct 5, 2023</span>
                      </div>
                      <div class="flex text-yellow-400 mt-1">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                      </div>
                      <p class="mt-2 text-sm text-gray-600">
                        We had a wonderful stay at Riad Elegance. The property is beautiful and authentic, and Ahmed was very responsive to all our questions. The location is perfect for exploring the medina. Would definitely stay again!
                      </p>
                    </div>
                  </div>
                </div>
              </div>
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
  </script>
</body>
</html>