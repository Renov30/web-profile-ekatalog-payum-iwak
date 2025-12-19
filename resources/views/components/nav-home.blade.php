    <!-- Header -->
    <header id="home-header"
        class="text-white fixed top-0 left-0 w-full z-50 transition-all duration-300 ocean-gradient shadow-lg">
        <div class="container mx-auto px-4 sm:px-6 py-3 sm:py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2 sm:space-x-4">
                    <a href="{{ route('front.index') }}" class="flex items-center space-x-2 sm:space-x-4">
                        <div class="bg-white p-1.5 sm:p-2 rounded-full">
                            <img src="{{ asset('img/Logo.png') }}" alt="Logo Payum Iwag" class="h-5 sm:h-7 w-auto" />
                        </div>
                        <div class="hidden sm:block">
                            <h1 class="text-lg sm:text-xl font-bold">Payum Iwag</h1>
                            <p class="text-blue-100 text-xs">
                                Kelompok Usaha Perempuan Nelayan Pantai Payum
                            </p>
                        </div>
                        <div class="sm:hidden">
                            <h1 class="text-sm font-bold">Payum Iwag</h1>
                        </div>
                    </a>
                </div>
                <nav id="navbarNav" class="hidden md:flex space-x-4 lg:space-x-6">
                    <a href="{{ route('front.index') }}#home"
                        class="hover:text-blue-200 transition-colors text-sm lg:text-base">Beranda</a>
                    <a href="{{ route('front.index') }}#products"
                        class="hover:text-blue-200 transition-colors text-sm lg:text-base">Produk</a>
                    <a href="{{ route('front.index') }}#about"
                        class="hover:text-blue-200 transition-colors text-sm lg:text-base">Tentang</a>
                    <a href="{{ route('front.index') }}#contact"
                        class="hover:text-blue-200 transition-colors text-sm lg:text-base">Kontak</a>
                </nav>
                <button id="hamburger-menu-btn" onclick="toggleMobileMenu()"
                    class="md:hidden text-white p-2 hover:bg-white hover:bg-opacity-20 rounded-lg transition-colors">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4 border-t border-white border-opacity-20">
                <nav class="flex flex-col space-y-3 pt-4">
                    <a href="{{ route('front.index') }}#home"
                        class="hover:text-blue-200 transition-colors py-2 px-4 rounded-lg hover:bg-white hover:bg-opacity-10">Beranda</a>
                    <a href="{{ route('front.index') }}#products"
                        class="hover:text-blue-200 transition-colors py-2 px-4 rounded-lg hover:bg-white hover:bg-opacity-10">Produk</a>
                    <a href="{{ route('front.index') }}#about"
                        class="hover:text-blue-200 transition-colors py-2 px-4 rounded-lg hover:bg-white hover:bg-opacity-10">Tentang</a>
                    <a href="{{ route('front.index') }}#contact"
                        class="hover:text-blue-200 transition-colors py-2 px-4 rounded-lg hover:bg-white hover:bg-opacity-10">Kontak</a>
                </nav>
            </div>
        </div>
    </header>
