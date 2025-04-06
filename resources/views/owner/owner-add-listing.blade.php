<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Listing - StayEase</title>
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
            <a href="owner-add-listing.html" class="flex items-center px-2 py-2 text-sm font-medium text-white bg-gray-700 rounded-md group">
              <i class="fas fa-plus-circle mr-3 text-gray-300"></i>
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
            <a href="owner-dashboard.html" class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
              <i class="fas fa-tachometer-alt mr-3 text-gray-400"></i>
              Dashboard
            </a>
            <a href="owner-listings.html" class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
              <i class="fas fa-building mr-3 text-gray-400"></i>
              My Listings
            </a>
            <a href="owner-add-listing.html" class="flex items-center px-2 py-2 text-base font-medium text-white bg-gray-700 rounded-md">
              <i class="fas fa-plus-circle mr-3 text-gray-300"></i>
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
            <h1 class="text-xl font-semibold text-gray-900 ml-2 md:ml-0">Add New Listing</h1>
          </div>
          <div class="flex items-center">
            <button type="button" id="save-draft-button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 mr-3">
              Save as Draft
            </button>
            <button type="submit" form="add-listing-form" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
              Publish Listing
            </button>
          </div>
        </div>
      </header>

      <!-- Main content area -->
      <main class="flex-1 overflow-y-auto bg-gray-50 p-4 sm:p-6 lg:p-8">
        <!-- Progress steps -->
        <div class="mb-8">
          <div class="flex items-center justify-between">
            <div class="w-full bg-gray-200 rounded-full h-2.5">
              <div class="bg-teal-600 h-2.5 rounded-full" style="width: 0%"></div>
            </div>
          </div>
          <div class="flex justify-between mt-2">
            <div class="flex flex-col items-center">
              <div class="w-8 h-8 flex items-center justify-center rounded-full bg-teal-600 text-white">
                <i class="fas fa-check"></i>
              </div>
              <span class="text-xs mt-1 text-gray-600">Basic Info</span>
            </div>
            <div class="flex flex-col items-center">
              <div class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-300 text-gray-500">
                2
              </div>
              <span class="text-xs mt-1 text-gray-600">Details</span>
            </div>
            <div class="flex flex-col items-center">
              <div class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-300 text-gray-500">
                3
              </div>
              <span class="text-xs mt-1 text-gray-600">Photos</span>
            </div>
            <div class="flex flex-col items-center">
              <div class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-300 text-gray-500">
                4
              </div>
              <span class="text-xs mt-1 text-gray-600">Amenities</span>
            </div>
            <div class="flex flex-col items-center">
              <div class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-300 text-gray-500">
                5
              </div>
              <span class="text-xs mt-1 text-gray-600">Location</span>
            </div>
            <div class="flex flex-col items-center">
              <div class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-300 text-gray-500">
                6
              </div>
              <span class="text-xs mt-1 text-gray-600">Pricing</span>
            </div>
          </div>
        </div>

        <!-- Form -->
        <form id="add-listing-form" class="space-y-8">
          <!-- Basic Information -->
          <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-medium text-gray-900 mb-6">Basic Information</h2>
            
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
              <div>
                <label for="property-name" class="block text-sm font-medium text-gray-700">Property Name *</label>
                <input type="text" id="property-name" name="property-name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm" placeholder="e.g. Luxury Palace Hotel">
                <p class="mt-1 text-xs text-gray-500">This is how your property will appear to guests</p>
              </div>
              
              <div>
                <label for="property-type" class="block text-sm font-medium text-gray-700">Property Type *</label>
                <select id="property-type" name="property-type" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                  <option value="">Select property type</option>
                  <option value="hotel">Hotel</option>
                  <option value="riad">Riad</option>
                  <option value="resort">Resort</option>
                  <option value="apartment">Apartment</option>
                  <option value="villa">Villa</option>
                  <option value="guesthouse">Guesthouse</option>
                  <option value="hostel">Hostel</option>
                </select>
              </div>
              
              <div class="sm:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700">Property Description *</label>
                <textarea id="description" name="description" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm" placeholder="Describe your property, its unique features, and what makes it special..."></textarea>
                <p class="mt-1 text-xs text-gray-500">Minimum 100 characters. Include key features, atmosphere, and nearby attractions.</p>
              </div>
              
              <div>
                <label for="total-rooms" class="block text-sm font-medium text-gray-700">Total Rooms *</label>
                <input type="number" id="total-rooms" name="total-rooms" min="1" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
              </div>
              
              <div>
                <label for="max-guests" class="block text-sm font-medium text-gray-700">Maximum Guests *</label>
                <input type="number" id="max-guests" name="max-guests" min="1" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
              </div>
              
              <div>
                <label for="check-in-time" class="block text-sm font-medium text-gray-700">Check-in Time *</label>
                <select id="check-in-time" name="check-in-time" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                  <option value="">Select time</option>
                  <option value="12:00">12:00 PM</option>
                  <option value="13:00">1:00 PM</option>
                  <option value="14:00" selected>2:00 PM</option>
                  <option value="15:00">3:00 PM</option>
                  <option value="16:00">4:00 PM</option>
                  <option value="17:00">5:00 PM</option>
                  <option value="18:00">6:00 PM</option>
                </select>
              </div>
              
              <div>
                <label for="check-out-time" class="block text-sm font-medium text-gray-700">Check-out Time *</label>
                <select id="check-out-time" name="check-out-time" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                  <option value="">Select time</option>
                  <option value="10:00">10:00 AM</option>
                  <option value="11:00">11:00 AM</option>
                  <option value="12:00" selected>12:00 PM</option>
                  <option value="13:00">1:00 PM</option>
                  <option value="14:00">2:00 PM</option>
                </select>
              </div>
              
              <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Property Status</label>
                <div class="mt-2 space-y-4">
                  <div class="flex items-center">
                    <input id="status-active" name="status" type="radio" value="active" checked class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300">
                    <label for="status-active" class="ml-3 block text-sm font-medium text-gray-700">
                      Active (Immediately visible to guests)
                    </label>
                  </div>
                  <div class="flex items-center">
                    <input id="status-draft" name="status" type="radio" value="draft" class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300">
                    <label for="status-draft" class="ml-3 block text-sm font-medium text-gray-700">
                      Draft (Save now, publish later)
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Navigation buttons -->
          <div class="flex justify-end space-x-4">
            <button type="button" id="cancel-button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
              Cancel
            </button>
            <button type="button" id="next-button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
              Next: Property Details
              <i class="fas fa-arrow-right ml-2"></i>
            </button>
          </div>
        </form>
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

    // Form navigation
    document.getElementById('next-button').addEventListener('click', function() {
      // Validate current step
      const form = document.getElementById('add-listing-form');
      const requiredFields = form.querySelectorAll('[required]');
      let isValid = true;
      
      requiredFields.forEach(field => {
        if (!field.value) {
          isValid = false;
          field.classList.add('border-red-500');
        } else {
          field.classList.remove('border-red-500');
        }
      });
      
      if (isValid) {
        // In a real app, this would navigate to the next step
        alert('Form is valid! In a real app, this would proceed to the next step.');
        
        // Update progress bar
        const progressBar = document.querySelector('.bg-teal-600');
        progressBar.style.width = '20%';
        
        // Update step indicators
        const steps = document.querySelectorAll('.rounded-full');
        steps[1].classList.remove('bg-gray-300', 'text-gray-500');
        steps[1].classList.add('bg-teal-600', 'text-white');
      } else {
        alert('Please fill in all required fields before proceeding.');
      }
    });

    // Cancel button
    document.getElementById('cancel-button').addEventListener('click', function() {
      if (confirm('Are you sure you want to cancel? Any unsaved changes will be lost.')) {
        window.location.href = 'owner-listings.html';
      }
    });

    // Save draft button
    document.getElementById('save-draft-button').addEventListener('click', function() {
      // In a real app, this would save the form data as a draft
      alert('Your listing has been saved as a draft.');
    });
  </script>
</body>
</html>