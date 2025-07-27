document.addEventListener("DOMContentLoaded", () => {
    loadCart();
});

function loadCart() {
    fetch("/config.json")
        .then(res => res.json())
        .then(config => {
            fetch(`${config.HOST}/api/v1/keranjang`)
                .then(res => res.json())
                .then(json => {
                    const listKeranjang = json.data;
                    if (!listKeranjang || listKeranjang.length === 0) {
                        document.getElementById("empty-cart").classList.remove("hidden");
                        document.getElementById("cart-container").innerHTML = "";
                        return;
                    }
                    renderCart(listKeranjang);
                })
                .catch(err => {
                    console.error("Error loading cart data:", err);
                    document.getElementById("empty-cart").classList.remove("hidden");
                    document.getElementById("empty-cart").textContent = "Gagal memuat keranjang.";
                });
        })
        .catch(err => console.error("Error loading config.json:", err));
}

function renderCart(items) {
    const container = document.getElementById("cart-container");
    container.innerHTML = "";

    let totalHarga = 0;

    const itemsHTML = items.map(item => {
        totalHarga += item.total_harga;

        return `
            <div class="cart-item flex gap-4 bg-white rounded-xl shadow p-4 mb-4 hover:shadow-lg transition">
                <div class="cart-item-img w-24 h-24 flex-shrink-0">
                    <img
                        src="../${item.foto}"
                        alt="${item.nama}"
                        class="w-full h-full object-cover rounded-lg"
                    />
                </div>
                <div class="flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">
                            ${item.nama}
                        </h3>
                        <span class="inline-block mt-1 px-2 py-1 bg-emerald-100 text-emerald-700 text-xs rounded">
                            ${item.jenis}
                        </span>
                    </div>
                    <div class="flex justify-between items-center mt-3">
                        <form class="flex items-center gap-2" data-id="${item.keranjang_id}" data-bahan="${item.bahan_id}">
                            <button
                                type="button"
                                class="cursor-pointer qty-btn-minus bg-gray-200 hover:bg-gray-300 text-gray-700 w-8 h-8 rounded-full text-lg flex items-center justify-center"
                            >−</button>
                            <span class="qty-count text-base font-semibold w-8 text-center">${item.porsi}</span>
                            <button
                                type="button"
                                class="cursor-pointer qty-btn-plus bg-gray-200 hover:bg-gray-300 text-gray-700 w-8 h-8 rounded-full text-lg flex items-center justify-center"
                            >+</button>
                        </form>
                        <div class="cart-item-price text-emerald-600 font-bold">
                            Rp ${item.total_harga.toLocaleString("id-ID")}
                        </div>
                    </div>
                </div>
                <button 
                    class="delete-btn text-red-500 hover:text-red-700 text-xl cursor-pointer" 
                    data-id="${item.keranjang_id}">
                    <i class="bi bi-trash3-fill"></i> 
                </button>
            </div>
        `;
    }).join("");

    const summaryHTML = `
        <div class="cart-summary bg-white rounded-xl shadow p-6 h-fit">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Details</h2>
            <div class="flex justify-between text-gray-700 mb-2">
                <span>Subtotal</span>
                <span>Rp ${totalHarga.toLocaleString("id-ID")}</span>
            </div>
            <div class="flex justify-between font-bold text-lg text-gray-900 border-t border-gray-200 pt-3">
                <span>Total</span>
                <span>Rp ${totalHarga.toLocaleString("id-ID")}</span>
            </div>
            <button
                id="checkout-btn"
                class="cursor-pointer block mt-6 w-full text-center bg-emerald-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded transition"
            >
                Checkout
            </button>
        </div>
    `;

    //  summary right
    container.innerHTML = `
        <div class="md:col-span-2 flex flex-col">
            ${itemsHTML}
        </div>
        <div class="md:col-span-1">
            ${summaryHTML}
        </div>
    `;

    addQtyListeners();
    addDeleteListeners();
    addCheckoutListener();
}

function addQtyListeners() {
    document.querySelectorAll(".qty-btn-plus").forEach(btn => {
        btn.addEventListener("click", (e) => {
            const form = e.target.closest("form");
            const span = form.querySelector(".qty-count");
            let val = parseInt(span.textContent);
            val++;
            span.textContent = val;

            const id = form.dataset.id;
            const bahanId = form.dataset.bahan;
            updateKeranjang(id, bahanId, val);
        });
    });

    document.querySelectorAll(".qty-btn-minus").forEach(btn => {
        btn.addEventListener("click", (e) => {
            const form = e.target.closest("form");
            const span = form.querySelector(".qty-count");
            let val = parseInt(span.textContent);
            if (val > 1) {
                val--;
                span.textContent = val;

                const id = form.dataset.id;
                const bahanId = form.dataset.bahan;
                updateKeranjang(id, bahanId, val);
            }
        });
    });
}

function addDeleteListeners() {
    document.querySelectorAll(".delete-btn").forEach(btn => {
        btn.addEventListener("click", () => {
            const id = btn.dataset.id;

            if (!confirm("Hapus ini?")) return;

            fetch("/config.json")
            .then(res => res.json())
            .then(config => {
                fetch(`${config.HOST}/api/v1/keranjang/${id}`, {
                method: "DELETE",
                })
                .then(res => {
                    if (!res.ok) throw new Error("HTTP error");
                    return res.text();
                })
                .then(() => {
                    loadCart();
                })
                .catch(err => {
                    console.error(err);
                    alert("Gagal menghapus item.");
                });
            })
            .catch(err => {
                console.error("Gagal memuat config.json:", err);
                alert("Gagal memuat konfigurasi.");
            });

        });
    });
}


function addCheckoutListener() {
    const btn = document.getElementById("checkout-btn");
    if (btn) {
        btn.addEventListener("click", () => {
            if (!confirm("pay?")) return;

            fetch("/config.json")
            .then(res => res.json())
            .then(config => {
                fetch(`${config.HOST}/api/v1/keranjang/pay/`, {
                method: "DELETE",
                })
                .then(res => {
                    if (!res.ok) throw new Error("HTTP error");
                    return res.text();
                })
                .then(() => {
                    location.reload();
                })
                .catch(err => {
                    console.error(err);
                    alert("Gagal melakukan checkout.");
                });
            })
            .catch(err => {
                console.error("Gagal memuat config.json:", err);
                alert("Gagal memuat konfigurasi.");
            });

        });
    }
}


function updateKeranjang(keranjangId, bahanId, newPorsi) {
    fetch("/config.json")
    .then(res => res.json())
    .then(config => {
        fetch(`${config.HOST}/api/v1/keranjang/${keranjangId}`, {
        method: "PUT",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            bahan_id: parseInt(bahanId),
            porsi: parseInt(newPorsi),
        }),
        })
        .then(res => res.json())
        .then(() => {
            loadCart();
        })
        .catch(err => {
            console.error(err);
            alert("Gagal update keranjang.");
        });
    })
    .catch(err => {
        console.error("Gagal memuat config.json:", err);
        alert("Gagal memuat konfigurasi.");
    });
}