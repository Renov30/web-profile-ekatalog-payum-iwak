@extends('front.layouts.app')
@section('title', 'Katalog-old')
@section('content')
    <x-nav />
    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Title -->
        <div class="mb-8 pt-20 text-center">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">
                Katalog Produk Payum Iwak
            </h1>
            <p class="text-lg text-gray-600">
                Produk perawatan tubuh alami dari perempuan nelayan Payum
            </p>
        </div>

        <!-- Product Filters/Search -->
        <div class="mb-8 bg-white p-4 rounded-lg shadow-sm">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="mb-4 md:mb-0">
                    <label for="category" class="mr-2 text-gray-700">Kategori:</label>
                    <select id="category" class="border border-gray-300 rounded-md px-3 py-2">
                        <option>Semua</option>
                        <option>Sabun</option>
                        <option>Body Scrub</option>
                        <option>Body Butter</option>
                        <option>Lipbalm</option>
                    </select>
                </div>
                <div class="relative">
                    <input type="text" placeholder="Cari produk..."
                        class="border border-gray-300 rounded-md px-4 py-2 pl-10 w-full md:w-64" />
                    <svg class="absolute left-3 top-3 h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Product 1 -->
            <div class="product-card bg-white rounded-lg overflow-hidden border border-gray-100">
                <div class="p-4">
                    <img src="https://placehold.co/300x200"
                        alt="Sabun alami Payum berwarna kuning dengan motif ombak dan aroma lemon"
                        class="w-full h-48 object-cover mb-4" />
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Sabun Rumput Laut
                    </h3>
                    <p class="text-gray-600 text-sm mb-3">
                        Sabun lembut dengan ekstrak rumput laut dan minyak kelapa untuk
                        semua jenis kulit.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold text-blue-600">Rp35.000</span>
                        <button class="px-3 py-1 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-md text-sm">
                            Detail
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="product-card bg-white rounded-lg overflow-hidden border border-gray-100">
                <div class="p-4">
                    <img src="https://placehold.co/300x200"
                        alt="Body scrub berwarna coklat dalam toples kaca dengan tekstur garam laut dan aroma vanilla"
                        class="w-full h-48 object-cover mb-4" />
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Body Scrub Garam Laut
                    </h3>
                    <p class="text-gray-600 text-sm mb-3">
                        Eksfoliasi alami dengan garam laut dan minyak kelapa untuk kulit
                        halus.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold text-blue-600">Rp55.000</span>
                        <button class="px-3 py-1 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-md text-sm">
                            Detail
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="product-card bg-white rounded-lg overflow-hidden border border-gray-100">
                <div class="p-4">
                    <img src="https://placehold.co/300x200"
                        alt="Body butter krim dalam kemasan kayu berwarna putih dengan aroma melati"
                        class="w-full h-48 object-cover mb-4" />
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Body Butter Melati
                    </h3>
                    <p class="text-gray-600 text-sm mb-3">
                        Pelembab intensif dengan shea butter dan minyak zaitun untuk kulit
                        super lembut.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold text-blue-600">Rp65.000</span>
                        <button class="px-3 py-1 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-md text-sm">
                            Detail
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="product-card bg-white rounded-lg overflow-hidden border border-gray-100">
                <div class="p-4">
                    <img src="https://placehold.co/300x200"
                        alt="Lipbalm dalam kemasan tabung warna pink dengan rasa stroberi"
                        class="w-full h-48 object-cover mb-4" />
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Lipbalm Stroberi
                    </h3>
                    <p class="text-gray-600 text-sm mb-3">
                        Pelembab bibir dengan madu dan minyak kelapa, rasa stroberi segar.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold text-blue-600">Rp25.000</span>
                        <button class="px-3 py-1 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-md text-sm">
                            Detail
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="product-card bg-white rounded-lg overflow-hidden border border-gray-100">
                <div class="p-4">
                    <img src="https://placehold.co/300x200"
                        alt="Sabun alami berwarna hijau dengan daun mint segar dan aroma mint"
                        class="w-full h-48 object-cover mb-4" />
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Sabun Mint Segar
                    </h3>
                    <p class="text-gray-600 text-sm mb-3">
                        Sabun menyegarkan dengan ekstrak daun mint untuk kulit berminyak.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold text-blue-600">Rp38.000</span>
                        <button class="px-3 py-1 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-md text-sm">
                            Detail
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="product-card bg-white rounded-lg overflow-hidden border border-gray-100">
                <div class="p-4">
                    <img src="https://placehold.co/300x200"
                        alt="Body scrub berwarna putih dengan serabut kelapa dan aroma kelapa"
                        class="w-full h-48 object-cover mb-4" />
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Body Scrub Kelapa
                    </h3>
                    <p class="text-gray-600 text-sm mb-3">
                        Scrub alami dari serabut kelapa dan minyak kelapa murni.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold text-blue-600">Rp50.000</span>
                        <button class="px-3 py-1 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-md text-sm">
                            Detail
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 7 -->
            <div class="product-card bg-white rounded-lg overflow-hidden border border-gray-100">
                <div class="p-4">
                    <img src="https://placehold.co/300x200" alt="Body butter coklat dalam kemasan kayu dengan aroma coklat"
                        class="w-full h-48 object-cover mb-4" />
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Body Butter Coklat
                    </h3>
                    <p class="text-gray-600 text-sm mb-3">
                        Pelembab kulit dengan aroma coklat yang menenangkan.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold text-blue-600">Rp68.000</span>
                        <button class="px-3 py-1 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-md text-sm">
                            Detail
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 8 -->
            <div class="product-card bg-white rounded-lg overflow-hidden border border-gray-100">
                <div class="p-4">
                    <img src="https://placehold.co/300x200" alt="Lipbalm dalam kemasan tabung biru dengan rasa blueberry"
                        class="w-full h-48 object-cover mb-4" />
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Lipbalm Blueberry
                    </h3>
                    <p class="text-gray-600 text-sm mb-3">
                        Pelembab bibir dengan ekstrak blueberry dan vitamin E.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold text-blue-600">Rp28.000</span>
                        <button class="px-3 py-1 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-md text-sm">
                            Detail
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 9 -->
            <div class="product-card bg-white rounded-lg overflow-hidden border border-gray-100">
                <div class="p-4">
                    <img src="https://placehold.co/300x200"
                        alt="Sabun alami berwarna biru dengan aroma lavender dan motif bunga"
                        class="w-full h-48 object-cover mb-4" />
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Sabun Lavender
                    </h3>
                    <p class="text-gray-600 text-sm mb-3">
                        Sabun relaksasi dengan minyak esensial lavender untuk kulit
                        sensitif.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold text-blue-600">Rp40.000</span>
                        <button class="px-3 py-1 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-md text-sm">
                            Detail
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 10 -->
            <div class="product-card bg-white rounded-lg overflow-hidden border border-gray-100">
                <div class="p-4">
                    <img src="https://placehold.co/300x200"
                        alt="Body scrub berwarna merah muda dengan garam merah dan aroma mawar"
                        class="w-full h-48 object-cover mb-4" />
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Body Scrub Mawar
                    </h3>
                    <p class="text-gray-600 text-sm mb-3">
                        Scrub mewah dengan kelopak mawar dan garam merah Himalaya.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold text-blue-600">Rp60.000</span>
                        <button class="px-3 py-1 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-md text-sm">
                            Detail
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-8">
            <nav class="inline-flex rounded-md shadow-sm">
                <a href="#"
                    class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    <span>&laquo;</span>
                </a>
                <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">1</a>
                <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">2</a>
                <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">3</a>
                <a href="#"
                    class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    <span>&raquo;</span>
                </a>
            </nav>
        </div>
    </main>
    <!-- photo grid end -->
    <x-footer />
@endsection
