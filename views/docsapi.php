<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>API Documentation</title>
    <link rel="stylesheet" href="/asset/css/app.css">
</head>
<body class="bg-gradient-to-r from-teal-600 to-teal-400 text-white min-h-screen flex flex-col items-center py-10">
    <div class="text-center mb-10">
        <h1 class="text-5xl md:text-6xl font-bold mb-2" style="color:#fff7ed;">API Documentation</h1>
        <p class="text-lg text-gray-200">Dokumentasi Endpoint untuk Bahan, Keranjang, dan Racikan</p>
    </div>

    <div class="w-full max-w-5xl px-4 space-y-8">
        <!-- BAHAN -->
        <section>
            <h2 class="text-3xl font-bold mb-4" style="color:#fff7ed;"># Bahan</h2>
            <div class="space-y-4">
                <div class="bg-white/10 backdrop-blur-md rounded-lg p-5 shadow">
                    <h3 class="text-xl font-semibold text-blue-300">GET : Semua Bahan</h3>
                    <pre class="bg-gray-900 text-green-400 rounded p-3 mt-2 overflow-auto">/api/v1/bahan</pre>
                </div>
                <div class="bg-white/10 backdrop-blur-md rounded-lg p-5 shadow">
                    <h3 class="text-xl font-semibold text-green-300">POST : Tambah Bahan</h3>
                    <pre class="bg-gray-900 text-green-400 rounded p-3 mt-2 overflow-auto">/api/v1/bahan/</pre>
                    <pre class="bg-gray-800 text-green-200 rounded p-3 mt-2 overflow-auto">
{
    "nama": "Jahe",
    "deskripsi": "Rasa pahit, bagus untuk daya tahan tubuh.",
    "harga": 1200,
    "jenis": "Bahan utama",
    "foto": "asset/img/jahe.png"
}
                    </pre>
                </div>
            </div>
        </section>

        <!-- KERANJANG -->
        <section>
            <h2 class="text-3xl font-bold mb-4" style="color:#fff7ed;"># Keranjang</h2>
            <div class="space-y-4">
                <div class="bg-white/10 backdrop-blur-md rounded-lg p-5 shadow">
                    <h3 class="text-xl font-semibold text-blue-300">GET : Semua Keranjang</h3>
                    <pre class="bg-gray-900 text-green-400 rounded p-3 mt-2 overflow-auto">/api/v1/keranjang</pre>
                </div>
                <div class="bg-white/10 backdrop-blur-md rounded-lg p-5 shadow">
                    <h3 class="text-xl font-semibold text-green-300">POST : Tambah Keranjang</h3>
                    <pre class="bg-gray-900 text-green-400 rounded p-3 mt-2 overflow-auto">/api/v1/keranjang/</pre>
                    <pre class="bg-gray-800 text-green-200 rounded p-3 mt-2 overflow-auto">
{
    "bahan_id": 5,
    "porsi": 10
}
                    </pre>
                </div>
            </div>
        </section>

        <!-- RACIKAN -->
        <section>
            <h2 class="text-3xl font-bold mb-4" style="color:#fff7ed;"># Racikan</h2>
            <div class="space-y-4">
                <div class="bg-white/10 backdrop-blur-md rounded-lg p-5 shadow">
                    <h3 class="text-xl font-semibold text-blue-300">GET : Semua Racikan</h3>
                    <pre class="bg-gray-900 text-green-400 rounded p-3 mt-2 overflow-auto">/api/v1/racikan</pre>
                </div>
                <div class="bg-white/10 backdrop-blur-md rounded-lg p-5 shadow">
                    <h3 class="text-xl font-semibold text-green-300">POST : Tambah Racikan</h3>
                    <pre class="bg-gray-900 text-green-400 rounded p-3 mt-2 overflow-auto">/api/v1/racikan/</pre>
                </div>
            </div>
        </section>
    </div>

    <!-- Tombol kembali -->
    <div class="mt-10">
        <a href="/" class="inline-block px-6 py-3 bg-emerald-800 text-white rounded hover:bg-indigo-700 transition">
            Kembali ke Beranda
        </a>
    </div>
</body>
</html>
