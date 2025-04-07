<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Results - StayEase</title>
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

  <!-- Search Header -->
  <div class="bg-teal-700 py-6">
    <div class="container mx-auto px-4">
      <div class="bg-white rounded-xl shadow-lg p-4">
        <form id="search-form" action="search.html" method="get">
          <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div class="relative">
              <i class="fas fa-map-marker-alt absolute left-3 top-3 text-gray-400"></i>
              <input 
                type="text" 
                name="destination" 
                placeholder="Destination" 
                class="w-full pl-10 py-2 bg-gray-50 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                value="Marrakech, Morocco"
              />
            </div>
            
            <div class="relative">
              <i class="far fa-calendar absolute left-3 top-3 text-gray-400"></i>
              <input 
                type="date" 
                name="checkin" 
                class="w-full pl-10 py-2 bg-gray-50 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
              />
            </div>
            
            <div class="relative">
              <i class="far fa-calendar absolute left-3 top-3 text-gray-400"></i>
              <input 
                type="date" 
                name="checkout" 
                class="w-full pl-10 py-2 bg-gray-50 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
              />
            </div>
            
            <div class="relative">
              <i class="fas fa-users absolute left-3 top-3 text-gray-400"></i>
              <select name="guests" class="w-full pl-10 py-2 bg-gray-50 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500">
                <option value="1">1 Guest</option>
                <option value="2" selected>2 Guests</option>
                <option value="3">3 Guests</option>
                <option value="4">4 Guests</option>
                <option value="5">5+ Guests</option>
              </select>
            </div>
            
            <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white py-2 px-4 rounded-md font-medium flex items-center justify-center">
              <i class="fas fa-search mr-2"></i>
              Search
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
      <!-- Filters Sidebar -->
      <div class="w-full lg:w-1/4">
        <div class="bg-white rounded-xl shadow-sm p-6 sticky top-20">
          <h2 class="text-xl font-semibold mb-6">Filters</h2>
          
          <!-- Price Range Filter -->
          <div class="mb-6">
            <h3 class="text-lg font-medium mb-3 flex items-center justify-between">
              <span>Price Range</span>
              <button class="text-sm text-gray-500" id="price-toggle">
                <i class="fas fa-chevron-up"></i>
              </button>
            </h3>
            <div id="price-content">
              <div class="mb-4">
                <input type="range" min="0" max="500" value="300" class="w-full" id="price-slider">
                <div class="flex justify-between mt-2 text-sm text-gray-600">
                  <span>$0</span>
                  <span id="price-value">$300+</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Property Type Filter -->
          <div class="mb-6 border-t pt-6">
            <h3 class="text-lg font-medium mb-3 flex items-center justify-between">
              <span>Property Type</span>
              <button class="text-sm text-gray-500" id="property-toggle">
                <i class="fas fa-chevron-up"></i>
              </button>
            </h3>
            <div id="property-content" class="space-y-3">
              <div class="flex items-center">
                <input type="checkbox" id="hotel" class="mr-2">
                <label for="hotel" class="text-sm font-medium text-gray-700">Hotel</label>
              </div>
              <div class="flex items-center">
                <input type="checkbox" id="resort" class="mr-2">
                <label for="resort" class="text-sm font-medium text-gray-700">Resort</label>
              </div>
              <div class="flex items-center">
                <input type="checkbox" id="apartment" class="mr-2">
                <label for="apartment" class="text-sm font-medium text-gray-700">Apartment</label>
              </div>
              <div class="flex items-center">
                <input type="checkbox" id="villa" class="mr-2">
                <label for="villa" class="text-sm font-medium text-gray-700">Villa</label>
              </div>
              <div class="flex items-center">
                <input type="checkbox" id="guesthouse" class="mr-2">
                <label for="guesthouse" class="text-sm font-medium text-gray-700">Guesthouse</label>
              </div>
            </div>
          </div>
          
          <!-- Amenities Filter -->
          <div class="mb-6 border-t pt-6">
            <h3 class="text-lg font-medium mb-3 flex items-center justify-between">
              <span>Amenities</span>
              <button class="text-sm text-gray-500" id="amenities-toggle">
                <i class="fas fa-chevron-up"></i>
              </button>
            </h3>
            <div id="amenities-content" class="space-y-3">
              <div class="flex items-center">
                <input type="checkbox" id="wifi" class="mr-2">
                <label for="wifi" class="text-sm font-medium text-gray-700">WiFi</label>
              </div>
              <div class="flex items-center">
                <input type="checkbox" id="pool" class="mr-2">
                <label for="pool" class="text-sm font-medium text-gray-700">Swimming Pool</label>
              </div>
              <div class="flex items-center">
                <input type="checkbox" id="parking" class="mr-2">
                <label for="parking" class="text-sm font-medium text-gray-700">Free Parking</label>
              </div>
              <div class="flex items-center">
                <input type="checkbox" id="breakfast" class="mr-2">
                <label for="breakfast" class="text-sm font-medium text-gray-700">Breakfast Included</label>
              </div>
              <div class="flex items-center">
                <input type="checkbox" id="ac" class="mr-2">
                <label for="ac" class="text-sm font-medium text-gray-700">Air Conditioning</label>
              </div>
              <div class="flex items-center">
                <input type="checkbox" id="gym" class="mr-2">
                <label for="gym" class="text-sm font-medium text-gray-700">Fitness Center</label>
              </div>
            </div>
          </div>
          
          <!-- Guest Rating Filter -->
          <div class="mb-6 border-t pt-6">
            <h3 class="text-lg font-medium mb-3 flex items-center justify-between">
              <span>Guest Rating</span>
              <button class="text-sm text-gray-500" id="rating-toggle">
                <i class="fas fa-chevron-up"></i>
              </button>
            </h3>
            <div id="rating-content" class="space-y-3">
              <div class="flex items-center">
                <input type="radio" name="rating" id="rating-any" class="mr-2" checked>
                <label for="rating-any" class="text-sm font-medium text-gray-700">Any</label>
              </div>
              <div class="flex items-center">
                <input type="radio" name="rating" id="rating-3plus" class="mr-2">
                <label for="rating-3plus" class="text-sm font-medium text-gray-700">3+ (Good)</label>
              </div>
              <div class="flex items-center">
                <input type="radio" name="rating" id="rating-4plus" class="mr-2">
                <label for="rating-4plus" class="text-sm font-medium text-gray-700">4+ (Very Good)</label>
              </div>
              <div class="flex items-center">
                <input type="radio" name="rating" id="rating-45plus" class="mr-2">
                <label for="rating-45plus" class="text-sm font-medium text-gray-700">4.5+ (Excellent)</label>
              </div>
            </div>
          </div>
          
          <div class="mt-8 space-y-3">
            <button class="w-full bg-teal-600 hover:bg-teal-700 text-white py-2 px-4 rounded-md font-medium">
              Apply Filters
            </button>
            <button class="w-full border border-gray-300 hover:bg-gray-50 text-gray-700 py-2 px-4 rounded-md font-medium">
              Clear All
            </button>
          </div>
        </div>
      </div>
      
      <!-- Hotel Listings -->
      <div class="w-full lg:w-3/4">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-xl font-semibold">
            5 hotels found in Marrakech
          </h2>
          <div class="flex items-center gap-2">
            <span class="text-sm text-gray-600">Sort by:</span>
            <select class="text-sm border rounded-md p-1">
              <option>Recommended</option>
              <option>Price (low to high)</option>
              <option>Price (high to low)</option>
              <option>Rating (high to low)</option>
            </select>
          </div>
        </div>
        
        <div class="space-y-6">
          <!-- Hotel 1 -->
          <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
            <div class="flex flex-col md:flex-row">
              <div class="relative md:w-1/3 h-64 md:h-auto">
                <img 
                  src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                  alt="Luxury Palace Hotel" 
                  class="w-full h-full object-cover"
                />
                <button class="absolute top-3 right-3 bg-white/80 p-2 rounded-full hover:bg-white transition-colors">
                  <i class="far fa-heart text-gray-600 hover:text-red-500"></i>
                </button>
                <span class="absolute top-3 left-3 bg-teal-600 text-white text-xs px-2 py-1 rounded-full">
                  Featured
                </span>
                <span class="absolute top-3 left-24 bg-orange-500 text-white text-xs px-2 py-1 rounded-full">
                  Special Offer
                </span>
              </div>
              
              <div class="p-6 flex-1 flex flex-col">
                <div class="flex justify-between">
                  <div>
                    <h3 class="text-xl font-semibold text-gray-800 hover:text-teal-600 transition-colors">
                      Luxury Palace Hotel
                    </h3>
                    <div class="flex items-center text-gray-600 mt-1">
                      <i class="fas fa-map-marker-alt mr-1"></i>
                      <span class="text-sm">Medina, Marrakech</span>
                      <span class="mx-2 text-gray-400">•</span>
                      <span class="text-sm">0.5 km from center</span>
                    </div>
                  </div>
                  
                  <div class="flex items-center bg-teal-50 px-2 py-1 rounded">
                    <div class="text-teal-700 font-semibold mr-1">4.8</div>
                    <div class="flex text-yellow-500">
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star-half-alt text-xs"></i>
                    </div>
                  </div>
                </div>
                
                <div class="mt-4 flex flex-wrap gap-2">
                  <div class="flex items-center bg-gray-100 px-2 py-1 rounded text-xs text-gray-700">
                    <i class="fas fa-wifi mr-1"></i>
                    <span>Free WiFi</span>
                  </div>
                  <div class="flex items-center bg-gray-100 px-2 py-1 rounded text-xs text-gray-700">
                    <i class="fas fa-car mr-1"></i>
                    <span>Free Parking</span>
                  </div>
                  <div class="flex items-center bg-gray-100 px-2 py-1 rounded text-xs text-gray-700">
                    <i class="fas fa-coffee mr-1"></i>
                    <span>Breakfast Included</span>
                  </div>
                  <div class="flex items-center bg-gray-100 px-2 py-1 rounded text-xs text-gray-700">
                    <i class="fas fa-snowflake mr-1"></i>
                    <span>Air Conditioning</span>
                  </div>
                </div>
                
                <div class="mt-auto pt-4 flex flex-col sm:flex-row justify-between items-end">
                  <div>
                    <div class="flex items-center">
                      <span class="text-gray-500 line-through text-sm mr-2">$150</span>
                      <span class="text-2xl font-bold text-gray-800">$120</span>
                      <span class="text-gray-600 text-sm ml-1">/ night</span>
                    </div>
                    <div class="text-xs text-gray-500 mt-1">
                      Includes taxes and fees
                    </div>
                  </div>
                  
                  <div class="mt-4 sm:mt-0">
                    <a href="hotel-details.html?id=1" class="bg-teal-600 hover:bg-teal-700 text-white py-2 px-4 rounded-md font-medium">
                      View Details
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Hotel 2 -->
          <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
            <div class="flex flex-col md:flex-row">
              <div class="relative md:w-1/3 h-64 md:h-auto">
                <img 
                  src="https://images.unsplash.com/photo-1582719508461-905c673771fd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                  alt="Riad Elegance" 
                  class="w-full h-full object-cover"
                />
                <button class="absolute top-3 right-3 bg-white/80 p-2 rounded-full hover:bg-white transition-colors">
                  <i class="far fa-heart text-gray-600 hover:text-red-500"></i>
                </button>
              </div>
              
              <div class="p-6 flex-1 flex flex-col">
                <div class="flex justify-between">
                  <div>
                    <h3 class="text-xl font-semibold text-gray-800 hover:text-teal-600 transition-colors">
                      Riad Elegance
                    </h3>
                    <div class="flex items-center text-gray-600 mt-1">
                      <i class="fas fa-map-marker-alt mr-1"></i>
                      <span class="text-sm">Gueliz, Marrakech</span>
                      <span class="mx-2 text-gray-400">•</span>
                      <span class="text-sm">1.2 km from center</span>
                    </div>
                  </div>
                  
                  <div class="flex items-center bg-teal-50 px-2 py-1 rounded">
                    <div class="text-teal-700 font-semibold mr-1">4.6</div>
                    <div class="flex text-yellow-500">
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star-half-alt text-xs"></i>
                    </div>
                  </div>
                </div>
                
                <div class="mt-4 flex flex-wrap gap-2">
                  <div class="flex items-center bg-gray-100 px-2 py-1 rounded text-xs text-gray-700">
                    <i class="fas fa-wifi mr-1"></i>
                    <span>Free WiFi</span>
                  </div>
                  <div class="flex items-center bg-gray-100 px-2 py-1 rounded text-xs text-gray-700">
                    <i class="fas fa-swimming-pool mr-1"></i>
                    <span>Pool</span>
                  </div>
                  <div class="flex items-center bg-gray-100 px-2 py-1 rounded text-xs text-gray-700">
                    <i class="fas fa-snowflake mr-1"></i>
                    <span>Air Conditioning</span>
                  </div>
                </div>
                
                <div class="mt-auto pt-4 flex flex-col sm:flex-row justify-between items-end">
                  <div>
                    <div class="flex items-center">
                      <span class="text-2xl font-bold text-gray-800">$95</span>
                      <span class="text-gray-600 text-sm ml-1">/ night</span>
                    </div>
                    <div class="text-xs text-gray-500 mt-1">
                      Includes taxes and fees
                    </div>
                  </div>
                  
                  <div class="mt-4 sm:mt-0">
                    <a href="hotel-details.html?id=2" class="bg-teal-600 hover:bg-teal-700 text-white py-2 px-4 rounded-md font-medium">
                      View Details
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Hotel 3 -->
          <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
            <div class="flex flex-col md:flex-row">
              <div class="relative md:w-1/3 h-64 md:h-auto">
                <img 
                  src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                  alt="Mountain View Resort" 
                  class="w-full h-full object-cover"
                />
                <button class="absolute top-3 right-3 bg-white/80 p-2 rounded-full hover:bg-white transition-colors">
                  <i class="far fa-heart text-gray-600 hover:text-red-500"></i>
                </button>
                <span class="absolute top-3 left-3 bg-teal-600 text-white text-xs px-2 py-1 rounded-full">
                  Featured
                </span>
              </div>
              
              <div class="p-6 flex-1 flex flex-col">
                <div class="flex justify-between">
                  <div>
                    <h3 class="text-xl font-semibold text-gray-800 hover:text-teal-600 transition-colors">
                      Mountain View Resort
                    </h3>
                    <div class="flex items-center text-gray-600 mt-1">
                      <i class="fas fa-map-marker-alt mr-1"></i>
                      <span class="text-sm">Palmeraie, Marrakech</span>
                      <span class="mx-2 text-gray-400">•</span>
                      <span class="text-sm">3.5 km from center</span>
                    </div>
                  </div>
                  
                  <div class="flex items-center bg-teal-50 px-2 py-1 rounded">
                    <div class="text-teal-700 font-semibold mr-1">4.9</div>
                    <div class="flex text-yellow-500">
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star text-xs"></i>
                    </div>
                  </div>
                </div>
                
                <div class="mt-4 flex flex-wrap gap-2">
                  <div class="flex items-center bg-gray-100 px-2 py-1 rounded text-xs text-gray-700">
                    <i class="fas fa-wifi mr-1"></i>
                    <span>Free WiFi</span>
                  </div>
                  <div class="flex items-center bg-gray-100 px-2 py-1 rounded text-xs text-gray-700">
                    <i class="fas fa-car mr-1"></i>
                    <span>Free Parking</span>
                  </div>
                  <div class="flex items-center bg-gray-100 px-2 py-1 rounded text-xs text-gray-700">
                    <i class="fas fa-swimming-pool mr-1"></i>
                    <span>Pool</span>
                  </div>
                  <div class="flex items-center bg-gray-100 px-2 py-1 rounded text-xs text-gray-700">
                    <i class="fas fa-coffee mr-1"></i>
                    <span>Breakfast Included</span>
                  </div>
                  <div class="bg-gray-100 px-2 py-1 rounded text-xs text-gray-700">
                    +2 more
                  </div>
                </div>
                
                <div class="mt-auto pt-4 flex flex-col sm:flex-row justify-between items-end">
                  <div>
                    <div class="flex items-center">
                      <span class="text-gray-500 line-through text-sm mr-2">$180</span>
                      <span class="text-2xl font-bold text-gray-800">$150</span>
                      <span class="text-gray-600 text-sm ml-1">/ night</span>
                    </div>
                    <div class="text-xs text-gray-500 mt-1">
                      Includes taxes and fees
                    </div>
                  </div>
                  
                  <div class="mt-4 sm:mt-0">
                    <a href="hotel-details.html?id=3" class="bg-teal-600 hover:bg-teal-700 text-white py-2 px-4 rounded-md font-medium">
                      View Details
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Hotel 4 -->
          <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
            <div class="flex flex-col md:flex-row">
              <div class="relative md:w-1/3 h-64 md:h-auto">
                <img 
                  src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                  alt="Kasbah Retreat" 
                  class="w-full h-full object-cover"
                />
                <button class="absolute top-3 right-3 bg-white/80 p-2 rounded-full hover:bg-white transition-colors">
                  <i class="far fa-heart text-gray-600 hover:text-red-500"></i>
                </button>
              </div>
              
              <div class="p-6 flex-1 flex flex-col">
                <div class="flex justify-between">
                  <div>
                    <h3 class="text-xl font-semibold text-gray-800 hover:text-teal-600 transition-colors">
                      Kasbah Retreat
                    </h3>
                    <div class="flex items-center text-gray-600 mt-1">
                      <i class="fas fa-map-marker-alt mr-1"></i>
                      <span class="text-sm">Hivernage, Marrakech</span>
                      <span class="mx-2 text-gray-400">•</span>
                      <span class="text-sm">0.8 km from center</span>
                    </div>
                  </div>
                  
                  <div class="flex items-center bg-teal-50 px-2 py-1 rounded">
                    <div class="text-teal-700 font-semibold mr-1">4.3</div>
                    <div class="flex text-yellow-500">
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star text-xs"></i>
                      <i class="far fa-star text-xs"></i>
                    </div>
                  </div>
                </div>
                
                <div class="mt-4 flex flex-wrap gap-2">
                  <div class="flex items-center bg-gray-100 px-2 py-1 rounded text-xs text-gray-700">
                    <i class="fas fa-wifi mr-1"></i>
                    <span>Free WiFi</span>
                  </div>
                  <div class="flex items-center bg-gray-100 px-2 py-1 rounded text-xs text-gray-700">
                    <i class="fas fa-coffee mr-1"></i>
                    <span>Breakfast Included</span>
                  </div>
                  <div class="flex items-center bg-gray-100 px-2 py-1 rounded text-xs text-gray-700">
                    <i class="fas fa-snowflake mr-1"></i>
                    <span>Air Conditioning</span>
                  </div>
                </div>
                
                <div class="mt-auto pt-4 flex flex-col sm:flex-row justify-between items-end">
                  <div>
                    <div class="flex items-center">
                      <span class="text-2xl font-bold text-gray-800">$85</span>
                      <span class="text-gray-600 text-sm ml-1">/ night</span>
                    </div>
                    <div class="text-xs text-gray-500 mt-1">
                      Includes taxes and fees
                    </div>
                  </div>
                  
                  <div class="mt-4 sm:mt-0">
                    <a href="hotel-details.html?id=4" class="bg-teal-600 hover:bg-teal-700 text-white py-2 px-4 rounded-md font-medium">
                      View Details
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Hotel 5 -->
          <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
            <div class="flex flex-col md:flex-row">
              <div class="relative md:w-1/3 h-64 md:h-auto">
                <img 
                  src="https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                  alt="Atlas Panorama Hotel" 
                  class="w-full h-full object-cover"
                />
                <button class="absolute top-3 right-3 bg-white/80 p-2 rounded-full hover:bg-white transition-colors">
                  <i class="far fa-heart text-gray-600 hover:text-red-500"></i>
                </button>
                <span class="absolute top-3 left-3 bg-orange-500 text-white text-xs px-2 py-1 rounded-full">
                  Special Offer
                </span>
              </div>
              
              <div class="p-6 flex-1 flex flex-col">
                <div class="flex justify-between">
                  <div>
                    <h3 class="text-xl font-semibold text-gray-800 hover:text-teal-600 transition-colors">
                      Atlas Panorama Hotel
                    </h3>
                    <div class="flex items-center text-gray-600 mt-1">
                      <i class="fas fa-map-marker-alt mr-1"></i>
                      <span class="text-sm">Agdal, Marrakech</span>
                      <span class="mx-2 text-gray-400">•</span>
                      <span class="text-sm">2.1 km from center</span>
                    </div>
                  </div>
                  
                  <div class="flex items-center bg-teal-50 px-2 py-1 rounded">
                    <div class="text-teal-700 font-semibold mr-1">4.7</div>
                    <div class="flex text-yellow-500">
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star text-xs"></i>
                      <i class="fas fa-star-half-alt text-xs"></i>
                    </div>
                  </div>
                </div>
                
                <div class="mt-4 flex flex-wrap gap-2">
                  <div class="flex items-center bg-gray-100 px-2 py-1 rounded text-xs text-gray-700">
                    <i class="fas fa-wifi mr-1"></i>
                    <span>Free WiFi</span>
                  </div>
                  <div class="flex items-center bg-gray-100 px-2 py-1 rounded text-xs text-gray-700">
                    <i class="fas fa-car mr-1"></i>
                    <span>Free Parking</span>
                  </div>
                  <div class="flex items-center bg-gray-100 px-2 py-1 rounded text-xs text-gray-700">
                    <i class="fas fa-swimming-pool mr-1"></i>
                    <span>Pool</span>
                  </div>
                  <div class="flex items-center bg-gray-100 px-2 py-1 rounded text-xs text-gray-700">
                    <i class="fas fa-snowflake mr-1"></i>
                    <span>Air Conditioning</span>
                  </div>
                  <div class="flex items-center bg-gray-100 px-2 py-1 rounded text-xs text-gray-700">
                    <i class="fas fa-utensils mr-1"></i>
                    <span>Restaurant</span>
                  </div>
                </div>
                
                <div class="mt-auto pt-4 flex flex-col sm:flex-row justify-between items-end">
                  <div>
                    <div class="flex items-center">
                      <span class="text-gray-500 line-through text-sm mr-2">$130</span>
                      <span class="text-2xl font-bold text-gray-800">$110</span>
                      <span class="text-gray-600 text-sm ml-1">/ night</span>
                    </div>
                    <div class="text-xs text-gray-500 mt-1">
                      Includes taxes and fees
                    </div>
                  </div>
                  
                  <div class="mt-4 sm:mt-0">
                    <a href="hotel-details.html?id=5" class="bg-teal-600 hover:bg-teal-700 text-white py-2 px-4 rounded-md font-medium">
                      View Details
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
          <div class="flex space-x-2">
            <a href="#" class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded-md hover:bg-gray-50 text-gray-700 font-medium">1</a>
            <a href="#" class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded-md hover:bg-gray-50 text-gray-700 font-medium">2</a>
            <a href="#" class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded-md hover:bg-gray-50 text-gray-700 font-medium">3</a>
            <a href="#" class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded-md hover:bg-gray-50 text-gray-700 font-medium">4</a>
            <a href="#" class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded-md hover:bg-gray-50 text-gray-700 font-medium">5</a>
            <span class="w-10 h-10 flex items-center justify-center text-gray-700">...</span>
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

    // Filter toggles
    const toggles = ['price', 'property', 'amenities', 'rating'];
    toggles.forEach(id => {
      document.getElementById(`${id}-toggle`).addEventListener('click', function() {
        const content = document.getElementById(`${id}-content`);
        content.classList.toggle('hidden');
        const icon = this.querySelector('i');
        icon.classList.toggle('fa-chevron-up');
        icon.classList.toggle('fa-chevron-down');
      });
    });

    // Price slider
    const priceSlider = document.getElementById('price-slider');
    const priceValue = document.getElementById('price-value');
    priceSlider.addEventListener('input', function() {
      priceValue.textContent = `$${this.value}+`;
    });
  </script>
</body>
</html>