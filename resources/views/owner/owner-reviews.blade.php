<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reviews - StayEase</title>
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
            <a href="owner-reviews.html" class="flex items-center px-2 py-2 text-sm font-medium text-white bg-gray-700 rounded-md group">
              <i class="fas fa-star mr-3 text-gray-300"></i>
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
            <a href="owner-reviews.html" class="flex items-center px-2 py-2 text-base font-medium text-white bg-gray-700 rounded-md">
              <i class="fas fa-star mr-3 text-gray-300"></i>
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
            <h1 class="text-xl font-semibold text-gray-900 ml-2 md:ml-0">Reviews</h1>
          </div>
          <div class="flex items-center">
            <button class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
              <i class="fas fa-download mr-2"></i>
              Export
            </button>
          </div>
        </div>
      </header>

      <!-- Main content area -->
      <main class="flex-1 overflow-y-auto bg-gray-50 p-4 sm:p-6 lg:p-8">
        <!-- Stats cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
          <!-- Average Rating -->
          <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
              <div class="flex-shrink-0 p-3 rounded-md bg-yellow-100 text-yellow-600">
                <i class="fas fa-star text-xl"></i>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">Average Rating</dt>
                  <dd>
                    <div class="text-lg font-semibold text-gray-900">4.8/5</div>
                    <div class="flex items-center text-sm text-green-600">
                      <i class="fas fa-arrow-up mr-1"></i>
                      <span>0.2 increase</span>
                    </div>
                  </dd>
                </dl>
              </div>
            </div>
          </div>

          <!-- Total Reviews -->
          <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
              <div class="flex-shrink-0 p-3 rounded-md bg-blue-100 text-blue-600">
                <i class="fas fa-comment-alt text-xl"></i>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">Total Reviews</dt>
                  <dd>
                    <div class="text-lg font-semibold text-gray-900">156</div>
                    <div class="flex items-center text-sm text-green-600">
                      <i class="fas fa-arrow-up mr-1"></i>
                      <span>12% increase</span>
                    </div>
                  </dd>
                </dl>
              </div>
            </div>
          </div>

          <!-- Response Rate -->
          <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
              <div class="flex-shrink-0 p-3 rounded-md bg-green-100 text-green-600">
                <i class="fas fa-reply text-xl"></i>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">Response Rate</dt>
                  <dd>
                    <div class="text-lg font-semibold text-gray-900">92%</div>
                    <div class="flex items-center text-sm text-green-600">
                      <i class="fas fa-arrow-up mr-1"></i>
                      <span>5% increase</span>
                    </div>
                  </dd>
                </dl>
              </div>
            </div>
          </div>

          <!-- New Reviews -->
          <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
              <div class="flex-shrink-0 p-3 rounded-md bg-purple-100 text-purple-600">
                <i class="fas fa-bell text-xl"></i>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">New Reviews (7 days)</dt>
                  <dd>
                    <div class="text-lg font-semibold text-gray-900">12</div>
                    <div class="flex items-center text-sm text-green-600">
                      <i class="fas fa-arrow-up mr-1"></i>
                      <span>3 more than last week</span>
                    </div>
                  </dd>
                </dl>
              </div>
            </div>
          </div>
        </div>

        <!-- Rating breakdown -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
          <h2 class="text-lg font-medium text-gray-900 mb-4">Rating Breakdown</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <div class="flex items-center mb-4">
                <div class="text-5xl font-bold text-gray-900 mr-4">4.8</div>
                <div>
                  <div class="flex text-yellow-400 mb-1">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                  </div>
                  <p class="text-sm text-gray-600">Based on 156 reviews</p>
                </div>
              </div>
              
              <!-- Rating bars -->
              <div class="space-y-3">
                <div class="flex items-center">
                  <span class="text-sm font-medium text-gray-600 w-8">5</span>
                  <i class="fas fa-star text-yellow-400 mr-2"></i>
                  <div class="flex-1 h-2 bg-gray-200 rounded-full">
                    <div class="h-2 bg-yellow-400 rounded-full" style="width: 75%"></div>
                  </div>
                  <span class="text-sm font-medium text-gray-600 ml-2">75%</span>
                </div>
                <div class="flex items-center">
                  <span class="text-sm font-medium text-gray-600 w-8">4</span>
                  <i class="fas fa-star text-yellow-400 mr-2"></i>
                  <div class="flex-1 h-2 bg-gray-200 rounded-full">
                    <div class="h-2 bg-yellow-400 rounded-full" style="width: 20%"></div>
                  </div>
                  <span class="text-sm font-medium text-gray-600 ml-2">20%</span>
                </div>
                <div class="flex items-center">
                  <span class="text-sm font-medium text-gray-600 w-8">3</span>
                  <i class="fas fa-star text-yellow-400 mr-2"></i>
                  <div class="flex-1 h-2 bg-gray-200 rounded-full">
                    <div class="h-2 bg-yellow-400 rounded-full" style="width: 3%"></div>
                  </div>
                  <span class="text-sm font-medium text-gray-600 ml-2">3%</span>
                </div>
                <div class="flex items-center">
                  <span class="text-sm font-medium text-gray-600 w-8">2</span>
                  <i class="fas fa-star text-yellow-400 mr-2"></i>
                  <div class="flex-1 h-2 bg-gray-200 rounded-full">
                    <div class="h-2 bg-yellow-400 rounded-full" style="width: 1%"></div>
                  </div>
                  <span class="text-sm font-medium text-gray-600 ml-2">1%</span>
                </div>
                <div class="flex items-center">
                  <span class="text-sm font-medium text-gray-600 w-8">1</span>
                  <i class="fas fa-star text-yellow-400 mr-2"></i>
                  <div class="flex-1 h-2 bg-gray-200 rounded-full">
                    <div class="h-2 bg-yellow-400 rounded-full" style="width: 1%"></div>
                  </div>
                  <span class="text-sm font-medium text-gray-600 ml-2">1%</span>
                </div>
              </div>
            </div>
            
            <div>
              <h3 class="text-md font-medium text-gray-900 mb-3">Category Ratings</h3>
              <div class="space-y-3">
                <div class="flex items-center justify-between">
                  <span class="text-sm font-medium text-gray-600">Cleanliness</span>
                  <div class="flex items-center">
                    <div class="flex text-yellow-400 mr-2">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-900">5.0</span>
                  </div>
                </div>
                <div class="flex items-center justify-between">
                  <span class="text-sm font-medium text-gray-600">Location</span>
                  <div class="flex items-center">
                    <div class="flex text-yellow-400 mr-2">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-900">4.8</span>
                  </div>
                </div>
                <div class="flex items-center justify-between">
                  <span class="text-sm font-medium text-gray-600">Staff</span>
                  <div class="flex items-center">
                    <div class="flex text-yellow-400 mr-2">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-900">4.9</span>
                  </div>
                </div>
                <div class="flex items-center justify-between">
                  <span class="text-sm font-medium text-gray-600">Value</span>
                  <div class="flex items-center">
                    <div class="flex text-yellow-400 mr-2">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="far fa-star"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-900">4.2</span>
                  </div>
                </div>
                <div class="flex items-center justify-between">
                  <span class="text-sm font-medium text-gray-600">Amenities</span>
                  <div class="flex items-center">
                    <div class="flex text-yellow-400 mr-2">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-900">4.7</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Filters and search -->
        <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
          <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
            <div class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-4">
              <div class="relative">
                <select id="property-filter" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                  <option value="">All Properties</option>
                  <option value="luxury-palace">Luxury Palace Hotel</option>
                  <option value="riad-elegance">Riad Elegance</option>
                  <option value="mountain-view">Mountain View Resort</option>
                  <option value="kasbah-retreat">Kasbah Retreat</option>
                  <option value="seaside-villa">Seaside Villa</option>
                  <option value="city-center">City Center Apartment</option>
                </select>
              </div>
              <div class="relative">
                <select id="rating-filter" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                  <option value="">All Ratings</option>
                  <option value="5">5 Stars</option>
                  <option value="4">4 Stars</option>
                  <option value="3">3 Stars</option>
                  <option value="2">2 Stars</option>
                  <option value="1">1 Star</option>
                </select>
              </div>
              <div class="relative">
                <select id="response-filter" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                  <option value="">All Reviews</option>
                  <option value="responded">Responded</option>
                  <option value="not-responded">Not Responded</option>
                </select>
              </div>
            </div>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
              </div>
              <input type="text" id="search-reviews" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-teal-500 focus:border-teal-500 sm:text-sm" placeholder="Search reviews...">
            </div>
          </div>
        </div>

        <!-- Reviews list -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
          <div class="divide-y divide-gray-200">
            <!-- Review 1 -->
            <div class="p-6">
              <div class="flex items-start">
                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Reviewer">
                <div class="ml-4 flex-1">
                  <div class="flex items-center justify-between">
                    <div>
                      <h3 class="text-sm font-medium text-gray-900">Sarah Johnson</h3>
                      <p class="text-sm text-gray-500">Luxury Palace Hotel • Oct 15, 2023</p>
                    </div>
                    <div class="flex text-yellow-400">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                  </div>
                  <p class="mt-2 text-sm text-gray-700">
                    Exceptional stay in the heart of Marrakech! The staff was incredibly attentive and helpful, the room was spacious and beautifully decorated. The rooftop terrace offered stunning views of the city, and the breakfast was delicious with a great variety of local and international options. Will definitely return on my next visit to Morocco.
                  </p>
                  
                  <!-- Owner response -->
                  <div class="mt-4 bg-gray-50 p-4 rounded-md">
                    <div class="flex items-start">
                      <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="Owner">
                      <div class="ml-3">
                        <h4 class="text-xs font-medium text-gray-900">Response from Ahmed (Owner)</h4>
                        <p class="mt-1 text-sm text-gray-700">
                          Thank you so much for your wonderful review, Sarah! We're delighted that you enjoyed your stay with us at Luxury Palace Hotel. Our team works hard to provide exceptional service, and we're glad it showed. We look forward to welcoming you back on your next visit to Marrakech!
                        </p>
                      </div>
                    </div>
                  </div>
                  
                  <div class="mt-4 flex space-x-2">
                    <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                      <i class="fas fa-thumbs-up mr-1"></i> Helpful (3)
                    </button>
                    <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                <i class="fas fa-flag mr-1"></i> Report
                    </button>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Review 2 -->
            <div class="p-6">
              <div class="flex items-start">
                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="Reviewer">
                <div class="ml-4 flex-1">
                  <div class="flex items-center justify-between">
                    <div>
                      <h3 class="text-sm font-medium text-gray-900">Mohammed Ali</h3>
                      <p class="text-sm text-gray-500">Riad Elegance • Sep 28, 2023</p>
                    </div>
                    <div class="flex text-yellow-400">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="far fa-star"></i>
                    </div>
                  </div>
                  <p class="mt-2 text-sm text-gray-700">
                    Great location and beautiful property. The rooms are comfortable and the traditional architecture is stunning. The courtyard with the fountain is a peaceful oasis in the busy medina. The only minor issue was the WiFi, which was a bit spotty in our room. The staff was very friendly and accommodating, especially with restaurant recommendations.
                  </p>
                  
                  <!-- Owner response -->
                  <div class="mt-4 bg-gray-50 p-4 rounded-md">
                    <div class="flex items-start">
                      <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="Owner">
                      <div class="ml-3">
                        <h4 class="text-xs font-medium text-gray-900">Response from Ahmed (Owner)</h4>
                        <p class="mt-1 text-sm text-gray-700">
                          Thank you for your review, Mohammed. We're happy you enjoyed your stay at Riad Elegance. We appreciate your feedback about the WiFi and have already taken steps to improve the signal strength throughout the property. We hope to welcome you back soon!
                        </p>
                      </div>
                    </div>
                  </div>
                  
                  <div class="mt-4 flex space-x-2">
                    <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                      <i class="fas fa-thumbs-up mr-1"></i> Helpful (1)
                    </button>
                    <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                      <i class="fas fa-flag mr-1"></i> Report
                    </button>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Review 3 -->
            <div class="p-6">
              <div class="flex items-start">
                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/22.jpg" alt="Reviewer">
                <div class="ml-4 flex-1">
                  <div class="flex items-center justify-between">
                    <div>
                      <h3 class="text-sm font-medium text-gray-900">Emily Rodriguez</h3>
                      <p class="text-sm text-gray-500">Mountain View Resort • Oct 5, 2023</p>
                    </div>
                    <div class="flex text-yellow-400">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                  </div>
                  <p class="mt-2 text-sm text-gray-700">
                    This resort exceeded all our expectations! The views of the Atlas Mountains are breathtaking, especially at sunrise. The infinity pool is amazing and the spa treatments were top-notch. Our room was spacious with a private terrace. The staff remembered our names and preferences from day one. Special thanks to Karim at the front desk who helped arrange our day trips.
                  </p>
                  
                  <!-- No response yet -->
                  <div class="mt-4 flex items-center">
                    <span class="text-xs text-red-600 font-medium">Not responded yet</span>
                    <button class="ml-2 inline-flex items-center px-3 py-1.5 border border-teal-500 text-xs font-medium rounded text-teal-700 bg-teal-50 hover:bg-teal-100">
                      <i class="fas fa-reply mr-1"></i> Add Response
                    </button>
                  </div>
                  
                  <div class="mt-4 flex space-x-2">
                    <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                      <i class="fas fa-thumbs-up mr-1"></i> Helpful (5)
                    </button>
                    <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                      <i class="fas fa-flag mr-1"></i> Report
                    </button>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Review 4 -->
            <div class="p-6">
              <div class="flex items-start">
                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/67.jpg" alt="Reviewer">
                <div class="ml-4 flex-1">
                  <div class="flex items-center justify-between">
                    <div>
                      <h3 class="text-sm font-medium text-gray-900">James Brown</h3>
                      <p class="text-sm text-gray-500">City Center Apartment • Sep 15, 2023</p>
                    </div>
                    <div class="flex text-yellow-400">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="far fa-star"></i>
                      <i class="far fa-star"></i>
                    </div>
                  </div>
                  <p class="mt-2 text-sm text-gray-700">
                    The location is convenient, close to shops and restaurants. However, the apartment was smaller than it appeared in photos, and there were some maintenance issues with the bathroom. The air conditioning was also quite noisy. On the positive side, the kitchen was well-equipped and the bed was comfortable.
                  </p>
                  
                  <!-- Owner response -->
                  <div class="mt-4 bg-gray-50 p-4 rounded-md">
                    <div class="flex items-start">
                      <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="Owner">
                      <div class="ml-3">
                        <h4 class="text-xs font-medium text-gray-900">Response from Ahmed (Owner)</h4>
                        <p class="mt-1 text-sm text-gray-700">
                          Thank you for your feedback, James. We apologize for the issues you experienced during your stay. We've addressed the maintenance problems in the bathroom and have scheduled a service for the air conditioning unit. We appreciate your honest review as it helps us improve our accommodations for future guests.
                        </p>
                      </div>
                    </div>
                  </div>
                  
                  <div class="mt-4 flex space-x-2">
                    <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                      <i class="fas fa-thumbs-up mr-1"></i> Helpful (2)
                    </button>
                    <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                      <i class="fas fa-flag mr-1"></i> Report
                    </button>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Review 5 -->
            <div class="p-6">
              <div class="flex items-start">
                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/32.jpg" alt="Reviewer">
                <div class="ml-4 flex-1">
                  <div class="flex items-center justify-between">
                    <div>
                      <h3 class="text-sm font-medium text-gray-900">Sophia Chen</h3>
                      <p class="text-sm text-gray-500">Kasbah Retreat • Oct 22, 2023</p>
                    </div>
                    <div class="flex text-yellow-400">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star-half-alt"></i>
                    </div>
                  </div>
                  <p class="mt-2 text-sm text-gray-700">
                    A beautiful property with authentic Moroccan design. The staff was very welcoming and the breakfast on the terrace was a highlight of our stay. The room was clean and comfortable with beautiful traditional decor. The location is perfect for exploring the old city. Would highly recommend to anyone visiting Marrakech!
                  </p>
                  
                  <!-- No response yet -->
                  <div class="mt-4 flex items-center">
                    <span class="text-xs text-red-600 font-medium">Not responded yet</span>
                    <button class="ml-2 inline-flex items-center px-3 py-1.5 border border-teal-500 text-xs font-medium rounded text-teal-700 bg-teal-50 hover:bg-teal-100">
                      <i class="fas fa-reply mr-1"></i> Add Response
                    </button>
                  </div>
                  
                  <div class="mt-4 flex space-x-2">
                    <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                      <i class="fas fa-thumbs-up mr-1"></i> Helpful (4)
                    </button>
                    <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                      <i class="fas fa-flag mr-1"></i> Report
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Pagination -->
          <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
            <div class="flex items-center justify-between">
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
                    Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">156</span> results
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
                      32
                    </a>
                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                      <span class="sr-only">Next</span>
                      <i class="fas fa-chevron-right"></i>
                    </a>
                  </nav>
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

    // Filters functionality
    document.getElementById('property-filter').addEventListener('change', function() {
      // In a real app, this would filter the reviews
      console.log('Filter by property:', this.value);
    });

    document.getElementById('rating-filter').addEventListener('change', function() {
      // In a real app, this would filter the reviews
      console.log('Filter by rating:', this.value);
    });

    document.getElementById('response-filter').addEventListener('change', function() {
      // In a real app, this would filter the reviews
      console.log('Filter by response status:', this.value);
    });

    document.getElementById('search-reviews').addEventListener('input', function() {
      // In a real app, this would search the reviews
      console.log('Search term:', this.value);
    });
  </script>
</body>
</html>