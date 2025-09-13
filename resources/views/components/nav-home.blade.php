    <!-- Header -->
    <header id="home-header" class="text-white fixed top-0 left-0 w-full z-50 transition-all duration-300">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('front.index') }}" class="flex items-center space-x-4">
                        <div class="bg-white p-2 rounded-full">
                            <img src="{{ asset('img/Logo.png') }}" alt="Logo Payum Iwag" class="h-7 w-auto" />
                        </div>
                        <div>
                            <h1 class="text-xl font-bold">Payum Iwag</h1>
                            <p class="text-blue-100 text-xs">
                                Kelompok Usaha Perempuan Nelayan Pantai Payum
                            </p>
                        </div>
                    </a>
                </div>
                <nav id="navbarNav" class="hidden md:flex space-x-6">
                    <a href="{{ route('front.index') }}#home" class="hover:text-blue-200 transition-colors">Beranda</a>
                    <a href="{{ route('front.index') }}#products"
                        class="hover:text-blue-200 transition-colors">Produk</a>
                    <a href="{{ route('front.index') }}#about" class="hover:text-blue-200 transition-colors">Tentang</a>
                    <a href="{{ route('front.index') }}#contact"
                        class="hover:text-blue-200 transition-colors">Kontak</a>
                </nav>
                <button id="hamburger-menu" class="md:hidden text-white">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </header>
