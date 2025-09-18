{{-- blade-formatter-disable --}}
@php
    $cart = session('cart', []);
@endphp
@extends('front.layouts.app')
@section('title', 'Checkout via WhatsApp - Payum Iwak')
@section('content')
    <x-nav-katalog />
     <!-- Step 1: Product Selection -->
    <div id="productSelection" class="container mx-auto px-6 mb-8">
      <!-- Selected Products -->
      <div
        id="selectedProducts"
        class="bg-white rounded-2xl shadow-lg overflow-hidden mt-8"
      >
        <div class="bg-gradient-to-r from-green-50 to-emerald-100 p-6 border-b">
          <h3 class="text-xl font-bold text-gray-800 mb-2">
            Produk yang Dipilih
          </h3>
          <p class="text-gray-600">Review pesanan Anda sebelum melanjutkan</p>
        </div>

        <div class="p-6">
          <div id="orderSummary" class="space-y-4">
            <!-- Selected products will appear here -->
          </div>

          <div class="border-t pt-4 mt-4">
            <div class="flex justify-between items-center text-lg font-bold">
              <span>Total Pesanan:</span>
              <span id="totalAmount" class="text-green-600">Rp 0</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Step 2: Customer Information -->
    <div id="customerInfo" class="container mx-auto px-6 mb-8">
      <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="bg-gradient-to-r from-purple-50 to-pink-100 p-6 border-b">
          <h2 class="text-2xl font-bold text-gray-800 mb-2">Data Pembeli</h2>
          <p class="text-gray-600">
            Lengkapi informasi untuk pengiriman pesanan
          </p>
        </div>

        <div class="p-6">
          <form id="customerForm" class="space-y-6"  action="{{ route('kirim.pesan') }}" method="POST">
                @csrf
            <div class="grid md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                  <i class="fas fa-user mr-2 text-blue-600"></i>Nama Lengkap *
                </label>
                <input
                  type="text"
                  id="customerName"
                  name="nama"
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  placeholder="Masukkan nama lengkap Anda"
                />
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                  <i class="fas fa-phone mr-2 text-green-600"></i>Nomor WhatsApp
                  *
                </label>
                <input
                  type="tel"
                  id="customerPhone"
                  name="no_hp"
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  placeholder="08xxxxxxxxxx"
                />
              </div>
            </div>

            {{-- <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-envelope mr-2 text-red-600"></i>Email
                (Opsional)
              </label>
              <input
                type="email"
                id="customerEmail"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                placeholder="email@example.com"
              />
            </div> --}}

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-map-marker-alt mr-2 text-purple-600"></i>Alamat
                Lengkap *
              </label>
              <textarea
                id="customerAddress"
                required
                name="alamat"
                rows="3"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                placeholder="Masukkan alamat lengkap untuk pengiriman"
              ></textarea>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                  <i class="fas fa-city mr-2 text-indigo-600"></i>Kota/Kabupaten
                  *
                </label>
                <input
                  type="text"
                  id="customerCity"
                  name="kota"
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  placeholder="Nama kota/kabupaten"
                />
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                  <i class="fas fa-map mr-2 text-orange-600"></i>Provinsi *
                </label>
                <select
                  id="customerProvince"
                  name="provinsi"
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
                  <option value="">Pilih Provinsi</option>
                <option value="Aceh">Aceh</option>
                <option value="Sumatera Utara">Sumatera Utara</option>
                <option value="Sumatera Selatan">Sumatera Selatan</option>
                <option value="Sumatera Barat">Sumatera Barat</option>
                <option value="Bengkulu">Bengkulu</option>
                <option value="Riau">Riau</option>
                <option value="Kepulauan Riau">Kepulauan Riau</option>
                <option value="Jambi">Jambi</option>
                <option value="Lampung">Lampung</option>
                <option value="Bangka Belitung">Bangka Belitung</option>
                <option value="Kalimantan Barat">Kalimantan Barat</option>
                <option value="Kalimantan Timur">Kalimantan Timur</option>
                <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                <option value="Kalimantan Utara">Kalimantan Utara</option>
                <option value="Banten">Banten</option>
                <option value="DKI Jakarta">DKI Jakarta</option>
                <option value="Jawa Barat">Jawa Barat</option>
                <option value="Jawa Tengah">Jawa Tengah</option>
                <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                <option value="Jawa Timur">Jawa Timur</option>
                <option value="Bali">Bali</option>
                <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                <option value="Gorontalo">Gorontalo</option>
                <option value="Sulawesi Barat">Sulawesi Barat</option>
                <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                <option value="Sulawesi Utara">Sulawesi Utara</option>
                <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                <option value="Maluku Utara">Maluku Utara</option>
                <option value="Maluku">Maluku</option>
                <option value="Papua Barat">Papua Barat</option>
                <option value="Papua">Papua</option>
                <option value="Papua Tengah">Papua Tengah</option>
                <option value="Papua Pegunungan">Papua Pegunungan</option>
                <option value="Papua Selatan">Papua Selatan</option>
                <option value="Papua Barat Daya">Papua Barat Daya</option>
                </select>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                  <i class="fas fa-mail-bulk mr-2 text-teal-600"></i>Kode Pos
                </label>
                <input
                  type="text"
                  id="customerPostal"
                  name="kode_pos"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  placeholder="12345"
                />
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-comment-alt mr-2 text-yellow-600"></i>Catatan
                Tambahan (Opsional)
              </label>
              <textarea
                id="customerNotes"
                rows="2"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                placeholder="Catatan khusus untuk pesanan Anda..."
              ></textarea>
            </div>

            <input type="hidden" name="wa_message" id="waMessage">
          </form>

          <div class="flex space-x-4 mt-8">
            <button
              onclick="prevStep()"
              class="flex-1 border-2 border-gray-300 text-gray-700 py-3 rounded-xl font-semibold hover:bg-gray-50 transition-all"
            >
              <i class="fas fa-arrow-left mr-2"></i>
              Kembali
            </button>
            <button 
              onclick="prepareMessage()"
              class="flex-1 btn-primary text-white py-3 rounded-xl font-semibold"
            >
              <i class="fas fa-paper-plane mr-2"></i>
              Buat Pesanan
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Step 3: WhatsApp Message -->
    <div id="whatsappMessage" class="container mx-auto px-6 mb-8 hidden">
      <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="whatsapp-gradient p-6 border-b text-white">
          <div class="flex items-center space-x-4">
            <div
              class="w-12 h-12 bg-white rounded-full flex items-center justify-center"
            >
              <i class="fab fa-whatsapp text-green-600 text-2xl"></i>
            </div>
            <div>
              <h2 class="text-gray-600 text-2xl font-bold">Pesan WhatsApp Siap Dikirim!</h2>
              <p class="text-green-600">Preview pesan Anda sebelum mengirim</p>
            </div>
          </div>
        </div>

        <div class="p-6">
          <!-- Chat Preview -->
          <div
            class="bg-green-50 rounded-2xl p-6 mb-6 border-2 border-green-200"
          >
            <div class="flex items-center space-x-3 mb-4">
              <img
                src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/18fb407a-2b9d-41c0-b937-cd808dac4600.png"
                alt="Payum Iwak WhatsApp profile picture showing friendly customer service representative"
                class="w-10 h-10 rounded-full"
              />
              <div>
                <div class="font-semibold text-gray-800">
                  Payum Iwak Official
                </div>
                <div class="text-xs text-green-600">Online sekarang</div>
              </div>
            </div>

            <div class="space-y-3">
              <div class="chat-bubble bg-white rounded-lg p-3 shadow-sm">
                <div class="text-sm text-gray-600 mb-1">Pesan Anda:</div>
                <div
                  id="messagePreview"
                  class="whitespace-pre-line text-gray-800 text-sm leading-relaxed"
                >
                  <!-- Message preview will be generated here -->
                </div>
              </div>

              <div
                class="typing-indicator items-center space-x-2 text-gray-500"
              >
                <div class="text-xs">Payum Iwak sedang mengetik</div>
                <div class="flex space-x-1">
                  <div class="typing-dot"></div>
                  <div class="typing-dot"></div>
                  <div class="typing-dot"></div>
                </div>
              </div>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="space-y-4">
            <button
              id="sendWhatsAppBtn"
              onclick="sendWhatsApp()"
              class="w-full btn-whatsapp text-white py-4 rounded-xl font-semibold text-lg shadow-lg hover:shadow-xl transition-all"
            >
              <i class="fab fa-whatsapp mr-3 text-xl"></i>
              Kirim Pesan ke WhatsApp
            </button>

            <div class="grid grid-cols-2 gap-4">
              <button
                onclick="editMessage()"
                class="border-2 border-blue-600 text-blue-600 py-3 rounded-xl font-semibold hover:bg-blue-50 transition-all"
              >
                <i class="fas fa-edit mr-2"></i>
                Edit Pesan
              </button>
              <button
                onclick="copyMessage()"
                class="border-2 border-gray-400 text-gray-700 py-3 rounded-xl font-semibold hover:bg-gray-50 transition-all"
              >
                <i class="fas fa-copy mr-2"></i>
                Copy Pesan
              </button>
            </div>
          </div>

          <!-- Alternative Contact Methods -->
          <div class="mt-8 p-4 bg-blue-50 rounded-lg border border-blue-200">
            <h4 class="font-semibold text-blue-800 mb-3">
              Metode Kontak Alternatif:
            </h4>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
              <a
                href="tel:+6281234567890"
                class="flex items-center space-x-2 text-blue-600 hover:text-blue-800"
              >
                <i class="fas fa-phone"></i>
                <span class="text-sm">+62 812-3456-7890</span>
              </a>
              <a
                href="mailto:info@payumiwak.com"
                class="flex items-center space-x-2 text-blue-600 hover:text-blue-800"
              >
                <i class="fas fa-envelope"></i>
                <span class="text-sm">info@payumiwak.com</span>
              </a>
              <a
                href="#"
                class="flex items-center space-x-2 text-blue-600 hover:text-blue-800"
              >
                <i class="fab fa-instagram"></i>
                <span class="text-sm">@payumiwak_official</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Message Modal -->
    <div
      id="editModal"
      class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center"
    >
      <div
        class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full mx-4 overflow-hidden"
      >
        <div class="bg-blue-600 text-white p-4">
          <h3 class="text-lg font-bold">Edit Pesan WhatsApp</h3>
        </div>
        <div class="p-6">
          <textarea
            id="editTextarea"
            rows="10"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"
          >
          </textarea>
          <div class="flex space-x-4 mt-4">
            <button
              onclick="saveEditedMessage()"
              class="flex-1 btn-primary text-white py-2 rounded-lg font-semibold"
            >
              Simpan Perubahan
            </button>
            <button
              onclick="closeEditModal()"
              class="flex-1 border border-gray-300 text-gray-700 py-2 rounded-lg font-semibold hover:bg-gray-50"
            >
              Batal
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Floating WhatsApp Button -->
    <div class="floating-whatsapp">
      <button
        onclick="directWhatsApp()"
        class="w-16 h-16 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-2xl flex items-center justify-center transition-all"
      >
        <i class="fab fa-whatsapp text-2xl"></i>
      </button>
    </div>

    <script>
      // Product data
      const products = [];

      let selectedProducts = @json($cart); // ambil dari session
      let currentStep = 1;
      let finalMessage = "";

      // Initialize page
      document.addEventListener("DOMContentLoaded", function () {
          updateOrderSummary();
      });

      // Update order summary
      function updateOrderSummary() {
        const selectedDiv = document.getElementById("selectedProducts");
        const orderSummary = document.getElementById("orderSummary");
        const totalAmount = document.getElementById("totalAmount");

        if (selectedProducts.length === 0) {
          selectedDiv.classList.add("hidden");
          return;
        }

        selectedDiv.classList.remove("hidden");

        orderSummary.innerHTML = selectedProducts
          .map(
            (product) => `
                <div class="order-item flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                    <img src="${product.image}" alt="${
              product.imageAlt
            }" class="w-16 h-16 object-cover rounded-lg"/>
                    <div class="flex-1">
                        <h4 class="font-semibold text-gray-800">${
                          product.name
                        }</h4>
                        <div class="text-sm text-gray-600">
                            Rp ${product.price.toLocaleString()} x ${
              product.quantity
            }
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="font-bold text-green-600">
                            Rp ${(
                              product.price * product.quantity
                            ).toLocaleString()}
                        </div>
                        <button onclick="removeProduct(${product.id})" 
                                class="text-red-500 hover:text-red-700 text-sm mt-1">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </div>
                </div>
            `
          )
          .join("");

        const total = selectedProducts.reduce(
          (sum, product) => sum + product.price * product.quantity,
          0
        );
        totalAmount.textContent = `Rp ${total.toLocaleString()}`;
      }

      // Remove product from selection
      function removeProduct(productId) {
        selectedProducts = selectedProducts.filter((p) => p.id !== productId);

        // Update product card appearance
        const productCards = document.querySelectorAll(".product-card");
        productCards.forEach((card) => {
          const cardProductId = parseInt(
            card.getAttribute("onclick").match(/\d+/)[0]
          );
          if (cardProductId === productId) {
            card.classList.remove("selected");
          }
        });

        updateOrderSummary();
      }

      // Prepare WhatsApp message
      function prepareMessage() {
        const form = document.getElementById("customerForm");

        if (!form.checkValidity()) {
          form.reportValidity();
          return;
        }

        const customerData = {
          name: document.getElementById("customerName").value,
          phone: document.getElementById("customerPhone").value,
          // email: document.getElementById("customerEmail").value,
          address: document.getElementById("customerAddress").value,
          city: document.getElementById("customerCity").value,
          province: document.getElementById("customerProvince").value,
          postal: document.getElementById("customerPostal").value,
          notes: document.getElementById("customerNotes").value,
        };

        generateWhatsAppMessage(customerData);

        // currentStep = 3;
        // updateStepIndicators();

         // **update hidden input agar controller menerima pesan yang sama**
        document.getElementById("waMessage").value = finalMessage;

        showStep(3);

        // Show typing indicator briefly
        const typingIndicator = document.querySelector(".typing-indicator");
        typingIndicator.classList.add("active");
        setTimeout(() => {
          typingIndicator.classList.remove("active");
        }, 2000);
      }

      // Generate WhatsApp message
      function generateWhatsAppMessage(customerData) {
        const total = selectedProducts.reduce(
          (sum, product) => sum + product.price * product.quantity,
          0
        );

        let message = `*PESANAN BARU PAYUM IWAK*\n\n`;
        message += `*Data Pembeli:*\n`;
        message += `Nama: ${customerData.name}\n`;
        message += `WhatsApp: ${customerData.phone}\n`;
        // if (customerData.email) message += `Email: ${customerData.email}\n`;
        message += `\n*Alamat Pengiriman:*\n`;
        message += `${customerData.address}\n`;
        message += `${customerData.city}, ${customerData.province}`;
        if (customerData.postal) message += ` ${customerData.postal}`;
        message += `\n\n*Detail Pesanan:*\n`;

        selectedProducts.forEach((product) => {
          message += `• ${product.name}\n`;
          message += `  Harga: Rp ${product.price.toLocaleString()}\n`;
          message += `  Jumlah: ${product.quantity}\n`;
          message += `  Subtotal: Rp ${(
            product.price * product.quantity
          ).toLocaleString()}\n\n`;
        });

        message += `*Total Pesanan: Rp ${total.toLocaleString()}*\n\n`;

        if (customerData.notes) {
          message += `*Catatan:*\n${customerData.notes}\n\n`;
        }

        message += `Terima kasih telah memilih produk natural beauty care dari Payum Iwak!\n\n`;
        message += `Mohon konfirmasi ketersediaan produk dan detail pengiriman.`;

        finalMessage = message;
        document.getElementById("messagePreview").textContent = message;
      }

      // Send WhatsApp message
      // function sendWhatsApp() {
      //   const whatsappNumber = "6281343026394"; // Replace with actual WhatsApp number
      //   const encodedMessage = encodeURIComponent(finalMessage);
      //   const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;

      //   // Add success animation
      //   const button = document.getElementById("sendWhatsAppBtn");
      //   button.classList.add("success-animation");

      //   // Show success notification
      //   showNotification("Mengarahkan ke WhatsApp...", "success");

      //   // Open WhatsApp
      //   setTimeout(() => {
      //     window.open(whatsappURL, "_blank");
      //     button.classList.remove("success-animation");
      //   }, 500);
      // }

      // function sendWhatsApp() {
      //     const whatsappNumber = "6281343026394";
      //     const encodedMessage = encodeURIComponent(finalMessage);
      //     const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;

      //     const form = document.getElementById("customerForm");
      //     const formData = new FormData(form);

      //     fetch("/kirim-pesan", {
      //         method: "POST",
      //         headers: {
      //             "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
      //         },
      //         body: formData
      //     })
      //     .then(response => {
      //         // Add success animation
      //         const button = document.getElementById("sendWhatsAppBtn");
      //         button.classList.add("success-animation");

      //         showNotification("Menyimpan pesanan & mengarahkan ke WhatsApp...", "success");

      //         setTimeout(() => {
      //             window.open(whatsappURL, "_blank");
      //             button.classList.remove("success-animation");
      //         }, 800);
      //     })
      //     .catch(err => {
      //         console.error(err);
      //         showNotification("Gagal menyimpan pesanan!", "error");
      //     });
      // }
      
      function sendWhatsApp() {
          const form = document.getElementById("customerForm");
          form.action = "/kirim-pesan";
          form.method = "POST";
           form.target = "_blank";
          form.submit();
      }

      // Direct WhatsApp (floating button)
      function directWhatsApp() {
        const whatsappNumber = "6281234567890";
        const message =
          "Halo! Saya tertarik dengan produk Payum Iwak. Bisa bantu saya?";
        const encodedMessage = encodeURIComponent(message);
        const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;
        window.open(whatsappURL, "_blank");
      }

      // Edit message
      function editMessage() {
        document.getElementById("editTextarea").value = finalMessage;
        document.getElementById("editModal").classList.remove("hidden");
        document.getElementById("editModal").classList.add("flex");
      }

      // Save edited message
      function saveEditedMessage() {
        finalMessage = document.getElementById("editTextarea").value;
        document.getElementById("messagePreview").textContent = finalMessage;
        closeEditModal();
        showNotification("Pesan berhasil diperbarui!", "success");
      }

      // Close edit modal
      function closeEditModal() {
        document.getElementById("editModal").classList.add("hidden");
        document.getElementById("editModal").classList.remove("flex");
      }

      // Copy message to clipboard
      function copyMessage() {
        navigator.clipboard
          .writeText(finalMessage)
          .then(() => {
            showNotification("Pesan berhasil disalin ke clipboard!", "success");
          })
          .catch(() => {
            showNotification("Gagal menyalin pesan!", "error");
          });
      }

      // // Show specific step
      function showStep(step) {
        document.getElementById("productSelection").classList.add("hidden");
        document.getElementById("customerInfo").classList.add("hidden");
        document.getElementById("whatsappMessage").classList.add("hidden");

        switch (step) {
          case 1:
            document
              .getElementById("productSelection")
              .classList.remove("hidden");
            break;
          case 2:
            document.getElementById("customerInfo").classList.remove("hidden");
            break;
          case 3:
            document
              .getElementById("whatsappMessage")
              .classList.remove("hidden");
            break;
        }
      }

      // Show notification
      function showNotification(message, type = "success") {
        const notification = document.createElement("div");
        notification.className = `fixed top-20 right-6 z-50 p-4 rounded-lg shadow-lg text-white font-medium transform translate-x-full transition-transform duration-300 ${
          type === "success" ? "bg-green-500" : "bg-red-500"
        }`;
        notification.innerHTML = `
                <div class="flex items-center space-x-3">
                    <i class="fas fa-${
                      type === "success" ? "check-circle" : "exclamation-circle"
                    }"></i>
                    <span>${message}</span>
                </div>
            `;

        document.body.appendChild(notification);

        setTimeout(() => {
          notification.classList.remove("translate-x-full");
        }, 100);

        setTimeout(() => {
          notification.classList.add("translate-x-full");
          setTimeout(() => {
            document.body.removeChild(notification);
          }, 300);
        }, 3000);
      }

      // Format phone number (Indonesian format)
      document
        .getElementById("customerPhone")
        .addEventListener("input", function (e) {
          let value = e.target.value.replace(/\D/g, "");

          // Ensure it starts with 08 for Indonesian mobile numbers
          if (value && !value.startsWith("08")) {
            if (value.startsWith("8")) {
              value = "0" + value;
            } else if (value.startsWith("62")) {
              value = "0" + value.substring(2);
            }
          }

          e.target.value = value;
        });

      // Close modal when clicking outside
      document
        .getElementById("editModal")
        .addEventListener("click", function (e) {
          if (e.target === this) {
            closeEditModal();
          }
        });

      // Keyboard shortcuts
      document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") {
          closeEditModal();
        }
      });

        // Toggle cart sidebar
        function toggleCart() {
            const sidebar = document.getElementById("cartSidebar");
            const overlay = document.getElementById("cartOverlay");

            if (sidebar.classList.contains("translate-x-0")) {
                sidebar.classList.remove("translate-x-0");
                sidebar.classList.add("translate-x-full");
                overlay.classList.add("hidden");
                document.body.style.overflow = "auto";
            } else {
                sidebar.classList.remove("translate-x-full");
                sidebar.classList.add("translate-x-0");
                overlay.classList.remove("hidden");
                document.body.style.overflow = "hidden";
                updateCartDisplay();
            }
        }

    </script>
       <x-footer />
@endsection
{{-- blade-formatter-enable --}}


























































































