<nav class="bg-white shadow-md sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo + Nama Toko -->
                <div class="flex items-center">
                <img src="../../asset/img/ginger-tea.png" alt="Logo" class="h-10 w-auto mr-2">
                <a href="../../" class="text-xl font-bold text-gray-800 hover:text-teal-600">NamaToko</a>
                </div>

                <!-- Desktop menu -->
                <div class="hidden md:flex md:items-center md:space-x-4">
                <!-- Search -->
                <form action="/" method="get" class="relative">
                    <input type="text" name="search" placeholder="Cari bahan..."
                    class="pl-10 pr-4 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500">
                    <div class="absolute left-3 top-2.5 text-gray-400 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    </div>
                </form>

                <!-- Chest -->
                <a href="../../pages/racikan" class="text-gray-600 hover:text-teal-600 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4h16v2H4V4zm2 3h12v13H6V7z" />
                    </svg>
                </a>

                <!-- Cart -->
                <div class="relative">
                    <a href="../../../pages/keranjang.php" class="text-gray-600 hover:text-teal-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.4 5H19m-6 0a2 2 0 100 4 2 2 0 000-4zm-6 0a2 2 0 100 4 2 2 0 000-4z" />
                    </svg>
                    </a>
                    <!-- Badge -->
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full px-1.5">
                    3
                    </span>
                </div>
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                <button id="mobile-menu-button" class="text-gray-600 hover:text-teal-600 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                </div>
            </div>
            </div>

            <!-- Mobile menu (hidden by default) -->
            <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
            <form action="/" method="get" class="mt-2 relative">
                <input type="text" name="search" placeholder="Cari bahan..."
                class="pl-10 pr-4 py-2 w-full border rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500">
                <div class="absolute left-3 top-2.5 text-gray-400 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                </div>
            </form>
            <div class="mt-4 space-y-2">
                <a href="../../pages/racikan" class="block text-gray-700 hover:bg-teal-100 px-3 py-2 rounded-md">
                Racikan
                </a>
                <a href="../../../pages/keranjang.php" class="block text-gray-700 hover:bg-teal-100 px-3 py-2 rounded-md">
                Keranjang
                <span class="ml-2 inline-block bg-red-500 text-white text-xs rounded-full px-1.5">3</span>
                </a>
            </div>
            </div>
        </nav>

  <script>
    const btn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });
  </script>