<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Owner Dashboard - StayEase</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Chart.js for statistics -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            <a href="owner-dashboard.html" class="flex items-center px-2 py-2 text-sm font-medium text-white bg-gray-700 rounded-md group">
              <i class="fas fa-tachometer-alt mr-3 text-gray-300"></i>
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
            <a href="owner-dashboard.html" class="flex items-center px-2 py-2 text-base font-medium text-white bg-gray-700 rounded-md">
              <i class="fas fa-tachometer-alt mr-3 text-gray-300"></i>
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
            <h1 class="text-xl font-semibold text-gray-900 ml-2 md:ml-0">Dashboard</h1>
          </div>
          <div class="flex items-center">
            <button class="relative p-1 text-gray-400 rounded-full hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-teal-500">
              <span class="sr-only">View notifications</span>
              <i class="fas fa-bell text-xl"></i>
              <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
            </button>
            <button class="ml-3 relative p-1 text-gray-400 rounded-full hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-teal-500">
              <span class="sr-only">View messages</span>
              <i class="fas fa-envelope text-xl"></i>
              <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
            </button>
          </div>
        </div>
      </header>

      <!-- Main content area -->
      <main class="flex-1 overflow-y-auto bg-gray-50 p-4 sm:p-6 lg:p-8">
        <!-- Welcome message -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
          <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
              <h2 class="text-2xl font-bold text-gray-800">Welcome back, Ahmed!</h2>
              <p class="text-gray-600 mt-1">Here's what's happening with your properties today.</p>
            </div>
            <div class="mt-4 md:mt-0">
              <a href="owner-add-listing.html" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                <i class="fas fa-plus mr-2"></i>
                Add New Property
              </a>
            </div>
          </div>
        </div>

        <!-- Stats cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
          <!-- Bookings -->
          <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
              <div class="flex-shrink-0 p-3 rounded-md bg-blue-100 text-blue-600">
                <i class="fas fa-calendar-check text-xl"></i>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">Total Bookings</dt>
                  <dd>
                    <div class="text-lg font-semibold text-gray-900">248</div>
                    <div class="flex items-center text-sm text-green-600">
                      <i class="fas fa-arrow-up mr-1"></i>
                      <span>12% increase</span>
                    </div>
                  </dd>
                </dl>
              </div>
            </div>
          </div>

          <!-- Revenue -->
          <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
              <div class="flex-shrink-0 p-3 rounded-md bg-green-100 text-green-600">
                <i class="fas fa-dollar-sign text-xl"></i>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">Total Revenue</dt>
                  <dd>
                    <div class="text-lg font-semibold text-gray-900">$24,568</div>
                    <div class="flex items-center text-sm text-green-600">
                      <i class="fas fa-arrow-up mr-1"></i>
                      <span>8.2% increase</span>
                    </div>
                  </dd>
                </dl>
              </div>
            </div>
          </div>

          <!-- Occupancy -->
          <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
              <div class="flex-shrink-0 p-3 rounded-md bg-purple-100 text-purple-600">
                <i class="fas fa-bed text-xl"></i>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">Occupancy Rate</dt>
                  <dd>
                    <div class="text-lg font-semibold text-gray-900">78%</div>
                    <div class="flex items-center text-sm text-green-600">
                      <i class="fas fa-arrow-up mr-1"></i>
                      <span>5% increase</span>
                    </div>
                  </dd>
                </dl>
              </div>
            </div>
          </div>

          <!-- Reviews -->
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
        </div>

        <!-- Charts and tables section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
          <!-- Revenue chart -->
          <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
              <h3 class="text-lg font-semibold text-gray-800">Revenue Overview</h3>
              <div class="relative">
                <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                  <option>Last 7 days</option>
                  <option>Last 30 days</option>
                  <option selected>Last 3 months</option>
                  <option>Last 12 months</option>
                </select>
              </div>
            </div>
            <div class="h-64">
              <canvas id="revenueChart"></canvas>
            </div>
          </div>

          <!-- Occupancy chart -->
          <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
              <h3 class="text-lg font-semibold text-gray-800">Occupancy Rate</h3>
              <div class="relative">
                <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                  <option>Last 7 days</option>
                  <option>Last 30 days</option>
                  <option selected>Last 3 months</option>
                  <option>Last 12 months</option>
                </select>
              </div>
            </div>
            <div class="h-64">
              <canvas id="occupancyChart"></canvas>
            </div>
          </div>
        </div>

        <!-- Recent bookings and tasks -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
          <!-- Recent bookings -->
          <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
              <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800">Recent Bookings</h3>
                <a href="owner-reservations.html" class="text-sm font-medium text-teal-600 hover:text-teal-500">View all</a>
              </div>
            </div>
            <div class="divide-y divide-gray-200">
              <div class="px-6 py-4">
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/12.jpg" alt="Guest">
                    <div class="ml-3">
                      <p class="text-sm font-medium text-gray-900">Emma Wilson</p>
                      <p class="text-sm text-gray-500">Luxury Palace Hotel</p>
                    </div>
                  </div>
                  <div class="flex flex-col items-end">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                      Confirmed
                    </span>
                    <p class="mt-1 text-sm text-gray-500">Oct 15 - Oct 18, 2023</p>
                  </div>
                </div>
              </div>
              <div class="px-6 py-4">
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/67.jpg" alt="Guest">
                    <div class="ml-3">
                      <p class="text-sm font-medium text-gray-900">James Brown</p>
                      <p class="text-sm text-gray-500">Mountain View Resort</p>
                    </div>
                  </div>
                  <div class="flex flex-col items-end">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                      Pending
                    </span>
                    <p class="mt-1 text-sm text-gray-500">Nov 10 - Nov 15, 2023</p>
                  </div>
                </div>
              </div>
              <div class="px-6 py-4">
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/32.jpg" alt="Guest">
                    <div class="ml-3">
                      <p class="text-sm font-medium text-gray-900">Sophia Chen</p>
                      <p class="text-sm text-gray-500">Riad Elegance</p>
                    </div>
                  </div>
                  <div class="flex flex-col items-end">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                      Confirmed
                    </span>
                    <p class="mt-1 text-sm text-gray-500">Oct 22 - Oct 25, 2023</p>
                  </div>
                </div>
              </div>
              <div class="px-6 py-4">
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/42.jpg" alt="Guest">
                    <div class="ml-3">
                      <p class="text-sm font-medium text-gray-900">Michael Davis</p>
                      <p class="text-sm text-gray-500">Kasbah Retreat</p>
                    </div>
                  </div>
                  <div class="flex flex-col items-end">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                      Confirmed
                    </span>
                    <p class="mt-1 text-sm text-gray-500">Oct 28 - Nov 2, 2023</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Tasks and reminders -->
          <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
              <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800">Tasks & Reminders</h3>
                <button class="text-sm font-medium text-teal-600 hover:text-teal-500">Add New</button>
              </div>
            </div>
            <div class="divide-y divide-gray-200">
              <div class="px-6 py-4">
                <div class="flex items-center">
                  <input type="checkbox" class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded">
                  <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">Respond to guest inquiries</p>
                    <p class="text-sm text-gray-500">Due today</p>
                  </div>
                  <span class="ml-auto inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                    Urgent
                  </span>
                </div>
              </div>
              <div class="px-6 py-4">
                <div class="flex items-center">
                  <input type="checkbox" class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded">
                  <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">Update room availability</p>
                    <p class="text-sm text-gray-500">Due tomorrow</p>
                  </div>
                  <span class="ml-auto inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                    Important
                  </span>
                </div>
              </div>
              <div class="px-6 py-4">
                <div class="flex items-center">
                  <input type="checkbox" class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded">
                  <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">Schedule maintenance for Room 204</p>
                    <p class="text-sm text-gray-500">Due Oct 20, 2023</p>
                  </div>
                  <span class="ml-auto inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                    Maintenance
                  </span>
                </div>
              </div>
              <div class="px-6 py-4">
                <div class="flex items-center">
                  <input type="checkbox" class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded">
                  <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">Review monthly financial report</p>
                    <p class="text-sm text-gray-500">Due Oct 31, 2023</p>
                  </div>
                  <span class="ml-auto inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                    Finance
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Recent reviews -->
        <div class="mt-6 bg-white rounded-lg shadow-sm overflow-hidden">
          <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
              <h3 class="text-lg font-semibold text-gray-800">Recent Reviews</h3>
              <a href="owner-reviews.html" class="text-sm font-medium text-teal-600 hover:text-teal-500">View all</a>
            </div>
          </div>
          <div class="divide-y divide-gray-200">
            <div class="px-6 py-4">
              <div class="flex items-start">
                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Reviewer">
                <div class="ml-3 flex-1">
                  <div class="flex items-center justify-between">
                    <div>
                      <p class="text-sm font-medium text-gray-900">Sarah Johnson</p>
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
                    Exceptional stay in the heart of Marrakech! The staff was incredibly attentive and helpful, the room was spacious and beautifully decorated.
                  </p>
                  <div class="mt-2 flex space-x-2">
                    <button class="inline-flex items-center px-2 py-1 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                      <i class="fas fa-reply mr-1"></i> Reply
                    </button>
                    <button class="inline-flex items-center px-2 py-1 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                      <i class="fas fa-thumbs-up mr-1"></i> Thank
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="px-6 py-4">
              <div class="flex items-start">
                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="Reviewer">
                <div class="ml-3 flex-1">
                  <div class="flex items-center justify-between">
                    <div>
                      <p class="text-sm font-medium text-gray-900">Mohammed Ali</p>
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
                    Great location and beautiful property. The rooms are comfortable and the traditional architecture is stunning. The only minor issue was the WiFi.
                  </p>
                  <div class="mt-2 flex space-x-2">
                    <button class="inline-flex items-center px-2 py-1 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                      <i class="fas fa-reply mr-1"></i> Reply
                    </button>
                    <button class="inline-flex items-center px-2 py-1 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                      <i class="fas fa-thumbs-up mr-1"></i> Thank
                    </button>
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

    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(revenueCtx, {
      type: 'line',
      data: {
        labels: ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Revenue',
          data: [4200, 5100, 5800, 8100, 7200, 9500],
          backgroundColor: 'rgba(13, 148, 136, 0.1)',
          borderColor: 'rgba(13, 148, 136, 1)',
          borderWidth: 2,
          tension: 0.4,
          fill: true
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: function(value) {
                return '$' + value;
              }
            }
          }
        },
        plugins: {
          legend: {
            display: false
          }
        }
      }
    });

    // Occupancy Chart
    const occupancyCtx = document.getElementById('occupancyChart').getContext('2d');
    const occupancyChart = new Chart(occupancyCtx, {
      type: 'bar',
      data: {
        labels: ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Occupancy Rate',
          data: [65, 72, 78, 75, 68, 80],
          backgroundColor: 'rgba(124, 58, 237, 0.7)',
          borderRadius: 4
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            beginAtZero: true,
            max: 100,
            ticks: {
              callback: function(value) {
                return value + '%';
              }
            }
          }
        },
        plugins: {
          legend: {
            display: false
          }
        }
      }
    });
  </script>
</body>
</html>