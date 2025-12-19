@extends('front.layouts.app')
@section('title', 'Detail Produk - Payum Iwak')
@section('content')
    <x-nav-katalog />
    <!-- Breadcrumb -->
    <div class="container mx-auto px-6 py-4">
        <nav class="text-sm text-gray-600">
            <ol class="flex items-center space-x-2">
                <li><a href="{{ route('front.index') }}" class="hover:text-blue-600">Beranda</a></li>
                <li><i class="fas fa-chevron-right text-gray-400"></i></li>
                <li><a href="{{ route('front.katalog') }}" class="hover:text-blue-600">Katalog</a></li>
                <li><i class="fas fa-chevron-right text-gray-400"></i></li>
                <li><span id="breadcrumbCategory" class="hover:text-blue-600 cursor-pointer">-</span></li>
                <li><i class="fas fa-chevron-right text-gray-400"></i></li>
                <li class="text-blue-600 font-medium" id="breadcrumbProduct">-</li>
            </ol>
        </nav>
    </div>

    <!-- Product Detail Section -->
    <div class="container mx-auto px-6 mb-12">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="grid lg:grid-cols-2 gap-8 p-8">
                <!-- Product Images -->
                <div class="space-y-4">
                    <!-- Main Image -->
                    <div class="zoom-container rounded-2xl overflow-hidden bg-gray-100">
                        <img id="mainImage" src="" alt="" class="zoom-image w-full h-96 object-cover" />
                    </div>

                    <!-- Thumbnail Images -->
                    <div id="thumbnails" class="flex space-x-2"></div>
                    {{-- <div class="flex space-x-2 overflow-x-auto">
                        <img onclick="changeMainImage(this)" src=""
                            alt="Close up view of sea salt soap showing natural texture and salt crystals embedded in the soap surface"
                            class="thumbnail active w-20 h-20 object-cover rounded-lg border-2 border-gray-200 flex-shrink-0" />
                        <img onclick="changeMainImage(this)" src=""
                            alt="Sea salt soap lathering with rich natural foam on wet hands with water droplets"
                            class="thumbnail w-20 h-20 object-cover rounded-lg border-2 border-gray-200 flex-shrink-0" />
                        <img onclick="changeMainImage(this)" src=""
                            alt="Sea salt soap ingredients display showing natural sea salt, coconut oil, and shea butter on wooden background"
                            class="thumbnail w-20 h-20 object-cover rounded-lg border-2 border-gray-200 flex-shrink-0" />
                        <img onclick="changeMainImage(this)" src=""
                            alt="Packaging of sea salt soap with eco-friendly kraft paper wrapping and natural twine ribbon"
                            class="thumbnail w-20 h-20 object-cover rounded-lg border-2 border-gray-200 flex-shrink-0" />
                    </div> --}}
                </div>

                <!-- Product Info -->
                <div class="space-y-6">
                    <!-- Product Title & Rating -->
                    <div>
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-medium">Stok
                                Tersedia</span>
                            <span id="productBadge"
                                class="badge-bestseller text-white px-3 py-1 rounded-full text-sm font-semibold">-</span>
                        </div>
                        <h1 id="productTitle" class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">-</h1>
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="flex items-center">
                                <div class="flex text-yellow-400 mr-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span id="productRating" class="text-gray-600">(-)</span>
                            </div>
                            <div class="text-gray-400">|</div>
                            <div class="text-gray-600">
                                <span id="productReviews">-</span> ulasan
                            </div>
                            <div class="text-gray-400">|</div>
                            <div class="text-gray-600">
                                <span id="productSold">-</span> terjual
                            </div>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="border-b pb-6">
                        <div class="flex items-center space-x-4 mb-2">
                            <span id="productPrice" class="text-4xl font-bold text-blue-600">Rp -</span>
                            <span id="originalPrice" class="text-2xl text-gray-400 line-through">Rp -</span>
                            <span id="discountPercent"
                                class="bg-red-500 text-white px-2 py-1 rounded text-sm font-bold"></span>
                        </div>
                        <p id="hemat" class="text-gray-600"></p>
                    </div>

                    <!-- Product Description -->
                    <div class="border-b pb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Deskripsi Produk</h3>
                        <p id="productDescription" class="text-gray-600 leading-relaxed">
                            -
                        </p>
                    </div>

                    <!-- Product Variants -->
                    {{-- <div class="border-b pb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Pilih Varian</h3>
                        <div class="grid grid-cols-2 gap-3">
                            <button
                                class="variant-btn active border-2 border-blue-600 bg-blue-50 text-blue-600 px-4 py-3 rounded-lg font-medium transition-all">
                                <div class="text-sm">Regular</div>
                                <div class="text-xs text-gray-500">100g</div>
                            </button>
                            <button
                                class="variant-btn border-2 border-gray-200 hover:border-blue-600 px-4 py-3 rounded-lg font-medium transition-all">
                                <div class="text-sm">Family Pack</div>
                                <div class="text-xs text-gray-500">300g</div>
                            </button>
                        </div>
                    </div> --}}

                    <!-- Quantity & Add to Cart -->
                    <div class="border-b pb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Jumlah</h3>
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="flex items-center border-2 border-gray-200 rounded-lg">
                                <button onclick="decreaseQuantity()"
                                    class="quantity-btn px-4 py-2 text-gray-600 hover:bg-blue-600 hover:text-white">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" id="quantity" value="1" min="1"
                                    class="w-16 py-2 text-center border-0 focus:outline-none font-medium">
                                <button onclick="increaseQuantity()"
                                    class="quantity-btn px-4 py-2 text-gray-600 hover:bg-blue-600 hover:text-white">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            {{-- <div class="text-gray-600">
                                Stok: <span class="font-semibold text-green-600">98 tersisa</span>
                            </div> --}}
                        </div>

                        <div class="flex space-x-4">
                            <button onclick="addToCart()"
                                class="flex-1 btn-primary text-white py-4 rounded-xl font-semibold text-lg shadow-lg">
                                <i class="fas fa-cart-plus mr-2"></i>
                                Tambah ke Keranjang
                            </button>
                            <button onclick="buyNow()"
                                class="px-8 py-4 border-2 border-blue-600 text-blue-600 rounded-xl font-semibold text-lg hover:bg-blue-600 hover:text-white transition-all">
                                <i class="fas fa-bolt mr-2"></i>
                                Beli Sekarang
                            </button>
                        </div>
                    </div>

                    <!-- Share & Wishlist -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <span class="text-gray-600 font-medium">Bagikan:</span>
                            <div class="flex space-x-2">
                                <button onclick="shareToWhatsApp()"
                                    class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
                                    <i class="fab fa-whatsapp"></i>
                                </button>
                                <button onclick="shareToFacebook()"
                                    class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                                    <i class="fab fa-facebook"></i>
                                </button>
                                <button onclick="shareToTwitter()"
                                    class="w-10 h-10 bg-blue-400 text-white rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button onclick="copyLink()"
                                    class="w-10 h-10 bg-gray-500 text-white rounded-full flex items-center justify-center hover:bg-gray-600 transition-colors">
                                    <i class="fas fa-link"></i>
                                </button>
                            </div>
                        </div>
                        {{-- <button onclick="toggleWishlist()"
                            class="flex items-center space-x-2 text-gray-600 hover:text-red-500 transition-colors">
                            <i class="far fa-heart"></i>
                            <span>Wishlist</span>
                        </button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Details Tabs -->
    <div class="container mx-auto px-6 mb-12">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Tab Navigation -->
            <div class="border-b">
                <nav class="flex space-x-8 px-8">
                    <button onclick="switchTab('description')" class="tab-button active py-4 font-semibold">Detail
                        Produk</button>
                    <button onclick="switchTab('ingredients')" class="tab-button py-4 font-semibold">Bahan &
                        Manfaat</button>
                    {{-- <button onclick="switchTab('reviews')" class="tab-button py-4 font-semibold">Ulasan (156)</button> --}}
                    {{-- <button onclick="switchTab('shipping')" class="tab-button py-4 font-semibold">Pengiriman</button> --}}
                </nav>
            </div>

            <!-- Tab Content -->
            <div class="p-8">
                <!-- Description Tab -->
                <div id="description-tab" class="tab-content">
                    <div class="prose max-w-none">
                        {{-- <h3 class="text-2xl font-bold text-gray-800 mb-4">Tentang Produk Ini</h3>
                        <p class="text-gray-600 leading-relaxed mb-6">
                            Sabun Natural Sea Salt adalah produk unggulan dari Payum Iwag yang dibuat dengan teknik
                            tradisional
                            dan bahan-bahan alami pilihan. Setiap batang sabun dibuat dengan penuh perhatian untuk
                            memberikan
                            pengalaman mandi yang mewah dan menyehatkan kulit.
                        </p> --}}

                        <div class="grid md:grid-cols-2 gap-8 mb-8">
                            <div>
                                <h4 class="text-xl font-semibold text-gray-800 mb-3">Spesifikasi Produk</h4>
                                <div id="spesifikasi" class="space y-2 text-gray-600"></div>
                                {{-- <ul class="space-y-2 text-gray-600">
                                    <li><strong>Berat:</strong> 100 gram</li>
                                    <li><strong>Ukuran:</strong> 8 x 6 x 3 cm</li>
                                    <li><strong>pH Level:</strong> 7-8 (Alkaline)</li>
                                    <li><strong>Shelf Life:</strong> 2 tahun</li>
                                    <li><strong>Kemasan:</strong> Kraft paper eco-friendly</li>
                                </ul> --}}
                            </div>
                            <div>
                                <h4 class="text-xl font-semibold text-gray-800 mb-3">Keunggulan</h4>
                                <div id="keunggulan" class="space y-2 text-gray-600"></div>
                                {{-- <ul class="space-y-2 text-gray-600">
                                    <li class="flex items-center"><i
                                            class="fas fa-check-circle text-green-500 mr-2"></i>100% Bahan Alami</li>
                                    <li class="flex items-center"><i
                                            class="fas fa-check-circle text-green-500 mr-2"></i>Tanpa SLS & Paraben</li>
                                    <li class="flex items-center"><i
                                            class="fas fa-check-circle text-green-500 mr-2"></i>Cruelty Free</li>
                                    <li class="flex items-center"><i
                                            class="fas fa-check-circle text-green-500 mr-2"></i>Ramah Lingkungan</li>
                                    <li class="flex items-center"><i
                                            class="fas fa-check-circle text-green-500 mr-2"></i>Handmade Quality</li>
                                </ul> --}}
                            </div>
                        </div>

                        <div class="bg-blue-50 rounded-lg p-6">
                            <h4 class="text-xl font-semibold text-blue-800 mb-3">Cara Penggunaan</h4>
                            <div id="penggunaan" class="space y-2 text-blue-700"></div>
                            {{-- <ol class="list-decimal list-inside space-y-2 text-blue-700">
                                <li>Basahi tubuh dengan air hangat</li>
                                <li>Gosokkan sabun hingga berbusa</li>
                                <li>Pijat lembut ke seluruh tubuh</li>
                                <li>Bilas hingga bersih dengan air</li>
                                <li>Keringkan dengan handuk lembut</li>
                            </ol> --}}
                        </div>
                    </div>
                </div>

                <!-- Ingredients Tab -->
                <div id="ingredients-tab" class="tab-content hidden">
                    {{-- <h3 class="text-2xl font-bold text-gray-800 mb-6">Bahan & Manfaat</h3> --}}

                    <div class="grid md:grid-cols-2 gap-8 mb-8">
                        <div class="space-y-6">
                            <h4 class="text-xl font-semibold text-gray-800">Bahan Utama</h4>
                            <div id="bahanUtama" class="space y-2 text-gray-600"></div>

                            {{-- <div class="space-y-4">
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <div class="flex items-start space-x-3">
                                        <div
                                            class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                            <i class="fas fa-water text-blue-600"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-semibold text-gray-800">Garam Laut</h5>
                                            <p class="text-sm text-gray-600">Kaya mineral alami yang membantu detoksifikasi
                                                dan eksfoliasi kulit secara gentle.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gray-50 rounded-lg p-4">
                                    <div class="flex items-start space-x-3">
                                        <div
                                            class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                            <i class="fas fa-seedling text-green-600"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-semibold text-gray-800">Minyak Kelapa Virgin</h5>
                                            <p class="text-sm text-gray-600">Memberikan kelembaban alami dan sifat
                                                antibakteri untuk kulit sehat.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gray-50 rounded-lg p-4">
                                    <div class="flex items-start space-x-3">
                                        <div
                                            class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                                            <i class="fas fa-spa text-yellow-600"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-semibold text-gray-800">Shea Butter</h5>
                                            <p class="text-sm text-gray-600">Pelembab intensif yang kaya vitamin A, E, dan
                                                F untuk nutrisi kulit optimal.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gray-50 rounded-lg p-4">
                                    <div class="flex items-start space-x-3">
                                        <div
                                            class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                            <i class="fas fa-leaf text-purple-600"></i>
                                        </div>
                                        <div>
                                            <h5 class="font-semibold text-gray-800">Essential Oil Blend</h5>
                                            <p class="text-sm text-gray-600">Campuran minyak esensial alami untuk
                                                aromaterapi dan relaksasi.</p>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                        <div class="space-y-6">
                            <h4 class="text-xl font-semibold text-gray-800">Manfaat untuk Kulit</h4>
                            <div id="manfaat" class="space y-2 text-gray-600"></div>

                            {{-- <div class="space-y-4">
                                <div
                                    class="flex items-center space-x-3 p-4 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg">
                                    <i class="fas fa-check-circle text-blue-600 text-xl"></i>
                                    <div>
                                        <h5 class="font-semibold text-gray-800">Deep Cleansing</h5>
                                        <p class="text-sm text-gray-600">Membersihkan kotoran dan minyak berlebih tanpa
                                            membuat kulit kering</p>
                                    </div>
                                </div>

                                <div
                                    class="flex items-center space-x-3 p-4 bg-gradient-to-r from-green-50 to-green-100 rounded-lg">
                                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                    <div>
                                        <h5 class="font-semibold text-gray-800">Natural Exfoliation</h5>
                                        <p class="text-sm text-gray-600">Mengangkat sel kulit mati dan merangsang
                                            regenerasi kulit</p>
                                    </div>
                                </div>

                                <div
                                    class="flex items-center space-x-3 p-4 bg-gradient-to-r from-purple-50 to-purple-100 rounded-lg">
                                    <i class="fas fa-check-circle text-purple-600 text-xl"></i>
                                    <div>
                                        <h5 class="font-semibold text-gray-800">Intensive Moisturizing</h5>
                                        <p class="text-sm text-gray-600">Menjaga kelembaban alami kulit sepanjang hari</p>
                                    </div>
                                </div>

                                <div
                                    class="flex items-center space-x-3 p-4 bg-gradient-to-r from-yellow-50 to-yellow-100 rounded-lg">
                                    <i class="fas fa-check-circle text-yellow-600 text-xl"></i>
                                    <div>
                                        <h5 class="font-semibold text-gray-800">Anti-Inflammatory</h5>
                                        <p class="text-sm text-gray-600">Menenangkan kulit sensitif dan mengurangi iritasi
                                        </p>
                                    </div>
                                </div>

                                <div
                                    class="flex items-center space-x-3 p-4 bg-gradient-to-r from-red-50 to-red-100 rounded-lg">
                                    <i class="fas fa-check-circle text-red-600 text-xl"></i>
                                    <div>
                                        <h5 class="font-semibold text-gray-800">Aromatherapy</h5>
                                        <p class="text-sm text-gray-600">Memberikan efek relaksasi dan menenangkan pikiran
                                        </p>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <!-- Reviews Tab -->
                <div id="reviews-tab" class="tab-content hidden">
                    <div class="grid lg:grid-cols-3 gap-8">
                        <!-- Rating Summary -->
                        <div class="lg:col-span-1">
                            <div class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-xl p-6">
                                <div class="text-center mb-6">
                                    <div class="text-5xl font-bold text-blue-600 mb-2">4.9</div>
                                    <div class="flex justify-center text-yellow-400 mb-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="text-gray-600">dari 156 ulasan</div>
                                </div>

                                <div class="space-y-3">
                                    <div class="flex items-center space-x-3">
                                        <div class="flex text-yellow-400 text-sm">
                                            <span class="w-8">5</span>
                                            <i class="fas fa-star ml-1"></i>
                                        </div>
                                        <div class="flex-1">
                                            <div class="progress-bar">
                                                <div class="progress-fill" style="width: 85%"></div>
                                            </div>
                                        </div>
                                        <span class="text-sm text-gray-600 w-8">85%</span>
                                    </div>

                                    <div class="flex items-center space-x-3">
                                        <div class="flex text-yellow-400 text-sm">
                                            <span class="w-8">4</span>
                                            <i class="fas fa-star ml-1"></i>
                                        </div>
                                        <div class="flex-1">
                                            <div class="progress-bar">
                                                <div class="progress-fill" style="width: 12%"></div>
                                            </div>
                                        </div>
                                        <span class="text-sm text-gray-600 w-8">12%</span>
                                    </div>

                                    <div class="flex items-center space-x-3">
                                        <div class="flex text-yellow-400 text-sm">
                                            <span class="w-8">3</span>
                                            <i class="fas fa-star ml-1"></i>
                                        </div>
                                        <div class="flex-1">
                                            <div class="progress-bar">
                                                <div class="progress-fill" style="width: 2%"></div>
                                            </div>
                                        </div>
                                        <span class="text-sm text-gray-600 w-8">2%</span>
                                    </div>

                                    <div class="flex items-center space-x-3">
                                        <div class="flex text-yellow-400 text-sm">
                                            <span class="w-8">2</span>
                                            <i class="fas fa-star ml-1"></i>
                                        </div>
                                        <div class="flex-1">
                                            <div class="progress-bar">
                                                <div class="progress-fill" style="width: 1%"></div>
                                            </div>
                                        </div>
                                        <span class="text-sm text-gray-600 w-8">1%</span>
                                    </div>

                                    <div class="flex items-center space-x-3">
                                        <div class="flex text-yellow-400 text-sm">
                                            <span class="w-8">1</span>
                                            <i class="fas fa-star ml-1"></i>
                                        </div>
                                        <div class="flex-1">
                                            <div class="progress-bar">
                                                <div class="progress-fill" style="width: 0%"></div>
                                            </div>
                                        </div>
                                        <span class="text-sm text-gray-600 w-8">0%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews List -->
                        <div class="lg:col-span-2">
                            <div class="space-y-6">
                                <div class="border-b pb-6">
                                    <div class="flex items-start space-x-4">
                                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/915db4d8-0556-404e-b925-b4d12f0c7b8d.png"
                                            alt="Profile photo of satisfied female customer with bright smile showing healthy glowing skin"
                                            class="w-12 h-12 rounded-full object-cover" />
                                        <div class="flex-1">
                                            <div class="flex items-center space-x-2 mb-2">
                                                <h5 class="font-semibold text-gray-800">Sari Dewi</h5>
                                                <div class="flex text-yellow-400 text-sm">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <span class="text-sm text-gray-500">2 hari yang lalu</span>
                                            </div>
                                            <p class="text-gray-600 mb-3">
                                                Sabun ini benar-benar luar biasa! Kulit saya jadi lebih halus dan lembut
                                                setelah pemakaian pertama.
                                                Aromanya juga sangat menenangkan dan tidak membuat kulit kering. Pasti akan
                                                beli lagi!
                                            </p>
                                            <div class="flex items-center space-x-4 text-sm text-gray-500">
                                                <button class="hover:text-blue-600"><i
                                                        class="far fa-thumbs-up mr-1"></i>Berguna (12)</button>
                                                <button class="hover:text-blue-600"><i
                                                        class="far fa-comment mr-1"></i>Balas</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-b pb-6">
                                    <div class="flex items-start space-x-4">
                                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/1da71400-5b6f-4567-afb6-a0061cbe9f66.png"
                                            alt="Profile photo of happy young woman with clear radiant skin holding natural beauty products"
                                            class="w-12 h-12 rounded-full object-cover" />
                                        <div class="flex-1">
                                            <div class="flex items-center space-x-2 mb-2">
                                                <h5 class="font-semibold text-gray-800">Maya Putri</h5>
                                                <div class="flex text-yellow-400 text-sm">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <span class="text-sm text-gray-500">1 minggu yang lalu</span>
                                            </div>
                                            <p class="text-gray-600 mb-3">
                                                Packaging-nya cantik dan ramah lingkungan. Sabunnya tidak licin dan mudah
                                                dipegang.
                                                Yang paling saya suka, kulit tidak terasa kering setelah mandi. Recommended
                                                banget!
                                            </p>
                                            <div class="flex space-x-2 mb-3">
                                                <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/ef18639f-4983-4e5d-9c9d-c45365d881f8.png"
                                                    alt="Close-up photo of soap lathering process showing rich natural foam"
                                                    class="w-20 h-20 rounded-lg object-cover" />
                                                <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/7f6c874a-f8e8-4b0c-9371-2aea9eddbb31.png"
                                                    alt="Before and after comparison showing improved skin texture and smoothness"
                                                    class="w-20 h-20 rounded-lg object-cover" />
                                            </div>
                                            <div class="flex items-center space-x-4 text-sm text-gray-500">
                                                <button class="hover:text-blue-600"><i
                                                        class="far fa-thumbs-up mr-1"></i>Berguna (8)</button>
                                                <button class="hover:text-blue-600"><i
                                                        class="far fa-comment mr-1"></i>Balas</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-b pb-6">
                                    <div class="flex items-start space-x-4">
                                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/1c722ea9-890e-4718-98c2-42542f8e267f.png"
                                            alt="Profile photo of mature woman with healthy glowing skin showing satisfaction and confidence"
                                            class="w-12 h-12 rounded-full object-cover" />
                                        <div class="flex-1">
                                            <div class="flex items-center space-x-2 mb-2">
                                                <h5 class="font-semibold text-gray-800">Rina Sari</h5>
                                                <div class="flex text-yellow-400 text-sm">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <span class="text-sm text-gray-500">2 minggu yang lalu</span>
                                            </div>
                                            <p class="text-gray-600 mb-3">
                                                Senang sekali menemukan produk lokal berkualitas tinggi seperti ini. Sebagai
                                                pemilik kulit sensitif,
                                                saya sangat berhati-hati memilih sabun. Alhamdulillah sabun ini cocok dan
                                                tidak menyebabkan iritasi.
                                            </p>
                                            <div class="flex items-center space-x-4 text-sm text-gray-500">
                                                <button class="hover:text-blue-600"><i
                                                        class="far fa-thumbs-up mr-1"></i>Berguna (15)</button>
                                                <button class="hover:text-blue-600"><i
                                                        class="far fa-comment mr-1"></i>Balas</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button
                                        class="px-6 py-3 border-2 border-blue-600 text-blue-600 rounded-xl font-semibold hover:bg-blue-600 hover:text-white transition-all">
                                        Lihat Semua Ulasan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shipping Tab -->
                <div id="shipping-tab" class="tab-content hidden">
                    {{-- <h3 class="text-2xl font-bold text-gray-800 mb-6">Informasi Pengiriman</h3> --}}

                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 mb-6">
                                <h4 class="text-xl font-semibold text-blue-800 mb-4">Pengiriman Gratis</h4>
                                <p class="text-blue-700 mb-4">Dapatkan pengiriman gratis untuk pembelian minimal Rp 100.000
                                </p>
                                <div class="flex items-center text-blue-600">
                                    <i class="fas fa-truck mr-2"></i>
                                    <span class="font-medium">Berlaku untuk seluruh Indonesia</span>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <h4 class="text-lg font-semibold text-gray-800">Estimasi wagtu Pengiriman</h4>

                                <div class="bg-gray-50 rounded-lg p-4">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="font-medium text-gray-800">Same Day Delivery</span>
                                        <span class="text-blue-600 font-semibold">Rp 15.000</span>
                                    </div>
                                    <p class="text-sm text-gray-600">Jakarta, Bekasi, Tangerang, Depok (pesan sebelum jam
                                        12:00)</p>
                                </div>

                                <div class="bg-gray-50 rounded-lg p-4">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="font-medium text-gray-800">Next Day Delivery</span>
                                        <span class="text-blue-600 font-semibold">Rp 12.000</span>
                                    </div>
                                    <p class="text-sm text-gray-600">Jabodetabek dan sekitarnya</p>
                                </div>

                                <div class="bg-gray-50 rounded-lg p-4">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="font-medium text-gray-800">Regular (2-3 hari)</span>
                                        <span class="text-blue-600 font-semibold">Rp 8.000</span>
                                    </div>
                                    <p class="text-sm text-gray-600">Jawa, Sumatera, Bali</p>
                                </div>

                                <div class="bg-gray-50 rounded-lg p-4">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="font-medium text-gray-800">Ekonomi (4-7 hari)</span>
                                        <span class="text-blue-600 font-semibold">Rp 12.000</span>
                                    </div>
                                    <p class="text-sm text-gray-600">Kalimantan, Sulawesi, Papua, NTT, NTB</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Kebijakan Pengiriman</h4>

                            <div class="space-y-4">
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-shield-alt text-green-600 mt-1"></i>
                                    <div>
                                        <h5 class="font-medium text-gray-800">Packing Aman</h5>
                                        <p class="text-sm text-gray-600">Produk dikemas dengan bubble wrap dan box khusus
                                            untuk mencegah kerusakan</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-clock text-blue-600 mt-1"></i>
                                    <div>
                                        <h5 class="font-medium text-gray-800">Proses Cepat</h5>
                                        <p class="text-sm text-gray-600">Pesanan diproses dalam 1x24 jam setelah pembayaran
                                            dikonfirmasi</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-map-marker-alt text-purple-600 mt-1"></i>
                                    <div>
                                        <h5 class="font-medium text-gray-800">Tracking Number</h5>
                                        <p class="text-sm text-gray-600">Nomor resi akan dikirim melalui WhatsApp dan email
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-undo text-orange-600 mt-1"></i>
                                    <div>
                                        <h5 class="font-medium text-gray-800">Garansi Return</h5>
                                        <p class="text-sm text-gray-600">Garansi return 7 hari jika produk rusak atau tidak
                                            sesuai</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-8 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                                <div class="flex items-center text-yellow-800 mb-2">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    <h5 class="font-medium">Catatan Penting</h5>
                                </div>
                                <ul class="text-sm text-yellow-700 space-y-1">
                                    <li>• Pengiriman tidak dilakukan pada hari Minggu dan libur nasional</li>
                                    <li>• Untuk daerah terpencil mungkin memerlukan wagtu tambahan 1-2 hari</li>
                                    <li>• Pastikan alamat pengiriman sudah benar dan lengkap</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    {{-- <div class="container mx-auto px-6 mb-12">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden p-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-8 text-center">Produk Terkait</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Related Product 1 -->
                <div class="product-card bg-gray-50 rounded-xl overflow-hidden group cursor-pointer"
                    onclick="viewProduct(2)">
                    <div class="relative">
                        <img src=""
                            alt="Green seaweed detox soap bar with visible seaweed flakes arranged on dark volcanic rocks"
                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                        <div class="absolute top-3 left-3">
                            <span
                                class="badge-organic text-white px-2 py-1 rounded-full text-xs font-semibold">Organic</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-gray-800 mb-2">Sabun Seaweed Detox</h4>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400 text-sm mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-xs text-gray-500">(4.8)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-lg font-bold text-blue-600">Rp 28.000</span>
                                <span class="text-sm text-gray-400 line-through ml-2">Rp 35.000</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Product 2 -->
                <div class="product-card bg-gray-50 rounded-xl overflow-hidden group cursor-pointer"
                    onclick="viewProduct(3)">
                    <div class="relative">
                        <img src=""
                            alt="Golden honey oat soap bar with visible oat flakes and honey drizzle surrounded by honeycomb"
                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                        <div class="absolute top-3 left-3">
                            <span class="badge-new text-white px-2 py-1 rounded-full text-xs font-semibold">New</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-gray-800 mb-2">Sabun Honey Oat</h4>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400 text-sm mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-xs text-gray-500">(4.9)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-blue-600">Rp 30.000</span>
                        </div>
                    </div>
                </div>

                <!-- Related Product 3 -->
                <div class="product-card bg-gray-50 rounded-xl overflow-hidden group cursor-pointer"
                    onclick="viewProduct(4)">
                    <div class="relative">
                        <img src=""
                            alt="Luxurious coffee and sea salt body scrub in clear glass jar with wooden lid surrounded by coffee beans"
                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                        <div class="absolute top-3 left-3">
                            <span class="badge-bestseller text-white px-2 py-1 rounded-full text-xs font-semibold">Best
                                Seller</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-gray-800 mb-2">Coffee Sea Salt Scrub</h4>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400 text-sm mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-xs text-gray-500">(4.8)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-lg font-bold text-blue-600">Rp 35.000</span>
                                <span class="text-sm text-gray-400 line-through ml-2">Rp 42.000</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Product 4 -->
                <div class="product-card bg-gray-50 rounded-xl overflow-hidden group cursor-pointer"
                    onclick="viewProduct(7)">
                    <div class="relative">
                        <img src=""
                            alt="Rich coconut body butter in elegant white jar with gold accents surrounded by fresh coconut halves"
                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                        <div class="absolute top-3 left-3">
                            <span class="badge-bestseller text-white px-2 py-1 rounded-full text-xs font-semibold">Best
                                Seller</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-gray-800 mb-2">Coconut Paradise Butter</h4>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400 text-sm mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-xs text-gray-500">(4.9)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-lg font-bold text-blue-600">Rp 45.000</span>
                                <span class="text-sm text-gray-400 line-through ml-2">Rp 55.000</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Floating Cart Button -->
    <div id="floatingCart" class="floating-cart">
        <div class="bg-blue-600 text-white rounded-full shadow-2xl p-4 flex items-center space-x-4">
            <div class="flex items-center space-x-3">
                <img id="floatingProductImage"
                    src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/602e0b63-8605-4524-96fe-7e93fd27917b.png"
                    alt="Product thumbnail for floating cart" class="w-12 h-12 rounded-full object-cover" />
                <div>
                    <div class="font-semibold text-sm" id="floatingProductName">Sabun Natural Sea Salt</div>
                    <div class="text-xs opacity-75" id="floatingProductPrice">Rp 25.000</div>
                </div>
            </div>
            <button onclick="addToCart()"
                class="bg-white text-blue-600 px-4 py-2 rounded-full font-semibold text-sm hover:bg-gray-100 transition-colors">
                <i class="fas fa-cart-plus mr-1"></i>Add to Cart
            </button>
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
        // Product data (would normally come from API/database)
        let currentProductId = null;
        let quantity = 1;
        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        async function loadProduct() {
            const urlParams = new URLSearchParams(window.location.search);
            const productId = urlParams.get('id') || 1;
            currentProductId = parseInt(productId);

            try {
                const response = await fetch(`/api/products/${currentProductId}`);
                const product = await response.json();
                const harga = parseInt(product.harga);
                const diskon = product.diskon ?? 0;
                const hargaDiskon = harga - (harga * diskon / 100);
                const hemat = harga - hargaDiskon;

                // title
                document.getElementById('productTitle').textContent = product.name;
                document.getElementById('breadcrumbProduct').textContent = product.name;
                document.getElementById('breadcrumbCategory').textContent = product.kategoriproduk?.slug ??
                    'uncategorized';
                // sub title
                document.getElementById('productRating').textContent = `(${product.reviews_avg_rating ?? 0})`;
                document.getElementById('productReviews').textContent = product.review ?? 0;
                document.getElementById('productSold').textContent = product.sold ?? 0;
                // harga
                document.getElementById('productPrice').textContent = `Rp ${hargaDiskon.toLocaleString()}`;
                document.getElementById('originalPrice').textContent = diskon > 0 ? `Rp ${harga.toLocaleString()}` : '';
                document.getElementById('discountPercent').textContent = diskon > 0 ? `-${diskon}%` : '';
                document.getElementById('hemat').textContent = diskon > 0 ? `Hemat Rp ${hemat.toLocaleString()}` : '';
                // deskripsi
                document.getElementById('productDescription').innerHTML = product.description;
                // gambar produk
                document.getElementById('mainImage').src = product.galeri.length > 0 ?
                    `/storage/${product.galeri[0].gambar}` : '/img/default.jpg';
                // Render thumbnails
                const thumbnailsContainer = document.getElementById('thumbnails');
                thumbnailsContainer.innerHTML = ''; // kosongin dulu

                product.galeri.forEach((g, index) => {
                    const img = document.createElement('img');
                    img.src = `/storage/${g.gambar}`;
                    img.className =
                        `thumbnail w-20 h-20 object-cover rounded-lg border-2 border-gray-200 flex-shrink-0 cursor-pointer ${index === 0 ? 'active' : ''}`;
                    img.onclick = () => changeMainImage(img);
                    thumbnailsContainer.appendChild(img);
                });
                // Floating cart
                document.getElementById('floatingProductImage').src = product.galeri.length > 0 ?
                    `/storage/${product.galeri[0].gambar}` : '/img/default.jpg';
                document.getElementById('floatingProductName').textContent = product.name;
                document.getElementById('floatingProductPrice').textContent = `Rp ${hargaDiskon.toLocaleString()}`;

                // Badge
                const badge = document.getElementById('productBadge');
                if (product.badge) {
                    badge.className = `badge-${product.badge} text-white px-3 py-1 rounded-full text-sm font-semibold`;
                    badge.textContent = product.badge === 'bestseller' ? 'Best Seller' :
                        product.badge === 'organic' ? 'Organic' : 'New';
                } else {
                    badge.style.display = "none";
                }
                // spesifikasi
                document.getElementById('spesifikasi').innerHTML = product.spesifikasi;
                document.getElementById('keunggulan').innerHTML = product.keunggulan;
                document.getElementById('penggunaan').innerHTML = product.penggunaan;
                document.getElementById('bahanUtama').innerHTML = product.bahan_utama;
                document.getElementById('manfaat').innerHTML = product.manfaat;

            } catch (err) {
                console.error("Gagal memuat produk:", err);
            }
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            loadProduct();
            updateCartBadge();
            showFloatingCart();
        });

        // Load product data
        // function loadProduct() {
        //     const urlParams = new URLSearchParams(window.location.search);
        //     const productId = urlParams.get('id') || 1;
        //     currentProductId = parseInt(productId);

        //     if (productData[currentProductId]) {
        //         const product = productData[currentProductId];

        //         // Update product info
        //         document.getElementById('productTitle').textContent = product.name;
        //         document.getElementById('breadcrumbProduct').textContent = product.name;
        //         document.getElementById('breadcrumbCategory').textContent = product.category;
        //         document.getElementById('productPrice').textContent = `Rp ${product.price.toLocaleString()}`;
        //         document.getElementById('originalPrice').textContent = `Rp ${product.originalPrice.toLocaleString()}`;
        //         document.getElementById('productRating').textContent = `(${product.rating})`;
        //         document.getElementById('productReviews').textContent = product.reviews;
        //         document.getElementById('productSold').textContent = product.sold.toLocaleString();
        //         document.getElementById('productDescription').textContent = product.description;
        //         document.getElementById('mainImage').src = product.image;

        //         // Update floating cart
        //         document.getElementById('floatingProductImage').src = product.image;
        //         document.getElementById('floatingProductName').textContent = product.name;
        //         document.getElementById('floatingProductPrice').textContent = `Rp ${product.price.toLocaleString()}`;

        //         // Update badge
        //         const badge = document.getElementById('productBadge');
        //         badge.className = `badge-${product.badge} text-white px-3 py-1 rounded-full text-sm font-semibold`;
        //         badge.textContent = product.badge === 'bestseller' ? 'Best Seller' :
        //             product.badge === 'organic' ? 'Organic' : 'New';
        //     }
        // }

        // Change main image
        function changeMainImage(thumbnail) {
            const mainImage = document.getElementById('mainImage');
            mainImage.src = thumbnail.src;

            // Update active thumbnail
            document.querySelectorAll('.thumbnail').forEach(thumb => {
                thumb.classList.remove('active');
            });
            thumbnail.classList.add('active');
        }

        // Switch tabs
        function switchTab(tabName) {
            // Hide all tab content
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });

            // Remove active class from all buttons
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('active');
            });

            // Show selected tab content
            document.getElementById(tabName + '-tab').classList.remove('hidden');

            // Add active class to clicked button
            event.target.classList.add('active');
        }

        // Quantity functions
        function decreaseQuantity() {
            if (quantity > 1) {
                quantity--;
                document.getElementById('quantity').value = quantity;
            }
        }

        function increaseQuantity() {
            quantity++;
            document.getElementById('quantity').value = quantity;
        }

        // Update quantity from input
        document.getElementById('quantity').addEventListener('change', function() {
            quantity = Math.max(1, parseInt(this.value) || 1);
            this.value = quantity;
        });

        // Add to cart
        async function addToCart() {
            const response = await fetch(`/api/products/${currentProductId}`);
            const product = await response.json();
            console.log(product);

            const existingItem = cart.find(item => item.id === currentProductId);

            if (existingItem) {
                existingItem.quantity += quantity;
            } else {
                cart.push({
                    id: currentProductId,
                    name: product.name,
                    // price: Number(product.price) || 0, // pastikan angka
                    price: product.diskon > 0 ?
                        Math.round(parseInt(product.harga) * (1 - product.diskon / 100)) // harga setelah diskon
                        :
                        parseInt(product.harga), // kalau tidak ada diskon, harga tetap
                    // image: product.image_url,
                    image: product.galeri.length > 0 ?
                        `/storage/${product.galeri[0].gambar}` : "/img/default.jpg",
                    quantity: quantity
                });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartBadge();
            showNotification(`${product.name} berhasil ditambahkan ke keranjang!`, 'success');
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
        function buyNow() {
            addToCart();
            // Redirect to checkout or open cart
            // window.location.href = 'katalog.html';
            toggleCart();
        }

        // Checkout
        function checkout() {
            if (cart.length === 0) {
                showNotification("Keranjang masih kosong!", "error");
                return;
            }

            let token = document.querySelector('meta[name="csrf-token"]');
            if (!token) {
                console.error("CSRF token tidak ditemukan di halaman!");
                return;
            }

            fetch("/set-cart", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": token.content
                    },
                    body: JSON.stringify({
                        cart
                    })
                })
                .then(res => res.json())
                .then(() => {
                    window.location.href = "/pesan-whatsapp";
                })
                .catch(err => console.error("Error:", err));
        }

        // Update cart badge
        function updateCartBadge() {
            const badge = document.getElementById('cartBadge');
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            badge.textContent = totalItems;
            badge.style.display = totalItems > 0 ? 'flex' : 'none';
        }

        // Toggle cart
        function toggleCart() {
            floatingCart.classList.remove('show');
            // Implement cart sidebar toggle
            // console.log('Toggle cart');
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

        // Show floating cart
        function showFloatingCart() {
            const floatingCart = document.getElementById('floatingCart');

            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const windowHeight = window.innerHeight;

                if (scrolled > windowHeight / 2) {
                    floatingCart.classList.add('show');
                } else {
                    floatingCart.classList.remove('show');
                }
            });
        }

        // Share functions
        function shareToWhatsApp() {
            const product = productData[currentProductId];
            const text =
                `Check out ${product.name} - Rp ${product.price.toLocaleString()} di Payum Iwag! ${window.location.href}`;
            window.open(`https://wa.me/?text=${encodeURIComponent(text)}`, '_blank');
        }

        function shareToFacebook() {
            window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(window.location.href)}`,
                '_blank');
        }

        function shareToTwitter() {
            const product = productData[currentProductId];
            const text = `Check out ${product.name} from Payum Iwag Natural Beauty Care!`;
            window.open(
                `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent(window.location.href)}`,
                '_blank');
        }

        function copyLink() {
            navigator.clipboard.writeText(window.location.href);
            showNotification('Link berhasil disalin!', 'success');
        }

        // Toggle wishlist
        function toggleWishlist() {
            const icon = event.target.querySelector('i') || event.target;
            icon.classList.toggle('far');
            icon.classList.toggle('fas');

            const button = event.target.closest('button');
            if (icon.classList.contains('fas')) {
                button.classList.add('text-red-500');
                button.classList.remove('text-gray-600');
                showNotification('Produk ditambahkan ke wishlist!', 'success');
            } else {
                button.classList.remove('text-red-500');
                button.classList.add('text-gray-600');
                showNotification('Produk dihapus dari wishlist!', 'info');
            }
        }

        // View other product
        // function viewProduct(productId) {
        //     window.location.href = `detail-produk.html?id=${productId}`;
        // }

        // Show notification
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className =
                `fixed top-20 right-6 z-50 p-4 rounded-lg shadow-lg text-white font-medium transform translate-x-full transition-transform duration-300 ${type === 'success' ? 'bg-green-500' : type === 'info' ? 'bg-blue-500' : 'bg-red-500'}`;
            notification.innerHTML = `
                <div class="flex items-center space-x-3">
                    <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'info' ? 'info-circle' : 'exclamation-circle'}"></i>
                    <span>${message}</span>
                </div>
            `;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);

            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }

        // Variant selection
        document.querySelectorAll('.variant-btn').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.variant-btn').forEach(btn => {
                    btn.classList.remove('active', 'border-blue-600', 'bg-blue-50',
                        'text-blue-600');
                    btn.classList.add('border-gray-200');
                });

                this.classList.add('active', 'border-blue-600', 'bg-blue-50', 'text-blue-600');
                this.classList.remove('border-gray-200');
            });
        });

        function getQueryParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }
    </script>
    <x-footer />
@endsection
