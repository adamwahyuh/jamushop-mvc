let bahanList = [];

document.addEventListener("DOMContentLoaded", () => {
  fetch("http://localhost:9595/api/v1/bahan")
    .then((res) => res.json())
    .then((json) => {
      bahanList = json.data || [];

      if (bahanList.length === 0) {
        document.getElementById("no-data").classList.remove("hidden");
        return;
      }
      renderBahan(bahanList);
    })
    .catch((error) => {
      console.error("Error fetching data:", error);
      document.getElementById("no-data").textContent = "Gagal memuat data!";
      document.getElementById("no-data").classList.remove("hidden");
    });

  // Search
  document.getElementById("search-box").addEventListener("input", (e) => {
    const keyword = e.target.value.trim().toLowerCase();

    const filtered = bahanList.filter((item) => {
      return (
        // cari dari nama jenis desc
        item.nama.toLowerCase().includes(keyword) ||
        item.jenis.toLowerCase().includes(keyword) ||
        item.deskripsi.toLowerCase().includes(keyword)
      );
    });

    if (filtered.length === 0) {
      document.getElementById("no-data").classList.remove("hidden");
    } else {
      document.getElementById("no-data").classList.add("hidden");
    }

    renderBahan(filtered);
  });
});

// Elemrnt card
function renderBahan(bahanList) {
  const container = document.getElementById("bahan-container");
  container.innerHTML = "";

  bahanList.forEach((item) => {
    const element = document.createElement("div");
    element.className =
      "bg-white flex flex-col rounded-xl shadow-md hover:shadow-xl transform hover:scale-105 transition duration-300";

    element.innerHTML = `
      <img
        src="${item.foto}"
        alt="${item.nama}"
        class="w-full h-52 object-cover rounded-t-xl"
      />

      <div class="flex-1 flex flex-col p-5">
        <div class="flex justify-between items-center mb-2">
          <h3 class="text-lg font-bold text-gray-800">
            ${item.nama}
          </h3>
          <p class="text-emerald-600 font-semibold text-sm">
            Rp. ${item.harga.toLocaleString("id-ID")}
          </p>
        </div>

        <p class="text-xs text-gray-500 italic mb-1">
          ${item.jenis}
        </p>
        <p class="text-gray-600 text-sm mb-4">
          ${item.deskripsi}
        </p>

        <form class="keranjang-form mt-auto">
          <input
            type="hidden"
            name="bahan_id"
            value="${item.id}"
          />

          <div class="flex justify-center items-center gap-3 mb-4">
            <button
              type="button"
              class="kurang cursor-pointer bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-1 rounded-full text-lg font-bold"
            >
              −
            </button>
            <input
              type="number"
              name="porsi"
              value="1"
              min="1"
              readonly
              class="porsi-input w-12 text-center border border-gray-300 rounded py-1 cursor-default"
            />
            <button
              type="button"
              class="tambah cursor-pointer bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-1 rounded-full text-lg font-bold"
            >
              +
            </button>
          </div>

          <button
            type="submit"
            class="cursor-pointer card-button w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 rounded-lg transition"
          >
            Tambah Keranjang
          </button>
        </form>
      </div>
    `;

    element.querySelector(".tambah").addEventListener("click", () => {
      const input = element.querySelector(".porsi-input");
      input.value = parseInt(input.value) + 1;
    });

    element.querySelector(".kurang").addEventListener("click", () => {
      const input = element.querySelector(".porsi-input");
      if (parseInt(input.value) > 1) {
        input.value = parseInt(input.value) - 1;
      }
    });

    // POST or PUT Keranjang
    element
      .querySelector(".keranjang-form")
      .addEventListener("submit", (e) => {
        e.preventDefault();

        const bahan_id = parseInt(element.querySelector("input[name='bahan_id']").value);
        const porsi = parseInt(element.querySelector(".porsi-input").value);

        // cek kalo bahan_id ada yang sama di keranjang
        fetch("http://localhost:9595/api/v1/keranjang")
          .then((res) => res.json())
          .then((json) => {
            const keranjangList = json.data || [];

            const existingItem = keranjangList.find((k) => k.bahan_id === bahan_id);
            // console.log(existingItem);
            // {id: 1, bahan_id: 1, porsi: 10}

            if (existingItem) {
              // update kalo ketemu bahan id yang sama 
              const updatedPorsi = existingItem.porsi + porsi;

              fetch(`http://localhost:9595/api/v1/keranjang/${existingItem.id}`, {
                method: "PUT",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({
                  bahan_id: bahan_id,
                  porsi: updatedPorsi
                }),
              })
                .then((res) => res.json())
                .then((response) => {
                  alert(`Berhasil update porsi ${item.nama} menjadi ${updatedPorsi} di keranjang!`);
                })
                .catch((err) => {
                  console.error(err);
                  alert("Gagal mengupdate keranjang.");
                });

            } else {
              // kalo bahan id tidak ada yang sama, post saja 
              fetch("http://localhost:9595/api/v1/keranjang", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({
                  bahan_id: bahan_id,
                  porsi: porsi
                }),
              })
                .then((res) => res.json())
                .then((response) => {
                  alert(`Berhasil menambah ${item.nama} ke keranjang!`);
                })
                .catch((err) => {
                  console.error(err);
                  alert("Gagal menambahkan ke keranjang.");
                });
            }
          })
          .catch((err) => {
            console.error(err);
            alert("Gagal mengecek keranjang.");
          });
      });
                 
    container.appendChild(element);
  });
}
