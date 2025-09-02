@extends('front.layouts.app')
@section('title', 'Katalog')
@section('content')
    <x-nav />
    <!-- Breadcrumb -->
    <div class="container mx-auto px-6 py-4">
        <nav class="text-sm text-gray-600">
            <ol class="flex items-center space-x-2">
                <li><a href="#" class="hover:text-blue-600">Beranda</a></li>
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
    <x-footer />
@endsection
