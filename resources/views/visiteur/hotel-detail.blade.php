<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Details - StayEase</title>
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

  <!-- Hotel Gallery -->
  <div class="relative">
    <div class="grid grid-cols-1 md:grid-cols-4 md:grid-rows-2 gap-2 h-[400px] md:h-[500px]">
      <div class="md:col-span-2 md:row-span-2 relative">
        <img 
          src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80" 
          alt="Main hotel image" 
          class="w-full h-full object-cover rounded-tl-xl rounded-bl-xl"
        />
      </div>
      
      <div class="hidden md:block relative">
        <img 
          src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
          alt="Hotel image 2" 
          class="w-full h-full object-cover"
        />
      </div>
      
      <div class="hidden md:block relative">
        <img 
          src="https://images.unsplash.com/photo-1590490360182-c33d57733427?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
          alt="Hotel image 3" 
          class="w-full h-full object-cover rounded-tr-xl"
        />
      </div>
      
      <div class="hidden md:block relative">
        <img 
          src="https://images.unsplash.com/photo-1584132967334-10e028bd69f7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
          alt="Hotel image 4" 
          class="w-full h-full object-cover"
        />
      </div>
      
      <div class="hidden md:block relative">
        <img 
          src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
          alt="Hotel image 5" 
          class="w-full h-full object-cover rounded-br
          alt="Hotel image 5" 
          class="w-full h-full object-cover rounded-br-xl"
        />
      </div>
    </div>
    
    <div class="absolute bottom-4 right-4 flex space-x-2">
      <button id="show-all-photos" class="bg-white/90 hover:bg-white text-gray-700 py-2 px-4 rounded-md font-medium flex items-center text-sm">
        <i class="fas fa-th-large mr-2"></i>
        Show all photos
      </button>
      
      <button class="bg-white/90 hover:bg-white text-gray-700 p-2 rounded-full">
        <i class="far fa-heart"></i>
      </button>
      
      <button class="bg-white/90 hover:bg-white text-gray-700 p-2 rounded-full">
        <i class="fas fa-share-alt"></i>
      </button>
    </div>
  </div>

  <!-- Photo Gallery Modal (hidden by default) -->
  <div id="gallery-modal" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden flex flex-col">
    <div class="p-4 flex justify-between items-center border-b border-gray-800">
      <h2 class="text-xl font-semibold text-white">Hotel Gallery</h2>
      <button id="close-gallery" class="text-white hover:text-gray-300">
        <i class="fas fa-times text-xl"></i>
      </button>
    </div>
    
    <div class="flex-1 relative">
      <img id="current-photo" src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80" alt="Gallery image" class="absolute inset-0 m-auto max-h-full max-w-full object-contain p-4" />
      
      <button id="prev-photo" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/90 hover:bg-white text-gray-700 p-2 rounded-full">
        <i class="fas fa-chevron-left"></i>
      </button>
      
      <button id="next-photo" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/90 hover:bg-white text-gray-700 p-2 rounded-full">
        <i class="fas fa-chevron-right"></i>
      </button>
    </div>
    
    <div class="p-4 border-t border-gray-800">
      <div class="text-center text-sm text-white">
        <span id="photo-index">1</span> / <span id="photo-total">5</span>
      </div>
    </div>
  </div>

  <div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
      <!-- Main Content -->
      <div class="w-full lg:w-2/3">
        <!-- Hotel Info -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
          <div class="flex flex-col md:flex-row justify-between md:items-center mb-6">
            <div>
              <h1 class="text-3xl font-bold text-gray-800 mb-2">Luxury Palace Hotel</h1>
              <div class="flex items-center text-gray-600">
                <i class="fas fa-map-marker-alt mr-1"></i>
                <span>Medina, Marrakech, Morocco</span>
              </div>
            </div>
            
            <div class="mt-4 md:mt-0 flex items-center">
              <div class="bg-teal-50 px-3 py-2 rounded-lg flex items-center mr-3">
                <div class="text-teal-700 font-bold text-xl mr-1">4.8</div>
                <div class="flex flex-col">
                  <div class="flex text-yellow-500">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                  </div>
                  <span class="text-xs text-gray-600">245 reviews</span>
                </div>
              </div>
              
              <span class="bg-teal-600 text-white text-xs px-2 py-1 rounded-full">
                Exceptional
              </span>
            </div>
          </div>
          
          <div class="mb-6">
            <h2 class="text-xl font-semibold mb-3">About this hotel</h2>
            <p class="text-gray-700 leading-relaxed">
              Nestled in the heart of Marrakech's historic Medina, Luxury Palace Hotel offers a perfect blend of traditional Moroccan architecture and modern luxury. The hotel features spacious rooms with authentic décor, a rooftop terrace with panoramic views of the Atlas Mountains, and a tranquil courtyard with a refreshing pool. Guests can enjoy traditional Moroccan cuisine at our restaurant, relax with a traditional hammam spa treatment, or explore the nearby Jemaa el-Fnaa square and souks. Our attentive staff is dedicated to making your stay in Marrakech unforgettable.
            </p>
          </div>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
              <h3 class="text-lg font-semibold mb-3 flex items-center">
                <i class="fas fa-shield-alt text-teal-600 mr-2"></i>
                Property Highlights
              </h3>
              <ul class="space-y-2">
                <li class="flex items-start">
                  <span class="text-teal-600 mr-2">•</span>
                  <span class="text-gray-700">5-minute walk to Jemaa el-Fnaa Square</span>
                </li>
                <li class="flex items-start">
                  <span class="text-teal-600 mr-2">•</span>
                  <span class="text-gray-700">Traditional Moroccan architecture</span>
                </li>
                <li class="flex items-start">
                  <span class="text-teal-600 mr-2">•</span>
                  <span class="text-gray-700">Rooftop terrace with mountain views</span>
                </li>
                <li class="flex items-start">
                  <span class="text-teal-600 mr-2">•</span>
                  <span class="text-gray-700">Authentic restaurant and hammam spa</span>
                </li>
                <li class="flex items-start">
                  <span class="text-teal-600 mr-2">•</span>
                  <span class="text-gray-700">24-hour concierge service</span>
                </li>
              </ul>
            </div>
            
            <div>
              <h3 class="text-lg font-semibold mb-3 flex items-center">
                <i class="fas fa-award text-teal-600 mr-2"></i>
                Awards & Recognition
              </h3>
              <ul class="space-y-2">
                <li class="flex items-start">
                  <span class="text-teal-600 mr-2">•</span>
                  <span class="text-gray-700">Travelers' Choice Award 2023</span>
                </li>
                <li class="flex items-start">
                  <span class="text-teal-600 mr-2">•</span>
                  <span class="text-gray-700">Best Luxury Hotel in Marrakech 2022</span>
                </li>
                <li class="flex items-start">
                  <span class="text-teal-600 mr-2">•</span>
                  <span class="text-gray-700">Sustainable Tourism Certificate</span>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Hotel Amenities -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
          <h2 class="text-xl font-semibold mb-6">Amenities</h2>
          
          <div class="mb-6">
            <h3 class="text-lg font-medium mb-4">Popular Amenities</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
              <div class="flex items-center">
                <i class="fas fa-wifi text-teal-600 mr-2"></i>
                <span class="text-gray-700">Free WiFi</span>
              </div>
              <div class="flex items-center">
                <i class="fas fa-car text-teal-600 mr-2"></i>
                <span class="text-gray-700">Free Parking</span>
              </div>
              <div class="flex items-center">
                <i class="fas fa-coffee text-teal-600 mr-2"></i>
                <span class="text-gray-700">Breakfast Included</span>
              </div>
              <div class="flex items-center">
                <i class="fas fa-snowflake text-teal-600 mr-2"></i>
                <span class="text-gray-700">Air Conditioning</span>
              </div>
              <div class="flex items-center">
                <i class="fas fa-utensils text-teal-600 mr-2"></i>
                <span class="text-gray-700">Restaurant</span>
              </div>
              <div class="flex items-center">
                <i class="fas fa-dumbbell text-teal-600 mr-2"></i>
                <span class="text-gray-700">Fitness Center</span>
              </div>
              <div class="flex items-center">
                <i class="fas fa-swimming-pool text-teal-600 mr-2"></i>
                <span class="text-gray-700">Swimming Pool</span>
              </div>
              <div class="flex items-center">
                <i class="fas fa-spa text-teal-600 mr-2"></i>
                <span class="text-gray-700">Spa Services</span>
              </div>
            </div>
          </div>
          
          <div>
            <h3 class="text-lg font-medium mb-4">Other Amenities</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
              <div class="flex items-center">
                <i class="fas fa-tv text-gray-500 mr-2"></i>
                <span class="text-gray-700">Flat-screen TV</span>
              </div>
              <div class="flex items-center">
                <i class="fas fa-shield-alt text-gray-500 mr-2"></i>
                <span class="text-gray-700">24-hour Security</span>
              </div>
              <div class="flex items-center">
                <i class="fas fa-clock text-gray-500 mr-2"></i>
                <span class="text-gray-700">24-hour Front Desk</span>
              </div>
              <div class="flex items-center">
                <i class="fas fa-concierge-bell text-gray-500 mr-2"></i>
                <span class="text-gray-700">Concierge Service</span>
              </div>
              <div class="flex items-center">
                <i class="fas fa-utensils text-gray-500 mr-2"></i>
                <span class="text-gray-700">Room Service</span>
              </div>
              <div class="flex items-center">
                <i class="fas fa-tshirt text-gray-500 mr-2"></i>
                <span class="text-gray-700">Laundry Service</span>
              </div>
              <div class="flex items-center">
                <i class="fas fa-shuttle-van text-gray-500 mr-2"></i>
                <span class="text-gray-700">Airport Shuttle</span>
              </div>
              <div class="flex items-center">
                <i class="fas fa-briefcase text-gray-500 mr-2"></i>
                <span class="text-gray-700">Business Center</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Hotel Reviews -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
          <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold">Guest Reviews</h2>
            <div class="bg-teal-50 px-3 py-2 rounded-lg flex items-center">
              <div class="text-teal-700 font-bold text-xl mr-1">4.8</div>
              <div class="flex flex-col">
                <div class="flex text-yellow-500">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
                <span class="text-xs text-gray-600">245 reviews</span>
              </div>
            </div>
          </div>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div>
              <h3 class="text-lg font-medium mb-4">Rating Breakdown</h3>
              <div class="space-y-3">
                <div class="flex items-center">
                  <div class="w-16 text-sm text-gray-700">5 stars</div>
                  <div class="flex-1 mx-2 bg-gray-200 rounded-full h-2">
                    <div class="bg-teal-600 h-2 rounded-full" style="width: 85%"></div>
                  </div>
                  <div class="w-10 text-sm text-gray-700">85%</div>
                </div>
                <div class="flex items-center">
                  <div class="w-16 text-sm text-gray-700">4 stars</div>
                  <div class="flex-1 mx-2 bg-gray-200 rounded-full h-2">
                    <div class="bg-teal-600 h-2 rounded-full" style="width: 10%"></div>
                  </div>
                  <div class="w-10 text-sm text-gray-700">10%</div>
                </div>
                <div class="flex items-center">
                  <div class="w-16 text-sm text-gray-700">3 stars</div>
                  <div class="flex-1 mx-2 bg-gray-200 rounded-full h-2">
                    <div class="bg-teal-600 h-2 rounded-full" style="width: 3%"></div>
                  </div>
                  <div class="w-10 text-sm text-gray-700">3%</div>
                </div>
                <div class="flex items-center">
                  <div class="w-16 text-sm text-gray-700">2 stars</div>
                  <div class="flex-1 mx-2 bg-gray-200 rounded-full h-2">
                    <div class="bg-teal-600 h-2 rounded-full" style="width: 1%"></div>
                  </div>
                  <div class="w-10 text-sm text-gray-700">1%</div>
                </div>
                <div class="flex items-center">
                  <div class="w-16 text-sm text-gray-700">1 star</div>
                  <div class="flex-1 mx-2 bg-gray-200 rounded-full h-2">
                    <div class="bg-teal-600 h-2 rounded-full" style="width: 1%"></div>
                  </div>
                  <div class="w-10 text-sm text-gray-700">1%</div>
                </div>
              </div>
            </div>
            
            <div>
              <h3 class="text-lg font-medium mb-4">Categories</h3>
              <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col">
                  <div class="flex justify-between mb-1">
                    <span class="text-sm text-gray-700">Cleanliness</span>
                    <span class="text-sm font-medium text-teal-700">4.9</span>
                  </div>
                  <div class="bg-gray-200 rounded-full h-2">
                    <div class="bg-teal-600 h-2 rounded-full" style="width: 98%"></div>
                  </div>
                </div>
                <div class="flex flex-col">
                  <div class="flex justify-between mb-1">
                    <span class="text-sm text-gray-700">Comfort</span>
                    <span class="text-sm font-medium text-teal-700">4.8</span>
                  </div>
                  <div class="bg-gray-200 rounded-full h-2">
                    <div class="bg-teal-600 h-2 rounded-full" style="width: 96%"></div>
                  </div>
                </div>
                <div class="flex flex-col">
                  <div class="flex justify-between mb-1">
                    <span class="text-sm text-gray-700">Location</span>
                    <span class="text-sm font-medium text-teal-700">4.7</span>
                  </div>
                  <div class="bg-gray-200 rounded-full h-2">
                    <div class="bg-teal-600 h-2 rounded-full" style="width: 94%"></div>
                  </div>
                </div>
                <div class="flex flex-col">
                  <div class="flex justify-between mb-1">
                    <span class="text-sm text-gray-700">Facilities</span>
                    <span class="text-sm font-medium text-teal-700">4.6</span>
                  </div>
                  <div class="bg-gray-200 rounded-full h-2">
                    <div class="bg-teal-600 h-2 rounded-full" style="width: 92%"></div>
                  </div>
                </div>
                <div class="flex flex-col">
                  <div class="flex justify-between mb-1">
                    <span class="text-sm text-gray-700">Staff</span>
                    <span class="text-sm font-medium text-teal-700">4.9</span>
                  </div>
                  <div class="bg-gray-200 rounded-full h-2">
                    <div class="bg-teal-600 h-2 rounded-full" style="width: 98%"></div>
                  </div>
                </div>
                <div class="flex flex-col">
                  <div class="flex justify-between mb-1">
                    <span class="text-sm text-gray-700">Value for money</span>
                    <span class="text-sm font-medium text-teal-700">4.5</span>
                  </div>
                  <div class="bg-gray-200 rounded-full h-2">
                    <div class="bg-teal-600 h-2 rounded-full" style="width: 90%"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="space-y-6">
            <!-- Review 1 -->
            <div class="border-t pt-6">
              <div class="flex justify-between mb-3">
                <div class="flex items-center">
                  <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                    <img 
                      src="https://randomuser.me/api/portraits/women/44.jpg" 
                      alt="Sarah Johnson" 
                      class="w-full h-full object-cover"
                    />
                  </div>
                  <div>
                    <h4 class="font-semibold text-gray-800">Sarah Johnson</h4>
                    <div class="flex items-center text-sm text-gray-600">
                      <span>United States</span>
                      <span class="mx-2">•</span>
                      <span>October 15, 2023</span>
                    </div>
                  </div>
                </div>
                
                <div class="flex text-yellow-500">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
              </div>
              
              <h5 class="font-medium text-gray-800 mb-2">Exceptional stay in the heart of Marrakech</h5>
              <p class="text-gray-700 mb-4">We had an amazing experience at this hotel. The staff was incredibly attentive and helpful, the room was spacious and beautifully decorated with traditional Moroccan elements. The rooftop terrace offered breathtaking views of the city and Atlas Mountains. The location is perfect - just a short walk to the main square and souks. Would definitely recommend and stay here again!</p>
              
              <div class="flex space-x-4">
                <button class="flex items-center text-sm text-gray-600 hover:text-teal-600">
                  <i class="far fa-thumbs-up mr-1"></i>
                  <span>Helpful (12)</span>
                </button>
                <button class="flex items-center text-sm text-gray-600 hover:text-teal-600">
                  <i class="far fa-comment mr-1"></i>
                  <span>Reply (1)</span>
                </button>
              </div>
            </div>

            <!-- Review 2 -->
            <div class="border-t pt-6">
              <div class="flex justify-between mb-3">
                <div class="flex items-center">
                  <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                    <img 
                      src="https://randomuser.me/api/portraits/men/32.jpg" 
                      alt="Mohammed Ali" 
                      class="w-full h-full object-cover"
                    />
                  </div>
                  <div>
                    <h4 class="font-semibold text-gray-800">Mohammed Ali</h4>
                    <div class="flex items-center text-sm text-gray-600">
                      <span>Morocco</span>
                      <span class="mx-2">•</span>
                      <span>September 28, 2023</span>
                    </div>
                  </div>
                </div>
                
                <div class="flex text-yellow-500">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
                </div>
              </div>
              
              <h5 class="font-medium text-gray-800 mb-2">Great location and beautiful property</h5>
              <p class="text-gray-700 mb-4">This riad is in a perfect location to explore the Medina. The rooms are comfortable and the traditional architecture is stunning. The breakfast on the terrace was delicious. The only minor issue was that the WiFi was a bit slow in our room, but worked well in the common areas. The staff was very friendly and helped us arrange tours and transportation.</p>
              
              <div class="flex space-x-4">
                <button class="flex items-center text-sm text-gray-600 hover:text-teal-600">
                  <i class="far fa-thumbs-up mr-1"></i>
                  <span>Helpful (8)</span>
                </button>
                <button class="flex items-center text-sm text-gray-600 hover:text-teal-600">
                  <i class="far fa-comment mr-1"></i>
                  <span>Reply (0)</span>
                </button>
              </div>
            </div>
          </div>
          
          <div class="mt-8 text-center">
            <button id="show-all-reviews" class="border border-gray-300 hover:bg-gray-50 text-gray-700 py-2 px-4 rounded-md font-medium">
              Show All 245 Reviews
            </button>
          </div>
        </div>

        <!-- Hotel Location -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
          <h2 class="text-xl font-semibold mb-6">Location</h2>
          
          <div class="flex items-start mb-4">
            <i class="fas fa-map-marker-alt text-teal-600 mr-2 mt-0.5"></i>
            <span class="text-gray-700">123 Medina Street, Marrakech, Morocco</span>
          </div>
          
          <div class="mb-6">
            <p class="text-gray-700">Located in the heart of Marrakech's historic Medina, our hotel is just a 5-minute walk from the famous Jemaa el-Fnaa square and the vibrant souks. The Koutoubia Mosque is a 10-minute walk away, and the Bahia Palace and Majorelle Garden are within a 20-minute walk or a short taxi ride. The Marrakech Menara Airport is approximately 15 minutes by car.</p>
          </div>
          
          <div class="h-64 w-full bg-gray-200 rounded-lg mb-6 relative overflow-hidden">
            <!-- This would be a real map in a production app -->
            <div class="absolute inset-0 flex items-center justify-center">
              <span class="text-gray-500">Map View</span>
            </div>
          </div>
          
          <div>
            <h3 class="text-lg font-medium mb-4">Nearby Landmarks</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div class="flex justify-between">
                <span class="text-gray-700">Jemaa el-Fnaa Square</span>
                <span class="text-gray-600">0.3 km</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-700">Koutoubia Mosque</span>
                <span class="text-gray-600">0.7 km</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-700">Bahia Palace</span>
                <span class="text-gray-600">1.2 km</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-700">Majorelle Garden</span>
                <span class="text-gray-600">2.5 km</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-700">Marrakech Menara Airport</span>
                <span class="text-gray-600">7 km</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Hotel Policies -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
          <h2 class="text-xl font-semibold mb-6">Hotel Policies</h2>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-6">
              <div>
                <h3 class="text-lg font-medium mb-3 flex items-center">
                  <i class="fas fa-clock text-teal-600 mr-2"></i>
                  Check-in / Check-out
                </h3>
                <div class="space-y-2">
                  <div class="flex justify-between">
                    <span class="text-gray-700">Check-in</span>
                    <span class="text-gray-700">From 2:00 PM</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-gray-700">Check-out</span>
                    <span class="text-gray-700">Until 12:00 PM</span>
                  </div>
                </div>
              </div>
              
              <div>
                <h3 class="text-lg font-medium mb-3 flex items-center">
                  <i class="fas fa-calendar-alt text-teal-600 mr-2"></i>
                  Cancellation Policy
                </h3>
                <p class="text-gray-700">Free cancellation up to 48 hours before check-in. After that, the first night is non-refundable.</p>
              </div>
              
              <div>
                <h3 class="text-lg font-medium mb-3 flex items-center">
                  <i class="fas fa-ban text-teal-600 mr-2"></i>
                  Restrictions
                </h3>
                <div class="space-y-2">
                  <div>
                    <span class="text-gray-700 font-medium">Children:</span>
                    <p class="text-gray-700">Children of all ages are welcome. Children 12 and above are considered adults at this property.</p>
                  </div>
                  <div>
                    <span class="text-gray-700 font-medium">Pets:</span>
                    <p class="text-gray-700">Pets are not allowed.</p>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="space-y-6">
              <div>
                <h3 class="text-lg font-medium mb-3 flex items-center">
                  <i class="fas fa-credit-card text-teal-600 mr-2"></i>
                  Payment Options
                </h3>
                <div class="flex flex-wrap gap-2">
                  <div class="bg-gray-100 px-3 py-1 rounded text-sm text-gray-700">Visa</div>
                  <div class="bg-gray-100 px-3 py-1 rounded text-sm text-gray-700">Mastercard</div>
                  <div class="bg-gray-100 px-3 py-1 rounded text-sm text-gray-700">American Express</div>
                  <div class="bg-gray-100 px-3 py-1 rounded text-sm text-gray-700">Cash</div>
                </div>
              </div>
              
              <div>
                <h3 class="text-lg font-medium mb-3 flex items-center">
                  <i class="fas fa-info-circle text-teal-600 mr-2"></i>
                  Additional Policies
                </h3>
                <ul class="space-y-2">
                  <li class="flex items-start">
                    <span class="text-teal-600 mr-2">•</span>
                    <span class="text-gray-700">This is a non-smoking property.</span>
                  </li>
                  <li class="flex items-start">
                    <span class="text-teal-600 mr-2">•</span>
                    <span class="text-gray-700">Extra beds are available upon request and subject to availability.</span>
                  </li>
                  <li class="flex items-start">
                    <span class="text-teal-600 mr-2">•</span>
                    <span class="text-gray-700">A city tax of 2.50 EUR per person per night is applicable and to be paid at the property.</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Similar Hotels -->
        <section class="py-12">
          <h2 class="text-2xl font-bold text-gray-800 mb-8">Similar Hotels You May Like</h2>
          
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Similar Hotel 1 -->
            <a href="hotel-details.html?id=2" class="group">
              <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="relative h-48 w-full">
                  <img 
                    src="https://images.unsplash.com/photo-1582719508461-905c673771fd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                    alt="Riad Elegance" 
                    class="w-full h-full object-cover"
                  />
                </div>
                
                <div class="p-4">
                  <h3 class="text-lg font-semibold text-gray-800 group-hover:text-teal-600 transition-colors">
                    Riad Elegance
                  </h3>
                  <p class="text-gray-600 text-sm mb-2">Gueliz, Marrakech</p>
                  
                  <div class="flex items-center mb-3">
                    <div class="flex items-center text-yellow-500 mr-2">
                      <i class="fas fa-star"></i>
                      <span class="ml-1 text-sm font-medium">4.6</span>
                    </div>
                    <span class="text-xs text-gray-500">(189 reviews)</span>
                  </div>
                  
                  <div>
                    <span class="text-lg font-bold text-gray-800">$95</span>
                    <span class="text-gray-600 text-sm"> / night</span>
                  </div>
                </div>
              </div>
            </a>

            <!-- Similar Hotel 2 -->
            <a href="hotel-details.html?id=3" class="group">
              <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="relative h-48 w-full">
                  <img 
                    src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                    alt="Mountain View Resort" 
                    class="w-full h-full object-cover"
                  />
                </div>
                
                <div class="p-4">
                  <h3 class="text-lg font-semibold text-gray-800 group-hover:text-teal-600 transition-colors">
                    Mountain View Resort
                  </h3>
                  <p class="text-gray-600 text-sm mb-2">Palmeraie, Marrakech</p>
                  
                  <div class="flex items-center mb-3">
                    <div class="flex items-center text-yellow-500 mr-2">
                      <i class="fas fa-star"></i>
                      <span class="ml-1 text-sm font-medium">4.9</span>
                    </div>
                    <span class="text-xs text-gray-500">(320 reviews)</span>
                  </div>
                  
                  <div>
                    <span class="text-lg font-bold text-gray-800">$150</span>
                    <span class="text-gray-600 text-sm"> / night</span>
                  </div>
                </div>
              </div>
            </a>

            <!-- Similar Hotel 3 -->
            <a href="hotel-details.html?id=4" class="group">
              <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="relative h-48 w-full">
                  <img 
                    src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                    alt="Kasbah Retreat" 
                    class="w-full h-full object-cover"
                  />
                </div>
                
                <div class="p-4">
                  <h3 class="text-lg font-semibold text-gray-800 group-hover:text-teal-600 transition-colors">
                    Kasbah Retreat
                  </h3>
                  <p class="text-gray-600 text-sm mb-2">Hivernage, Marrakech</p>
                  
                  <div class="flex items-center mb-3">
                    <div class="flex items-center text-yellow-500 mr-2">
                      <i class="fas fa-star"></i>
                      <span class="ml-1 text-sm font-medium">4.3</span>
                    </div>
                    <span class="text-xs text-gray-500">(156 reviews)</span>
                  </div>
                  
                  <div>
                    <span class="text-lg font-bold text-gray-800">$85</span>
                    <span class="text-gray-600 text-sm"> / night</span>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </section>
      </div>
      
      <!-- Booking Card -->
      <div class="w-full lg:w-1/3">
        <div class="bg-white rounded-xl shadow-sm p-6 sticky top-20">
          <h2 class="text-xl font-semibold mb-6">Book Your Stay</h2>
          
          <div class="space-y-4 mb-6">
            <div>
              <label class="text-sm font-medium text-gray-700 mb-1 block">Check-in / Check-out</label>
              <div class="grid grid-cols-2 gap-2">
                <div class="relative">
                  <i class="far fa-calendar absolute left-3 top-3 text-gray-400"></i>
                  <input 
                    type="date" 
                    class="w-full pl-10 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                  />
                </div>
                
                <div class="relative">
                  <i class="far fa-calendar absolute left-3 top-3 text-gray-400"></i>
                  <input 
                    type="date" 
                    class="w-full pl-10 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                  />
                </div>
              </div>
              <div class="text-sm text-gray-600 mt-1">
                3 nights
              </div>
            </div>
            
            <div class="grid grid-cols-2 gap-2">
              <div>
                <label class="text-sm font-medium text-gray-700 mb-1 block">Guests</label>
                <div class="relative">
                  <i class="fas fa-users absolute left-3 top-3 text-gray-400"></i>
                  <select class="w-full pl-10 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500">
                    <option value="1">1 Guest</option>
                    <option value="2" selected>2 Guests</option>
                    <option value="3">3 Guests</option>
                    <option value="4">4 Guests</option>
                    <option value="5">5 Guests</option>
                  </select>
                </div>
              </div>
              
              <div>
                <label class="text-sm font-medium text-gray-700 mb-1 block">Rooms</label>
                <select class="w-full py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500">
                  <option value="1" selected>1 Room</option>
                  <option value="2">2 Rooms</option>
                  <option value="3">3 Rooms</option>
                </select>
              </div>
            </div>
          </div>
          
          <div class="border-t border-b py-4 mb-6">
            <div class="space-y-3">
              <div class="flex justify-between">
                <div class="flex items-center">
                  <span class="text-gray-700">$120 x 3 nights</span>
                  <span class="text-xs text-gray-500 line-through ml-2">$450</span>
                </div>
                <span class="text-gray-700">$360</span>
              </div>
              
              <div class="flex justify-between">
                <span class="text-gray-700">Taxes and fees</span>
                <span class="text-gray-700">$40</span>
              </div>
              
              <div class="flex justify-between text-green-600">
                <span>Discount</span>
                <span>-$30</span>
              </div>
            </div>
          </div>
          
          <div class="flex justify-between items-center mb-6">
            <div>
              <span class="text-gray-700 font-medium">Total</span>
              <div class="text-xs text-gray-500">Includes taxes and fees</div>
            </div>
            <span class="text-xl font-bold text-gray-800">$370</span>
          </div>
          
          <a href="booking.html" class="block w-full bg-teal-600 hover:bg-teal-700 text-white py-3 px-4 rounded-md font-medium text-center">
            Reserve Now
          </a>
          
          <div class="mt-4 space-y-2">
            <div class="flex items-start">
              <i class="fas fa-check text-teal-600 mr-2 mt-0.5"></i>
              <span class="text-sm text-gray-600">Free cancellation up to 48 hours before check-in</span>
            </div>
            <div class="flex items-start">
              <i class="fas fa-check text-teal-600 mr-2 mt-0.5"></i>
              <span class="text-sm text-gray-600">No payment needed today</span>
            </div>
            <div class="flex items-start">
              <i class="fas fa-check text-teal-600 mr-2 mt-0.5"></i>
              <span class="text-sm text-gray-600">Best price guarantee</span>
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

    // Photo gallery functionality
    const galleryModal = document.getElementById('gallery-modal');
    const currentPhoto = document.getElementById('current-photo');
    const photoIndex = document.getElementById('photo-index');
    const photoTotal = document.getElementById('photo-total');
    
    const photos = [
      "https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80",
      "https://images.unsplash.com/photo-1578683010236-d716f9a3f461?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80",
      "https://images.unsplash.com/photo-1590490360182-c33d57733427?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80",
      "https://images.unsplash.com/photo-1584132967334-10e028bd69f7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80",
      "https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
    ];
    
    let currentIndex = 0;
    photoTotal.textContent = photos.length;
    
    document.getElementById('show-all-photos').addEventListener('click', function() {
      galleryModal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    });
    
    document.getElementById('close-gallery').addEventListener('click', function() {
      galleryModal.classList.add('hidden');
      document.body.style.overflow = 'auto';
    });
    
    document.getElementById('prev-photo').addEventListener('click', function() {
      currentIndex = (currentIndex - 1 + photos.length) % photos.length;
      updatePhoto();
    });
    
    document.getElementById('next-photo').addEventListener('click', function() {
      currentIndex = (currentIndex + 1) % photos.length;
      updatePhoto();
    });
    
    function updatePhoto() {
      currentPhoto.src = photos[currentIndex];
      photoIndex.textContent = currentIndex + 1;
    }
    
    // Show all reviews toggle
    document.getElementById('show-all-reviews').addEventListener('click', function() {
      // In a real app, this would load more reviews or navigate to a reviews page
      alert('This would show all 245 reviews in a real application');
    });
  </script>
</body>
</html>