<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Confirmation - StayEase</title>
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

  <!-- Booking Steps -->
  <div class="bg-teal-700 py-6">
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-center">
        <div class="flex items-center">
          <div class="flex items-center justify-center w-10 h-10 rounded-full bg-teal-600 text-white">
            <i class="fas fa-check"></i>
          </div>
          <div class="ml-3">
            <p class="text-sm font-medium text-white">Hotel Selection</p>
          </div>
          <div class="flex-1 h-0.5 mx-4 bg-teal-600" style="width: 80px"></div>
        </div>
        
        <div class="flex items-center">
          <div class="flex items-center justify-center w-10 h-10 rounded-full bg-teal-600 text-white">
            <i class="fas fa-check"></i>
          </div>
          <div class="ml-3">
            <p class="text-sm font-medium text-white">Booking Details</p>
          </div>
          <div class="flex-1 h-0.5 mx-4 bg-teal-600" style="width: 80px"></div>
        </div>
        
        <div class="flex items-center">
          <div class="flex items-center justify-center w-10 h-10 rounded-full bg-teal-600 text-white">
            <span>3</span>
          </div>
          <div class="ml-3">
            <p class="text-sm font-medium text-white">Confirmation</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mx-auto px-4 py-12">
    <div class="max-w-3xl mx-auto">
      <!-- Success Message -->
      <div class="bg-white rounded-xl shadow-sm p-8 mb-8 text-center">
        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
          <i class="fas fa-check text-3xl text-green-600"></i>
        </div>
        
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Booking Confirmed!</h1>
        <p class="text-gray-600 mb-6">
          Your booking at Luxury Palace Hotel has been successfully confirmed. We've sent a confirmation email to <span class="font-medium">sarah.johnson@example.com</span>
        </p>
        
        <div class="inline-block bg-teal-50 px-4 py-2 rounded-lg mb-6">
          <div class="flex items-center">
            <i class="fas fa-receipt text-teal-600 mr-2"></i>
            <span class="font-medium text-teal-700">Booking Reference: BK12345</span>
          </div>
        </div>
        
        <div class="flex flex-col sm:flex-row justify-center gap-4">
          <a href="bookings.html" class="bg-teal-600 hover:bg-teal-700 text-white py-3 px-6 rounded-md font-medium">
            View My Bookings
          </a>
          <a href="index.html" class="border border-gray-300 hover:bg-gray-50 text-gray-700 py-3 px-6 rounded-md font-medium">
            Return to Home
          </a>
        </div>
      </div>
      
      <!-- Booking Details -->
      <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">Booking Details</h2>
        
        <div class="flex flex-col md:flex-row gap-6 mb-6">
          <div class="md:w-1/3">
            <img 
              src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
              alt="Luxury Palace Hotel" 
              class="w-full h-40 object-cover rounded-lg"
            />
          </div>
          
          <div class="md:w-2/3">
            <h3 class="text-lg font-semibold text-gray-800">Luxury Palace Hotel</h3>
            <div class="flex items-center text-gray-600 mt-1 mb-3">
              <i class="fas fa-map-marker-alt mr-1"></i>
              <span>Medina, Marrakech, Morocco</span>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
              <div>
                <p class="text-sm text-gray-500">Check-in</p>
                <p class="font-medium">Oct 15, 2023</p>
                <p class="text-sm text-gray-600">From 2:00 PM</p>
              </div>
              
              <div>
                <p class="text-sm text-gray-500">Check-out</p>
                <p class="font-medium">Oct 18, 2023</p>
                <p class="text-sm text-gray-600">Until 12:00 PM</p>
              </div>
              
              <div>
                <p class="text-sm text-gray-500">Guests</p>
                <p class="font-medium">2 Adults</p>
                <p class="text-sm text-gray-600">1 Room</p>
              </div>
            </div>
          </div>
        </div>
        
        <div class="border-t border-gray-200 pt-6">
          <h3 class="text-lg font-semibold text-gray-800 mb-4">Price Details</h3>
          
          <div class="space-y-2 mb-4">
            <div class="flex justify-between">
              <span class="text-gray-700">$120 x 3 nights</span>
              <span class="text-gray-700">$360</span>
            </div>
            
            <div class="flex justify-between">
              <span class="text-gray-700">Taxes and fees</span>
              <span class="text-gray-700">$40</span>
            </div>
            
            <div class="flex justify-between text-green-600">
              <span>Special discount</span>
              <span>-$30</span>
            </div>
          </div>
          
          <div class="border-t border-gray-200 pt-4 flex justify-between font-semibold">
            <span class="text-gray-800">Total amount paid</span>
            <span class="text-gray-800">$370</span>
          </div>
        </div>
      </div>
      
      <!-- Guest Information -->
      <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">Guest Information</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <p class="text-sm text-gray-500">Full Name</p>
            <p class="font-medium">Sarah Johnson</p>
          </div>
          
          <div>
            <p class="text-sm text-gray-500">Email</p>
            <p class="font-medium">sarah.johnson@example.com</p>
          </div>
          
          <div>
            <p class="text-sm text-gray-500">Phone</p>
            <p class="font-medium">+1 (555) 123-4567</p>
          </div>
          
          <div>
            <p class="text-sm text-gray-500">Country</p>
            <p class="font-medium">United States</p>
          </div>
        </div>
        
        <div class="mt-6">
          <p class="text-sm text-gray-500">Special Requests</p>
          <p class="font-medium">Room with a view of the mountains if possible. Early check-in requested.</p>
        </div>
      </div>
      
      <!-- Important Information -->
      <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">Important Information</h2>
        
        <div class="space-y-4">
          <div class="flex items-start">
            <i class="fas fa-info-circle text-teal-600 mt-1 mr-3"></i>
            <div>
              <h3 class="font-medium text-gray-800">Hotel Policies</h3>
              <p class="text-gray-600">Free cancellation until October 13, 2023. After that, you will be charged the first night's rate.</p>
            </div>
          </div>
          
          <div class="flex items-start">
            <i class="fas fa-credit-card text-teal-600 mt-1 mr-3"></i>
            <div>
              <h3 class="font-medium text-gray-800">Payment Information</h3>
              <p class="text-gray-600">Your payment has been processed successfully. You will be charged the total amount upon check-in.</p>
            </div>
          </div>
          
          <div class="flex items-start">
            <i class="fas fa-map-marked-alt text-teal-600 mt-1 mr-3"></i>
            <div>
              <h3 class="font-medium text-gray-800">Getting There</h3>
              <p class="text-gray-600">The hotel is located 7 km from Marrakech Menara Airport. Airport shuttle service is available for an additional fee.</p>
            </div>
          </div>
          
          <div class="flex items-start">
            <i class="fas fa-phone-alt text-teal-600 mt-1 mr-3"></i>
            <div>
              <h3 class="font-medium text-gray-800">Contact</h3>
              <p class="text-gray-600">For any questions or changes to your booking, please contact the hotel directly at +212 5XX-XXXXXX or email at info@luxurypalacehotel.com</p>
            </div>
          </div>
        </div>
      </div>
      
      <!-- What's Next -->
      <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">What's Next?</h2>
        
        <div class="space-y-6">
          <div class="flex items-start">
            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-teal-100 text-teal-600 mr-4">
              <span>1</span>
            </div>
            <div>
              <h3 class="font-medium text-gray-800">Save Your Booking Information</h3>
              <p class="text-gray-600">Keep your booking reference number handy for check-in.</p>
            </div>
          </div>
          
          <div class="flex items-start">
            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-teal-100 text-teal-600 mr-4">
              <span>2</span>
            </div>
            <div>
              <h3 class="font-medium text-gray-800">Plan Your Trip</h3>
              <p class="text-gray-600">Explore our <a href="#" class="text-teal-600 hover:underline">travel guides</a> for Marrakech to make the most of your stay.</p>
            </div>
          </div>
          
          <div class="flex items-start">
            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-teal-100 text-teal-600 mr-4">
              <span>3</span>
            </div>
            <div>
              <h3 class="font-medium text-gray-800">Check-in at the Hotel</h3>
              <p class="text-gray-600">Present your booking confirmation and ID at the reception desk.</p>
            </div>
          </div>
        </div>
        
        <div class="mt-8 text-center">
          <a href="#" class="text-teal-600 hover:text-teal-700 font-medium flex items-center justify-center">
            <i class="fas fa-download mr-2"></i>
            Download Booking Confirmation
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white pt-16 pb-8">
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