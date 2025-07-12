<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jamushop</title>
    <link rel="stylesheet" href="./../asset/css/app.css">
    <link rel="stylesheet" href="../asset/css/linker.css">
</head>
<body>
    <header>
        <?php include __DIR__ . "/components/navbar.php"; ?>
    </header>
    <main class="min-h-screen">
          <div id="bahan-container" class="grid grid-cols-1 md:grid-cols-3 gap-4"></div>
    </main>

    <footer class="bg-gray-900 text-gray-300 py-8">
        <?php include __DIR__ . "/components/footer.php"; ?>
    </footer>

</body>
</html>