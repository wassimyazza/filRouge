<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Analytics - StayEase</title>
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
            <a href="owner-analytics.html" class="flex items-center px-2 py-2 text-sm font-medium text-white bg-gray-700 rounded-md group">
              <i class="fas fa-chart-line mr-3 text-gray-300"></i>
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
            <a href="owner-reviews.html" class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
              <i class="fas fa-star mr-3 text-gray-400"></i>
              Reviews
            </a>
            <a href="owner-earnings.html" class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
              <i class="fas fa-money-bill-wave mr-3 text-gray-400"></i>
              Earnings
            </a>
            <a href="owner-analytics.html" class="flex items-center px-2 py-2 text-base font-medium text-white bg-gray-700 rounded-md">
              <i class="fas fa-chart-line mr-3 text-gray-300"></i>
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
            <h1 class="text-xl font-semibold text-gray-900 ml-2 md:ml-0">Analytics</h1>
          </div>
          <div class="flex items-center">
            <button class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
              <i class="fas fa-download mr-2"></i>
              Export Report
            </button>
          </div>
        </div>
      </header>

      <!-- Main content area -->
      <main class="flex-1 overflow-y-auto bg-gray-50 p-4 sm:p-6 lg:p-8">
        <!-- Date range selector -->
        <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
          <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
            <div>
              <h2 class="text-lg font-medium text-gray-900">Performance Analytics</h2>
              <p class="text-sm text-gray-500">Track your properties' performance metrics and trends</p>
            </div>
            <div class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-4">
              <div class="relative">
                <select id="property-filter" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                  <option value="all">All Properties</option>
                  <option value="luxury-palace">Luxury Palace Hotel</option>
                  <option value="riad-elegance">Riad Elegance</option>
                  <option value="mountain-view">Mountain View Resort</option>
                  <option value="kasbah-retreat">Kasbah Retreat</option>
                  <option value="seaside-villa">Seaside Villa</option>
                  <option value="city-center">City Center Apartment</option>
                </select>
              </div>
              <div class="relative">
                <select id="date-range" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                  <option value="last-30-days">Last 30 Days</option>
                  <option value="last-90-days">Last 90 Days</option>
                  <option value="year-to-date">Year to Date</option>
                  <option value="last-year">Last Year</option>
                  <option value="custom">Custom Range</option>
                </select>
              </div>
              <div id="custom-date-range" class="hidden sm:flex sm:items-center sm:space-x-2">
                <input type="date" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                <span class="text-gray-500">to</span>
                <input type="date" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
              </div>
              <button class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                Apply
              </button>
            </div>
          </div>
        </div>

        <!-- Stats cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
          <!-- Occupancy Rate -->
          <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
              <div class="flex-shrink-0 p-3 rounded-md bg-teal-100 text-teal-600">
                <i class="fas fa-bed text-xl"></i>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">Occupancy Rate</dt>
                  <dd>
                    <div class="text-lg font-semibold text-gray-900">78%</div>
                    <div class="flex items-center text-sm text-green-600">
                      <i class="fas fa-arrow-up mr-1"></i>
                      <span>5% from last period</span>
                    </div>
                  </dd>
                </dl>
              </div>
            </div>
          </div>

          <!-- Average Daily Rate -->
          <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
              <div class="flex-shrink-0 p-3 rounded-md bg-blue-100 text-blue-600">
                <i class="fas fa-dollar-sign text-xl"></i>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">Average Daily Rate</dt>
                  <dd>
                    <div class="text-lg font-semibold text-gray-900">$145</div>
                    <div class="flex items-center text-sm text-green-600">
                      <i class="fas fa-arrow-up mr-1"></i>
                      <span>$12 from last period</span>
                    </div>
                  </dd>
                </dl>
              </div>
            </div>
          </div>

          <!-- RevPAR -->
          <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
              <div class="flex-shrink-0 p-3 rounded-md bg-purple-100 text-purple-600">
                <i class="fas fa-chart-line text-xl"></i>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">RevPAR</dt>
                  <dd>
                    <div class="text-lg font-semibold text-gray-900">$113</div>
                    <div class="flex items-center text-sm text-green-600">
                      <i class="fas fa-arrow-up mr-1"></i>
                      <span>15% from last period</span>
                    </div>
                  </dd>
                </dl>
              </div>
            </div>
          </div>

          <!-- Average Length of Stay -->
          <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
              <div class="flex-shrink-0 p-3 rounded-md bg-yellow-100 text-yellow-600">
                <i class="fas fa-calendar-day text-xl"></i>
              </div>
              <div class="ml-5 w-0 flex-1">
                <dl>
                  <dt class="text-sm font-medium text-gray-500 truncate">Avg. Length of Stay</dt>
                  <dd>
                    <div class="text-lg font-semibold text-gray-900">3.5 nights</div>
                    <div class="flex items-center text-sm text-green-600">
                      <i class="fas fa-arrow-up mr-1"></i>
                      <span>0.3 from last period</span>
                    </div>
                  </dd>
                </dl>
              </div>
            </div>
          </div>
        </div>

        <!-- Occupancy & Revenue chart -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-medium text-gray-900">Occupancy & Revenue Trends</h3>
            <div class="relative">
              <select id="chart-period" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
                <option value="monthly" selected>Monthly</option>
              </select>
            </div>
          </div>
          <div class="h-80">
            <canvas id="occupancyRevenueChart"></canvas>
          </div>
        </div>

        <!-- Performance metrics -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
          <!-- Booking Sources -->
          <div class="bg-white rounded-lg shadow-sm p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Booking Sources</h3>
            <div class="h-64">
              <canvas id="bookingSourcesChart"></canvas>
            </div>
          </div>

          <!-- Guest Demographics -->
          <div class="bg-white rounded-lg shadow-sm p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Guest Demographics</h3>
            <div class="h-64">
              <canvas id="guestDemographicsChart"></canvas>
            </div>
          </div>
        </div>

        <!-- Seasonal Analysis -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
          <h3 class="text-lg font-medium text-gray-900 mb-4">Seasonal Analysis</h3>
          <div class="h-80">
            <canvas id="seasonalAnalysisChart"></canvas>
          </div>
        </div>

        <!-- Competitor Analysis -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-medium text-gray-900">Competitor Analysis</h3>
            <div class="relative">
              <select id="competitor-metric" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                <option value="occupancy">Occupancy Rate</option>
                <option value="adr">Average Daily Rate</option>
                <option value="revpar" selected>RevPAR</option>
              </select>
            </div>
          </div>
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Property
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Your Property
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Competitor Avg.
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Difference
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Market Position
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <!-- Property 1 -->
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    Luxury Palace Hotel
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    $125
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    $110
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="text-sm text-green-600">+$15 (13.6%)</span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      Above Average
                    </span>
                  </td>
                </tr>

                <!-- Property 2 -->
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    Riad Elegance
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    $95
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    $105
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="text-sm text-red-600">-$10 (9.5%)</span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                      Below Average
                    </span>
                  </td>
                </tr>

                <!-- Property 3 -->
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    Mountain View Resort
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    $150
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    $135
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="text-sm text-green-600">+$15 (11.1%)</span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      Above Average
                    </span>
                  </td>
                </tr>

                <!-- Property 4 -->
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    Kasbah Retreat
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    $85
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    $90
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="text-sm text-red-600">-$5 (5.6%)</span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                      Slightly Below
                    </span>
                  </td>
                </tr>

                <!-- Property 5 -->
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    City Center Apartment
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    $75
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    $70
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="text-sm text-green-600">+$5 (7.1%)</span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      Above Average
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Insights and Recommendations -->
        <div class="bg-white rounded-lg shadow-sm p-6">
          <h3 class="text-lg font-medium text-gray-900 mb-4">Insights & Recommendations</h3>
          
          <div class="space-y-6">
            <!-- Insight 1 -->
            <div class="flex">
              <div class="flex-shrink-0">
                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-teal-500 text-white">
                  <i class="fas fa-lightbulb"></i>
                </div>
              </div>
              <div class="ml-4">
                <h4 class="text-lg font-medium text-gray-900">Pricing Opportunity</h4>
                <p class="mt-2 text-sm text-gray-500">Your Luxury Palace Hotel and Mountain View Resort are performing well above market average. Consider a 5-10% price increase during peak seasons to maximize revenue without affecting occupancy.</p>
              </div>
            </div>
            
            <!-- Insight 2 -->
            <div class="flex">
              <div class="flex-shrink-0">
                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                  <i class="fas fa-chart-pie"></i>
                </div>
              </div>
              <div class="ml-4">
                <h4 class="text-lg font-medium text-gray-900">Occupancy Improvement</h4>
                <p class="mt-2 text-sm text-gray-500">Riad Elegance is showing below-average RevPAR. Consider running targeted promotions during weekdays to increase occupancy rates without lowering weekend prices.</p>
              </div>
            </div>
            
            <!-- Insight 3 -->
            <div class="flex">
              <div class="flex-shrink-0">
                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-purple-500 text-white">
                  <i class="fas fa-globe"></i>
                </div>
              </div>
              <div class="ml-4">
                <h4 class="text-lg font-medium text-gray-900">Market Expansion</h4>
                <p class="mt-2 text-sm text-gray-500">Your properties are attracting primarily domestic travelers (65%). There's an opportunity to expand marketing efforts to international markets, particularly Europe and North America.</p>
              </div>
            </div>
            
            <!-- Insight 4 -->
            <div class="flex">
              <div class="flex-shrink-0">
                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-yellow-500 text-white">
                  <i class="fas fa-calendar-alt"></i>
                </div>
              </div>
              <div class="ml-4">
                <h4 class="text-lg font-medium text-gray-900">Seasonal Strategy</h4>
                <p class="mt-2 text-sm text-gray-500">Your properties show a significant drop in occupancy during September-November. Consider creating special packages or events during this period to attract more guests.</p>
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

    // Custom date range toggle
    document.getElementById('date-range').addEventListener('change', function() {
      const customDateRange = document.getElementById('custom-date-range');
      if (this.value === 'custom') {
        customDateRange.classList.remove('hidden');
      } else {
        customDateRange.classList.add('hidden');
      }
    });

    // Occupancy & Revenue Chart
    const occupancyRevenueCtx = document.getElementById('occupancyRevenueChart').getContext('2d');
    const occupancyRevenueChart = new Chart(occupancyRevenueCtx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [
          {
            label: 'Occupancy Rate (%)',
            data: [65, 70, 75, 80, 85, 90, 95, 92, 75, 70, 72, 80],
            borderColor: 'rgba(13, 148, 136, 1)',
            backgroundColor: 'rgba(13, 148, 136, 0.1)',
            yAxisID: 'y',
            tension: 0.4,
            fill: true
          },
          {
            label: 'Revenue ($)',
            data: [8000, 9500, 10200, 12000, 14500, 16000, 18000, 17500, 11000, 9800, 10500, 13000],
            borderColor: 'rgba(79, 70, 229, 1)',
            backgroundColor: 'transparent',
            yAxisID: 'y1',
            tension: 0.4
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            type: 'linear',
            display: true,
            position: 'left',
            title: {
              display: true,
              text: 'Occupancy Rate (%)'
            },
            min: 0,
            max: 100
          },
          y1: {
            type: 'linear',
            display: true,
            position: 'right',
            title: {
              display: true,
              text: 'Revenue ($)'
            },
            grid: {
              drawOnChartArea: false
            }
          }
        }
      }
    });

    // Booking Sources Chart
    const bookingSourcesCtx = document.getElementById('bookingSourcesChart').getContext('2d');
    const bookingSourcesChart = new Chart(bookingSourcesCtx, {
      type: 'doughnut',
      data: {
        labels: ['Direct Website', 'StayEase Platform', 'Booking.com', 'Airbnb', 'Expedia', 'Other'],
        datasets: [{
          data: [25, 35, 20, 10, 7, 3],
          backgroundColor: [
            'rgba(13, 148, 136, 0.8)',
            'rgba(79, 70, 229, 0.8)',
            'rgba(245, 158, 11, 0.8)',
            'rgba(239, 68, 68, 0.8)',
            'rgba(16, 185, 129, 0.8)',
            'rgba(107, 114, 128, 0.8)'
          ],
          borderWidth: 0
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              boxWidth: 12
            }
          }
        }
      }
    });

    // Guest Demographics Chart
    const guestDemographicsCtx = document.getElementById('guestDemographicsChart').getContext('2d');
    const guestDemographicsChart = new Chart(guestDemographicsCtx, {
      type: 'bar',
      data: {
        labels: ['Domestic', 'Europe', 'North America', 'Asia', 'Middle East', 'Other'],
        datasets: [{
          label: 'Guest Origin',
          data: [65, 15, 10, 5, 3, 2],
          backgroundColor: 'rgba(13, 148, 136, 0.7)',
          borderRadius: 4
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            title: {
              display: true,
              text: 'Percentage (%)'
            }
          }
        }
      }
    });

    // Seasonal Analysis Chart
    const seasonalAnalysisCtx = document.getElementById('seasonalAnalysisChart').getContext('2d');
    const seasonalAnalysisChart = new Chart(seasonalAnalysisCtx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [
          {
            label: 'This Year',
            data: [65, 70, 75, 80, 85, 90, 95, 92, 75, 70, 72, 80],
            borderColor: 'rgba(13, 148, 136, 1)',
            backgroundColor: 'transparent',
            tension: 0.4
          },
          {
            label: 'Last Year',
            data: [60, 65, 70, 75, 80, 85, 90, 88, 70, 65, 68, 75],
            borderColor: 'rgba(156, 163, 175, 1)',
            backgroundColor: 'transparent',
            tension: 0.4,
            borderDash: [5, 5]
          },
          {
            label: 'Market Average',
            data: [62, 68, 72, 78, 82, 87, 92, 90, 72, 68, 70, 77],
            borderColor: 'rgba(79, 70, 229, 1)',
            backgroundColor: 'transparent',
            tension: 0.4,
            borderDash: [2, 2]
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            beginAtZero: true,
            title: {
              display: true,
              text: 'Occupancy Rate (%)'
            }
          }
        }
      }
    });
  </script>
</body>
</html>