<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messages - StayEase</title>
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
            <a href="owner-messages.html" class="flex items-center px-2 py-2 text-sm font-medium text-white bg-gray-700 rounded-md group">
              <i class="fas fa-envelope mr-3 text-gray-300"></i>
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
            <a href="owner-analytics.html" class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
              <i class="fas fa-chart-line mr-3 text-gray-400"></i>
              Analytics
            </a>
            <a href="owner-messages.html" class="flex items-center px-2 py-2 text-base font-medium text-white bg-gray-700 rounded-md">
              <i class="fas fa-envelope mr-3 text-gray-300"></i>
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
            <h1 class="text-xl font-semibold text-gray-900 ml-2 md:ml-0">Messages</h1>
          </div>
          <div class="flex items-center">
            <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
              <i class="fas fa-plus mr-2"></i>
              New Message
            </button>
          </div>
        </div>
      </header>

      <!-- Main content area -->
      <main class="flex-1 overflow-hidden bg-gray-50">
        <div class="h-full flex">
          <!-- Message list -->
          <div class="w-full md:w-1/3 lg:w-1/4 bg-white border-r border-gray-200 overflow-y-auto">
            <!-- Search -->
            <div class="p-4 border-b border-gray-200">
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" id="search-messages" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-teal-500 focus:border-teal-500 sm:text-sm" placeholder="Search messages...">
              </div>
            </div>
            
            <!-- Filter tabs -->
            <div class="flex border-b border-gray-200">
              <button class="flex-1 py-3 px-4 text-center text-sm font-medium text-teal-600 border-b-2 border-teal-500">
                All
              </button>
              <button class="flex-1 py-3 px-4 text-center text-sm font-medium text-gray-500 hover:text-gray-700">
                Unread
                <span class="ml-1 bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">3</span>
              </button>
              <button class="flex-1 py-3 px-4 text-center text-sm font-medium text-gray-500 hover:text-gray-700">
                Starred
              </button>
            </div>
            
            <!-- Message list -->
            <div class="divide-y divide-gray-200">
              <!-- Message 1 - Active/Selected -->
              <div class="px-4 py-3 bg-teal-50 border-l-4 border-teal-500 cursor-pointer">
                <div class="flex justify-between items-start">
                  <div class="flex items-start">
                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Johnson">
                    <div class="ml-3">
                      <p class="text-sm font-medium text-gray-900">Sarah Johnson</p>
                      <p class="text-xs text-gray-500">Luxury Palace Hotel</p>
                    </div>
                  </div>
                  <div class="flex flex-col items-end">
                    <span class="text-xs text-gray-500">10:23 AM</span>
                    <span class="mt-1 bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">New</span>
                  </div>
                </div>
                <p class="mt-1 text-sm text-gray-600 line-clamp-2">Hi Ahmed, I have a question about my upcoming reservation at Luxury Palace Hotel. I was wondering if it would be possible to...</p>
              </div>
              
              <!-- Message 2 -->
              <div class="px-4 py-3 hover:bg-gray-50 cursor-pointer">
                <div class="flex justify-between items-start">
                  <div class="flex items-start">
                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="Michael Davis">
                    <div class="ml-3">
                      <p class="text-sm font-medium text-gray-900">Michael Davis</p>
                      <p class="text-xs text-gray-500">Kasbah Retreat</p>
                    </div>
                  </div>
                  <div class="flex flex-col items-end">
                    <span class="text-xs text-gray-500">Yesterday</span>
                    <span class="mt-1 bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">New</span>
                  </div>
                </div>
                <p class="mt-1 text-sm text-gray-600 line-clamp-2">Hello, I'm planning to check in late tomorrow night, around 11 PM. Will someone be available at the front desk to...</p>
              </div>
              
              <!-- Message 3 -->
              <div class="px-4 py-3 hover:bg-gray-50 cursor-pointer">
                <div class="flex justify-between items-start">
                  <div class="flex items-start">
                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/22.jpg" alt="Emily Rodriguez">
                    <div class="ml-3">
                      <p class="text-sm font-medium text-gray-900">Emily Rodriguez</p>
                      <p class="text-xs text-gray-500">Mountain View Resort</p>
                    </div>
                  </div>
                  <div class="flex flex-col items-end">
                    <span class="text-xs text-gray-500">Yesterday</span>
                    <span class="mt-1 bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">New</span>
                  </div>
                </div>
                <p class="mt-1 text-sm text-gray-600 line-clamp-2">Thank you for the wonderful stay at Mountain View Resort! I left my charger in the room. Is there any way you could...</p>
              </div>
              
              <!-- Message 4 -->
              <div class="px-4 py-3 hover:bg-gray-50 cursor-pointer">
                <div class="flex justify-between items-start">
                  <div class="flex items-start">
                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/67.jpg" alt="James Brown">
                    <div class="ml-3">
                      <p class="text-sm font-medium text-gray-900">James Brown</p>
                      <p class="text-xs text-gray-500">City Center Apartment</p>
                    </div>
                  </div>
                  <div class="flex flex-col items-end">
                    <span class="text-xs text-gray-500">Oct 20</span>
                  </div>
                </div>
                <p class="mt-1 text-sm text-gray-600 line-clamp-2">I'm interested in extending my stay at the City Center Apartment for an additional 3 nights. Is the apartment still...</p>
              </div>
              
              <!-- Message 5 -->
              <div class="px-4 py-3 hover:bg-gray-50 cursor-pointer">
                <div class="flex justify-between items-start">
                  <div class="flex items-start">
                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/56.jpg" alt="Laura Martinez">
                    <div class="ml-3">
                      <p class="text-sm font-medium text-gray-900">Laura Martinez</p>
                      <p class="text-xs text-gray-500">Riad Elegance</p>
                    </div>
                  </div>
                  <div class="flex flex-col items-end">
                    <span class="text-xs text-gray-500">Oct 18</span>
                    <span class="mt-1 text-yellow-500">
                      <i class="fas fa-star"></i>
                    </span>
                  </div>
                </div>
                <p class="mt-1 text-sm text-gray-600 line-clamp-2">We're a group of 6 people looking to book 3 rooms at Riad Elegance for the first week of December. Do you offer any...</p>
              </div>
              
              <!-- Message 6 -->
              <div class="px-4 py-3 hover:bg-gray-50 cursor-pointer">
                <div class="flex justify-between items-start">
                  <div class="flex items-start">
                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/22.jpg" alt="Robert Taylor">
                    <div class="ml-3">
                      <p class="text-sm font-medium text-gray-900">Robert Taylor</p>
                      <p class="text-xs text-gray-500">Luxury Palace Hotel</p>
                    </div>
                  </div>
                  <div class="flex flex-col items-end">
                    <span class="text-xs text-gray-500">Oct 15</span>
                  </div>
                </div>
                <p class="mt-1 text-sm text-gray-600 line-clamp-2">I wanted to thank you for the excellent service during my stay last month. I'm planning to visit again in January...</p>
              </div>
            </div>
          </div>
          
          <!-- Message content -->
          <div class="hidden md:flex md:flex-col md:w-2/3 lg:w-3/4 bg-white">
            <!-- Message header -->
            <div class="p-4 border-b border-gray-200 flex justify-between items-center">
              <div class="flex items-center">
                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Johnson">
                <div class="ml-3">
                  <p class="text-sm font-medium text-gray-900">Sarah Johnson</p>
                  <p class="text-xs text-gray-500">Luxury Palace Hotel • Reservation #BK12345</p>
                </div>
              </div>
              <div class="flex space-x-2">
                <button class="text-gray-400 hover:text-gray-500">
                  <i class="fas fa-star"></i>
                </button>
                <button class="text-gray-400 hover:text-gray-500">
                  <i class="fas fa-archive"></i>
                </button>
                <div class="relative" data-dropdown-id="message-actions">
                  <button class="text-gray-400 hover:text-gray-500 dropdown-button">
                    <i class="fas fa-ellipsis-v"></i>
                  </button>
                  <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden dropdown-menu z-10">
                    <div class="py-1">
                      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mark as Unread</a>
                      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Move to Archive</a>
                      <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Delete Conversation</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Message thread -->
            <div class="flex-1 p-4 overflow-y-auto">
              <div class="space-y-6">
                <!-- Guest message -->
                <div class="flex">
                  <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Johnson">
                  <div class="ml-3 bg-gray-100 rounded-lg p-3 max-w-md">
                    <div class="flex justify-between items-center mb-1">
                      <span class="text-sm font-medium text-gray-900">Sarah Johnson</span>
                      <span class="text-xs text-gray-500">10:23 AM</span>
                    </div>
                    <p class="text-sm text-gray-800">
                      Hi Ahmed, I have a question about my upcoming reservation at Luxury Palace Hotel. I was wondering if it would be possible to arrange an airport pickup service? My flight arrives at 2 PM on October 15th. Also, do you offer any special packages for honeymoon couples?
                    </p>
                  </div>
                </div>
                
                <!-- Your message -->
                <div class="flex justify-end">
                  <div class="mr-3 bg-teal-100 rounded-lg p-3 max-w-md">
                    <div class="flex justify-between items-center mb-1">
                      <span class="text-sm font-medium text-gray-900">You</span>
                      <span class="text-xs text-gray-500">10:45 AM</span>
                    </div>
                    <p class="text-sm text-gray-800">
                      Hello Sarah, thank you for your message. Yes, we do offer airport pickup services for our guests. The cost is $30 for a standard car or $50 for a luxury vehicle. And congratulations on your honeymoon! We have a special honeymoon package that includes a romantic dinner, spa treatment for two, and room decoration. Would you like me to add these services to your reservation?
                    </p>
                  </div>
                  <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="You">
                </div>
                
                <!-- Guest message -->
                <div class="flex">
                  <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Johnson">
                  <div class="ml-3 bg-gray-100 rounded-lg p-3 max-w-md">
                    <div class="flex justify-between items-center mb-1">
                      <span class="text-sm font-medium text-gray-900">Sarah Johnson</span>
                      <span class="text-xs text-gray-500">11:02 AM</span>
                    </div>
                    <p class="text-sm text-gray-800">
                      That sounds perfect! Yes, please add the airport pickup service with the luxury vehicle option. And the honeymoon package sounds wonderful - please add that as well. How much does the honeymoon package cost? And is there anything else you would recommend for a special stay?
                    </p>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Message input -->
            <div class="p-4 border-t border-gray-200">
              <div class="flex items-center">
                <div class="flex-1">
                  <textarea rows="3" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm" placeholder="Type your message..."></textarea>
                </div>
              </div>
              <div class="mt-3 flex justify-between items-center">
                <div class="flex space-x-2">
                  <button class="inline-flex items-center px-2 py-1 text-sm text-gray-500 hover:text-gray-700">
                    <i class="fas fa-paperclip mr-1"></i>
                    Attach
                  </button>
                  <button class="inline-flex items-center px-2 py-1 text-sm text-gray-500 hover:text-gray-700">
                    <i class="fas fa-smile mr-1"></i>
                    Emoji
                  </button>
                  <button class="inline-flex items-center px-2 py-1 text-sm text-gray-500 hover:text-gray-700">
                    <i class="fas fa-reply-all mr-1"></i>
                    Templates
                  </button>
                </div>
                <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                  Send
                  <i class="fas fa-paper-plane ml-2"></i>
                </button>
              </div>
            </div>
          </div>
          
          <!-- Empty state for mobile -->
          <div class="flex flex-col items-center justify-center w-full h-full bg-white md:hidden">
            <div class="text-center p-6">
              <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-teal-100">
                <i class="fas fa-envelope text-teal-600"></i>
              </div>
              <h3 class="mt-2 text-sm font-medium text-gray-900">Select a conversation</h3>
              <p class="mt-1 text-sm text-gray-500">
                Choose a conversation from the list to view messages
              </p>
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

    // Dropdown menus
    const dropdownButtons = document.querySelectorAll('.dropdown-button');
    dropdownButtons.forEach(button => {
      button.addEventListener('click', function(e) {
        e.stopPropagation();
        const dropdown = this.closest('.relative').querySelector('.dropdown-menu');
        
        // Close all other dropdowns
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
          if (menu !== dropdown) {
            menu.classList.add('hidden');
          }
        });
        
        // Toggle current dropdown
        dropdown.classList.toggle('hidden');
      });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function() {
      document.querySelectorAll('.dropdown-menu').forEach(menu => {
        menu.classList.add('hidden');
      });
    });

    // Search functionality
    document.getElementById('search-messages').addEventListener('input', function() {
      // In a real app, this would search the messages
      console.log('Search term:', this.value);
    });
  </script>
</body>
</html>