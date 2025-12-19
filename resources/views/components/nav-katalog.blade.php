    <!-- Header -->
    <header class="ocean-gradient text-white shadow-lg sticky top-0 z-50 transition-all duration-300">
        <div class="container mx-auto px-4 sm:px-6 py-3 sm:py-4">
            <div class="flex items-center justify-between">
                {{-- Logo + Nama Brand jadi link --}}
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

                <div class="flex items-center space-x-3 sm:space-x-6">
                    <!-- Search Bar -->
                    <div class="hidden md:flex space-x-4 lg:space-x-6">
                        <a href="{{ route('front.index') }}#home"
                            class="text-sm hover:text-blue-200 transition-colors">Beranda</a>
                        <a href="{{ route('front.katalog') }}"
                            class="text-sm hover:text-blue-200 transition-colors">Katalog</a>
                    </div>
                    <div class="search-container hidden lg:block">
                        <div class="relative">
                            <input type="text" id="searchInput" placeholder="Cari produk..."
                                class="bg-white bg-opacity-20 text-white text-sm placeholder-blue-200 px-4 py-2 pr-10 rounded-full focus:outline-none focus:ring-2 focus:ring-white focus:bg-opacity-30 transition-all w-48 xl:w-64" />
                            <i
                                class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-blue-200"></i>
                        </div>
                        <div id="searchSuggestions" class="search-suggestions"></div>
                    </div>

                    <!-- Cart Icon -->
                    <div class="cart-icon cursor-pointer relative" onclick="toggleCart()">
                        <i class="fas fa-shopping-cart text-xl sm:text-2xl"></i>
                        <span id="cartBadge" class="cart-badge">0</span>
                    </div>

                    <!-- Menu Button -->
                    <button id="mobile-menu-btn" onclick="toggleMobileMenu()" class="md:hidden text-white p-2 hover:bg-white hover:bg-opacity-20 rounded-lg transition-colors">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4 border-t border-white border-opacity-20">
                <nav class="flex flex-col space-y-3 pt-4">
                    <a href="{{ route('front.index') }}#home" class="hover:text-blue-200 transition-colors py-2 px-4 rounded-lg hover:bg-white hover:bg-opacity-10">Beranda</a>
                    <a href="{{ route('front.katalog') }}" class="hover:text-blue-200 transition-colors py-2 px-4 rounded-lg hover:bg-white hover:bg-opacity-10">Katalog</a>
                </nav>
                <!-- Mobile Search -->
                <div class="mt-4">
                    <div class="relative">
                        <input type="text" id="mobileSearchInput" placeholder="Cari produk..."
                            class="w-full bg-white bg-opacity-20 text-white placeholder-blue-200 px-4 py-2 pr-10 rounded-full focus:outline-none focus:ring-2 focus:ring-white" />
                        <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-blue-200"></i>
                    </div>
                    <div id="mobileSearchSuggestions" class="search-suggestions mt-2"></div>
                </div>
            </div>
        </div>
    </header>
