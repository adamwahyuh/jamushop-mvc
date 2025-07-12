<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Jamushop</title>
  <link rel="stylesheet" href="./../asset/css/app.css" />
  <link rel="stylesheet" href="../asset/css/linker.css" />
</head>
<body class="bg-gray-50">
  <header>
    <?php include __DIR__ . "/components/navbar.php"; ?>
  </header>

   <main class="cart-main max-w-6xl mx-auto p-6 min-h-screen">
    <h2 class="text-3xl font-bold text-emerald-700 mb-8">Cangkir Kamu</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Cart Items -->
        <div class="md:col-span-2">
        <div class="flex flex-col gap-6">
            <!-- Cart Item -->
            <div class="cart-item flex gap-4 bg-white rounded-xl shadow p-4">
            <div class="cart-item-img w-24 h-24 flex-shrink-0">
                <img
                src="./../asset/img/jahe.png"
                alt="Nama Bahan"
                class="w-full h-full object-cover rounded-lg"
                />
            </div>
            <div class="flex-1 flex flex-col justify-between">
                <div>
                <h3 class="text-lg font-bold text-gray-800">
                    Kunyit Asam
                </h3>
                <span class="inline-block mt-1 px-2 py-1 bg-emerald-100 text-emerald-700 text-xs rounded">
                    Jamu Herbal
                </span>
                </div>
                <div class="flex justify-between items-center mt-3">
                <form class="flex items-center gap-2">
                    <button
                    type="button"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 w-8 h-8 rounded-full text-lg flex items-center justify-center"
                    >−</button>
                    <span class="text-base font-semibold w-8 text-center">2</span>
                    <button
                    type="button"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 w-8 h-8 rounded-full text-lg flex items-center justify-center"
                    >+</button>
                </form>
                <div class="cart-item-price text-emerald-600 font-bold">
                    Rp 12.000
                </div>
                </div>
            </div>
            <a href="#" class="text-red-500 hover:text-red-700 text-xl">
                <i class="bi bi-trash3-fill"></i> 
            </a>
            </div>
            <!-- Cart Item -->
            <div class="cart-item flex gap-4 bg-white rounded-xl shadow p-4">
            <div class="cart-item-img w-24 h-24 flex-shrink-0">
                <img
                src="./../asset/img/jahe.png"
                alt="Nama Bahan"
                class="w-full h-full object-cover rounded-lg"
                />
            </div>
            <div class="flex-1 flex flex-col justify-between">
                <div>
                <h3 class="text-lg font-bold text-gray-800">
                    Kunyit Asam
                </h3>
                <span class="inline-block mt-1 px-2 py-1 bg-emerald-100 text-emerald-700 text-xs rounded">
                    Jamu Herbal
                </span>
                </div>
                <div class="flex justify-between items-center mt-3">
                <form class="flex items-center gap-2">
                    <button
                    type="button"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 w-8 h-8 rounded-full text-lg flex items-center justify-center"
                    >−</button>
                    <span class="text-base font-semibold w-8 text-center">2</span>
                    <button
                    type="button"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 w-8 h-8 rounded-full text-lg flex items-center justify-center"
                    >+</button>
                </form>
                <div class="cart-item-price text-emerald-600 font-bold">
                    Rp 12.000
                </div>
                </div>
            </div>
            <a href="#" class="text-red-500 hover:text-red-700 text-xl">
                <i class="bi bi-trash3-fill"></i> 
            </a>
            </div>

            
        </div>
        </div>

        <!-- Cart Summary -->
        <div class="cart-summary bg-white rounded-xl shadow p-6 h-fit">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Details</h2>
        <div class="flex justify-between text-gray-700 mb-2">
            <span>Subtotal</span>
            <span>Rp 19.500</span>
        </div>
        <div class="flex justify-between font-bold text-lg text-gray-900 border-t border-gray-200 pt-3">
            <span>Total</span>
            <span>Rp 19.500</span>
        </div>
        <a
            href="#"
            class="block mt-6 w-full text-center bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 rounded transition"
            onclick="return confirm('Pay?')"
        >
            Checkout
        </a>
        </div>
    </div>

    <!-- Empty State -->
    <div class="text-center mt-12 hidden">
        <h2 class="text-xl text-gray-500">Cangkir mu kosong.. Total Harga = Rp 0</h2>
    </div>
  </main>

  <footer class="bg-gray-900 text-gray-300 py-8">
    <?php include __DIR__ . "/components/footer.php"; ?>
  </footer>

  <script src="../asset/js/cangkirController.js"></script>
</body>
</html>
