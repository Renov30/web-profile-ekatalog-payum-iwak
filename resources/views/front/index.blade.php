@extends('front.layouts.app')
@section('title', 'Home - Payum Iwak')
@section('content')
    <x-nav-home />
    <!-- Hero Section -->
    <section id="home"
        class="relative text-white min-h-screen overflow-hidden flex items-center">
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        <div class="wave"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="text-center md:text-left">
                    <div class="inline-block bg-white bg-opacity-20 px-4 py-2 rounded-full mb-6">
                        <span class="text-sm font-medium">Natural Beauty Care Products</span>
                    </div>
                    <h1 class="text-5xl font-bold mb-6 leading-tight">
                        Kecantikan Alami dari
                        <span class="text-yellow-300">Laut Indonesia</span>
                    </h1>
                    <p class="mb-8 text-blue-100 leading-relaxed">
                        Produk perawatan kulit alami berkualitas tinggi dari Kelompok
                        Usaha Perempuan Nelayan Payum. Dibuat dengan bahan-bahan pilihan
                        untuk kecantikan dan kesehatan kulit Anda.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button onclick="scrollToProducts()"
                            class="btn-secondary px-8 py-4 rounded-full font-semibold shadow-lg">
                            <i class="fas fa-shopping-cart mr-2"></i>
                            Lihat Produk
                        </button>
                        <button onclick="scrollToAbout()"
                            class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-blue-600 transition-all">
                            <i class="fas fa-info-circle mr-2"></i>
                            Tentang Kami
                        </button>
                    </div>
                </div>
                <div class="text-center floating-animation h-full flex items-center justify-center mt-10">
                    <img src="{{ asset('img/foto-produk-3.jpg') }}"
                        alt="Collection of natural beauty care products including handmade soap bars, body scrub jars, body butter containers, and lip balm tubes arranged artistically with seashells and marine elements on a clean white background"
                        class="rounded-2xl shadow-2xl mx-auto max-w-full h-auto max-h-[500px]" />
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    {{-- <section id="products" class="pt-24 py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <div class="inline-block bg-blue-100 px-6 py-2 rounded-full mb-4">
                    <span class="text-blue-600 text-sm font-semibold">Katalog Produk</span>
                </div>
                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Produk Unggulan Kami
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Rangkaian produk perawatan kulit alami yang diformulasikan khusus
                    dengan bahan-bahan berkualitas tinggi
                </p>
                <div class="section-divider w-24"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Sabun -->
                <div class="product-card bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                    <div class="relative">
                        <img src="{{ asset('img/Sabun Natural img.png') }}"
                            alt="Handcrafted natural soap bars in various colors including sea salt white, seaweed green, and ocean blue, arranged on a bamboo tray with dried flowers and marine botanicals"
                            class="w-full h-64 object-cover" />
                        <div class="absolute top-4 left-4">
                            <span class="product-badge text-white px-3 py-1 rounded-full text-sm font-semibold">
                                Best Seller
                            </span>
                        </div>
                        <div class="absolute top-4 right-4 bg-white p-2 rounded-full shadow-lg">
                            <i class="fas fa-heart text-gray-400 hover:text-red-500 cursor-pointer transition-colors"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-soap text-blue-500 mr-2"></i>
                            <span class="text-sm text-blue-500 font-medium">Sabun Alami</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">
                            Sabun Natural
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Sabun alami dengan ekstrak laut yang membersihkan dan
                            melembabkan kulit secara mendalam. Cocok untuk semua jenis
                            kulit.
                        </p>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="flex text-yellow-400">
                                    <i class="fas fa-star fa-xs"></i>
                                    <i class="fas fa-star fa-xs"></i>
                                    <i class="fas fa-star fa-xs"></i>
                                    <i class="fas fa-star fa-xs"></i>
                                    <i class="fas fa-star fa-xs"></i>
                                </div>
                                <span class="text-xs text-gray-500 ml-2">(4.9)</span>
                            </div>
                            <span class="text-lg font-bold text-blue-600">Rp 25.000</span>
                        </div>
                        <button
                            class="w-full btn-primary text-white py-3 rounded-xl font-semibold hover:shadow-lg transition-all">
                            <i class="fas fa-cart-plus mr-2"></i>
                            Pesan Sekarang
                        </button>
                    </div>
                </div>

                <!-- Body Scrub -->
                <div class="product-card bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                    <div class="relative">
                        <img src="{{ asset('img/Body Scrub img.png') }}"
                            alt="Luxurious body scrub jars with sea salt and coffee grounds, displayed with wooden spoons and tropical leaves on a marble surface with soft natural lighting"
                            class="w-full h-64 object-cover" />
                        <div class="absolute top-4 left-4">
                            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                Organic
                            </span>
                        </div>
                        <div class="absolute top-4 right-4 bg-white p-2 rounded-full shadow-lg">
                            <i class="fas fa-heart text-gray-400 hover:text-red-500 cursor-pointer transition-colors"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-spa text-green-500 mr-2"></i>
                            <span class="text-sm text-green-500 font-medium">Body Care</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Body Scrub</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Scrub tubuh dengan butiran halus yang mengangkat sel kulit mati
                            dan memberikan kelembutan maksimal pada kulit.
                        </p>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="flex text-yellow-400">
                                    <i class="fas fa-star fa-xs"></i>
                                    <i class="fas fa-star fa-xs"></i>
                                    <i class="fas fa-star fa-xs"></i>
                                    <i class="fas fa-star fa-xs"></i>
                                    <i class="fas fa-star-half-alt fa-xs"></i>
                                </div>
                                <span class="text-xs text-gray-500 ml-2">(4.7)</span>
                            </div>
                            <span class="text-lg font-bold text-blue-600">Rp 35.000</span>
                        </div>
                        <button
                            class="w-full btn-primary text-white py-3 rounded-xl font-semibold hover:shadow-lg transition-all">
                            <i class="fas fa-cart-plus mr-2"></i>
                            Pesan Sekarang
                        </button>
                    </div>
                </div>

                <!-- Body Butter -->
                <div class="product-card bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                    <div class="relative">
                        <img src="{{ asset('img/Body Butter img.png') }}"
                            alt="Rich body butter cream in elegant glass jars with gold lids, surrounded by shea butter, coconut oil, and fresh tropical flowers on a clean white wooden background"
                            class="w-full h-64 object-cover" />
                        <div class="absolute top-4 left-4">
                            <span class="bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                Premium
                            </span>
                        </div>
                        <div class="absolute top-4 right-4 bg-white p-2 rounded-full shadow-lg">
                            <i class="fas fa-heart text-gray-400 hover:text-red-500 cursor-pointer transition-colors"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-hand-holding-heart text-purple-500 mr-2"></i>
                            <span class="text-sm text-purple-500 font-medium">Moisturizer</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Body Butter</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Pelembab intensif dengan tekstur kaya yang memberikan nutrisi
                            mendalam untuk kulit kering dan sensitif.
                        </p>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="flex text-yellow-400">
                                    <i class="fas fa-star fa-xs"></i>
                                    <i class="fas fa-star fa-xs"></i>
                                    <i class="fas fa-star fa-xs"></i>
                                    <i class="fas fa-star fa-xs"></i>
                                    <i class="fas fa-star fa-xs"></i>
                                </div>
                                <span class="text-xs text-gray-500 ml-2">(5.0)</span>
                            </div>
                            <span class="text-lg font-bold text-blue-600">Rp 45.000</span>
                        </div>
                        <button
                            class="w-full btn-primary text-white py-3 rounded-xl font-semibold hover:shadow-lg transition-all">
                            <i class="fas fa-cart-plus mr-2"></i>
                            Pesan Sekarang
                        </button>
                    </div>
                </div>

                <!-- Lip Balm -->
                <div class="product-card bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                    <div class="relative">
                        <img src="{{ asset('img/Lip Balm img.png') }}"
                            alt="Collection of natural lip balm tubes in various flavors with colorful labels, arranged with fresh fruits and herbs like strawberry, mint, and vanilla on a pastel pink background"
                            class="w-full h-64 object-cover" />
                        <div class="absolute top-4 left-4">
                            <span class="bg-pink-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                New
                            </span>
                        </div>
                        <div class="absolute top-4 right-4 bg-white p-2 rounded-full shadow-lg">
                            <i class="fas fa-heart text-gray-400 hover:text-red-500 cursor-pointer transition-colors"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-kiss-wink-heart text-pink-500 mr-2"></i>
                            <span class="text-sm text-pink-500 font-medium">Lip Care</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Lip Balm</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Pelembab bibir alami dengan formula lembut yang melindungi bibir
                            dari kekeringan dan memberikan kilau natural.
                        </p>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="flex text-yellow-400">
                                    <i class="fas fa-star fa-xs"></i>
                                    <i class="fas fa-star fa-xs"></i>
                                    <i class="fas fa-star fa-xs"></i>
                                    <i class="fas fa-star fa-xs"></i>
                                    <i class="fas fa-star-half-alt fa-xs"></i>
                                </div>
                                <span class="text-xs text-gray-500 ml-2">(4.8)</span>
                            </div>
                            <span class="text-lg font-bold text-blue-600">Rp 15.000</span>
                        </div>
                        <button
                            class="w-full btn-primary text-white py-3 rounded-xl font-semibold hover:shadow-lg transition-all">
                            <i class="fas fa-cart-plus mr-2"></i>
                            Pesan Sekarang
                        </button>
                    </div>
                </div>
            </div>
            <div class="text-right mt-8">
                <a href="{{ route('front.katalog') }}"
                    class="text-base text-blue-600 font-medium hover:text-blue-400 transition-all ease-in-out mr-3">
                    Lihat Selengkapnya >>
                    <i class="fas fa-cart-plus ml-2"></i>
                </a>
            </div>

            <!-- Product Benefits -->
            <div class="why-choose mt-20 bg-gradient-to-br from-blue-50 to-indigo-100 rounded-3xl p-8 md:p-12">
                <h3 class="text-3xl font-bold text-center text-gray-800 mb-12">
                    Mengapa Memilih Produk Kami?
                </h3>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="bg-white p-4 rounded-full w-16 h-16 mx-auto mb-6 shadow-lg">
                            <i class="fas fa-leaf text-green-500 text-2xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-800 mb-3">100% Natural</h4>
                        <p class="text-gray-600">
                            Dibuat dari bahan-bahan alami pilihan tanpa zat kimia berbahaya
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="bg-white p-4 rounded-full w-16 h-16 mx-auto mb-6 shadow-lg">
                            <i class="fas fa-heart text-red-500 text-2xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-800 mb-3">Handmade</h4>
                        <p class="text-gray-600">
                            Setiap produk dibuat dengan tangan penuh perhatian dan cinta
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="bg-white p-4 rounded-full w-16 h-16 mx-auto mb-6 shadow-lg">
                            <i class="fas fa-award text-yellow-500 text-2xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-800 mb-3">Berkualitas</h4>
                        <p class="text-gray-600">
                            Telah teruji kualitas dan keamanannya untuk berbagai jenis kulit
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section id="products" class="pt-24 py-20 bg-white">
        <div class="container mx-auto px-6">
            <!-- Section Heading -->
            <div class="text-center mb-16">
                <div class="inline-block bg-blue-100 px-6 py-2 rounded-full mb-4">
                    <span class="text-blue-600 text-sm font-semibold">Produk Kami</span>
                </div>
                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Jelajahi Kategori Produk
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Temukan rangkaian perawatan kulit alami sesuai kebutuhanmu
                </p>
                <div class="section-divider w-24"></div>
            </div>

            <!-- Categories Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Sabun -->
                <div class="product-card bg-blue-50 rounded-2xl shadow-md p-6 text-center hover:shadow-lg transition">
                    <i class="fas fa-soap text-blue-600 text-4xl m-6"></i>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Sabun Alami</h3>
                    <p class="text-gray-600 mb-4">Membersihkan sekaligus melembabkan kulit.</p>
                </div>

                <!-- Body Scrub -->
                <div class="product-card bg-green-50 rounded-2xl shadow-md p-6 text-center hover:shadow-lg transition">
                    <i class="fas fa-spa text-green-600 text-4xl m-6"></i>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Body Scrub</h3>
                    <p class="text-gray-600 mb-4">Angkat sel kulit mati dengan lembut.</p>
                </div>

                <!-- Body Butter -->
                <div class="product-card bg-purple-50 rounded-2xl shadow-md p-6 text-center hover:shadow-lg transition">
                    <i class="fas fa-hand-holding-heart text-purple-600 text-4xl m-6"></i>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Body Butter</h3>
                    <p class="text-gray-600 mb-4">Pelembab intensif untuk kulit kering.</p>
                </div>

                <!-- Lip Balm -->
                <div class="product-card bg-pink-50 rounded-2xl shadow-md p-6 text-center hover:shadow-lg transition">
                    <i class="fas fa-kiss-wink-heart text-pink-600 text-4xl m-6"></i>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Lip Balm</h3>
                    <p class="text-gray-600 mb-4">Lindungi dan lembabkan bibirmu.</p>
                </div>
            </div>

            <!-- Product Benefits -->
            <div
                class="why-choose mt-20 bg-gradient-to-br from-blue-50 to-indigo-100 rounded-3xl p-8 md:p-12 container mx-auto">
                <h3 class="text-3xl font-bold text-center text-gray-800 mb-12">
                    Mengapa Memilih Produk Kami?
                </h3>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="bg-white p-4 rounded-full w-16 h-16 mx-auto mb-6 shadow-lg">
                            <i class="fas fa-leaf text-green-500 text-2xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-800 mb-3">100% Natural</h4>
                        <p class="text-gray-600">
                            Dibuat dari bahan-bahan alami pilihan tanpa zat kimia berbahaya.
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="bg-white p-4 rounded-full w-16 h-16 mx-auto mb-6 shadow-lg">
                            <i class="fas fa-heart text-red-500 text-2xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-800 mb-3">Handmade</h4>
                        <p class="text-gray-600">
                            Setiap produk dibuat dengan tangan penuh perhatian dan cinta.
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="bg-white p-4 rounded-full w-16 h-16 mx-auto mb-6 shadow-lg">
                            <i class="fas fa-award text-yellow-500 text-2xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-800 mb-3">Berkualitas</h4>
                        <p class="text-gray-600">
                            Telah teruji kualitas dan keamanannya untuk berbagai jenis kulit.
                        </p>
                    </div>
                </div>
            </div>
            <!-- CTA -->
            <div class="tentang-box text-center mt-20">
                <a href="{{ route('front.katalog') }}"
                    class="btn-primary text-white px-8 py-4 rounded-full font-semibold text-lg shadow-lg">
                    Lihat Semua Produk
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>


    <!-- About Section -->
    <section id="about" class="pt-24 py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-block bg-blue-100 px-6 py-2 rounded-full mb-6">
                        <span class="text-blue-600 text-sm font-semibold">Tentang Kami</span>
                    </div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">
                        Kelompok Usaha
                        <span class="text-blue-600">Perempuan Nelayan</span>
                        Pantai Payum
                    </h2>
                    <p class="text text-gray-600 mb-6 leading-relaxed">
                        Payum Iwag adalah kelompok usaha yang dibentuk oleh para perempuan
                        nelayan di kawasan pesisir Pantai Payum Kabupaten Merauke. Kami berkomitmen untuk menghadirkan
                        produk perawatan kulit alami berkualitas tinggi yang terinspirasi
                        dari kekayaan laut Indonesia.
                    </p>
                    <p class="text text-gray-600 mb-8 leading-relaxed">
                        Dengan kerja keras dan dedikasi tinggi, kami
                        mengolah bahan-bahan alami menjadi produk yang tidak hanya
                        bermanfaat untuk kecantikan, tetapi juga ramah lingkungan dan
                        mendukung ekonomi lokal.
                    </p>

                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div class="tentang-box bg-white p-4 rounded-xl shadow-md">
                            <div class="text-2xl font-bold text-blue-600 mb-2">5+</div>
                            <div class="text-gray-600">Tahun Pengalaman</div>
                        </div>
                        <div class="tentang-box bg-white p-4 rounded-xl shadow-md">
                            <div class="text-2xl font-bold text-blue-600 mb-2">1000+</div>
                            <div class="text-gray-600">Pelanggan Puas</div>
                        </div>
                        <div class="tentang-box bg-white p-4 rounded-xl shadow-md">
                            <div class="text-2xl font-bold text-blue-600 mb-2">4</div>
                            <div class="text-gray-600">Produk Unggulan</div>
                        </div>
                        <div class="tentang-box bg-white p-4 rounded-xl shadow-md">
                            <div class="text-2xl font-bold text-blue-600 mb-2">100%</div>
                            <div class="text-gray-600">Bahan Alami</div>
                        </div>
                    </div>

                    {{-- <button
                        class="tentang-box btn-primary text-white px-8 py-4 rounded-full font-semibold text-lg shadow-lg">
                        <i class="fas fa-users mr-2"></i>
                        Bergabung Dengan Kami
                    </button> --}}
                </div>
                <div class="text-center">
                    <img src="{{ asset('img/foto-bersama-1.jpg') }}"
                        alt="Group photo of women fisherman cooperative members working together in their natural beauty product workshop, showing traditional Indonesian coastal community spirit with ocean backdrop"
                        class="rounded-2xl shadow-2xl max-w-full h-auto" />
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <div class="inline-block bg-blue-100 px-6 py-2 rounded-full mb-4">
                    <span class="text-blue-600 text-sm font-semibold">Testimoni Pelanggan</span>
                </div>
                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Apa Kata Mereka?
                </h2>
                <div class="section-divider w-24"></div>
            </div>

            <div class="they-said grid md:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-blue-50 to-white p-8 rounded-2xl shadow-lg">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 mb-6 italic">
                        "Sabun naturalnya benar-benar luar biasa! Kulit saya jadi lebih
                        lembut dan sehat. Produk lokal terbaik yang pernah saya coba."
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('img/foto-review-1.jpg') }}"
                            alt="Portrait of satisfied female customer with glowing healthy skin smiling warmly"
                            class="w-12 h-12 rounded-full mr-4" />
                        <div>
                            <div class="font-semibold text-gray-800">Sari Dewi</div>
                            <div class="text-sm text-gray-500">Pelanggan Setia</div>
                        </div>
                    </div>
                </div>

                <div class="they-said bg-gradient-to-br from-purple-50 to-white p-8 rounded-2xl shadow-lg">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 mb-6 italic">
                        "Body butter-nya amazing! Teksturnya tidak lengket tapi sangat
                        melembabkan. Wanginya juga natural dan menenangkan."
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('img/foto-review-4.jpg') }}"
                            alt="Portrait of happy young woman with clear radiant skin holding natural beauty products"
                            class="w-12 h-12 rounded-full mr-4" />
                        <div>
                            <div class="font-semibold text-gray-800">Arin Anggawirya</div>
                            <div class="text-sm text-gray-500">Beauty Enthusiast</div>
                        </div>
                    </div>
                </div>

                <div class="they-said bg-gradient-to-br from-green-50 to-white p-8 rounded-2xl shadow-lg">
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 mb-6 italic">
                        "Senang sekali bisa mendukung produk lokal berkualitas. Body
                        scrub-nya efektif mengangkat sel kulit mati dan harganya sangat
                        terjangkau."
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('img/foto-review-2.jpg') }}"
                            alt="Portrait of mature woman with healthy glowing skin showing satisfaction and confidence"
                            class="w-12 h-12 rounded-full mr-4" />
                        <div>
                            <div class="font-semibold text-gray-800">Yuli Widayanto</div>
                            <div class="text-sm text-gray-500">Skincare Lover</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="pt-24 py-20 ocean-gradient text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <div class="inline-block bg-white bg-opacity-20 px-6 py-2 rounded-full mb-4">
                    <span class="text-white font-semibold">Hubungi Kami</span>
                </div>
                <h2 class="text-4xl font-bold mb-4">
                    Mari Berkolaborasi
                </h2>
                <p class="text-md text-blue-100 max-w-2xl mx-auto">
                    Tertarik dengan produk kami? Atau ingin bermitra dengan Payum Iwag?
                    Jangan ragu untuk menghubungi kami!
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <div class="contact-box text-center bg-white bg-opacity-10 p-8 rounded-2xl backdrop-blur-sm">
                    <div class="bg-white p-4 rounded-full w-16 h-16 mx-auto mb-6">
                        <i class="fas fa-phone text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Telepon</h3>
                    <p class="text-blue-100">+62 822-4811-1790</p>
                </div>

                <div class="contact-box text-center bg-white bg-opacity-10 p-8 rounded-2xl backdrop-blur-sm">
                    <div class="bg-white p-4 rounded-full w-16 h-16 mx-auto mb-6">
                        <i class="fas fa-envelope text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Email</h3>
                    <p class="text-blue-100">payumiwag@gmail.com</p>
                </div>

                <div class="contact-box text-center bg-white bg-opacity-10 p-8 rounded-2xl backdrop-blur-sm">
                    <div class="bg-white p-4 rounded-full w-16 h-16 mx-auto mb-6">
                        <i class="fas fa-map-marker-alt text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Alamat</h3>
                    <p class="text-blue-100">
                        Pantai Payum<br />Kabupaten Merauke
                    </p>
                </div>
            </div>

            <div class="text-center">
                <div class="flex justify-center space-x-6 mb-8">
                    <a href="#"
                        class="bg-white bg-opacity-20 w-12 h-12 flex items-center justify-center rounded-full hover:bg-opacity-30 transition-all">
                        <i class="fab fa-whatsapp text-2xl"></i>
                    </a>
                    <a href="#"
                        class="bg-white bg-opacity-20 w-12 h-12 flex items-center justify-center rounded-full hover:bg-opacity-30 transition-all">
                        <i class="fab fa-instagram text-2xl"></i>
                    </a>
                    <a href="#"
                        class="bg-white bg-opacity-20 w-12 h-12 flex items-center justify-center rounded-full hover:bg-opacity-30 transition-all">
                        <i class="fab fa-facebook text-2xl"></i>
                    </a>
                    <a href="#"
                        class="bg-white bg-opacity-20 w-12 h-12 flex items-center justify-center rounded-full hover:bg-opacity-30 transition-all">
                        <i class="fab fa-twitter text-2xl"></i>
                    </a>
                </div>

                <button
                    class="bg-white text-blue-600 px-8 py-4 rounded-full font-semibold hover:bg-blue-100 transition-all shadow-lg">
                    <i class="fas fa-paper-plane mr-2"></i>
                    Kirim Pesan
                </button>
            </div>
        </div>
    </section>
    <x-footer />
@endsection
