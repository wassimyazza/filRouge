<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings - StayEase</title>
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
            <a href="owner-profile.html" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <i class="fas fa-user mr-3 text-gray-400"></i>
              Profile
            </a>
            <a href="owner-settings.html" class="flex items-center px-2 py-2 text-sm font-medium text-white bg-gray-700 rounded-md group">
              <i class="fas fa-cog mr-3 text-gray-300"></i>
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
            <a href="owner-profile.html" class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
              <i class="fas fa-user mr-3 text-gray-400"></i>
              Profile
            </a>
            <a href="owner-settings.html" class="flex items-center px-2 py-2 text-base font-medium text-white bg-gray-700 rounded-md">
              <i class="fas fa-cog mr-3 text-gray-300"></i>
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
            <h1 class="text-xl font-semibold text-gray-900 ml-2 md:ml-0">Settings</h1>
          </div>
        </div>
      </header>

      <!-- Main content area -->
      <main class="flex-1 overflow-y-auto bg-gray-50 p-4 sm:p-6 lg:p-8">
        <div class="max-w-4xl mx-auto">
          <!-- Settings navigation -->
          <div class="bg-white rounded-lg shadow-sm mb-6">
            <div class="sm:hidden">
              <select id="settings-tabs-mobile" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                <option value="account">Account Settings</option>
                <option value="notifications">Notifications</option>
                <option value="privacy">Privacy & Security</option>
                <option value="payment">Payment Methods</option>
                <option value="preferences">Preferences</option>
              </select>
            </div>
            <div class="hidden sm:block">
              <div class="border-b border-gray-200">
                <nav class="flex -mb-px" aria-label="Tabs">
                  <a href="#" class="border-teal-500 text-teal-600 whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm" aria-current="page">
                    Account Settings
                  </a>
                  <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm">
                    Notifications
                  </a>
                  <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm">
                    Privacy & Security
                  </a>
                  <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm">
                    Payment Methods
                  </a>
                  <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm">
                    Preferences
                  </a>
                </nav>
              </div>
            </div>
          </div>

          <!-- Account Settings -->
          <div class="space-y-6">
            <!-- Profile Information -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
              <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Profile Information</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Update your personal information and how it appears on your profile.</p>
              </div>
              <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                <form class="space-y-6">
                  <div class="flex items-center">
                    <div class="flex-shrink-0">
                      <img class="h-16 w-16 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="User avatar">
                    </div>
                    <div class="ml-4">
                      <div class="flex space-x-3">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                          Change
                        </button>
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                          Remove
                        </button>
                      </div>
                      <p class="mt-1 text-xs text-gray-500">JPG, GIF or PNG. 1MB max.</p>
                    </div>
                  </div>

                  <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                      <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                      <div class="mt-1">
                        <input type="text" name="first-name" id="first-name" autocomplete="given-name" value="Ahmed" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                      </div>
                    </div>

                    <div class="sm:col-span-3">
                      <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                      <div class="mt-1">
                        <input type="text" name="last-name" id="last-name" autocomplete="family-name" value="Malik" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                      </div>
                    </div>

                    <div class="sm:col-span-6">
                      <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                      <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" value="ahmed.malik@example.com" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                      </div>
                    </div>

                    <div class="sm:col-span-6">
                      <label for="phone" class="block text-sm font-medium text-gray-700">Phone number</label>
                      <div class="mt-1">
                        <input type="text" name="phone" id="phone" autocomplete="tel" value="+212 612 345 678" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                      </div>
                    </div>

                    <div class="sm:col-span-6">
                      <label for="about" class="block text-sm font-medium text-gray-700">About</label>
                      <div class="mt-1">
                        <textarea id="about" name="about" rows="4" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">Experienced hospitality professional with over 15 years in the industry. I own and manage several properties in Marrakech, including luxury hotels, traditional riads, and modern apartments. My goal is to provide authentic Moroccan experiences with world-class hospitality.</textarea>
                      </div>
                      <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p>
                    </div>
                  </div>

                  <div class="flex justify-end">
                    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                      Cancel
                    </button>
                    <button type="submit" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                      Save
                    </button>
                  </div>
                </form>
              </div>
            </div>

            <!-- Password -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
              <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Password</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Update your password to keep your account secure.</p>
              </div>
              <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                <form class="space-y-6">
                  <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-6">
                      <label for="current-password" class="block text-sm font-medium text-gray-700">Current password</label>
                      <div class="mt-1">
                        <input id="current-password" name="current-password" type="password" autocomplete="current-password" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                      </div>
                    </div>

                    <div class="sm:col-span-3">
                      <label for="new-password" class="block text-sm font-medium text-gray-700">New password</label>
                      <div class="mt-1">
                        <input id="new-password" name="new-password" type="password" autocomplete="new-password" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                      </div>
                    </div>

                    <div class="sm:col-span-3">
                      <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm password</label>
                      <div class="mt-1">
                        <input id="confirm-password" name="confirm-password" type="password" autocomplete="new-password" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                      </div>
                    </div>
                  </div>

                  <div class="flex justify-end">
                    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                      Cancel
                    </button>
                    <button type="submit" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                      Update Password
                    </button>
                  </div>
                </form>
              </div>
            </div>

            <!-- Two-Factor Authentication -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
              <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Two-Factor Authentication</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Add an extra layer of security to your account.</p>
              </div>
              <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                <div class="flex items-start">
                  <div class="flex-shrink-0">
                    <div class="bg-gray-200 rounded-full p-2">
                      <i class="fas fa-shield-alt text-gray-500"></i>
                    </div>
                  </div>
                  <div class="ml-3 flex-1">
                    <h4 class="text-sm font-medium text-gray-900">Two-factor authentication is currently disabled</h4>
                    <p class="mt-1 text-sm text-gray-500">
                      Two-factor authentication adds an extra layer of security to your account by requiring more than just a password to sign in.
                    </p>
                    <div class="mt-3">
                      <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                        Enable Two-Factor Authentication
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Language and Region -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
              <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Language and Region</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Set your preferred language and regional settings.</p>
              </div>
              <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                <form class="space-y-6">
                  <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                      <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                      <div class="mt-1">
                        <select id="language" name="language" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                          <option value="en" selected>English</option>
                          <option value="fr">French</option>
                          <option value="ar">Arabic</option>
                          <option value="es">Spanish</option>
                          <option value="de">German</option>
                        </select>
                      </div>
                    </div>

                    <div class="sm:col-span-3">
                      <label for="currency" class="block text-sm font-medium text-gray-700">Currency</label>
                      <div class="mt-1">
                        <select id="currency" name="currency" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                          <option value="usd" selected>USD ($)</option>
                          <option value="eur">EUR (€)</option>
                          <option value="gbp">GBP (£)</option>
                          <option value="mad">MAD (د.م.)</option>
                          <option value="jpy">JPY (¥)</option>
                        </select>
                      </div>
                    </div>

                    <div class="sm:col-span-3">
                      <label for="timezone" class="block text-sm font-medium text-gray-700">Time Zone</label>
                      <div class="mt-1">
                        <select id="timezone" name="timezone" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                          <option value="africa/casablanca" selected>(GMT+01:00) Casablanca</option>
                          <option value="europe/london">(GMT+00:00) London</option>
                          <option value="america/new_york">(GMT-05:00) New York</option>
                          <option value="asia/tokyo">(GMT+09:00) Tokyo</option>
                          <option value="australia/sydney">(GMT+10:00) Sydney</option>
                        </select>
                      </div>
                    </div>

                    <div class="sm:col-span-3">
                      <label for="date-format" class="block text-sm font-medium text-gray-700">Date Format</label>
                      <div class="mt-1">
                        <select id="date-format" name="date-format" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                          <option value="mm/dd/yyyy" selected>MM/DD/YYYY</option>
                          <option value="dd/mm/yyyy">DD/MM/YYYY</option>
                          <option value="yyyy-mm-dd">YYYY-MM-DD</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="flex justify-end">
                    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                      Cancel
                    </button>
                    <button type="submit" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                      Save
                    </button>
                  </div>
                </form>
              </div>
            </div>

            <!-- Delete Account -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
              <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Delete Account</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Permanently delete your account and all of your content.</p>
              </div>
              <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                <div class="text-sm text-gray-500">
                  <p>Once you delete your account, there is no going back. Please be certain.</p>
                </div>
                <div class="mt-5">
                  <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Delete Account
                  </button>
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

    // Mobile settings tabs
    document.getElementById('settings-tabs-mobile').addEventListener('change', function() {
      // In a real app, this would switch between tabs
      console.log('Selected tab:', this.value);
    });
  </script>
</body>
</html>