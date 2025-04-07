<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking - StayEase</title>
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
        
        <a href="login.html" class="border border-teal-600 text-teal-600 hover:bg-teal-50 px-4 py-2 rounded-md flex items-center">
          <i class="fas fa-user mr-2"></i>
          Sign In
        </a>
        
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
        <a href="host.html" class="block bg-teal-600 hover:bg-teal-700 text-white py-2 px-4 rounded-md text-center mt-4">Become a Host</a>
      </div>
    </div>
  </header>

  <div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4">
      <!-- Booking Steps -->
      <div class="py-4">
        <div class="flex items-center justify-center">
          <div class="flex items-center">
            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-teal-600 text-white">
              <i class="fas fa-check"></i>
            </div>
            <div class="ml-3">
              <p class="text-sm font-medium text-gray-900">Hotel Selection</p>
            </div>
            <div class="flex-1 h-0.5 mx-4 bg-teal-600" style="width: 80px"></div>
          </div>
          
          <div class="flex items-center">
            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-teal-600 text-white">
              <span>2</span>
            </div>
            <div class="ml-3">
              <p class="text-sm font-medium text-gray-900">Booking Details</p>
            </div>
            <div class="flex-1 h-0.5 mx-4 bg-gray-200" style="width: 80px"></div>
          </div>
          
          <div class="flex items-center">
            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-200 text-gray-600">
              <span>3</span>
            </div>
            <div class="ml-3">
              <p class="text-sm font-medium text-gray-500">Confirmation</p>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-8 flex flex-col lg:flex-row gap-8">
        <!-- Main Content -->
        <div class="w-full lg:w-2/3">
          <!-- Guest Information Form -->
          <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
            <div class="mb-6">
              <h2 class="text-xl font-semibold text-gray-800">Guest Information</h2>
              <p class="text-sm text-gray-600">Please enter the guest details for this booking</p>
            </div>
            
            <form id="guest-form">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                  <label for="firstName" class="text-sm font-medium text-gray-700">
                    First Name *
                  </label>
                  <input 
                    type="text" 
                    id="firstName" 
                    name="firstName" 
                    placeholder="Enter your first name" 
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                  />
                </div>
                
                <div class="space-y-2">
                  <label for="lastName" class="text-sm font-medium text-gray-700">
                    Last Name *
                  </label>
                  <input 
                    type="text" 
                    id="lastName" 
                    name="lastName" 
                    placeholder="Enter your last name" 
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                  />
                </div>
                
                <div class="space-y-2">
                  <label for="email" class="text-sm font-medium text-gray-700">
                    Email Address *
                  </label>
                  <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="Enter your email address" 
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                  />
                  <p class="text-xs text-gray-500">Your booking confirmation will be sent to this email address</p>
                </div>
                
                <div class="space-y-2">
                  <label for="phone" class="text-sm font-medium text-gray-700">
                    Phone Number *
                  </label>
                  <input 
                    type="tel" 
                    id="phone" 
                    name="phone" 
                    placeholder="Enter your phone number" 
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                  />
                </div>
                
                <div class="space-y-2">
                  <label for="country" class="text-sm font-medium text-gray-700">
                    Country/Region *
                  </label>
                  <select 
                    id="country" 
                    name="country" 
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                  >
                    <option value="" disabled selected>Select your country</option>
                    <option value="morocco">Morocco</option>
                    <option value="france">France</option>
                    <option value="uk">United Kingdom</option>
                    <option value="usa">United States</option>
                    <option value="germany">Germany</option>
                    <option value="spain">Spain</option>
                  </select>
                </div>
                
                <div class="space-y-2 md:col-span-2">
                  <label for="specialRequests" class="text-sm font-medium text-gray-700">
                    Special Requests (optional)
                  </label>
                  <textarea 
                    id="specialRequests" 
                    name="specialRequests" 
                    placeholder="Let us know if you have any special requests" 
                    rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                  ></textarea>
                  <p class="text-xs text-gray-500">
                    Special requests cannot be guaranteed but the hotel will do its best to meet your needs
                  </p>
                </div>
                
                <div class="md:col-span-2">
                  <div class="flex items-center space-x-2">
                    <input 
                      type="checkbox" 
                      id="travelingForWork" 
                      name="travelingForWork"
                      class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded"
                    />
                    <label for="travelingForWork" class="text-sm font-medium text-gray-700">
                      I'm traveling for work
                    </label>
                  </div>
                </div>
              </div>
            </form>
          </div>

          <!-- Payment Form -->
          <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
            <div class="mb-6">
              <h2 class="text-xl font-semibold text-gray-800">Payment Details</h2>
              <p class="text-sm text-gray-600">Choose your preferred payment method</p>
            </div>
            
            <form id="payment-form">
              <div class="space-y-4">
                <!-- Credit Card Option -->
                <div class="border rounded-lg p-4 border-teal-600 bg-teal-50">
                  <div class="flex items-center space-x-2">
                    <input 
                      type="radio" 
                      id="credit-card" 
                      name="paymentMethod" 
                      value="credit-card" 
                      checked
                      class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300"
                    />
                    <label for="credit-card" class="flex items-center cursor-pointer">
                      <i class="fas fa-credit-card mr-2 text-gray-600"></i>
                      <span class="font-medium">Credit or Debit Card</span>
                    </label>
                  </div>
                  
                  <div class="mt-4 space-y-4">
                    <div class="space-y-2">
                      <label for="cardNumber" class="text-sm font-medium text-gray-700">
                        Card Number *
                      </label>
                      <input 
                        type="text" 
                        id="cardNumber" 
                        name="cardNumber" 
                        placeholder="1234 5678 9012 3456" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 placeholder:text-gray-400"
                      />
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                      <div class="space-y-2">
                        <label for="expiryDate" class="text-sm font-medium text-gray-700">
                          Expiry Date *
                        </label>
                        <input 
                          type="text" 
                          id="expiryDate" 
                          name="expiryDate" 
                          placeholder="MM/YY" 
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 placeholder:text-gray-400"
                        />
                      </div>
                      
                      <div class="space-y-2">
                        <label for="cvv" class="text-sm font-medium text-gray-700">
                          CVV *
                        </label>
                        <div class="relative">
                          <input 
                            type="text" 
                            id="cvv" 
                            name="cvv" 
                            placeholder="123" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 placeholder:text-gray-400"
                          />
                          <i class="fas fa-lock absolute right-3 top-3 text-gray-400"></i>
                        </div>
                      </div>
                    </div>
                    
                    <div class="space-y-2">
                      <label for="cardholderName" class="text-sm font-medium text-gray-700">
                        Cardholder Name *
                      </label>
                      <input 
                        type="text" 
                        id="cardholderName" 
                        name="cardholderName" 
                        placeholder="Name as it appears on your card" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500 placeholder:text-gray-400"
                      />
                    </div>
                  </div>
                </div>
                
                <!-- Bank Transfer Option -->
                <div class="border rounded-lg p-4 border-gray-200">
                  <div class="flex items-center space-x-2">
                    <input 
                      type="radio" 
                      id="bank-transfer" 
                      name="paymentMethod" 
                      value="bank-transfer"
                      class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300"
                    />
                    <label for="bank-transfer" class="flex items-center cursor-pointer">
                      <i class="fas fa-university mr-2 text-gray-600"></i>
                      <span class="font-medium">Bank Transfer</span>
                    </label>
                  </div>
                  
                  <div class="mt-4 space-y-2 text-sm text-gray-600 hidden" id="bank-transfer-details">
                    <p>You will receive our bank details after booking confirmation.</p>
                    <p>Please make the transfer within 24 hours to secure your booking.</p>
                  </div>
                </div>
              </div>
              
              <div class="mt-6 space-y-4">
                <div class="flex items-center space-x-2">
                  <input 
                    type="checkbox" 
                    id="savePayment" 
                    name="savePayment"
                    class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded"
                  />
                  <label for="savePayment" class="text-sm font-medium text-gray-700">
                    Save this payment method for future bookings
                  </label>
                </div>
                
                <div class="flex items-center space-x-2">
                  <input 
                    type="checkbox" 
                    id="termsAndConditions" 
                    name="termsAndConditions"
                    required
                    class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded"
                  />
                  <label for="termsAndConditions" class="text-sm font-medium text-gray-700">
                    I agree to the 
                    <a href="terms.html" class="text-teal-600 hover:underline">Terms and Conditions</a> 
                    and 
                    <a href="privacy.html" class="text-teal-600 hover:underline">Privacy Policy</a>
                  </label>
                </div>
              </div>
              
              <div class="mt-8">
                <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white py-3 px-4 rounded-md font-medium">
                  Complete Booking
                </button>
              </div>
            </form>
          </div>
        </div>
        
        <!-- Booking Summary -->
        <div class="w-full lg:w-1/3">
          <div class="bg-white rounded-xl shadow-sm p-6 sticky top-20">
            <div class="mb-6">
              <h2 class="text-xl font-semibold text-gray-800">Booking Summary</h2>
              <p class="text-sm text-gray-600">Review your booking details</p>
            </div>
            
            <div class="space-y-6">
              <!-- Hotel Info -->
              <div class="flex space-x-4">
                <div class="relative h-20 w-20 rounded-md overflow-hidden flex-shrink-0">
                  <img 
                    src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                    alt="Luxury Palace Hotel" 
                    class="w-full h-full object-cover"
                  />
                </div>
                
                <div>
                  <h3 class="font-semibold text-gray-800">Luxury Palace Hotel</h3>
                  <p class="text-sm text-gray-600">Medina, Marrakech</p>
                  <div class="flex items-center mt-1">
                    <div class="flex text-yellow-500">
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star-half-alt text-xs"></i>
                    </div>
                    <span class="ml-1 text-xs text-gray-600">4.8</span>
                  </div>
                </div>
              </div>
              
              <hr class="border-gray-200" />
              
              <!-- Booking Details -->
              <div class="space-y-3">
                <div class="flex items-start">
                  <i class="fas fa-calendar text-teal-600 mr-3 mt-0.5"></i>
                  <div>
                    <p class="font-medium text-gray-700">Dates</p>
                    <p class="text-sm text-gray-600">Oct 15, 2023 - Oct 18, 2023</p>
                    <p class="text-sm text-gray-600">3 nights</p>
                  </div>
                </div>
                
                <div class="flex items-start">
                  <i class="fas fa-users text-teal-600 mr-3 mt-0.5"></i>
                  <div>
                    <p class="font-medium text-gray-700">Guests</p>
                    <p class="text-sm text-gray-600">2 adults</p>
                    <p class="text-sm text-gray-600">1 room</p>
                  </div>
                </div>
                
                <div class="flex items-start">
                  <i class="fas fa-clock text-teal-600 mr-3 mt-0.5"></i>
                  <div>
                    <p class="font-medium text-gray-700">Check-in/out</p>
                    <p class="text-sm text-gray-600">Check-in from 2:00 PM</p>
                    <p class="text-sm text-gray-600">Check-out until 12:00 PM</p>
                  </div>
                </div>
              </div>
              
              <hr class="border-gray-200" />
              
              <!-- Price Breakdown -->
              <div class="space-y-2">
                <div class="flex justify-between">
                  <span class="text-gray-700">$120 x 3 nights</span>
                  <span class="text-gray-700">$360</span>
                </div>
                
                <div class="flex justify-between">
                  <span class="text-gray-700">Taxes and fees</span>
                  <span class="text-gray-700">$40</span>
                </div>
                
                <hr class="border-gray-200 my-2" />
                
                <div class="flex justify-between font-semibold">
                  <span class="text-gray-800">Total</span>
                  <span class="text-gray-800">$400</span>
                </div>
                
                <p class="text-xs text-gray-500 mt-1">Includes taxes and fees</p>
              </div>
              
              <hr class="border-gray-200" />
              
              <!-- Cancellation Policy -->
              <div class="space-y-2">
                <h4 class="font-medium text-gray-700">Cancellation Policy</h4>
                <div class="flex items-start">
                  <i class="fas fa-check text-teal-600 mr-2 mt-0.5"></i>
                  <span class="text-sm text-gray-600">Free cancellation until October 13, 2023</span>
                </div>
                <div class="flex items-start">
                  <i class="fas fa-check text-teal-600 mr-2 mt-0.5"></i>
                  <span class="text-sm text-gray-600">After that, you will be charged the first night's rate</span>
                </div>
              </div>
            </div>
          </div>
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

    // Set current year in footer
    document.getElementById('current-year').textContent = new Date().getFullYear();

    // Payment method toggle
    document.querySelectorAll('input[name="paymentMethod"]').forEach(function(radio) {
      radio.addEventListener('change', function() {
        // Hide all payment details sections
        document.getElementById('bank-transfer-details').classList.add('hidden');
        
        // Show the selected payment details section
        if (this.value === 'bank-transfer') {
          document.getElementById('bank-transfer-details').classList.remove('hidden');
        }
      });
    });

    // Form submission
    document.getElementById('payment-form').addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Validate form
      const termsChecked = document.getElementById('termsAndConditions').checked;
      if (!termsChecked) {
        alert('Please agree to the Terms and Conditions to proceed.');
        return;
      }
      
      // In a real app, this would submit the form data to a server
      alert('Booking completed successfully! You will be redirected to the confirmation page.');
      window.location.href = 'booking-confirmation.html';
    });
  </script>
</body>
</html>