{{-- blade-formatter-disable --}}
@extends('front.layouts.app')
@section('title', 'Katalog')
@section('content')
    <x-nav-katalog />
    <!-- Breadcrumb -->
    <div class="container mx-auto px-6 py-4">
        <nav class="text-sm text-gray-600">
            <ol class="flex items-center space-x-2">
                <li><a href="{{ route('front.index') }}" class="hover:text-blue-600">Beranda</a></li>
                <li><i class="fas fa-chevron-right text-gray-400"></i></li>
                <li class="text-blue-600 font-medium">Katalog Produk</li>
            </ol>
        </nav>
    </div>

    <!-- Filter Section -->
    <div class="container mx-auto px-6 mb-8">
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
                <!-- Category Filter -->
                <div class="flex flex-wrap gap-3">
                    <button onclick="filterProducts('all')"
                        class="filter-button active px-6 py-2 rounded-full font-medium bg-gray-100 text-gray-700">
                        Semua Produk
                    </button>
                    <button onclick="filterProducts('sabun')"
                        class="filter-button px-6 py-2 rounded-full font-medium bg-gray-100 text-gray-700">
                        <i class="fas fa-soap mr-2"></i>Sabun
                    </button>
                    <button onclick="filterProducts('body-scrub')"
                        class="filter-button px-6 py-2 rounded-full font-medium bg-gray-100 text-gray-700">
                        <i class="fas fa-spa mr-2"></i>Body Scrub
                    </button>
                    <button onclick="filterProducts('body-butter')"
                        class="filter-button px-6 py-2 rounded-full font-medium bg-gray-100 text-gray-700">
                        <i class="fas fa-hand-holding-heart mr-2"></i>Body Butter
                    </button>
                    <button onclick="filterProducts('lip-balm')"
                        class="filter-button px-6 py-2 rounded-full font-medium bg-gray-100 text-gray-700">
                        <i class="fas fa-kiss-wink-heart mr-2"></i>Lip Balm
                    </button>
                </div>

                <!-- Sort Options -->
                <div class="flex items-center space-x-4">
                    <label class="text-gray-600 font-medium">Urutkan:</label>
                    <select id="sortSelect" onchange="sortProducts()"
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="default">Default</option>
                        <option value="price-low">Harga: Rendah ke Tinggi</option>
                        <option value="price-high">Harga: Tinggi ke Rendah</option>
                        <option value="name">Nama A-Z</option>
                        <option value="rating">Rating Tertinggi</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Indicator -->
    <div id="loading" class="loading">
        <div class="flex justify-center items-center">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
        </div>
        <p class="mt-4 text-gray-600">Memuat produk...</p>
    </div>

    <!-- Products Grid -->
    <div class="container mx-auto px-6 mb-12">
        <div id="productsGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            <!-- Products will be dynamically loaded here -->
        </div>

        <!-- No Products Found -->
        <div id="noProducts" class="text-center py-20 hidden">
            <i class="fas fa-search text-6xl text-gray-300 mb-6"></i>
            <h3 class="text-2xl font-bold text-gray-600 mb-4">
                Produk Tidak Ditemukan
            </h3>
            <p class="text-gray-500">
                Coba gunakan kata kunci lain atau pilih kategori yang berbeda
            </p>
        </div>
    </div>

    <!-- Pagination -->
    <div class="container mx-auto px-6 mb-12">
        <div id="pagination" class="flex justify-center items-center space-x-2">
            <!-- Pagination will be dynamically generated -->
        </div>
    </div>

    <!-- Product Detail Modal -->
    <div id="productModal" class="modal">
        <div class="modal-content max-w-4xl">
            <div id="modalContent">
                <!-- Modal content will be dynamically loaded -->
            </div>
        </div>
    </div>

    <!-- Shopping Cart Sidebar -->
    <div id="cartSidebar"
        class="fixed right-0 top-0 h-full w-80 bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300">
        <div class="p-6 border-b">
            <div class="flex justify-between items-center">
                <h3 class="text-xl font-bold">Keranjang Belanja</h3>
                <button onclick="toggleCart()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>
        <div id="cartItems" class="flex-1 overflow-y-auto p-6">
            <div class="text-center text-gray-500 py-20">
                <i class="fas fa-shopping-cart text-4xl mb-4"></i>
                <p>Keranjang masih kosong</p>
            </div>
        </div>
        <div id="cartFooter" class="p-6 border-t bg-gray-50">
            <div class="flex justify-between items-center mb-4">
                <span class="font-bold text-lg">Total:</span>
                <span id="cartTotal" class="font-bold text-xl text-blue-600">Rp 0</span>
            </div>
            <button onclick="checkout()" class="w-full btn-primary text-white py-3 rounded-xl font-semibold">
                <i class="fas fa-credit-card mr-2"></i>
                Checkout
            </button>
        </div>
    </div>

    <!-- Cart Overlay -->
    <div id="cartOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden" onclick="toggleCart()"></div>

    <script>
        let products = [];
        // let currentProducts = [...products];
        let currentProducts = [];
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let currentPage = 1;
        const productsPerPage = 8;

        // Initialize page
        // document.addEventListener("DOMContentLoaded", function() {
        document.addEventListener("DOMContentLoaded", async function() {
            await loadProducts();
            displayProducts();
            updateCartBadge();
            setupSearch();
        });

        async function loadProducts() {
            try {
                const response = await fetch("{{ url('/api/products') }}");
                const data = await response.json();

                products = data.map(p => ({
                    id: p.id,
                    name: p.name,
                    category: p.kategoriproduk?.slug ?? "uncategorized",
                    price: p.diskon > 0 ?
                        Math.round(parseInt(p.harga) * (1 - p.diskon / 100)) // harga setelah diskon
                        :
                        parseInt(p.harga), // kalau tidak ada diskon, harga tetap
                    originalPrice: parseInt(p.harga), // harga asli
                    image: p.galeri.length > 0 ?
                        `/storage/${p.galeri[0].gambar}` : "/img/default.jpg",
                    imageAlt: p.name,
                    rating: p.review.length > 0 ?
                        (p.review.reduce((sum, r) => sum + r.rating, 0) / p.review.length).toFixed(1) : 0,
                    reviews: p.review.length,
                    badge: p.diskon > 0 ? "discount" : null,
                    description: p.description ?? "",
                    ingredients: p.bahan_utama ? [p.bahan_utama] : [],
                    benefits: p.manfaat ? [p.manfaat] : [],
                }));

                currentProducts = [...products];
            } catch (error) {
                console.error("Gagal memuat produk:", error);
            }
        }


        // Display products
        function displayProducts() {
            const grid = document.getElementById("productsGrid");
            const loading = document.getElementById("loading");
            const noProducts = document.getElementById("noProducts");

            loading.classList.add("active");

            setTimeout(() => {
                loading.classList.remove("active");

                if (currentProducts.length === 0) {
                    grid.innerHTML = "";
                    noProducts.classList.remove("hidden");
                    return;
                }

                noProducts.classList.add("hidden");

                const startIndex = (currentPage - 1) * productsPerPage;
                const endIndex = startIndex + productsPerPage;
                const productsToShow = currentProducts.slice(startIndex, endIndex);

                grid.innerHTML = productsToShow
                    .map((product) => createProductCard(product))
                    .join("");
                updatePagination();
            }, 500);
        }

        // Create product card HTML
        function createProductCard(product) {
            const discountPercentage = product.originalPrice ?
                Math.round(
                    ((product.originalPrice - product.price) /
                        product.originalPrice) *
                    100
                ) :
                0;

            const badgeClass = {
                new: "badge-new",
                bestseller: "badge-bestseller",
                organic: "badge-organic",
                discount: "badge-organic",
            };
            const detailUrl = `/katalog/detail-produk?id=${product.id}`;
            return `
                <div class="product-card bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100" data-category="${product.category}">
                    <div class="relative group">
                        <a href="${detailUrl}">
                        <img src="${product.image}" alt="${product.imageAlt}" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500"/>
                        ${product.badge? 
                            `<div class="absolute top-4 left-4">
                                    <span class="${
                                        badgeClass[product.badge]
                                    } text-white px-3 py-1 rounded-full text-sm font-semibold capitalize">
                                        ${
                                            product.badge === "bestseller"
                                            ? "Best Seller"
                                            : product.badge
                                        }
                                    </span>
                                </div>
                            `: ""
                        }
                        ${
                          discountPercentage > 0? 
                            `<div class="absolute top-4 right-4">
                                    <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs font-bold">
                                        -${discountPercentage}%
                                    </span>
                                </div>
                            `: ""
                        }
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 group-hover:translate-y-0 group-hover:scale-105 transition-all duration-300 flex items-center justify-center">
                                <span class="bg-white text-blue-600 px-4 py-2 rounded-full font-semibold opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                    <i class="fas fa-eye mr-2"></i>Lihat Detail
                                </span>
                            </div>
                        </a>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm text-blue-600 font-medium capitalize">${product.category.replace("-"," ")}</span>
                            <button onclick="toggleWishlist(${product.id})" class="text-gray-400 hover:text-red-500 transition-colors">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                        
                        <a href="${detailUrl}">
                            <h3 class="text-xl font-bold text-gray-800 mb-2 hover:text-blue-600 cursor-pointer">${product.name}</h3>
                        </a>
                        
                        <p class="text-gray-600 mb-4 text-sm line-clamp-2">${
                          product.description
                        }</p>
                        
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400 text-sm">
                                ${generateStars(product.rating)}
                            </div>
                            <span class="text-sm text-gray-500 ml-2">(${
                              product.rating
                            }) • ${product.reviews} ulasan</span>
                        </div>
                        
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-2">
                                <span class="text-2xl font-bold text-blue-600">Rp ${product.price.toLocaleString()}</span>
                                ${
                                  product.originalPrice
                                    ? `
                                            <span class="text-sm text-gray-400 line-through">Rp ${product.originalPrice.toLocaleString()}</span>
                                        `
                                    : ""
                                }
                            </div>
                        </div>
                        
                        <div class="flex space-x-2">
                            <button onclick="addToCart(${
                              product.id
                            })" class="flex-1 btn-primary text-white py-3 rounded-xl font-semibold hover:shadow-lg transition-all">
                                <i class="fas fa-cart-plus mr-2"></i>Tambah
                            </button>
                            <button onclick="buyNow(${
                              product.id
                            })" class="px-4 py-3 border-2 border-blue-600 text-blue-600 rounded-xl font-semibold hover:bg-blue-600 hover:text-white transition-all">
                                <i class="fas fa-bolt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;
        }

        // Generate star rating
        function generateStars(rating) {
            const fullStars = Math.floor(rating);
            const hasHalfStar = rating % 1 !== 0;
            let stars = "";

            for (let i = 0; i < fullStars; i++) {
                stars += '<i class="fas fa-star"></i>';
            }

            if (hasHalfStar) {
                stars += '<i class="fas fa-star-half-alt"></i>';
            }

            const emptyStars = 5 - fullStars - (hasHalfStar ? 1 : 0);
            for (let i = 0; i < emptyStars; i++) {
                stars += '<i class="far fa-star"></i>';
            }

            return stars;
        }

        // Filter products
        function filterProducts(category) {
            // Update active button
            document.querySelectorAll(".filter-button").forEach((btn) => {
                btn.classList.remove("active");
            });
            event.target.classList.add("active");

            // Filter products
            if (category === "all") {
                currentProducts = [...products];
            } else {
                currentProducts = products.filter(
                    (product) => product.category === category
                );
            }

            currentPage = 1;
            displayProducts();
        }

        // Sort products
        function sortProducts() {
            const sortValue = document.getElementById("sortSelect").value;

            switch (sortValue) {
                case "price-low":
                    currentProducts.sort((a, b) => a.price - b.price);
                    break;
                case "price-high":
                    currentProducts.sort((a, b) => b.price - a.price);
                    break;
                case "name":
                    currentProducts.sort((a, b) => a.name.localeCompare(b.name));
                    break;
                case "rating":
                    currentProducts.sort((a, b) => b.rating - a.rating);
                    break;
                default:
                    currentProducts = [...products];
            }

            currentPage = 1;
            displayProducts();
        }

        // Search functionality
        function setupSearch() {
            const searchInput = document.getElementById("searchInput");
            const suggestions = document.getElementById("searchSuggestions");

            if (!searchInput) return;

            searchInput.addEventListener("input", function() {
                const query = this.value.toLowerCase().trim();

                if (query.length === 0) {
                    currentProducts = [...products];
                    suggestions.classList.remove("active");
                    displayProducts();
                    return;
                }

                // Filter products based on search
                currentProducts = products.filter(
                    (product) =>
                    product.name.toLowerCase().includes(query) ||
                    product.description.toLowerCase().includes(query) ||
                    product.category.toLowerCase().includes(query)
                );

                // Show suggestions
                if (query.length > 0) {
                    const suggestionProducts = currentProducts.slice(0, 5);
                    suggestions.innerHTML = suggestionProducts
                        .map(
                            (product) => `
                        <div class="p-3 hover:bg-gray-50 cursor-pointer border-b border-gray-100 last:border-b-0" onclick="selectProduct(${
                          product.id
                        })">
                            <div class="flex items-center space-x-3">
                                <img src="${product.image}" alt="${
                  product.imageAlt
                }" class="w-10 h-10 object-cover rounded"/>
                                <div>
                                    <div class="font-medium text-sm">${
                                      product.name
                                    }</div>
                                    <div class="text-xs text-gray-500">Rp ${product.price.toLocaleString()}</div>
                                </div>
                            </div>
                        </div>
                    `
                        )
                        .join("");
                    suggestions.classList.add("active");
                } else {
                    suggestions.classList.remove("active");
                }

                currentPage = 1;
                displayProducts();
            });

            // Close suggestions when clicking outside
            document.addEventListener("click", function(e) {
                if (
                    !searchInput.contains(e.target) &&
                    !suggestions.contains(e.target)
                ) {
                    suggestions.classList.remove("active");
                }
            });
        }

        // Select product from suggestions
        function selectProduct(productId) {
            document.getElementById("searchSuggestions").classList.remove("active");
            window.location.href = `/katalog/detail-produk?id=${productId}`;
        }

        // Pagination
        function updatePagination() {
            const pagination = document.getElementById("pagination");
            const totalPages = Math.ceil(currentProducts.length / productsPerPage);

            if (totalPages <= 1) {
                pagination.innerHTML = "";
                return;
            }

            let paginationHTML = "";

            // Previous button
            if (currentPage > 1) {
                paginationHTML +=
                    `<button onclick="changePage(${
            currentPage - 1
          })" class="px-3 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 transition-colors"><i class="fas fa-chevron-left"></i></button>`;
            }

            // Page numbers
            for (let i = 1; i <= totalPages; i++) {
                if (i === currentPage) {
                    paginationHTML +=
                        `<button class="px-4 py-2 rounded-lg bg-blue-600 text-white font-semibold">${i}</button>`;
                } else {
                    paginationHTML +=
                        `<button onclick="changePage(${i})" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 transition-colors">${i}</button>`;
                }
            }

            // Next button
            if (currentPage < totalPages) {
                paginationHTML +=
                    `<button onclick="changePage(${
            currentPage + 1
          })" class="px-3 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 transition-colors"><i class="fas fa-chevron-right"></i></button>`;
            }

            pagination.innerHTML = paginationHTML;
        }

        // Change page
        function changePage(page) {
            currentPage = page;
            displayProducts();
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }

        // Open product modal
        // function openProductModal(productId) {
        //     const product = products.find((p) => p.id === productId);
        //     const modal = document.getElementById("productModal");
        //     const modalContent = document.getElementById("modalContent");

        //     modalContent.innerHTML = `
        //         <div class="flex flex-col lg:flex-row">
        //             <div class="lg:w-1/2">
        //                 <img src="${product.image}" alt="${
        //   product.imageAlt
        // }" class="w-full h-96 object-cover"/>
        //             </div>
        //             <div class="lg:w-1/2 p-8">
        //                 <button onclick="closeProductModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl">
        //                     <i class="fas fa-times"></i>
        //                 </button>
                        
        //                 <div class="mb-4">
        //                     ${
        //                       product.badge
        //                         ? `<span class="badge-${product.badge} text-white px-3 py-1 rounded-full text-sm font-semibold capitalize mb-2 inline-block">${product.badge}</span>`
        //                         : ""
        //                     }
        //                     <h2 class="text-3xl font-bold text-gray-800 mb-2">${
        //                       product.name
        //                     }</h2>
        //                     <div class="flex items-center mb-4">
        //                         <div class="flex text-yellow-400">${generateStars(
        //                           product.rating
        //                         )}</div>
        //                         <span class="text-gray-500 ml-2">(${
        //                           product.rating
        //                         }) • ${product.reviews} ulasan</span>
        //                     </div>
        //                 </div>
                        
        //                 <div class="mb-6">
        //                     <div class="flex items-center space-x-4 mb-4">
        //                         <span class="text-3xl font-bold text-blue-600">Rp ${product.price.toLocaleString()}</span>
        //                         ${
        //                           product.originalPrice
        //                             ? `<span class="text-xl text-gray-400 line-through">Rp ${product.originalPrice.toLocaleString()}</span>`
        //                             : ""
        //                         }
        //                     </div>
        //                     <p class="text-gray-600 leading-relaxed">${
        //                       product.description
        //                     }</p>
        //                 </div>
                        
        //                 <div class="mb-6">
        //                     <h4 class="font-bold text-gray-800 mb-2">Bahan Utama:</h4>
        //                     <div class="flex flex-wrap gap-2">
        //                         ${product.ingredients
        //                           .map(
        //                             (ingredient) =>
        //                               `<span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">${ingredient}</span>`
        //                           )
        //                           .join("")}
        //                     </div>
        //                 </div>
                        
        //                 <div class="mb-8">
        //                     <h4 class="font-bold text-gray-800 mb-2">Manfaat:</h4>
        //                     <ul class="space-y-1">
        //                         ${product.benefits
        //                           .map(
        //                             (benefit) =>
        //                               `<li class="flex items-center text-gray-600"><i class="fas fa-check-circle text-green-500 mr-2"></i>${benefit}</li>`
        //                           )
        //                           .join("")}
        //                     </ul>
        //                 </div>
                        
        //                 <div class="flex space-x-4">
        //                     <button onclick="addToCart(${
        //                       product.id
        //                     })" class="flex-1 btn-primary text-white py-3 rounded-xl font-semibold">
        //                         <i class="fas fa-cart-plus mr-2"></i>Tambah ke Keranjang
        //                     </button>
        //                     <button onclick="buyNow(${
        //                       product.id
        //                     })" class="px-6 py-3 border-2 border-blue-600 text-blue-600 rounded-xl font-semibold hover:bg-blue-600 hover:text-white transition-all">
        //                         Beli Sekarang
        //                     </button>
        //                 </div>
        //             </div>
        //         </div>
        //     `;

        //     modal.classList.add("active");
        //     document.body.style.overflow = "hidden";
        // }

        // Close product modal
        function closeProductModal() {
            const modal = document.getElementById("productModal");
            modal.classList.remove("active");
            document.body.style.overflow = "auto";
        }

        // Add to cart
        function addToCart(productId) {
            const product = products.find((p) => p.id === productId);
            const existingItem = cart.find((item) => item.id === productId);

            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    ...product,
                    quantity: 1
                });
            }

            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartBadge();
            updateCartDisplay();

            // Show success message
            showNotification(
                `${product.name} berhasil ditambahkan ke keranjang!`,
                "success"
            );
        }

        // Update cart badge
        function updateCartBadge() {
            const badge = document.getElementById("cartBadge");
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            badge.textContent = totalItems;
            badge.style.display = totalItems > 0 ? "flex" : "none";
        }

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

        // Update cart display
        function updateCartDisplay() {
            const cartItems = document.getElementById("cartItems");
            const cartTotal = document.getElementById("cartTotal");

            if (cart.length === 0) {
                cartItems.innerHTML = `
                    <div class="text-center text-gray-500 py-20">
                        <i class="fas fa-shopping-cart text-4xl mb-4"></i>
                        <p>Keranjang masih kosong</p>
                    </div>
                `;
                cartTotal.textContent = "Rp 0";
                return;
            }

            const total = cart.reduce(
                (sum, item) => sum + item.price * item.quantity,
                0
            );

            cartItems.innerHTML = cart
                .map(
                    (item) => `
                <div class="flex items-center space-x-4 mb-4 pb-4 border-b border-gray-200">
                    <img src="${item.image}" alt="${
              item.imageAlt
            }" class="w-16 h-16 object-cover rounded-lg"/>
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-800 text-sm">${
                          item.name
                        }</h4>
                        <p class="text-blue-600 font-semibold">Rp ${item.price.toLocaleString()}</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button onclick="updateCartQuantity(${item.id}, ${
              item.quantity - 1
            })" class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-minus text-xs"></i>
                        </button>
                        <span class="w-8 text-center font-medium">${
                          item.quantity
                        }</span>
                        <button onclick="updateCartQuantity(${item.id}, ${
              item.quantity + 1
            })" class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center">
                            <i class="fas fa-plus text-xs"></i>
                        </button>
                    </div>
                    <button onclick="removeFromCart(${
                      item.id
                    })" class="text-red-500 hover:text-red-700">
                        <i class="fas fa-trash text-sm"></i>
                    </button>
                </div>
            `
                )
                .join("");

            cartTotal.textContent = `Rp ${total.toLocaleString()}`;
        }

        // Update cart quantity
        function updateCartQuantity(productId, newQuantity) {
            if (newQuantity <= 0) {
                removeFromCart(productId);
                return;
            }

            const item = cart.find((item) => item.id === productId);
            if (item) {
                item.quantity = newQuantity;
                localStorage.setItem("cart", JSON.stringify(cart));
                updateCartBadge();
                updateCartDisplay();
            }
        }

        // Remove from cart
        function removeFromCart(productId) {
            cart = cart.filter((item) => item.id !== productId);
            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartBadge();
            updateCartDisplay();
        }

        // Buy now
        function buyNow(productId) {
            addToCart(productId);
            toggleCart();
        }

        // Checkout
        function checkout() {
            if (cart.length === 0) {
                showNotification("Keranjang masih kosong!", "error");
                return;
            }

            const total = cart.reduce(
                (sum, item) => sum + item.price * item.quantity,
                0
            );
            const message = `Halo, saya ingin memesan:\n\n${cart
          .map(
            (item) =>
              `${item.name} x${item.quantity} = Rp ${(
                                    item.price * item.quantity
                                    ).toLocaleString()}`
          )
          .join("\n")}\n\nTotal: Rp ${total.toLocaleString()}`;

            const whatsappUrl = `https://wa.me/6281234567890?text=${encodeURIComponent(
          message
        )}`;
            window.open(whatsappUrl, "_blank");
        }

        // Toggle wishlist
        function toggleWishlist(productId) {
            // This is a placeholder function
            event.target.classList.toggle("text-red-500");
            event.target.classList.toggle("text-gray-400");
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

        // Close modal when clicking outside
        document
            .getElementById("productModal")
            .addEventListener("click", function(e) {
                if (e.target === this) {
                    closeProductModal();
                }
            });

        // Mobile menu toggle (placeholder)
        function toggleMobileMenu() {
            console.log("Mobile menu toggled");
        }
    </script>
    <x-footer />
@endsection
{{-- blade-formatter-enable --}}























































