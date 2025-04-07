<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile - StayEase</title>
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

  <div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-8">
      <!-- Sidebar Navigation -->
      <div class="w-full md:w-1/4">
        <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
          <nav class="space-y-1">
            <a href="dashboard.html" class="flex items-center px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
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
            <a href="profile.html" class="flex items-center px-3 py-2 rounded-md text-sm font-medium bg-teal-50 text-teal-700">
              <i class="fas fa-user mr-3"></i>
              Profile
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
      </div>
      
      <!-- Main Content -->
      <div class="w-full md:w-3/4">
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
          <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">My Profile</h1>
            <button id="edit-profile-btn" class="mt-4 md:mt-0 bg-teal-600 hover:bg-teal-700 text-white py-2 px-4 rounded-md font-medium">
              Edit Profile
            </button>
          </div>
          
          <div class="flex flex-col md:flex-row gap-8">
            <!-- Profile Photo -->
            <div class="md:w-1/3 flex flex-col items-center">
              <div class="relative w-40 h-40 rounded-full overflow-hidden mb-4">
                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User profile" class="w-full h-full object-cover" />
              </div>
              
              <div class="text-center">
                <h2 class="text-xl font-semibold text-gray-800">Sarah Johnson</h2>
                <p class="text-gray-600 text-sm">Member since October 2022</p>
                
                <div class="flex justify-center space-x-2 mt-4">
                  <div class="bg-teal-50 px-3 py-1 rounded-full">
                    <span class="text-xs font-medium text-teal-700">Gold Member</span>
                  </div>
                  <div class="bg-blue-50 px-3 py-1 rounded-full">
                    <span class="text-xs font-medium text-blue-700">15 Bookings</span>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Profile Information -->
            <div class="md:w-2/3">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <h3 class="text-sm font-medium text-gray-500">Full Name</h3>
                  <p class="mt-1 text-gray-800">Sarah Johnson</p>
                </div>
                
                <div>
                  <h3 class="text-sm font-medium text-gray-500">Email Address</h3>
                  <p class="mt-1 text-gray-800">sarah.johnson@example.com</p>
                </div>
                
                <div>
                  <h3 class="text-sm font-medium text-gray-500">Phone Number</h3>
                  <p class="mt-1 text-gray-800">+1 (555) 123-4567</p>
                </div>
                
                <div>
                  <h3 class="text-sm font-medium text-gray-500">Date of Birth</h3>
                  <p class="mt-1 text-gray-800">April 15, 1985</p>
                </div>
                
                <div>
                  <h3 class="text-sm font-medium text-gray-500">Country</h3>
                  <p class="mt-1 text-gray-800">United States</p>
                </div>
                
                <div>
                  <h3 class="text-sm font-medium text-gray-500">City</h3>
                  <p class="mt-1 text-gray-800">New York</p>
                </div>
                
                <div>
                  <h3 class="text-sm font-medium text-gray-500">Address</h3>
                  <p class="mt-1 text-gray-800">123 Broadway St, Apt 4B</p>
                </div>
                
                <div>
                  <h3 class="text-sm font-medium text-gray-500">Zip Code</h3>
                  <p class="mt-1 text-gray-800">10001</p>
                </div>
              </div>
              
              <div class="mt-6">
                <h3 class="text-sm font-medium text-gray-500">About Me</h3>
                <p class="mt-1 text-gray-800">
                  Passionate traveler and food enthusiast. I love exploring new cultures and experiencing local cuisines. Always looking for unique accommodations that provide authentic experiences.
                </p>
              </div>
              
              <div class="mt-6">
                <h3 class="text-sm font-medium text-gray-500">Travel Preferences</h3>
                <div class="mt-2 flex flex-wrap gap-2">
                  <span class="bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">Beach Resorts</span>
                  <span class="bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">Cultural Experiences</span>
                  <span class="bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">Boutique Hotels</span>
                  <span class="bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">Food Tours</span>
                  <span class="bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">Adventure Travel</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Edit Profile Form (hidden by default) -->
        <div id="edit-profile-form" class="bg-white rounded-xl shadow-sm p-6 mb-8 hidden">
          <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Edit Profile</h2>
            <button id="cancel-edit-btn" class="text-gray-600 hover:text-gray-800">
              <i class="fas fa-times"></i>
            </button>
          </div>
          
          <form>
            <div class="mb-6">
              <div class="flex flex-col items-center">
                <div class="relative w-32 h-32 rounded-full overflow-hidden mb-4">
                  <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User profile" class="w-full h-full object-cover" />
                  <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                    <button type="button" class="text-white">
                      <i class="fas fa-camera"></i>
                      <span class="ml-1">Change</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                <input 
                  type="text" 
                  id="firstName" 
                  name="firstName" 
                  value="Sarah" 
                  class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                />
              </div>
              
              <div>
                <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input 
                  type="text" 
                  id="lastName" 
                  name="lastName" 
                  value="Johnson" 
                  class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                />
              </div>
              
              <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input 
                  type="email" 
                  id="email" 
                  name="email" 
                  value="sarah.johnson@example.com" 
                  class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                />
              </div>
              
              <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input 
                  type="tel" 
                  id="phone" 
                  name="phone" 
                  value="+1 (555) 123-4567" 
                  class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                />
              </div>
              
              <div>
                <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                <input 
                  type="date" 
                  id="dob" 
                  name="dob" 
                  value="1985-04-15" 
                  class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                />
              </div>
              
              <div>
                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                <select 
                  id="country" 
                  name="country" 
                  class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                >
                  <option value="us" selected>United States</option>
                  <option value="ca">Canada</option>
                  <option value="uk">United Kingdom</option>
                  <option value="au">Australia</option>
                  <option value="fr">France</option>
                </select>
              </div>
              
              <div>
                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                <input 
                  type="text" 
                  id="city" 
                  name="city" 
                  value="New York" 
                  class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                />
              </div>
              
              <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input 
                  type="text" 
                  id="address" 
                  name="address" 
                  value="123 Broadway St, Apt 4B" 
                  class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                />
              </div>
              
              <div>
                <label for="zipCode" class="block text-sm font-medium text-gray-700">Zip Code</label>
                <input 
                  type="text" 
                  id="zipCode" 
                  name="zipCode" 
                  value="10001" 
                  class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                />
              </div>
            </div>
            
            <div class="mt-6">
              <label for="aboutMe" class="block text-sm font-medium text-gray-700">About Me</label>
              <textarea 
                id="aboutMe" 
                name="aboutMe" 
                rows="4" 
                class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
              >Passionate traveler and food enthusiast. I love exploring new cultures and experiencing local cuisines. Always looking for unique accommodations that provide authentic experiences.</textarea>
            </div>
            
            <div class="mt-6">
              <label class="block text-sm font-medium text-gray-700">Travel Preferences</label>
              <div class="mt-2 space-y-2">
                <div class="flex items-center">
                  <input 
                    type="checkbox" 
                    id="beach" 
                    name="preferences" 
                    value="beach" 
                    checked 
                    class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded"
                  />
                  <label for="beach" class="ml-2 text-sm text-gray-700">Beach Resorts</label>
                </div>
                <div class="flex items-center">
                  <input 
                    type="checkbox" 
                    id="cultural" 
                    name="preferences" 
                    value="cultural" 
                    checked 
                    class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded"
                  />
                  <label for="cultural" class="ml-2 text-sm text-gray-700">Cultural Experiences</label>
                </div>
                <div class="flex items-center">
                  <input 
                    type="checkbox" 
                    id="boutique" 
                    name="preferences" 
                    value="boutique" 
                    checked 
                    class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded"
                  />
                  <label for="boutique" class="ml-2 text-sm text-gray-700">Boutique Hotels</label>
                </div>
                <div class="flex items-center">
                  <input 
                    type="checkbox" 
                    id="food" 
                    name="preferences" 
                    value="food" 
                    checked 
                    class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded"
                  />
                  <label for="food" class="ml-2 text-sm text-gray-700">Food Tours</label>
                </div>
                <div class="flex items-center">
                  <input 
                    type="checkbox" 
                    id="adventure" 
                    name="preferences" 
                    value="adventure" 
                    checked 
                    class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded"
                  />
                  <label for="adventure" class="ml-2 text-sm text-gray-700">Adventure Travel</label>
                </div>
                <div class="flex items-center">
                  <input 
                    type="checkbox" 
                    id="luxury" 
                    name="preferences" 
                    value="luxury" 
                    class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded"
                  />
                  <label for="luxury" class="ml-2 text-sm text-gray-700">Luxury Resorts</label>
                </div>
              </div>
            </div>
            
            <div class="mt-8 flex justify-end space-x-4">
              <button 
                type="button" 
                id="cancel-edit-btn-2" 
                class="border border-gray-300 hover:bg-gray-50 text-gray-700 py-2 px-4 rounded-md font-medium"
              >
                Cancel
              </button>
              <button 
                type="submit" 
                class="bg-teal-600 hover:bg-teal-700 text-white py-2 px-4 rounded-md font-medium"
              >
                Save Changes
              </button>
            </div>
          </form>
        </div>
        
        <!-- Account Security -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
          <h2 class="text-xl font-semibold text-gray-800 mb-6">Account Security</h2>
          
          <div class="space-y-6">
            <div class="flex justify-between items-center">
              <div>
                <h3 class="font-medium text-gray-800">Password</h3>
                <p class="text-sm text-gray-600">Last changed 3 months ago</p>
              </div>
              <button class="text-teal-600 hover:text-teal-700 font-medium">Change Password</button>
            </div>
            
            <div class="flex justify-between items-center">
              <div>
                <h3 class="font-medium text-gray-800">Two-Factor Authentication</h3>
                <p class="text-sm text-gray-600">Add an extra layer of security to your account</p>
              </div>
              <button class="text-teal-600 hover:text-teal-700 font-medium">Enable</button>
            </div>
            
            <div class="flex justify-between items-center">
              <div>
                <h3 class="font-medium text-gray-800">Connected Accounts</h3>
                <p class="text-sm text-gray-600">Manage your connected social accounts</p>
              </div>
              <button class="text-teal-600 hover:text-teal-700 font-medium">Manage</button>
            </div>
            
            <div class="flex justify-between items-center">
              <div>
                <h3 class="font-medium text-gray-800">Login History</h3>
                <p class="text-sm text-gray-600">View your recent login activity</p>
              </div>
              <button class="text-teal-600 hover:text-teal-700 font-medium">View</button>
            </div>
          </div>
        </div>
        
        <!-- Notification Preferences -->
        <div class="bg-white rounded-xl shadow-sm p-6">
          <h2 class="text-xl font-semibold text-gray-800 mb-6">Notification Preferences</h2>
          
          <div class="space-y-6">
            <div class="flex items-center justify-between">
              <div>
                <h3 class="font-medium text-gray-800">Email Notifications</h3>
                <p class="text-sm text-gray-600">Receive booking confirmations, updates, and offers</p>
              </div>
              <div class="relative inline-block w-12 h-6">
                <input type="checkbox" id="email-toggle" class="sr-only" checked />
                <label for="email-toggle" class="block h-6 w-12 rounded-full bg-teal-600 cursor-pointer"></label>
                <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform transform translate-x-6"></div>
              </div>
            </div>
            
            <div class="flex items-center justify-between">
              <div>
                <h3 class="font-medium text-gray-800">SMS Notifications</h3>
                <p class="text-sm text-gray-600">Receive text messages for booking updates</p>
              </div>
              <div class="relative inline-block w-12 h-6">
                <input type="checkbox" id="sms-toggle" class="sr-only" />
                <label for="sms-toggle" class="block h-6 w-12 rounded-full bg-gray-300 cursor-pointer"></label>
                <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform"></div>
              </div>
            </div>
            
            <div class="flex items-center justify-between">
              <div>
                <h3 class="font-medium text-gray-800">Marketing Emails</h3>
                <p class="text-sm text-gray-600">Receive special offers and promotions</p>
              </div>
              <div class="relative inline-block w-12 h-6">
                <input type="checkbox" id="marketing-toggle" class="sr-only" checked />
                <label for="marketing-toggle" class="block h-6 w-12 rounded-full bg-teal-600 cursor-pointer"></label>
                <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform transform translate-x-6"></div>
              </div>
            </div>
            
            <div class="flex items-center justify-between">
              <div>
                <h3 class="font-medium text-gray-800">Travel Tips & Guides</h3>
                <p class="text-sm text-gray-600">Receive travel inspiration and destination guides</p>
              </div>
              <div class="relative inline-block w-12 h-6">
                <input type="checkbox" id="tips-toggle" class="sr-only" checked />
                <label for="tips-toggle" class="block h-6 w-12 rounded-full bg-teal-600 cursor-pointer"></label>
                <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform transform translate-x-6"></div>
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
                Terms of Service  class="text-gray-400 hover:text-teal-500 transition-colors">
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

    // Edit profile form toggle
    document.getElementById('edit-profile-btn').addEventListener('click', function() {
      document.getElementById('edit-profile-form').classList.remove('hidden');
    });

    document.getElementById('cancel-edit-btn').addEventListener('click', function() {
      document.getElementById('edit-profile-form').classList.add('hidden');
    });

    document.getElementById('cancel-edit-btn-2').addEventListener('click', function() {
      document.getElementById('edit-profile-form').classList.add('hidden');
    });

    // Toggle switches
    const toggles = document.querySelectorAll('input[type="checkbox"]');
    toggles.forEach(toggle => {
      toggle.addEventListener('change', function() {
        const dot = this.nextElementSibling.nextElementSibling;
        const label = this.nextElementSibling;
        
        if (this.checked) {
          dot.classList.add('translate-x-6');
          label.classList.remove('bg-gray-300');
          label.classList.add('bg-teal-600');
        } else {
          dot.classList.remove('translate-x-6');
          label.classList.remove('bg-teal-600');
          label.classList.add('bg-gray-300');
        }
      });
    });

    // Set current year in footer
    document.getElementById('current-year').textContent = new Date().getFullYear();
  </script>
</body>
</html>