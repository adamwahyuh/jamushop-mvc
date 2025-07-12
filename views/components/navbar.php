<nav class="bg-gradient-to-r from-teal-600 to-teal-400 text-white sticky top-0 z-50 shadow">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">
      
      <!-- Logo + Nama Toko -->
      <div class="flex items-center space-x-2">
        <img src="../../asset/img/ginger-tea.png" alt="Logo" class="h-10 w-10 rounded-full shadow object-cover">
        <a href="../../" class="text-2xl font-bold tracking-wide hover:text-emerald-200 transition">
          NamaToko
        </a>
      </div>

      <!-- Search + Links -->
      <div class="flex-1 flex items-center justify-end space-x-2">
        
        <!-- Search -->
        <form action="/" method="get" class="relative hidden md:block flex-1 max-w-xs">
          <input
            type="text"
            id="search-box"
            name="search"
            placeholder="Cari bahan..."
            class="pl-10 pr-4 h-10 w-full rounded-full bg-white text-gray-700 placeholder-gray-400 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-emerald-400"
          />
          <i class="bi bi-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        </form>

        <!-- Chest -->
        <a href="../../pages/racikan" class="hidden md:flex items-center justify-center h-10 w-10 hover:text-emerald-200 transition">
          <i class="bi bi-archive text-2xl"></i>
        </a>

        <!-- Cart -->
        <div class="relative hidden md:flex items-center justify-center h-10 w-10">
          <a href="../../../pages/keranjang.php" class="hover:text-emerald-200 transition">
            <i class="bi bi-cup-hot text-2xl"></i>
          </a>
          <span class="absolute top-[-3px] -right-1.5 bg-red-500 text-white text-xs rounded-full px-1">
            3
          </span>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-btn" class="md:hidden flex items-center justify-center h-10 w-10 hover:text-emerald-200 focus:outline-none">
          <i class="bi bi-list text-2xl"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
    <div class="mt-4 space-y-2">
      <form action="/" method="get" class="relative">
        <input
          type="text"
          id="search-box"
          name="search"
          placeholder="Cari bahan..."
          class="pl-10 pr-4 py-2 w-full rounded-full bg-white text-gray-700 placeholder-gray-400 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-emerald-400"
        />
        <i class="bi bi-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
      </form>

      <a href="../../pages/racikan" class="block text-white hover:bg-emerald-700 px-3 py-2 rounded transition">
        <i class="bi bi-archive mr-2"></i> Racikan
      </a>
      <a href="../../../pages/keranjang.php" class="block text-white hover:bg-emerald-700 px-3 py-2 rounded transition">
        <i class="bi bi-cart mr-2"></i> Keranjang
        <span class="ml-2 inline-block bg-red-500 text-white text-xs rounded-full px-1">3</span>
      </a>
    </div>
  </div>
</nav>

<script>
  const btn = document.getElementById('mobile-menu-btn');
  const menu = document.getElementById('mobile-menu');

  btn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
    menu.classList.toggle('animate-slide-down');
  });
</script>

<style>
  @keyframes slide-down {
    from { transform: translateY(-10px); opacity: 0; }
    to   { transform: translateY(0); opacity: 1; }
  }
  .animate-slide-down {
    animation: slide-down 0.3s ease-out forwards;
  }
</style>
