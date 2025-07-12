<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Jamushop</title>
  <link rel="stylesheet" href="./../asset/css/app.css" />
  <link rel="stylesheet" href="../asset/css/linker.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-gray-50">
  <header>
    <?php include __DIR__ . "/components/navbar.php"; ?>
  </header>

  <main class="cart-main max-w-6xl mx-auto p-6 min-h-screen">
    <h2 class="text-3xl font-bold text-emerald-700 mb-8">Cangkir Kamu</h2>

    <div id="cart-container" class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Cart Items (injected by JS) -->
    </div>

    <!-- Empty State -->
    <div id="empty-cart" class="text-center mt-12 hidden">
      <h2 class="text-xl text-gray-500">Cangkir mu kosong.. Total Harga = Rp 0</h2>
    </div>
  </main>

  <footer class="bg-gray-900 text-gray-300 py-8">
    <?php include __DIR__ . "/components/footer.php"; ?>
  </footer>

<script src="../asset/js/keranjangController.js"></script>
</body>
</html>
