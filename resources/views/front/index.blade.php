@extends('front.layouts.app')
@section('title', 'Home')
@section('content')
    <x-nav/>
    <!-- hero section start -->
    <section id="hero" class="hero-gradient min-h-screen pt-52 relative overflow-hidden">
      <div class="max-w-7xl mx-auto h-full px-4 sm:px-6 lg:px-8">
        <div class="h-full flex flex-col md:flex-row items-center justify-center gap-10 md:gap-20">
          
          <!-- Bagian Teks -->
          <div class="mb-10 lg:mb-0 md:w-1/2">
            <h1 class="text-5xl font-bold text-gray-900 mb-4 leading-tight">
              Perawatan Alami <br />
              <span class="text-blue-500">Nelayan Perempuan</span>
            </h1>
            <p class="text-lg text-gray-600 mb-8 max-w-lg leading-relaxed">
              Produk perawatan tubuh berbahan dasar alami hasil olahan Kelompok
              Usaha Perempuan Nelayan Payum. Ramah lingkungan, aman untuk kulit,
              dan mendukung pemberdayaan perempuan pesisir.
            </p>
            <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3">
              <a href="#produk" class="px-6 py-3 text-base font-medium rounded-md text-white bg-blue-500 hover:bg-blue-700 shadow-md transition duration-300">Lihat Produk</a>
              <a href="#tentang" class="px-6 py-3 text-base font-medium rounded-md text-blue-500 bg-white hover:bg-gray-100 shadow-md transition duration-300">Tentang Kami</a>
            </div>
          </div>

          <!-- Bagian Grid Gambar -->
          <div class="md:w-1/2 grid grid-cols-2 grid-rows-2 gap-4">
            <div class="bg-pink-200 rounded-xl flex justify-center items-center p-6">
              <img src="{{asset('img/lip-balm-1.png')}}" class="max-w-full max-h-full object-contain" width="120" height="120" />
            </div>
            <div class="bg-blue-300 rounded-xl flex justify-center items-center p-6">
              <img src="{{asset('img/lip-balm-1.png')}}" class="max-w-full max-h-full object-contain" width="120" height="120" />
            </div>
            <div class="bg-blue-300 rounded-xl flex justify-center items-center p-6">
              <img src="{{asset('img/lip-balm-1.png')}}" class="max-w-full max-h-full object-contain" width="120" height="120" />
            </div>
            <div class="bg-pink-200 rounded-xl flex justify-center items-center p-6">
              <img src="{{asset('img/lip-balm-1.png')}}" class="max-w-full max-h-full object-contain" width="120" height="120" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- hero section end -->
     <!-- Produk Section -->
    <section id="produk" class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-bold text-gray-900 mb-4">
            Produk Unggulan Kami
          </h2>
          <p class="text-lg text-gray-600 max-w-3xl mx-auto">
            Inovasi produk perawatan tubuh dengan bahan-bahan alami hasil olahan
            nelayan perempuan Payum
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          <!-- Sabun -->
          <div
            class="product-card bg-white rounded-lg overflow-hidden border border-gray-100 p-6"
          >
            <div class="mb-4">
              <img
                src="img/sabun alami.png"
                alt="Sabun alami berwarna krem dengan motif gelombang dan aroma lemon dalam kemasan kertas daur ulang"
                class="w-full h-48 object-contain"
              />
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">
              Sabun Alami
            </h3>
            <p class="text-gray-600 mb-4">
              Sabun lembut dengan ekstrak rumput laut dan minyak kelapa untuk
              semua jenis kulit.
            </p>
            <div class="flex justify-between items-center">
              <span class="text-lg font-semibold text-blue-500">Rp.35,000</span>
              <button
                class="px-2 py-2 bg-blue-50 text-blue-500 hover:bg-blue-100 rounded-md text-sm font-medium"
              >
                Pesan Sekarang
              </button>
            </div>
          </div>

          <!-- Body Scrub -->
          <div
            class="product-card bg-white rounded-lg overflow-hidden border border-gray-100 p-6"
          >
            <div class="mb-4">
              <img
                src="img/Scrub.png"
                alt="Body scrub berwarna coklat dengan tekstur kasar dari garam laut dan aroma vanilla dalam toples kaca"
                class="w-full h-48 object-contain"
              />
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Body Scrub</h3>
            <p class="text-gray-600 mb-4">
              Dibuat dari garam laut alami dan minyak kelapa untuk membuat kulit
              halus dan lembut.
            </p>
            <div class="flex justify-between items-center">
              <span class="text-lg font-semibold text-blue-500">Rp.55,000</span>
              <button
                class="px-2 py-2 bg-blue-50 text-blue-500 hover:bg-blue-100 rounded-md text-sm font-medium"
              >
                Pesan Sekarang
              </button>
            </div>
          </div>

          <!-- Body Butter -->
          <div
            class="product-card bg-white rounded-lg overflow-hidden border border-gray-100 p-6"
          >
            <div class="mb-4">
              <img
                src="img/Body butter.png"
                alt="Body butter krim dalam toples kayu dengan tekstur lembut berwarna putih dan aroma bunga melati"
                class="w-full h-48 object-contain"
              />
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">
              Body Butter
            </h3>
            <p class="text-gray-600 mb-4">
              Pelembab intensif dengan shea butter dan minyak zaitun untuk kulit
              super lembut.
            </p>
            <div class="flex justify-between items-center">
              <span class="text-lg font-semibold text-blue-500">Rp.65,000</span>
              <button
                class="px-2 py-2 bg-blue-50 text-blue-500 hover:bg-blue-100 rounded-md text-sm font-medium"
              >
                Pesan Sekarang
              </button>
            </div>
          </div>

          <!-- Lipbalm -->
          <div
            class="product-card bg-white rounded-lg overflow-hidden border border-gray-100 p-6"
          >
            <div class="mb-4">
              <img
                src="img/lipbalm.png"
                alt="Lipbalm dalam kemasan tabung kecil warna-warni dengan aroma buah-buahan tropis"
                class="w-full h-48 object-contain"
              />
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">
              Lipbalm Alami
            </h3>
            <p class="text-gray-600 mb-4">
              Pelembab bibir dengan madu dan minyak kelapa, tersedia dalam
              berbagai varian rasa.
            </p>
            <div class="flex justify-between items-center">
              <span class="text-lg font-semibold text-blue-500">Rp.25,000</span>
              <button
                class="px-2 py-2 bg-blue-50 text-blue-500 hover:bg-blue-100 rounded-md text-sm font-medium"
              >
                Pesan Sekarang
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Tentang Kami Section -->
    <section id="tentang" class="py-20 bg-gray-50 pt-36 pb-36">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-12 items-center">
          <div class="mb-10 lg:mb-0 order-2 lg:order-1">
            <img
              src="img/Screenshot 2025-08-06 184321.png"
              alt="Foto kelompok perempuan nelayan Payum sedang berdiskusi dan bekerja sama membuat produk di tepi pantai"
              class="rounded-lg shadow-xl w-full h-auto"
            />
          </div>
          <div class="order-1 lg:order-2">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">
              Tentang Payum Iwak
            </h2>
            <p class="text-gray-600 mb-4">
              Payum Iwak adalah inisiatif pemberdayaan ekonomi perempuan nelayan
              di pesisir pantai. Berawal dari keinginan untuk menciptakan
              alternatif penghasilan di luar musim tangkap, sekelompok perempuan
              nelayan mulai mengolah bahan-bahan alami dari laut menjadi produk
              perawatan tubuh berkualitas.
            </p>
            <p class="text-gray-600 mb-6">
              Dengan menggunakan bahan-bahan lokal seperti rumput laut, garam
              laut, minyak kelapa, dan hasil laut lainnya, kami menciptakan
              produk yang tidak hanya baik untuk kulit tetapi juga ramah
              lingkungan.
            </p>
            <div class="grid grid-cols-2 gap-4 mt-8">
              <div class="bg-white p-4 rounded-lg shadow-sm">
                <div class="text-blue-500 font-bold text-3xl mb-2">100%</div>
                <div class="text-gray-700">Bahan Alami</div>
              </div>
              <div class="bg-white p-4 rounded-lg shadow-sm">
                <div class="text-blue-500 font-bold text-3xl mb-2">0%</div>
                <div class="text-gray-700">Bahan Kimia</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimoni Section -->
    <section class="py-20 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-3xl font-bold text-gray-900 mb-4">Apa Kata Mereka</h2>
          <p class="text-lg text-gray-600 max-w-3xl mx-auto">
            Testimoni dari pelanggan yang telah menggunakan produk Payum Iwak
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Testi 1 -->
          <div class="bg-white p-6 rounded-lg shadow-sm">
            <div class="flex items-center mb-4">
              <img
                src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/9ae9b6f8-e007-4c48-b3a0-ed76a9e9b8d3.png"
                alt="Foto wanita berusia 30-an tersenyum dengan latar belakang pantai"
                class="h-12 w-12 rounded-full"
              />
              <div class="ml-4">
                <h4 class="font-semibold text-gray-900">Dewi Lestari</h4>
                <p class="text-blue-500 text-sm">Pelanggan Setia</p>
              </div>
            </div>
            <p class="text-gray-600">
              "Sabun alaminya sangat lembut di kulit dan baunya menenangkan.
              Setelah pakai, kulitku tidak kering lagi seperti saat pakai sabun
              biasa."
            </p>
            <div class="flex mt-4 text-yellow-400">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
            </div>
          </div>

          <!-- Testi 2 -->
          <div class="bg-white p-6 rounded-lg shadow-sm">
            <div class="flex items-center mb-4">
              <img
                src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/4a909d2c-2ea7-4287-80eb-016ba6f5e464.png"
                alt="Foto ibu-ibu sedang memegang produk skincare dengan ekspresi senang"
                class="h-12 w-12 rounded-full"
              />
              <div class="ml-4">
                <h4 class="font-semibold text-gray-900">Rina Darmawan</h4>
                <p class="text-blue-500 text-sm">Pelanggan Baru</p>
              </div>
            </div>
            <p class="text-gray-600">
              "Body butter-nya sangat melembabkan, wanginya tahan lama, dan yang
              penting kulitku yang sensitif tidak merah-merah lagi setelah
              pakai."
            </p>
            <div class="flex mt-4 text-yellow-400">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
            </div>
          </div>

          <!-- Testi 3 -->
          <div class="bg-white p-6 rounded-lg shadow-sm">
            <div class="flex items-center mb-4">
              <img
                src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/297d3ab7-7652-445b-bf69-c983294def37.png"
                alt="Foto remaja perempuan memegang lipbalm dengan ekspresi senang"
                class="h-12 w-12 rounded-full"
              />
              <div class="ml-4">
                <h4 class="font-semibold text-gray-900">Sinta Wijaya</h4>
                <p class="text-blue-500 text-sm">Penggemar Lipbalm</p>
              </div>
            </div>
            <p class="text-gray-600">
              "Lipbalmnya wanginya enak banget, teksturnya pas tidak terlalu
              berminyak. Bibirku yang sering pecah-pecah jadi lembab seharian!"
            </p>
            <div class="flex mt-4 text-yellow-400">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c.-784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-blue-500">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-6">
          Siap Merasakan Manfaat Produk Alami Kami?
        </h2>
        <p class="text-lg text-blue-100 mb-8 max-w-3xl mx-auto">
          Dapatkan produk perawatan alami berkualitas tinggi sekaligus mendukung
          pemberdayaan perempuan nelayan Indonesia.
        </p>
        <div
          class="flex flex-col sm:flex-row justify-center space-y-3 sm:space-y-0 sm:space-x-4"
        >
          <a
            href="https://wa.me/6281234567890"
            class="px-6 py-3 border border-transparent text-base font-medium rounded-md text-blue-500 bg-white hover:bg-gray-100 shadow-md"
          >
            Pesan via WhatsApp
          </a>
          <a
            href="#produk"
            class="px-6 py-3 border border-white text-base font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 shadow-md"
          >
            Lihat Katalog
          </a>
        </div>
      </div>
    </section>

    <!-- Kontak Section -->
    <section id="kontak" class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-12">
          <div class="mb-10 lg:mb-0">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Hubungi Kami</h2>
            <p class="text-gray-600 mb-6">
              Untuk informasi lebih lanjut tentang produk atau kemitraan,
              silakan hubungi kami melalui kontak di bawah ini:
            </p>
            <div class="space-y-4">
              <div class="flex">
                <div class="flex-shrink-0">
                  <svg
                    class="h-6 w-6 text-blue-500"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                    />
                  </svg>
                </div>
                <div class="ml-3">
                  <p class="text-lg font-medium text-gray-900">
                    Telepon/WhatsApp
                  </p>
                  <p class="text-gray-600">0812-3456-7890</p>
                </div>
              </div>
              <div class="flex">
                <div class="flex-shrink-0">
                  <svg
                    class="h-6 w-6 text-blue-500"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                    />
                  </svg>
                </div>
                <div class="ml-3">
                  <p class="text-lg font-medium text-gray-900">Email</p>
                  <p class="text-gray-600">info@payumiwak.com</p>
                </div>
              </div>
              <div class="flex">
                <div class="flex-shrink-0">
                  <svg
                    class="h-6 w-6 text-blue-500"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                    />
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                  </svg>
                </div>
                <div class="ml-3">
                  <p class="text-lg font-medium text-gray-900">Alamat</p>
                  <p class="text-gray-600">
                    Pantai Payum, Kecamatan Merauke, Papua Selatan
                  </p>
                </div>
              </div>
            </div>
            <div class="mt-8">
              <h3 class="text-lg font-medium text-gray-900 mb-3">
                Ikuti Kami
              </h3>
              <div class="flex space-x-4">
                <a href="#" class="text-gray-500 hover:text-blue-500">
                  <span class="sr-only">Facebook</span>
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path
                      fill-rule="evenodd"
                      d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-blue-500">
                  <span class="sr-only">Instagram</span>
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path
                      fill-rule="evenodd"
                      d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </a>
              </div>
            </div>
          </div>
          <div>
            <iframe
              allowfullscreen=""
              height="400"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.9279279279277!2d-99.176927684692!3d19.4326079868869!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff2a0a7a1a1f%3A0x7a7a7a7a7a7a7a7a!2sMexico%20City!5e0!3m2!1sen!2smx!4v1698652800000!5m2!1sen!2smx"
              style="border: 0"
              title="Map showing location of Rushttee Custom T-shirt Printing Company"
              width="100%"
            >
            </iframe>
          </div>
          {{-- <div>
            <div class="bg-white p-6 rounded-lg shadow-md">
              <h3 class="text-xl font-semibold text-gray-900 mb-4">
                Kirim Pesan
              </h3>
              <form>
                <div class="mb-4">
                  <label
                    for="name"
                    class="block text-sm font-medium text-gray-700 mb-1"
                    >Nama Lengkap</label
                  >
                  <input
                    type="text"
                    id="name"
                    name="name"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                  />
                </div>
                <div class="mb-4">
                  <label
                    for="email"
                    class="block text-sm font-medium text-gray-700 mb-1"
                    >Email</label
                  >
                  <input
                    type="email"
                    id="email"
                    name="email"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                  />
                </div>
                <div class="mb-4">
                  <label
                    for="message"
                    class="block text-sm font-medium text-gray-700 mb-1"
                    >Pesan</label
                  >
                  <textarea
                    id="message"
                    name="message"
                    rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                  ></textarea>
                </div>
                <button
                  type="submit"
                  class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                >
                  Kirim Pesan
                </button>
              </form>
            </div>
          </div>
        </div> --}}
      </div>
    </section>
    <!-- contact section end -->
    <x-footer/>
@endsection
