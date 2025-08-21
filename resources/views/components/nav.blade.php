    <header class="bg-white shadow-sm fixed top-0 left-0 w-full z-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
          <div class="flex items-center">
            <img src="{{asset('img/Logo.png')}}" alt="Logo Payum Iwak" class="h-8 w-auto" />
            <span class="ml-2 text-xl font-semibold text-blue-600"
              >Payum Iwak</span
            >
          </div>
          <nav class="hidden md:flex space-x-8">
            <a href="{{route('front.index')}}#hero" class="text-gray-500 hover:text-blue-600">Beranda</a>
            <a href="produk.html" class="text-gray-500 hover:text-blue-600"
              >Katalog</a
            >
            <a href="{{route('front.index')}}#tentang" class="text-gray-500 hover:text-blue-600"
              >Tentang Kami</a
            >
            <a href="{{route('front.index')}}#kontak" class="text-gray-500 hover:text-blue-600"
              >Kontak</a
            >
          </nav>
          <div class="md:hidden">
            <button class="text-gray-500 hover:text-blue-600">
              <svg
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </header>
