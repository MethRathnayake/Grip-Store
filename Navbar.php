<nav class="bg-white border-b border-gray-200">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <!-- Mobile menu button -->
      <button id="mobile-menu-button" class="sm:hidden p-2 text-gray-500 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500">
        <span class="sr-only">Open main menu</span>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
      </button>

      <!-- Logo and navigation links -->
      <div class="flex items-center">
        <a href="index.php"><img class="h-12 w-auto rounded-full" src="Resorces/icon.ico" alt="Company Logo"></a>
        <div class="hidden sm:flex space-x-4 ml-6">
          <a href="index.php" class="text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">Home</a>
          <a href="watchlist.php" class="text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">Watch List</a>
          <a href="#" class="text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">Payment History</a>
          <a href="cart.php" class="text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium"><i class="fas fa-shopping-cart"></i> Cart</a>
        </div>
      </div>

      <!-- User menu -->
      <div class="flex items-center space-x-4">
        <button class="p-1 text-gray-500 hover:text-gray-700 focus:ring-2 focus:ring-blue-500">
        Orders <i class="fa-solid fa-truck-fast"></i>
        </button>

        <!-- Profile button (visible on all screens) -->
        <div class="relative">
          <button id="profile-button" class="flex items-center rounded-full focus:ring-2 focus:ring-blue-500">
            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User Menu">
          </button>

          <!-- Profile dropdown for desktop (hidden by default) -->
          <div id="profile-menu-desktop" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-10">
            <a href="#" class="block text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">Profile</a>
            <a href="#" class="block text-red-700 hover:bg-red-100 px-3 py-2 rounded-md text-sm font-medium">Sign Out <i class="fa-solid fa-right-from-bracket"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile menu (navigation) -->
  <div class="hidden sm:hidden px-2 pt-2 pb-3" id="mobile-menu">
    <a href="index.php" class="block text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md text-base font-medium">Home</a>
    <a href="watchlist.php" class="block text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md text-base font-medium">Watch List</a>
    <a href="#" class="block text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md text-base font-medium">Payment History</a>
    <a href="cart.php" class="block text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md text-base font-medium"><i class="fas fa-shopping-cart"></i> Cart</a>
  </div>

  <!-- Profile menu (mobile only, hidden by default) -->
  <div class="hidden sm:hidden px-2 pt-2 pb-3" id="profile-menu-mobile">
    <a href="#" class="block text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md text-base font-medium">Profile</a>
    <a href="#" class="block text-red-700 hover:bg-red-100 px-3 py-2 rounded-md text-base font-medium">Sign Out <i class="fa-solid fa-right-from-bracket"></i></a>
  </div>
</nav>

<script>
  // Mobile menu toggle
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const mobileMenu = document.getElementById('mobile-menu');
  mobileMenuButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });

  // Profile menu toggle
  const profileButton = document.getElementById('profile-button');
  const profileMenuMobile = document.getElementById('profile-menu-mobile');
  const profileMenuDesktop = document.getElementById('profile-menu-desktop');

  profileButton.addEventListener('click', () => {
    if (window.innerWidth < 640) { 
      profileMenuMobile.classList.toggle('hidden');
      profileMenuDesktop.classList.add('hidden'); 
    } else {
      profileMenuDesktop.classList.toggle('hidden');
      profileMenuMobile.classList.add('hidden'); 
    }
  });

  document.addEventListener('click', (event) => {
    if (!profileButton.contains(event.target) && !profileMenuMobile.contains(event.target) && !profileMenuDesktop.contains(event.target)) {
      profileMenuMobile.classList.add('hidden');
      profileMenuDesktop.classList.add('hidden');
    }
  });
</script>