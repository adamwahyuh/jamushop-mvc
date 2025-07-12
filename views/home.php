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

  <main class="min-h-screen py-10">
    <div class="max-w-7xl mx-auto px-4">
      <h1 class="text-3xl font-bold text-emerald-700 mb-8 text-center">
        Daftar Bahan Jamu
      </h1>

      <!-- Card -->
      <div id="bahan-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      </div>

      <p id="no-data"class="text-center text-gray-500 mt-8 hidden">
        Tidak ada data bahan... :(
      </p>
    </div>
  </main>

  <footer class="bg-gray-900 text-gray-300 py-8">
    <?php include __DIR__ . "/components/footer.php"; ?>
  </footer>

  <script src="../asset/js/bahanController.js"></script>
</body>
</html>
