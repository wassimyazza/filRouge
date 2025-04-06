<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StayEase - Find Your Perfect Stay</title>
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

  <!-- Hero Section -->
  <div class="relative h-[600px] w-full overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-teal-900/70 to-teal-700/50 z-10"></div>
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80')"></div>
    <div class="relative z-20 container mx-auto h-full flex flex-col justify-center px-4">
      <h1 class="text-4xl md:text-6xl font-bold text-white mb-4">
        Find Your Perfect Stay
      </h1>
      <p class="text-xl md:text-2xl text-white/90 mb-8 max-w-2xl">
        Discover amazing hotels and accommodations for your next adventure, with exclusive deals and verified reviews.
      </p>
      <div class="flex flex-col sm:flex-row gap-4">
        <a href="search.html" class="bg-teal-600 hover:bg-teal-700 text-white px-8 py-4 rounded-md text-center font-medium text-lg">
          Explore Hotels
        </a>
        <a href="host.html" class="bg-white/10 text-white border border-white/30 hover:bg-white/20 px-8 py-4 rounded-md text-center font-medium text-lg">
          List Your Property
        </a>
      </div>
    </div>
  </div>

  <div class="container mx-auto px-4 py-12">
    <!-- Search Box -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-12 -mt-20 relative z-30">
      <h2 class="text-2xl font-semibold mb-6 text-gray-800">Find your next stay</h2>
      <form id="search-form" action="search.html" method="get">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">Destination</label>
            <div class="relative">
              <i class="fas fa-map-marker-alt absolute left-3 top-3 text-gray-400"></i>
              <input 
                type="text" 
                name="destination" 
                placeholder="Where are you going?" 
                class="w-full pl-10 py-2 bg-gray-50 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
              />
            </div>
          </div>
          
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">Check-in</label>
            <div class="relative">
              <i class="far fa-calendar absolute left-3 top-3 text-gray-400"></i>
              <input 
                type="date" 
                name="checkin" 
                class="w-full pl-10 py-2 bg-gray-50 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
              />
            </div>
          </div>
          
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">Check-out</label>
            <div class="relative">
              <i class="far fa-calendar absolute left-3 top-3 text-gray-400"></i>
              <input 
                type="date" 
                name="checkout" 
                class="w-full pl-10 py-2 bg-gray-50 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
              />
            </div>
          </div>
          
          <div class="space-y-2">
            <label class="text-sm font-medium text-gray-700">Guests</label>
            <div class="relative">
              <i class="fas fa-users absolute left-3 top-3 text-gray-400"></i>
              <select name="guests" class="w-full pl-10 py-2 bg-gray-50 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500">
                <option value="1">1 Guest</option>
                <option value="2">2 Guests</option>
                <option value="3">3 Guests</option>
                <option value="4">4 Guests</option>
                <option value="5">5+ Guests</option>
              </select>
            </div>
          </div>
        </div>
        
        <div class="mt-6 flex justify-center">
          <button type="submit" class="px-8 py-4 bg-teal-600 hover:bg-teal-700 text-white rounded-md font-medium">
            Search Hotels
          </button>
        </div>
      </form>
    </div>

    <!-- Popular Destinations -->
    <section class="py-12">
      <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Popular Destinations</h2>
        <a href="destinations.html" class="text-teal-600 hover:text-teal-700 font-medium">
          View all destinations
        </a>
      </div>
      
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Destination 1 -->
        <a href="search.html?destination=Marrakech" class="group">
          <div class="relative h-64 rounded-xl overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent z-10"></div>
            <img 
              src="https://images.unsplash.com/photo-1597211833712-5e41faa202ea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" 
              alt="Marrakech" 
              class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
            />
            <div class="absolute bottom-0 left-0 p-4 z-20 w-full">
              <h3 class="text-xl font-bold text-white">Marrakech</h3>
              <p class="text-white/80">245 hotels</p>
            </div>
          </div>
        </a>

        <!-- Destination 2 -->
        <a href="search.html?destination=Casablanca" class="group">
          <div class="relative h-64 rounded-xl overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent z-10"></div>
            <img 
              src="https://images.unsplash.com/photo-1577147443647-81856d5151af?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" 
              alt="Casablanca" 
              class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
            />
            <div class="absolute bottom-0 left-0 p-4 z-20 w-full">
              <h3 class="text-xl font-bold text-white">Casablanca</h3>
              <p class="text-white/80">189 hotels</p>
            </div>
          </div>
        </a>

        <!-- Destination 3 -->
        <a href="search.html?destination=Rabat" class="group">
          <div class="relative h-64 rounded-xl overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent z-10"></div>
            <img 
              src="https://images.unsplash.com/photo-1570168767839-bab2ecd80350?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" 
              alt="Rabat" 
              class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
            />
            <div class="absolute bottom-0 left-0 p-4 z-20 w-full">
              <h3 class="text-xl font-bold text-white">Rabat</h3>
              <p class="text-white/80">120 hotels</p>
            </div>
          </div>
        </a>

        <!-- Destination 4 -->
        <a href="search.html?destination=Fes" class="group">
          <div class="relative h-64 rounded-xl overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent z-10"></div>
            <img 
              src="https://images.unsplash.com/photo-1548019840-df7993d6f76a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" 
              alt="Fes" 
              class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
            />
            <div class="absolute bottom-0 left-0 p-4 z-20 w-full">
              <h3 class="text-xl font-bold text-white">Fes</h3>
              <p class="text-white/80">98 hotels</p>
            </div>
          </div>
        </a>
      </div>
    </section>

    <!-- Featured Hotels -->
    <section class="py-12">
      <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Featured Hotels</h2>
        <a href="search.html" class="text-teal-600 hover:text-teal-700 font-medium">
          View all hotels
        </a>
      </div>
      
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Hotel 1 -->
        <a href="hotel-details.html?id=1" class="group">
          <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
            <div class="relative h-48 w-full">
              <img 
                src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                alt="Luxury Palace Hotel" 
                class="w-full h-full object-cover"
              />
              <span class="absolute top-3 left-3 bg-teal-600 text-white text-xs px-2 py-1 rounded-full">
                Featured
              </span>
            </div>
            
            <div class="p-5">
              <h3 class="text-xl font-semibold text-gray-800 group-hover:text-teal-600 transition-colors">
                Luxury Palace Hotel
              </h3>
              <p class="text-gray-600 mb-3">Marrakech, Morocco</p>
              
              <div class="flex items-center mb-4">
                <div class="flex items-center text-yellow-500 mr-2">
                  <i class="fas fa-star"></i>
                  <span class="ml-1 text-sm font-medium">4.8</span>
                </div>
                <span class="text-sm text-gray-500">(245 reviews)</span>
              </div>
              
              <div class="flex justify-between items-center">
                <div>
                  <span class="text-xl font-bold text-gray-800">$120</span>
                  <span class="text-gray-600 text-sm"> / night</span>
                </div>
                <button class="text-teal-600 hover:text-teal-700 font-medium text-sm">
                  View Details
                </button>
              </div>
            </div>
          </div>
        </a>

        <!-- Hotel 2 -->
        <a href="hotel-details.html?id=2" class="group">
          <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
            <div class="relative h-48 w-full">
              <img 
                src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                alt="Ocean View Resort" 
                class="w-full h-full object-cover"
              />
              <span class="absolute top-3 left-3 bg-teal-600 text-white text-xs px-2 py-1 rounded-full">
                Featured
              </span>
            </div>
            
            <div class="p-5">
              <h3 class="text-xl font-semibold text-gray-800 group-hover:text-teal-600 transition-colors">
                Ocean View Resort
              </h3>
              <p class="text-gray-600 mb-3">Casablanca, Morocco</p>
              
              <div class="flex items-center mb-4">
                <div class="flex items-center text-yellow-500 mr-2">
                  <i class="fas fa-star"></i>
                  <span class="ml-1 text-sm font-medium">4.6</span>
                </div>
                <span class="text-sm text-gray-500">(189 reviews)</span>
              </div>
              
              <div class="flex justify-between items-center">
                <div>
                  <span class="text-xl font-bold text-gray-800">$95</span>
                  <span class="text-gray-600 text-sm"> / night</span>
                </div>
                <button class="text-teal-600 hover:text-teal-700 font-medium text-sm">
                  View Details
                </button>
              </div>
            </div>
          </div>
        </a>

        <!-- Hotel 3 -->
        <a href="hotel-details.html?id=3" class="group">
          <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
            <div class="relative h-48 w-full">
              <img 
                src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                alt="Mountain Retreat" 
                class="w-full h-full object-cover"
              />
              <span class="absolute top-3 left-3 bg-teal-600 text-white text-xs px-2 py-1 rounded-full">
                Featured
              </span>
            </div>
            
            <div class="p-5">
              <h3 class="text-xl font-semibold text-gray-800 group-hover:text-teal-600 transition-colors">
                Mountain Retreat
              </h3>
              <p class="text-gray-600 mb-3">Atlas Mountains, Morocco</p>
              
              <div class="flex items-center mb-4">
                <div class="flex items-center text-yellow-500 mr-2">
                  <i class="fas fa-star"></i>
                  <span class="ml-1 text-sm font-medium">4.9</span>
                </div>
                <span class="text-sm text-gray-500">(120 reviews)</span>
              </div>
              
              <div class="flex justify-between items-center">
                <div>
                  <span class="text-xl font-bold text-gray-800">$150</span>
                  <span class="text-gray-600 text-sm"> / night</span>
                </div>
                <button class="text-teal-600 hover:text-teal-700 font-medium text-sm">
                  View Details
                </button>
              </div>
            </div>
          </div>
        </a>
      </div>
    </section>

    <!-- Testimonials -->
    <section class="py-12">
      <h2 class="text-3xl font-bold text-gray-800 text-center mb-12">What Our Guests Say</h2>
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Testimonial 1 -->
        <div class="bg-white p-6 rounded-xl shadow-md">
          <div class="flex items-center mb-4">
            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
              <img 
                src="https://randomuser.me/api/portraits/women/44.jpg" 
                alt="Sarah Johnson" 
                class="w-full h-full object-cover"
              />
            </div>
            <div>
              <h3 class="font-semibold text-gray-800">Sarah Johnson</h3>
              <p class="text-sm text-gray-600">Stayed at Luxury Palace Hotel</p>
            </div>
          </div>
          
          <div class="flex mb-3 text-yellow-500">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          
          <p class="text-gray-700">Amazing experience! The hotel was exactly as described, and the staff was incredibly helpful. Will definitely book through this platform again.</p>
        </div>

        <!-- Testimonial 2 -->
        <div class="bg-white p-6 rounded-xl shadow-md">
          <div class="flex items-center mb-4">
            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
              <img 
                src="https://randomuser.me/api/portraits/men/32.jpg" 
                alt="Mohammed Ali" 
                class="w-full h-full object-cover"
              />
            </div>
            <div>
              <h3 class="font-semibold text-gray-800">Mohammed Ali</h3>
              <p class="text-sm text-gray-600">Stayed at Ocean View Resort</p>
            </div>
          </div>
          
          <div class="flex mb-3 text-yellow-500">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>
          
          <p class="text-gray-700">Great service and easy booking process. The hotel was clean and comfortable. The only issue was the Wi-Fi connection was a bit slow.</p>
        </div>

        <!-- Testimonial 3 -->
        <div class="bg-white p-6 rounded-xl shadow-md">
          <div class="flex items-center mb-4">
            <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
              <img 
                src="https://randomuser.me/api/portraits/women/68.jpg" 
                alt="Leila Benali" 
                class="w-full h-full object-cover"
              />
            </div>
            <div>
              <h3 class="font-semibold text-gray-800">Leila Benali</h3>
              <p class="text-sm text-gray-600">Stayed at Mountain Retreat</p>
            </div>
          </div>
          
          <div class="flex mb-3 text-yellow-500">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          
          <p class="text-gray-700">Perfect getaway! The booking process was seamless, and the hotel exceeded our expectations. The views were breathtaking!</p>
        </div>
      </div>
    </section>

    <!-- Newsletter -->
    <section class="py-12 bg-teal-50 rounded-xl my-12">
      <div class="text-center max-w-2xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">
          Get Exclusive Offers
        </h2>
        <p class="text-gray-600 mb-8">
          Subscribe to our newsletter and be the first to receive special deals and travel inspiration.
        </p>
        
        <form id="newsletter-form" class="flex flex-col sm:flex-row gap-3">
          <input
            type="email"
            placeholder="Your email address"
            class="flex-grow px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
            required
          />
          <button 
            type="submit" 
            class="bg-teal-600 hover:bg-teal-700 text-white px-6 py-2 rounded-md font-medium"
          >
            Subscribe
          </button>
        </form>
        
        <p class="text-sm text-gray-500 mt-4">
          We respect your privacy. Unsubscribe at any time.
        </p>
      </div>
    </section>
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

    // Newsletter form submission
    document.getElementById('newsletter-form').addEventListener('submit', function(e) {
      e.preventDefault();
      const email = this.querySelector('input[type="email"]').value;
      
      // Here you would typically send the email to your backend
      alert('Thank you for subscribing with: ' + email);
      
      // Reset form
      this.reset();
    });
  </script>
</body>
</html>